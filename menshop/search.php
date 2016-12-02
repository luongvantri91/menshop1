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
                <h2 style="margin-top: 50px;">Kết Quả Tìm Kiếm</h2>
                <?php
                    include('includes/mysqli_connect.php');
                   
                    $search= mysqli_query($dbc,"select * from sanpham where tensp like '%{$_GET['key']}%'");
                    
                ?>
                            <ul>
                                <?php while($row = mysqli_fetch_array($search)){?>
                                <li style="float: left; padding: 10px; margin-top: 20px;">
                                    <a style="text-decoration: none;" href="ctsp.php?masp=<?php echo $row["masp"] ?>">
                                        <img src="/menshop/images/<?php echo $row["anhsp"] ?>" width="200" height="250" />
                                        <p style="text-align: center;"><?php echo $row["tensp"] ?></p>
                                        <p style="text-align: center;"><?php echo $row["gia"] ?> VND</p>   
                                                                  
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