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
            include('includes/mysqli_connect.php');
            ?>   
            <div class="content">                           
               <div class="aosomi">
                        <h2 class="aosm"><a href="asm.php">Áo Sơ Mi</a></h2>
                        <ul>
                            <li><a href="ctsp.php?masp=<?php echo "ASM01" ?>">
                                <img src="images/aosomi/s1.jpg" width="200" height="250" />
                                <span>-10%</span>
                                <p>Áo Sơ Mi A01</p>
                                <p>180000 VND</p>   
                                                          
                            </a>
                            
                            </li>
                            
                            <li><a href="ctsp.php?masp=<?php echo "ASM02" ?>">
                                <img src="images/aosomi/s2.jpg" width="200" height="250" />
                                <p>Áo Sơ Mi A02</p>
                                <p>180000 VND</p>
                            </a></li>
                            
                            <li><a href="ctsp.php?masp=<?php echo "ASM03" ?>">
                                <img src="images/aosomi/s3.jpg" width="200" height="250" />
                                <span>-20%</span>
                                <p>Áo Sơ Mi A03</p>
                                <p>200000 VND</p>
                            </a></li>
                            
                            <li><a href="ctsp.php?masp=<?php echo "ASM04" ?>">
                                <img src="images/aosomi/s4.jpg" width="200" height="250" />
                                <p>Áo Sơ Mi A04</p>
                                <p>200000 VND</p>
                            </a></li>
                        </ul>
                    </div>
                    
                    <div class="aothun">
                        <h2 class="aot"><a href="at.php">Áo Thun</a></h2>
                        <ul>
                            <li><a href="ctsp.php?masp=<?php echo "AT01" ?>">
                                <img src="images/aothun/t1.jpg" width="200" height="250" />
                                <p>Áo Thun T01</p>
                                <p>150000 VND</p>
                            </a></li>
                            
                            <li><a href="ctsp.php?masp=<?php echo "AT02" ?>">
                                <img src="images/aothun/t2.jpg" width="200" height="250" />
                                <span>-15%</span>
                                <p>Áo Thun T02</p>
                                <p>150000 VND</p>
                            </a></li>
                            
                            <li><a href="ctsp.php?masp=<?php echo "AT03" ?>">
                                <img src="images/aothun/t3.jpg" width="200" height="250" />
                                <span>-10%</span>
                                <p>Áo Thun T03</p>
                                <p>130000 VND</p>
                            </a></li>
                            
                            <li><a href="ctsp.php?masp=<?php echo "AT04" ?>">
                                <img src="images/aothun/t4.jpg" width="200" height="250" />
                                <p>Áo Thun T04</p>
                                <p>160000 VND</p>
                            </a></li>
                        </ul>
                    </div>
                    
                    <div class="quanjean">
                        <h2 class="quanj"><a href="qj.php">Quần Jean</a></h2>
                        <ul>
                            <li><a href="ctsp.php?masp=<?php echo "QJ01" ?>">
                                <img src="images/quanjean/j1.jpg" width="200" height="250" />
                                <span>-15%</span>
                                <p>Quần Jean QJ01</p>
                                <p>300000 VND</p>
                            </a></li>
                            
                            <li><a href="ctsp.php?masp=<?php echo "QJ02" ?>">
                                <img src="images/quanjean/j2.jpg" width="200" height="250" />
                                <p>Quần Jean QJ02</p>
                                <p>320000 VND</p>
                            </a></li>
                            
                            <li><a href="ctsp.php?masp=<?php echo "QJ03" ?>">
                                <img src="images/quanjean/j3.jpg" width="200" height="250" />
                                <p>Quần Jean QJ03</p>
                                <p>350000 VND</p>
                            </a></li>
                            
                            <li><a href="ctsp.php?masp=<?php echo "QJ04" ?>">
                                <img src="images/quanjean/j4.jpg" width="200" height="250" />
                                <span>-20%</span>
                                <p>Quần Jean QJ04</p>
                                <p>300000 VND</p>
                            </a></li>
                        </ul>
                    </div>
                    
                     <div class="quankaki">
                        <h2 class="quankk"><a href="qkk.php">Quần Kaki</a></h2>
                        <ul>
                            <li><a href="ctsp.php?masp=<?php echo "QK01" ?>">
                                <img src="images/quankk/k1.jpg" width="200" height="250" />
                                <p>Quần Kaki QK01</p>
                                <p>250000 VND</p>
                            </a></li>
                            
                            <li><a href="ctsp.php?masp=<?php echo "QK02" ?>">
                                <img src="images/quankk/k2.jpg" width="200" height="250" />
                                <p>Quần Kaki QK02</p>
                                <p>250000 VND</p>
                            </a></li>
                            
                            <li><a href="ctsp.php?masp=<?php echo "QK03" ?>">
                                <img src="images/quankk/k3.jpg" width="200" height="250" />
                                <span>-10%</span>
                                <p>Quần Kaki QK03</p>
                                <p>250000 VND</p>
                            </a></li>
                            
                            <li><a href="ctsp.php?masp=<?php echo "QK04" ?>">
                                <img src="images/quankk/k4.jpg" width="200" height="250" />
                                <p>Quần Kaki QK04</p>
                                <p>250000 VND</p>
                            </a></li>
                        </ul>
                    </div>
                    
                    <div class="giay">
                        <h2 class="giaytt"><a href="giay.php">Giày</a></h2>
                        <ul>
                            <li><a href="ctsp.php?masp=<?php echo "G01" ?>">
                                <img src="images/giaytt/g1.jpg" width="200" height="250" />
                                <span>-15%</span>
                                <p>Giày G01</p>
                                <p>320000 VND</p>
                            </a></li>
                            
                            <li><a href="ctsp.php?masp=<?php echo "G02" ?>">
                                <img src="images/giaytt/g2.jpg" width="200" height="250" />
                                <p>Giày G02</p>
                                <p>300000 VND</p>
                            </a></li>
                            
                            <li><a href="ctsp.php?masp=<?php echo "G03" ?>">
                                <img src="images/giaytt/g3.jpg" width="200" height="250" />
                                <span>-15%</span>
                                <p>Giày G03</p>
                                <p>300000 VND</p>
                            </a></li>
                            
                            <li><a href="ctsp.php?masp=<?php echo "G04" ?>">
                                <img src="images/giaytt/g4.jpg" width="200" height="250" />
                                <span>-10%</span>   
                                <p>Giày G04</p>
                                <p>320000 VND</p>
                            </a></li>
                        </ul>
                    </div>
            
            </div>
            
            <?php
             include('includes/footer.php');
    		?>
            
     </div>
	</body>
</html>