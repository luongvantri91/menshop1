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
                if (isset($_SESSION['username'])){
                    $username = $_SESSION['username']; 
                    $r_ktra =mysqli_query($dbc,"select * from donhang where username = '".$username."'");
                
                
                
  
            ?>
            <div class="content"> 
                <div class="cart">
                    <h2 style="text-align: center; margin-top: 50px;">Thông Tin Đơn hàng</h2>
                    <table style="border-collapse: collapse;border: 1px solid;; width: 1000px; display: table; margin-left: 20px; margin-top: 30px;">
                        <thead style="background: silver; font-size: 20px; font: bolder;">
                            <tr>
                                <td>Mã Đơn Hàng</td>
                                <td>Ngày đặt hàng</td>
                                <td>Tổng tiền</td>
                                <td>Họ tên</td>      
                                <td>Địa chỉ</td>
                                <td>Sô điện thoại</td>
                                <td>Trạng thái</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            
                            while($row = mysqli_fetch_array($r_ktra)){
                                       
                        ?>
                        
                            <form action="" method="POST">
                                <tr>
                                    <td><?php echo $row['madh']?></td>
                                    <td><?php echo $row['ngaydh']?></td>
                                    <td><?php echo $row['tongtien']?></td>
                                    <td> <?php echo $row['hotennn']?>
                                    <td><?php echo $row['diachinn']?></td>
                                    <td><?php echo $row['sdt']?></td>
                                    <td><?php if($row['trangthaitt'] == 1){
                                            echo "Đã thanh toán";
                                        }else echo "Chưa thanh toán";
                                        ?></td>
                                    <td><a href="ctdh.php?id_dh=<?php echo $row['madh']?>" style="color: #FFCBA0; text-decoration: none; font-weight: bold;">Chi tiết</a></td>
                                </tr>
                            </form>
                        <?php }
                         ?>
                        </tbody>
                    </table>
                    
                </div>                  
            </div>   
            <?php }else echo "Bạn chưa đăng nhập!";
             include('includes/footer.php');
    		?>	

     </div>
	</body>
</html>