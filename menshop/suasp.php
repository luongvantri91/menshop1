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
                    $masp = $_GET['suasp'];
                    $r_suasp = mysqli_query($dbc,"select * from sanpham where masp = '".$masp."'");
                    $row = mysqli_fetch_array($r_suasp);
                    if(isset($_POST['sua'])){
                        $masp = $_GET['suasp'];
                        $tensp = $_POST['tsp'];
                        $anhsp = $_FILES['asp']['name'];
                        $anhsp_tmp = $_FILES['asp']['tmp_name'];
                        move_uploaded_file($anhsp_tmp,'menshop/images/'.$anhsp);
                        $gia = $_POST['gsp'];
                        $sl = $_POST['sl'];
                        $nsp = $_POST['nhomsp'];
                        if($anhsp!=''){
                            $q_sua = "update sanpham set manhom='".$nsp."',tensp='".$tensp."',anhsp='".$anhsp."',gia='".$gia."',soluong='".$sl."' where masp ='".$masp."'";
                        }else{
                            $q_sua = "update sanpham set manhom='".$nsp."',tensp ='".$tensp."',gia='".$gia."',soluong='".$sl."' where masp ='".$masp."'";
                        }
                       $r_sua =mysqli_query($dbc,$q_sua);
                        header('Location: quanlysp.php');
                    }
                    
                ?>  
                 <form action="" method="POST" enctype="multipart/form-data">
                    <h1 style="margin-left: 200px; margin-top: 50px;">Sửa sản phẩm</h1>
                   <div style="margin-top: 30px;">
                        <label for="tennhom" style="font-size: 20px;">Mã sản phẩm: <?php echo $row['masp']?></label>
                    </div>
                    <div style="margin-top: 20px;">
                        <label for="tennhom"  style="font-size: 20px;">Tên sản phẩm: 
                        <input type="text" tabindex="3" name="tsp" value="<?php echo $row['tensp']?>" style="width: 400; height: 30px;"/></label>
                    </div>
                    <div style="margin-top: 20px;">
                        <label for="tennhom" style="font-size: 20px;">Ảnh sản phẩm: 
                        <input type="file" tabindex="3" name="asp"/><img src="/menshop/images/<?php echo $row['anhsp']?>" style="width: 60px; height: 60px;"/> </label>
                    </div>
                    <div style="margin-top: 20px;">
                         <label for="tennhom" style="font-size: 20px;">Giá sản phẩm: 
                         <input type="text" tabindex="4" name="gsp" value="<?php echo $row['gia']?>" style="width: 400; height: 30px;"/></label>
                    </div>
                    <div style="margin-top: 20px;">
                        <label for="tennhom" style="font-size: 20px; margin-left: 35px;">Số lượng: 
                        <input type="text" tabindex="5" name="sl" value="<?php echo $row['soluong']?>" style="width: 400; height: 30px;"/></label>
                    </div>
                    <div style="margin-top: 20px;">
                         <?php 
                                $query = mysqli_query($dbc,"select * from nhomsp");
                            ?>
                         <label for="tennhom" style="font-size: 20px;">Nhóm sản phẩm: 
                             <select name="nhomsp" style="width: 400; height: 30px;">
                             <?php
                                while($row1 = mysqli_fetch_array($query)){ 
                                    if($row['manhom'] == $row1['manhom']){      
                             ?>
                             
                                <option selected="selected" value="<?php echo $row1['manhom']?>"><?php echo $row1['tennhom']?></option>
                             <?php 
                                }else {
                              ?>  
                                 <option value="<?php echo $row1['manhom']?>"><?php echo $row1['tennhom']?></option>   
                              <?php }
                                }
                              ?>
                              
                             </select>
                         </label>
                    </div>
                     <button name="sua" value="Sửa" style="margin-left: 200px; margin-top: 30px; background: #FFCBA0; height: 30px; width: 200px; font-weight: bold; border-radius: 28; text-align: center; font-size: 14px;">Lưu</button>
                </form>
            </div>
        </div>
    </body>
 </html>
 <?php ob_flush();?>