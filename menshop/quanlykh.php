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
                    <li><a href="quanlykh.php" style="font-size: 18px; padding-right:20px;">Quản lý khách hàng</a>                                                      
                    <li><a href="quanlynsp.php" style="font-size: 18px; padding-right:20px;">Quản lý nhóm sản phẩm</a></li>
                    <li><a href="quanlysp.php" style="font-size: 18px; padding-right:20px;">Quản lý sản phẩm</a></li>
                    <li><a href="quanlydh.php" style="font-size: 18px; padding-right:20px;">Quản lý đơn hàng</a></li>
                    <li><a href="logoutadmin.php" style="font-size: 18px; padding-right:20px;">Thoát</a></li>
                </ul>
            </div>
            <div class="conten_qt">
                <?php 
                    include('includes/mysqli_connect.php');
                    
                    if(isset($_GET['xoasp'])){
                        $id = $_GET['xoasp'];  
                        $r_xoa = mysqli_query($dbc,"delete from khachhang where masp ='".$id."'");
                    }
                    if(isset($_GET['suasp'])){
                        $id = $_GET['suasp'];
                        header('Location: suasp.php?suasp='.$id.'');
                    }
                    
                ?>
                    <h1 style="text-align: center; margin-top: 50px;">Quản lý khách hàng</h1>
                    <form action="" method="POST">
                    <table style="border-collapse: collapse;border: 1px solid;; width: 1000px; display: table; margin-left: 10px; margin-top: 30px; margin-bottom: 50px;">
                        <thead style="background: silver; font-size: 20px; font: bolder;">
                            <tr>
                                <td style="text-align: center;">Tài khoản</td>
                                <td style="text-align: center;">Mật khẩu</td>
                                <td style="text-align: center;">Họ tên</td>
                                <td style="text-align: center;">Email</td> 
                                <td style="text-align: center;">Địa chỉ</td>
                                <td style="text-align: center;">Sđt</td>
                                <td style="text-align: center;">Ngày lập</td>
                                <td style="text-align: center;"></td>
                                <td style="text-align: center;"></td>     
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $query = mysqli_query($dbc,"select * from khachhang");
                                while($row = mysqli_fetch_array($query)){
                            ?>
                                
                                <tr>
                                    <td style="text-align: center;"><?php echo $row['username']?></td>
                                    <td style="text-align: center;"><?php echo $row['password']?></td>    
                                    <td style="text-align: center;"><?php echo $row['fullname']?></td>
                                    <td style="text-align: center;"><?php echo $row['email']?></td>
                                    <td style="text-align: center;"><?php echo $row['diachi']?></td>
                                    <td style="text-align: center;"><?php echo $row['sdt']?></td>
                                    <td style="text-align: center;"><?php echo $row['ngaylap']?></td>
                                    <td><a href="?suasp=<?php echo $row['username']?>" style="color: #FFCBA0; text-decoration: none; font-weight: bold;">Sửa</a> </a></td>
                                    <td><a href="?xoasp=<?php echo $row['username']?>" style="color: #FFCBA0; text-decoration: none; font-weight: bold;">Xóa</a></td>
                                </tr>
                            <?php }?>
                        </tbody>
                </table>
            </form>
            </div>
        </div>
    </body>
 </html>
 <?php ob_flush();?>