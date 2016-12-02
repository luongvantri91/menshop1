<div class="header">
                <div class="logo" >
                     <h1>
                        <a href="index.php">Men.Shop</a>
                    </h1>
                 <span class="slogan">Phong Cách Thời Trang Nam</span> 
                </div>
                <div class="search">
                    <form class="input_search" method="GET" action="search.php" style="width: 300px; height: 120px;">
                        <input style="width: 200px;  height: 30px;" name="key" type="text" value="" placeholder="tìm sản phẩm ..." />          
                        <button style="width: 30px; height: 30px;" type="submit" name="search" value="">Tìm</button>      
                    </form>
                </div>
                <div class="giohang">
                   <ul style="width: 200; height: 70px;">
                        <li><img src="images/giohang.png" width="25" height="25" /></li>
                        <li><a href="cart.php" style="font-size: 25px; padding-right: 30px;">Giỏ hàng</a></li>    
                   </ul>
                   <ul style="width: 200px; height: 50px; margin-top: 10px">
                        <p style="margin-left: 20px;"><?php 
                                if(isset($_SESSION['giohang']))
                                    echo count($_SESSION['giohang']);
                                else
                                    echo "0";
                                
                                
                                ?> Sản Phẩm</p>
                   </ul>
                   
                </div>
            </div>