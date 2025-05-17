-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 17, 2025 lúc 07:31 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `movie_hub`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `position` int(11) DEFAULT 0,
  `click_count` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`, `status`, `slug`, `position`, `click_count`, `created_at`, `updated_at`) VALUES
(1, 'Phim Mới', 'Phimmoi | Phimmoi.net | Xem Phim Online | Phim hay\r\nPhimmoi - Trang xem phim Online với giao diện mới . Nguồn phim được tổng hợp từ các website lớn với đa dạng các đầu phim và thể loại vô cùng phong phú.', 1, 'phim-moi', 1, 17, '2025-03-01 23:15:04', '2025-03-18 19:03:57'),
(2, 'Phim Lẻ', 'Phimle - Trang xem phim Online với giao diện mới . Nguồn phim được tổng hợp từ các website lớn với đa dạng các đầu phim và thể loại vô cùng phong phú.', 1, 'phim-le', 2, 5, '2025-03-01 23:15:04', '2025-03-15 17:08:34'),
(4, 'Phim Bộ', 'Phimbo - Trang xem phim Online với giao diện mới . Nguồn phim được tổng hợp từ các website lớn với đa dạng các đầu phim và thể loại vô cùng phong phú.', 1, 'phim-bo', 3, 8, '2025-03-01 23:15:04', '2025-03-18 19:06:59'),
(5, 'Phim Chiếu Rạp', 'Phim chiếu rạp hay đặc sắc', 1, 'phim-chieu-rap', 0, 22, '2025-03-01 23:15:04', '2025-05-17 17:15:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `comment_name` varchar(100) NOT NULL,
  `comment_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `comment_movie_id` int(11) NOT NULL,
  `comment_status` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`comment_id`, `comment`, `comment_name`, `comment_date`, `comment_movie_id`, `comment_status`) VALUES
