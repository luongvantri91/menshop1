<?php 
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
            ?>   
            <div class="content"> 
                <h2 style="margin-top: 50px;">Sản Phẩm Khuyến Mãi</h2>
                <?php
                    include('includes/mysqli_connect.php');
                   
                    $km= mysqli_query($dbc,"select * from sanpham where khuyenmai >0");
                    
                ?>
                            <ul>
                                <?php while($row = mysqli_fetch_array($km)){?>
                                <li style="float: left; padding: 10px; margin-top: 20px; position: relative;">
                                    <a style="text-decoration: none;" href="ctsp.php?masp=<?php echo $row["masp"] ?>">
                                        <img src="/menshop/images/<?php echo $row["anhsp"] ?>" width="200" height="250" />
                                        <span style="position: absolute; right: 15%; top: 15%; background-color: red;">-<?php echo $row['khuyenmai']?>%</span>
                                        <p style="text-align: center;"><?php echo $row["tensp"] ?></p>
                                        <p style="line-through; text-align: center;"><?php echo $row["gia"] ?> VND</p>   
                                                               
                                    </a>
                                
                                </li>
                                <?php }
                                 ?>       
                                
                      
                            </ul>
                
            </div>
            
            
              <?php
             include('includes/footer.php');
    		?>	
            
            
        
        
        
      
        
    
     </div>
	</body>
</html>                