-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2023 at 07:45 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dua_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `product_id` int(11) DEFAULT NULL,
  `ip_address` varchar(50) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` VALUES
(1, 'potted_plants'),
(2, 'bouquets'),
(3, 'vases');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `order_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `amount` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `weight` double NOT NULL,
  `picture_path` varchar(255) NOT NULL,
  `description` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` VALUES
(1, 1, 'Fruit of Accra', 0, 0.24, 5, 'assets/potted_plants/succulent.jpg', 'The tall, leafy Fruit of Accra plant is the perfect addition to any room with its tropical feel and unique, perforated leaves'),
(2, 1, 'Green Oheneba', 12, 0.5, 3, 'assets/potted_plants/potted_plant_short.png', 'The vibrant green colors of the Green Oheneba  plant make it a cheerful addition to any space.'),
(3, 1, 'Krobeas Vim', 15, 0.6, 2, 'assets/potted_plants/otherpotted.png', 'Krobeas Vim is a symbol of good luck and prosperity, featuring delicate leaves that grow in clusters on thin stems.'),
(4, 1, 'Fleur La Vie', 11, 0.3, 5, 'assets/potted_plants/long_pot.png', 'The low-maintenance Fleur la Vie plant is a great choice for those who want to add some greenery to their home without the hassle of constant watering.'),
(5, 1, 'Calebs Lily', 2, 0.45, 4, 'assets/potted_plants/green_plant.png', 'The variegated leaves of the Calebs Lily  plant make it a versatile choice for any room in the house.'),
(7, 2, 'Senams Disguises', 4, 0.75, 2, 'assets/bouquets/black_daisies.jpeg', 'The lush, dark green foliage of the Senams Disguises tree makes it a statement piece for any space.'),
(8, 2, 'Opuntia Crowd', 6, 0.85, 3, 'assets/bouquets/bq_1.jpeg', 'The Opuntia Crowd is a popular choice for its ease of care and beautiful white flowers that bloom throughout the year.'),
(9, 1, 'Kid with a Rose', 7, 0.55, 2, 'assets/potted_plants/2_pp.jpeg', 'The spiky leaves of the Kid with a Rose plant not only add visual interest but also have healing properties.'),
(11, 1, 'SAV Special', 8, 0.42, 3, 'assets/potted_plants/3_pp.jpeg', 'The delicate, trailing tendrils of the SAV Special plant make it a beautiful addition to a hanging basket or shelf.'),
(12, 1, 'Glovers La Vie', 3, 0.52, 3, 'assets/potted_plants/6_pp.jpeg', 'The heart-shaped leaves of Glovers la Vie add a touch of whimsy to any room.'),
(13, 2, 'Tays World', 5, 0.76, 4, 'assets/bouquets/elizabeth_mystery.jpeg', 'The Tays World bouquet features blooms in shades of red and green, including roses, carnations, and evergreen branches, perfect for celebrating the holidays.'),
(14, 2, 'Sampahs Delight', 14, 0.9, 4, 'assets/bouquets/flower_world.jpeg', 'The Sampahs Delight bouquet features white calla lilies and greenery for a sleek and sophisticated look.'),
(15, 2, 'Davids Magic', 0, 0.85, 4, 'assets/bouquets/lavender_surprise.jpeg', 'The Davids Magic  bouquet includes a variety of blooms in soft pastel shades, such as lavender, pink, and peach, for a dreamy and romantic look.'),
(16, 2, 'Elis World', 7, 0.25, 5, 'assets/bouquets/le_sonia.jpeg', 'The Elis World bouquet includes roses, snapdragons, and daisies in shades of pink and white for a charming and rustic feel.'),
(17, 2, 'Akwasis Activities', 0, 0.56, 5, 'assets/bouquets/prada.jpeg', 'The Akwasis Activities bouquet features red roses, purple irises, and pink carnations for a dramatic and striking arrangement.'),
(18, 2, 'Kez by the Sea', 0, 0.45, 4, 'assets/bouquets/sena_eyes.jpeg', 'The Kez by the Sea bouquet includes sunflowers, yellow roses, and daisies for a cheerful and bright arrangement.'),
(19, 3, 'VAS 1', 10, 0.92, 6, 'assets/vases/vase1.jpeg', 'This vase is made of hand-blown glass and features a unique, abstract design, adding a touch of art to any space.'),
(20, 3, 'VAS 2', 16, 0.87, 7, 'assets/vases/vase2.jpeg', 'This vase is made of polished marble and features a minimalist design, ideal for displaying a single stem or a minimalist arrangement.'),
(21, 3, 'VAS 3', 0, 0.83, 6, 'assets/vases/vase3.jpeg', 'This vase features a metallic finish and intricate details, evoking the glamour of the 1920s.'),
(22, 3, 'VAS 4', 13, 0.78, 7, 'assets/vases/vase4.jpeg', 'This vase is made of terracotta and features a textured, earthy look, perfect for displaying a natural arrangement.'),
(23, 3, 'VAS 5', 9, 0.89, 6, 'assets/vases/vase5.jpeg', 'This vase features a sea-inspired design with shades of blue and green, perfect for displaying a beachy arrangement.'),
(24, 3, 'VAS 6', 5, 0.97, 7, 'assets/vases/vase6.jpeg', 'This vase is made of concrete and features a modern, industrial look, perfect for displaying a bold and unique arrangement.'),
(25, 3, 'VAS 7', 0, 0.84, 6, 'assets/vases/vase7.jpeg', 'This vase features a playful design with bold colors and quirky shapes, ideal for displaying a fun and whimsical arrangement.'),
(26, 3, 'VAS 8', 6, 0.94, 7, 'assets/vases/vase8.jpeg', 'This vase is made of galvanized metal and features a simple, yet rustic design, perfect for displaying a natural arrangement.');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` VALUES
(1, 'admin'),
(2, 'logged-in-user');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `pword` varchar(100) DEFAULT NULL,
  `role_id` int(11) DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` VALUES
(1, NULL, 'omar@dua.com', '123', NULL),
(2, NULL, 'dade@dua.com', '123', NULL),
(3, NULL, 'senam@dua.com', '123', NULL),
(4, NULL, 'selom@dua.com', '123', NULL),
(5, 'senam', 'senam.gtay@gmail.com', '$2y$10$xQ4YDEQtPaMtpYGrNQAaa.9lBFHZnjBrNFvvGjlTqpT5ioU1KmCaq', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `payment_id` (`payment_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`payment_id`) REFERENCES `payment` (`payment_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
