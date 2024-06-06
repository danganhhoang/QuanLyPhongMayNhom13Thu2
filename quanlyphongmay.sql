-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 03, 2024 lúc 07:27 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlyphongmay`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichdatphong`
--

CREATE TABLE `lichdatphong` (
  `maLichDat` int(11) NOT NULL,
  `maPhong` int(11) NOT NULL,
  `maNguoiDung` int(11) NOT NULL,
  `ngayDat` date NOT NULL,
  `thoiGianBatDau` datetime NOT NULL,
  `thoiGianKetThuc` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `lichdatphong`
--

INSERT INTO `lichdatphong` (`maLichDat`, `maPhong`, `maNguoiDung`, `ngayDat`, `thoiGianBatDau`, `thoiGianKetThuc`) VALUES
(1, 1, 1, '2023-06-01', '2023-06-01 08:00:00', '2023-06-01 10:00:00'),
(2, 2, 2, '2023-06-01', '2023-06-01 10:30:00', '2023-06-01 12:30:00'),
(3, 3, 3, '2023-06-02', '2023-06-02 09:00:00', '2023-06-02 11:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichsusudung`
--

CREATE TABLE `lichsusudung` (
  `maSuDung` int(11) NOT NULL,
  `maMay` int(11) NOT NULL,
  `maNguoiDung` int(11) NOT NULL,
  `thoiGianBatDau` datetime NOT NULL,
  `thoiGianKetThuc` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `lichsusudung`
--

INSERT INTO `lichsusudung` (`maSuDung`, `maMay`, `maNguoiDung`, `thoiGianBatDau`, `thoiGianKetThuc`) VALUES
(1, 1, 1, '2023-06-01 08:00:00', '2023-06-01 10:00:00'),
(2, 2, 2, '2023-06-01 10:30:00', '2023-06-01 12:30:00'),
(3, 3, 3, '2023-06-02 09:00:00', '2023-06-02 11:00:00'),
(4, 10, 7, '2024-05-25 05:51:19', '2024-06-03 05:51:19'),
(5, 8, 5, '2024-05-26 05:51:19', '2024-05-27 05:51:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `maytinh`
--

CREATE TABLE `maytinh` (
  `maMay` int(11) NOT NULL,
  `maPhong` int(11) NOT NULL,
  `tenMay` varchar(100) NOT NULL,
  `cauHinh` varchar(255) NOT NULL,
  `trangThai` varchar(50) NOT NULL,
  `hinhAnh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `maytinh`
--

INSERT INTO `maytinh` (`maMay`, `maPhong`, `tenMay`, `cauHinh`, `trangThai`, `hinhAnh`) VALUES
(1, 1, 'Máy Tính 1', 'Core i5, 8GB RAM, 256GB SSD', 'Hoạt động', 'hinh1.jpg'),
(2, 1, 'Máy Tính 2', 'Core i7, 16GB RAM, 512GB SSD', 'Hoạt động', 'hinh2.jpg'),
(3, 2, 'Máy Tính 3', 'Core i3, 4GB RAM, 128GB SSD', 'Đang sửa chữa', 'hinh3.jpg'),
(5, 2, 'Máy Tính 5', 'Core i7, 16GB RAM, 512GB SSD', 'Hoạt động', 'hinh5.jpg'),
(6, 5, 'Máy Tinh 6', 'Core i9, 32GB RAM, 512GB SSD', 'Đang sửa chữa', 'hinh6.jpg'),
(7, 5, 'Máy Tính 7', 'Core i7, 32GB RAM, 512GB SSD', 'Hoạt động', 'hinh7.jpg'),
(8, 3, 'Máy Tính 8', 'Core i7, 16GB RAM, 512GB SSD', 'Lỗi hoạt động', 'hinh4.jpg'),
(14, 4, 'Máy Tính 14', 'Core i9, 64GB RAM, 512GB SSD', 'Hoạt động', 'hinh9.jpg'),
(20, 1, 'Máy Tính 20', 'Core i5, 16GB RAM, 256GB SSD', 'Hoạt động', 'hinh8.jpg'),
(25, 5, 'Máy Tính 25', 'Core i5, 16GB RAM, 256GB SSD', 'Đang sửa chữa', 'hinh10.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `maNguoiDung` int(11) NOT NULL,
  `anhNguoiDung` text NOT NULL,
  `tenNguoiDung` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `matKhau` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`maNguoiDung`, `anhNguoiDung`, `tenNguoiDung`, `email`, `matKhau`) VALUES
(1, 'anh1.jpg', 'Phạm Hùng Duy', 'phamhungduy@gmail.com', 'duy123'),
(2, 'anh2.jpg', 'Nguyễn Thị Huyền', 'nguyenthihuyen@gmail.com', 'huyen456'),
(3, 'anh3.jpg', 'Lê Hồng Vân', 'lehongvan@gmail.com', 'van789'),
(4, 'anh4.jpg', 'Nguyễn Mạnh Cao', 'nguyenmanhcao@gmail.com', 'cao123'),
(5, 'anh5.jpg', 'Lưu Hà Như', 'luuhanhu@gmail.com', 'nhu456'),
(6, 'anh6.jpg\r\n', 'Lê Thùy Linh', 'lethuylinh@gmail.com', 'linh789'),
(7, 'anh7.jpg', 'Tạ Minh Huy', 'taminhhuy@gmail.com', 'huy123'),
(8, 'anh8.jpg', 'Nguyễn Văn Quý', 'nguyenvanquy@gmail.com', 'quy456'),
(9, 'anh9.jpg', 'Lưu Khánh An', 'luukhanhan@gmail.com', 'an789'),
(10, 'anh10.jpg', 'Ngô Minh ', 'ngominh@gmail.com', 'minh123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoiquanly`
--

CREATE TABLE `nguoiquanly` (
  `maQuanLy` int(11) NOT NULL,
  `tenQuanLy` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `soDienThoai` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoiquanly`
--

INSERT INTO `nguoiquanly` (`maQuanLy`, `tenQuanLy`, `email`, `soDienThoai`) VALUES
(1, 'Nguyễn Văn Dương', 'nguyenvanduong@gmail.com', '0123456789'),
(2, 'Trần Thị Bích Tiên', 'tranthibichtien@gmail.com', '0987654321'),
(3, 'Lê Văn Chương', 'levanchuong@gmail.com', '0123987654'),
(4, 'Hồ Phúc Trọng', 'hophuctrong@gmail.com', '0909738473'),
(5, 'Lê Hữu Đức', 'lehuuduc@gmail.com', '0919283749');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phongmay`
--

CREATE TABLE `phongmay` (
  `maPhong` int(11) NOT NULL,
  `tenPhong` varchar(100) NOT NULL,
  `viTri` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phongmay`
--

INSERT INTO `phongmay` (`maPhong`, `tenPhong`, `viTri`) VALUES
(1, 'Phòng A101', 'Tầng 1, Khu A'),
(2, 'Phòng B201', 'Tầng 2, Khu B'),
(3, 'Phòng C301', 'Tầng 3, Khu C'),
(4, 'Phòng D201', 'Tầng 2, Khu D'),
(5, 'Phòng A309', 'Tầng 3, Khu A');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `lichdatphong`
--
ALTER TABLE `lichdatphong`
  ADD PRIMARY KEY (`maLichDat`);

--
-- Chỉ mục cho bảng `lichsusudung`
--
ALTER TABLE `lichsusudung`
  ADD PRIMARY KEY (`maSuDung`);

--
-- Chỉ mục cho bảng `maytinh`
--
ALTER TABLE `maytinh`
  ADD PRIMARY KEY (`maMay`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`maNguoiDung`);

--
-- Chỉ mục cho bảng `nguoiquanly`
--
ALTER TABLE `nguoiquanly`
  ADD PRIMARY KEY (`maQuanLy`);

--
-- Chỉ mục cho bảng `phongmay`
--
ALTER TABLE `phongmay`
  ADD PRIMARY KEY (`maPhong`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
