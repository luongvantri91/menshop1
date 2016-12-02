<?php
session_start();
//tiến hành kiểm tra là người dùng đã đăng nhập hay chưa
//nếu chưa, chuyển hướng người dùng ra lại trang đăng nhập

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
        ?>
            <?php
            
            include('includes/header.php');
            include('includes/menu.php');
            ?>   
            <div class="content">   
                <?php
                    include('includes/mysqli_connect.php');
                    $jquery = mysqli_query($dbc,"select * from sanpham where manhom = 'ASM'");
                ?>    
                            <div class="aosomi">
                            <h2 class="aosm"><a href="asm.php">Áo Sơ Mi</a></h2>
                            <ul>
                                <?php while($row = mysqli_fetch_array($jquery)){?>
                                <li><a href="ctsp.php?masp=<?php echo $row["masp"] ?>">
                                    <img src="/menshop/images/aosomi/<?php echo $row["anhsp"] ?>" width="200" height="250" />
                                    <p><?php echo $row["tensp"] ?></p>
                                    <p><?php echo $row["gia"] ?> VND</p>   
                                                              
                                </a>
                                
                                </li>
                                <?php }
                                 ?>       
                                
                      
                            </ul>
                        </div>
                         
                </div>
                        
                                   
               
            
            
              <?php
             include('includes/footer.php');
    		?>	
            
            
        
        
        
      
        
    
     </div>
	</body>
</html>