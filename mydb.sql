
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

DROP TABLE IF EXISTS `address`;
CREATE TABLE IF NOT EXISTS `address` (
  `name` varchar(255) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `pincode` bigint(6) NOT NULL,
  `locality` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `landmark` varchar(255) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`name`, `mobile`, `pincode`, `locality`, `address`, `city`, `state`, `id`, `user_id`) VALUES
('Yuva', 8989889880, 625603, 'Periyakulam', '222/45 North street', 'Theni', 'Tamilnadu', 1, 3),
('Seeyoniga', 7623908765, 600006, 'Tambaram', '5/2/43 nehru street', 'Chennai', 'Tamilnadu', 2, 3),
('Saikiran', 8976342124, '6234569', 'Adyar', '78/23/1 South street', 'Chennai','Tamilnadu', 3,3);

-- --------------------------------------------------------

--
-- Table structure for table `favorite`
--

DROP TABLE IF EXISTS `favorite`;
CREATE TABLE IF NOT EXISTS `favorite` (
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `txn_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_gross` float(10,2) NOT NULL,
  `currency_code` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` bigint(20) NOT NULL,
  `category` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `category`, `image`) VALUES
(1, 'Guess 1875', 3000, 'watches', 'watch1.jpg'),
(2, 'Guest Watch', 2500, 'watches', 'watch2.jpg'),
(3, 'Panerai Watch', 3500, 'watches', 'watch3.jpg'),
(4, 'Nonos Watch', 1800, 'watches', 'watch4.jpg'),
(5,'GUCCI watch',999, 'watches', 'watch5.jpg'),
(6,'Fastrack for Unisex',1399, 'watches', 'watch6.jpg'),
(7,'Luxury Fashion leather watch',1578, 'watches', 'watch7.jpg'),
(8,'Classic Aesthetic Watch',879, 'watches', 'watch8.jpg'),
(9,'Jack Klein watch for men',1199, 'watches', 'watch9.jpg'),
(10,'Luxury Quartz Sports watch',2000, 'watches', 'watch10.jpg'),
(11,'Seagull Manual Watch',2300, 'watches', 'watch11.jpg'),
(12,'Luxury Fashion Military Watch',3500, 'watches', 'watch12.jpg'),
(13,'Levis', 1800, 'clothes', 'shirt1.jpg'),
(14,'louis philippe shirt', 2500, 'clothes', 'shirt2.jpg'),
(15,'Highlander shirt', 500, 'clothes', 'shirt3.jpg'),
(16,'GUCCI White Shirt', 2300, 'clothes', 'shirt4.jpg'),
(17,'Rabbit neutrons solid shirt',2199, 'clothes', 'shirt5.jpg'),
(18,'Dennis Lingo Men Casual shirt',800, 'clothes', 'shirt6.jpg'),
(19,'COODRONY Men shirt',1500, 'clothes', 'shirt7.jpg'),
(20,'Autumn Fashion Brand Slim fit',2800, 'clothes', 'shirt8.jpg'),
(21,'New Fashion Europe Style Slim fit',1299, 'clothes', 'shirt9.jpg'),
(22,'Floral Men Casual Shirt',2000, 'clothes', 'shirt10.jpg'),
(23,'VSKA Casual shirt',3399, 'clothes', 'shirt11.jpg'),
(24,'TFW Quality Fashion Men Shirt',2999, 'clothes', 'shirt12.jpg'),
(25,'Nike White Sneaker', 8000, 'shoes', 'shoe1.jpg'),
(26,'Nike White Shoes', 7500, 'shoes', 'shoe2.jpg'),
(27,'Nike Yellow Sneaker', 7000, 'shoes', 'shoe3.jpg'),
(28,'Nike Brown Sneaker', 6000, 'shoes', 'shoe4.jpg'),
(29,'Sparx Men Casual shoes',800, 'shoes', 'shoe5.jpg'),
(30,'T star Women Casual shoes',999, 'shoes', 'shoe6.jpg'),
(31,'PVC Casual shoe for Men',2999, 'shoes', 'shoe7.jpg'),
(32,'PEXLO Casual shoe',4000, 'shoes', 'shoe8.jpg'),
(33,'Louise Philippe Casual shoes',3599, 'shoes', 'shoe9.jpg'),
(34,'PUMA Men Blue shoes',1999, 'shoes', 'shoe10.jpg'),
(35,'Restin Foot Sneakers',2589, 'shoes', 'shoe11.jpg'),
(36,'Aadi Outdoor shoes',2000, 'shoes', 'shoe12.jpg'),
(37,'Beats Headphone', 22500, 'headphones', 'sp1.jpg'),
(38,'Zolo Headphone', 4500, 'headphones', 'sp2.jpg'),
(39,'Sony Speaker', 10500, 'headphones', 'sp3.jpg'),
(40,'Airpods', 15000, 'headphones', 'sp4.jpg'),
(41,'Sony Speaker',15900, 'headphones', 'sp5.jpg'),
(42,'Beats and Bose Headphones',8999, 'headphones', 'sp6.jpg'),
(43,'China BT Headphones',3599, 'headphones', 'sp7.jpg'),
(44,'Microsoft Surface Headphones',12999, 'headphones', 'sp8.jpg'),
(45,'Rock 952 Stereo Foldable Headphones',5000, 'headphones', 'sp9.jpg'),
(46,'Samsung CT wireless Headphone',1699, 'headphones', 'sp10.jpg'),
(47,'Boult Audio Headphones',2599, 'headphones', 'sp11.jpg'),
(48,'Boat Rockers wireless bluetooth headset',1299, 'headphones', 'sp12.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

DROP TABLE IF EXISTS `support`;
CREATE TABLE IF NOT EXISTS `support` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `message` longtext NOT NULL,
  `subject` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `support`
--

INSERT INTO `support` (`id`, `user_id`, `message`, `subject`, `time`) VALUES
(51, 1, '', '', '2021-03-02 08:58:30'),
(50, 1, '', '', '2021-03-02 08:58:20'),
(49, 1, '', '', '2021-03-02 08:57:36'),
(48, 1, 'Yuva', '', '2021-03-02 08:57:29'),
(47, 1, '', '', '2021-03-02 08:57:16'),
(46, 1, '', '', '2021-03-02 08:56:48'),
(45, 1, '', '', '2021-03-02 08:55:30'),
(44, 1, '', '', '2021-03-02 08:55:27'),
(43, 1, '', '', '2021-03-02 08:49:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contact` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `password`, `id`, `contact`, `name`) VALUES
('yuva956@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 7708337676, 'Yuva'),
('Seeyo67@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710', 2, 9087654321, 'Seeyoniga'),
('sai908@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 3, 8851057549, 'Saikiran');

-- --------------------------------------------------------

--
-- Table structure for table `users_items`
--

DROP TABLE IF EXISTS `users_items`;
CREATE TABLE IF NOT EXISTS `users_items` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `quantity` bigint(20) NOT NULL DEFAULT '0',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('added to cart','confirmed') NOT NULL DEFAULT 'added to cart',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_items`
--

INSERT INTO `users_items` (`id`, `user_id`, `product_id`, `quantity`, `time`, `status`) VALUES
(22, 1, 1, 1, '2021-08-25 10:37:51', 'confirmed'),
(23, 1, 17, 1, '2021-04-02 06:55:50', 'confirmed'),
(24, 1, 17, 1, '2021-04-02 06:56:01', 'added to cart'),
(26, 4, 16, 1, '2021-04-05 07:40:14', 'added to cart'),
(58, 3, 17, 1, '2021-04-11 17:36:56', 'confirmed');
COMMIT;

