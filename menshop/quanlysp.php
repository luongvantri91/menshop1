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
                        $r_xoa = mysqli_query($dbc,"delete from sanpham where masp ='".$id."'");
                    }
                    if(isset($_GET['suasp'])){
                        $id = $_GET['suasp'];
                        header('Location: suasp.php?suasp='.$id.'');
                    }
                    
                ?>
                    <h1 style="text-align: center; margin-top: 50px;">Quản lý sản phẩm</h1>
                    <a href="quanlythemsp.php"><button type="submit" name="them" value="Thêm sản phẩm" style=" margin-top: 30px; background: #FFCBA0; height: 30px; width: 180px; font-weight: bold; border-radius: 28; font-size: 16px;">Thêm sản phẩm</button></a>
                     <div class="searchsp">
                        <form class="input_searchsp" method="GET" style="width: 600px; height: 30px; margin-top: 10px;">
                            <input style="width: 150px;  height: 30px;" name="key1" type="text" value="" placeholder="tìm sản phẩm ..." />  
                            <select name="sanpham" style="width: 150px; height: 30px;">
                                 <option value="msp">Mã sản phẩm</option>   
                                <option value="tsp">Tên sản phẩm</option>
                                <option value="nsp">Nhóm sản phẩm</option>
                             </select>        
                            <button style="width: 30px; height: 30px;" type="submit" name="tim" value="">Tìm</button>      
                        </form>
                     </div>
                     <form action="" method="POST">
                    <table style="border-collapse: collapse;border: 1px solid;; width: 1000px; display: table; margin-left: 10px; margin-top: 30px; margin-bottom: 50px;">
                        <thead style="background: silver; font-size: 20px; font: bolder;">
                            <tr>
                                <td style="text-align: center;">Mã sản phẩm</td>
                                <td style="text-align: center;">Mã nhóm</td>
                                <td style="text-align: center;">Tên sản phẩm</td>
                                <td style="text-align: center;">Ảnh sản phẩm</td> 
                                <td style="text-align: center;">Giá</td>
                                <td style="text-align: center;">Sô lượng</td>
                                <td style="text-align: center;"></td>
                                <td style="text-align: center;"></td>     
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                if(isset($_GET['tim'])){
                                    if($_GET['sanpham']=='msp')
                                    $query= mysqli_query($dbc,"select * from sanpham where masp like '%{$_GET['key1']}%'");
                                    elseif($_GET['sanpham']=='tsp')
                                    $query= mysqli_query($dbc,"select * from sanpham where tensp like '%{$_GET['key1']}%'");
                                    elseif($_GET['sanpham']=='nsp')
                                    $query= mysqli_query($dbc,"select * from sanpham where manhom like '%{$_GET['key1']}%'");
                                }
                                else{
                                    $query = mysqli_query($dbc,"select * from sanpham");
                                }
                                
                                while($row = mysqli_fetch_array($query)){
                            ?>
                                
                                <tr>
                                    <td style="text-align: center;"><?php echo $row['masp']?></td>
                                    <td style="text-align: center;"><?php echo $row['manhom']?></td>    
                                    <td style="text-align: center;"><?php echo $row['tensp']?></td>
                                    <td style="text-align: center;"><img src="/menshop/images/<?php echo $row['anhsp']?>" style="width: 50px; height: 50px;" /></td>
                                    <td style="text-align: center;"><?php echo $row['gia']?></td>
                                    <td style="text-align: center;"><?php echo $row['soluong']?></td>
                                    
                                    <td><a href="?suasp=<?php echo $row['masp']?>" style="color: #FFCBA0; text-decoration: none; font-weight: bold;">Sửa</a> </a></td>
                                    <td><a href="?xoasp=<?php echo $row['masp']?>" style="color: #FFCBA0; text-decoration: none; font-weight: bold;">Xóa</a></td>
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