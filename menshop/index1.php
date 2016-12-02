<?php
    ob_start();
    session_start();
?>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
	   	<link rel="stylesheet" type="text/css" href="css/style.css" title="style">
		<title>Men shop</title>
	</head>
	<body>
        
		<div class="container"> 
            <?php
            include('includes/top.php');
            include('includes/header.php');
            include('includes/menu.php');
            include('includes/mysqli_connect.php');
            ?>
            <?php 
                        $username = $_SESSION['username'];
                        $tongtien = 0;
                                for($i = 0; $i < count($_SESSION['giohang']); $i++){
                                    $q_cart = "select * from sanpham where masp ='".$_SESSION['giohang'][$i]['id']."'";
                                    $r_cart = mysqli_query($dbc,$q_cart);
                                    $row = mysqli_fetch_array($r_cart);
                                    $tongtien = $tongtien + ($_SESSION['giohang'][$i]["soluong"]*$row['gia']);
                                
                                }
                        $khachang = mysqli_query($dbc,"select * from khachhang where username ='".$username."'");
                        $row3 = mysqli_fetch_array($khachang);
                         $hoten = $row3['fullname'];
                         $diachi = $row3['diachi'];
                         $sdt = $row3['sdt'];   
                         $trangthai = 1;
                        $q_insert = "insert into donhang(username,tongtien,hotennn,diachinn,sdt,trangthaitt) values('{$username}','{$tongtien}','{$hoten}','{$diachi}','{$sdt}','{$trangthai}')";
                        $r_insert = mysqli_query($dbc,$q_insert);
                        if($r_insert){
                            for($i = 0; $i < count($_SESSION['giohang']); $i++){
                                $q_max = "select max(madh) from donhang";
                                $r_max = mysqli_query($dbc,$q_max);
                                $row1 = mysqli_fetch_array($r_max);
                                $madh = $row1[0];
                                $masp = $_SESSION['giohang'][$i]['id'];
                                $soluong = $_SESSION['giohang'][$i]['soluong'];
                                
                         //       $size = $_SESSION['giohang'][$i]['size'];
                                
                        //        $q_cart ="select * from sanpham where masp ='".$_SESSION['giohang'][$i]['id']."'";
                         //       $r_cart =mysqli_query($dbc,$q_cart);
                         //       $row1 = mysqli_fetch_array($r_cart);            
                         //       $gia = $_SESSION['giohang'][$i]['soluong'] * $row1['gia'];
                                
                                $q_dh = "insert into ctdh(madh,masp,soluong) values('$madh','$masp','$soluong')";
                                $r_dh = mysqli_query($dbc,$q_dh);
                                
                                $r_sp = mysqli_query($dbc,"select soluong from sanpham where masp='".$masp."'");
                                $r=mysqli_fetch_array($r_sp);
                                $slkho=$r['soluong'];
                                $slupdate = $slkho - $soluong;
                                $r_sluong = mysqli_query($dbc,"update sanpham set soluong ='".$slupdate."' where masp ='".$masp."'");
                            }
                            unset($_SESSION['giohang']);
                        }
                        
                        
                    
            ?>
            <div id="content">
                <h1>Thêm đơn hàng thành công!</h1>
        </div>
    </body>
 </html>
 <?php ob_flush();?>