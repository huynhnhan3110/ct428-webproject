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
    <title>Thêm sản phẩm</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
            <h2 class="themsp_heading">Thêm sản phẩm mới</h2>
            <p class="themsp_desc">Vui lòng điền đầy đủ thông tin bên dưới để thêm sản phẩm mới</p>
            <form action="./xuly_themsp.php" 
            enctype="multipart/form-data"
            method="POST">
                <div class="form__container">
                <table bgcolor="lightblue" class="bangthemsp">
                    <tr>
                        <td>Tên sản phẩm</td>
                        <td>
                            <input type="text" name="tensp" id="tensp">
                        </td>
                    </tr>
                    <tr>
                        <td>Chi tiết sản phẩm</td>
                        <td>
                            <textarea name="chitietsp" id="chitietsp" cols="50" rows="10"></textarea>
                            
                        </td>
                    </tr>
                    <tr>
                        <td>Giá sản phẩm</td>
                        <td>
                            <input type="text" name="giasp" id="giasp">
                            <span>(VND)</span>
                        </td>
                    </tr>
                    <tr>
                        <td>Hình đại diện</td>
                        <td>
                            <input type="file" name="hinhdaidien" id="hinhdaidien">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Lưu sản phẩm">
                            <input type="reset" value="Làm lại">
                        </td>
                    </tr>
                </table>
                </div>
            </form>
</body>
</html>