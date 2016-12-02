<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
	   	<link rel="stylesheet" type="text/css" href="css/style.css" title="style">
		<title>Men shop</title>
	</head>
	<body>
    
		<div class="container"> 
            <?php
            session_start();
            ob_start();
            include('includes/top.php');
            include('includes/header.php');
            include('includes/menu.php');
            include('includes/mysqli_connect.php');
            ?>   
            <?php
                $masp = $_GET['suacart'];
                $r_suacart = mysqli_query($dbc,"select * from sanpham where masp = '".$masp."'");
                $row1 = mysqli_fetch_array($r_suacart);
                if(isset($_POST['sua'])){
                    $masp = $_GET['suacart'];
                    $slsua = $_POST['sl'];
                    $slsua = (int) $slsua; 
                    $slkho = $row1['soluong']; 
                    if($slsua > $slkho){
                        header('Location: suacart.php?suacart='.$masp.'&a=1');
                    }else if($slsua <=0 || !is_int($slsua)){
                        header('Location: suacart.php?suacart='.$masp.'&b=1');
                    }else{
                        for($i = 0; $i < count($_SESSION['giohang']); $i++){
                            if($_SESSION['giohang'][$i]["id"] == $masp){
                                 //  if($_SESSION['giohang'][$i]["soluong"] != $slsua){
                                     $_SESSION['giohang'][$i]["soluong"] = $slsua;
                                       break;
                                   
                            }
                        } 
                        header('Location: cart.php');     
                    } 
                }
                
                $_SESSION['giohang']=array_values($_SESSION['giohang']);
            ?>
            <div class="content"> 
                <div class="cart">
                     <form action="" method="POST">
                    <?php
                                if(isset($_SESSION['giohang'])){
                                    for($i = 0; $i < count($_SESSION['giohang']); $i++){
                                        if($_SESSION['giohang'][$i]["id"] = $masp){
                                           
                                        $q_cart ="select * from sanpham where masp ='".$_SESSION['giohang'][$i]['id']."'";
                                        $r_cart =mysqli_query($dbc,$q_cart);
                                        $row = mysqli_fetch_array($r_cart);            
                    ?>
                    <h2 style="text-align: center; margin-top: 50px;">Thông Tin Giỏ Hàng</h2>    
                     <h3 style="margin-top: 30px; margin-left: 100px;">Sửa số lượng sản phẩm:</h3>
                    <div style="margin-top: 10px; margin-left: 100px;">
                        <label for="tennhom">Mã Sản phẩm: 
                        <?php  echo $_SESSION['giohang'][$i]["id"]?></label>
                    </div>
                    <div style="margin-top: 10px; margin-left: 100px;">
                         <label for="tennhom">Sô lượng: 
                            <input type="text" tabindex="2" name="sl" value="<?php echo $_SESSION['giohang'][$i]["soluong"]?>"/>
                            <a><?php if(isset($_GET['a'])) echo "Không đủ số lượng trong kho";
                                     if(isset($_GET['b'])) echo "Nhập sai đữ liệu";
                                ?></a>
                         </label>
                    </div>
                    <input type="submit" name="sua" value="Sửa" style="margin-left: 200px; margin-top: 10px; background: #FFCBA0; height: 30px; width: 100px; font-weight: bold; border-radius: 28; font-size: 16px;"/>
                    <table style="border-collapse: collapse;border: 1px solid;; width: 800px; display: table; margin-left: 100px; margin-top: 30px;">
                        <thead style="background: silver; font-size: 20px; font: bolder;">
                            <tr>
                                <td>Hình Ảnh</td>
                                <td>Tên Sản Phẩm</td>
                                <td>Mã Sản Phẩm</td>
                                <td>Giá</td>      
                                <td>Số Lượng</td>
                                <td>Thành Tiềń</td>
                                <td>Xóa    </td>
                            </tr>
                        </thead>
 
                            <tbody>
                                <tr>
                                    <td><img src="/menshop/images/<?php echo $row['anhsp']?>" style="width: 50px; height=80px"/></td>
                                    <td><?php echo $row['tensp']?></td>
                                    <td><?php echo $row['masp']?></td>
                                    <td> <?php echo $row['gia'] ?></td>
                                    <td> 
                                       <?php echo $_SESSION['giohang'][$i]["soluong"]?>
                                        <a href="?suasp=<?php echo $_SESSION['giohang'][$i]["id"] ?>" style="color: #FFCBA0; text-decoration: none; font-weight: bold; margin-left: 10px;">Sửa</a>
                                    </td>
                                    <td><?php echo ($_SESSION['giohang'][$i]["soluong"]*$row['gia'])?> VNĐ</td>
                                    <td>
                                        
                                    <a href="?xoasp=<?php echo $_SESSION['giohang'][$i]["id"] ?>" style="color: #FFCBA0; text-decoration: none; font-weight: bold;">Xóa</a>
                                        
                                    </td>
                                
                                </tr>
                            </tbody>
                        
                        <?php  break;
                                        }
                            }   
                         }else{
                            echo "Không Có Sản Phẩm!";
                         }
                        ?>
                            
                        
                    </table>
                        <span>
                            <a href="index.php"><button style="margin-left: 100px; margin-top: 20px; background: #FFCBA0; height: 30px; width: 180px; font-weight: bold; border-radius: 28; font-size: 16px;">Tiếp Tục Mua Hàng</button></a>
                            <a href="ttdh.php"><input type="submit" name="muahang" value="Mua Hàng" style="margin-left: 100px; margin-top: 20px; background: #FFCBA0; height: 30px; width: 180px; font-weight: bold; border-radius: 28; font-size: 16px;"/></a>
                        </span>
                    <p style="float: right; margin-right: 220px; margin-top: 25px; font-weight: bold; font-size: 18px;">Tổng Tiền: 
                                <?php 
                                $tongtien = 0;
                                for($i = 0; $i < count($_SESSION['giohang']); $i++){
                                    $q_cart = "select * from sanpham where masp ='".$_SESSION['giohang'][$i]['id']."'";
                                    $r_cart = mysqli_query($dbc,$q_cart);
                                    $row = mysqli_fetch_array($r_cart);
                                    $tongtien = $tongtien + ($_SESSION['giohang'][$i]["soluong"]*$row['gia']);
                                
                                } echo $tongtien;      
                                ?> VNĐ</p>
                     </form>
                </div>                  
            </div>   
            <?php
             include('includes/footer.php');
  
    		?>	

     </div>
	</body>
</html>
<?php ?> <?php ob_flush();?>