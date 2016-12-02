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
                   
                    if(isset($_POST['them'])){
                        $manhom = $_POST['mn'];
                        $tennhom = $_POST['tn'];
                        $q_them ="insert into nhomsp (manhom,tennhom) values ('$manhom','$tennhom')";
                        $r_them =mysqli_query($dbc,$q_them);
                        header('Location: quanlynsp.php');
                    }
                    if(isset($_GET['suansp'])){
                        $id = $_GET['suansp'];
                        header('Location: suansp.php?suansp='.$id.'');
             //           $r_sua = mysqli_query($dbc,"update * from nhomsp set tennhom = '".$tennhom."' where manhom = '".$manhom."'");
                    }
                    if(isset($_GET['xoansp'])){
                        $id = $_GET['xoansp'];
                        $r_xoa = mysqli_query($dbc,"delete from nhomsp where manhom ='".$id."'");
                    }
                ?>
                 <form action="" method="POST">
                    <h1 style="text-align: center; margin-top: 50px;">Quản lý nhóm sản phẩm</h1>
                    <h3 style="margin-left: 100px; margin-top: 30px;">Thêm nhóm sản phẩm:</h3>
                    <div style="margin-top: 10px; margin-left: 100px;">
                        <label for="tennhom">Mã nhóm: 
                        <input type="text" tabindex="1" name="mn" value=""/></label>
                    </div>
                    <div style="margin-top: 10px; margin-left: 100px;">
                         <label for="tennhom">Tên nhóm: 
                         <input type="text" tabindex="2" name="tn" value=""/></label>
                    </div>
                    <input type="submit" name="them" value="Thêm"style="margin-left: 200px; margin-top: 10px; background: #FFCBA0; height: 30px; width: 100px; font-weight: bold; border-radius: 28; text-align: center; font-size: 14px;"/>
                    <table style="border-collapse: collapse;border: 1px solid;; width: 800px; display: table; margin-left: 100px; margin-top: 30px;">
                        <thead style="background: silver; font-size: 20px; font: bolder;">
                            <tr>
                                <td style="text-align: center;">Mã Nhóm</td>
                                <td style="text-align: center;">Tên Nhóm</td>
                                <td></td>
                                <td></td>      
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $query = mysqli_query($dbc,"select * from nhomsp");
                                while($row = mysqli_fetch_array($query)){
                                
                            ?>
                           
                                <tr>
                                    <td style="text-align: center;"><?php echo $row['manhom']?></td>
                                    <td style="text-align: center;"><?php echo $row['tennhom']?></td>
                                    <td><a href="?suansp=<?php echo $row['manhom']?>" style="color: #FFCBA0; text-decoration: none; font-weight: bold;">Sửa</a> </a></td>
                                    <td><a href="?xoansp=<?php echo $row['manhom']?>" style="color: #FFCBA0; text-decoration: none; font-weight: bold;">Xóa</a></td>
                                </tr>
                                
                            <?php } ?>
                        </tbody>
                </table>
            </form>
            </div>
        </div>
    </body>
 </html>
 <?php ob_flush();?>