<?php
    session_start();
    require 'conn.php';
    if(isset($_SESSION['username'])) {
        $idsp = $_SESSION['idsp'];
        $tensp = $_POST['tensp'];
        $chitietsp = $_POST['chitietsp'];
        $giasp = $_POST['giasp'];
        $duongdan = 'sanpham/'.$_FILES['hinhdaidien']['name'];

        // $con = new mysqli("localhost","id16220826_nhan","Pz@>i/z3O|mO6/NH","id16220826_buoi3");
        // $con->set_charset("utf8");
		$sql = "";
		if(($_FILES['hinhdaidien']['name'])) {
			$sql = "UPDATE sanpham SET tensp='$tensp', chitietsp='$chitietsp', giasp='$giasp', hinhanhsp='$duongdan'
                            WHERE idsp = '$idsp'";
			move_uploaded_file($_FILES['hinhdaidien']['tmp_name'],
                        $duongdan);
		} else {
			$sql = "UPDATE sanpham SET tensp='$tensp', chitietsp='$chitietsp', giasp='$giasp'
                            WHERE idsp = '$idsp'";
		}
        
        
        
        $con->query($sql);
        $con->close();
        unset($_SESSION['idsp']); // go bo session idsp
        header("Location: ./danhsachsp.php");
    } else {
        echo "<p>Bạn chưa đăng nhập</p>";
    }
?>