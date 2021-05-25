-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 25, 2021 at 12:46 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id16220826_buoi3`
--

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `idsp` int(11) NOT NULL,
  `tensp` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `chitietsp` text COLLATE utf8_unicode_ci NOT NULL,
  `giasp` bigint(20) NOT NULL,
  `hinhanhsp` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `idtv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`idsp`, `tensp`, `chitietsp`, `giasp`, `hinhanhsp`, `idtv`) VALUES
(10, 'BMW x5', 'Xe hơi của Đức', 2900000000, 'sanpham/IMG_6329.jpg', 575),
(13, 'Áo thun tay lỡ GENZ phông Unisex', 'Bạn quá chán nản với những chiếc áo thun giá rẻ ghi 100% cotton bán tràn lan trên Shopee nhưng mặc vào thì nóng, bí và khó chịu.\r\nSuốt một thời gian dài các nhãn hàng áo phông lạm dụng từ \"100% cotton\" một cách vô tội vạ và không chỉ ra được cho người tiêu dùng một định nghĩa đúng về 100% cotton.', 189000, 'sanpham/20210403095621-102f_wm.jpeg', 579),
(17, 'Áo NIKE JUST DO IT', 'Áo phông Nike chính hãng AR5007-063 chiếc áo thun ngắn tay mềm mại với họa tiết đơn giản là slogan “Just do it” của nhà Nike. Thiết kế ôm vừa vặn, chất liệu vải mịn có độ co giãn tốt giúp tạo cảm giác thoải mái cho người mặc. Áo thun Nike phù hợp mặc cho mọi loại hình vận động, tập thể dục hay chỉ mang thường ngày.', 250000, 'sanpham/07-063-nike-original-imaffuhbffxg2nqb_9f14dbbb5bae476796d448a4221ec393_88e6941119cc4052b469871d203b726f_master.jpg', 581),
(18, 'Máy tính dell', 'mau xam', 15000000, 'sanpham/dell.jpg', 586),
(19, 'Máy tính asus', 'mau den', 17000000, 'sanpham/asus.jpg', 586),
(20, 'Mercedes-Benz  C300', 'Dễ nhận thấy C300 AMG Facelift 2021 có thiết kế đèn mới', 1900000000, 'sanpham/mercedes-c300-amg-facelift-ra-mat-tai-viet-nam.jpg', 573),
(21, 'Honda Civic', 'Năm 2018 vừa chính thức được giới thiệu ra thị trường Việt Nam hôm nay với 2 phiên bản tiêu chuẩn là S450 L và S450 L Luxury.', 900000000, 'sanpham/civic.jpg', 573),
(22, 'BMW 520i', 'BMW 520i và 530i là 2 phiên bản mới nhất của dòng 5-Series thế hệ thứ 7 được Trường Hải ra mắt tại Việt Nam vào ngày 19/1/2019.', 2300000000, 'sanpham/gan-cuoi-thang-6-xe-sang-bmw-520i-giam-gia-gan-400-trieu.jpg', 573),
(23, '1', 'wwwww', 10000, 'sanpham/TMBNT - 9.png', 572),
(24, '2', 'wwwwwwwww', 100002, 'sanpham/TLHHV-3.png', 572);

-- --------------------------------------------------------

--
-- Table structure for table `thanhvien`
--

