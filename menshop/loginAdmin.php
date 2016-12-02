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
                            $sql = "select * from khachhang where username = '$username' and password = '$password' and role=1";
                            $query = mysqli_query($dbc,$sql);
			                 $num_rows = mysqli_num_rows($query);
                            if($num_rows == 0){
                                echo "Username hoặc password không đúng!";
                            }else{
                                $_SESSION['admin'] = $username;
                               // echo "đangngap";
                                header('Location: admin.php');
                            }
                        }
                    }
                ?>
  
              <form id="login" action="" method="post">
                    <fieldset>
                        <legend style="text-align: center;">Đăng nhập Quản Trị</legend>
                        <div style="text-align: center; margin-left: 200px;">
                            <label for="User Name">Tên tài khoản: 
                            <input type="text" name="username" value=""/>
                            </label>
                        </div>
                        <div style="text-align: center;margin-left: 205px;">
                            <label for="password">Mật khẩu:
                            <input type="password" name="password" id="password" tabindex="2"/>
                            </label>
                        </div>
                    </fieldset>
                    <div style="text-align: center;"><input type="submit" id="submit" name="submit" value="Đăng nhập"/></div>
                </form>
                       
                
            </div>
  
        </div>
    </body>
 </html>
 <?php ob_flush();?>