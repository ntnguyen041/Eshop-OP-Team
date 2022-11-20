-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2022 at 04:18 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eshopop`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Price` int(11) NOT NULL DEFAULT 0,
  `Stock` int(11) NOT NULL DEFAULT 0,
  `BrandID` int(10) UNSIGNED NOT NULL,
  `CategoryID` int(10) UNSIGNED NOT NULL,
  `Image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `Name`, `Description`, `Price`, `Stock`, `BrandID`, `CategoryID`, `Image`, `Status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'iPhone 11 64GB', 'Apple đã chính thức trình làng bộ 3 siêu phẩm iPhone 11, trong đó phiên bản iPhone 11 64GB có mức giá rẻ nhất nhưng vẫn được nâng cấp mạnh mẽ như iPhone Xr ra mắt trước đó.', 11690, 5, 4, 1, 'h1.jpg', 1, NULL, NULL, NULL),
(2, 'iPhone 13 Pro 13 phẩm được Pro Max 128 GB - Max 128GB', 'Điện thoại iPhone siêu mong chờ nhất ở nửa cuối năm 2021 đến từ Apple. Máy có thiết kế không mấy đột phá khi so với người tiền nhiệm, bên trong đây vẫn là một sản phẩm có màn hình siêu đẹp, tần số quét được nâng cấp lên 120 Hz mượt mà, cảm biến camera có ', 28490, 7, 4, 1, 'h2.jpg', 1, NULL, NULL, NULL),
(3, ' iPhone 14 Pro 128GB', 'Tại sự kiện ra mắt sản phẩm thường niên diễn ra vào tháng 9/2022, Apple đã trình làng iPhone 14 Pro với những cải tiến về thiết kế màn hình, hiệu năng, sẵn sàng cùng bạn chinh phục mọi thử thách. Giờ đây người dùng đã có thể mua sắm những sản phẩm iPhone ', 30590, 11, 4, 1, 'h3.jpg', 1, NULL, NULL, NULL),
(4, 'Samsung Galaxy S22 Ultra 5G 128GB', 'Galaxy S22 Ultra 5G chiếc smartphone cao cấp nhất trong bộ 3 Galaxy S22 series mà Samsung đã cho ra mắt. Tích hợp bút S Pen hoàn hảo trong thân máy, trang bị vi xử lý mạnh mẽ cho các tác vụ sử dụng vô cùng mượt mà và nổi bật hơn với cụm camera không viền ', 25990, 30, 1, 1, 'h4.jpg', 1, NULL, NULL, NULL),
(5, 'Samsung Galaxy Z Flip4 128GB ', 'Samsung Galaxy Z Flip4 128GB đã chính thức ra mắt thị trường công nghệ, đánh dấu sự trở lại của Samsung trên con đường định hướng người dùng về sự tiện lợi trên những chiếc điện thoại gập. Với độ bền được gia tăng cùng kiểu thiết kế đẹp mắt giúp Flip4 trở', 20990, 12, 1, 1, 'h5.jpg', 1, NULL, NULL, NULL),
(6, 'Samsung Galaxy S22 Ultra 5G 128GB', 'Samsung Galaxy S22+ 5G 128GB được Samsung cho ra mắt với ngoại hình không có quá nhiều thay đổi nhưng được nâng cấp đáng kể về thông số cấu hình bên trong và thời gian sử dụng, chắc hẳn sẽ mang lại những trải nghiệm thú vị dành cho bạn.', 25990, 3, 1, 1, 'h6.jpg', 1, NULL, NULL, NULL),
(7, 'Samsung Galaxy A23 4GB ', 'Samsung Galaxy A23 4GB sở hữu bộ thông số kỹ thuật khá ấn tượng trong phân khúc, máy có một hiệu năng ổn định, cụm 4 camera thông minh cùng một diện mạo trẻ trung phù hợp cho mọi đối tượng người dùng.', 5490, 5, 1, 1, 'h7.jpg', 1, NULL, NULL, NULL),
(8, 'Samsung Galaxy Z Fold4 256GB', 'Tại sự kiện Samsung Unpacked thường niên, Samsung Galaxy Z Fold4 256GB chính thức được trình làng thị trường công nghệ, mang trên mình nhiều cải tiến đáng giá giúp Galaxy Z Fold trở thành dòng điện thoại gập đã tốt nay càng tốt hơn.', 37990, 8, 1, 1, 'h8.jpg', 1, NULL, NULL, NULL),
(9, 'Samsung Galaxy Z Fold3 5G 256GB', 'Samsung Galaxy Z Fold3 5G, chiếc điện thoại được nâng cấp toàn diện về nhiều mặt, đặc biệt đây là điện thoại màn hình gập đầu tiên trên thế giới có camera ẩn (08/2021). Sản phẩm sẽ là một “cú hit” của Samsung góp phần mang đến những trải nghiệm mới cho ng', 31990, 3, 1, 1, 'h9.jpg', 1, NULL, NULL, NULL),
(10, 'Laptop Gaming MSI Bravo 15 B5DD 276VN', 'Phục kích ở nơi hiểm yếu, quan sát kĩ càng kẻ địch trước khi xuất trận mạnh mẽ, Bravo 15 đã sẵn sàng cho chiến trường game rực lửa. Kết hợp giữa vi xử lí AMD Ryzen 7 5800H và card đồ họa AMD Radeon RX 5500M, Bravo 15 2022 sẽ làm thỏa mãn mọi game thủ. Với', 17490000, 9, 2, 2, 'h10.jpg', 1, NULL, NULL, NULL),
(11, 'Laptop gaming MSI GF63 Thin 11SC 664VN', 'MSI, một cái tên không còn quá xa lạ với game thủ chúng ta. Những sản phẩm từ nhà rồng chiếm trọn được sự yêu thích của người dùng từ thiết kế đến giá cả. Và nay, sẽ là chiếc laptop gaming sở hữu những đặc điểm trên với cái tên MSI GF63 Thin 11SC 662VN. H', 19890000, 3, 2, 2, 'h11.jpg', 1, NULL, NULL, NULL),
(12, 'Laptop Gaming MSI Stealth GS66 12UGS 227VN', 'Hiệu năng mạnh mẽ, hoàn hảo cho gaming Được trang bị CPU thế hệ 12 mới nhất, i7-12700H cùng card đồ họa RTX 3070Ti, GS66 12UGS 227VN sở hữu một sức mạnh cực khủng với khả năng xử lý công việc và đồ họa tuyệt vời. Đi kèm là 32GB RAM đem lại khả năng đa nhi', 64990000, 9, 2, 2, 'h12.jpg', 1, NULL, NULL, NULL),
(13, 'Laptop ASUS TUF Gaming F15 FX506LH HN188W', 'Laptop gaming ASUS TUF Gaming F15 FX506LH HN188W được trang bị với CPU Intel Core i5-10300H và GPU GeForce GTX™ 1650 mạnh mẽ, các tựa game hành động sẽ chạy nhanh, mượt mà và khai thác tối đa màn hình IPS tần số quét 144Hz.Hệ thống tản nhiệt tự làm sạch h', 16490000, 10, 6, 2, 'h13.jpg', 1, NULL, NULL, NULL),
(14, 'Laptop gaming ASUS TUF A15 FA506IHRB HN080W', 'ASUS TUF A15 thể hiện một thiết kế đẹp mắt với từng đường nét độc đáo kết hợp thành một vẻ ngoài đầy mạnh mẽ. Logo dòng TUF gaming được chạm nổi, điêu khắc bằng laser tạo một điểm nhấn đầy ấn tượng ở phần nắp máy tính. Để tối ưu hóa trải nghiệm chơi game ', 16990000, 2, 6, 2, 'h14.jpg', 1, NULL, NULL, NULL),
(15, 'Laptop Gaming Asus ROG Strix G15 G513IH HN015W', 'Laptop Gaming ngày nay được rất nhiều khách hàng lựa chọn nhằm phục vụ nhu cầu giải trí cao với các tựa game cấu hình nặng mà những chiếc laptop văn phòng không thể đáp ứng được. Asus ROG Strix G15 G513IH HN015W được ra đời nhằm mang đến những phút giây t', 19490000, 6, 6, 2, 'h15.jpg', 1, NULL, NULL, NULL),
(16, 'Laptop GIGABYTE U4 UD 50S1823SO', 'Laptop GIGABYTE U4 UD 70S1823SO là một trong những dòng laptop văn phòng phổ thông tích hợp các chức năng tiện ích, đa tác vụ hỗ trợ công việc một cách nhanh chóng và tiện lợi. Đáp ứng đầy đủ nhu cầu trong công việc nhờ vào những công nghệ đột phá đến từ ', 15990000, 7, 3, 2, 'h16.jpg', 1, NULL, NULL, NULL),
(17, 'Laptop GIGABYTE U4 UD 70S1823SO', 'Laptop GIGABYTE U4 UD 70S1823SO là một trong những dòng laptop văn phòng phổ thông tích hợp các chức năng tiện ích, đa tác vụ hỗ trợ công việc một cách nhanh chóng và tiện lợi. Đáp ứng đầy đủ nhu cầu trong công việc nhờ vào những công nghệ đột phá đến từ ', 25390000, 15, 3, 2, 'h17.jpg', 1, NULL, NULL, NULL),
(18, 'Macbook Air M2 8GPU 8GB 256GB - Midnight', 'Nhà Apple vừa cho ra mắt sản phẩm Macbook Air M2 8GPU 8GB 256GB - Midnight nối tiếp sự thành công của Macbook Air M1 trước đó. Sử dụng con chip M2 mạnh mẽ hơn sẵn sàng đáp ứng mọi yêu cầu khắt nghiệt từ người dùng lên máy.Macbook Air M2 sở hữu lớp vỏ bằng', 28690000, 11, 5, 2, 'h18.jpg', 1, NULL, NULL, NULL),
(19, 'Macbook Air M2 8GPU 8GB 256GB - Starlight', 'Macbook Air M2 sở hữu lớp vỏ bằng nhôm cao cấp kết hợp cùng tông màu ánh sao sang trọng. Thiết kế laptop mỏng nhẹ với độ dày 1.13 cm, trọng lượng 1.24kg thể hiện được ưu điểm vượt trội về tính năng di động cao trong những dòng laptop từ thương hiệu. Từng ', 28690000, 20, 5, 2, 'h19.jpg', 1, NULL, NULL, NULL),
(20, 'Macbook Air M2 8GPU 8GB 256GB - Silver', 'Nhà Apple vừa cho ra mắt sản phẩm Macbook Air M2 8GPU 8GB 256GB - Silver nối tiếp sự thành công của Macbook Air M1 trước đó. Sử dụng con chip M2 mạnh mẽ hơn sẵn sàng đáp ứng mọi yêu cầu khắc nghiệt từ người dùng lên máy. Macbook Air M2 sở hữu lớp vỏ bằng ', 28690000, 54, 5, 2, 'h20.jpg', 1, NULL, NULL, NULL),
(21, 'Chuột Asus TUF Gaming M3', 'Asus TUF Gaming M3 là một con chuột máy tính nhỏ gọn mang đến sự thoải mái, hiệu suất và độ tin cậy mà các game thủ yêu cầu. Chuột tiện dụng và nhẹ cho các trò chơi kéo dài, với cảm biến quang có độ chính xác cao mang lại cho bạn lợi thế trong trận chiến.', 440000, 45, 6, 3, 'h21.jpg', 1, NULL, NULL, NULL),
(22, 'Asus ROG Gladius II', 'Chuột Asus chuyên dụng chơi game không đối xứng cổ điển với cảm biến 19.000 dpi được điều chỉnh đặc biệt, Ổ cắm chuyển mạch Push-Fit II độc quyền, độ trễ bằng không khi nhấp chuột, thẩm mỹ mặt ROG khắc laser, Chân chuột ROG Omni, đèn ROG Paracord và Aura ', 1690000, 13, 6, 3, 'h22.jpg', 1, NULL, NULL, NULL),
(23, 'Chuột Logitech G502 X Plus LightSpeed White', 'Chuột Logitech G502 X PLUS White là sản phẩm mới nhất của series G502 đình đám. Được thiết kế lại và cải tiến với công nghệ chơi game hiện đại, bao gồm công tắc Lightforce lai quang học - cơ học đầu tiên, Lightspeed không dây, LIGHT SYNC RGB và cảm biến q', 3590000, 25, 7, 3, 'h23.jpg', 1, NULL, NULL, NULL),
(24, 'Bàn phím Logitech G715 TKL Off White', 'G715 TKL phối màu Off White là một trong những dòng bàn phím cơ mới nhất trong series Aurora từ Logitech. Với thiết kế bàn phím TKL nhỏ gọn, cùng các phím bấm media bố trí thông minh giúp bạn thuận lợi trong mọi nhu cầu sử dụng.', 4399000, 13, 7, 4, 'h24.jpg', 1, NULL, NULL, NULL),
(25, 'Bàn phím Logitech G PRO KDA', 'Các phím switch cơ học GX Tactile tiên tiến được chế tạo để tăng hiệu suất, độ nhạy và độ bền, với phản hồi nhấn phím phát ra âm thanh, có thể cảm nhận được. Thiết kế không có bàn phím số và dây có thể tháo rời có nghĩa là có nhiều không gian hơn để di ch', 3269000, 15, 7, 4, 'h25.jpg', 1, NULL, NULL, NULL),
(26, 'Bàn phím không dây Logitech POP Keys Blast Yelow', 'Bàn phím Logitech G Pro League Of Legends sinh ra là để dành cho các game thủ LOL. Bàn phím mang màu sắc biểu tượng của tựa game huyền thoại để bạn có thể đắm chìm hoàn toàn vào trò chơi và đánh bại đối thủ. Thiết kế nhỏ gọn và đã được giản lượt các bàn p', 2490000, 15, 7, 4, 'h26.jpg', 1, NULL, NULL, NULL),
(27, 'Bộ Bàn Phím và Chuột Logitech MK240 Wireless', 'Nếu bạn đang tìm cho mình một combo bàn phím và chuột giá rẻ thì không thể bỏ qua sản phẩm Logitech MK240 Wireless này. Thiết kế nhỏ gọn với kết nối không dây quá là tiện lợi cho những ai thường xuyên di chuyển không gian làm việc.', 499000, 17, 7, 4, 'h27.jpg', 1, NULL, NULL, NULL),
(28, 'Bàn phím không dây Logitech K580 White', 'Bàn phím Logitech K580 White sở hữu thiết kế đậm chất xu hướng hiện đại, tối giản. Sở hữu một tông màu trắng ấm áp, tinh tế nhưng không kém phần sang trọng, bàn phím không dây Logitech K580 giúp không gian làm việc của bạn nhẹ nhàng và đẹp mắt hơn với thi', 950000, 21, 7, 4, 'h28.jpg', 1, NULL, NULL, NULL),
(29, 'Bàn phím cơ Logitech MX Mechanical Graphite Tactile Silent', 'Logitech MX Mechanical Graphite Tactile Silent là dòng bàn phím văn phòng sở hữu thiết kế fullsize 104 phím ấn tượng, cảm giác gõ khác biệt trơn mượt mịn màng và rất nhẹ tay với switch Tactile Silent, thời lượng pin sử dụng lên đến 15 ngày hoặc lên đến 10', 3990000, 31, 7, 4, 'h29.jpg', 1, NULL, NULL, NULL),
(30, 'Bàn phím Logitech G213', 'Logitech G213 chiếc bàn phím chơi game hiện đại có 5 chế độ chiếu sáng riêng trong phổ màu gồm khoảng 16,8 triệu màu. Thay đổi màu cho phù hợp với bố cục, các trò chơi cụ thể hoặc chỉ là để thể hiện màu sắc yêu thích. Bàn phím Logitech giả cơ G213 có các ', 990000, 27, 7, 4, 'h30.jpg', 1, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_brandid_index` (`BrandID`),
  ADD KEY `products_categoryid_index` (`CategoryID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
