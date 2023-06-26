-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2023 at 09:52 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digiphone`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(20) NOT NULL,
  `image` varchar(230) NOT NULL,
  `categories_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `image`, `categories_id`) VALUES
(1, 'xperia_pro_i_collection_banner_0ecddb9e3d594ed49310697c5e64f26a_master.webp', 2),
(2, 'ms_banner_img3.webp', 3),
(3, 'redmi-k40-gaming-edition_800x450_1cd3c9b1652f44bbb667f8e74e73d796_grande.webp', 5),
(6, 'ms_banner_img8.webp', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `price` int(11) NOT NULL,
  `color` text NOT NULL,
  `capacity` text NOT NULL,
  `quantily` int(11) NOT NULL,
  `image` varchar(225) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(20) NOT NULL,
  `name` varchar(230) NOT NULL,
  `image` varchar(230) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`) VALUES
(1, 'Iphone', 'ms_banner_img3.webp'),
(2, 'Samsung', 'ms_banner_img3.webp'),
(3, 'Sony', 'xperia_pro_i_collection_banner_0ecddb9e3d594ed49310697c5e64f26a_master.webp'),
(4, 'Lattop', 'maxresdefault_9dbd574cc37144a895d28c64e4d66297_grande.webp'),
(5, 'Xiaomi', 'redmi-k40-gaming-edition_800x450_1cd3c9b1652f44bbb667f8e74e73d796_grande.webp');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `content` varchar(225) DEFAULT NULL,
  `rating` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `content`, `rating`, `product_id`, `user_id`, `created_date`) VALUES
(4, 'ádasd', 4, 16, 2, '2023-06-23 16:29:16'),
(5, 'ádasd', 5, 16, 2, '2023-06-23 16:29:49'),
(7, 'san pham mlem', 5, 9, 2, '2023-06-24 09:03:17');

-- --------------------------------------------------------

--
-- Table structure for table `oder`
--

CREATE TABLE `oder` (
  `id` int(20) NOT NULL,
  `status` int(10) NOT NULL,
  `payment_method` varchar(225) NOT NULL,
  `vnp_txnref` varchar(225) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_name` varchar(225) NOT NULL,
  `user_numberphone` varchar(225) NOT NULL,
  `user_address` varchar(225) NOT NULL,
  `user_id` int(20) NOT NULL,
  `totalmonney` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `oder`
--

INSERT INTO `oder` (`id`, `status`, `payment_method`, `vnp_txnref`, `created_date`, `user_name`, `user_numberphone`, `user_address`, `user_id`, `totalmonney`) VALUES
(42, 2, 'COD', '8294', '2023-06-24 08:57:52', 'ngo tien dat', '09886989', '90 nguyen tuan', 2, 12500000),
(43, 1, 'COD', '8806', '2023-06-24 08:58:04', 'ngo tien dat', '09886989', '90 nguyen tuan', 2, 27000000),
(44, 0, 'VNPAY', '8784', '2023-06-24 01:34:02', 'ngo tien dat', '0123123123', 'Móng cái, Quảng Ninh', 2, 45990000),
(45, 0, 'VNPAY', '5496', '2023-06-24 04:03:37', 'ngo tien dat', '09886989', 'Đông Hưng, Thái Bình', 2, 27000000),
(46, 0, 'COD', '7280', '2023-06-24 04:03:44', '', '', '', 2, 0),
(47, 0, 'COD', '6229', '2023-06-24 04:04:15', 'ngo tien dat', '09886989', '90 nguyen tuan meme', 2, 27000000),
(48, 1, 'COD', '2316', '2023-06-24 08:58:09', 'ngo tien dat', '09886989', 'Đông Hưng, Thái Bình', 2, 54990000),
(49, 0, 'VNPAY', '1268', '2023-06-24 11:49:16', 'ngo tien dat', '09886989', 'Móng cái, Quảng Ninh', 2, 27000000),
(50, 0, 'COD', '619', '2023-06-24 12:24:00', '', '', '', 2, 82980000);

-- --------------------------------------------------------

--
-- Table structure for table `oder_detail`
--

CREATE TABLE `oder_detail` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantily` int(11) NOT NULL,
  `oder_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `oder_detail`
--

INSERT INTO `oder_detail` (`id`, `product_id`, `quantily`, `oder_id`) VALUES
(20, 8, 1, 42),
(21, 16, 1, 43),
(22, 13, 1, 44),
(23, 7, 1, 44),
(24, 16, 1, 45),
(25, 16, 1, 47),
(26, 7, 1, 48),
(27, 16, 1, 48),
(28, 16, 1, 49),
(29, 16, 1, 50),
(30, 7, 2, 50);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(20) NOT NULL,
  `name` varchar(225) NOT NULL,
  `price` float(20,0) NOT NULL,
  `description` text NOT NULL,
  `capacity` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `color` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `others` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `image` varchar(230) NOT NULL,
  `categories_id` int(20) NOT NULL,
  `sale` float NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `quantily` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `description`, `capacity`, `color`, `others`, `image`, `categories_id`, `sale`, `created_date`, `quantily`) VALUES