CREATE TABLE `thanhvien` (
  `id` int(11) NOT NULL,
  `tendangnhap` char(16) COLLATE utf8_unicode_ci NOT NULL,
  `matkhau` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `hinhanh` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `gioitinh` char(4) COLLATE utf8_unicode_ci NOT NULL,
  `nghenghiep` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `sothich` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `thanhvien`
--

INSERT INTO `thanhvien` (`id`, `tendangnhap`, `matkhau`, `hinhanh`, `gioitinh`, `nghenghiep`, `sothich`) VALUES
(572, 'oanh', 'c4ca4238a0b923820dcc509a6f75849b', 'img/ngoai-that-thiet-ke-ngoai-that-dang-cap.jpg', 'Nam', 'Sinh viên', 'Thời trang'),
(573, 'nhan', 'c4ca4238a0b923820dcc509a6f75849b', 'img/ngoai-that-mat-ben-2-Tucson.jpg', 'Nữ', 'Giáo viên', 'Âm nhạc,Thời trang'),
(574, 'abc', '900150983cd24fb0d6963f7d28e17f72', 'img/', 'Nam', 'Sinh viên', 'Thể thao,Âm nhạc'),
(575, 'longle', 'c4ca4238a0b923820dcc509a6f75849b', 'img/cd22759997a37bfd22b2.jpg', 'Nam', 'Sinh viên', 'Du lịch'),
(576, 'Ho Chi minh', '202cb962ac59075b964b07152d234b70', 'img/', 'Nam', 'Học sinh', 'Thể thao'),
(579, 'congoc', 'c4ca4238a0b923820dcc509a6f75849b', 'img/colorado_gallery_2.jpg', 'Nữ', 'Giáo viên', 'Thời trang'),
(580, 'nhanngoc', '0d033b42741823c0729a37ce5234f57e', 'img/20210403095623-1d1a_wm.jpeg', 'Nữ', 'Giáo viên', 'Thời trang'),
(581, 'phucpham', '2e2492784a8e8d615abb697156dd94e1', 'img/phucpham.jpg', 'Nam', 'Sinh viên', 'Thể thao'),
(582, 'longle2243', 'edeb9e0dde07cbf999780a88e4503a55', 'img/Screenshot (95).png', 'Nam', 'Sinh viên', 'Thể thao,Du lịch,Âm nhạc,Thời trang'),
(583, 'nhanb2', 'aea461323e69d5a9ac4ec3e45dd05cf8', 'img/20210403095621-102f_wm.jpeg', 'Nam', 'Giáo viên', 'Âm nhạc'),
(585, 'longle123', '30b6a539654a36b2a202457576a2f46c', 'img/trailblazer_gallery_2.jpg', 'Nữ', 'Học sinh', 'Thể thao'),
(586, 'My123456', 'b51d5af6c801ff4bfd31a4a154f35d35', 'img/huongduong1.png', 'Nữ', 'Sinh viên', 'Thể thao,Thời trang'),
(587, 'nhanb33', 'b93b52eb33c1f4900031f44e375e6740', 'img/mercedes-c300-amg-facelift-ra-mat-tai-viet-nam.jpg', 'Khác', 'Sinh viên', 'Âm nhạc'),
(588, 'abcdef', 'aa7c9c12fc740955ef4dfad670250ff4', 'img/plus.png', 'Khác', 'Học sinh', 'Thể thao,Du lịch'),
(589, 'longb2', '64baca37bb81999f2df223019e236208', 'img/profile-pic (1).png', 'Nam', 'Học sinh', 'Thể thao'),
(595, 'slongb', '33ceef4907f291dd0b03dffa297e9064', 'img/B612_20210127_182838_067.png', 'Nam', 'Học sinh', 'Thể thao'),
(599, 'longb23', '64baca37bb81999f2df223019e236208', 'img/B612_20210127_182838_067.png', 'Nam', 'Học sinh', 'Thể thao'),
(600, 'slongb3', '33ceef4907f291dd0b03dffa297e9064', 'img/20210403095621-102f_wm.jpeg', 'Nữ', 'Học sinh', 'Thời trang'),
(601, 'slongb33', '33ceef4907f291dd0b03dffa297e9064', 'img/20210403095623-1d1a_wm.jpeg', 'Nam', 'Khác', 'Thể thao'),
(602, 'nhan1s', '49e411205df6172ab5a9f769d4d81f78', 'img/civic.jpg', 'Nam', 'Sinh viên', 'Du lịch'),
(603, 'nhanb1', '7855b1709f35dd4f86bbe045fb9df1c4', 'img/icon.jpg', 'Nam', 'Học sinh', 'Thể thao'),
(604, 'aloha123', '04fad68c2bb599c9260cd1f7fd2c50e9', 'img/Gearvn_hoàng hôn_ (48).jpg', 'Nam', 'Học sinh', 'Thể thao');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`idsp`),
  ADD KEY `idtv` (`idtv`);

--
-- Indexes for table `thanhvien`
--
ALTER TABLE `thanhvien`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tendangnhap` (`tendangnhap`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `idsp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `thanhvien`
--
ALTER TABLE `thanhvien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=605;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`idtv`) REFERENCES `thanhvien` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
