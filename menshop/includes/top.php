<div class="top">
                
                <ul>
                    <?php
                       
                        if (isset($_SESSION['username'])){
                            ?>
                            <!-- co session-->
                            
                    <li><a style="font-size: 20px; padding-right:20px;">Chào <?php 
                        echo $_SESSION['username'];
                        
                        ?>
                        </a>
                        
                    
                    </li>
                    <li><a href="logout.php" style="font-size: 20px; padding-right:20px;">Thoát</a></li>
                   
                    <li><a href="#" style="font-size: 20px; padding-right:20px;">Điện thoại: 01667476284 <a>
                        
                    </li>
                        <?php
                        } else{
                            
                       ?>

                    <li><a href="login.php" style="font-size: 20px; padding-right:20px;">Đăng Nhập</a></li>
                    <li><a href="register.php" style="font-size: 20px; padding-right:20px;">Đăng Ký</a></li>
                    <li><a href="#" style="font-size: 20px; padding-right:20px;">Điện thoại: 1900 1557 <a></li>
                    <?php
                     }
                    ?>
                </ul>
</div>