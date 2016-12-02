<?php
    ob_start(); 
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
            session_start();
            include('includes/top.php');
            include('includes/header.php');
            include('includes/menu.php');
            ?>
            <div id="content">
                 <?php
                    if(isset($_SESSION['username'])){
                        unset($_SESSION["username"]);
                        unset($_SESSION["giohang"]);
                        header("Location: index.php");
                    }else{
                        echo 'ko co session';
                    }
                ?>  
            </div>
            <?php
                include('includes/footer.php');
            ?>
        </div>
    </body>
 </html>
<?php ob_flush();?>