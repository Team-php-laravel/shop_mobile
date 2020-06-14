-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 14, 2020 lúc 12:22 PM
-- Phiên bản máy phục vụ: 10.3.16-MariaDB
-- Phiên bản PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_kiotviet`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoa_don`
--

CREATE TABLE `hoa_don` (
  `id` int(10) UNSIGNED NOT NULL,
  `khach_hang_id` int(10) UNSIGNED NOT NULL,
  `san_pham_id` int(10) UNSIGNED NOT NULL,
  `sl_mua` int(11) NOT NULL DEFAULT 1,
  `tong_tien` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoa_don`
--

INSERT INTO `hoa_don` (`id`, `khach_hang_id`, `san_pham_id`, `sl_mua`, `tong_tien`, `create_by`, `created_at`, `updated_at`) VALUES
(1, 1, 9, 1, '1500000', NULL, NULL, NULL),
(17, 11, 1, 1, '15000000', NULL, '2020-06-14 01:55:28', '2020-06-14 01:55:28'),
(18, 12, 1, 1, '15000000', NULL, '2020-06-14 02:05:24', '2020-06-14 02:05:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_hang`
--

CREATE TABLE `khach_hang` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_kh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dia_chi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dien_thoai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loai_kh` int(11) NOT NULL DEFAULT 1,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khach_hang`
--

INSERT INTO `khach_hang` (`id`, `ten_kh`, `dia_chi`, `email`, `dien_thoai`, `loai_kh`, `trang_thai`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Xuân H', 'Trung Đô - TP.Vinh', 'xuanhanh.setdy@gmail.com', '0336022352', 1, 1, NULL, '2020-04-26 04:07:34'),
(2, 'Lê Thị T', 'Hoàng Mai', 't@gmail.com', '0327932713', 1, 1, '2020-04-19 01:41:30', '2020-04-19 01:41:30'),
(3, 'Nguyễn Văn T', 'Văn Sơn - ĐL - NA', 't@gmail.com', '0336022352', 1, 1, '2020-04-19 02:01:05', '2020-04-19 02:01:05'),
(5, 'Công ty vinfat', 'Minh Khai - TP.Vinh', 'vinfat@gmail.com', '013456789', 0, 1, NULL, NULL),
(6, 'Công ty Fgc', '55 - duy tân - tp.Vinh', 'fgc@gmail.com', '0123456789', 0, 1, NULL, NULL),
(7, 'Nguyễn Văn A', 'Hoàng mai', NULL, '0123456456', 1, 1, '2020-05-05 18:56:33', '2020-05-05 18:56:33'),
(8, 'Nguyễn Văn A', 'abc', 'A@gmail.com', '123456', 1, 1, NULL, NULL),
(9, 'Lê Thị T', 'Hoàng Mai - Nghệ An', 'test@gmail.com', '0336022352', 1, 1, '2020-06-13 09:58:37', '2020-06-13 09:58:37'),
(10, 'Công ty vinfat123', 'Minh Khai - TP.Vinh', 'test@gmail.com', '0327932713', 0, 1, '2020-06-13 09:59:54', '2020-06-13 09:59:54'),
(11, 'Nguyễn Xuân Hạnh', 'Nghệ An', 'xuanhanh.setdy@gmail.com', '0336022352', 1, 1, '2020-06-14 01:52:31', '2020-06-14 01:52:31'),
(12, 'Nguyễn Xuân Hạnh', 'Nghệ An', 'test@gmail.com', '0336022352', 1, 1, '2020-06-14 02:05:24', '2020-06-14 02:05:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_san_pham`
--

CREATE TABLE `loai_san_pham` (
  `id` int(11) UNSIGNED NOT NULL,
  `ten_loai` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hinh_anh` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loai_san_pham`
--

INSERT INTO `loai_san_pham` (`id`, `ten_loai`, `hinh_anh`) VALUES
(1, 'Iphone', '6IStkuXj59jxeaNv.jpg'),
(2, 'Sam Sung', '0Hj4TW17OP2kHTV7.jpg'),
(3, 'Oppo', '3cW73RlwZmN8hshH.png'),
(4, 'Xiaomi', '1FI6YkmZ32ST88rV.jpg'),
(7, 'Realme', 'uSHuudsomvxMHa64.png'),
(8, 'Vivo', 'OUNijaNlGNYsSfKP.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_04_10_153345_create_cham_congs_table', 1),
(5, '2020_04_10_153415_create_san_phams_table', 1),
(6, '2020_04_10_153442_create_khach_hangs_table', 1),
(7, '2020_04_10_153455_create_nhap_khos_table', 1),
(8, '2020_04_10_153526_create_hoa_dons_table', 1),
(9, '2020_04_10_153536_create_cthds_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhap_kho`
--

CREATE TABLE `nhap_kho` (
  `id` int(10) UNSIGNED NOT NULL,
  `khach_hang_id` int(10) UNSIGNED NOT NULL,
  `san_pham_id` int(10) UNSIGNED NOT NULL,
  `sl_nhap` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhap_kho`
--

INSERT INTO `nhap_kho` (`id`, `khach_hang_id`, `san_pham_id`, `sl_nhap`, `created_at`, `updated_at`) VALUES
(7, 5, 9, 100, '2020-06-13 09:31:46', '2020-06-13 09:31:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_pham`
--

CREATE TABLE `san_pham` (
  `id` int(10) UNSIGNED NOT NULL,
  `loai_id` int(10) UNSIGNED NOT NULL,
  `ten_sp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_luong` int(11) DEFAULT 0,
  `gia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `sale` int(11) NOT NULL DEFAULT 0,
  `hinh_anh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sao` int(1) NOT NULL DEFAULT 0,
  `mo_ta` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `thong_so` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `san_pham`
--

INSERT INTO `san_pham` (`id`, `loai_id`, `ten_sp`, `so_luong`, `gia`, `sale`, `hinh_anh`, `sao`, `mo_ta`, `thong_so`, `trang_thai`, `created_at`, `updated_at`) VALUES
(1, 1, 'Iphone 4s', 100, '15000000', 2, 'Y9QBV7jiMehtPT1d.png', 4, '<p>THÔNG TIN CHƯƠNG TRÌNH</p>\r\n\r\n<p><strong>I. Hotsale</strong><br />\r\nHotsale: 0h 1/06 - 22h 14/06</p>\r\n\r\n<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td>+Oppo A52:<br />\r\n			Giá : 5.990.000đ<br />\r\n			Màu: Trắng, Đen</td>\r\n			<td>+Oppo A92:<br />\r\n			Giá : 6.990.000đ<br />\r\n			Màu: Trắng, Đen</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><strong>II.Khuyến mãi.</strong></p>\r\n\r\n<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td>+Oppo A52:<br />\r\n			- Giảm 300.000đ<br />\r\n			- Trả góp 0%</td>\r\n			<td>+Oppo A92:<br />\r\n			- Giảm 500.000đ<br />\r\n			- Trả góp 0%</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>- Trả góp 0% Oppo A52 | Oppo A92<br />\r\n+ FE CREDIT: Kỳ hạn 4 tháng, trả trước &gt; 10%<br />\r\n+ HD SAISON: Kỳ hạn 4 tháng, trả trước 30%<br />\r\n+ HOME CREDIT: Kỳ hạn 4 tháng, trả trước 40%</p>\r\n\r\n<p>Bộ bán hàng chuẩn:<br />\r\nOPPO A92 + OPPO A52: Cáp USB Type C, Củ Sạc 9V-2A, Tai nghe, Dụng cụ lấy SIM, Sách hướng dẫn, Miếng dán màn hình (Đã dán sẵn), Vỏ bảo vệ (Nhựa trong dẻo)</p>\r\n\r\n<p><strong>*Lưu ý:</strong><br />\r\n- Mỗi số ĐT mua được 2 sản phẩm.<br />\r\n- Mọi thông tin thắc mắc vui lòng comment bên dưới hoặc liên hệ tổng đài 18001060 (miễn phí). Xin cảm ơn !</p>', '4\";Ios 7;Chính 12 MP & Phụ 8 MP;16 MP;Snapdragon 665 8 nhân;6 GB;128 GB;MicroSD, hỗ trợ tối đa 256 GB;2 Nano SIM Hỗ trợ 4G;5000 mAh có sạc nhanh', 1, '2020-06-12 08:18:05', '2020-06-13 20:52:03'),
(2, 1, 'Iphone 4s', 100, '15000000', 2, 'Y9QBV7jiMehtPT1d.png', 4, '<p>THÔNG TIN CHƯƠNG TRÌNH</p>\r\n\r\n<p><strong>I. Hotsale</strong><br />\r\nHotsale: 0h 1/06 - 22h 14/06</p>\r\n\r\n<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td>+Oppo A52:<br />\r\n			Giá : 5.990.000đ<br />\r\n			Màu: Trắng, Đen</td>\r\n			<td>+Oppo A92:<br />\r\n			Giá : 6.990.000đ<br />\r\n			Màu: Trắng, Đen</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><strong>II.Khuyến mãi.</strong></p>\r\n\r\n<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td>+Oppo A52:<br />\r\n			- Giảm 300.000đ<br />\r\n			- Trả góp 0%</td>\r\n			<td>+Oppo A92:<br />\r\n			- Giảm 500.000đ<br />\r\n			- Trả góp 0%</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>- Trả góp 0% Oppo A52 | Oppo A92<br />\r\n+ FE CREDIT: Kỳ hạn 4 tháng, trả trước &gt; 10%<br />\r\n+ HD SAISON: Kỳ hạn 4 tháng, trả trước 30%<br />\r\n+ HOME CREDIT: Kỳ hạn 4 tháng, trả trước 40%</p>\r\n\r\n<p>Bộ bán hàng chuẩn:<br />\r\nOPPO A92 + OPPO A52: Cáp USB Type C, Củ Sạc 9V-2A, Tai nghe, Dụng cụ lấy SIM, Sách hướng dẫn, Miếng dán màn hình (Đã dán sẵn), Vỏ bảo vệ (Nhựa trong dẻo)</p>\r\n\r\n<p><strong>*Lưu ý:</strong><br />\r\n- Mỗi số ĐT mua được 2 sản phẩm.<br />\r\n- Mọi thông tin thắc mắc vui lòng comment bên dưới hoặc liên hệ tổng đài 18001060 (miễn phí). Xin cảm ơn !</p>', '4\";Ios 7;Chính 12 MP & Phụ 8 MP;16 MP;Snapdragon 665 8 nhân;6 GB;128 GB;MicroSD, hỗ trợ tối đa 256 GB;2 Nano SIM Hỗ trợ 4G;5000 mAh có sạc nhanh', 1, '2020-06-12 08:18:05', '2020-06-13 20:52:03'),
(3, 1, 'Iphone 4s', 100, '15000000', 2, 'Y9QBV7jiMehtPT1d.png', 4, '<p>THÔNG TIN CHƯƠNG TRÌNH</p>\r\n\r\n<p><strong>I. Hotsale</strong><br />\r\nHotsale: 0h 1/06 - 22h 14/06</p>\r\n\r\n<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td>+Oppo A52:<br />\r\n			Giá : 5.990.000đ<br />\r\n			Màu: Trắng, Đen</td>\r\n			<td>+Oppo A92:<br />\r\n			Giá : 6.990.000đ<br />\r\n			Màu: Trắng, Đen</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><strong>II.Khuyến mãi.</strong></p>\r\n\r\n<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td>+Oppo A52:<br />\r\n			- Giảm 300.000đ<br />\r\n			- Trả góp 0%</td>\r\n			<td>+Oppo A92:<br />\r\n			- Giảm 500.000đ<br />\r\n			- Trả góp 0%</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>- Trả góp 0% Oppo A52 | Oppo A92<br />\r\n+ FE CREDIT: Kỳ hạn 4 tháng, trả trước &gt; 10%<br />\r\n+ HD SAISON: Kỳ hạn 4 tháng, trả trước 30%<br />\r\n+ HOME CREDIT: Kỳ hạn 4 tháng, trả trước 40%</p>\r\n\r\n<p>Bộ bán hàng chuẩn:<br />\r\nOPPO A92 + OPPO A52: Cáp USB Type C, Củ Sạc 9V-2A, Tai nghe, Dụng cụ lấy SIM, Sách hướng dẫn, Miếng dán màn hình (Đã dán sẵn), Vỏ bảo vệ (Nhựa trong dẻo)</p>\r\n\r\n<p><strong>*Lưu ý:</strong><br />\r\n- Mỗi số ĐT mua được 2 sản phẩm.<br />\r\n- Mọi thông tin thắc mắc vui lòng comment bên dưới hoặc liên hệ tổng đài 18001060 (miễn phí). Xin cảm ơn !</p>', '4\";Ios 7;Chính 12 MP & Phụ 8 MP;16 MP;Snapdragon 665 8 nhân;6 GB;128 GB;MicroSD, hỗ trợ tối đa 256 GB;2 Nano SIM Hỗ trợ 4G;5000 mAh có sạc nhanh', 1, '2020-06-12 08:18:05', '2020-06-13 20:52:03'),
(4, 1, 'Iphone 4s', 100, '15000000', 2, 'Y9QBV7jiMehtPT1d.png', 4, '<p>THÔNG TIN CHƯƠNG TRÌNH</p>\r\n\r\n<p><strong>I. Hotsale</strong><br />\r\nHotsale: 0h 1/06 - 22h 14/06</p>\r\n\r\n<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td>+Oppo A52:<br />\r\n			Giá : 5.990.000đ<br />\r\n			Màu: Trắng, Đen</td>\r\n			<td>+Oppo A92:<br />\r\n			Giá : 6.990.000đ<br />\r\n			Màu: Trắng, Đen</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><strong>II.Khuyến mãi.</strong></p>\r\n\r\n<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td>+Oppo A52:<br />\r\n			- Giảm 300.000đ<br />\r\n			- Trả góp 0%</td>\r\n			<td>+Oppo A92:<br />\r\n			- Giảm 500.000đ<br />\r\n			- Trả góp 0%</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>- Trả góp 0% Oppo A52 | Oppo A92<br />\r\n+ FE CREDIT: Kỳ hạn 4 tháng, trả trước &gt; 10%<br />\r\n+ HD SAISON: Kỳ hạn 4 tháng, trả trước 30%<br />\r\n+ HOME CREDIT: Kỳ hạn 4 tháng, trả trước 40%</p>\r\n\r\n<p>Bộ bán hàng chuẩn:<br />\r\nOPPO A92 + OPPO A52: Cáp USB Type C, Củ Sạc 9V-2A, Tai nghe, Dụng cụ lấy SIM, Sách hướng dẫn, Miếng dán màn hình (Đã dán sẵn), Vỏ bảo vệ (Nhựa trong dẻo)</p>\r\n\r\n<p><strong>*Lưu ý:</strong><br />\r\n- Mỗi số ĐT mua được 2 sản phẩm.<br />\r\n- Mọi thông tin thắc mắc vui lòng comment bên dưới hoặc liên hệ tổng đài 18001060 (miễn phí). Xin cảm ơn !</p>', '4\";Ios 7;Chính 12 MP & Phụ 8 MP;16 MP;Snapdragon 665 8 nhân;6 GB;128 GB;MicroSD, hỗ trợ tối đa 256 GB;2 Nano SIM Hỗ trợ 4G;5000 mAh có sạc nhanh', 1, '2020-06-12 08:18:05', '2020-06-13 20:52:03'),
(5, 1, 'Iphone 4s', 100, '15000000', 2, 'Y9QBV7jiMehtPT1d.png', 4, '<p>THÔNG TIN CHƯƠNG TRÌNH</p>\r\n\r\n<p><strong>I. Hotsale</strong><br />\r\nHotsale: 0h 1/06 - 22h 14/06</p>\r\n\r\n<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td>+Oppo A52:<br />\r\n			Giá : 5.990.000đ<br />\r\n			Màu: Trắng, Đen</td>\r\n			<td>+Oppo A92:<br />\r\n			Giá : 6.990.000đ<br />\r\n			Màu: Trắng, Đen</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><strong>II.Khuyến mãi.</strong></p>\r\n\r\n<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td>+Oppo A52:<br />\r\n			- Giảm 300.000đ<br />\r\n			- Trả góp 0%</td>\r\n			<td>+Oppo A92:<br />\r\n			- Giảm 500.000đ<br />\r\n			- Trả góp 0%</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>- Trả góp 0% Oppo A52 | Oppo A92<br />\r\n+ FE CREDIT: Kỳ hạn 4 tháng, trả trước &gt; 10%<br />\r\n+ HD SAISON: Kỳ hạn 4 tháng, trả trước 30%<br />\r\n+ HOME CREDIT: Kỳ hạn 4 tháng, trả trước 40%</p>\r\n\r\n<p>Bộ bán hàng chuẩn:<br />\r\nOPPO A92 + OPPO A52: Cáp USB Type C, Củ Sạc 9V-2A, Tai nghe, Dụng cụ lấy SIM, Sách hướng dẫn, Miếng dán màn hình (Đã dán sẵn), Vỏ bảo vệ (Nhựa trong dẻo)</p>\r\n\r\n<p><strong>*Lưu ý:</strong><br />\r\n- Mỗi số ĐT mua được 2 sản phẩm.<br />\r\n- Mọi thông tin thắc mắc vui lòng comment bên dưới hoặc liên hệ tổng đài 18001060 (miễn phí). Xin cảm ơn !</p>', '4\";Ios 7;Chính 12 MP & Phụ 8 MP;16 MP;Snapdragon 665 8 nhân;6 GB;128 GB;MicroSD, hỗ trợ tối đa 256 GB;2 Nano SIM Hỗ trợ 4G;5000 mAh có sạc nhanh', 1, '2020-06-12 08:18:05', '2020-06-13 20:52:03'),
(6, 1, 'Iphone 4s', 100, '15000000', 2, 'Y9QBV7jiMehtPT1d.png', 4, '<p>THÔNG TIN CHƯƠNG TRÌNH</p>\r\n\r\n<p><strong>I. Hotsale</strong><br />\r\nHotsale: 0h 1/06 - 22h 14/06</p>\r\n\r\n<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td>+Oppo A52:<br />\r\n			Giá : 5.990.000đ<br />\r\n			Màu: Trắng, Đen</td>\r\n			<td>+Oppo A92:<br />\r\n			Giá : 6.990.000đ<br />\r\n			Màu: Trắng, Đen</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><strong>II.Khuyến mãi.</strong></p>\r\n\r\n<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td>+Oppo A52:<br />\r\n			- Giảm 300.000đ<br />\r\n			- Trả góp 0%</td>\r\n			<td>+Oppo A92:<br />\r\n			- Giảm 500.000đ<br />\r\n			- Trả góp 0%</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>- Trả góp 0% Oppo A52 | Oppo A92<br />\r\n+ FE CREDIT: Kỳ hạn 4 tháng, trả trước &gt; 10%<br />\r\n+ HD SAISON: Kỳ hạn 4 tháng, trả trước 30%<br />\r\n+ HOME CREDIT: Kỳ hạn 4 tháng, trả trước 40%</p>\r\n\r\n<p>Bộ bán hàng chuẩn:<br />\r\nOPPO A92 + OPPO A52: Cáp USB Type C, Củ Sạc 9V-2A, Tai nghe, Dụng cụ lấy SIM, Sách hướng dẫn, Miếng dán màn hình (Đã dán sẵn), Vỏ bảo vệ (Nhựa trong dẻo)</p>\r\n\r\n<p><strong>*Lưu ý:</strong><br />\r\n- Mỗi số ĐT mua được 2 sản phẩm.<br />\r\n- Mọi thông tin thắc mắc vui lòng comment bên dưới hoặc liên hệ tổng đài 18001060 (miễn phí). Xin cảm ơn !</p>', '4\";Ios 7;Chính 12 MP & Phụ 8 MP;16 MP;Snapdragon 665 8 nhân;6 GB;128 GB;MicroSD, hỗ trợ tối đa 256 GB;2 Nano SIM Hỗ trợ 4G;5000 mAh có sạc nhanh', 1, '2020-06-12 08:18:05', '2020-06-13 20:52:03'),
(7, 1, 'Iphone 4s', 100, '15000000', 2, 'Y9QBV7jiMehtPT1d.png', 4, '<p>THÔNG TIN CHƯƠNG TRÌNH</p>\r\n\r\n<p><strong>I. Hotsale</strong><br />\r\nHotsale: 0h 1/06 - 22h 14/06</p>\r\n\r\n<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td>+Oppo A52:<br />\r\n			Giá : 5.990.000đ<br />\r\n			Màu: Trắng, Đen</td>\r\n			<td>+Oppo A92:<br />\r\n			Giá : 6.990.000đ<br />\r\n			Màu: Trắng, Đen</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><strong>II.Khuyến mãi.</strong></p>\r\n\r\n<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td>+Oppo A52:<br />\r\n			- Giảm 300.000đ<br />\r\n			- Trả góp 0%</td>\r\n			<td>+Oppo A92:<br />\r\n			- Giảm 500.000đ<br />\r\n			- Trả góp 0%</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>- Trả góp 0% Oppo A52 | Oppo A92<br />\r\n+ FE CREDIT: Kỳ hạn 4 tháng, trả trước &gt; 10%<br />\r\n+ HD SAISON: Kỳ hạn 4 tháng, trả trước 30%<br />\r\n+ HOME CREDIT: Kỳ hạn 4 tháng, trả trước 40%</p>\r\n\r\n<p>Bộ bán hàng chuẩn:<br />\r\nOPPO A92 + OPPO A52: Cáp USB Type C, Củ Sạc 9V-2A, Tai nghe, Dụng cụ lấy SIM, Sách hướng dẫn, Miếng dán màn hình (Đã dán sẵn), Vỏ bảo vệ (Nhựa trong dẻo)</p>\r\n\r\n<p><strong>*Lưu ý:</strong><br />\r\n- Mỗi số ĐT mua được 2 sản phẩm.<br />\r\n- Mọi thông tin thắc mắc vui lòng comment bên dưới hoặc liên hệ tổng đài 18001060 (miễn phí). Xin cảm ơn !</p>', '4\";Ios 7;Chính 12 MP & Phụ 8 MP;16 MP;Snapdragon 665 8 nhân;6 GB;128 GB;MicroSD, hỗ trợ tối đa 256 GB;2 Nano SIM Hỗ trợ 4G;5000 mAh có sạc nhanh', 1, '2020-06-12 08:18:05', '2020-06-13 20:52:03'),
(8, 1, 'Iphone 4s', 100, '15000000', 2, 'Y9QBV7jiMehtPT1d.png', 4, '<p>THÔNG TIN CHƯƠNG TRÌNH</p>\r\n\r\n<p><strong>I. Hotsale</strong><br />\r\nHotsale: 0h 1/06 - 22h 14/06</p>\r\n\r\n<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td>+Oppo A52:<br />\r\n			Giá : 5.990.000đ<br />\r\n			Màu: Trắng, Đen</td>\r\n			<td>+Oppo A92:<br />\r\n			Giá : 6.990.000đ<br />\r\n			Màu: Trắng, Đen</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><strong>II.Khuyến mãi.</strong></p>\r\n\r\n<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td>+Oppo A52:<br />\r\n			- Giảm 300.000đ<br />\r\n			- Trả góp 0%</td>\r\n			<td>+Oppo A92:<br />\r\n			- Giảm 500.000đ<br />\r\n			- Trả góp 0%</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>- Trả góp 0% Oppo A52 | Oppo A92<br />\r\n+ FE CREDIT: Kỳ hạn 4 tháng, trả trước &gt; 10%<br />\r\n+ HD SAISON: Kỳ hạn 4 tháng, trả trước 30%<br />\r\n+ HOME CREDIT: Kỳ hạn 4 tháng, trả trước 40%</p>\r\n\r\n<p>Bộ bán hàng chuẩn:<br />\r\nOPPO A92 + OPPO A52: Cáp USB Type C, Củ Sạc 9V-2A, Tai nghe, Dụng cụ lấy SIM, Sách hướng dẫn, Miếng dán màn hình (Đã dán sẵn), Vỏ bảo vệ (Nhựa trong dẻo)</p>\r\n\r\n<p><strong>*Lưu ý:</strong><br />\r\n- Mỗi số ĐT mua được 2 sản phẩm.<br />\r\n- Mọi thông tin thắc mắc vui lòng comment bên dưới hoặc liên hệ tổng đài 18001060 (miễn phí). Xin cảm ơn !</p>', '4\";Ios 7;Chính 12 MP & Phụ 8 MP;16 MP;Snapdragon 665 8 nhân;6 GB;128 GB;MicroSD, hỗ trợ tối đa 256 GB;2 Nano SIM Hỗ trợ 4G;5000 mAh có sạc nhanh', 1, '2020-06-12 08:18:05', '2020-06-13 20:52:03'),
(9, 1, 'Iphone 4s', 100, '15000000', 2, 'Y9QBV7jiMehtPT1d.png', 4, '<p>THÔNG TIN CHƯƠNG TRÌNH</p>\r\n\r\n<p><strong>I. Hotsale</strong><br />\r\nHotsale: 0h 1/06 - 22h 14/06</p>\r\n\r\n<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td>+Oppo A52:<br />\r\n			Giá : 5.990.000đ<br />\r\n			Màu: Trắng, Đen</td>\r\n			<td>+Oppo A92:<br />\r\n			Giá : 6.990.000đ<br />\r\n			Màu: Trắng, Đen</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><strong>II.Khuyến mãi.</strong></p>\r\n\r\n<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td>+Oppo A52:<br />\r\n			- Giảm 300.000đ<br />\r\n			- Trả góp 0%</td>\r\n			<td>+Oppo A92:<br />\r\n			- Giảm 500.000đ<br />\r\n			- Trả góp 0%</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>- Trả góp 0% Oppo A52 | Oppo A92<br />\r\n+ FE CREDIT: Kỳ hạn 4 tháng, trả trước &gt; 10%<br />\r\n+ HD SAISON: Kỳ hạn 4 tháng, trả trước 30%<br />\r\n+ HOME CREDIT: Kỳ hạn 4 tháng, trả trước 40%</p>\r\n\r\n<p>Bộ bán hàng chuẩn:<br />\r\nOPPO A92 + OPPO A52: Cáp USB Type C, Củ Sạc 9V-2A, Tai nghe, Dụng cụ lấy SIM, Sách hướng dẫn, Miếng dán màn hình (Đã dán sẵn), Vỏ bảo vệ (Nhựa trong dẻo)</p>\r\n\r\n<p><strong>*Lưu ý:</strong><br />\r\n- Mỗi số ĐT mua được 2 sản phẩm.<br />\r\n- Mọi thông tin thắc mắc vui lòng comment bên dưới hoặc liên hệ tổng đài 18001060 (miễn phí). Xin cảm ơn !</p>', '4\";Ios 7;Chính 12 MP & Phụ 8 MP;16 MP;Snapdragon 665 8 nhân;6 GB;128 GB;MicroSD, hỗ trợ tối đa 256 GB;2 Nano SIM Hỗ trợ 4G;5000 mAh có sạc nhanh', 1, '2020-06-12 08:18:05', '2020-06-13 20:52:03'),
(10, 1, 'Iphone 4s', 100, '15000000', 2, 'Y9QBV7jiMehtPT1d.png', 4, '<p>THÔNG TIN CHƯƠNG TRÌNH</p>\r\n\r\n<p><strong>I. Hotsale</strong><br />\r\nHotsale: 0h 1/06 - 22h 14/06</p>\r\n\r\n<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td>+Oppo A52:<br />\r\n			Giá : 5.990.000đ<br />\r\n			Màu: Trắng, Đen</td>\r\n			<td>+Oppo A92:<br />\r\n			Giá : 6.990.000đ<br />\r\n			Màu: Trắng, Đen</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><strong>II.Khuyến mãi.</strong></p>\r\n\r\n<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td>+Oppo A52:<br />\r\n			- Giảm 300.000đ<br />\r\n			- Trả góp 0%</td>\r\n			<td>+Oppo A92:<br />\r\n			- Giảm 500.000đ<br />\r\n			- Trả góp 0%</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>- Trả góp 0% Oppo A52 | Oppo A92<br />\r\n+ FE CREDIT: Kỳ hạn 4 tháng, trả trước &gt; 10%<br />\r\n+ HD SAISON: Kỳ hạn 4 tháng, trả trước 30%<br />\r\n+ HOME CREDIT: Kỳ hạn 4 tháng, trả trước 40%</p>\r\n\r\n<p>Bộ bán hàng chuẩn:<br />\r\nOPPO A92 + OPPO A52: Cáp USB Type C, Củ Sạc 9V-2A, Tai nghe, Dụng cụ lấy SIM, Sách hướng dẫn, Miếng dán màn hình (Đã dán sẵn), Vỏ bảo vệ (Nhựa trong dẻo)</p>\r\n\r\n<p><strong>*Lưu ý:</strong><br />\r\n- Mỗi số ĐT mua được 2 sản phẩm.<br />\r\n- Mọi thông tin thắc mắc vui lòng comment bên dưới hoặc liên hệ tổng đài 18001060 (miễn phí). Xin cảm ơn !</p>', '4\";Ios 7;Chính 12 MP & Phụ 8 MP;16 MP;Snapdragon 665 8 nhân;6 GB;128 GB;MicroSD, hỗ trợ tối đa 256 GB;2 Nano SIM Hỗ trợ 4G;5000 mAh có sạc nhanh', 1, '2020-06-12 08:18:05', '2020-06-13 20:52:03'),
(11, 1, 'Iphone 4s', 100, '15000000', 2, 'Y9QBV7jiMehtPT1d.png', 4, '<p>THÔNG TIN CHƯƠNG TRÌNH</p>\r\n\r\n<p><strong>I. Hotsale</strong><br />\r\nHotsale: 0h 1/06 - 22h 14/06</p>\r\n\r\n<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td>+Oppo A52:<br />\r\n			Giá : 5.990.000đ<br />\r\n			Màu: Trắng, Đen</td>\r\n			<td>+Oppo A92:<br />\r\n			Giá : 6.990.000đ<br />\r\n			Màu: Trắng, Đen</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><strong>II.Khuyến mãi.</strong></p>\r\n\r\n<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td>+Oppo A52:<br />\r\n			- Giảm 300.000đ<br />\r\n			- Trả góp 0%</td>\r\n			<td>+Oppo A92:<br />\r\n			- Giảm 500.000đ<br />\r\n			- Trả góp 0%</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>- Trả góp 0% Oppo A52 | Oppo A92<br />\r\n+ FE CREDIT: Kỳ hạn 4 tháng, trả trước &gt; 10%<br />\r\n+ HD SAISON: Kỳ hạn 4 tháng, trả trước 30%<br />\r\n+ HOME CREDIT: Kỳ hạn 4 tháng, trả trước 40%</p>\r\n\r\n<p>Bộ bán hàng chuẩn:<br />\r\nOPPO A92 + OPPO A52: Cáp USB Type C, Củ Sạc 9V-2A, Tai nghe, Dụng cụ lấy SIM, Sách hướng dẫn, Miếng dán màn hình (Đã dán sẵn), Vỏ bảo vệ (Nhựa trong dẻo)</p>\r\n\r\n<p><strong>*Lưu ý:</strong><br />\r\n- Mỗi số ĐT mua được 2 sản phẩm.<br />\r\n- Mọi thông tin thắc mắc vui lòng comment bên dưới hoặc liên hệ tổng đài 18001060 (miễn phí). Xin cảm ơn !</p>', '4\";Ios 7;Chính 12 MP & Phụ 8 MP;16 MP;Snapdragon 665 8 nhân;6 GB;128 GB;MicroSD, hỗ trợ tối đa 256 GB;2 Nano SIM Hỗ trợ 4G;5000 mAh có sạc nhanh', 1, '2020-06-12 08:18:05', '2020-06-13 20:52:03'),
(12, 1, 'Iphone 4s', 100, '15000000', 2, 'Y9QBV7jiMehtPT1d.png', 4, '<p>THÔNG TIN CHƯƠNG TRÌNH</p>\r\n\r\n<p><strong>I. Hotsale</strong><br />\r\nHotsale: 0h 1/06 - 22h 14/06</p>\r\n\r\n<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td>+Oppo A52:<br />\r\n			Giá : 5.990.000đ<br />\r\n			Màu: Trắng, Đen</td>\r\n			<td>+Oppo A92:<br />\r\n			Giá : 6.990.000đ<br />\r\n			Màu: Trắng, Đen</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><strong>II.Khuyến mãi.</strong></p>\r\n\r\n<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td>+Oppo A52:<br />\r\n			- Giảm 300.000đ<br />\r\n			- Trả góp 0%</td>\r\n			<td>+Oppo A92:<br />\r\n			- Giảm 500.000đ<br />\r\n			- Trả góp 0%</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>- Trả góp 0% Oppo A52 | Oppo A92<br />\r\n+ FE CREDIT: Kỳ hạn 4 tháng, trả trước &gt; 10%<br />\r\n+ HD SAISON: Kỳ hạn 4 tháng, trả trước 30%<br />\r\n+ HOME CREDIT: Kỳ hạn 4 tháng, trả trước 40%</p>\r\n\r\n<p>Bộ bán hàng chuẩn:<br />\r\nOPPO A92 + OPPO A52: Cáp USB Type C, Củ Sạc 9V-2A, Tai nghe, Dụng cụ lấy SIM, Sách hướng dẫn, Miếng dán màn hình (Đã dán sẵn), Vỏ bảo vệ (Nhựa trong dẻo)</p>\r\n\r\n<p><strong>*Lưu ý:</strong><br />\r\n- Mỗi số ĐT mua được 2 sản phẩm.<br />\r\n- Mọi thông tin thắc mắc vui lòng comment bên dưới hoặc liên hệ tổng đài 18001060 (miễn phí). Xin cảm ơn !</p>', '4\";Ios 7;Chính 12 MP & Phụ 8 MP;16 MP;Snapdragon 665 8 nhân;6 GB;128 GB;MicroSD, hỗ trợ tối đa 256 GB;2 Nano SIM Hỗ trợ 4G;5000 mAh có sạc nhanh', 1, '2020-06-12 08:18:05', '2020-06-13 20:52:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_sinh` date NOT NULL,
  `dien_thoai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dia_chi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chuc_vu` int(11) NOT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `avatar`, `email`, `email_verified_at`, `password`, `ngay_sinh`, `dien_thoai`, `dia_chi`, `chuc_vu`, `trang_thai`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, 'admin@gmail.com', NULL, '$2y$10$77u7IhuXp9.CSLThtAja.OoaiZJKY/y03R2TJCHLj/OmWosuUTo0i', '1997-07-22', '0336022352', 'Văn Sơn - ĐL - NA', 1, 1, NULL, NULL, '2020-06-14 02:24:58'),
(2, 'Nguyễn Xuân H', NULL, 'xuanhanh.setdy@gmail.com', NULL, '$2y$10$IFgOZaHX0CziI7HmCq76TODrvXTvtjlIKh1Znwk/etrlVMN8ewJa.', '1997-07-22', '0336022352', 'Trung Đô - TP.Vinh', 3, 1, NULL, '2020-04-29 10:23:32', '2020-05-27 21:23:38'),
(3, 'Nguyễn Văn B', NULL, 'b@gmail.com', NULL, '123456', '1111-11-22', '0336022352', 'Minh Khai - TP.Vinh', 3, 0, NULL, '2020-04-29 10:24:07', '2020-06-14 02:20:50'),
(4, 'Thai Khắc K', NULL, 'k@gmail.com', NULL, '123456', '1111-11-11', '0336022352', 'Minh Khai - TP.Vinh', 3, 0, NULL, '2020-04-29 10:25:26', '2020-04-29 10:25:26'),
(5, 'Lê Thị T', NULL, 'tronle@gmail.com', NULL, '123456', '1997-12-07', '0327932713', 'Hoàng Mai - Nghệ An', 2, 0, NULL, '2020-05-02 10:15:09', '2020-05-05 19:00:09'),
(6, 'abc', NULL, 'abc@gmail.com', NULL, '123456', '2020-05-09', '123323', 'sadasd', 2, 0, NULL, '2020-05-27 21:19:16', '2020-05-27 21:19:16'),
(7, 'h', 'KT2nYXjYARehXRTr.jpg', 'dasdas@gmail.com', NULL, '$2y$10$eC33GNpAO57gdCJH6zUcK.93IS.0v9VW4v0uwCm5qvesQbua1PsVe', '2020-06-14', '0327932713', 'Văn Sơn - Đô Lương - Nghệ An', 2, 1, NULL, '2020-06-14 02:23:41', '2020-06-14 02:23:55');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hoa_don_khach_hang_id_foreign` (`khach_hang_id`),
  ADD KEY `hoa_don_create_by_foreign` (`create_by`),
  ADD KEY `hoa_don_san_pham` (`san_pham_id`);

--
-- Chỉ mục cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `loai_san_pham`
--
ALTER TABLE `loai_san_pham`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhap_kho`
--
ALTER TABLE `nhap_kho`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nhap_kho_khach_hang_id_foreign` (`khach_hang_id`),
  ADD KEY `nhap_kho_san_pham_id_foreign` (`san_pham_id`);

--
-- Chỉ mục cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cate_product` (`loai_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `loai_san_pham`
--
ALTER TABLE `loai_san_pham`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `nhap_kho`
--
ALTER TABLE `nhap_kho`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD CONSTRAINT `hoa_don_create_by_foreign` FOREIGN KEY (`create_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `hoa_don_khach_hang_id_foreign` FOREIGN KEY (`khach_hang_id`) REFERENCES `khach_hang` (`id`),
  ADD CONSTRAINT `hoa_don_san_pham` FOREIGN KEY (`san_pham_id`) REFERENCES `san_pham` (`id`);

--
-- Các ràng buộc cho bảng `nhap_kho`
--
ALTER TABLE `nhap_kho`
  ADD CONSTRAINT `nhap_kho_khach_hang_id_foreign` FOREIGN KEY (`khach_hang_id`) REFERENCES `khach_hang` (`id`),
  ADD CONSTRAINT `nhap_kho_san_pham_id_foreign` FOREIGN KEY (`san_pham_id`) REFERENCES `san_pham` (`id`);

--
-- Các ràng buộc cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT `cate_product` FOREIGN KEY (`loai_id`) REFERENCES `loai_san_pham` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
