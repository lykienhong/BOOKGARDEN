-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 17, 2022 lúc 08:40 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bookgarden`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `adminId` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `roleName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adminName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adminPassword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adminFName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adminPhone` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`adminId`, `role`, `roleName`, `adminName`, `adminPassword`, `adminFName`, `adminPhone`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', 'kienhong', '123', 'lykienhong', 39752164, '2021-12-28 04:03:12', '2021-12-28 11:03:12'),
(2, 2, 'sale', 'hoanghuylee', '123', 'hoanghuylee', 123456798, '2021-12-28 04:03:12', '2022-01-17 13:59:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `cartId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quanPrice` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `cateId` int(11) NOT NULL,
  `cateName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `visible` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`cateId`, `cateName`, `created_at`, `updated_at`, `visible`) VALUES
(2, 'Sách dân gian', '2021-12-28 07:38:38', '2022-01-17 14:21:25', 1),
(3, 'Truyện tranh', '2021-12-28 07:38:38', '2022-01-17 14:15:42', 0),
(9, 'Sách giáo dục', '2022-01-07 11:47:57', '2022-01-17 14:16:19', 0),
(10, 'Sách tiểu thuyết', '2022-01-08 10:42:29', '2022-01-17 14:15:52', 0),
(13, 'Sách khoa học', '2022-01-17 07:16:46', '2022-01-17 14:16:46', 0),
(14, 'Sách tâm lý học', '2022-01-17 07:16:56', '2022-01-17 14:16:56', 0),
(15, 'Văn phòng phẩm', '2022-01-17 07:17:07', '2022-01-17 14:17:07', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `commentId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `previous_commentId` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback`
--

CREATE TABLE `feedback` (
  `feedbackId` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `feedbackDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `descriptionFeedback` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `replyFeedback` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetails`
--

CREATE TABLE `orderdetails` (
  `orderDetailsId` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `QuanvsPrice` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `orderId` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `ship_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `process_status` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `productId` int(11) NOT NULL,
  `productName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productImage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cateId` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `productStatus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` int(11) DEFAULT NULL,
  `rateCount` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `visiblePro` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`productId`, `productName`, `productImage`, `cateId`, `price`, `productStatus`, `description`, `rate`, `rateCount`, `updated_at`, `created_at`, `visiblePro`) VALUES
(2, 'Truyện Blackjacka', 'black-jack-tap-4-bc.png', 3, 1200, 'Còn hàng', 'blackjack tập 4', NULL, NULL, '2022-01-17 14:18:03', '2021-12-28 10:28:44', 0),
(3, 'Truyện tsubasa', 'tsubasa-giac-mo-san-co.png', 3, 15000, 'Còn hàng', 'truyện tranh stubasa giấc mơ sân cỏ', NULL, NULL, '2022-01-16 22:21:50', '2021-12-28 10:30:04', 0),
(4, 'Truyện tây du hi', 'tay-du-hi.png', 3, 12000, 'Còn hàng', 'Truyện tranh tây du hí', NULL, NULL, '2021-12-28 17:31:28', '2021-12-28 10:31:28', 0),
(5, 'Truyện hoàng tử thiên tài', 'hoang-tu-thien-tai-tap-1.png', 1, 2000, 'Còn hàng', 'Truyện hoàng tử thiên tài tập 4', NULL, NULL, '2022-01-17 11:43:47', '2021-12-28 10:32:02', 0),
(6, 'Truyện dáng hình âm thanh', 'boxset-dang-hinh-thanh-am-7c.png', 3, 50000, 'Còn hàng', 'Dáng hình thanh âm tập 13', NULL, NULL, '2022-01-17 14:17:33', '2021-12-28 12:22:30', 0),
(7, 'Chuyển sinh thành người sói', 'chuyen-sinh-thanh-nguoi-soi-toi-tro-thanh-canh-tay-phai-cua-ma-vuong.png', 3, 30000, 'Còn hàng', 'Chuyển sinh thành người sối trở thành cách tay phải của ma vương', NULL, NULL, '2022-01-17 14:17:48', '2022-01-07 11:49:21', 0),
(9, 'Hải ngoại ký sự', 'hai-ngoai-ky-su.png', 8, 15000, 'Còn hàng', 'Hải ngoại ký sự xuất bản năm 1998', NULL, NULL, '2022-01-07 18:50:19', '2022-01-07 11:50:19', 0),
(13, 'Bài tập  tiếng anh', 'bai-tap-hoan-thanh-cau-tieng-anh-on-thi-vao-lop-10.jpg', 9, 12000, 'Còn hàng', 'Bài tập hoàn thành câu thì tiếng anh ôn thi vào lớp 10', NULL, NULL, '2022-01-17 14:19:20', '2022-01-17 07:19:20', 0),
(14, 'Bài tập ôn thi tiếng anh', 'bai-tap-viet-lai-cau-tieng-anh-on-thi-vao-lop-10.jpg', 9, 12000, 'Còn hàng', 'Bài tập viết lại câu tiếng anh ôn thi vào lớp 10', NULL, NULL, '2022-01-17 14:19:59', '2022-01-17 07:19:59', 0),
(15, 'Góc nhìn của warren buffett', 'bao-cao-tai-chinh-duoi-goc-nhin-warren-buffett-tb-2021.jpg', 13, 12000, 'Còn hàng', 'Báo cáo tài chính dưới góc nhìn warren buffett tái bản 2021', NULL, NULL, '2022-01-17 14:35:59', '2022-01-17 07:21:19', 0),
(16, 'Đánh cắp ý tưởng', 'danh-cap-y-tuong.jpg', 14, 13000, 'Còn hàng', 'Đánh cắp ý tưởng xuất bản 2021', NULL, NULL, '2022-01-17 14:22:01', '2022-01-17 07:22:01', 0),
(17, 'Bé calm hãy bình tâm', 'be-calm-hay-binh-tam.png', 10, 15000, 'Còn hàng', 'Bé calm hãy bình tâm tái bản 2020', NULL, NULL, '2022-01-17 14:22:43', '2022-01-17 07:22:43', 0),
(18, 'Bút cọ màu', 'Bút cọ màu.png', 15, 15000, 'Còn hàng', 'Bút cọ màu cho mọi lứa tuổi', NULL, NULL, '2022-01-17 14:23:17', '2022-01-17 07:23:17', 0),
(19, 'Bút dạ quang', 'Bút dạ quang.jpg', 15, 12000, 'Còn hàng', 'Bút dạ quang cho học sinh', NULL, NULL, '2022-01-17 14:29:07', '2022-01-17 07:29:07', 0),
(20, 'Giỏ trái cây', 'gio-trai-cay.jpg', 14, 11000, 'Còn hàng', 'Giỏ trái cây xuất bản 2020', NULL, NULL, '2022-01-17 14:29:53', '2022-01-17 07:29:53', 0),
(21, 'Hồ sơ tâm lí tội phạm', 'ho-so-tam-li-toi-pham-tap-1.jpg', 14, 11000, 'Còn hàng', 'Hồ sơ tâm lí tội phạm tập 1', NULL, NULL, '2022-01-17 14:30:30', '2022-01-17 07:30:30', 0),
(22, 'Thời gian', 'Thời gian minh họa sinh động bằng tranh.png', 13, 12000, 'Còn hàng', 'Thời gian minh họa sống động bằng tranh', NULL, NULL, '2022-01-17 14:37:02', '2022-01-17 07:31:00', 0),
(23, 'Giải mã giấc mơ', 'giai-ma-giac-mo.png', 10, 13000, 'Còn hàng', 'Giải mã giấc mơ xuất bản 2020', NULL, NULL, '2022-01-17 14:35:03', '2022-01-17 07:35:03', 0),
(24, 'Trái đất và vũ trụ', 'trái đất và vũ trụ.png', 2, 12000, 'Còn hàng', 'Trái đất và vũ trụ xuất bản 2020', NULL, NULL, '2022-01-17 14:37:33', '2022-01-17 07:37:33', 0),
(25, 'Viết bi xanh dương', 'Viết bi xanh dương.png', 15, 9000, 'Còn hàng', 'Viết bi xanh dương cho học sinh', NULL, NULL, '2022-01-17 14:38:16', '2022-01-17 07:38:16', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `userName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userPassword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'blank.png',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `userName`, `userPassword`, `fullname`, `avatar`, `email`, `telephone`, `address`, `gender`, `birthday`, `created_at`, `updated_at`) VALUES
(11, 'hoanggiang', '123', 'giangngo', 'blank.png', 'giang@aa.com', 3322665, NULL, NULL, NULL, '2022-01-13 11:35:53', '2022-01-17 14:13:46');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartId`),
  ADD KEY `productId` (`productId`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cateId`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`commentId`),
  ADD KEY `productId` (`productId`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Chỉ mục cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedbackId`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`orderDetailsId`),
  ADD KEY `orderId` (`orderId`),
  ADD KEY `productId` (`productId`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderId`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`),
  ADD KEY `cateId` (`cateId`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `cateId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `commentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT cho bảng `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedbackId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `orderDetailsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=474;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`productId`) REFERENCES `product` (`productId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `product` (`productId`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comment_ibfk_3` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`adminId`);

--
-- Các ràng buộc cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`orderId`) REFERENCES `orders` (`orderId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`productId`) REFERENCES `product` (`productId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`cateId`) REFERENCES `category` (`cateId`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`cateId`) REFERENCES `category` (`cateId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