(7, 'SAMSUNG Galaxy S22 Ultra 5G Mỹ Mới Fullbox update', 28990000, 'update tẽt', '[\"6GB | 128GB\",\"          6GB | 256GB\"]', '[\"Đen\",\"          Xanh\",\"         TRắng\"]', '{\"k\":[\"\",\"Kích Thước\",\"a\",\"update\"],\"v\":[\"\",\"160.8 x 78.1 x 7.7 mm (6.33 x 3.07 x 0.30 in)\",\"1\",\"update\"]}', 'fbd41f98e93c4d6f511dc75_master_45b45eaaba9a449bbb593d85690b9dd6_master_3ba269328a7c45b783bd724cb69bf869_master.webp', 2, 1000000, '2023-06-23 16:29:38', 12),
(8, 'Iphone 12 Pro Max Quốc tế Mới', 13000000, 'Đánh giá chi tiết Iphone 12 Pro Max Quốc tế Mới\r\nThế hệ iPhone 12 Pro Max mới trong năm 2020 sẽ có các bản cập nhật lớn. Điện thoại sẽ có bốn phiên bản iPhone 12mini , 12, 12 Pro và 12 Pro Max. Các thiết bị sẽ có màn hình OLED với tính năng 5G mới.\r\nĐáng chú ý hơn, iPhone 12 mini (2020) được cho là sẽ có màn hình có tốc độ làm mới 60Hz và 120Hz có thể chuyển đổi. Đây là sự cải tiến vượt bậc của Apple trong năm tới. Ở thế hệ iPhone vừa qua, trong khi các đối thủ đã có trang bị màn hình 120Hz cho các thiết bị của họ thì Táo Khuyết vẫn chưa có động thái gì. Trong năm tới, hi vọng Apple sẽ trang bị màn hình này cho iPhone 12 mini.', '[\"\"]', '[\"\"]', '{\"k\":[\"\",\"\",\"\",\"\"],\"v\":[\"\",\"\",\"\",\"\"]}', '9b74292ba657a0fa705c7e4_grande_4823b2e9de054d24a081398ba43076e0_master_b9b528d0a3804e2396d3944ba90b2fd8_master.webp', 1, 500000, '2023-06-21 08:25:20', 50),
(9, 'SONY Xperia 1 Mark 3 Mới 100% Fullbox', 14900000, 'Đánh giá chi tiết SONY Xperia 1 Mark 3 Mới 100% Fullbox\r\nMới đây, Xperia 1 III đã được “trình làng”, đây là một trong những smartphone cao cấp nhất được Sony bán ra tại thời điểm hiện nay. \r\n\r\n\r\n\r\nTổng quan về thiết kế, Xperia 1 III vẫn đi theo xu hướng thiết kế OmniBalance. Đây là kiểu thiết kế đặc trưng của smartphone Sony trong nhiều năm trở lại đây. Thân máy được hoàn thiện từ chất liệu kính cao cấp và khung viền kim loại. Máy có tổng thể khá dài do sử dụng màn hình chuẩn Cinematic với tỷ lệ 21:9 tương tự hai thế hệ trước. Nếu để xét về chất lượng hoàn thiện thì có lẽ Xperia 1 III xứng đáng là chiếc smartphone nằm trong top đầu trên thị trường.', '[\"128GB\",\"  2880GB\"]', '[\"green\",\"  red\",\"  yellow\"]', '{\"k\":[\"\",\"\",\"\"],\"v\":[\"\",\"\",\"\"]}', 'ny-xperia-1-iv-white-digiphone_2e4d7f92adad4b56b68c99668038e3bd_master_7926496de0424a41bcacf73325cf0641_master.webp', 3, 1200000, '2023-06-24 02:02:11', 10),
(10, 'XIAOMI Redmi K40 Gaming 12Gb/128Gb Likenew', 1500000, 'Về tổng quan thông số máy có độ dày 8.3mm và nặng 205g. Thoạt đầu nghe có vẻ máy dày và nặng đúng không nào?  Nhưng thực tế khi so sánh với các smartphone chơi game khác, Redmi K40 Gaming Edition lại mỏng và nhẹ hơn rất nhiều.\r\nXiaomi K40 Gamming có thiết kế khung kim loại và mặt lưng bằng kính cường lực. Khác với người anh em Redmi K40 có mặt sau chỉ làm bằng nhựa tổng hợp.\r\n\r\n\r\nKhác với phiên bản tiêu chuẩn, chiếc K40 Gaming Edition sở hữu cụm camera có thiết kế gaming: Hai bên mép có các dòng chữ FREEZING, SPEEDIEST và được tích hợp đèn RGB xung quanh. Khi nhận thông báo mới, sạc điện thoại hay đang dùng thiết bị để chơi game, các đèn RGB này sẽ sáng lên và nhấp nháy chứ không phải lúc nào cũng sáng.\r\nCác chuyên gia từ trang tin còn nói rằng, phần đèn flash và thiết kế loa cũng mang phong cách gaming. Kết hợp với khung máy mang thiết kế của một game thủ, bạn sẽ cảm giác như đang cầm một chiếc máy chơi game thật thụ. Ngoài những yếu tố trên, chiếc điện thoại còn được tích hợp ăng-ten mới và micrô thứ ba, sở hữu thêm NFC và IR blaster. Tuy nhiên, máy lại thiếu đi jack cắm tai nghe 3.5 mm - một yếu tố khá là không-chuẩn-gaming-phone lắm.', '[\"\"]', '[\"\"]', '{\"k\":[\"\"],\"v\":[\"\"]}', '1622798566_k40-gaming-black_5260c802c892434abfdfbf8ca5af3e02_master.webp', 5, 400000, '2023-06-20 17:56:30', 0),
(11, 'Microsoft Surface Laptop 3 (i5|8GB|256GB) Wifi Likenew 99%', 21000000, 'Đánh giá Surface Laptop 3 i5, 8GB RAM, 128GB SSD vừa là laptop, vừa là tablet\r\nSurface Laptop 3 được đánh giá là dòng sản phẩm nổi bật trong bộ sưu tập vô cùng đa dạng mà thương hiệu Microsoft cho ra mắt năm 2019. Với thiết kế vuông vức tối giản sang trọng cùng hiệu năng cao có nhiều cải tiến, chắc chắn máy sẽ thỏa mãn được hầu hết người sử dụng. Trong bài viết sau đây, hãy cùng HNC khám phá về dòng laptop đặc biệt này qua chiếc Surface Laptop 3 phiên bản màn hình 13-inch.\r\n\r\n\r\n\r\nThiết kế của Surface Laptop 3\r\nNhìn chung, Surface Laptop 3 có thiết kế mỏng nhẹ tối giản giống phong cách của dòng Macbook nhà Táo. Tuy nhiên, máy vẫn có nhiều điểm riêng biệt để người dùng không bị nhầm lẫn với những dòng máy tính xách tay của thương hiệu khác. Ngoại hình của Surface Laptop 3 khá vuông vức với vỏ nhôm nguyên khối. Ở giữa mặt lưng của máy chỉ có duy nhất logo cửa sổ quen thuộc của Microsoft bằng kính sáng bóng sang trọng. Các cạnh của máy được vát mỏng dần tạo độ nghiêng. Cạnh bên của máy được vát chéo, khi nhìn từ góc nhìn trái hay phải, máy sẽ có cảm giác mỏng hơn so với độ dày thực tế.\r\n\r\n\r\n\r\nĐi theo phong cách tối giản nên ổ cắm trang bị ở hai cạnh bên của Surface Laptop 3 cũng được nhà sản xuất giản lược chỉ còn những cổng thực sự cần thiết. Khi mở máy ra, người dùng sẽ khá ấn tượng với phần bàn phím và touchpad sang trọng. Các phím lớn vuông vức cùng màu với touchpad mang đến cảm giác sang trọng. Cảm giác gõ mà bàn phím mang lại cũng khá dễ chịu nhờ độ nảy tốt, hành trình bàn phím hợp lý và âm thanh êm tai khi gõ.', '[\"\"]', '[\"\"]', '{\"k\":[\"\"],\"v\":[\"\"]}', 'surface_laptop_3_46331cd78e484457921d53cb47adb387_master.webp', 4, 0, '2023-06-20 17:57:40', 0),
(12, 'Lenovo Yoga Tab 2 Windows Wifi Likenew 99%', 8000000, 'Đánh giá chi tiết Lenovo Yoga Tab 2 Windows Wifi Likenew 99%\r\nĐánh giá chi tiết Lenovo Yoga Tab 2 Windows - digiphone.com.vn\r\nTrải nghiệmThông số kỹ thuật\r\n \r\n1-4018-1424935767.jpg\r\n \r\n \r\n\r\nYoga Tablet 2 là thế hệ thứ hai của dòng máy tính bảng Yoga độc đáo của Lenovo. Máy vẫn được duy trì thế mạnh về thiết kế khác lạ với gióng pin hình trụ ở cạnh dài, tích hợp chân đế nhôm có thể mở ra - đóng lại, tạo nên thiết kế khác biệt với các máy tính bảng trên thị trường. Với thiết kế này, ngoài ba chế độ sử dụng của thế hệ trước là cầm, nghiêng, đứng, máy mới có thể treo lên mặt phẳng đứng nhờ một lỗ nhỏ được đục ở chân đế nhôm. Ngoài ra, pin cũng được nâng cấp lên 9.600 mAh so với mức 6.000 mAh của thế hệ tablet Yoga 10 inch trước đó.', '[\"\"]', '[\"\"]', '{\"k\":[\"\"],\"v\":[\"\"]}', 'lenovo_yoga_book_gold_da83a04ae7f24e368b5e1c5a37818977_master.webp', 4, 0, '2023-06-20 17:57:06', 0),
(13, 'Iphone 10 128GB Chính hãng Mới', 18000000, 'Đánh giá chi tiết Iphone 12 128GB Chính hãng Mới\r\nNhững chiếc điện thoại của ông lớn Apple luôn nổi tiếng với sự chỉn chu về ngoại hình cùng hiệu năng mạnh mẽ vượt trội khi so sánh với đối thủ cùng phân khúc. Là sản phẩm được ra mắt được 2 năm, iPhone 12 đã tạo nên một cơn sốt trong lòng iFan và vẫn chưa có dấu hiệu hạ nhiệt cho đến thời điểm hiện tại. Bài viết dưới đây DIGIPHONE sẽ giúp bạn hiểu rõ hơn về tính năng của chiếc smartphone này và tìm hiểu thêm iPhone 12 128GB giá bao nhiêu nhé.\r\n\r\niphone 12 128gb giá bao nhiêu\r\n\r\niPhone 12 vẫn chưa có dấu hiệu hạ nhiệt ở thời điểm hiện tại.\r\n\r\n1. Thiết kế iPhone 12 128GB\r\nNgoại hình của chiếc iPhone 12 128GB được xem là một cú “lột xác” ngoạn mục khi sử dụng thiết kế vuông vức với các cạnh được vát phẳng vô cùng thời thượng và mạnh mẽ. Thiết kế này khiến cho người dùng liên tưởng đến mẫu điện thoại huyền thoại iPhone 4/5 trước đây.  \r\n\r\n', '[\"\"]', '[\"\"]', '{\"k\":[\"\"],\"v\":[\"\"]}', 'iphone-12-256gb-gia-bao-nhieu_c51489dca40b44f8b2aede28eab11427_master.webp', 1, 0, '2023-06-20 17:57:52', 0),
(16, 'iPhone 13 Pro Max Chính Hãng VN/A', 27000000, 'Đánh giá chi tiết iPhone 13 Pro Max Chính Hãng VN/A\r\niPhone 13 Pro Max - siêu phẩm của Apple được mong chờ nhất trong năm 2021\r\n\r\nThiết kế \r\n\r\niPhone mới kế thừa thiết kế đặc trưng từ iPhone 12 Pro Max khi sở hữu khung viền vuông vức, mặt lưng kính cùng màn hình tai thỏ tràn viền nằm ở phía trước. Với iPhone 13 Pro Max phần tai thỏ đã được thu gọn lại 20% so với thế hệ trước, không chỉ giải phóng nhiều không gian hiển thị hơn mà còn giúp mặt trước chiếc điện thoại trở nên hấp dẫn hơn mà vẫn đảm bảo được hoạt động của các cảm biến.\r\n\r\n\r\n\r\nĐiểm thay đổi dễ dàng nhận biết trên iPhone 13 Pro Max chính là kích thước của cảm biến camera sau được làm to hơn và để tăng độ nhận diện cho sản phẩm mới thì Apple cũng đã bổ sung một tùy chọn màu sắc Sierra Blue (màu xanh dương nhạt hơn so với Pacific Blue của iPhone 12 Pro Max). Máy vẫn tiếp tục sử dụng khung viền thép cao cấp cho khả năng chống trầy xước và va đập một cách vượt trội, kết hợp với khả năng kháng bụi, nước chuẩn IP68.', '[\"6GB | 128GB\",\" 6GB | 256GB\"]', '[\"trắng\",\" Xanh\",\"đen\"]', '{\"k\":[\"Kích Thước\",\"Khối Lượng\",\"SIM\",\"Độ Phân Giả\"],\"v\":[\"160.8 x 78.1 x 7.7 mm (6.33 x 3.07 x 0.30 in)\",\"240 g (8.47 oz)\",\"Single SIM or Dual SIM\",\"1284 x 2778 pixels, 19.5:9 ratio (~458 ppi density)\"]}', 'hinh_iphone-13-pro-max-den_9c1c7f83d96f4f7a9892eacada41e8df_master.webp', 1, 0, '2023-06-23 16:30:49', 100);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(20) NOT NULL,
  `name` varchar(230) NOT NULL,
  `email` varchar(230) NOT NULL,
  `password` varchar(230) NOT NULL,
  `avatar` varchar(230) NOT NULL DEFAULT 'https://img.freepik.com/free-vector/businessman-character-avatar-isolated_24877-60111.jpg?w=2000',
  `phone` varchar(12) DEFAULT NULL,
  `address` varchar(230) DEFAULT NULL,
  `role` int(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `avatar`, `phone`, `address`, `role`) VALUES
