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
                    if(isset($_POST['them'])){
                        $masp = $_POST['msp'];
                        $tensp = $_POST['tsp'];
                        $anhsp = $_FILES['asp']['name'];
                        $anhsp_tmp = $_FILES['asp']['tmp_name'];
                        move_uploaded_file($anhsp_tmp,'menshop/images/'.$anhsp);
                        $gia = $_POST['gsp'];
                        $sl = $_POST['sl'];
                        $nsp = $_POST['nhomsp'];
                        
                        $q_them ="insert into sanpham (masp,manhom,tensp,anhsp,gia,soluong) values ('$masp','$nsp','$tensp','$anhsp','$gia','$sl')";
                        $r_them =mysqli_query($dbc,$q_them);
                        header('Location: quanlythemsp.php?them=ok');
                    }
                    
                ?>  
                 <form action="" method="POST" enctype="multipart/form-data">
                    <a style="font-size: 20px;"><?php if(isset($_GET['them'])) echo "Thêm thành công"?></a>
                    <h1 style="margin-left: 200px; margin-top: 50px;">Thêm sản phẩm</h1>
                   <div style="margin-top: 30px;">
                        <label for="tennhom" style="font-size: 20px;">Mã sản phẩm: 
                        <input type="text" tabindex="1" name="msp" value="" style="width: 400; height: 30px;"/></label>
                    </div>
                    <div style="margin-top: 20px;">
                        <label for="tennhom"  style="font-size: 20px;">Tên sản phẩm: 
                        <input type="text" tabindex="3" name="tsp" value="" style="width: 400; height: 30px;"/></label>
                    </div>
                    <div style="margin-top: 20px;">
                        <label for="tennhom" style="font-size: 20px;">Ảnh sản phẩm: 
                        <input type="file" tabindex="3" name="asp" value="" style="width: 400; height: 30px;"/></label>
                    </div>
                    <div style="margin-top: 20px;">
                         <label for="tennhom" style="font-size: 20px;">Giá sản phẩm: 
                         <input type="text" tabindex="4" name="gsp" value="" style="width: 400; height: 30px;"/></label>
                    </div>
                    <div style="margin-top: 20px;">
                        <label for="tennhom" style="font-size: 20px; margin-left: 35px;">Số lượng: 
                        <input type="text" tabindex="5" name="sl" value="" style="width: 400; height: 30px;"/></label>
                    </div>
                    <?php 
                        $query = mysqli_query($dbc,"select * from nhomsp");  
                    ?>
                    <div style="margin-top: 20px;">
                         <label for="tennhom" style="font-size: 20px;">Nhóm sản phẩm: 
                             <select name="nhomsp" style="width: 400; height: 30px;">
                             <?php  while($row = mysqli_fetch_array($query)){ ?>
                                <option value="<?php echo $row['manhom']?>"><?php echo $row['tennhom']?></option>
                             <?php } ?>
                             </select>
                         </label>
                    </div>
                     <button name="them" value="thêm" style="margin-left: 200px; margin-top: 30px; background: #FFCBA0; height: 30px; width: 200px; font-weight: bold; border-radius: 28; text-align: center; font-size: 14px;">Thêm sản phẩm</button>
                </form>
            </div>
        </div>
    </body>
 </html>
 <?php ob_flush();?>