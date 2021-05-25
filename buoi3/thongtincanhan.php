<?php session_start(); 
    if(!isset($_SESSION['username'])) {
                    header("Location: ./dangnhap.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/png" sizes="16x16" href="../favicon-16x16.png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/style-ttcn.css">
    <title>Thông tin cá nhân</title>
</head>
<body>
    <?php
        // hien thi ra ngoai
                
            require 'conn.php';
            // $con = new mysqli("localhost","id16220826_nhan","Pz@>i/z3O|mO6/NH","id16220826_buoi3");
            $sqlselect = "SELECT * FROM thanhvien WHERE tendangnhap ='".$_SESSION["username"]."'";
            $resultselect = $con->query($sqlselect);
            $row = $resultselect->fetch_assoc();
            echo "<h1 class='headerxinchao'>Chào bạn ".$row['tendangnhap']."!</h1>";
            echo "<table bgcolor='lightblue' class='bangthongtin'>";
                echo "<tr>
                    <td style='
                                background-size: cover;
                                background-image: url(".$row['hinhanh'].");
                                width: 345px;
                                border-bottom-left-radius: 39px;
                                border-top-left-radius: 39px;
                                background-position: center;'>
                    </td>
                    <td class='infotext'>
                        <h3><span>Thông tin cá nhân</span></h3>
                        <p><strong>Nickname:</strong> ".$row['tendangnhap']."</p>
                        <p><strong>Giới tính:</strong> ".$row['gioitinh']."</p>
                        <p><strong>Nghề nghiệp:</strong> ".$row['nghenghiep']."</p>
                        <p><strong>Sở thích:</strong> ".$row['sothich']."</p>
                        <div class='buttonarea'>
                            <a href='./themsanpham.php' class='dangxuat_btn'>Thêm sản phẩm</a>
                            <a href='./danhsachsp.php' class='dangxuat_btn'>Danh sách sản phẩm</a>
                            <a href='./logout.php' class='dangxuat_btn'>Đăng xuất</a>
                        </div>
                    </td>
                    
                </tr>";
            echo "</table>";
    ?>
    
</body>
</html>