(2, 'Phim nội dung hơi cũ nhưng cũng ok', 'Đức', '2025-03-04 09:32:43', 69, 1),
(3, 'phim nhạt', 'Minh', '2025-03-04 15:23:45', 72, 1),
(4, 'Phim hay nha', 'Hoa', '2025-03-04 15:36:39', 75, 1),
(6, 'quá hay', 'Trung', '2025-03-04 15:56:21', 75, 1),
(7, 'phim dỡ quá trời', 'Tuấn', '2025-03-04 16:12:56', 64, 1),
(9, 'Phim nội dung hơi nhạt', 'Minh', '2025-03-15 17:06:05', 73, 1),
(10, 'Phim nhạt quá à', 'Tuấn', '2025-03-18 17:02:39', 76, 1),
(11, 'phim hài quá', 'Hoa', '2025-03-18 17:13:07', 76, 1),
(12, 'Phim hay quá đi', 'Đức', '2025-03-18 17:20:29', 73, 1),
(13, 'phim hayyy', 'Đạt', '2025-03-19 03:48:57', 75, 0),
(14, 'hâyyy', 'vũ', '2025-03-26 14:27:04', 73, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `click_count` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `countries`
--

INSERT INTO `countries` (`id`, `title`, `description`, `status`, `slug`, `click_count`, `created_at`, `updated_at`) VALUES
(2, 'Việt Nam', 'Các bộ phim Việt Nam hay đáng xem cùng trãi nghiệm nhé', 1, 'viet-nam', 6, '2025-03-01 23:15:04', '2025-03-04 09:58:57'),
(3, 'Indonesia', 'Các bộ phim Indonesia hay đáng xem cùng trãi nghiệm nhé', 1, 'indonesia', 1, '2025-03-01 23:15:04', '2025-03-01 23:15:04'),
(4, 'Hàn Quốc', 'Các bộ phim Hàn Quốc hay đáng xem cùng trãi nghiệm nhé', 1, 'han-quoc', 0, '2025-03-01 23:15:04', '2025-03-01 23:15:04'),
(5, 'Nhật Bản', 'Các bộ phim Nhật Bản hay đáng xem cùng trãi nghiệm nhé', 1, 'nhat-ban', 1, '2025-03-01 23:15:04', '2025-03-01 23:15:04'),
(6, 'Trung Quốc', 'Các bộ phim Trung Quốc hay đáng xem cùng trãi nghiệm nhé', 1, 'trung-quoc', 1, '2025-03-01 23:15:04', '2025-03-01 23:15:04'),
(7, 'Malaisia', 'Các bộ phim Malaisia hay đáng xem cùng trãi nghiệm nhé', 1, 'malaisia', 0, '2025-03-01 23:15:04', '2025-03-01 23:15:04'),
(9, 'Âu Mỹ', 'Các bộ phim âu mỹ hay đáng xem cùng trãi nghiệm nhé', 1, 'au-my', 0, '2025-03-01 23:15:04', '2025-03-01 23:15:04'),
(10, 'Thái Lan', 'Các bộ phim Thái Lan hay đáng xem cùng trãi nghiệm nhé', 1, 'thai-lan', 0, '2025-03-01 23:15:04', '2025-03-01 23:15:04'),
(11, 'Ấn Độ', 'Các bộ phim Ấn Độ hay đáng xem cùng trãi nghiệm nhé', 1, 'an-do', 0, '2025-03-01 23:15:04', '2025-03-01 23:15:04'),
(14, 'Philipins', 'Các bộ phim Philipins hay đáng xem cùng trãi nghiệm nhé', 1, 'philipins', 0, '2025-03-04 09:34:28', '2025-03-04 09:34:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `episodes`
--

CREATE TABLE `episodes` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `linkphim` text NOT NULL,
  `episode` varchar(20) NOT NULL,
  `updated_at` varchar(50) NOT NULL,
  `created_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `episodes`
--

INSERT INTO `episodes` (`id`, `movie_id`, `linkphim`, `episode`, `updated_at`, `created_at`) VALUES
(6, 21, '<iframe width=\"100%\" height=\"315\" src=\"https://www.youtube.com/embed/rFo3wdZryes?si=ew92rqjUjM41fmgU\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '3', '2025-01-26 01:27:09', '2025-01-26 01:27:09'),
(9, 27, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/nsQIfCmL_iI?si=2JaH-G4ZDbY180_p\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '1', '2025-01-26 02:04:33', '2025-01-26 02:04:33'),
(10, 24, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/rFo3wdZryes?si=ew92rqjUjM41fmgU\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '1', '2025-01-27 18:22:26', '2025-01-27 18:22:26'),
(11, 18, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/nsQIfCmL_iI?si=2JaH-G4ZDbY180_p\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '1', '2025-01-27 19:28:46', '2025-01-27 19:28:46'),
(12, 30, '<iframe width=\"100%\" height=\"500\" src=\"https://www.youtube.com/embed/eMbeC4bm7rY?si=humNeNyZoAQmWqpU\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '1', '2025-01-27 22:30:14', '2025-01-27 22:30:14'),
(13, 30, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/-X5kch6bgO8?si=eCYosbRrIYOYjOQ2\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '2', '2025-01-27 22:31:26', '2025-01-27 22:31:26'),
(14, 30, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/yOapQAh8GyA?si=ZWGgkJmmiL_3qbIS\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '3', '2025-01-27 22:32:06', '2025-01-27 22:32:06'),
(15, 30, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/0bEmutYQ7UU?si=xdeO6awxIPj_nBu-\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '4', '2025-01-27 22:39:53', '2025-01-27 22:39:53'),
(16, 27, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/nsQIfCmL_iI?si=2JaH-G4ZDbY180_p\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '2', '2025-01-27 23:13:02', '2025-01-27 23:13:02'),
(17, 26, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/lRnWJeElInM?si=GQOYRAnlG9ravaGv\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', 'FullHD', '2025-01-28 01:10:46', '2025-01-28 01:10:46'),
(19, 26, '<iframe width=\"100%\" height=\"315\" src=\"https://www.youtube.com/embed/eMbeC4bm7rY?si=humNeNyZoAQmWqpU\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', 'HD', '2025-02-07 17:15:33', '2025-02-07 17:15:33'),
(22, 27, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/nsQIfCmL_iI?si=2JaH-G4ZDbY180_p\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '3', '2025-01-31 21:45:47', '2025-01-31 21:45:47'),
(23, 25, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/nsQIfCmL_iI?si=2JaH-G4ZDbY180_p\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', 'HD', '2025-01-31 22:35:09', '2025-01-31 22:35:09'),
(25, 30, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/nsQIfCmL_iI?si=2JaH-G4ZDbY180_p\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '5', '2025-02-01 23:11:46', '2025-02-01 23:11:46'),
(26, 30, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/nsQIfCmL_iI?si=2JaH-G4ZDbY180_p\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '6', '2025-02-01 23:22:11', '2025-02-01 23:22:11'),
(27, 35, '<iframe width=\"100%\" height=\"500\" src=\"https://www.youtube.com/embed/2uoXw-PpdxY?si=83hwBxPju2qsF1iK\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '1', '2025-02-05 09:07:27', '2025-02-05 09:07:27'),
(29, 35, '<iframe width=\"100%\" height=\"500\" src=\"https://www.youtube.com/embed/2uoXw-PpdxY?si=f4YaunX9PbHuUSAE\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '2', '2025-02-05 09:08:50', '2025-02-05 09:08:50'),
(30, 35, '<iframe width=\"100%\" height=\"500\" src=\"https://www.youtube.com/embed/Jp42bo0-jxY?si=vs9su6tFHgNQrYdF\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '3', '2025-02-05 09:10:48', '2025-02-05 09:10:48'),
(31, 35, '<iframe width=\"100%\" height=\"500\" src=\"https://www.youtube.com/embed/nHtQuT8Ob74?si=iEAvPoo_8G7ot0We\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '4', '2025-02-05 09:12:25', '2025-02-05 09:12:25'),
(32, 35, '<iframe width=\"100%\" height=\"500\" src=\"https://www.youtube.com/embed/WdrIVwtSdOo?si=qZVSwlu76zBUHMtq\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '5', '2025-02-05 09:13:12', '2025-02-05 09:13:12'),
(33, 37, '<iframe width=\"100%\" height=\"500\" src=\"https://www.youtube.com/embed/JZ_iQfWD32Y?si=naPmVZb2cAxPpoii\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '1', '2025-02-05 09:19:09', '2025-02-05 09:19:09'),
(34, 38, '<iframe width=\"100%\" height=\"500\" src=\"https://www.youtube.com/embed/5ZOMCGrm7OE?si=RL1hMXOtwoSV_kAb\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '1', '2025-02-05 09:25:04', '2025-02-05 09:25:04'),
(35, 39, '<iframe width=\"100%\" height=\"500\" src=\"https://www.youtube.com/embed/-p0FhzKe2K4?si=FGm1ZAtRRhzshsbg\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '1', '2025-02-05 09:31:27', '2025-02-05 09:31:27'),
(36, 40, '<iframe width=\"100%\" height=\"500\" src=\"https://www.youtube.com/embed/BvgcRAa6_Lk?si=6QuuoHJlXJaLq55Q\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '1', '2025-02-05 09:42:37', '2025-02-05 09:42:37'),
(37, 41, '<iframe width=\"100%\" height=\"500\" src=\"https://www.youtube.com/embed/mrneW3E2wU0?si=8RvKh1BhMXI9ZeOi\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '1', '2025-02-05 09:52:09', '2025-02-05 09:52:09'),
(38, 42, '<iframe width=\"100%\" height=\"500\" src=\"https://www.youtube.com/embed/D_fkRQLwjtc?si=F6iBw3UfpkhnMN5D\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '1', '2025-02-05 10:00:06', '2025-02-05 10:00:06'),
(46, 15, '<iframe width=\"100%\" height=\"500\" src=\"https://www.youtube.com/embed/vFhDT0pwHkQ?si=jgwJ7Uj5Cm-KYkGa\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '1', '2025-02-26 21:30:18', '2025-02-26 21:30:18'),
(47, 50, '<iframe width=\"100%\" height=\"500\" src=\"https://www.youtube.com/embed/-e6zIVAxErY?si=WtDiVzpYOZkp5Ogy\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '1', '2025-03-02 04:29:00', '2025-03-02 04:29:00'),
(48, 64, '<iframe width=\"100%\" height=\"500\" src=\"https://www.youtube.com/embed/wCR25SaR6gI?si=W9pRFsgcNmzYJGq8\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '1', '2025-03-03 00:42:59', '2025-03-03 00:42:59'),
(49, 68, '<iframe width=\"100%\" height=\"500\" src=\"https://www.youtube.com/embed/Mpwgz1j51cA?si=Hgqr5bKNQPucJ-Vd\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '1', '2025-03-03 12:58:27', '2025-03-03 12:58:27'),
(50, 68, '<iframe width=\"100%\" height=\"500\" src=\"https://www.youtube.com/embed/Uci7JSccQg8?si=1hrSNEOVNtYbhDP1\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '2', '2025-03-03 12:58:57', '2025-03-03 12:58:57'),
(51, 69, '<iframe width=\"100%\" height=\"500\" src=\"https://www.youtube.com/embed/scrtC5NBkvk?si=ZJ19AOluTX3l8isz\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '1', '2025-03-03 13:06:14', '2025-03-03 13:06:14'),
(53, 71, '<iframe width=\"100%\" height=\"500\" src=\"https://www.youtube.com/embed/4lA6iPCxqK4?si=JBZp6HikajeXABNw\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '1', '2025-03-03 13:27:51', '2025-03-03 13:27:51'),
(54, 70, '<iframe width=\"100%\" height=\"500\" src=\"https://www.youtube.com/embed/HbuqlhlaydI?si=jUB8TGE065xVwvvl\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '1', '2025-03-03 13:28:48', '2025-03-03 13:28:48'),
(55, 72, '<iframe width=\"100%\" height=\"500\" src=\"https://www.youtube.com/embed/eQ68xLzl-5w?si=VM8BRrhDa27opCyz\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '1', '2025-03-03 13:42:09', '2025-03-03 13:42:09'),
(56, 72, '<iframe width=\"1005\" height=\"500\" src=\"https://www.youtube.com/embed/Bfo-YpGJjNk?si=Lr50FTSUaZ5fa62L\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '2', '2025-03-03 13:42:44', '2025-03-03 13:42:44'),
(57, 72, '<iframe width=\"100%\" height=\"500\" src=\"https://www.youtube.com/embed/cjFGHD5OvR0?si=q57zulfdZXGsOJkK\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '3', '2025-03-03 13:43:12', '2025-03-03 13:43:12'),
(58, 72, '<iframe width=\"100%\" height=\"500\" src=\"https://www.youtube.com/embed/UlxbqltnTVE?si=o0iTS4sGyPZn9mm-\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '4', '2025-03-03 13:43:45', '2025-03-03 13:43:45'),
(59, 72, '<iframe width=\"100%\" height=\"500\" src=\"https://www.youtube.com/embed/0Cg8_0n1IYc?si=LARhKMVIfSJ-Vd18\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '5', '2025-03-03 13:44:48', '2025-03-03 13:44:48'),
(60, 72, '<iframe width=\"100%\" height=\"500\" src=\"https://www.youtube.com/embed/9Nq3BP4iC0s?si=YiMvowgUH8YdGc0b\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '6', '2025-03-03 13:45:26', '2025-03-03 13:45:26'),
(61, 72, '<iframe width=\"100%\" height=\"500\" src=\"https://www.youtube.com/embed/tKqYbnDlJpI?si=CYn--B1MPM5F3ajv\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '7', '2025-03-03 13:46:31', '2025-03-03 13:46:31'),
(62, 72, '<iframe width=\"100%\" height=\"500\" src=\"https://www.youtube.com/embed/9E8_CIFkqfQ?si=D-VAn4BnNOgEYmI3\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '8', '2025-03-03 13:46:56', '2025-03-03 13:46:56'),
(63, 72, '<iframe width=\"100%\" height=\"500\" src=\"https://www.youtube.com/embed/ZMT61pr1eo0?si=3dVVlWZ0LWPJVs3U\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '9', '2025-03-03 13:47:22', '2025-03-03 13:47:22'),
(65, 73, '<iframe width=\"100%\" height=\"500\" src=\"https://www.youtube.com/embed/OfFztWdzCis?si=42nBLFWa9easTZmM\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '1', '2025-03-04 16:41:24', '2025-03-04 16:41:24'),
(66, 74, '<iframe width=\"100%\" height=\"500\" src=\"https://www.youtube.com/embed/1zcjsGpYuXM?si=strGegQrBBQUY3IU\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '1', '2025-03-04 16:55:16', '2025-03-04 16:55:16'),
(67, 75, '<iframe width=\"100%\" height=\"500\" src=\"https://www.youtube.com/embed/0_ZwUQ7zB_4?si=lxgMRSNI2BwlUADj\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '1', '2025-03-04 17:13:50', '2025-03-04 17:13:50'),
(69, 72, '<iframe width=\"100%\" height=\"500\" src=\"https://www.youtube.com/embed/LJJaUUjtm7M?si=114mF4zxonABvd4l\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '10', '2025-03-11 19:01:06', '2025-03-11 19:01:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `click_count` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `genres`
--

INSERT INTO `genres` (`id`, `title`, `description`, `status`, `slug`, `click_count`, `created_at`, `updated_at`) VALUES
(1, 'Tâm Lý', 'Tâm lý tình cảm', 1, 'tam-ly', 4, '2025-03-01 23:15:04', '2025-03-01 23:15:04'),
(3, 'Hành Động', 'Hành động kịch tính', 1, 'hanh-dong', 1, '2025-03-01 23:15:04', '2025-03-01 23:15:04'),
(4, 'Kinh Dị', 'Các bộ phim gan dạ, thách thức người xem cùng theo dõi', 1, 'kinh-di', 2, '2025-03-01 23:15:04', '2025-03-15 18:26:33'),
(6, 'Phim Khoa Học', 'Các bộ phim tìm tòi những thứ mới lạ từ khắp các hành tinh, những điều kịch tính, các thí nghiệm kỳ lạ cùng đón xem', 1, 'phim-khoa-hoc', 0, '2025-03-01 23:15:04', '2025-03-01 23:15:04'),
(7, 'Phim Hiện Đại', 'Tuyển các bộ phim hay đáng xem hiện đại', 1, 'phim-hien-dai', 0, '2025-03-01 23:15:04', '2025-03-01 23:15:04'),
(9, 'Phim Xuyên Không', 'Các trãi nghiệm mới lạ về các bộ phim mới nhất xuyên không qua các chiều không gian khác nhau', 1, 'phim-xuyen-khong', 1, '2025-03-01 23:15:04', '2025-03-15 18:26:27'),
(10, 'Phim Cổ Trang', 'Phim cổ trang siêu hay kịch tính', 1, 'phim-co-trang', 0, '2025-03-01 23:15:04', '2025-03-01 23:15:04'),
(11, 'Phiêu Lưu', 'Phiêu lưu ký trải nghiệm những bộ phim hay hấp dẫn', 1, 'phieu-luu', 1, '2025-03-01 23:15:04', '2025-03-01 23:15:04'),
(12, 'Hài', 'Siêu hài hước, dí dỏm, đán yêu', 1, 'hai', 0, '2025-03-01 23:15:04', '2025-03-01 23:15:04'),
(13, 'Võ thuật', 'Tuyển tập các bộ phim võ thuật đẹp măt, muốn hút', 1, 'vo-thuat', 0, '2025-03-01 23:15:04', '2025-03-03 06:31:32'),
(14, 'Hoạt hình', 'Dẽ thương đáng yêu', 1, 'hoat-hinh', 1, '2025-03-01 23:15:04', '2025-03-03 06:51:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `info`
--

CREATE TABLE `info` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `logo` varchar(100) NOT NULL,
  `copyright` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `info`
--

INSERT INTO `info` (`id`, `title`, `description`, `logo`, `copyright`) VALUES
(1, 'Phim hay 2025 | Phim mới | Phim HD Vietsub | Xem Phim Online | chuataotenmien.top', 'Phim hay 2025,cập nhật thường xuyên\r\nXem phim hay nhất 2025 cập nhật nhanh nhất, Xem phim Online HD Vietsub - Thuyết minh tốt trên nhiều thiết bị', 'moviehub90443981.png', 'Copyright © 2025 by XuanDuc');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `thoiluong` varchar(50) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `status` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `thuocphim` varchar(10) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `phim_hot` int(11) NOT NULL,
  `resolution` int(11) NOT NULL DEFAULT 0,
  `name_eng` varchar(255) NOT NULL,
  `phude` int(11) NOT NULL DEFAULT 0,
  `ngaytao` varchar(50) DEFAULT NULL,
  `ngaycapnhat` varchar(50) DEFAULT NULL,
  `year` varchar(20) DEFAULT NULL,
  `tags` text DEFAULT NULL,
  `topview` int(11) DEFAULT NULL,
  `season` int(11) NOT NULL DEFAULT 0,
  `trailer` varchar(100) DEFAULT NULL,
  `sotap` int(11) NOT NULL DEFAULT 1,
  `count_views` int(11) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `click_count` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `movies`
--

INSERT INTO `movies` (`id`, `title`, `thoiluong`, `slug`, `description`, `status`, `image`, `category_id`, `thuocphim`, `genre_id`, `country_id`, `phim_hot`, `resolution`, `name_eng`, `phude`, `ngaytao`, `ngaycapnhat`, `year`, `tags`, `topview`, `season`, `trailer`, `sotap`, `count_views`, `position`, `click_count`) VALUES
(8, 'Thế Giới Ma Quái 2', '50 Phút/Tập', 'the-gioi-ma-quai 2', 'Thế Giới Ma Quái 2 – Sweet Home 2 (2023) được lấy bối cảnh ở khu vực trại tị nạn, tưởng chừng đã an toàn, nhưng họ phải tiếp tục đối mặt với những mối nguy hiểm, tự mình chiến đấu với kẻ thù để bảo toàn mạng sống.\r\n\r\nSẽ tiếp tục cuộc hành trình của Cha Hyun Soo và những người còn sống sót, họ còn phải đối mặt với những nguy hiểm xung quanh, khi lòng tham của con người trỗi dậy. Tại ranh giới sinh tử, những bản chất, khát khao ham muốn của con người được trở thành quái vật có sức mạnh vô biên, có khả năng bất tử luôn rình rập xung quanh.', 1, 'tải xuống (4)3425.jpg', 4, 'phimle', 7, 9, 1, 5, 'Immortal Emperor Vo Ton', 0, '', '2025-01-27 19:24:41', NULL, 'j', 2, 4, 'ekkzvBOjXoQ', 2, 9, 29, 2),
(9, 'Đảo Hải Tặc', '50 Phút/Tập', 'dao-hai-tac', 'Tóm tắt\r\nĐảo Hải Tặc – One Piece Live Action (Netflix) với chiếc mũ rơm và nhóm bạn đủ thành phần, hải tặc trẻ Monkey Monkey D. Luffy có hành trình săn kho báu hoành tráng trong bản chuyển thể người đóng này của bộ manga nổi tiếng.', 1, 'tải xuống (5)7956.jpg', 1, 'phimbo', 1, 9, 0, 5, 'Doll Amulet', 0, '', '2025-03-03 14:06:59', NULL, 'đảo hải tặc', 0, 2, 'ekkzvBOjXoQ', 1, 7, 17, 0),
(10, 'Người Nổi Tiếng', '', 'nguoi-noi-tieng', 'Người Nổi Tiếng – Celebrity (2023) Danh tiếng. Tiền tài. Quyền lực. Seo A Ri thành ngôi sao mạng xã hội sau một đêm. Song hậu quả chết chóc đang chờ sẵn trong thế giới mê hoặc và hào nhoáng của người có ảnh hưởng.', 1, 'tải xuống (6)1549.jpg', 1, 'phimbo', 1, 2, 1, 0, '', 0, '', '', NULL, NULL, 1, 2, NULL, 1, 3, 16, 0),
(11, 'Soi Sáng Cho Em', '133 phút', 'soi-sang-cho-em', 'Tóm tắt\r\nSoi Sáng Cho Em – A Date With The Future xoay quanh mối tình sâu sắc của Từ Lai và Cận Thời Xuyên. Mười năm trước, Từ Lai bị mắc kẹt trong một trận động đất và được cứu bởi lính cứu hoả Cận Thời Xuyên cùng chú chó tìm kiếm cứu nạn “Truy Phong”. Để xoa dịu Từ Lai đang bị thương, Cận Thời Xuyên đã hứa với cô hẹn ước mười năm.\r\n\r\nMười năm sau, Từ Lai kết thúc chương trình học, quay về nước, trở thành một cô phóng viên kiêm huấn luyện viên chó quốc tế. Sau nhiều lần tiếp xúc trong những tình huống khẩn cấp, cùng nhau trải qua thử thách sinh tử, họ nhận ra tình cảm dành cho nhau.', 1, 'tải xuống (7)830.jpg', 1, 'phimle', 1, 6, 1, 5, 'Doll Amulet', 0, '', '2025-03-02 01:49:37', NULL, NULL, 2, 0, 'ekkzvBOjXoQ', 1, 3, 15, 0),
(12, 'Tình Yêu Anh Dành Cho EM', '', 'tinh-yeu-anh-danh-cho-em', 'Tóm tắt\r\nTình Yêu Anh Dành Cho Em – The Love You Give Me (2023) kể về câu chuyện của nữ chính Mẫn Tuệ và nam chính Tân Kỳ. Hai người trời xui đất khiến quen biết rồi yêu nhau, song lại chia tay vì một sự hiểu nhầm. Nhiều năm sau, Mẫn Tuệ và Tân Kỳ gặp lại nhau, phát hiện ra rung động chỉ là điểm khởi đầu của tình yêu. Từ công việc đến đời tư, cuộc sống hai người ngập tràn trong những màn ân ái vừa ngọt ngào lại đau thương.', 1, 'tải xuống (9)1152.jpg', 1, '', 1, 2, 1, 5, '', 0, '', '', NULL, NULL, 0, 7, NULL, 1, 1, 14, 0),
(13, 'Khi Anh Chạy Về Phía Em', '', 'khi-anh-chay-ve-phia-em', 'Tóm tắt\r\nKhi Anh Chạy Về Phía Em – When I Fly Towards You (2022) được chuyển thể từ tiểu thuyết “Cô Ấy Bị Bệnh Không Nhẹ”của tác giả Tiểu Trúc Dĩ, nội dung nói về nữ sinh trung học Tô Tại Tại lạc quan cởi mở bị nam sinh Trương Lục Nhượng lạnh lùng lầm lì thu hút. Cô dùng mặt trời nhỏ tích cực của mình sưởi ấm sự tự ti của Trương Lục Nhượng, Tô Tại Tại cũng thu hồi sự phân tâm của mình, hăng hái tiến về phía trước. Họ bên nhau cùng nhau trưởng thành, vì yêu mà trở nên tốt hơn.', 1, 'tải xuống (10)3678.jpg', 1, '', 1, 2, 1, 5, '', 0, '', '', NULL, NULL, NULL, 0, NULL, 1, 3, 13, 0),
(14, 'Tà Khí Xứ Enfield', '133 phút', 'taakhiaxuaenfield', 'Trải nghiệm câu chuyện có thật rùng rợn về một vụ quỷ ám nổi tiếng nhất thế giới qua các bản ghi âm gốc được ghi lại bên trong ngôi nhà khi các sự kiện diễn ra.', 1, 'tải xuống (11)1672.jpg', 5, 'phimle', 4, 2, 1, 0, 'The Evil Spirit of Enfield', 0, '', '2025-03-04 17:52:51', NULL, NULL, NULL, 0, 'ekkzvBOjXoQ', 1, 2, 6, 0),
(15, 'Tiên Đế Võ Tôn', '133 phút', 'tien-de-vo-ton', 'Trải nghiệm câu chuyện có thật rùng rợn về một vụ quỷ ám nổi tiếng nhất thế giới qua các bản ghi âm gốc được ghi lại bên trong ngôi nhà khi các sự kiện diễn ra.', 1, 'tải xuống4278523.jpg', 1, 'phimbo', 1, 6, 0, 0, 'Immortal Emperor Vo Ton', 1, '', '2025-02-27 18:38:27', '2025', 'Tiên đế võ tôn', NULL, 0, 'HSbXt26eF_M', 1, 4, 12, 0),
(16, 'Nâng Cấp', '', 'nang-cap', 'Tóm tắt\r\nUpgraded 2024 là một bộ phim hài lãng mạn đầy sáng tạo, đã được phát hành trên Amazon Prime Video vào ngày 9 tháng 2 năm 2024. Câu chuyện xoay quanh cuộc sống của Ana, một cô gái trẻ đầy tham vọng và mơ ước về một sự nghiệp trong lĩnh vực nghệ thuật. Trong quá trình cố gắng để gây ấn tượng với sếp khó tính của mình, Claire, Ana đã vô tình gặp Will, một chàng trai lịch lãm và quyến rũ. Một sự nhầm lẫn nhỏ đã khiến Ana trở thành sếp của mình. Với lời nói dối này, cuộc sống của cô bắt đầu thay đổi hoàn toàn. Ana và Will dần trở nên thân thiết và tình cảm giữa họ nảy nở. Tuy nhiên, những rắc rối và tình huống dở khóc dở cười không ngừng xảy ra khi Ana phải duy trì lời nói dối của mình để không bị phát hiện.', 1, 'tải xuống (13)7089.jpg', 1, '', 1, 2, 1, 4, 'Upgrade', 0, '', '', '2021', NULL, NULL, 0, NULL, 0, 2, 11, 0),
(17, 'Bá Chủ Bầu Trời', '', 'ba-chu-bau-troi', 'Tóm tắt\r\nTrong Thế chiến II, các phi công mạo hiểm mạng sống gia nhập Nhóm Ném Bom 100, tình anh em được hun đúc bởi lòng dũng cảm, sự mất mát và chiến thắng.', 1, 'tải xuống (14)2657.jpg', 2, '', 11, 9, 1, 0, 'Ruler of the sky', 0, '', '', NULL, NULL, NULL, 0, NULL, 0, 5, 24, 0),
(18, 'John Wick: Phần 4', '50 Phút/Tập', 'johnawickaphầna4', 'John Wick: Phần 4 – John Wick: Chapter 4 là câu chuyện của John Wick (Keanu Reeves) đã khám phá ra con đường để đánh bại High Table. Nhưng trước khi có thể kiếm được tự do, Wick phải đối đầu với kẻ thù mới với những liên minh hùng mạnh trên toàn cầu và những lực lượng biến những người bạn cũ thành kẻ thù.', 1, 'tải xuống (15)4077.jpg', 1, 'phimle', 7, 9, 1, 2, 'john Wick', 1, '', '2025-03-02 00:48:57', NULL, NULL, NULL, 0, 'HSbXt26eF_M', 1, 5, 10, 1),
(19, 'Vụng Trộm Không Thể Giấu', '', 'vung-trom-khong-the-giau', 'Vụng Trộm Không Thể Giấu – Hidden Love (2023) nói về Tang Trĩ trong những năm học cấp 3 do nhiều lần bị mời phụ huynh, để giải quyết rắc rồi nên Tang Trĩ muốn anh trai mình đi thay, nhưng mà hai anh em hễ cứ gặp nhau là cãi nhau, vậy nên cô ấy chỉ đành nhờ bạn cùng phòng của anh trai mình – Đoàn Gia Hứa đi gặp thầy cô. Dưới sự nhờ vả của Tang Trĩ, anh đi họp phụ huynh cho cô, từ đây mà hai người trở nên thân hơn.\r\n\r\nĐoàn Gia Hứa đã chăm sóc, bảo vệ Tang Trĩ như em gái ruột của mình. Sau khi Đoàn Gia Hứa tốt nghiệp đại học và trở về thành phố trước kia ở, cho nên hai người xa nhau, vì một số hiểu lầm mà mối quan hệ của họ trở nên xa cách. Đến khi Tang Trĩ trưởng thành thi đại học ở thành phố mà Đoàn Gia Hứa đang ở như cô mong muốn, hai người mới gặp lại nhau.\r\n\r\nHai người tiếp xúc ngày càng thân thiết hơn, Tang Trĩ phát hiện được áp lực của Đoàn Gia Hứa từ đâu mà có, cô muốn bảo vệ và chăm sóc người anh mà luôn đối tốt với mình, quyết định lấy lại tình yêu thầm kín mà cô chôn chặt trong lòng. Dưới sự đồng hành của Tang Trĩ, Đoàn Gia Hứa từ từ tháo gỡ nút thắt trong lòng, thật lòng yêu một Tang Trĩ đã trưởng thành. Mối tình yêu thầm kín của hai người cuối cùng cũng bắt đầu nảy nở.', 1, 'tải xuống (16)9091.jpg', 4, '', 1, 6, 1, 1, 'Clumsy Can\'t Hide', 0, '', '2025-01-19 19:34:04', NULL, NULL, NULL, 0, NULL, 0, 1, 32, 0),
(21, 'Bùa Hình Nhân', '', 'buaahinhanhân', 'Bùa Hình Nhân – Hoon Payon (2023) được lấy cảm hứng từ loại bùa hình nhân hộ mệnh nổi tiếng ở Thái Lan, phim theo chân Tham trong hành trình đến một hòn đảo hẻo lánh để tìm người anh trai của mình đang tu hành ở đó. Tham phát hiện ra anh trai đã bị sát hại sau khi bị buộc tội giết người và trộm cắp. Quyết tâm ở lại hòn đảo để điều tra cũng như minh oan cho anh trai nhưng Tham lại vô tình khám phá ra nhiều cái chết bí ẩn khác tại ngôi làng bên cạnh.', 1, 'tải xuống (17)2892217.jpg', 6, '', 4, 9, 1, 4, 'Doll Amulet', 0, '', '', NULL, NULL, NULL, 0, NULL, 0, NULL, 0, 0),
(23, 'Nam Lai Bắc Vãng', '133 phút', 'nam-lai-bac-vang', 'Tóm tắt\r\n“Nam Lai Bắc Vãng” là một bộ phim truyền hình thể loại tình cảm lịch sử do Trịnh Hiểu Long (“Hậu Cung Chân Hoàn Truyện”) và Lưu Chương Mục (“Hành Động Phá Băng”) đồng đạo diễn. Phim có sự tham gia của Bạch Kính Đình (“Tân Xuyên Nhật Thường”), Kim Thần (“Được Ăn Cả Ngã Về Không”), và Đinh Dũng Đại (“Phong Thần 1: Tam Bộ Khúc”) đảm nhận các vai chính. Vào cuối thập kỷ 1970, trên chuyến tàu hơi nước từ Ninh Dương đến cáp Nhĩ Tân, Uông Tân (do Bạch Kính Đình thủ vai), một thanh niên làm công việc kiểm soát trên tàu, đang chăm chỉ thực hiện nhiệm vụ giữ trật tự giữa đám đông hối hả. Anh nhầm lẫn Mã Khôi (do Đinh Dũng Đại thủ vai), một cựu cảnh sát đường sắt là một kẻ đang chạy trốn, cả hai mở đầu một mối quan hệ thầy trò không mấy dễ dàng. Từ việc ban đầu không thích nhau, đến sự đồng cảm và tôn trọng lẫn nhau, Uông Tân và Mã Khôi đồng lòng chiến đấu tại tuyến đầu của cảnh sát đường sắt.', 1, 'tải xuống (18)2160.jpg', 5, '', 1, 6, 1, 3, 'The South returns to the North', 1, '', '2025-01-24 03:43:12', '2022', 'hjb', 1, 0, 'HSbXt26eF_M', 0, 6, 3, 1),
(24, 'Hồn Ma Không Đầu', NULL, 'hon-ma-khong-dau', 'Hồn Ma Không Đầu – Ivanna (2022) nói về Ambar cô gái sở hữu đôi mắt âm dương cùng người em Dika đến ở tại một viện dưỡng lão. Tại đây, họ đã phát hiện ra sự thật kinh hoàng về hồn ma không đầu Ivanna và một phần lịch sử thảm khốc của nước nhà.', 1, 'tải xuống (19)1526.jpg', 6, '', 1, 9, 0, 4, 'Headless Ghost', 0, '', '2025-01-27 18:22:10', '2021', NULL, 2, 0, NULL, 3, 1, 0, 0),
(25, 'Thế Thần: Ngự khí sư cuối cùng', '50 Phút/Tập', 'the-than-ngu-khi-su-cuoi-cung', 'Thủy. Thổ. Hỏa. Khí. Từ xa xưa, bốn quốc gia chung sống hòa bình – và rồi mọi chuyện đổi thay.', 1, 'tải xuống (20)438.jpg', 2, 'phimle', 1, 9, 1, 0, 'Avatar: The last airbender', 0, '', '2025-02-02 21:17:36', '2025', 'hrrr', 1, 0, 'HSbXt26eF_M', 1, 6, 22, 0),
(26, 'Cậu Bé Gạc Nai Phần 2', '50 Phút/Tập', 'cau-be-gac-nai-phan-2', 'Cậu Bé Gạc Nai Phần 2 – Sweet Tooth Season 2 (2023) trong hành trình phiêu lưu đầy hiểm nguy trên khắp thế giới hậu tận thế, cậu bé nửa người nửa nai đáng yêu tìm kiếm khởi đầu mới cùng một người bảo vệ cộc cằn.', 1, 'tải xuống (21)3480.jpg', 2, 'phimle', 1, 9, 1, 4, 'The Antlers Boy Part 2', 1, '', '2025-02-02 21:17:20', '2023', 'hrrr', NULL, 0, 'ekkzvBOjXoQ', 2, 9, 23, 1),
(27, 'Ninh An Như Mộng', '133 phút', 'ninh-an-nhu-mong', 'Tóm tắt\r\nNinh An Như Mộng – Story of Kunning Palace (2023) được chuyển thể từ tiểu thuyết Khôn Ninh của tác giả Thời Kính, với sự tham gia diễn chính của Bạch Lộc và Trương Lăng Hách và đạo diễn Chu Nhuệ Bân. Phim là câu chuyện kể về cuộc đời của Khương Tuyết Ninh – người không từ thủ đoạn để lên ngôi hoàng hậu. Sau cùng, Tuyết Ninh cũng chẳng thể có được tham vọng đó, thậm chí còn bị ép tự sát. Kiếp sau, để chuộc lại những lỗi lầm mình từng gây ra nàng thề với lòng sẽ tu tâm thay đổi.\r\n\r\nNhưng không ngờ, cô vẫn vào cung và trở thành học trò của Tạ Nguy. Trong khi nhận được sự dạy dỗ của Tạ Nguy, Khương Tuyết Ninh bí mật lên kế hoạch ngăn chặn “Lễ trao vương miện” sắp tới của Yến Lâm. Với kế hoạch của Tạ Nguy và Khương Tuyết Ninh, mạng sống của gia đình Yến Lâm đã được cứu. Sau “Lễ trao vương miện”, Khương Tuyết Ninh đã bị kéo vào tham gia vào kế hoạch của triều đình để loại bỏ những kẻ nổi loạn chống lại Vua Bình Nam, và cùng Trương Già xâm nhập cung điện kẻ thù… Trải qua môn vàn khó khăn gian khổ cuối cùng thì Tạ Nguy và Khương Tuyết Ninh cũng ở bên nhau.', 1, 'tải xuống (22)6334.jpg', 4, 'phimbo', 1, 6, 1, 4, 'Ninh An Nhu Mong', 1, '2025-01-17 19:45:29', '2025-02-03 16:24:21', '2023', 'Ninh An Như Mộng,\r\n\r\n#thầnmộ #hh3dhay #thanmo #hh3dhay #thanmo #thầnmộ', 0, 2, NULL, 8, 14, 31, 4),
(30, 'Tiên Võ Đế Tôn', '41:37', 'tien-vo-de-ton', 'Tiên võ đế tôn là bộ phim tu tiên hấp dẫn', 1, 'tải xuống (23)3377.jpg', 4, 'phimbo', 1, 6, 1, 4, 'Immortal Martial Emperor Ton', 1, '2025-01-27 22:27:15', '2025-02-05 09:34:07', '2024', '#thầnmộ #hh3dhay #thanmo#hh3dhay #thanmo #thầnmộ', 2, 0, 'sPOAAyHC5bg', 6, 15, 30, 1),
(35, 'Yêu Thầm Không Thể Giấu', '45 phút', 'yeu-tham-khong-the-giau', 'PHIM 《 VỤNG TRỘM KHÔNG THỂ GIẤU 》 🔆Diễn viên chính : •Triệu Lộ Tư vai Tang Trĩ •Trần Triết Viễn vai Đoàn Gia Hứa', 1, 'tải xuống (24)35.jpg', 4, 'phimbo', 7, 6, 1, 3, 'Secret love cannot be hidden', 1, '2025-02-02 23:01:09', '2025-02-05 10:56:11', '2025', '#Phim_Vụng_Trộm_Không_Thể_Giấu #Nước_Cờ_Đi_Vào_Tim_Em_舍我其谁_VNFP #YOUKUViệt Nam #YOUKU .', 0, 0, 'YoSt-5vq7z4', 10, 20, 28, 2),
(37, 'Ma Da', '1:35:16', 'ma-da', 'Phim có sự tham gia của nhiều diễn viên tên tuổi như Việt Hương, NSTƯT Thành Lộc, nghệ sĩ Trung Dân, ca sĩ Cẩm Ly, các diễn viên Dạ Chúc, Diệu Đức, Minh Khang...\" Ma Da \" khai thác đề tài tâm linh truyền thuyết dân gian gian \"ma da kéo giò\" nổi tiếng ở khu vực nước. nghề, bà Lệ tội với Ma Da, một oan hồn sống dưới sông nước thường xuyên kéo chân người để thế mạng cho mình đi đầu thai. Ân oán của cả hai khiến cho Ma Da bắt mất bé Nhung, con gái nhỏ của bà Lệ. Bà Lệ phải nhờ đến sự giúp đỡ của những người bên cạnh để cùng nhau lên đường tìm cách cứu bé.', 1, '350x495-mada7658.jpg', 1, 'phimle', 4, 2, 1, 4, 'ma da', 0, '2025-02-05 09:18:31', '2025-03-04 17:00:03', NULL, '#phimchieurap #phimmada #phimkinhdị\r\n#phimchieurap #phimmada #phimkinhdị', NULL, 0, 'SGg9DxLFCtc', 1, 9, 7, 0),
(38, 'Cha Hai Muối', '1:40:07', 'cha-hai-muoi', 'Bàn Tay Cha Mặn (Ver. 2)- OST Phim Hai Muối Sáng tác & trình bày: Hamlet Trương Lời bài hát: Tình cha, như nước con sông dài, nước về miền xuôi, phù sa nuôi lớn thân cây Đời cha, khi nắng khi mưa dầm, cay đắng hay âm âm thầm, vẫn trọn vẹn. Từ khi, mẹ vắng xa con khờ, kiếp đời long đồng, còng lưng cha ôm gian nan Vì thương, con đã bảo hiểm, thương gấp đôi cuộc đời, mãi một tình thương. Khi con, hung dữ biển Đông, mới hiểu lòng cha, vì con tháng năm hao mòn Thương cha, là dẫu có đi xa, giữ mãi tình cha tình đất con người, Bàn tay cha mặn, cho đời con ngọt muối xây dựng đời đời , xây dựng nên con Đời cha, không nói câu mỹ miiều, chỉ bằng tình thương, dạy con cách sống chân phương Chìm trong sương khói nhân gian rồi, ôi phong cách cha đâu còn… Vẫn nhìn về con. Bàn tay muối được mong đợi muối xây dựng nên đời, muối xây dựng nên con =================================== == Cảm ơn mọi người đã ủng hộ kênh. Đăng ký kênh ngay để nghe những Bản nhạc Bolero trữ tình mới nhất của Hamlet Trương nhé! Link đăng ký miễn phí: / @hamlettruongbolero', 0, 'tải xuống (25)6282.jpg', 1, 'phimle', 1, 2, 1, 2, 'father two salt', 1, '2025-02-05 09:24:14', '2025-03-18 19:55:03', NULL, '#bantaychaman #ost #hamlettruong #bolero #nhactrutinh #nhacphimhaimuoi', NULL, 0, 'kozqwnCwirU', 1, 9, 0, 1),
(39, 'Mao Sơn Tróc Quỷ', '1:57:05', 'mao-son-troc-quy', '[Thuyết Minh] MAO SƠN TRÓC QUỶ | Phim Lẻ Hành Động Kinh Dị Trung Quốc | Kinh Dịch | Tưởng Tưởng', 1, '4b16726aff7fb5e34c2f36aab4184ba370.jpg', 2, 'phimle', 1, 6, 1, 3, 'The devil\'s paint peeled off', 1, '2025-02-05 09:30:35', '2025-02-27 18:39:22', NULL, '#chinesedrama #actionmovies #phimhanhdong #phimvientuong #phimvothuat #phimvothuattrungquoc #phimtrungquoc, #phimkiemhiep #phimcotrang #phimtrungquoc', NULL, 0, 'YdnpwAH0GvE', 1, 47, 25, 12),
(40, 'Hồng Hài Nhi', '1:11:24', 'hong-hai-nhi', 'TÂY DU KÝ LẠ TRUYỆN : HỒNG HÀI NHI - PHIM CHIẾU RẠP TRUNG QUỐC MỚI NHẤT 2024 | TÂY DU NGÔẠI TRUYỆN 500 năm trước, yêu hầu Tôn Ngộ Không đại rồng Thiên cung, vô tình đạp Lò Bát Quái tạo Thiên cấp độ thế. Thiết Phiến công chúa vì chúng sinh mà tạo ra cho trẻ con trong bụng bị Tam Muội Chân Hỏa đốt cháy mà biến thành ma đồng. Để khuyến khích một ngàn năm tuổi cho mẹ là Thiết Phiến công chúa, Hồng Hài Nhi bị Thương Lang xúi giục bắt Đường Tăng làm lễ vật. Nhưng không ngờ, cả Hồng Hài Nhi và Tôn Ngộ Không sau đó đều rơi vào bẫy do Thương Lang giăng ra.... Đây là một trong bộ phim cổ trang kiếm Hiệp hay nhất Trung Quốc với nhiều lời khen ngợi cả về hình ảnh xen kẽ câu chuyện. Kính mong các bạn đón xem!', 1, 'tải xuống (27)4964.jpg', 1, 'phimle', 1, 6, 0, 4, 'Baby pink', 1, '2025-02-05 09:41:45', '2025-03-03 13:51:58', '2025', '#phimkiemhiep #phimcotrang #phimtrungquoc', 2, 0, 'tcxsiaSKJCU', 1, 21, 9, 7),
(41, 'Kẻ Ăn Hồn', '1:36:06', 'ke-an-hon', 'Phim về hàng loạt chết cái bí ẩn ở Làng Địa Ngục, nơi có ma thuật cổ xưa: 5 mạng đổi bình Rượu Sọ Người. Thập Nương - cô gái áo đỏ là kẻ nắm giữ bí thuật luyện tập nên loại rượu mạnh nhất!', 1, 'lan-phuong-28842.webp', 1, 'phimle', 1, 2, 1, 0, 'soul eater', 1, '2025-02-05 09:51:29', '2025-03-04 16:57:11', '2025', '#2023 #giảiCứuGàTây #Hành TrìnhCùngGàTây #TrốnChạy VớiGàTây #PhimHoatHinh #HàiHướcPhim #Phim TrẻEm,fgdfg', 1, 2, 'LMYo1XPUCXE', 1, 23, 8, 5),
(42, 'Giải Cứu Gà Tây', '1:24:41', 'giai-cuu-ga-tay', 'Giải Cứu Gà Tây - Free Birds 2013 kể về hai chú gà tây vô địch vô tình phát hiện ra một Chế máy du hành thời gian của chính phủ. Cả hai quyết định quay về quá khứ để... xóa bỏ chế độ ăn thịt gà tây vào mỗi lần Lễ tạ ơn.', 1, 'poster-medium-b56fcef9-0a87-411c-adce-9825ff06a5ca7978.webp', 6, 'phimle', 1, 9, 0, 4, 'rescue turkeys', 1, '2025-02-05 09:59:34', '2025-02-27 18:37:50', '2025', '#2023 #giảiCứuGàTây #Hành TrìnhCùngGàTây #TrốnChạy VớiGàTây #PhimHoatHinh #HàiHướcPhim #Phim TrẻEm', 0, 1, 'DYbZ6nTvDwA', 1, 33, 0, 0),
(50, 'Yêu Giới', '1:24:42', 'yeu-gioi', 'PHIM CHIẾU RẠP MỚI NHẤT | YÊU GIỚI | PHIM THẦN THOẠI CỔ TRANG (THUYẾT MINH).', 1, 'bach-nguyet-phan-tinh-6140-thumb18.webp', 5, 'phimle', 1, 6, 1, 0, 'Goblin world', 1, '2025-03-02 04:27:02', '2025-03-02 04:30:17', '2025', '#hollywoodmovies #phimhay #phimhanhdong', NULL, 1, 'DRayO0o-D-o', 1, 60, 5, 10),
(64, 'Trên Bàn Nhậu Dưới Bàn Mưu', '1:53:37', 'tren-ban-nhau-duoi-ban-muu', '▷ [Phim Việt Nam] Trên Bàn Nhậu Dưới Bàn Mưu - Friday Night Fever (2023)\r\n\r\nPhim xoay quanh câu chuyện của một nhóm bạn thân gồm ba cô gái: Gạo, Triệu và Thúy. Cuộc sống của họ bị đảo lộn hoàn toàn khi bị một kẻ lừa đảo chiếm đoạt số tiền tiết kiệm cả đời. Không chịu khuất phục, ba cô gái quyết định cùng nhau lên kế hoạch để lấy lại số tiền đã mất và trả thù kẻ đã lừa gạt mình.\r\nTrong quá trình thực hiện kế hoạch, họ đã gặp gỡ và nhờ đến sự giúp đỡ của Trí, một chàng trai thông minh và lanh lợi. Cùng nhau, họ đã trải qua nhiều tình huống dở khóc dở cười, đầy bất ngờ và hài hước.', 1, 'tải xuống7152.jfif', 5, 'phimle', 1, 2, 1, 4, 'On the drinking table under the planning table', 1, '2025-03-03 00:42:02', '2025-03-03 00:42:02', '2025', '#phimmoi #phimchieurap #cgv', NULL, 0, 'rZYVIK0R6sg', 1, 36, 4, 2),
(68, 'Hai Muối', '50 Phút/Tập', 'hai-muoi', 'Phim Chiếu Rạp : Phim Hai Muối ( Phần 1)  Quyền Linh , Huỳnh Bảo Ngọc , NSND Hồng Vân , Kim Hải , Kiều Oanh', 1, 'tải xuống (1)1274.jfif', 4, 'phimbo', 1, 2, 0, 0, 'father two salt', 1, '2025-03-03 12:57:46', '2025-03-03 13:40:58', '2024', '#phimmoi, #phimchieurap, #cgv', NULL, 0, 'MjxPoqCvvVs', 2, 44, 27, 4),
(69, 'Chị chị em em 2', '1:55:28', 'chi-chi-em-em-2', 'Chị Chị Em Em 2 lấy cảm hứng từ giai thoại nhân vật Ba Trà (Trần Ngọc Trà) và Tư Nhị (Marianne Nhị) Trong cuốn Sài Gòn tả pí lù, học giả Vương Hổng Sển, người sinh sống cùng thời người đẹp Ba Trà, cho biết từng tiếp chuyện với nhân vật. \"Cô Ba Trà, đệ nhất Huê khôi ở Nam kỳ, một người đẹp sắc nước hương trời từng làm say mê biết bao công tử miền Nam. Họ bao quanh cô, tranh nhau vung tiền qua cửa sổ. Bao nhiêu tiền bạc, của cải cha mẹ để lại, các công tử ấy ăn xài, bao gái không tiếc\", ông viết.\r\n\r\nNgười đẹp Tư Nhị - mỹ nhân gốc Khmer từng được Ba Trà dìu dắt - dần trở thành đối thủ cạnh tranh của cô. Tình bạn của cặp người đẹp rạn nứt khi nhiều người chuyển sang si mê, đeo đuổi Tư Nhị.\r\nLấy cảm hứng từ giai thoại mỹ nhân Ba Trà & Tư Nhị.\r\nKhởi chiếu: Mùng 1 Tết Nguyên Đán 2023 (22.01.2023)\r\nTừ Nhà sản xuất Will Vũ\r\nĐạo diễn: Vũ Ngọc Đãng\r\nDiễn viên: Minh Hằng, Ngọc Trinh', 1, 'tải xuống (2)7577.jfif', 5, 'phimle', 1, 2, 1, 0, 'sisters 2', 1, '2025-03-03 13:04:32', '2025-03-03 13:40:43', '2024', '#phimmoi, #phimchieurap, #cgv', NULL, 2, 'j3r7kq0UZMw', 1, 61, 2, 3),
(70, 'Định mệnh thiên ý', '1:53:35', 'dinh-menh-thien-y', 'Định Mệnh Thiên Ý - Ngôn tình hài hước lãng mạn | Hari Won - Tuấn Trần - BB Trần - Phương Lan\r\n#HariWon #TuanTran #DinhMenhThienY', 1, 'img5923-16155305201371562260124_SNGN12.jpg', 2, 'phimle', 1, 2, 1, 4, 'divine destiny', 1, '2025-03-03 13:18:39', '2025-03-03 13:18:39', NULL, '#HariWon #TuanTran', NULL, 0, 'D28wULYK4i0', 1, 68, 21, 1),
(71, 'Siêu trợ lý', '2:46:50', 'sieu-tro-ly', 'TẬP FULL] SIÊU TRỢ LÝ | Trương Quỳnh Anh, Khương Lê, Gi-A Nguyễn, Hải Triều, Ốc Thanh Vân...', 1, '234728.jpg', 2, 'phimle', 1, 2, 1, 4, 'super assistant', 0, '2025-03-03 13:26:53', '2025-03-03 13:26:53', NULL, '#octhanhvan #truongquynhanh #musicvideo', NULL, 0, 'kBC2HiNuxFU', 1, 45, 20, 0),
(72, 'Trường sinh giới', '25 phút/tập', 'truong-sinh-gioi', 'Trên đời này liệu có ai bất tử? Dù có tài hoa tuyệt đỉnh, nổi tiếng thiên hạ, cuối cùng cũng phải hóa thành đống xương khô; Dù có là con của trời, nắm trong tay vạn dặm giang sơn, cuối cùng cũng sẽ biến thành một nắm hoàng thổ. Câu chuyện kể về Tiêu Thần bị thiên nữ hoàng gia Triệu Lâm Nhi truy sát, vô tình lạc vào Đảo Rồng hoang dã ở Trường Sinh Giới. Đây là một con đường cụt không có lối về nhà, phải đối mặt với đầy rẫy quái thú và kẻ thù. Sự lưu luyến với người thân, bằng hữu và cố hương luôn là điểm tựa để Tiêu Thần đứng vững chiến đấu với quái thú và kẻ thù ở vùng đất kỳ lạ này. Trong cuộc chiến cuồng nhiệt, sự cám dỗ của cảm xúc và dục vọng, Tiêu Thần đi theo bước chân của những người trường sinh bất tử, từ từ vén lên bức màn bí ẩn về một thế giới thần thoại cổ xưa bị cát bụi phong ấn...', 1, 'tải xuống (3)3198.jfif', 4, 'phimle', 1, 6, 1, 4, 'eternal life', 0, '2025-03-03 13:39:44', '2025-03-03 13:39:44', NULL, '#truongsinhgioi ,#长生界 #dauladailuc', NULL, 0, '0d5z1BLChtE', 10, 78, 26, 16),
(73, 'Ma Thổi Kèn', '1:32:08', 'ma-thoi-ken', 'Phim Lẻ Hay: Ma Thổi Đèn - Trùng Cốc Hiến Vương | Phim Phiêu Lưu Hành Động Trung Quốc HD (LỒNG TIẾNG)', 1, 'tải xuống (4)2697.jfif', 5, 'phimle', 1, 2, 1, 4, 'ghost blows the trumpet', 1, '2025-03-04 16:40:51', '2025-03-04 16:40:51', NULL, '#phimlehay #phim #hanhdong', NULL, 0, 'J1SU5H6K64o', 1, 68, 0, 7),
(74, 'Chuyến Xa Bá Đạo', '1:30:02', 'chuyen-xa-ba-dao', 'Nội dung phim kể về chuyến hành trình chở khách của xe buýt số 888. Với những vị khách kì quái, cùng với những tình huống “dở khóc dở cười”. Là một dự án phim Hài của Thái Lan, bộ phim khắc họa lên nhiều tính cách nhân vật thể hiện góc nhìn châm biếm của xã hội được thu nhỏ trên một chuyến xe.', 1, 'tải xuống (5)6977.jfif', 2, 'phimle', 1, 2, 0, 4, 'epic ride', 1, '2025-03-04 16:54:41', '2025-03-04 16:54:41', NULL, '#phimthailan\r\n#haichieurap\r\n#haibadao', NULL, 0, '2IcI29w5R6g', 1, 63, 18, 2),
(75, 'Khi Con Là Nhà', '1:21:13', 'khi-con-la-nha', 'PHIM CHIẾU RẠP | KHI CON LÀ NHÀ | PHIM ĐẸP VỀ TÌNH CHA CON CỦA VŨ NGỌC ĐẢNG\r\n\r\nỞ một vùng quê yên bình, hai cha con Quang (Lương Mạnh Hải đóng) và cu Bi (bé Duy Anh đóng) sống vui vẻ bên nhau với nghề chăn lợn, chăn vịt. Tuy nhiên, người cha mắc tật bài bạc, cá độ, hay đốt tiền vào những trò đỏ đen. Trong một lần chiếu bạc bị công an ập vào, Quang xô công an ngã gãy tay rồi lẩn trốn. Anh cùng con trai lên TP HCM. Tại thành phố, hai cha con sống kiếp lang bạt, đói khát, có lúc lạc nhau, có lúc phải đối mặt với âm mưu của bọn giang hồ.', 1, 'khicon406x6003641.jpg', 2, 'phimle', 1, 2, 1, 4, 'when you are home', 1, '2025-03-04 17:13:16', '2025-03-11 19:25:08', '2025', 'phimchieurap,phimcgv', NULL, 0, '6ohkm1DMGjQ', 1, 108, 19, 10),
(76, 'Đào, Phở và Piano', '133 phút', 'dao-pho-va-piano', 'Đào, Phở và Piano\r\nĐược sự đồng ý của Cục Điện ảnh (Bộ VHTT&DL), Đài Truyền hình Việt Nam, Đài Phát thanh và Truyền hình Hà Nội đã có bản quyền phát sóng bộ phim điện ảnh “Đào, phở và piano\" dịp kỷ niệm 70 năm Ngày Giải phóng Thủ đô (10/10/1954 - 10/10/2024).\r\n\r\nViệc phát sóng bộ phim đúng vào tháng 10 lịch sử năm nay là điều vô cùng ý nghĩa, để Nhân dân Thủ đô và cả nước được thưởng thức một tác phẩm điện ảnh về 60 ngày đêm chiến đấu bảo vệ Hà Nội năm 1946 - 1947.\r\n\r\n“Đào, phở và piano” là bộ phim của đạo diễn Phi Tiến Sơn, do Hãng Phim truyện I sản xuất, tái hiện sinh động cuộc sống của người dân Hà Nội trong những năm tháng chiến đấu gian khổ nhưng đầy hào khí.\r\n\r\nPhim không chỉ khắc họa chân thực tính chất khốc liệt của trận chiến lịch sử, mà qua những câu chuyện tình yêu, tình bạn, tình đồng đội, khán giả cảm nhận được tinh thần yêu nước nồng nàn, sự kiên cường bất khuất của người Hà Nội. Phim có sự tham gia của NSND Trung Hiếu; đạo diễn, NSND Trần Lực; diễn viên Anh Tuấn, Doãn Quốc Đam…\r\n\r\n“Đào, phở và piano” từng đoạt giải Bông sen Bạc tại Liên hoan Phim Việt Nam lần thứ 23 và Cánh diều Bạc tại giải thưởng của Hội Điện ảnh Việt Nam năm 2023. Đặc biệt, bộ phim đã được chọn đại diện Việt Nam dự vòng sơ tuyển của giải Oscar lần thứ 97 ở hạng mục Phim nói tiếng nước ngoài.', 1, 'tải xuống (6)1148.jfif', 5, 'phimle', 1, 2, 1, 0, 'father two salt', 0, '2025-03-04 17:42:10', '2025-03-04 17:42:10', '2025', 'dscsa', NULL, 0, 'xcvihui', 1, 69, 1, 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `movie_genre`
--

CREATE TABLE `movie_genre` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `movie_genre`
--

INSERT INTO `movie_genre` (`id`, `movie_id`, `genre_id`) VALUES
(1, 27, 9),
(2, 27, 10),
(3, 27, 13),
(4, 27, 14),
(5, 26, 6),
(6, 26, 9),
(7, 26, 11),
(8, 25, 1),
(9, 25, 11),
(10, 25, 13),
(11, 25, 14),
(12, 27, 1),
(13, 24, 4),
(14, 24, 11),
(15, 23, 1),
(16, 23, 12),
(21, 8, 4),
(22, 8, 7),
(23, 18, 6),
(24, 18, 7),
(25, 30, 10),
(26, 30, 13),
(27, 30, 14),
(32, 9, 6),
(33, 9, 7),
(34, 9, 11),
(36, 27, 6),
(38, 15, 9),
(39, 15, 10),
(40, 35, 1),
(41, 35, 7),
(42, 37, 4),
(43, 38, 1),
(44, 39, 4),
(45, 39, 10),
(46, 39, 14),
(47, 40, 10),
(49, 41, 1),
(50, 41, 4),
(51, 41, 11),
(52, 42, 11),
(53, 42, 12),
(54, 42, 13),
(56, 42, 3),
(65, 11, 1),
(66, 50, 4),
(67, 50, 10),
(68, 50, 14),
(82, 64, 1),
(83, 64, 3),
(84, 64, 12),
(88, 68, 1),
(89, 69, 1),
(90, 70, 1),
(91, 71, 1),
(92, 71, 12),
(93, 72, 9),
(94, 72, 10),
(95, 72, 14),
(96, 40, 13),
(97, 73, 4),
(98, 73, 11),
(99, 74, 11),
(100, 74, 12),
(101, 75, 1),
(102, 75, 12),
(103, 76, 1),
(104, 14, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `ip_address` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `rating`
--

INSERT INTO `rating` (`id`, `rating`, `movie_id`, `ip_address`) VALUES
(1, 1, 39, '127.0.0.1'),
(2, 3, 42, '127.0.0.1'),
(3, 5, 41, '127.0.0.1'),
(4, 5, 35, '127.0.0.1'),
(5, 5, 40, '127.0.0.1'),
(6, 5, 38, '127.0.0.1'),
(7, 4, 44, '127.0.0.1'),
(8, 5, 30, '127.0.0.1'),
(9, 5, 37, '127.0.0.1'),
(10, 4, 26, '127.0.0.1'),
(11, 5, 8, '127.0.0.1'),
(12, 5, 17, '127.0.0.1'),
(13, 3, 10, '127.0.0.1'),
(14, 5, 9, '127.0.0.1'),
(15, 5, 18, '127.0.0.1'),
(16, 5, 16, '127.0.0.1'),
(17, 5, 15, '127.0.0.1'),
(18, 5, 11, '127.0.0.1'),
(19, 3, 13, '127.0.0.1'),
(20, 5, 23, '127.0.0.1'),
(21, 5, 27, '127.0.0.1'),
(22, 5, 50, '127.0.0.1'),
(23, 5, 69, '127.0.0.1'),
(24, 5, 72, '127.0.0.1'),
(25, 5, 14, '127.0.0.1'),
(26, 4, 76, '127.0.0.1'),
(27, 5, 75, '127.0.0.1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `statistics`
--

CREATE TABLE `statistics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_total` int(10) UNSIGNED DEFAULT 0,
  `genre_total` int(10) UNSIGNED DEFAULT 0,
  `country_total` int(10) UNSIGNED DEFAULT 0,
  `movie_total` int(10) UNSIGNED DEFAULT 0,
  `comment_total` int(10) UNSIGNED DEFAULT 0,
  `time_filter` enum('week','month','year') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tracker_paths`
--

CREATE TABLE `tracker_paths` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `google_id` int(11) DEFAULT NULL,
  `facebook_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `google_id`, `facebook_id`) VALUES
(1, 'Đức', 'xuanduc281011a4@gmail.com', NULL, '$2y$10$0FBIargKhgtKe8GqqBtqduhcMrRiqGh9lo/AsNhNXQL/RksbDc0uS', NULL, '2025-02-26 06:24:04', '2025-02-26 06:24:04', NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Chỉ mục cho bảng `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `episodes`
--
ALTER TABLE `episodes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `movie_genre`
--
ALTER TABLE `movie_genre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `statistics`
--
ALTER TABLE `statistics`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tracker_paths`
--
ALTER TABLE `tracker_paths`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tracker_paths_created_at_index` (`created_at`),
  ADD KEY `tracker_paths_updated_at_index` (`updated_at`),
  ADD KEY `tracker_paths_path_index` (`path`);

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
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `episodes`
--
ALTER TABLE `episodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `info`
--
ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT cho bảng `movie_genre`
--
ALTER TABLE `movie_genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `statistics`
--
ALTER TABLE `statistics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tracker_paths`
--
ALTER TABLE `tracker_paths`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `episodes`
--
ALTER TABLE `episodes`
  ADD CONSTRAINT `episodes_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `movie_genre`
--
ALTER TABLE `movie_genre`
  ADD CONSTRAINT `movie_genre_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