(2, 'admin', 'admin@gmail.com', '96e79218965eb72c92a549dd5a330112', '8d48cf810f1d1b684913a0fe2627034c--les-sasuke-uchiha.jpg', '099999999', 'HÀ NỘI', 1),
(11, 'ngotiendat', 'datmau20@gmail.com', '96e79218965eb72c92a549dd5a330112', '', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vnpay`
--

CREATE TABLE `vnpay` (
  `id` int(11) NOT NULL,
  `vnp_amount` varchar(225) NOT NULL,
  `vnp_bankCode` varchar(225) NOT NULL,
  `vnp_banktranno` varchar(225) NOT NULL,
  `vnp_cardtype` varchar(225) NOT NULL,
  `vnp_orderinfo` varchar(225) NOT NULL,
  `vnp_paydate` varchar(225) NOT NULL,
  `vnp_tmncode` varchar(225) NOT NULL,
  `vnp_transactionno` varchar(225) NOT NULL,
  `vnp_txnref` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_id` (`categories_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `oder`
--
ALTER TABLE `oder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oder_detail`
--
ALTER TABLE `oder_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `oder_id` (`oder_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_id` (`categories_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vnpay`
--
ALTER TABLE `vnpay`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `oder`
--
ALTER TABLE `oder`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `oder_detail`
--
ALTER TABLE `oder_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `vnpay`
--
ALTER TABLE `vnpay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `banner`
--
ALTER TABLE `banner`
  ADD CONSTRAINT `banner_ibfk_1` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `oder_detail`
--
ALTER TABLE `oder_detail`
  ADD CONSTRAINT `oder_detail_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `oder_detail_ibfk_2` FOREIGN KEY (`oder_id`) REFERENCES `oder` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
