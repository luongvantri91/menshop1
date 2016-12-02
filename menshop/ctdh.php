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
            include('includes/mysqli_connect.php');
            ?>   
            <?php
                    $id_dh = $_GET['id_dh'];
                    $r_ctdh =mysqli_query($dbc,"select * from ctdh where madh = '".$id_dh."'");
                
            ?>
            <div class="content"> 
                <div class="cart">
                    <h2 style="text-align: center; margin-top: 50px;">Chi Tiết Đơn hàng</h2>
                    <table style="border-collapse: collapse;border: 1px solid;; width: 1000px; display: table; margin-left: 20px; margin-top: 30px;">
                        <thead style="background: silver; font-size: 20px; font: bolder;">
                            <tr>
                                <td>Mã đơn hàng</td>
                                <td>Mã sản phẩm</td>
                                <td>Tên sản phẩm</td>
                                <td>Giá</td>      
                                <td>Số lượng</td>
                                
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            
                            while($row = mysqli_fetch_array($r_ctdh)){
                                $q_sp = $row['masp'];
                                $r_sp = mysqli_query($dbc,"select * from sanpham where masp ='".$q_sp."'");
                                $row1 = mysqli_fetch_array($r_sp);
                                       
                        ?>
                        
                            <form action="" method="POST">
                                <tr>
                                    <td><?php echo $row['madh']?></td>
                                    <td><?php echo $row['masp']?></td>
                                    <td><?php echo $row1['tensp']?></td>
                                    <td> <?php echo $row1['gia']?></td>
                                    <td><?php echo $row['soluong']?></td>
                                  
                                </tr>
                            </form>
                        <?php }
                         ?>
                        </tbody>
                    </table>
                    
                </div>                  
            </div>   
            <?php
             include('includes/footer.php');
    		?>	

     </div>
	</body>
</html>