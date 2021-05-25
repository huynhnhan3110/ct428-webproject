<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/png" sizes="16x16" href="../favicon-16x16.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style-dk.css">
    <link rel="stylesheet" href="./css/reset.css">
    <title>Đăng ký</title>

</head>

<body>
    <div class="register">
        <h2 class="register-title">Đăng ký tài khoản mới</h2>

        <!-- <p style="text-align: center;">Vui lòng điền đầy đủ thông tin bên dưới để đăng ký tài khoản mới</p> -->
    
        <form action="xuly_dangky.php" method="POST"
        enctype="multipart/form-data" onsubmit="return checkSignUp()">
                
        <div class="register-field">
            <i class="fa fa-user-circle register-icon"></i>
            <input class="register-input" type="text" onchange="checkTdn(this.value)" name="username" id="username" placeholder="Tên đăng nhập">
            
       </div>
       <span class="thongbaoloi" id="tdnthongbao">Tên đăng nhập không hợp lệ</span>
       <span id="trungtendn"></span>
       <div class="register-field">
        <i class="fa fa-lock register-icon"></i>
            <input type="password" class="register-input" name="pass" id="pass" placeholder="Mật khẩu">
        </div>
        <span class="thongbaoloi" id="mkthongbao">Mật khẩu là chữ và số, phải từ 6 đến 15 ký tự</span>
        <div class="register-field">  
            <i class="fa fa-lock register-icon"></i>
            <input type="password" class="register-input" name="repass" id="repass" placeholder="Nhập lại mật khẩu">
        </div>
        <span class="thongbaoloi" id="remkthongbao">Mật khẩu không khớp</span>
        <div class="register-field">
            <p style="width: 130px;">Hình đại diện</p>
            <input type="file" name="avatar" id="avatar">
            
        </div>    
        <span class="thongbaoloi" id="avatarthongbao">Vui lòng chọn hình đại diện</span>    
        <div class="register-field">
            <p>Giới tính</p>
            <label for="male" class="container"> Nam
                <input type="radio" name="gender" value="Nam" id="male" checked>
                <span class="checkmark radius-checkmark"></span>
            </label>  
            <label for="female" class="container"> Nữ
                <input type="radio" name="gender" value="Nữ" id="female">
                <span class="checkmark radius-checkmark"></span>
            </label>
            <label for="other" class="container"> Khác
                <input type="radio" name="gender" value="Khác" id="other">
                <span class="checkmark radius-checkmark"></span>
            </label>  
        </div>
            
        <div class="register-field">
        <p>Nghề nghiệp</p>
                    <select name="nghenghiep">
    
                        <option value="Học sinh">Học sinh</option>
    
                        <option value="Sinh viên">Sinh viên</option>
    
                        <option value="Giáo viên">Giáo viên</option>
    
                        <option value="Khác">Khác</option>
    
                    </select>
        </div>
        <div class="register-field sothich">
                    <p>Sở thích</p>
                    <table border="1">
                        <tr>
                            <td><label class="container">Thể thao
                                <input type="checkbox" name="sothich[]" value="Thể thao" id="sport" checked>
                                <span class="cb-checkmark"></span>        
                            </label> 
            
                            <label class="container">Du lịch
                                <input type="checkbox" name="sothich[]" value="Du lịch" id="travel">
                                <span class="cb-checkmark"></span>
                            </label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                
                            <label class="container">Âm nhạc
                                <input type="checkbox" name="sothich[]" value="Âm nhạc" id="music">
                                <span class="cb-checkmark"></span>
                            </label>
            
                            <label class="container">Thời trang
                                <input type="checkbox" name="sothich[]" value="Thời trang" id="fashion">
                                <span class="cb-checkmark"></span>
                            </label>
                            </td>
                        </tr>
                    </table>
    
        </div>     
        
        <div class="register-button">
            <input type="submit" value="Đăng ký" class="register-submit">
            <input type="reset" value="Làm lại" class="register-submit reset">
        </div>    
        </form>
    </div>
    
    <script>
        var khadung = true;
        function checkTdn(str) {
            var trungtenTxt = document.getElementById("trungtendn");
            if(str == "") {
                trungtenTxt.innerHTML = "";
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    trungtenTxt.innerHTML = this.responseText;
                    if(this.responseText == "Tên đăng nhập có thể sử dụng") {
                        khadung = true;
                        trungtenTxt.style.color = 'goldenrod';
                        
                    } else {
                        khadung = false;
                        trungtenTxt.style.color = 'red';
                        
                    }
                }
                };
                xmlhttp.open("GET","getUsername.php?username="+str,true);
                xmlhttp.send();
            }
        }
        function checkSignUp(){
            var username = document.getElementById("username").value;
            var pass = document.getElementById("pass").value;
            var repass = document.getElementById("repass").value;
            var file = document.getElementById("avatar").value;

            var tdnthongbao = document.getElementById("tdnthongbao");
            var mkthongbao = document.getElementById("mkthongbao");
            var nhaplaimk = document.getElementById("remkthongbao");
            var avatarthongbao = document.getElementById("avatarthongbao");

            
            var flag = true;
            var tdnRegex = /^[A-Za-z][A-Za-z0-9]{5,14}$/;   
            var mkRegex = /^(?=.*[0-9])(?=.*[A-Za-z])[a-zA-Z0-9]{6,15}$/; // (?=.*[0-9]) kiem tra chuoi xem co so khong, neu co tra ve true
            // (?=.*[a-zA-Z]) kiem tra chuoi xem co chu khong neu co chu thi tra ve true
            // [A-Za-z0-9] dung de bat cac truong hop co dau cach, ky tu dac biet. neu co thi tra ve false
            
            // check ten dang nhap
            if(tdnRegex.test(username)){
                console.log("Tdn dung");
                tdnthongbao.style.display = 'none';   
            } else {
                console.log("Tdn sai");
                tdnthongbao.style.display = 'block';
                flag = false;
            }
            
            // check matkhau
            if(mkRegex.test(pass)) {
                console.log("Mat khau dung "+pass);
                mkthongbao.style.display = 'none';
            } else {
                console.log("Mat khau sai dinh dang "+pass);
                mkthongbao.style.display = 'block';
                flag = false;
            }

            // check nhap lai mat khau
            if(pass != repass) {
                nhaplaimk.style.display = 'block';
                flag = false;
            } else {
                nhaplaimk.style.display = 'none';

            }

            // check hinh dai dien
            if(file == null || file == ""){
                flag = false;
                avatarthongbao.style.display = 'block';
            } else avatarthongbao.style.display = 'none';

            //check ton tai
            if(!khadung) {
                flag = false;
            }
            return flag;
        }
        
        

    </script>
    <!-- <p style="text-align: center;">Huỳnh Hữu Nhân (B1807580) - Nhóm sáng T4</p> -->
</body>
</html>