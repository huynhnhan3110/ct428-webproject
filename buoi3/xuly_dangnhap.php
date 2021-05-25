<?php
    session_start();
    require 'conn.php';
    // $con = new mysqli("localhost", "id16220826_nhan","Pz@>i/z3O|mO6/NH", "id16220826_buoi3");
    if(isset($_POST['username']) && isset($_POST['pass'])) {

        $username = mysqli_real_escape_string($con,$_POST['username']); // chong hack
        $password = mysqli_real_escape_string($con,$_POST['pass']);
        $password = md5($password);

        $sql = "SELECT id, tendangnhap, matkhau FROM thanhvien WHERE tendangnhap='$username' AND matkhau='$password'";
        // echo $sql;
        $result = $con->query($sql);
        if($result->num_rows == 1) {
            $_SESSION['username'] = $username;
            $row = $result->fetch_assoc();
            $_SESSION['idtv'] = $row['id']; 
            // echo "<p>Xin chao ".$username.", bạn đã đăng nhập thành công!</p>";
            header("Location: ./thongtincanhan.php");
        } else {
            // echo "<p>Sai mật khẩu</p>";
            header("Location:dangnhap.php");
            $_SESSION['incorrect'] = true;
        }
        $con->close();
        
    }
?>
