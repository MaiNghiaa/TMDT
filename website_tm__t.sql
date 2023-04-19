-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 17, 2022 lúc 04:05 AM
-- Phiên bản máy phục vụ: 10.4.25-MariaDB
-- Phiên bản PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `website tmđt`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh mục`
--

CREATE TABLE `danh mục` (
  `id_product_type` int(11) NOT NULL,
  `product_type` varchar(50) NOT NULL,
  `Status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hình ảnh`
--

CREATE TABLE `hình ảnh` (
  `id_photo` int(11) NOT NULL,
  `fle_photo` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `id_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hóa đơn`
--

CREATE TABLE `hóa đơn` (
  `id_bill` int(11) NOT NULL,
  `Id_khach_hang` int(11) NOT NULL,
  `id_shipping` int(11) NOT NULL,
  `id_payment` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hóa đơn chi tiết`
--

CREATE TABLE `hóa đơn chi tiết` (
  `id_bill` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(200) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_hang`
--

CREATE TABLE `khach_hang` (
  `id_guest` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `birthday` date NOT NULL,
  `status` tinyint(4) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `point` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `liên hệ`
--

CREATE TABLE `liên hệ` (
  `id_contact` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(250) NOT NULL,
  `facebook` varchar(80) NOT NULL,
  `title` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phản hồi`
--

CREATE TABLE `phản hồi` (
  `id_feedback` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `ngay_gui` datetime NOT NULL,
  `content` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phương thức thanh toán`
--

CREATE TABLE `phương thức thanh toán` (
  `id_payment` int(11) NOT NULL,
  `name_payment` varchar(200) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phương thức vận chuyển`
--

CREATE TABLE `phương thức vận chuyển` (
  `id_shipping` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sản phẩm`
--

CREATE TABLE `sản phẩm` (
  `id_product` int(11) NOT NULL,
  `Product` varchar(200) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `infomation` text NOT NULL,
  `Status` tinyint(4) NOT NULL,
  `id_product_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `danh mục`
--
ALTER TABLE `danh mục`
  ADD PRIMARY KEY (`id_product_type`);

--
-- Chỉ mục cho bảng `hình ảnh`
--
ALTER TABLE `hình ảnh`
  ADD PRIMARY KEY (`id_photo`,`id_product`),
  ADD KEY `id_product` (`id_product`);

--
-- Chỉ mục cho bảng `hóa đơn`
--
ALTER TABLE `hóa đơn`
  ADD PRIMARY KEY (`id_bill`,`Id_khach_hang`,`id_shipping`,`id_payment`),
  ADD KEY `id_shipping` (`id_shipping`),
  ADD KEY `id_payment` (`id_payment`),
  ADD KEY `Id_khach_hang` (`Id_khach_hang`);

--
-- Chỉ mục cho bảng `hóa đơn chi tiết`
--
ALTER TABLE `hóa đơn chi tiết`
  ADD PRIMARY KEY (`id_bill`,`id_product`),
  ADD KEY `id_product` (`id_product`);

--
-- Chỉ mục cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`id_guest`);

--
-- Chỉ mục cho bảng `liên hệ`
--
ALTER TABLE `liên hệ`
  ADD PRIMARY KEY (`id_contact`);

--
-- Chỉ mục cho bảng `phản hồi`
--
ALTER TABLE `phản hồi`
  ADD PRIMARY KEY (`id_feedback`);

--
-- Chỉ mục cho bảng `phương thức thanh toán`
--
ALTER TABLE `phương thức thanh toán`
  ADD PRIMARY KEY (`id_payment`);

--
-- Chỉ mục cho bảng `phương thức vận chuyển`
--
ALTER TABLE `phương thức vận chuyển`
  ADD PRIMARY KEY (`id_shipping`);

--
-- Chỉ mục cho bảng `sản phẩm`
--
ALTER TABLE `sản phẩm`
  ADD PRIMARY KEY (`id_product`,`id_product_type`),
  ADD KEY `id_product_type` (`id_product_type`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `danh mục`
--
ALTER TABLE `danh mục`
  MODIFY `id_product_type` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hình ảnh`
--
ALTER TABLE `hình ảnh`
  MODIFY `id_photo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hóa đơn`
--
ALTER TABLE `hóa đơn`
  MODIFY `id_bill` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hóa đơn chi tiết`
--
ALTER TABLE `hóa đơn chi tiết`
  MODIFY `id_bill` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `id_guest` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `liên hệ`
--
ALTER TABLE `liên hệ`
  MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `phản hồi`
--
ALTER TABLE `phản hồi`
  MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `phương thức thanh toán`
--
ALTER TABLE `phương thức thanh toán`
  MODIFY `id_payment` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `phương thức vận chuyển`
--
ALTER TABLE `phương thức vận chuyển`
  MODIFY `id_shipping` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `hình ảnh`
--
ALTER TABLE `hình ảnh`
  ADD CONSTRAINT `hình ảnh_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `sản phẩm` (`id_product`);

--
-- Các ràng buộc cho bảng `hóa đơn`
--
ALTER TABLE `hóa đơn`
  ADD CONSTRAINT `hóa đơn_ibfk_1` FOREIGN KEY (`id_shipping`) REFERENCES `phương thức vận chuyển` (`id_shipping`),
  ADD CONSTRAINT `hóa đơn_ibfk_2` FOREIGN KEY (`id_payment`) REFERENCES `phương thức thanh toán` (`id_payment`),
  ADD CONSTRAINT `hóa đơn_ibfk_3` FOREIGN KEY (`Id_khach_hang`) REFERENCES `khach_hang` (`id_guest`);

--
-- Các ràng buộc cho bảng `hóa đơn chi tiết`
--
ALTER TABLE `hóa đơn chi tiết`
  ADD CONSTRAINT `hóa đơn chi tiết_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `sản phẩm` (`id_product`),
  ADD CONSTRAINT `hóa đơn chi tiết_ibfk_3` FOREIGN KEY (`id_bill`) REFERENCES `hóa đơn` (`id_bill`);

--
-- Các ràng buộc cho bảng `sản phẩm`
--
ALTER TABLE `sản phẩm`
  ADD CONSTRAINT `sản phẩm_ibfk_1` FOREIGN KEY (`id_product_type`) REFERENCES `danh mục` (`id_product_type`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
