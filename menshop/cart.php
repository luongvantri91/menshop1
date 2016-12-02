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
             if(isset($_SESSION['giohang'])){   
                    
                    if(isset($_GET['xoasp'])){
                        $id = $_GET['xoasp'];
                        for($i = 0; $i < count($_SESSION['giohang']); $i++){
                                if($_SESSION['giohang'][$i]["id"] == $id){
                                    unset($_SESSION['giohang'][$i]);
                                    if($_SESSION['giohang'] == NUll){ 
                                        unset($_SESSION['giohang']);
                                        header("Location: index.php");
                                      //  echo "không có sản phẩm trong giỏ hàng";
                                    }else{
                                        header("Location: cart.php");
                                    }
                                    
                                    
                                    break;
                                }                                                                     
                        }                        
                    } 
 
                    if(isset($_GET['suasp'])){
                        $id = $_GET['suasp'];
                        header('Location: suacart.php?suacart='.$id.'');
                    //    $sql=mysqli_query($dbc,"select soluong from sanpham where masp='".$id."'");
                     //   $r=mysqli_fetch_array($sql);
                     //   $sluong = $_POST['sua'];
                   //     $sluong = (int) $sluong;
                     //   $slsp = $r['soluong'];
                      //  echo $sluong; echo $slsp; echo $id;
                     //   if($sluong > $slsp){
                    //        header('Location: cart.php?masp='.$id.'&d=1');
                      //  }else if($sluong <= 0){
                      //      header('Location: cart.php?masp='.$id.'&e=1');
                      //  }else{
                       //     for($i = 0; $i < count($_SESSION['giohang']); $i++){
                      //             if($_SESSION['giohang'][$i]["soluong"] != $sluong){
                       //              $_SESSION['giohang'][$i]["soluong"] = $sluong;
                       //                break;     
                      //             } 
                       //     }                                                                       
                             
                            
                 }                                                           
                 $_SESSION['giohang']=array_values($_SESSION['giohang']);
            ?>
            <div class="content"> 
                <div class="cart">
                     <a> <?php if(isset($_GET['d'])) echo "Không đủ sản phẩm trong kho";
                                if(isset($_GET['e'])) echo "Nhập sai dữ liệu";
                            ?></a>
                    <h2 style="text-align: center; margin-top: 50px;">Thông Tin Giỏ Hàng</h2>    
                    <table style="border-collapse: collapse;border: 1px solid;; width: 800px; display: table; margin-left: 100px; margin-top: 30px;">
                        <thead style="background: silver; font-size: 20px; font: bolder;">
                            <tr>
                                <td>Hình Ảnh</td>
                                <td>Tên Sản Phẩm</td>
                                <td>Mã Sản Phẩm</td>
                                <td>Size</td>
                                <td>Giá</td>      
                                <td>Số Lượng</td>
                                <td>Thành Tiềń</td>
                                <td>Xóa    </td>
                            </tr>
                        </thead>
                       
                        <?php
                            if(isset($_SESSION['giohang'])){
                                for($i = 0; $i < count($_SESSION['giohang']); $i++){
                                    $q_cart ="select * from sanpham where masp ='".$_SESSION['giohang'][$i]['id']."'";
                                    $r_cart =mysqli_query($dbc,$q_cart);
                                    $row = mysqli_fetch_array($r_cart);            
                        ?>
                         
                         <form action="" method="POST">
                            <tbody>
                                <tr>
                                    <td><img src="/menshop/images/<?php echo $row['anhsp']?>" style="width: 50px; height=80px"/></td>
                                    <td><?php echo $row['tensp']?></td>
                                    <td><?php echo $row['masp']?></td>
                                    <td>M</td>
                                    <td> <?php echo $row['gia'] ?></td>
                                    <td >
                                        
                                       <?php echo $_SESSION['giohang'][$i]["soluong"]?>
                                        
                                        
                                        <a href="?suasp=<?php echo $_SESSION['giohang'][$i]["id"] ?>" style="color: #FFCBA0; text-decoration: none; font-weight: bold; margin-left: 10px;">Sửa</a>
                                    </td>
                                    <td><?php echo ($_SESSION['giohang'][$i]["soluong"]*$row['gia'])?> VNĐ</td>
                                    <td>
                                        
                                    <a href="?xoasp=<?php echo $_SESSION['giohang'][$i]["id"] ?>" style="color: #FFCBA0; text-decoration: none; font-weight: bold;">Xóa</a>
                                        
                                    </td>
                                
                                </tr>
                            </tbody>
                         </form>
                        <?php
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
                    
                </div>                  
            </div>   
            <?php
             include('includes/footer.php');
            
             //}else if($_SESSION['giohang']){ unset($_SESSION['giohang']);
             }else echo "Không có sản phẩm trong giỏ hàng" ;
            
             
    		?>	

     </div>
	</body>
</html>
<?php ?> <?php ob_flush();?>