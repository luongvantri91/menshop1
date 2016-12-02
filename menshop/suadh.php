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
                    <li><a href="admin.php" style="font-size: 20px; padding-right:20px;">Trang Chủ</a></li>                                                    
                    <li><a href="quanlynsp.php" style="font-size: 20px; padding-right:20px;">Quản lý nhóm sản phẩm</a></li>
                    <li><a href="quanlysp.php" style="font-size: 20px; padding-right:20px;">Quản lý sản phẩm</a></li>
                    <li><a href="quanlydh.php" style="font-size: 20px; padding-right:20px;">Quản lý đơn hàng</a></li>
                    <li><a href="logoutadmin.php" style="font-size: 20px; padding-right:20px;">Thoát</a></li>
                </ul>
            </div>
            <div class="conten_qt">
                <?php 
                    include('includes/mysqli_connect.php');
                    $id = $_GET['suadh'];
                    $r_suadh = mysqli_query($dbc,"select * from donhang where madh ='".$id."'");
                    $row = mysqli_fetch_array($r_suadh);
                    
                    if(isset($_POST['luu'])){
                        $id = $_GET['suadh'];
                        $kh = $_POST['kh'];
                        $ngaydh = $_POST['ngaydh'];
                        $tongtien = $_POST['tongtien'];
                        $hoten = $_POST['hoten'];
                        $diachi = $_POST['diachi'];
                        $sdt = $_POST['sdt'];
                      $trangthai = $_POST['trangthai'];
                    //    echo $id; echo $kh; echo $ngaydh; echo $tongtien; echo $hoten; echo $diachi; echo $sdt; echo $trangthai;
                        $q = "update donhang set ngaydh='$ngaydh',tongtien=$tongtien,hotennn='$hoten',diachinn='$diachi',sdt=$sdt,trangthaitt=$trangthai where madh =$id";
                        $r = mysqli_query($dbc, $q);
                      //  $r = mysqli_fetch_array($r);
                        //echo $r['mdh']; echo $r['username'];
                        //chay thu
                        header('Location: quanlydh.php?suatc=ok');
                    }
                ?>  
                 <form action="" method="POST" enctype="multipart/form-data">
                    <h1 style="margin-left: 200px; margin-top: 50px;">Sửa đơn hàng</h1>
                   <div style="margin-top: 30px;">
                        <label for="tennhom" style="font-size: 20px;">Mã đơn hàng: <?php echo $row['madh']?></label>
                    </div>
                    <?php 
                        $query = mysqli_query($dbc,"select * from khachhang");  
                    ?>
                    <div style="margin-top: 20px;">
                         <label for="tennhom" style="font-size: 20px;">Khách hàng: 
                             <select name="kh" style="width: 400; height: 30px;">
                             <?php  while($row1 = mysqli_fetch_array($query)){
                                        if($row1['username'] == $row['username']){
                                ?>
                                <option selected="selected" value="<?php echo $row1['username']?>"><?php echo $row1['username']?></option>
                             <?php }else {
                             ?>
                                <option value="<?php echo $row1['username']?>"><?php echo $row1['username']?></option>
                             <?php }
                                }
                              ?>
                             </select>
                         </label>
                    </div>
                    
                    <div style="margin-top: 20px;">
                        <label for="tennhom"  style="font-size: 20px;">Ngày lập: 
                        <input type="text" tabindex="3" name="ngaydh" value="<?php echo $row['ngaydh']?>" style="width: 400; height: 30px;"/></label>
                    </div>
                    <div style="margin-top: 20px;">
                        <label for="tennhom" style="font-size: 20px;">Tổng tiền: 
                        <input type="text" tabindex="3" name="tongtien" value="<?php echo $row['tongtien']?>" style="width: 400; height: 30px;"/></label>
                    </div>
                    <div style="margin-top: 20px;">
                         <label for="tennhom" style="font-size: 20px;">Họ tên: 
                         <input type="text" tabindex="4" name="hoten" value="<?php echo $row['hotennn']?>" style="width: 400; height: 30px;"/></label>
                    </div>
                    <div style="margin-top: 20px;">
                        <label for="tennhom" style="font-size: 20px; margin-left: 35px;">Địa chỉ: 
                        <input type="text" tabindex="5" name="diachi" value="<?php echo $row['diachinn']?>" style="width: 400; height: 30px;"/></label>
                    </div>
                    <div style="margin-top: 20px;">
                        <label for="tennhom" style="font-size: 20px; margin-left: 35px;">Số điện thoại: 
                        <input type="text" tabindex="5" name="sdt" value="<?php echo $row['sdt']?>" style="width: 400; height: 30px;"/></label>
                    </div>
                    <div style="margin-top: 20px;">
                        <label for="tennhom" style="font-size: 20px; margin-left: 35px;">Trạng thái: 
                        <input type="text" tabindex="5" name="trangthai" value="<?php echo $row['trangthaitt']?>" style="width: 400; height: 30px;"/></label>
                    </div>
                    
                     <button name="luu" value="Lưu" style="margin-bottom: 50px; margin-left: 200px; margin-top: 30px; background: #FFCBA0; height: 30px; width: 200px; font-weight: bold; border-radius: 28; text-align: center; font-size: 14px;">Lưu</button>
                </form>
            </div>
        </div>
    </body>
 </html>
 <?php ob_flush();?>