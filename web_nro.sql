-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th6 30, 2024 lúc 03:00 SA
-- Phiên bản máy phục vụ: 5.7.17-log
-- Phiên bản PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web_nro`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `password` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `character` text COLLATE utf8mb4_unicode_ci,
  `active` tinyint(4) DEFAULT '1',
  `role` int(11) DEFAULT '0',
  `ban` tinyint(4) DEFAULT '0',
  `online` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sdt` text COLLATE utf8mb4_unicode_ci,
  `vnd` int(11) NOT NULL DEFAULT '1000000000',
  `tongnap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `ngoc_xanh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diemtichnap` int(11) NOT NULL DEFAULT '0',
  `sv_port` int(11) NOT NULL DEFAULT '14445',
  `logout_time` bigint(20) NOT NULL DEFAULT '0',
  `last_ip` varchar(24) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_login` tinyint(4) DEFAULT '0',
  `admin` int(11) NOT NULL,
  `mabaove` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `tichdiem` int(11) DEFAULT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `private_gitcode` longtext COLLATE utf8mb4_unicode_ci,
  `mocnap` int(11) NOT NULL DEFAULT '0',
  `moc_qua_1` int(11) NOT NULL DEFAULT '0',
  `moc_qua_2` int(11) NOT NULL DEFAULT '0',
  `moc_qua_3` int(11) NOT NULL DEFAULT '0',
  `moc_qua_4` int(11) NOT NULL DEFAULT '0',
  `coin` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `character`, `active`, `role`, `ban`, `online`, `created_at`, `updated_at`, `sdt`, `vnd`, `tongnap`, `ngoc_xanh`, `email`, `diemtichnap`, `sv_port`, `logout_time`, `last_ip`, `is_login`, `admin`, `mabaove`, `tichdiem`, `ip_address`, `private_gitcode`, `mocnap`, `moc_qua_1`, `moc_qua_2`, `moc_qua_3`, `moc_qua_4`, `coin`) VALUES
(1, 'web_nro', '88888888', NULL, 1, 0, 0, 0, NULL, NULL, NULL, 1000000000, '0', NULL, NULL, 0, 14445, 0, NULL, 0, 0, '', NULL, NULL, NULL, 0, 0, 0, 0, 0, 0),
(2, 'webnro', 'webnro', NULL, 1, 0, 0, 0, NULL, NULL, NULL, 1000000000, '0', NULL, NULL, 0, 14445, 0, NULL, 0, 0, '', NULL, NULL, NULL, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `atm_lichsu`
--

CREATE TABLE `atm_lichsu` (
  `id` int(11) NOT NULL,
  `user_nap` varchar(20) DEFAULT NULL,
  `magiaodich` text NOT NULL,
  `thoigian` text,
  `sotien` text,
  `status` int(11) DEFAULT NULL,
  `accountNo` int(11) DEFAULT NULL,
  `benAccountName` varchar(255) DEFAULT NULL,
  `bankName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `forum`
--

CREATE TABLE `forum` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `comments` json DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `date` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `napthe`
--

CREATE TABLE `napthe` (
  `id` int(11) NOT NULL,
  `user_nap` varchar(100) NOT NULL,
  `telco` varchar(255) NOT NULL,
  `serial` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `panel`
--

CREATE TABLE `panel` (
  `domain` text,
  `title` text,
  `tenmaychu` text,
  `logo` text,
  `dailythe` varchar(255) NOT NULL,
  `android` text,
  `iphone` text,
  `windows` text,
  `java` text,
  `partner_key` text NOT NULL,
  `partner_id` text NOT NULL,
  `sukien` varchar(255) DEFAULT NULL,
  `giatri` int(11) NOT NULL DEFAULT '1',
  `userlogin` varchar(20) DEFAULT NULL,
  `stk` varchar(20) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `sessionId` varchar(255) DEFAULT NULL,
  `deviceId` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `panel`
--

INSERT INTO `panel` (`domain`, `title`, `tenmaychu`, `logo`, `dailythe`, `android`, `iphone`, `windows`, `java`, `partner_key`, `partner_id`, `sukien`, `giatri`, `userlogin`, `stk`, `name`, `password`, `sessionId`, `deviceId`, `token`, `time`) VALUES
('https://caubengocrong.com/', 'Cậu Bé Ngọc Rồng - Máy Chủ Ngọc Rồng Online', 'Cậu Bé Ngọc Rồng', '../Images/.png', 'https://doithe1s.vn/', 'https://www.mediafire.com/file/0j1bwhoq6p5d86v/CauBeRong.apk/file', 'https://testflight.apple.com/join/FkkRUNnA', 'https://www.mediafire.com/file/6tlmjeogm6hux8v/CauBeRong.zip/file', '', '0', '0', NULL, 1, '-', '-', '-', '0', '0', '0', '0', 1714821247);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `character` (`character`(768)) USING BTREE;

--
-- Chỉ mục cho bảng `atm_lichsu`
--
ALTER TABLE `atm_lichsu`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `napthe`
--
ALTER TABLE `napthe`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `atm_lichsu`
--
ALTER TABLE `atm_lichsu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `forum`
--
ALTER TABLE `forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `napthe`
--
ALTER TABLE `napthe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
