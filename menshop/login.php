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
            ?>
            <div id="content">
                <?php
                    require_once('includes/mysqli_connect.php');
                    if(isset($_POST["submit"])){
                        $username = $_POST["username"];
                        $password = $_POST["password"];
                        $username = strip_tags($username);
                        $username = addslashes($username);
                        $password = strip_tags($password);
                        $password = addslashes($password);
                        if($username == "" || $password == ""){
                            echo "Username hoặc Password không được để trống!";
                        }else{
                            $sql = "select * from khachhang where username = '$username' and password = '$password'";
                            $query = mysqli_query($dbc,$sql);
			                 $num_rows = mysqli_num_rows($query);
                            if($num_rows == 0){
                                echo "Username hoặc password không đúng!";
                            }else{
                                $_SESSION['username'] = $username;
                                header('location: index.php');
                            }
                        }
                    }
                ?>
  
              <form id="login" action="" method="post">
                    <fieldset>
                        <legend>Đăng nhập</legend>
                        <div>
                            <label for="User Name">Tên tài khoản: </label>
                            <input type="text" name="username" value=""/>
                        </div>
                        <div>
                            <label for="password">Mật khẩu:</label>
                            <input type="password" name="password" id="password" tabindex="2"/>
                        </div>
                    </fieldset>
                    <div><input type="submit" id="submit" name="submit" value="Đăng nhập"/></div>
                </form>
                       
                
            </div>
            <?php
                include('includes/footer.php');
            ?>
        </div>
    </body>
 </html>
 <?php ob_flush();?>