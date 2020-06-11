-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 11, 2020 lúc 03:35 PM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `boardgame`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `maHoaDon` int(11) NOT NULL,
  `maSanPham` int(11) NOT NULL,
  `soLuong` int(11) NOT NULL,
  `donGia` int(11) NOT NULL,
  `thanhTien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `maDonHang` int(11) NOT NULL,
  `maKhachHang` int(11) NOT NULL,
  `maGiaoHang` int(11) NOT NULL,
  `ngayLapHoaDon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tongTien` int(11) NOT NULL,
  `trangThai` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `maGioHang` int(11) NOT NULL,
  `maSanPham` int(11) NOT NULL,
  `maLoai` int(11) NOT NULL,
  `sessionId` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `soLuongSanPham` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tenSanPham` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mieuTaSanPham` text COLLATE utf8_unicode_ci NOT NULL,
  `donGia` int(11) NOT NULL,
  `hinhAnhSanPham` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `maHoaDon` int(11) NOT NULL,
  `maKhachHang` int(11) NOT NULL,
  `ngayDat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tongTien` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `maKhachHang` int(11) NOT NULL,
  `tenDangNhap` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `matKhau` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hoKhachHang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tenKhachHang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `soDienThoai` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `diaChi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `diaChiGiaoHang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gmailKhachHang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trangThai` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `maLoaiSanPham` int(11) NOT NULL,
  `tenLoaiSanPham` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quantri`
--

CREATE TABLE `quantri` (
  `tenDangNhap` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `matKhau` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tenNguoiQuanTri` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `emailNguoiQuanTri` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trangThai` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Active',
  `maVaiTro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `quantri`
--

INSERT INTO `quantri` (`tenDangNhap`, `matKhau`, `tenNguoiQuanTri`, `emailNguoiQuanTri`, `trangThai`, `maVaiTro`) VALUES
('admin', 'e10adc3949ba59abbe56e057f20f883e', 'Phát', 'tanphat@gmail.com', 'Active', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `maSanPham` int(11) NOT NULL,
  `maLoaiSanPham` int(11) NOT NULL,
  `tenSanPham` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `soLuong` int(11) NOT NULL,
  `donGia` int(11) NOT NULL,
  `mieuTa` text COLLATE utf8_unicode_ci NOT NULL,
  `hinhAnh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trangThai` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vaitro`
--

CREATE TABLE `vaitro` (
  `maVaiTro` int(11) NOT NULL,
  `tenVaiTro` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`maHoaDon`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`maDonHang`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`maGioHang`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`maHoaDon`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`maKhachHang`);

--
-- Chỉ mục cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`maLoaiSanPham`);

--
-- Chỉ mục cho bảng `quantri`
--
ALTER TABLE `quantri`
  ADD PRIMARY KEY (`tenDangNhap`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`maSanPham`);

--
-- Chỉ mục cho bảng `vaitro`
--
ALTER TABLE `vaitro`
  ADD PRIMARY KEY (`maVaiTro`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  MODIFY `maHoaDon` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `maDonHang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `maGioHang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `maHoaDon` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `maKhachHang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  MODIFY `maLoaiSanPham` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `maSanPham` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
