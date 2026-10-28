-- Cơ sở dữ liệu: tmdt
CREATE DATABASE IF NOT EXISTS `tmdt` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `tmdt`;

-- --------------------------------------------------------

-- 1. Cấu trúc bảng `congty` và dữ liệu mẫu
DROP TABLE IF EXISTS `congty`;
CREATE TABLE `congty` (
  `idcty` int(11) NOT NULL AUTO_INCREMENT,
  `tencty` varchar(150) NOT NULL,
  `diachi` text DEFAULT NULL,
  `dienthoai` varchar(20) DEFAULT NULL,
  `fax` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idcty`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `congty` (`idcty`, `tencty`, `diachi`, `dienthoai`, `fax`) VALUES
(1, 'Điện thoại Oppo', '72 Trần Hưng Đạo, Quận 5, TP.HCM', '0911223344', '0283855001'),
(2, 'Điện thoại Vivo', '18 Điện Biên Phủ, Bình Thạnh, TP.HCM', '0922334455', '0283855002'),
(3, 'Điện thoại Nokia', '260 Hai Bà Trưng, Quận 3, TP.HCM', '0933445566', '0283855003'),
(4, 'Điện thoại Realme', 'KCN Sóng Thần, Dĩ An, Bình Dương', '0944556677', '0274366004');

-- --------------------------------------------------------

-- 2. Cấu trúc bảng `taikhoan` (Tài khoản đăng nhập trên website)
DROP TABLE IF EXISTS `taikhoan`;
CREATE TABLE `taikhoan` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hodem` varchar(50) DEFAULT NULL,
  `ten` varchar(30) DEFAULT NULL,
  `phanquyen` int(11) DEFAULT 2,
  `landangnhapcuoi` datetime DEFAULT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `taikhoan` (`iduser`, `username`, `password`, `hodem`, `ten`, `phanquyen`, `landangnhapcuoi`) VALUES
(1, 'admin', 'admin', 'Trần Văn', 'Đạt', 1, '2026-10-28 08:15:00'),
(2, 'tranngocnguyen', 'nguyen@2026', 'Trần Ngọc', 'Nguyên', 2, '2026-10-28 09:20:00'),
(3, 'lehoangminh', 'minh@2026', 'Lê Hoàng', 'Minh', 2, '2026-10-28 10:05:00'),
(4, 'phamthuha', 'ha@2026', 'Phạm Thu', 'Hà', 2, '2026-10-28 11:40:00');

-- --------------------------------------------------------

-- 3. Cấu trúc bảng `sanpham` (Để trống không có dữ liệu sẵn)
DROP TABLE IF EXISTS `sanpham`;
CREATE TABLE `sanpham` (
  `idsp` int(11) NOT NULL AUTO_INCREMENT,
  `tensp` varchar(150) NOT NULL,
  `gia` decimal(12,2) DEFAULT NULL,
  `mota` text DEFAULT NULL,
  `hinh` varchar(255) DEFAULT NULL,
  `giamgia` decimal(5,2) DEFAULT 0.00,
  `idcty` int(11) DEFAULT NULL,
  PRIMARY KEY (`idsp`),
  KEY `idcty` (`idcty`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;