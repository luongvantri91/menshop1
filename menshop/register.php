
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
	   	<link rel="stylesheet" type="text/css" href="css/style.css" title="style">
		<title>Men shop</title>
	</head>
	<body>
        
		<div class="container"> 
            <?php
                ob_start();
                include('includes/top.php');
                include('includes/header.php');
                include('includes/menu.php');
                include('includes/mysqli_connect.php');
                include('includes/function.php');
                ?>
            <div id="content">
                <?php
                    #require_once('includes/mysqli_connect.php');
                    if($_SERVER['REQUEST_METHOD'] == 'POST'){
                        $error = array();
                        //mac dinh truong nhap la FALSE
                        $username = $fullname = $diachi = $sdt = $email = $password = FALSE;
                        
                        if(preg_match('/^[\w\.-]{2,20}$/i',trim($_POST['username']))){
                            $username = mysqli_real_escape_string($dbc,trim($_POST['username']));
                        }else{
                            $error[] = "username";
                        }
                        
                        if(preg_match('/^[\w\.\s-]{2,50}$/u',trim($_POST['fullname']))){
                            $fullname = mysqli_real_escape_string($dbc,trim($_POST['fullname']));
                        }else{
                            $error[] = "fullname";
                        }
                        if(preg_match('/^[\w\.\s-]{2,50}$/u',trim($_POST['diachi']))){
                            $diachi = mysqli_real_escape_string($dbc,trim($_POST['diachi']));
                        }else{
                            $error[] = "diachi";
                        }
                        if(preg_match('/([0-9]){10,11}$/i',trim($_POST['sdt']))){
                            $sdt = mysqli_real_escape_string($dbc,trim($_POST['sdt']));
                        }else{
                            $error[] = "sdt";
                        }
                        if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
                            $email = mysqli_real_escape_string($dbc,$_POST['email']);
                        }else{
                            $error[] = "email";
                        }
                        if(preg_match('/^[\w;.-]{8,20}$/',trim($_POST['password']))){
                            if($_POST['password'] == $_POST['password2']){
                               $password = mysqli_real_escape_string($dbc,trim($_POST['password'])); 
                            }else{
                                $error[] = "Password not match";
                            }
                        }else{
                            $error[] = "password";
                        }
                        
                        
                        
                        if($username && $fullname && $diachi && $sdt && $email && $password){
                            $q = "SELECT username FROM khachhang WHERE username = '{$username}'";
                            $r = mysqli_query($dbc,$q);
                            confirm_query($r,$q);
                            
                            if(mysqli_num_rows($r) == 0){
                                //neu email con trong, thi cho phep dang ki
                                //tao 1 activation key
                               
                                    
                                //chen vao csdl
                                $q_insert = "INSERT INTO khachhang(username,fullname, diachi, sdt, email, password,role) 
                                        VALUES('{$username}', '{$fullname}','{$diachi}','{$sdt}','{$email}','{$password}',0)";
                                $r_insert = mysqli_query($dbc,$q_insert);
                                confirm_query($r_insert,$q_insert);
                                header('location: login.php');
                                
                                
                            }else{
                                $message = "<p class='warning'>username đã có người đăng kí</p>";
                            }
                        }else{
                            $message = "<p class='warning'>Hãy điền đầy đủ thông tin</p>";
                        }
                        
                    } //end main IF
                ?>
               
            
               
                    <form action="register.php" method="post">
                    <?php if(!empty($message)) echo $message;?>
                    <fieldset>
                        <legend>Đăng kí tài khoản</legend>
                        <div>
                            <label for="User Name">Tên tài khoản: <span class="required">*</span>
                            <?php
                                if(isset($error) && in_array('username',$error)) 
                                    echo "<span class='warning'>nhập username</span>"; 
                            ?>
                             </label>                         
                            <input type="text" tabindex="1" name="username" value="<?php if(isset($_POST['username'])) echo $_POST['username']?>"/>
                            
                        </div>
                        <div>
                            <label for="Full Name">Họ tên: <span class="required">*</span>
                            <?php
                                if(isset($error) && in_array('fullname',$error)) 
                                    echo "<span class='warning'>nhập fullname</span>"; 
                            ?>
                            </label>
                            <input type="text" tabindex="2" name="fullname" value="<?php if(isset($_POST['fullname'])) echo $_POST['fullname']?>"/>
                        </div>
                        <div>
                            <label for="Dia Chi">Địa Chỉ: <span class="required">*</span>
                            <?php
                                if(isset($error) && in_array('diachi',$error)) 
                                    echo "<span class='warning'>nhập địa chỉ</span>"; 
                            ?>
                            </label>
                            <input type="text" tabindex="3" name="diachi" value="<?php if(isset($_POST['diachi'])) echo $_POST['diachi']?>"/>
                        </div>
                        <div>
                            <label for="sdt">Số Điện Thoại: <span class="required">*</span>
                            <?php
                                if(isset($error) && in_array('sdt',$error)) 
                                    echo "<span class='warning'>nhập số điện thoại</span>"; 
                            ?>
                            </label>
                            <input type="text" tabindex="4" name="sdt" value="<?php if(isset($_POST['sdt'])) echo $_POST['sdt']?>"/>
                        </div>
                        <div>
                            <label for="email">Email: <span class="required">*</span>
                            <?php
                                if(isset($error) && in_array('email',$error)) 
                                    echo "<span class='warning'>nhập email</span>"; 
                            ?>
                            </label>
                            <input type="text" tabindex="5" name="email"  value="<?php if(isset($_POST['email'])) echo htmlentities($_POST['email'],ENT_COMPAT,'UTF-8')?>">
                           
                        </div>
                                   
                                    
                        <div>
                            <label for="password">Mật khẩu: <span class="required">*</span>
                            <?php
                                if(isset($error) && in_array('password',$error)) 
                                    echo "<span class='warning'>nhập password</span>"; 
                            ?> 
                            </label>
                            <input type="password" tabindex="6" name="password"<?php if(isset($_POST['password'])) echo $_POST['password']?>/>
                        </div> 
                        <div>
                            <label for="password">Xác nhận mật khẩu: <span class="required">*</span>
                            <?php
                                if(isset($error) && in_array('Password not match',$error)) 
                                    echo "<span class='warning'>password không đúng</span>"; 
                            ?> 
                             </label>
                            <input type="password" tabindex="7" name="password2"<?php if(isset($_POST['password2'])) echo $_POST['password2']?>/>
                        </div>                                       
                    </fieldset>
                    <p><input type="submit" value="Đăng kí" name="submit"/></p>
                </form>
            </div>
            
          <?php
             include('includes/footer.php');
    		?>	
            
        </div>
	</body>
</html>
 <?php ob_flush();?>