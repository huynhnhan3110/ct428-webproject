<?php
    session_start();
    if(isset($_SESSION['username'])) {
        unset($_SESSION['username']);
        unset($_SESSION['idtv']);
        header("Location: ./dangnhap.php"); 
    }
?>