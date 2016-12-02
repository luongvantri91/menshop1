<?php 
    ob_start();
    session_start();
    if(isset($_SESSION['admin'])){
    }else {
        include_once('loginAdmin.php');
    }
    
?>

<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
	   	<link rel="stylesheet" type="text/css" href="css/style.css" title="style">
		<title>Quản Trị Website</title>
	</head>
	<body>
        <div class="container">
            <div class="header_qt">Quản Trị Website</div>
            <div class="menu_qt">
                <ul>  
                    <li><a href="quanlykh.php" style="font-size: 18px; padding-right:20px;">Quản lý khách hàng</a></li>                                                    
                    <li><a href="quanlynsp.php" style="font-size: 18px; padding-right:20px;">Quản lý nhóm sản phẩm</a></li>
                    <li><a href="quanlysp.php" style="font-size: 18px; padding-right:20px;">Quản lý sản phẩm</a></li>
                    <li><a href="quanlydh.php" style="font-size: 18px; padding-right:20px;">Quản lý đơn hàng</a></li>
                    <li><a href="logoutadmin.php" style="font-size: 18px; padding-right:20px;">Thoát</a></li>
                </ul>
            </div>
            <div class="conten_qt">
                <?php 
                    include('includes/mysqli_connect.php');
                    $id = $_GET['ctdh'];
                    $ctdh = mysqli_query($dbc,"select * from ctdh where madh ='".$id."'");
                    
                ?>  
                <h2 style="text-align: center; margin-top: 50px;">Chi Tiết Đơn hàng</h2>
                    <table style="border-collapse: collapse;border: 1px solid;; width: 1000px; display: table; margin-left: 20px; margin-top: 30px;">
                        <thead style="background: silver; font-size: 20px; font: bolder;">
                            <tr>
                                <td>Mã đơn hàng</td>
                                <td>Mã sản phẩm</td>
                                <td>Tên sản phẩm</td>
                                <td>Giá</td>      
                                <td>Số lượng</td>
                                
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            
                            while($row = mysqli_fetch_array($ctdh)){
                                $q_sp = $row['masp'];
                                $r_sp = mysqli_query($dbc,"select * from sanpham where masp ='".$q_sp."'");
                                $row1 = mysqli_fetch_array($r_sp);
                                       
                        ?>
                        
                            <form action="" method="POST">
                                <tr>
                                    <td><?php echo $row['madh']?></td>
                                    <td><?php echo $row['masp']?></td>
                                    <td><?php echo $row1['tensp']?></td>
                                    <td> <?php echo $row1['gia']?></td>
                                    <td><?php echo $row['soluong']?></td>
                                  
                                </tr>
                            </form>
                        <?php }
                         ?>
                        </tbody>
                    </table>
            </div>
        </div>
    </body>
 </html>
 <?php ob_flush();?>