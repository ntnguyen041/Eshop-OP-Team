-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 19, 2022 lúc 06:29 PM
-- Phiên bản máy phục vụ: 10.4.25-MariaDB
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `eshopop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `invoices`
--

CREATE TABLE `invoices` (
  `id` int(10) UNSIGNED NOT NULL,
  `Code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `AccountID` int(11) NOT NULL,
  `IsuedData` date NOT NULL,
  `ShoppingAddress` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ShoppingPhone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Total` int(11) NOT NULL,
  `Status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `invoices`
--

INSERT INTO `invoices` (`id`, `Code`, `AccountID`, `IsuedData`, `ShoppingAddress`, `ShoppingPhone`, `Total`, `Status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'HD-01', 2, '2020-10-22', 'TP HCM', '1234567', 20000, '1', NULL, NULL, NULL),
(2, 'HD-02', 3, '2002-06-26', 'Đà Nẵng', '1234567', 32000, '1', NULL, NULL, NULL),
(3, 'HD-03', 2, '2021-12-03', 'TP HCM', '1234567', 12000, '1', NULL, NULL, NULL),
(4, 'HD-04', 4, '2019-09-07', 'TP HCM', '3774272', 40000, '1', NULL, NULL, NULL),
(5, 'HD-05', 3, '2006-12-11', 'Huế', '234553', 23000, '1', NULL, NULL, NULL),
(6, 'HD-06', 3, '2019-03-05', 'TP HCM', '3646574', 46400, '1', NULL, NULL, NULL),
(7, 'HD-07', 5, '2002-05-12', 'Hà Nội', '2545342', 23200, '1', NULL, NULL, NULL),
(8, 'HD-08', 2, '2002-12-11', 'TP HCM', '123456789', 65000, '1', NULL, NULL, NULL),
(9, 'HD-09', 5, '2022-11-08', 'TP HCM', '1234567', 34500, '1', NULL, NULL, NULL),
(10, 'HD-10', 3, '2012-12-12', 'TP HCM', '1234556', 43534, '1', NULL, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
