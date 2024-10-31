-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2024 at 01:59 AM
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
-- Database: `vision_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`) VALUES
(1, 'Bagpacks', 'bag3.jpg'),
(2, 'Travelling Bags', 'travelinbags.jpg'),
(3, 'Sling Bags', 's7.jpg'),
(4, 'School Bags	', 'schoolbags2.PNG'),
(5, 'Ladies Purse	', 'p1.jpg'),
(6, 'Ladies Bags	', 'wbag16.jpg'),
(7, 'Man Bags', 'mbag13.jpg'),
(8, 'Mini Bags	', 'mini bag 13.jpg'),
(9, 'Hand Bags	', 'h13.jpg'),
(10, 'Shopping Bags	', 'shopping bags2.PNG'),
(13, 'Diaper Bags', 'diaper bag.webp'),
(14, 'Open Box/Used  Bags', 'local bags.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `zip` varchar(20) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `agree` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `full_name`, `phone_number`, `email`, `password`, `address`, `address2`, `city`, `zip`, `state`, `comment`, `agree`, `created_at`) VALUES
(1, 'Adil Ismail', '03158239299', 'adilismail7654321@gmail.com', '', '22/22 FB Area block 8 Azzizabad', 'BBBBBBBBBBBBBBBBBBBBBBBBBBB', 'Karachi', '75950', '000000`', 'BKK <div class=\"container py-5\">\r\n    <h2 class=\"text-white text-center fs-1 my-4 font-weight-BOLD\">Fill This Form To Contact Us</h2>\r\n    <form class=\"row g-3\" action=\"submit_contact.php\" method=\"post\">\r\n        <div class=\"form-floating col-md-6\">\r\n            <input type=\"text\" class=\"form-control\" name=\"full_name\" id=\"floatingName\" placeholder=\"Full Name\">\r\n            <label class=\"text-dark\" for=\"floatingName\">Full Name</label>\r\n        </div>\r\n        <div class=\"form-floating col-md-6\">\r\n            <input type=\"tel\" class=\"form-control\" name=\"phone_number\" id=\"floatingPhone\" placeholder=\"Phone Number\">\r\n            <label class=\"text-dark\" for=\"floatingPhone\">Phone Number</label>\r\n        </div>\r\n        <div class=\"form-floating col-md-6\">\r\n            <input type=\"email\" class=\"form-control\" name=\"email\" id=\"floatingEmail\" placeholder=\"name@example.com\">\r\n            <label class=\"text-dark\" for=\"floatingEmail\">Email address</label>\r\n        </div>\r\n        <div class=\"form-floating col-md-6\">\r\n            <input type=\"password\" class=\"form-control\" name=\"password\" id=\"floatingPassword\" placeholder=\"Password\">\r\n            <label class=\"text-dark\" for=\"floatingPassword\">Password</label>\r\n        </div>\r\n        <div class=\"form-floating col-md-12\">\r\n            <input type=\"text\" class=\"form-control\" name=\"address\" id=\"floatingAddress\" placeholder=\"Address\">\r\n            <label class=\"text-dark\" for=\"floatingAddress\">Address</label>\r\n        </div>\r\n        <div class=\"form-floating col-md-12\">\r\n            <input type=\"text\" class=\"form-control\" name=\"address2\" id=\"floatingAddress2\" placeholder=\"2nd Address\">\r\n            <label class=\"text-dark\" for=\"floatingAddress2\">2nd Address</label>\r\n        </div>\r\n        <div class=\"form-floating col-md-4\">\r\n            <input type=\"text\" class=\"form-control\" name=\"city\" id=\"floatingCity\" placeholder=\"City\">\r\n            <label class=\"text-dark\" for=\"floatingCity\">City</label>\r\n        </div>\r\n        <div class=\"form-floating col-md-4\">\r\n            <input type=\"text\" class=\"form-control\" name=\"zip\" id=\"floatingZip\" placeholder=\"Zip\">\r\n            <label class=\"text-dark\" for=\"floatingZip\">Zip</label>\r\n        </div>\r\n        <div class=\"form-floating col-md-4\">\r\n            <input type=\"text\" class=\"form-control\" name=\"state\" id=\"floatingState\" placeholder=\"State\">\r\n            <label class=\"text-dark\" for=\"floatingState\">State</label>\r\n        </div>\r\n        <div class=\"form-floating col-md-12\">\r\n            <textarea class=\"form-control\" name=\"comment\" placeholder=\"Leave a comment here\" id=\"floatingTextarea2\" style=\"height: 100px\"></textarea>\r\n            <label class=\"text-dark\" for=\"floatingTextarea2\">Comment</label>\r\n        </div>\r\n        <div class=\"col-12\">\r\n            <div class=\"form-check\">\r\n                <input class=\"form-check-input\" type=\"checkbox\" name=\"agree\" id=\"gridCheck\">\r\n                <label class=\"text-dark\" class=\"form-check-label\" for=\"gridCheck\">\r\n                  Check me out\r\n                </label>\r\n            </div>\r\n        </div>\r\n        <div class=\"col-12\">\r\n            <button type=\"submit\" class=\"btn btn-danger\">Submit</button>\r\n        </div>\r\n    </form>\r\n</div>\r\n', 1, '2024-08-23 22:04:02');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `feedback` text DEFAULT NULL,
  `agree` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `full_name`, `phone_number`, `email`, `password`, `feedback`, `agree`, `created_at`) VALUES
