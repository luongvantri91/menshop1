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
            ?>
            <div id="content">
                 <?php
                    if(isset($_SESSION['admin'])){
                        unset($_SESSION["admin"]);
                      //  unset($_SESSION["giohang"]);
                        header("Location: loginAdmin.php");
                    }else{
                        echo 'ko co session';
                    }
                ?>  
            </div>
        </div>
    </body>
 </html>
<?php ob_flush();?>