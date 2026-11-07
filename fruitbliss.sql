-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2024 at 03:28 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fruitbliss`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_active` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--


INSERT INTO `admin` (`id`, `name`, `email`, `password`, `is_active`) VALUES
(0, 'Md Shakil', 'mdshakil5843@gmail.com', '$2y$10$SkwE/VYP0JarwoVl9FHmB.xsL2Fk/kj9dJip6/oKNdzzGAqJOQgAO', '0');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `ID` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `userID` varchar(1000) NOT NULL,
  `quantity` bigint(20) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` bigint(20) NOT NULL,
  `trx_id` varchar(2000) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `quantity` bigint(20) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `trx_id`, `product_id`, `quantity`, `price`) VALUES
(25, 'TRX53521715690765', 3, 1, 50),
(26, 'TRX53521715690765', 4, 1, 120),
(27, 'TRX73531715690775', 5, 1, 90),
(28, 'TRX73531715690775', 6, 1, 110);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `mid` bigint(20) NOT NULL,
  `userID` varchar(1000) NOT NULL,
  `name` varchar(2000) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `message` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` bigint(20) NOT NULL,
  `trx_id` varchar(2000) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `total_price` double NOT NULL,
  `shipping` double NOT NULL,
  `net_total` double NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `trx_id`, `user_id`, `total_price`, `shipping`, `net_total`, `order_date`) VALUES
