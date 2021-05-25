<?php
    require 'conn.php';
    // lay du lieu ve server
    $tendangnhap = $_POST['username'];
    $matkhau = $_POST['pass'];
    $matkhau = md5($matkhau);
    $duongdan = 'img/'.$_FILES['avatar']['name'];
    move_uploaded_file($_FILES['avatar']['tmp_name'],$duongdan);

    $gioitinh = $_POST['gender'];
    $nghenghiep = $_POST['nghenghiep'];
    $sothich = $_POST['sothich'];

    $st = "";
    foreach($sothich as $giatri) {
        $st = $st . $giatri . ',';
    }
    $st=substr($st, 0, -1);
    // $con = new mysqli("localhost","id16220826_nhan","Pz@>i/z3O|mO6/NH","id16220826_buoi3");
    // $con->set_charset("utf8");

    $sql = "INSERT INTO thanhvien(tendangnhap, matkhau, hinhanh, gioitinh, nghenghiep, sothich)
                        VALUES('$tendangnhap','$matkhau','$duongdan','$gioitinh','$nghenghiep','$st')";
    
    $result = $con->query($sql);
    $con->close();
    // header("Location: ./dangnhap.php");
    header("Refresh: 3; URL=./dangnhap.php");
    echo "Đăng ký thành công !!!<br/>Bạn sẽ chuyển đến trang đăng nhập trong giây lát...";
?>