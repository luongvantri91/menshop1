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
        <div class="container" >
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
                     if(isset($_GET['xoadh'])){
                        $id = $_GET['xoadh'];  
                        $r_xoadh = mysqli_query($dbc,"delete from donhang where madh ='".$id."'");
                    }
                    if(isset($_GET['suadh'])){
                        
                        $id = $_GET['suadh'];
                        header('Location: suadh.php?suadh='.$id.'');
                    }
                    if(isset($_GET['ctdh'])){
                        
                        $id = $_GET['ctdh'];
                        header('Location: quanlyctdh.php?ctdh='.$id.'');
                    }
                ?>
                    <a><?php if(isset($_GET['suatc'])) { echo "Lưu thành công"; }?></a>
                    <h1 style="text-align: center; margin-top: 50px;">Quản lý đơn hàng</h1>
                    <form class="input_searchdh" method="GET" style="width: 600px; height: 30px; margin-top: 10px;">
                            <input style="width: 150px;  height: 30px;" name="key1" type="text" value="" placeholder="tìm sản phẩm ..." />  
                            <select name="donhang" style="width: 150px; height: 30px;">
                                 <option value="madh">Mã đơn hàng</option>   
                                <option value="kh">Khách hàng</option>
                                <option value="sdt">Số điện thoại</option>
                             </select>        
                            <button style="width: 30px; height: 30px;" type="submit" name="tim" value="">Tìm</button>      
                    </form>
                    <form class="locdh" method="GET" style="width: 600px; height: 30px; margin-top: 10px;">
                            
                            <select name="locdonhang" style="width: 200px; height: 30px;">
                                 <option value="a">Đơn hàng đã thanh toán</option>   
                                <option value="b">Đơn hàng chưa thanh toán</option>
                                <option value="c">Đơn hàng trong ngày</option>
                                <option value="d">Đơn hàng trong tuần</option>
                                <option value="e">Đơn hàng trong tháng</option>
                             </select>        
                            <button style="width: 30px; height: 30px;" type="submit" name="loc" value="">Lọc</button>      
                    </form>
                     <form action="" method="POST">
                    <table style="margin-bottom: 50px;border-collapse: collapse;border: 1px solid;; width: 1200px; display: table; margin-top: 30px;">
                        <thead style="background: silver; font-size: 20px; font: bolder;">
                            <tr>
                                <td style="text-align: center;">Mã đh</td>
                                <td style="text-align: center;">Khách hàng</td>
                                <td style="text-align: center;">Ngày lập</td>
                                <td style="text-align: center;">Tổng tiền</td>
                                <td style="text-align: center;">Họ tên</td> 
                                <td style="text-align: center;">Địa chỉ</td>
                                <td style="text-align: center;">Số điện thoại</td>
                                <td style="text-align: center;">Trạng thái</td>
                                <td style="text-align: center;"></td>
                                <td style="text-align: center;"></td>  
                                <td style="text-align: center;"></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                if(isset($_GET['tim'])){
                                    if($_GET['donhang']=='madh')
                                    $query= mysqli_query($dbc,"select * from donhang where madh like '%{$_GET['key1']}%'");
                                    elseif($_GET['donhang']=='kh')
                                    $query= mysqli_query($dbc,"select * from donhang where username like '%{$_GET['key1']}%'");
                                    elseif($_GET['donhang']=='sdt')
                                    $query= mysqli_query($dbc,"select * from donhang where sdt like '%{$_GET['key1']}%'");
                                    
                                }
                                elseif(isset($_GET['loc'])){
                                   switch($_GET['locdonhang']){ 
                                    case "a":/**/
                                        $query= mysqli_query($dbc,"select * from donhang where trangthaitt=1 ");
                                    break;
                                    case "b":
                                        $query= mysqli_query($dbc,"select * from donhang where trangthaitt=0 ");
                                    break;
                                    case "c":
                                        $query= mysqli_query($dbc,"select * from donhang where datediff(curdate(),ngaydh)<1");
                                    break;
                                    case "d":
                                        $query= mysqli_query($dbc,"select * from donhang where datediff(curdate(),ngaydh)<8 ");
                                    break;
                                    case "e":
                                        $query= mysqli_query($dbc,"select * from donhang where datediff(curdate(),ngaydh)<31 ");
                                    break;
                                   }
                                    
                                }
                                else{
                                    $query = mysqli_query($dbc,"select * from donhang");
                                }
                                
                                while($row = mysqli_fetch_array($query)){
                            ?>
                                
                                <tr>
                                    <td style="text-align: center;"><?php echo $row['madh']?></td>
                                    <td style="text-align: center;"><?php echo $row['username']?></td>    
                                    <td style="text-align: center;"><?php echo $row['ngaydh']?></td>
                                    <td style="text-align: center;"><?php echo $row['tongtien']?></td>
                                    <td style="text-align: center;"><?php echo $row['hotennn']?></td>
                                    <td style="text-align: center;"><?php echo $row['diachinn']?></td>
                                    <td style="text-align: center;"><?php echo $row['sdt']?></td>
                                    <td style="text-align: center;"><?php echo $row['trangthaitt']?></td>
                                    
                                    <td><a href="?suadh=<?php echo $row['madh']?>" style="color: #FFCBA0; text-decoration: none; font-weight: bold;">Sửa</a> </a></td>
                                    <td><a href="?xoadh=<?php echo $row['madh']?>" style="color: #FFCBA0; text-decoration: none; font-weight: bold;">Xóa</a></td>
                                    <td><a href="?ctdh=<?php echo $row['madh']?>" style="color: #FFCBA0; text-decoration: none; font-weight: bold;">Chi tiết</a></td>
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