(23, 'TRX53521715690765', '8d38ba33-56c3-49d1-998c-2a799bb4f670', 170, 100, 270, '2024-05-14 12:46:05'),
(24, 'TRX73531715690775', '8d38ba33-56c3-49d1-998c-2a799bb4f670', 200, 100, 300, '2024-05-14 12:46:15');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `item_id` bigint(20) NOT NULL,
  `trx_id` varchar(2000) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `quantity` bigint(20) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` bigint(20) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_image` varchar(2000) DEFAULT NULL,
  `product_cat` varchar(200) NOT NULL,
  `product_sec` varchar(2000) NOT NULL,
  `unit_price` double NOT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `weight` double NOT NULL,
  `origin` varchar(200) NOT NULL,
  `quality` varchar(200) NOT NULL,
  `chek` varchar(200) NOT NULL,
  `stock` bigint(20) DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_image`, `product_cat`, `product_sec`, `unit_price`, `description`, `weight`, `origin`, `quality`, `chek`, `stock`, `date_added`) VALUES
(3, 'Banana', 'img/banana.JPG', 'Fruits', 'Yearly', 50, 'Fresh, ripe bananas bursting with natural sweetness and nutrients. Perfect for a quick snack, smoothies, or baking. Packed with potassium and fiber, these bananas are a delicious and healthy choice for any occasion!', 1, 'Maymansingh', 'Fresh', 'Ripe', 100, '2024-05-13 04:41:19'),
(4, 'Mango-Harivanga', 'img/mango-harivanga.JPG', 'Fruits', 'Seasonal', 120, 'Naturally sweet and flavorful mangoes that bring a touch of sweetness  to your life. Healthy and nutritious, Harivanga mangoes are packed with exquisite flavor, making them an irresistible and easy choice!', 1, 'Rajshahi', 'Fresh', 'Ripe', 100, '2024-05-14 04:06:13'),
(5, 'Mango-amropali', 'img/mango-amropali.JPG', 'Fruits', 'Seasonal', 90, 'Indulge in the rich sweetness and exotic flavor of Amrapali mangoes. These juicy delights are a tropical delight, bursting with freshness and natural goodness. Savor the taste of summer with every bite!', 1, 'Rajshahi', 'Fresh', 'Ripe', 100, '2024-05-13 04:41:19'),
(6, 'Mango-Himshagor', 'img/mango-himshagor.JPG', 'Fruits', 'Seasonal', 110, '\nExperience the sweetness with Himshagor mangoes. Renowned for their exquisite taste, these mangoes are a true delight for mango enthusiasts. Enjoy the tropical goodness straight from the orchards to your plate!', 1, 'Chapai Nababganj', 'Fresh', 'Ripe', 100, '2024-05-14 04:06:55'),
(7, 'Mango-Gopal-bhog', 'img/mango-gopal_bhog.JPG', 'Fruits', 'Seasonal', 100, 'Delight in the taste and velvety texture of Gopalbhog mangoes. Known for their flavor profile and tender flesh, these mangoes offer a heavenly indulgence for your taste buds. Experience pure bliss with each juicy bite!', 1, 'Rajshahi', 'Fresh', 'Ripe', 100, '2024-05-14 04:07:43'),
(8, 'Lichu', 'img/lichu.JPG', 'Fruits', 'Seasonal', 400, '\nFresh lichis the orchard. Bursting with tangy sweetness and packed with refreshing juiciness, these lichis are a delightful treat. Enjoy them on their own or add them to your favorite fruit salads for an extra burst of flavor!', 1, 'Dinajpur', 'Fresh', 'Ripe', 100, '2024-05-14 04:08:13'),
(9, 'Lichu-Bombay', 'img/lichu-bombay.JPG', 'Fruits', 'Seasonal', 700, 'Experience the sweetness of Bombay lichis. Renowned for their vibrant flavor and juicy texture, offering a tantalizing burst of tropical goodness. Elevate your snacking experience with these flavorful lichis!', 1, 'Rajshahi', 'Fresh', 'Ripe', 100, '2024-05-14 04:08:42'),
(10, 'Orange', 'img/orange.JPG', 'Fruits', 'Yearly', 250, '\nFresh, ripe oranges bursting with vibrant citrus flavor packed with essential vitamins, antioxidants, and nutrients. Perfect for snacking, juicing, or adding a zesty kick to your favorite salads, or refreshing beverages!', 1, 'Thai', 'Fresh', 'Ripe', 100, '2024-05-14 04:09:31'),
(11, 'Watermelon', 'img/watermalon.JPG', 'Fruits', 'Seasonal', 50, '\nQuench thirst and succulent watermelons. Each bite is a burst of refreshing juiciness, perfect for picnics, BBQs, or lounging in the sun. Dive into the deliciousness of summer with ripe, crisp watermelons!', 1, 'Khulna', 'Fresh', 'Ripe', 100, '2024-05-14 04:35:54'),
(12, 'Pineapple', 'img/pineapple.JPG', 'Fruits', 'Yearly', 50, 'Tropical delight awaits with juicy pineapples. Bursting with tangy-sweet flavor and packed with vitamin C, each slice is paradise. Enjoy fresh, grilled, or blended into refreshing smoothies for a tropical escape!', 1, 'Khulna', 'Fresh', 'Ripe', 100, '2024-05-14 04:32:59'),
(13, 'Tangarine', 'img/tangarine.JPG', 'Fruits', 'Special', 400, '\nExperience burst sunshine with tangy tangerines. These citrus gems are packed with flavor and vitamin C, making them perfect snack for quick pick-me-up. Peel, pop, and enjoy refreshing taste of tangerines wherever you go!', 1, 'Thailand', 'Fresh', 'Ripe', 100, '2024-05-14 04:37:09'),
(14, 'Peach', 'img/peach.JPG', 'Fruits', 'Special', 500, 'Savor sweetness of summer with ripe, juicy peaches. Each bite is a delicious balance of tangy and sweet, perfect for enjoying on a warm day. Whether fresh, or favorite desserts, our peaches are sure to bring a smile to your face!', 1, 'Japan', 'Fresh', 'Ripe', 100, '2024-05-14 04:40:32'),
(15, 'Apricot', 'img/apricot.JPG', 'Fruits', 'Special', 600, '\nIndulge in the golden sweetness of succulent apricots. Bursting with flavor and nutrients, each offers a refreshing taste of summer. Enjoy as a snack, in salads, or baked into pastries for a delightful treat any time!', 1, 'Indonesia', 'Fresh', 'Ripe', 100, '2024-05-14 04:10:12'),
(16, 'Rambutan', 'img/rambutan.JPG', 'Fruits', 'Special', 700, 'Savor the exotic taste of our juicy rambutans. With their vibrant red exterior and sweet, juicy flesh, each bite is a tropical delight. Peel away the hairy skin to reveal the luscious fruit inside and transport your taste buds to paradise!', 1, 'Japan', 'Fresh', 'Ripe', 100, '2024-05-13 04:41:19'),
(17, 'Kiwi', 'img/kiwi.JPG', 'Fruits', 'Special', 500, 'Experience the refreshing tang of delicious kiwis. With their vibrant green flesh and unique flavor, each bite is a burst of tropical goodness. Packed with vitamins and antioxidants, kiwis are the perfect choice for a healthy snack', 1, 'Thailand', 'Fresh', 'Ripe', 100, '2024-05-14 04:10:37'),
(18, 'Papaya', 'img/papaya.JPG', 'Fruits', 'Yearly', 90, '\nIndulge in tropical sweetness of ripe papayas. With vibrant orange flesh, each bite is paradise. Packed with vitamins and antioxidants, papayas are delightful. Enjoy fresh or in smoothies for a refreshing treat!', 1, 'Khulna', 'Fresh', 'Ripe', 100, '2024-05-14 04:10:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` bigint(20) NOT NULL,
  `userID` varchar(1000) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `email` varchar(2000) NOT NULL,
  `address` varchar(2000) NOT NULL,
  `city` varchar(1000) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `dp` varchar(1000) DEFAULT NULL,
  `birthDate` varchar(100) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `userID`, `firstName`, `lastName`, `email`, `address`, `city`, `gender`, `password`, `dp`, `birthDate`, `date`) VALUES
(4, '8d38ba33-56c3-49d1-998c-2a799bb4f670', 'Tanveer', 'Shams', 'tanveershams2218@gmail.com', 'Mohammadpur', 'Dhaka', 'Male', '$2y$10$.KO.toq643vke1YCKcJ4OeyYyUDuAEry0hxMVHbEB2ZXo9/YzcaB2', 'img/avatar.jpg', '2000-03-22', '2024-05-13 15:08:36'),
(5, '85d7791e-fdfe-4ded-8d28-9c56b9c42fc5', 'Tanveer', 'Shams', 'shamstanveer2202@gmail.com', 'Mohammadpur', 'Dhaka', 'Male', '$2y$10$NKRLnXMjyIUANPNNrCBmSOqBGKnzLFOehTXiax5dPUBYWaUuHz1ku', 'img/avatar.jpg', '2000-02-22', '2024-05-14 10:08:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`item_id`),
  ADD UNIQUE KEY `trx_id` (`trx_id`) USING HASH,
  ADD UNIQUE KEY `trx_id_2` (`trx_id`) USING HASH,
  ADD KEY `order_id` (`trx_id`(768)),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `mid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `item_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
