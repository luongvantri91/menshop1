<?php
ob_start();
session_start();

?>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
	   	<link rel="stylesheet" type="text/css" href="css/style.css" title="style">
		<title>Men shop</title>
	</head>
	<body>
        
		<div class="container"> 
            
            <?php
            
                include('includes/top.php');
                include('includes/header.php');
                include('includes/menu.php');
                include('includes/mysqli_connect.php');
                include('includes/function.php');
                ?>
                <?php
                    $j =0;
                    if (isset($_POST['submit'])){
                        $masp = $_GET['masp'];
                        if (isset($_SESSION['username'])){
                            $username = $_SESSION['username'];    
                        
                            $soluong = $_POST['quantity'];
                            $soluong = (int) $soluong;
                           
                    //        $size = $_POST['menu'];
                            
                            $q_gia = "select * from sanpham where masp='".$masp."'";
                            $r_gia = mysqli_query($dbc, $q_gia);
                            $r = mysqli_fetch_array($r_gia, MYSQLI_ASSOC);  
                            $gia = $r['gia'];
                            $slsp = $r['soluong'];
                            
                            
                            
                            if(isset($_SESSION['giohang']) && is_array($_SESSION['giohang'])){
                     //           $sl = $_SESSION['giohang'][$masp]+ $soluong;
                            }
                            else{
                                 $_SESSION['giohang'] = array();
                            }
                              
                            if($soluong > $slsp){
                                header('Location: ctsp.php?masp='.$masp.'&a=1');
                            }else if($soluong <=0 || !is_numeric($soluong)){
                                header ('Location: ctsp.php?masp='.$masp.'&b=1');
                          //  }else if(!is_numeric($soluong)){
                          //      header ('Location: ctsp.php?masp='.$masp.'&c=1');
                            }else{
                           //     $soluong1 = $slsp - $soluong;
                             //   $r_sluong = mysqli_query($dbc,"update sanpham set soluong ='".$soluong1."' where masp ='".$masp."'");
                              //  $sl = $soluong;
                               // $_SESSION['giohang'][$masp]=$sl;
                                $count = count($_SESSION['giohang']);
                                $_SESSION['giohang'][$count]["id"] = $masp;
                                $_SESSION['giohang'][$count]["soluong"] = $soluong;
                                header("Location: index.php");
                            }

                        }else{
                            header("Location: login.php");
                        }
                    }else{
                     ?>   
                
            <div id="content">
                <h1>Chi Tiết Sản Phẩm</h1>
                <?php
                    $masp = $_GET["masp"];
                    $sql = "select * from sanpham where masp = '".$masp."'";
                    $ctsp = mysqli_query($dbc,$sql);
                    $row1 = mysqli_fetch_array($ctsp,MYSQLI_ASSOC);
                    
                ?>

                <div class="ctsp">
                    <div class="left">
                        <a href="#"> <img src="/menshop/images/<?php echo $row1["anhsp"] ?>" width="380" height="400"/></a>
                    </div>
                    
                    <div class="right">
                        <form id="" action="" method="post">
                            <p style="text-align: center;"><?php echo $row1["tensp"] ?></p>
                            <p >Mã Sản Phẩm: <?php echo $row1["masp"] ?> </a>
                            <p>Giá: <?php echo $row1["gia"] ?> VNĐ </p>
                            <div class="size">
                                <?php
                                    
                                    $query = mysqli_query($dbc,"SELECT size.masize,size.tensize from size_sanpham inner JOIN size on size_sanpham.masize=size.masize WHERE size_sanpham.masp='".$masp."'");
                                    
                                    
                                 ?>
                                <span>Size: </span>    <select name="menu">
                                            <?php   
                                            
                                                
                                                while($row2 = mysqli_fetch_array($query)){
                                                    
                                                
                                            ?>
                                            <option value="<?php echo $row2['masize']?>"><?php echo $row2['tensize']?></option>
                                            
                                            <?php
                                                
                                                }
                                            ?>
                                         </select>
                              </div>
                             <div class="sl">           
                                <span>Số Lượng: </span> <input type="text" name="quantity" size="2" value="1"></
                               <h2> <?php if(isset($_GET['a'])) echo "Không đủ sản phẩm trong kho";
                                            if(isset($_GET['b'])) echo "Nhập sai dữ liệu";
                                        //    if(isset($_GET['c'])) echo "Số lượng phải là số nguyên";
                                     ?></h2>
                            </div>
                            
                            <p><input style="width: 200px; height: 30px; font-size: 16px;" type="submit" id="submit" name="submit" value="Thêm vào giỏ hàng"/></p>
                        </form>
                        
                        </div>
                    </div>
                </div>
                
            </div>
               <?php }
                ?>
          <?php
             include('includes/footer.php');
    		?>	
            
        </div>
	</body>
</html>
<?php ob_flush();?>