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
                    <li><a href="admin.php" style="font-size: 20px; padding-right:20px;">Trang Chủ</a>                                                      
                    <li><a href="quanlynsp.php" style="font-size: 20px; padding-right:20px;">Quản lý nhóm sản phẩm</a></li>
                    <li><a href="quanlysp.php" style="font-size: 20px; padding-right:20px;">Quản lý sản phẩm</a></li>
                    <li><a href="quanlydh.php" style="font-size: 20px; padding-right:20px;">Quản lý đơn hàng</a></li>
                    <li><a href="logoutadmin.php" style="font-size: 20px; padding-right:20px;">Thoát</a></li>
                </ul>
            </div>
            <div class="conten_qt">
                <?php 
                    include('includes/mysqli_connect.php');
                    $manhom = $_GET['suansp'];     
                    $q_suansp = "select * from nhomsp where manhom ='".$manhom."'";
                    $r_suansp = mysqli_query($dbc, $q_suansp);
                    $row = mysqli_fetch_array($r_suansp);
                    if(isset($_POST['sua'])){
                        $ten = $_POST['tn'];
                        $manhom = $_GET['suansp'];
                        $q_sua = "update nhomsp set tennhom ='".$ten."' where manhom ='".$manhom."'";
                       $r_sua =mysqli_query($dbc,$q_sua);
                        header('Location: quanlynsp.php');
                    }
                //        $r_sua = mysqli_query($dbc,"update * from nhomsp set tennhom = '".$tennhom."' where manhom = '".$manhom."'");
                    
                   
                ?>
                 <form action="" method="POST" enctype="multipart/from-data">
                    <h1 style="text-align: center; margin-top: 50px;">Quản lý nhóm sản phẩm</h1>
                    <h3 style="margin-top: 30px; margin-left: 100px;">Sửa nhóm sản phẩm:</h3>
                    <div style="margin-top: 10px; margin-left: 100px;">
                        <label for="tennhom">Mã nhóm: 
                        <?php echo $row['manhom']?></label>
                    </div>
                    <div style="margin-top: 10px; margin-left: 100px;">
                         <label for="tennhom">Tên nhóm: 
                         <input type="text" tabindex="2" name="tn" value="<?php echo $row['tennhom']?>"/></label>
                    </div>
                    <input type="submit" name="sua" value="Sửa" style="margin-left: 200px; margin-top: 10px; background: #FFCBA0; height: 30px; width: 100px; font-weight: bold; border-radius: 28; font-size: 16px;"/>
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
                                    <td style="text-align: center;"><input style="font-size: 16px;" type="text" name="ten" value="<?php echo $row['tennhom']?>"/></td>
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