(1, 'Adil Ismail', '03158239299', 'adilismail7654321@gmail.com', 'blah', 'orem ipsum dolor sit amet consectetur adipisicing elit. Voluptates necessitatibus, cupiditate assumenda voluptatum velit quam eveniet deserunt dolore sit quos culpa libero vero saepe incidunt nostrum repudiandae qui? Lorem ipsum dolor sit amet co', 1, '2024-08-23 21:57:04');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_id`, `name`, `email`, `phone_number`, `address`, `price`, `quantity`, `order_date`) VALUES
(1, 4, 'Adil Ismail', 'adilismail7654321@gmail.com', '03158239299', '22/22 FB Area block 8 Azzizabad', 10500.00, 2, '2024-08-23 16:38:45'),
(2, 2, 'Adil Ismail', 'adilismail7654321@gmail.com', '03158239299', '22/22 FB Area block 8 Azzizabad', 500.00, 2, '2024-08-23 16:38:45'),
(3, 5, 'Adil Ismail', 'adilismail7654321@gmail.com', '03158239299', '22/22 FB Area block 8 Azzizabad', 8000.00, 1, '2024-08-23 18:51:01'),
(4, 2, 'Adil Ismail', 'adilismail7654321@gmail.com', '03158239299', '22/22 FB Area block 8 Azzizabad', 500.00, 1, '2024-08-23 20:47:35'),
(5, 2, 'Adil Ismail', 'adilismail7654321@gmail.com', '03158239299', '22/22 FB Area block 8 Azzizabad', 500.00, 1, '2024-08-23 21:31:04'),
(6, 2, 'Adil Ismail', 'adilismail7654321@gmail.com', '03158239299', '22/22 FB Area block 8 Azzizabad', 500.00, 1, '2024-08-23 23:47:39');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `Product_Details` text DEFAULT NULL,
  `Color` varchar(100) DEFAULT NULL,
  `Material` varchar(100) DEFAULT NULL,
  `Measurement` varchar(100) DEFAULT NULL,
  `Brand` varchar(100) DEFAULT NULL,
  `Care_Instructions` text DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `note` text DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `Product_Details`, `Color`, `Material`, `Measurement`, `Brand`, `Care_Instructions`, `image`, `note`, `category`, `stock`, `category_id`) VALUES
(1, '13&quot; Mini Bag - Birds', 'The perfect companion in the form of a mini-bag, for every kid who wants to rock his/her own runway.', 500.00, '&lt;br /&gt;\r\n&lt;b&gt;Warning&lt;/b&gt;:  Undefined array key &quot;product_details&quot; in &lt;b&gt;C:\\xampp\\htdocs\\vision-project\\edit_product.php&lt;/b&gt; on line &lt;b&gt;101&lt;/b&gt;&lt;br /&gt;\r\n', '&lt;br /&gt;&lt;b&gt;Warning&lt;/b&gt;:  Undefined array key ', '&lt;br /&gt;&lt;b&gt;Warning&lt;/b&gt;:  Undefined array key ', '&lt;br /&gt;&lt;b&gt;Warning&lt;/b&gt;:  Undefined array key ', '&lt;br /&gt;&lt;b&gt;Warning&lt;/b&gt;:  Undefined array key ', '&lt;br /&gt;\r\n&lt;b&gt;Warning&lt;/b&gt;:  Undefined array key &quot;care_instructions&quot; in &lt;b&gt;C:\\xampp\\htdocs\\vision-project\\edit_product.php&lt;/b&gt; on line &lt;b&gt;121&lt;/b&gt;&lt;br /&gt;\r\n', 'mini bag 7.jpg', 'blahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblah', '', 88, NULL),
(2, '13\" Bagpack - Birds', 'The perfect companion in the form of a mini-bag, for every kid who wants to rock his/her own runway.', 500.00, 'Opt for our compact yet spacious black textured top handle bag featuring a metal lock closure. Lorem ipsum dolor sit amet consectetur adipisicing elit. Error quasi eligendi, eos libero architecto voluptatem maxime, harum in itaque quidem fugit non qui quaerat esse iste molestias a maiores aperiam.\r\n', 'Black', 'leather', '25/20 iches', 'Astore', NULL, '', '0', NULL, 9, 1),
(3, 'Astore Suit Case - Traveling Bag', 'The perfect companion in the form of a mini-bag, for every kid who wants to rock his/her own runway.', 10500.00, 'Opt for our compact yet spacious black textured top handle bag featuring a metal lock closure. Lorem ipsum dolor sit amet consectetur adipisicing elit. Error quasi eligendi, eos libero architecto voluptatem maxime, harum in itaque quidem fugit non qui quaerat esse iste molestias a maiores aperiam.\r\n', 'Black', 'leather', '42/50 Iches', 'Astore', NULL, '', '0', NULL, 20, 2),
(4, 'Astore bag - MiniBag', 'The perfect companion in the form of a mini-bag, for every kid who wants to rock his/her own runway.', 10500.00, 'Opt for our compact yet spacious black textured top handle bag featuring a metal lock closure. Lorem ipsum dolor sit amet consectetur adipisicing elit. Error quasi eligendi, eos libero architecto voluptatem maxime, harum in itaque quidem fugit non qui quaerat esse iste molestias a maiores aperiam.\r\n', 'Black', 'leather', '42/50 Iches', 'Astore', NULL, '', '0', NULL, 20, 8),
(5, 'Astore *7 Mini Bag', 'Wholesale Office Briefcase Laptop Notebook Computer Bag USB Antitheft Smart Business Backpack Custom Logo 15.6\"', 8000.00, 'Opt for our compact yet spacious black textured top handle bag featuring a metal lock closure. Lorem ipsum dolor sit amet consectetur adipisicing elit. Error quasi eligendi, eos libero architecto voluptatem maxime, harum in itaque quidem fugit non qui quaerat esse iste molestias a maiores aperiam.', 'unkown', 'leather', 'H 9\" / W 9.5\"', 'Astore', NULL, '', '0', NULL, 15, 8),
(6, 'falahna bag ', 'bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb bbhjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj e ', 150.00, 'bbbbbbbbbbbbbbbbbbbbbbbbbbb jjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', 'red', 'leather', 'H 9\" / W 9.5\"', 'nhi pata', NULL, '', '0', NULL, 1, 14);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`) VALUES
(1, 1, 'images/mini bag 4.jpg'),
(2, 1, 'images/mini bag 5.jpg'),
(3, 1, 'images/mini bag 6.jpg'),
(4, 2, 'images/bag1.jpg'),
(5, 2, 'images/bag2.jpg'),
(6, 2, 'images/bag3.jpg'),
(7, 3, 'images/travelling bag 1.jpg'),
(8, 3, 'images/travelling bag 2.jpg'),
(9, 3, 'images/travelling bag 3.jpg'),
(10, 4, 'images/mini bag 16.jpg'),
(11, 4, 'images/mini bag 17.jpg'),
(12, 4, 'images/mini bag 18.jpg'),
(13, 5, 'images/mini bag 4.jpg'),
(14, 5, 'images/mini bag 5.jpg'),
(15, 5, 'images/mini bag 6.jpg'),
(16, 6, 'images/imported bag 1.jpg'),
(17, 6, 'images/imported bag 2.jpg'),
(18, 6, 'images/imported bag 3.jpg'),
(19, 6, 'images/imported bag 4.jpg'),
(20, 6, 'images/imported bag 5.jpg'),
(21, 6, 'images/imported bag 6.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
