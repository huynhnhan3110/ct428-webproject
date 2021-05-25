<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
	<link rel="icon" type="image/png" sizes="16x16" href="../favicon-16x16.png">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="./css/style-dn.css">
	<link rel="stylesheet" href="./css/reset.css">
</head>
<body>
	<form action="xuly_dangnhap.php" method="POST" class="login" onsubmit="return checkLogin()">
        <h1 class="login-title">Đăng nhập</h1>
        <div class="login-field">
            <i class="fa fa-envelope login-icon"></i>
            <input type="text" name="username" class="login-input" placeholder="Tên đăng nhập" id="tendangnhap">
        </div>
        <span class="spanthongbao" id="tdnthongbao">Tên đăng nhập không được để trống</span>
        <div class="login-field">
            <i class="fa fa-lock login-icon"></i>
            <input type="password" name="pass" class="login-input" placeholder="Mật khẩu" id="matkhau">
           
        </div>
        <span class="spanthongbao" id="mkthongbao">Mật khẩu không được để trống</span>
        <p class='login-forgot-password' id="dangnhapsaitxt">Đăng nhập sai, xin vui lòng thử lại</p>
		<?php if(isset($_SESSION['incorrect']) && ($_SESSION['incorrect'])) {
                // code nay se chay khi dang nhap sai
                echo "<script>
                setTimeout('hidden()',3000);
                var dangnhapsaiTxt = document.getElementById('dangnhapsaitxt');
                dangnhapsaiTxt.style.display = 'block';
                function hidden(){
                        dangnhapsaiTxt.style.display = 'none';
                }
                </script>"; // day la cach viet code js trong code php
             
                unset($_SESSION['incorrect']); // neu da xet roi thi bo?
            }
        ?>
        <input type='submit' class="login-submit" value="Đăng nhập">
		<a href="./dangky.php" class="login-submit dangkybtn">Đăng ký</a>
    </form>

    <script>
    function checkLogin() {
        var x = document.getElementById("tendangnhap").value;
        var y = document.getElementById("matkhau").value;
        var xtb = document.getElementById("tdnthongbao");
        var ytb = document.getElementById("mkthongbao");
        var flag = true;
        if(x == null || x == "") {
            xtb.style.opacity = "1";
            flag = false;
        } else {
            xtb.style.opacity = "0";
        }
        if(y == null || y == "") {
            ytb.style.opacity = "1";
            flag = false;
        } else {
            ytb.style.opacity = "0";
        }
        
        return flag;
    }
       
    </script>
</body>
</html>
