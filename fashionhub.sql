-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2023 at 08:13 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fashionhub`
--
CREATE DATABASE IF NOT EXISTS `fashionhub` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `fashionhub`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`product_id`, `user_id`, `quantity`) VALUES
(16, 4, 1),
(65, 4, 10);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'T-shirt'),
(2, 'Top'),
(3, 'Shoe'),
(4, 'Shirt'),
(5, 'Salwar Suit'),
(6, 'Bag'),
(7, 'Cap');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_user_name` varchar(255) NOT NULL,
  `order_email` varchar(255) NOT NULL,
  `order_phone_no` varchar(10) NOT NULL,
  `order_address` text NOT NULL,
  `amount` float NOT NULL,
  `city` varchar(100) NOT NULL,
  `zip_code` varchar(10) NOT NULL,
  `state` varchar(100) NOT NULL,
  `ordered_time` datetime NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `order_user_name`, `order_email`, `order_phone_no`, `order_address`, `amount`, `city`, `zip_code`, `state`, `ordered_time`, `status`) VALUES
(2, 1, 'Shubham Kumar Vishwakarma', 'shubham@sv.com', '7439668163', '44/1/1 Chatterjee para Lane Uttarpara Kotrung, Hindmotor Hooghly', 4820.55, 'Kolkata', '712233', 'West Bengal', '2023-11-21 10:01:45', 'rejected'),
(3, 4, 'Rahul', 'rahul@ry.com', '7439668163', '44/1/1 Chatterjee para Lane Uttarpara Kotrung, Hindmotor Hooghly', 338.1, 'Kolkata', '712233', 'West Bengal', '2023-11-21 10:03:50', 'delivered'),
(4, 1, 'Shubham Kumar Vishwakarma', 'shubham@sv.com', '7439668163', '44/1/1 Chatterjee para Lane Uttarpara Kotrung, Hindmotor Hooghly', 838.95, 'Kolkata', '712233', 'West Bengal', '2023-11-21 10:05:19', 'delivered');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(11) NOT NULL,
  `order_no` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `order_no`, `product_id`, `quantity`) VALUES
(2, 'FASHION2', 12, 8),
(2, 'FASHION2', 70, 1),
(3, 'FASHION3', 11, 1),
(4, 'FASHION4', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_description` text NOT NULL,
  `product_keywords` text NOT NULL,
  `product_price` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_rating` float NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_image4` varchar(255) NOT NULL,
  `product_image5` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_description`, `product_keywords`, `product_price`, `category_id`, `product_quantity`, `product_rating`, `product_image1`, `product_image2`, `product_image3`, `product_image4`, `product_image5`) VALUES
(1, 'Regulat Polo T-shirt', 'Care Instructions: Machine Wash\r\nFit Type: Regular Fit\r\nOccasion : Leisure Sport\r\nPattern : Solid\r\nFit :Regular Fit\r\nMaterial: 60%Cotton40%Polyester\r\nSleeves : Half Sleeves', 'man\'s mans\'s men\'s mens\'s polos tshirts t-shirt\'s t-shirts\'s halfs sleeves rounds necks colars regulars clothings blacks', 799, 1, 100, 3.5, 'tshirt-01.jpg', 'tshirt-02.jpg', 'tshirt-03.jpg', 'tshirt-04.jpg', 'tshirt-05.jpg'),
(2, 'Polo T-Shirt for Me', 'The half sleeves offer a relaxed and versatile style, perfect for warmer weather or layering under jackets.\r\nThe solid color design adds a touch of elegance and makes it easy to pair with different bottoms.\r\nIt is suitable for various occasions, including casual outings, social gatherings, and relaxed work environments.\r\nThe T-shirt is designed with a classic polo neck, giving it a sophisticated and timeless look.', 'man\'s mans\'s men\'s mens\'s polos tshirts t-shirt\'s t-shirts\'s halfs sleeves rounds necks colars regulars clothings greens', 499, 1, 50, 2.5, 'tshirt-06.jpg', 'tshirt-07.jpg', 'tshirt-08.jpg', 'tshirt-09.jpg', 'tshirt-10.jpg'),
(3, 'Mens Regular Polo T-shier', 'Care Instructions: Machine Wash\r\nFit Type: Regular Fit\r\nCare Instructions: Machine Wash\r\nFit Type: Regular Fit\r\nMaterial - 60% Cotton and 40% Polyester\r\nHalf sleeve Polo T-Shirt\r\nPattern - Solid\r\nPolo with classic collar', 'man\'s mans\'s men\'s mens\'s polos tshirts t-shirt\'s t-shirts\'s halfs sleeves rounds necks colars regulars clothings blues', 349, 1, 50, 5, 'tshirt-11.jpg', 'tshirt-12.jpg', 'tshirt-13.jpg', 'tshirt-14.jpg', 'tshirt-15.jpg'),
(4, 'Printed T-Shirt for Men', 'Fabric： Super soft to the touch, eco friendly, highly durable, moisture wicking and easy to wash.provides you a breathable and comfortable feeling all day\r\nDesign： This classic polo sport shirt ,designs in short sleeve, Check printed, turn down collar, button closure, and spread collar design.it is Breathable, Anti-wrinkle, not pilling and not fade , Exquisite craft .\r\nOccasion：Can be worn both smartly and casually at work and when out and about.ating, ,business, office, friends party, holiday ,sporting,golf,sports event and etc\r\nMatch：Print polo with black shorts , casual yet on-trend outfit .or wear a print polo with black chinos , lookout for a casual yet stylish look. Comes packaged in a dust-proof bag, ideal for giving as a gift\r\nNote：Please Check the Size Picture Offered from us to ensure accurate fitting', 'man\'s mans\'s men\'s mens\'s polos tshirts t-shirt\'s t-shirts\'s halfs sleeves rounds necks colars regulars clothings printeds cools blues whites', 399, 1, 50, 0, 'tshirt-16.jpg', 'tshirt-17.jpg', 'tshirt-18.jpg', 'tshirt-19.jpg', 'tshirt-20.jpg'),
(5, 'Mens Short Sleeve with Round Neck', 'Care Instructions: Easy to wash and care for, machine wash cold with like colors, tumble dry low\r\nFit Type: Oversized Fit\r\nFit: Oversized\r\nPattern: Wolf Printed\r\nFabric: Cotton Blend\r\nMade of soft and breathable cotton blend fabric for comfort and durability\r\nOversized T-shirt, loose fit, so very comfortable to wear, also looks very trendy & classy', 'man\'s mans\'s men\'s mens\'s polos tshirts t-shirt\'s t-shirts\'s halfs sleeves rounds necks colars regulars clothings shorts maroons', 399, 1, 50, 0, 'tshirt-21.jpg', 'tshirt-22.jpg', 'tshirt-23.jpg', 'tshirt-24.jpg', 'tshirt-25.jpg'),
(6, 'Mens T Shirt Green', 'Fit Type: Regular Fit\r\nFabric Type: 100% Cotton, Pattern name: Checkered\r\nOcassion: Casual and formal\r\nCreate a lasting impression in this Regular Fit Men’s T-Shirt. Crafted in Premium, Bio-washed 100% Cotton, which is breathable, comfortable, skin friendly, odourless and all natural.\r\nThis T-shirt has Checkered pattern, has half sleeve and a round collar which is stretchy and durable and is definitely a must-have in your wardrobe.\r\nCare Instruction : Machine wash with similar colour', 'man\'s mans\'s men\'s mens\'s polos tshirts t-shirt\'s t-shirts\'s halfs sleeves rounds necks colars regulars clothings greens', 599, 1, 46, 0, 'tshirt-26.jpg', 'tshirt-27.jpg', 'tshirt-28.jpg', 'tshirt-29.jpg', 'tshirt-30.jpg'),
(7, 'Multicolour Crew Neck T-Shirt', 'Care Instructions: Hand Wash Only\r\nFit Type: Loose Fit\r\nFabric: Cotton\r\nNeckline: Crew Neck\r\nSleeves: Half-slevees\r\nMore comfortable for your classic everyday look.', 'man\'s mans\'s men\'s mens\'s polos tshirts t-shirt\'s t-shirts\'s halfs sleeves rounds necks colars regulars clothings multicolors whites blacks', 499, 1, 50, 0, 'tshirt-31.jpg', 'tshirt-32.jpg', 'tshirt-33.jpg', 'tshirt-34.jpg', 'tshirt-35.jpg'),
(8, 'Half Sleeve Round Neck Mens T-Shirt', 'Care Instructions: Hand Wash Only\r\nFit Type: Regular Fit\r\nColor : Black\r\nFabric: Honey Comb | Care: Hand Wash\r\nSleeve Type: Half Sleeve | Regular Fit\r\nNeck Style: Round Neck\r\nPattern: Printed', 'man\'s mans\'s men\'s mens\'s polos tshirts t-shirt\'s t-shirts\'s halfs sleeves rounds necks colars regulars clothings whites printeds', 305, 1, 50, 0, 'tshirt-36.jpg', 'tshirt-37.jpg', 'tshirt-38.jpg', 'tshirt-39.jpg', 'tshirt-40.jpg'),
(9, 'Symbol Men Polo Shirt', 'Care Instructions: Hand Wash Only\r\nFit Type: Regular Fit\r\nSoft breathable cotton poly knit fabric\r\nMandarin collar styling\r\nSolid color\r\nPair with a classic pair of denims or chinos for a casual everyday look\r\nRefer to size chart to pick your correct size', 'man\'s mans\'s men\'s mens\'s polos tshirts t-shirt\'s t-shirts\'s halfs sleeves rounds necks colars regulars clothings symbols colars pinks', 299, 1, 50, 0, 'tshirt-41.jpg', 'tshirt-42.jpg', 'tshirt-43.jpg', 'tshirt-44.jpg', 'tshirt-45.jpg'),
(10, 'POLO ASSN. Men T-Shirt', 'Care Instructions: Machine Wash\r\nFit Type: Regular Fit\r\nHALF SLEEVE POLO', 'man\'s mans\'s men\'s mens\'s polos tshirts t-shirt\'s t-shirts\'s halfs sleeves rounds necks colars regulars clothings reds maroons', 479, 1, 50, 0, 'tshirt-46.jpg', 'tshirt-47.jpg', 'tshirt-48.jpg', 'tshirt-49.jpg', 'tshirt-50.jpg'),
(11, 'Casual Cotton T-Shirt', 'Day Calm and Comfort in The Summer Season with A Nice Casual Look. Soft & Breathable Fabric, Pair It with A Classic Pair of Denim or Chinos For An Everyday Decent Look, \r\nBENEFITS - This T-Shirt Is Designed to Provide Utmost Comfort in The Hot Summer Season with Great Fit And Trendy Looks. Easy To Wear, High Quality Branded Product\r\nWASH CARE- Machine Wash with Similar Colors', 'man\'s mans\'s men\'s mens\'s polos tshirts t-shirt\'s t-shirts\'s halfs sleeves rounds necks colars regulars clothings blues', 322, 1, 49, 0, 'tshirt-51.jpg', 'tshirt-52.jpg', 'tshirt-53.jpg', 'tshirt-54.jpg', 'tshirt-55.jpg'),
(12, 'Regular Fit Polo Shirt', 'Care Instructions: Machine Wash\r\nFit Type: Regular Fit\r\nOccasion : Leisure Sport\r\nPattern : Solid\r\nFit :Regular Fit\r\nMaterial: 60%Cotton40%Polyester\r\nSleeves : Half Sleeves', 'man\'s mans\'s men\'s mens\'s polos tshirts t-shirt\'s t-shirts\'s halfs sleeves rounds necks colars regulars clothings yellows', 549, 1, 50, 0, 'tshirt-56.jpg', 'tshirt-57.jpg', 'tshirt-58.jpg', 'tshirt-59.jpg', 'tshirt-60.jpg'),
(13, 'Designer Single Strip T Shirt', 'Care Instructions: Machine Wash\r\nFit Type: Regular Fit\r\nCare Instructions: Machine Wash\r\nFit Type: Regular Fit\r\nFabric: Cotton\r\nNeck Style: Round Neck\r\nSleeve Type: Half Sleeve', 'man\'s mans\'s men\'s mens\'s polos tshirts t-shirt\'s t-shirts\'s halfs sleeves rounds necks colars regulars clothings whites colorfullss designeds desings strips', 329, 1, 50, 0, 'tshirt-61.jpg', 'tshirt-62.jpg', 'tshirt-63.jpg', 'tshirt-64.jpg', 'tshirt-65.jpg'),
(14, 'Cotton Style Round Neck Standard Length T-Shirt', 'Cotton Blend: This easy-to-maintain T-shirt in a naturally absorbent and breathable cotton blend is an ideal choice for warmer days.\r\nSmartskin Technology: Designed to provide a pleasant wearing experience, it gives it a super-soft, natural hand feel for day-long comfort.\r\nComfortable Fit: An upgrade from regular tees, this T-shirt has a soft finish that provides an enjoyable experience, and a shoulder-to-neckline stitch technique that prevents bagginess.\r\n13 Stitches Per Inch: Reinforced with 13 stitches per inch using a mix of cotton and polyester sewing threads for strength and durability.\r\nTag-Free Comfort: Designed without any itchy tags for a smooth and pleasant experience. This ensures there is no irritation, skin abrasion, or rubbing', 'man\'s mans\'s men\'s mens\'s polos tshirts t-shirt\'s t-shirts\'s halfs sleeves rounds necks colars regulars clothings grays greys cottons whites', 279, 1, 50, 0, 'tshirt-66.jpg', 'tshirt-67.jpg', 'tshirt-68.jpg', 'tshirt-69.jpg', 'tshirt-70.jpg'),
(15, 'Regular Fit, Round Neck, Half Sleeves', 'Care Instructions: Machine Wash\r\nFit Type: Regular Fit\r\nFit Description: Regular Fit - Fitted at Chest and Straight on Waist Down\r\nPrint Type: Printed\r\nFabric Description: Single Jersey, 100% Cotton\r\nNeck: Round Neck\r\nStyle Tip: Pair this T-shirt with your favourite jeans and sneakers for a comfortable casual outfit', 'man\'s mans\'s men\'s mens\'s polos tshirts t-shirt\'s t-shirts\'s halfs sleeves rounds necks colars regulars clothings jerseys', 299, 1, 50, 0, 'tshirt-71.jpg', 'tshirt-72.jpg', 'tshirt-73.jpg', 'tshirt-74.jpg', 'tshirt-75.jpg'),
(16, 'Tshirt for Men, Round Neck Longline Drop Shoulder', 'Care Instructions: Easy to wash and care for, machine wash cold with like colors, tumble dry low\r\nFit Type: Oversized Fit\r\nPattern: Back Printed\r\nFabric: Cotton Blend\r\nDrop Shoulder Half Sleeve\r\nMade of soft and breathable cotton blend fabric for comfort and durability\r\nOversized T-shirt, loose fit, so very comfortable to wear, also looks very trendy & classy', 'man\'s mans\'s men\'s mens\'s polos tshirts t-shirt\'s t-shirts\'s halfs sleeves rounds necks colars regulars clothings tigers designs blacks graphics printeds uppers clothings', 269, 1, 50, 0, 'tshirt-76.jpg', 'tshirt-77.jpg', 'tshirt-78.jpg', 'tshirt-79.jpg', 'tshirt-80.jpg'),
(17, 'Half Sleeve T-Shirt', 'Care Instructions: Machine Wash\r\nFit Type: Regular Fit\r\nRegular Fit Half Sleeve Polo is made of comfortable, Bio Washed cotton-poly pique fabric, a three-button placket, and ribbed cuffs for a classic look.\r\nFabric Composition - Cotton 60% Poly 40% Blend, Bio Wash Pique Fabric.\r\nPattern - Solid Color Mens Polo T-Shirt, Rib Collar & Sleeve for Amazing Fit.\r\nClassic American Crew Signature Polo with Logo Embroidery on Chest.\r\nMade In India by Socially Compliant MSME Factory. All Components Used to make this T-Shirt are Proudly Made in India.', 'man\'s mans\'s men\'s mens\'s polos tshirts t-shirt\'s t-shirts\'s halfs sleeves rounds necks colars regulars clothings designs pinks printeds uppers', 369, 1, 50, 0, 'tshirt-81.jpg', 'tshirt-82.jpg', 'tshirt-83.jpg', 'tshirt-84.jpg', 'tshirt-85.jpg'),
(18, 'Mens Levi Tshirt', 'Care Instructions: Machine Wash\nFit Type: Regular Fit\nMen\'s Green Crew Neck T-Shirt', 'man\'s mans\'s men\'s mens\'s polos tshirts t-shirt\'s t-shirts\'s halfs sleeves rounds necks colars regulars clothings darks olives browns', 539, 1, 50, 0, 'tshirt-86.jpg', 'tshirt-87.jpg', 'tshirt-88.jpg', 'tshirt-89.jpg', 'tshirt-90.jpg'),
(19, 'Jack & Jones Mens Slim Fit T-Shirt', 'Care Instructions: Machine Wash\nFit Type: Slim Fit\nFabric Composition :: Cotton100%\nSleeve :: Short Sleeve\nPattern :: Solid\nWash Care :: Machine wash', 'man\'s mans\'s men\'s mens\'s polos tshirts t-shirt\'s t-shirts\'s halfs sleeves rounds necks colars regulars clothings jacks and jones yellows', 231, 1, 50, 0, 'tshirt-91.jpg', 'tshirt-92.jpg', 'tshirt-93.jpg', 'tshirt-94.jpg', 'tshirt-95.jpg'),
(20, 'Solid V Neck Half Sleeve T-Shirt', 'Style Number - 2726\nRibbed V-neck prevents sagging\nWashcare Instruction : Gentle wash 40 Degree, Do not bleach, Do not wring, Tumble dry low, Medium iron, Do not dry clean, Wash inside out with like colors. Do not iron on label', 'man\'s mans\'s men\'s mens\'s polos tshirts t-shirt\'s t-shirts\'s halfs sleeves rounds necks colars regulars clothings designs blacks graphics printeds', 492, 1, 50, 0, 'tshirt-96.jpg', 'tshirt-97.jpg', 'tshirt-98.jpg', 'tshirt-99.jpg', 'tshirt-100.jpg'),
(21, 'Mens Sports Running Shoes', 'Sole: Ethylene Vinyl Acetate\r\nClosure: Lace-Up\r\nHeel Height: 1 inches\r\nFit Type: Regular\r\nShoe Width: Medium\r\nSole Features: Height increasing non marking Eva sole made with light weight compound and orthopedic memory foam shoes which provides extra comfort to your feet with a perfect grip. Features Mega Pillow technology for added vacuum based air cushion under your heels.\r\nUpper Features: New, Breathable Mesh upper which is easily washable, perfect for all seasons - winter, summer, designed to give you the most comfortable fitting. These are quick drying washable shoes which makes it easy for consumers to wash and sanitize them easily.', 'man\'s mans\'s men\'s mens\'s casuals sports runnings gyms regulars shoes light blues', 539, 3, 50, 0, 'shoe-01.jpg', 'shoe-02.jpg', 'shoe-03.jpg', 'shoe-04.jpg', 'shoe-05.jpg'),
(22, 'Sparx Mens Running Shoe', 'MADE OF: High Quality Mesh as upper material and EVA & TPR as sole material.\r\nKEY FEATURES: Made to Last Long, Elegant Packaging, Perfect Gifting Option, Zero compromise on quality\r\nCARE INSTRUCTIONS: Soaking in water may damage the product. For cleaning just wipe dirt or mud off with a soft moist cloth. Do not use any hard bristles brush for cleaning. Do not bleach or use harsh cleaning agents. Do not machine wash or machine dry. Just dry in shade. Do not use any heating equipement for drying.\r\nTHE BRAND: Sparx is all about passion, challenges and zeal of people who like to live on-the-edge, have a dare-devil spirit and do things differently. Checkout our exciting range of shoes, sandals & flip-flops.', 'man\'s mans\'s men\'s mens\'s casuals sports runnings gyms regulars shoes light blues', 1002, 3, 50, 0, 'shoe-06.jpg', 'shoe-07.jpg', 'shoe-08.jpg', 'shoe-09.jpg', 'shoe-10.jpg'),
(23, 'Leather Outdoor Casual Shoes', 'Sole: Airmix\r\nClosure: Lace-Up\r\nFit Type: Regular\r\nShoe Width: Medium\r\nSole: Airmix\r\nClosure: Lace Up\r\nFit Type: Regular\r\nShoe Width: Medium\r\nCare Instructions: Wipe Gently With A Dry Cloth To Remove Any Dried-on Dirt And Dust', 'man\'s mans\'s men\'s mens\'s casuals sports runnings gyms regulars outdoors shoes leathers', 549, 3, 50, 0, 'shoe-11.jpg', 'shoe-12.jpg', 'shoe-13.jpg', 'shoe-14.jpg', 'shoe-15.jpg'),
(24, 'Sparx Mens Sneakers', 'Material:MESH\r\nLifestyle:Casual\r\nHeel Type:Flats', 'man\'s mans\'s men\'s mens\'s casuals sports runnings gyms regulars outdoors shoes sneakers blues stylishs', 774, 3, 50, 0, 'shoe-16.jpg', 'shoe-17.jpg', 'shoe-18.jpg', 'shoe-19.jpg', 'shoe-20.jpg'),
(25, 'Sparx Mens Sports Shoes', 'MADE OF: Mesh as upper material and EVA as sole material.\r\nKEY FEATURES: Made to Last Long, Elegant Packaging, Perfect Gifting Option, Zero compromise on quality\r\nCARE INSTRUCTIONS: Soaking in water may damage the product. For cleaning just wipe dirt or mud off with a soft moist cloth. Do not use any hard bristles brush for cleaning. Do not bleach or use harsh cleaning agents. Do not machine wash or machine dry. Just dry in shade. Do not use any heating equipement for drying.\r\nTHE BRAND: Sparx is all about passion, challenges and zeal of people who like to live on-the-edge, have a dare-devil spirit and do things differently. Checkout our exciting range of shoes, sandals & flip-flop', 'man\'s mans\'s men\'s mens\'s casuals sports runnings gyms regulars outdoors shoes sparxs oranges', 774, 3, 50, 0, 'shoe-21.jpg', 'shoe-22.jpg', 'shoe-23.jpg', 'shoe-24.jpg', 'shoe-25.jpg'),
(26, 'Campus Mens Maxico Running Shoes', 'Shoes\' Upper- These men\'s running shoes with a soft knitted vamp upper, ensure a cozy feel against your skin while delivering a secure grip for your feet. Versatile enough for college, office days, dates, and countless other occasions. They also support your outdoor activities like yoga, running, jogging, or brisk walking. From the office, and college corridors to the park, these shoes are the obvious choice.\nShoes\' Outsole- Experience the confidence of the anti-slip outsole design, providing unmatched grip and stability. Whether you\'re sprinting or strolling, these shoes for men keep you steady on your feet.\nComfort- Elevate your every day with these supremely comfortable men\'s shoes. They\'re tailored to your comfort needs, making them your go-to choice for daily wear. Say goodbye to discomfort and hello to joyful strides!', 'man\'s mans\'s men\'s mens\'s casuals sports runnings gyms regulars outdoors shoes campus blues', 929, 3, 50, 0, 'shoe-26.jpg', 'shoe-27.jpg', 'shoe-28.jpg', 'shoe-29.jpg', 'shoe-30.jpg'),
(27, 'Campus Mens Running Shoes', 'Sole: Rubber |\r\nClosure: Lace-Up |\r\nFit Type: Regular |\r\nShoe Width: Medium |\r\nLifestyle: Running Shoes |\r\nWarranty Type: Manufacturer |\r\nCare Instructions: Allow your pair of shoes to air and de-odorize at a regular basis, this also helps them retain their natural shape; use shoes bags to prevent any stains or mildew; dust any dry dirt from the surface using a clean cloth, do not use polish or shiner', 'man\'s mans\'s men\'s mens\'s casuals sports runnings gyms regulars outdoors shoes campus pros blues oranges', 649, 3, 50, 0, 'shoe-31.jpg', 'shoe-32.jpg', 'shoe-33.jpg', 'shoe-34.jpg', 'shoe-35.jpg'),
(28, 'Campus Mens FINE Running Shoes', 'Sole: Ethylene Vinyl Acetate |\nClosure: Lace-Up |\nHeel Height: 1 centimeters |\nFit Type: Regular |\nShoe Width: Medium |\nLifestyle: Running Shoes |\nClosure: Lace Up |\nWarranty Type: Manufacturer', 'man\'s mans\'s men\'s mens\'s casuals sports runnings gyms regulars outdoors shoes darks blues', 1529, 3, 50, 0, 'shoe-36.jpg', 'shoe-37.jpg', 'shoe-38.jpg', 'shoe-39.jpg', 'shoe-40.jpg'),
(29, 'Reebok Mens Effect Runner Sneaker', 'This is a Synthetic Shoe suitable for Men. |\nSole: Rubber |\nClosure: Lace-Up |\nShoe Width: Medium\nFull Mesh Vamp With Unique Cord Style Dual Tone Back Loop Along With Piping On Qtr. Makes Shoe Enticing.Molded Memorytech Sockliner Adds Durable Support For All-Day Comfortsole- The Injected Eva Midsole Is Lightweight And Provides Superior Cushioning\n', 'man\'s mans\'s men\'s mens\'s casuals sports runnings gyms regulars outdoors shoes sneakers blues blacks reebooks reeboks', 1349, 3, 50, 0, 'shoe-41.jpg', 'shoe-42.jpg', 'shoe-43.jpg', 'shoe-44.jpg', 'shoe-45.jpg'),
(30, 'Sparx Men Blue Silver', 'Sole: Ethylene Vinyl Acetate |\r\nClosure: Lace-Up |\r\nFit Type: Regular |\r\nShoe Width: Medium |\r\nWHAT YOU GET: 1. One Pair of Sports Shoes as shown in the pictures. 2. Storage Box. 3. Sparx Trust. |\r\nMADE OF: High Quality Mesh as upper material and EVA as sole material. |\r\nKEY FEATURES: Made to Last Long, Elegant Packaging, Perfect Gifting Option, Zero compromise on quality', 'man\'s mans\'s men\'s mens\'s casuals sports runnings gyms regulars outdoors shoes blues sparxs', 569, 3, 50, 0, 'shoe-46.jpg', 'shoe-47.jpg', 'shoe-48.jpg', 'shoe-49.jpg', 'shoe-50.jpg'),
(31, 'U.S. POLO ASSN. Mens Britt Sneaker', 'Sole: Rubber |\nClosure: Lace-Up |\nShoe Width: Medium |\nU.S. POLO ASSN. BRITT Men\'s Casual | Off White Sneakers |\nUS Polo Shoes for men |\nUS Polo footwear |\nLace up |\nCasual Shoes', 'man\'s mans\'s men\'s mens\'s casuals sports runnings gyms regulars outdoors shoes whites reds ', 1769, 3, 50, 0, 'shoe-51.jpg', 'shoe-52.jpg', 'shoe-53.jpg', 'shoe-54.jpg', 'shoe-55.jpg'),
(32, 'Puma Unisex-Adult Flair Running Shoe', 'Sole: Rubber |\nClosure: Lace-Up |\nFit Type: Regular |\nShoe Width: Medium |\nSyle Name:-Running Shoe |\nModel Name:-Flair |\nBrand Color:-Puma Black-Puma White |\nWipe with a clean dry cloth', 'man\'s mans\'s men\'s mens\'s casuals sports runnings gyms regulars outdoors shoes pumas blacks', 1299, 3, 50, 0, 'shoe-56.jpg', 'shoe-57.jpg', 'shoe-58.jpg', 'shoe-59.jpg', 'shoe-60.jpg'),
(33, 'Sparx Mens Running Shoe', 'Sole: Rubber |\r\nClosure: Lace-Up |\r\nFit Type: Relaxed |\r\nShoe Width: Medium |\r\nMaterial:MESH |\r\nLifestyle:Casual |\r\nHeel Type:Flats', 'man\'s mans\'s men\'s mens\'s casuals sports runnings gyms regulars outdoors shoes sparxs grays greys', 1359, 3, 50, 0, 'shoe-61.jpg', 'shoe-62.jpg', 'shoe-63.jpg', 'shoe-64.jpg', 'shoe-65.jpg'),
(34, 'Men\'s Wager Basketball Shoes', 'Fit Type: Regular |\nShoe Width: Medium |\nRubber Damping Sole In Zig-Zag Shape Provides You With Strong Ground Holding In Accordance With The Sole Force Position And Supports Your Weight. |\nBreathable, Lightweight Textile Upper And The Molded Heel Shield Make Greater Structure, Lock Your Foot In The Right Place And Protect Your Ankle From Injury By Offering Better Support. |\nDurable, Wear Resistant & And Anti-Slip Material Make Our Product Your Best Choice On The Court To Win The Game. | The Upper With Venting Holes Offers Good Breathability And Sweat Perspiration To Make You Feel Dry And Comfortable During Exercise |\nIf Any Dirt Or Damaged Product Upsets You Or For Some Reason Youâ€Re Just Not Happy With The One You Received, Donâ€T Hesitate To Contact Us, We Are Always Here To Help And Provide You With The Best After Sale Service', 'man\'s mans\'s men\'s mens\'s casuals sports runnings gyms regulars outdoors shoes wagers basketballs blacks oranges ', 1239, 3, 50, 0, 'shoe-66.jpg', 'shoe-67.jpg', 'shoe-68.jpg', 'shoe-69.jpg', 'shoe-70.jpg'),
(35, 'Sparx Mens Sneaker', 'Sole: Ethylene Vinyl Acetate |\nClosure: Pull On |\nFit Type: Regular |\nShoe Width: Medium |\nLight Weight |\nBreathable |\nFlexible', 'man\'s mans\'s men\'s mens\'s casuals sports runnings gyms regulars outdoors shoes sparxs sneakers blacks yellows ', 729, 3, 50, 0, 'shoe-71.jpg', 'shoe-72.jpg', 'shoe-73.jpg', 'shoe-74.jpg', 'shoe-75.jpg'),
(36, 'Sparx Mens Sneaker', 'Sole: Thermoplastic Elastomers |\nClosure: Lace-Up |\nFit Type: Regular |\nShoe Width: Medium |\nOuter Material: Canvas |\nClosure Type: Lace-Up |\nToe Style: Round Toe', 'man\'s mans\'s men\'s mens\'s casuals sports runnings gyms regulars outdoors shoes sparxs sneakers blacks ', 679, 3, 50, 0, 'shoe-76.jpg', 'shoe-77.jpg', 'shoe-78.jpg', 'shoe-79.jpg', 'shoe-80.jpg'),
(37, 'Puma Nitro Running Shoe', 'Sole: Rubber |\nClosure: Lace-Up |\nFit Type: Regular |\nShoe Width: Medium |\nStyle Name:-Running Shoe |\nModel Name:-Deviate Nitro 2 Wns |\nBrand Color:-Black-Fire Orchid |\nMaterial:-Textile |\nCare Instructions:-Wipe with a clean dry cloth', 'man\'s mans\'s men\'s mens\'s casuals sports runnings gyms regulars outdoors shoes pumas nitros blacks oranges blues colorfulls stylishs ', 3999, 3, 50, 0, 'shoe-81.jpg', 'shoe-82.jpg', 'shoe-83.jpg', 'shoe-84.jpg', 'shoe-85.jpg'),
(38, 'Bacca Bucci Running Walking Training Gym Shoes ', 'Fit Type: Regular |\nShoe Width: Medium |\nLightweight Design:Designed With High Quality Knitted Cotton/Spandex Lightweight Vamp, And The Free Tension Allows You To Enjoy The Ultimate Barefoot Feeling,Improve The Overall Stability And Flexibility Comfortable Experience:It Use Of Ergonomic Design,The Inside Of The Shoe Is Made Of A Comfortable Fabric,The Free Tension Allows You To Enjoy The Ultimate Barefoot Feeling | Bacca Bucci Guarantee: If Have Any Problems With The Quality Of Our Men\'S Sneakers, We Will 100% . Please Without Any Hesitations To Contact Us, We Will Handle It Within 24 Hours | Anti-Slip And Wearproof:Made By Eva +Md Outsole,17% Performance Better Than Ordinary Rubber, Which Improves Wear Resistance And Grip Strength.It Is Scratch-Resistant, Non-Slip, And Effectively Supports The Heel | Cushioning Md Sole:This Men\'S Running Shoe Uses A Cushioning Md Sole, It\'S Eva Secondary Foaming Technology, Which Has 30% More Cushioning,It Can Distract 60% Of The Foot\'S Pressure During Running,Make You Feel Comfortable<Br><Br>; Age Range Description: Adult |\nToe Style: Round Toe | Department Name: Mens', 'man\'s mans\'s men\'s mens\'s casuals sports runnings gyms regulars outdoors shoes buccas buccis walkings reds', 1099, 3, 50, 0, 'shoe-86.jpg', 'shoe-87.jpg', 'shoe-88.jpg', 'shoe-89.jpg', 'shoe-90.jpg'),
(39, 'New balance Mens Running Shoe', 'Sole: Rubber |\nClosure: Lace-Up |\nShoe Width: Wide |\nDiscover a lightweight, ultra-cushioned ride in the New Balance Fresh Foam 880v11. |\nLace-up closure. |\nEngineered double jacquard mesh upper for breathability.\nFresh Foam midsole cushioning is precision engineered to deliver an ultra-cushioned, lightweight rideLace closure ensures a secure fit. |\nMolded footbed increases comfort.', 'man\'s mans\'s men\'s mens\'s casuals sports runnings gyms regulars outdoors shoes news balances blues skys ', 789, 3, 50, 0, 'shoe-91.jpg', 'shoe-92.jpg', 'shoe-93.jpg', 'shoe-94.jpg', 'shoe-95.jpg'),
(40, 'AVANT Mens Ultra Light Running Running Shoe', 'Fit Type: Regular |\nShoe Width: Medium |\nMAXIMUM COMFORT: From rigorous running to high intensity training this shoe has got you covered. It has a soft cushioning to give the feet maximum comfort.The design ensures full comfort with spacious yet secure fit. It is lightweight and breathable with high density backing. The engineered backing across the vamp & collar provides stretch & comfort where needed |\nRUBBERISED EVA MIDSOLE: The rubberized EVA midsoles ensure flexibility and enhanced comfort for the feet. Its cushioned support and rebound properties help protect the feet from feeling hard or sharp objects on the ground and keep the wearer comfortable throughout the day. |\nERGONOMIC DESIGN: The shoe is designed to follow the footline maximising stability. The padded insole provides a cushioned support and the EVA midsole provides traction and shock absorption during locomotion. The multi layered sole construct of the shoe enhances performance and safety with every step.', 'man\'s mans\'s men\'s mens\'s casuals sports runnings gyms regulars outdoors shoes avants ultras lights grays greys', 699, 3, 50, 0, 'shoe-96.jpg', 'shoe-97.jpg', 'shoe-98.jpg', 'shoe-99.jpg', 'shoe-100.jpg'),
(41, 'Uptownie Lite Women\'s Solid High Neck Top', 'Care Instructions: Machine Wash |\r\nFit Type: Regular Fit |\r\nFabric: 40% Cotton, 60% Polyester Spandex. The fabric is very stretchy |\r\nSleeve Type: 3/4 Sleeve | Collar Style: Collarless | Fit Type: Regular Fit | Occasion Type: Casual', 'woman\'s womans\'s women\'s womens\'s casuals regulars highs necks tops clothings uptowines lites whites', 249, 2, 50, 0, 'top-01.jpg', 'top-02.jpg', 'top-03.jpg', 'top-04.jpg', 'top-05.jpg'),
(42, 'Rajnandini Women\'s Western Top', 'Care Instructions: Hand Wash Only |\r\nFit Type: Regular Fit |\r\nFabric : Polyester , Color : Pink |\r\nStyle : Bardot top | Transparency : Opaque, Pattern - solid dyed fabric without fade of colors after washing |\r\nSleeves Length : Half Sleeves , Sleeve Style - Butterfly Sleeve Cold Shoulder Top | Neck Style : Off-Shoulder |\r\nTop Length : 24 Inches | Top Size : S , Bust : 34 , Waist : 28 , Hip : 38 |\r\nPackage Contains: 1 Ready to Wear Solid Top', 'woman\'s womans\'s women\'s womens\'s casuals regulars highs necks tops clothings pinks halfs sleeves rajnandinis westerns ', 169, 2, 50, 0, 'top-06.jpg', 'top-07.jpg', 'top-08.jpg', 'top-09.jpg', 'top-10.jpg'),
(43, 'rytras Women\'s Floral Printed Cotton Top', 'Care Instructions: Machine Wash|\r\nFit Type: Regular Fit |\r\nFabric: Cotton |\r\nWash Care: Machine Wash |\r\nNeck: Mandarin Collar |\r\nStyle: Long Top |\r\nColor: White & Blue', 'woman\'s womans\'s women\'s womens\'s casuals regulars highs necks tops clothings blues rytras printeds cottons', 279, 2, 50, 0, 'top-11.jpg', 'top-12.jpg', 'top-13.jpg', 'top-14.jpg', 'top-15.jpg'),
(44, 'Women\'s Rayon Floral Print Regular Wear Top', 'Care Instructions: Hand Wash Only |\r\nFit Type: Regular Fit\r\nFabric: Rayon | Product Length : TOP 28 Inches| In Box : 1 TOP; Style Pattern: Printed and Flared | Neckline : Mandarin Collar | Sleeves: 3/4 Sleeves. |\r\nOccasion : casual festive, wear | Highlight: Fabric Stitched button attached on neck line with loops on sleeves, pompom lace attached on bottom along. |\r\nPlease check KBZ designer size chart for the garments measurements and order a garment size that is at least 1\" greater than your body measurement for the ease of putting on and taking off the garment. Size chart is given in the last of the images, first check and then Order Now. |\r\nDisclaimer : Product Colour May Slightly Vary Due to Photographic Lighting Sources, Photo Editing or Your Monitor Settings |\r\nOccasion Type: Formal | Fit Type: Regular Fit', 'woman\'s womans\'s women\'s womens\'s casuals regulars highs necks tops clothings maroons rayons', 729, 2, 50, 0, 'top-16.jpg', 'top-17.jpg', 'top-18.jpg', 'top-19.jpg', 'top-20.jpg'),
(45, 'Wedani Women\'s Casual Short Sleeves Round Neck Foral Top', 'Fit Type: Regular |\r\nFabric : Crepe |\r\nSleeve Type : Short Sleeve |\r\nStyle name: Western', 'woman\'s womans\'s women\'s womens\'s casuals regulars highs necks tops clothings wedanis\'s wedani\'s reds stylishs colorfulls', 140, 2, 50, 0, 'top-21.jpg', 'top-22.jpg', 'top-23.jpg', 'top-24.jpg', 'top-25.jpg'),
(46, 'GOD BLESS Women long length Dress', 'Fit Type: Regular Fit |\r\nOccasion : Casual and festive |\r\nStyle and pattern: Silver Chamki Printed Tops | neckline : Square Neck With Drawstring | sleeves: 3/4 sleeves |\r\nDisclaimer : there might be slight variation in the actual color of the product due to different screen resolutions | Occasion Type: Casual And Festive | Fit Type: Regular Fit | Collar Style: V Neck With Drawstring', 'woman\'s womans\'s women\'s womens\'s casuals regulars highs necks tops clothings gods bless yellows stylishs', 424, 2, 50, 0, 'top-26.jpg', 'top-27.jpg', 'top-28.jpg', 'top-29.jpg', 'top-30.jpg'),
(47, 'NAINVISH Women Top', 'Size: M-38 | Color: Blue| Material: Cotton Blend Style Type: Straight Pattern: Printed Collar Type: V-Neck Sleeve Style: Half Sleeve |\r\nUNLEASH YOUR VIBRANCE: The captivating blue hue adds a burst of vibrance to your daily and festive outfits. It\'s the perfect color to make a statement and radiate positivity. |\r\nCOMFORT REDEFINED: Crafted from a premium Cotton Blend, our top provides unparalleled comfort all day. It\'s breathable, soft against your skin, and designed to keep you at ease, even in the sweltering heat. |\r\nFLAWLESS ELEGANCE: The intricate print pattern on this top exemplifies timeless charm and sophistication. It\'s a fusion of contemporary style with traditional allure.', 'woman\'s womans\'s women\'s womens\'s casuals regulars highs necks tops clothings stylishs blues whites', 379, 2, 50, 0, 'top-31.jpg', 'top-32.jpg', 'top-33.jpg', 'top-34.jpg', 'top-35.jpg'),
(48, 'Sheetal Associates Women Casual Regular Sleeves Printed Top', 'This tops feature a soft and smooth texture, making them comfortable to wear.\r\nTops are versatile and can be worn for both casual and formal occasions. |\r\nTops are often favored for their breathability and drape, allowing for comfortable movement. |\r\nTops are popular in both traditional and contemporary fashion, making them a timeless choice. |\r\nTops can be paired with different bottom wear, such as jeans, skirts, or trousers, depending on the desired look.', 'woman\'s womans\'s women\'s womens\'s casuals regulars highs necks tops clothings yellows stylishs ', 272, 2, 50, 0, 'top-36.jpg', 'top-37.jpg', 'top-38.jpg', 'top-39.jpg', 'top-40.jpg'),
(49, 'Aphrodite Stylish Casual & Fancy Georgette Blend Top for Women', 'This Top has been stitched with standard modern style to promote your look to the most stylish lady in the party or casual visit. |\r\nThis trendy top is designed for comfort and style. |\r\nThis top is a great addition to your cool-weather wardrobe and looks great with your favourite pair of jeans for a laid-back lunch date look. |\r\nSUITABLE FOR: Casual, Party, Regular wear, Christmas, Night out, New Year, and Gifting. Elegant women top are suitable for Evening, wedding, office, school, party, club, meetings.', 'woman\'s womans\'s women\'s womens\'s casuals regulars highs necks tops clothings yellows stylishs', 499, 2, 50, 0, 'top-41.jpg', 'top-42.jpg', 'top-43.jpg', 'top-44.jpg', 'top-45.jpg'),
(50, 'A nd J Tops for Women - Fancy Soft Rayon Printed Stitched Tunics for Girls', 'Product Details: Fabric: Rayon, This Casual Attractive western top You Wear Meetings, Office, Home, Vacation, Shopping, College, Travelling, Together, Occasional, Festivals, Holidays, Special Days, Also Regular Wear. |\r\nMachine wash/ handwash this top separately. Do not bleach or wring. Dry in shade away from direct sunlight or extreme temperatures. Steam iron under low temperature for fabric care. |\r\nThis tunic is an up-to-date choice for Casual Wear or Family Functions or Events, Meetings, and Travelling. Look Perfect for the day with this top.', 'woman\'s womans\'s women\'s womens\'s casuals regulars highs necks tops clothings stylishs blues darks a and j rayons', 599, 2, 50, 0, 'top-46.jpg', 'top-47.jpg', 'top-48.jpg', 'top-49.jpg', 'top-50.jpg'),
(51, 'Vaamsi Women\'s Cotton Blend Floral Printed Straight Kurta Pant With Dupatta', 'Kurta Color- Blue, Pant Color- White, Dupatta Color- White\r\nKurta Fabric-Cotton Blend, Pant Fabric-Cotton Blend, Dupatta Fabric-Cotton Blend, 80% Polyester 20% Cotton\r\nKurta Work- Printed, Pant Work- Printed, Dupatta Work- Printed, Work Type- Floral\r\nSize Details: Bust- 40 Inches, Kurta Waist- 37 Inches, Hip- 43 Inches, Pant Waist- 32 Inches\r\nPackage Contains- 1 X Kurta | 1 X Pant | 1 X Dupatta', 'clothings womens salwars suits cottons printeds duppatas colorfulls blues ', 699, 5, 50, 0, 'salwar_suit_01.jpg', 'salwar_suit_02.jpg', 'salwar_suit_03.jpg', 'salwar_suit_04.jpg', 'salwar_suit_05.jpg'),
(52, 'Royal Export Women\'s Cotton Salwar Suit Set', 'Set Fabric: Cotton || Occasion : Festival & Parties\r\nSet Include : 1 Kurta, 1 Bottom & Dupatta\r\nLength: Calf || Sleeves: 3/4th\r\nOcassion: Traditional wear, Casual Wear, party wear, evening wear,Please Click On Brand Name \"Royal Export\" For More Products.\r\nProduct Color May Slightly Vary Due To Photographic Lighting Sources Or Your Monitor Settings', 'clothings womens blues colorfulls salwars suits cottons printeds', 719, 5, 50, 0, 'salwar_suit_06.jpg', 'salwar_suit_07.jpg', 'salwar_suit_08.jpg', 'salwar_suit_09.jpg', 'salwar_suit_10.jpg'),
(53, 'KGF Fashions Rayon Printed Gotta Work Anarkali Kurta Palazzo Dupatta Set For Women', 'Package Contents:- One Anarkali Gown || One Palazzo || One Dupatta\r\nRound Neckline || 3/4 Regular Sleeves\r\nFull Printed Dupatta\r\nOccasion: Party Wear/Festive Wear\r\nColour Declaration : There might be slight variation in the actual color of the product due to different screen resolutions.', 'womens clothings salwars suits fashions printeds marrons blues', 999, 5, 50, 0, 'salwar_suit_11.jpg', 'salwar_suit_12.jpg', 'salwar_suit_13.jpg', 'salwar_suit_14.jpg', 'salwar_suit_15.jpg'),
(54, 'KLOSIA Women Printed kurta and pant Set With Dupatta', '★ Fit Type: Straight; Salwar Suits : Straight Kurta Pant and printed Dupatta Set\r\n★ Product Material :- Viscose || Colour :- Maroon || Pattern :- Printed\r\n★ Style :- Straight Kurta || Sleeve Length :- 3/4 Sleeve || Bottom :- Pant || Dupatta :- Chanderi (Printed)\r\n★ Sizes :- S,M,L,XL,XXL (All Ragular Size Avalible)\r\n★Occasion :- Casual ,Office wear ,Party ,Wedding , Ragular & Festive', 'women fashions clothings duppatas salwars suits reds marrons ', 699, 5, 50, 0, 'salwar_suit_16.jpg', 'salwar_suit_17.jpg', 'salwar_suit_18.jpg', 'salwar_suit_19.jpg', 'salwar_suit_20.jpg'),
(55, 'ANNI DESIGNER Women\'s Cotton Blend Straight Printed Kurta with Pant & Dupatta', 'Kurta Set Fabric: Cotton Blend || Kurta Set Color :- Pink\r\nStyle: Straight || Length: Calf Length || Sleeves: 3/4 || Size Chart- Kurta-S-36 in, M-38 in , L-40 in , XL-42 in , XXL-44 in\r\nThis set includes: 1 Kurta with 1 Pant & 1 Dupatta || Work : Printed || Neck Style:- Round Neck\r\nOcassion: Traditional wear, Casual Wear, party wear, evening wear,Please Click On Brand Name \"ANNI DESIGNER\" For More Products.\r\nProduct Color May Slightly Vary Due To Photographic Lighting Sources Or Your Monitor Settings', 'womens salwars suits duppatas printeds fashions pinks', 489, 5, 50, 0, 'salwar_suit_21.jpg', 'salwar_suit_22.jpg', 'salwar_suit_23.jpg', 'salwar_suit_24.jpg', 'salwar_suit_25.jpg'),
(56, 'GoSriKi Women\'s Cotton Blend Straight Printed Kurta with Pant & Dupatta', 'Kurta Set Fabric: Cotton Blend || Kurta Set Color :- Pista\r\nStyle: Straight || Length: Calf Length || Sleeves: 3/4 Sleeves || Size Chart- Kurta-S-36 in, M-38 in , L-40 in , XL-42 in , XXL-44 in,Pant :- S-28 in, M-30 in , L-32 in, XL- 34 in , XXL- 36 in,For More Please refer to the size Chart below.\r\nThis set includes: 1 Kurta and 1 Pant with Dupatta || Work :- Printed || Neck Style:- Round Neck\r\nColour Declaration : There might be slight variation in the actual color of the product due to different screen resolutions.\r\nOcassion: Traditional wear, Casual Wear, party wear, evening wear,Please Click On Brand Name \"GoSriKi\" For More Products.\r\n', 'womens salwars suits cottons duppatas printeds fashions greens', 689, 5, 50, 0, 'salwar_suit_26.jpg', 'salwar_suit_27.jpg', 'salwar_suit_28.jpg', 'salwar_suit_29.jpg', 'salwar_suit_30.jpg'),
(57, 'GoSriKi Women\'s Cotton Blend Straight Printed Kurta with Pant & Dupatta', 'Kurta Set Fabric: Cotton Blend || Kurta Set Color :- Purple\r\nStyle: Straight || Length: Calf Length || Sleeves: 3/4 Sleeves || Size Chart- Kurta-S-36 in, M-38 in , L-40 in , XL-42 in , XXL-44 in,Pant :- S-28 in, M-30 in , L-32 in, XL- 34 in , XXL- 36 in\r\nThis set includes: 1 Kurta and 1 Pant with Dupatta || Work :- Printed || Neck Style:- Round Neck\r\nOcassion: Traditional wear, Casual Wear, party wear, evening wear,Please Click On Brand Name \"GoSriKi\" For More Products.\r\nProduct Color May Slightly Vary Due To Photographic Lighting Sources Or Your Monitor Settings', 'womens salwars suits cottons duppatas printeds fashions purples violets', 689, 5, 50, 0, 'salwar_suit_31.jpg', 'salwar_suit_32.jpg', 'salwar_suit_33.jpg', 'salwar_suit_34.jpg', 'salwar_suit_35.jpg'),
(58, 'Fashion Basket Women\'s Straight Georgette Red Salwar Suit Set', 'Top Color : Red || Bottom Color : Red || Duptta Color : Red|| Inner Color : Red\r\nTop Color : Red || Bottom Color : Red || Duptta Color : Red|| Inner Color : Red\r\nTop Length : 40 ( Inch ) ||Top Width Size : 28 ( Inch ) || Bottom Length : 2.2 MTR || Duptta Length : 2.25 MTR|| Inner Length : NA\r\nTop Work : Plain ||Bottom Work : Plain || Duptta Work : Lace || Sleeve Style : Full sleeve|| Neck Style : Round Neck\r\nWash Care: Dry clean for the first wash, there after hand wash', 'womens salwars suits cottons duppatas printeds fashions marrons reds', 569, 5, 50, 0, 'salwar_suit_36.jpg', 'salwar_suit_37.jpg', 'salwar_suit_38.jpg', 'salwar_suit_39.jpg', 'salwar_suit_40.jpg'),
(59, 'GoSriKi Women\'s Cotton Blend Anarkali Floral Printed Kurta with Pant & Dupatta', 'Kurta and Pant Fabric: Cotton Blend || Dupatta Fabric :- Organza || Kurta Set Color :- Black\r\nStyle: Anarkali || Length: Calf Length || Sleeves: 3/4 || Dupatta Length :- 2 Mtr\r\nThis set includes: 1 Kurta and 1 Pant with Dupatta || Work :- Printed || Neck Style:- Round Neck\r\nOcassion: Traditional wear, Casual Wear, party wear, evening wear,Please Click On Brand Name \"GoSriKi\" For More Products.\r\nProduct Color May Slightly Vary Due To Photographic Lighting Sources Or Your Monitor Settings', 'womens\'s woman\'s womens salwars suits cottons duppatas printeds fashions browns darks ', 678, 5, 50, 0, 'salwar_suit_41.jpg', 'salwar_suit_42.jpg', 'salwar_suit_43.jpg', 'salwar_suit_44.jpg', 'salwar_suit_45.jpg'),
(60, 'ROYAL EXPORT Women\'s Tunic Shirt', 'Fabric : Cotton | Premium Quality: Our fabric is made from high-quality materials for durability and longevity.\r\nWash Care : Dry Clean Only | Use the Right Water Temperature: Pay attention to the recommended water temperature on the care label. Cold water is often best for delicate items, while warmer water can be used for sturdier fabrics.\r\nPattern : Anarkali | Trendy and Fashionable: Stay ahead of the latest style trends.\r\nColour : White | Rich Color Selection: Choose from a wide spectrum of vibrant shades.\r\nOccasion :Festival & Celebration Wear | Perfect for Special Occasions: Ideal for celebrating life\'s milestones. Elegant Ethnic Wear: Perfect for traditional occasions.', 'woman\'s womens\'s womens salwars suits cottons duppatas printeds fashions whites', 999, 5, 50, 0, 'salwar_suit_46.jpg', 'salwar_suit_47.jpg', 'salwar_suit_48.jpg', 'salwar_suit_49.jpg', 'salwar_suit_50.jpg'),
(61, 'American Tourister Valex 28 Ltrs Large Laptop Backpack with Bottle Pocket and Front Organizer- Black', 'ManufacturerEXPERTS, China\r\nPackerChina\r\nImporterImporter Name ltd., Street No. 24/4, New Delhi, India - 110011, Contact: +91-111-000-2400, service@importer.com\r\nItem Weight510 g\r\nItem Dimensions LxWxH20 x 32.5 x 47.5 Centimeters\r\nNet Quantity1 Count\r\nGeneric NameBACKPACK', 'bag\'s bags\'s americans touristers laptops bagpacks bottles pockets', 1119, 6, 50, 4.7, 'bag_01.jpg', 'bag_02.jpg', 'bag_03.jpg', 'bag_04.jpg', 'bag_05.jpg'),
(62, 'NORTH ZONE Lightweight school bags Backpacks for Boys Girls Stylish men and women Casual Travel Laptop Bag College office', 'COMPATIBLE WITH 15.6 INCH LAPTOP”: The Northzone Backpack fits up to 15.6 inch laptop. Dimensions: 34cm x 15cm x 45.5cm; Weight: 499g\r\nHIGH QUALITY, DURABLE AND WATER REPELLANT FABRIC”: This backpack features in durable snow yarn polyester fabric and streamlined design with a padded interior to protect notebooks and important items\r\nCONVENIENT TRAVEL\" Adjustable shoulder strap and padded laptop compartment together with a quilted back panel make it comfortable for all-day use\r\nCONVENIENTLY PLACED PADDED LAPTOP COMPARTMENTS AND POCKETS: The padded interior helps protect notebooks and important items. Quick access zippered front pocket for added storage. A quilted back panel make it comfortable for all-day use.\r\nHIGH QUALITY, CASUAL YET STYLISH DESIGN\": very attractive and perfect for school, travel and outdoor activities. The perfect backpack for those needing stylish all-day protection for their laptop', 'bag\'s bags\'s schools colleges travels backpacks fors boys girls stylishs laptops darks blues', 614, 6, 50, 0, 'bag_06.jpg', 'bag_07.jpg', 'bag_08.jpg', 'bag_09.jpg', 'bag_10.jpg'),
(63, 'Stylbase Waterproof Lightweight Laptop Bag with 20L Capacity and 3 Compartments - Ideal for Travel, Office, and School Use', 'Lightweight design makes it easy to carry around for daily commutes or travel without adding extra bulk or weight.\r\nPadded laptop compartment protects your laptop from scratches and bumps during transport, and can hold laptops up to 15 inches in size.\r\nMultiple compartments and pockets provide ample storage space for accessories, such as power cords, phones, and notebooks, making it easy to stay organized.\r\nDurable materials such as water-resistant nylon ensure the bag withstands daily wear and tear, and helps keep your belongings safe from the elements.\r\nWith its sleek and minimalist design, this laptop bag is a stylish and practical choice for students, professionals, and anyone who needs to transport their laptop with ease.', 'bag\'s bags\'s schools colleges travels backpacks fors boys girls stylishs laptops blacks skybags waterproofs', 400, 6, 50, 0, 'bag_11.jpg', 'bag_12.jpg', 'bag_13.jpg', 'bag_14.jpg', 'bag_15.jpg'),
(64, 'LARGE 60L TRAVEL BACKPACK FOR OUTDOOR SPORT HIKING TREKKING BAG CAMPING RUCKSACK', 'strong\r\nperfect design\r\nbest quality\r\neasy to use\r\nlow weight', 'bag\'s bags\'s schools colleges travels backpacks fors boys girls stylishs laptops darks blues trekkings trakkings', 500, 6, 50, 0, 'bag_16.jpg', 'bag_17.jpg', 'bag_18.jpg', 'bag_19.jpg', 'bag_20.jpg'),
(65, 'Half Moon Valex Unisex School Bag/ 15.6 inch Laptop Backpack/College Bagpack/Office Back Packed | Laptop Bag for Men Women', 'Trendy Design: The Laptop bag for men features a unique, trendy design that makes it stand out from other laptop backpacks. It\'s perfect for individuals who want to express their style while carrying their laptop.\r\nSecure Laptop Compartment: The 17-inch padded compartment in laptop backpack for men / Laptop bag for men provides secure storage for your device. The padding ensures that your laptop is protected from scratches and bumps while you\'re on the move.\r\nFront Pockets: The small pockets in College Bags for men / College bag for women in Second Compartment provide easy access to smaller items like your phone, wallet, and keys. These pockets are convenient and ensure that you don\'t have to dig through the main compartment to find what you need.\r\nStrong Built: The Laptop bag for men is built with strong zippers and stitching that can withstand daily wear and tear. This ensures that your belongings are kept safe and secure in college bag for girls and the backpack for men can hold up to daily use.', 'bag\'s bags\'s schools offices colleges travels backpacks fors boys girls stylishs laptops darks blacks ', 649, 6, 50, 0, 'bag_21.jpg', 'bag_22.jpg', 'bag_23.jpg', 'bag_24.jpg', 'bag_25.jpg'),
(66, 'Zipline Unisex casual polyester 36 L Backpack School Bag Women Men Boys Girls children Daypack College Bag', 'A super-slim backpack for men/backpack for women design, trendy looks and durable construction, this stylish school bags for boys / school bag for girls from ZIPLINE has got everything that will complement your youthful personality. With this college bags for mens has spacious interiors, this college bag for boys / college bag for women is a great option for short road trips, college. this medium college bag for boys / bag for girls is sturdy enough to withstand regular wear and tear gracefully.\r\nZipline backpack for men features a cushioned base & internal back padding to offer you extra comfort. The padded shoulder straps of this school bags for boys/college bag for boys can be easily adjusted according to your liking. Spacious college bags for men is featuring with 4 pockets & 3 main compartments, all with speciality zippers, this backpack for men stylish offers you enough space to carry your books, files, coins, travel accessories, stationery, keys and mobile accessories.\r\nLightweight yet durable school bags for boys/boys bag for school use or everyday outings Ideal as a Casual Backpack, Casual Daypack, School Bags, College Bag, Laptop Bag, Travel Bag, Luggage Bag & Trekking Bag.', 'bag\'s bags\'s schools offices colleges travels backpacks fors boys girls stylishs laptops darks blues', 843, 6, 50, 0, 'bag_26.jpg', 'bag_27.jpg', 'bag_28.jpg', 'bag_29.jpg', 'bag_30.jpg'),
(67, 'Skybags CAMPUS GREY LOGO PRINT COLLEGE LAPTOP BACKPACK 30L', '2 Spacious Main Compartments 1 Front Vertical Slip In Pocket Rain Cover 15.6\" Laptop Comaptible Secret Pocket on the side Organizer with Key Holder Both Side Water Bottle Pocket Built to last 10 MM shoulder straps 1 slip in pocket in the front compartment', 'bag\'s bags\'s schools offices colleges travels backpacks fors boys girls stylishs laptops grays greys', 1623, 6, 50, 0, 'bag_31.jpg', 'bag_32.jpg', 'bag_33.jpg', 'bag_34.jpg', 'bag_35.jpg'),
(68, 'Safari Small Size 15 Ltrs Unisex Casual Backpack - Sea Blue', 'Outer Material: Polyester, Color: Sea Blue\r\nNot water resistant. With Rain Cover:No\r\nCapacity: 15 liters; Weight: 200 grams; Dimensions: 12 cms x 27 cms x 41 cms (LxWxH)\r\nNumber of compartments: 2; Laptop Compatibility: No\r\nAge Range Description: Kid; Closure Type: Drawstring; Pocket Description: Utility Pocket\r\nDrawstring, 2 Compartments, Compact Siz', 'bag\'s bags\'s schools offices colleges travels backpacks fors boys girls stylishs laptops lights blues safaris', 321, 6, 50, 0, 'bag_36.jpg', 'bag_37.jpg', 'bag_38.jpg', 'bag_39.jpg', 'bag_40.jpg'),
(69, 'American Tourister Spin 49 cms Navy Laptop Backpack', 'Outer Material: Polyester, Color: Navy\r\nCapacity: 29 liters; Weight: 500 grams; Dimensions: 33 cms x 28 cms x 49 cms (LxWxH)\r\nNumber of compartments: 2\r\nLaptop Compatibility: Yes, Laptop Size: 15 inchesStrap Type: Adjustable\r\nWarranty type: Manufacturer; 1 year manufacturer warranty is non-transferable and valid for 1 year from the original date of purchase', 'bag\'s bags\'s schools offices colleges travels backpacks fors boys girls stylishs laptops darks blues', 1699, 6, 50, 0, 'bag_41.jpg', 'bag_42.jpg', 'bag_43.jpg', 'bag_44.jpg', 'bag_45.jpg'),
(70, 'Skybags One Size Brat Black 46 Cms Casual Backpack', 'Combination of functional & safety features in stylish design, Soft mesh back with 8 mm foam padded 2 Main Compartment, 1 Slip In Pocket inside the bag, Printed Design, Mesh bottle holder on the side,\r\nWater Resistance Level: Not Water Resistant\r\nSize: 35 x 13 x 46 cms', 'bag\'s bags\'s schools offices colleges travels backpacks fors boys girls stylishs laptops darks blacks', 199, 6, 50, 0, 'bag_46.jpg', 'bag_47.jpg', 'bag_48.jpg', 'bag_49.jpg', 'bag_50.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `queries`
--

CREATE TABLE `queries` (
  `query_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_no` varchar(10) NOT NULL,
  `query_mssg` text NOT NULL,
  `timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `queries`
--

INSERT INTO `queries` (`query_id`, `username`, `email`, `phone_no`, `query_mssg`, `timestamp`) VALUES
(1, 'Rabi Jha', 'rabi@rj.com', '7412035689', 'What is your return policy?', '2023-11-16 18:32:41'),
(2, 'Rahul Prasad Yadav', 'rahul@rpy.com', '1236547809', 'Are return shipping costs covered by the customer or your company?', '2023-11-16 18:33:18'),
(3, 'Roshan Singh', 'roshan@rs.com', '1265893470', 'Hello Fashion Hub Team, I\'m located outside the country and interested in your products. Could you provide details on international shipping, including costs and delivery times?', '2023-11-16 18:35:42'),
(4, 'Dhanraj Dwivedi', 'dd@dd.com', '4563210897', 'Hi Fashion Hub Team, I recently made a purchase and wanted to share my feedback. Additionally, I have some suggestions for improvement. How can I share this with your team?', '2023-11-16 18:37:15'),
(5, 'Rabi Jha', 'rabi@rj.com', '7412589635', 'Hi Fashion Hub Team . This is a test mssg', '2023-11-21 10:06:36');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `rating_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `review` text NOT NULL,
  `timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`rating_id`, `user_id`, `product_id`, `rating`, `review`, `timestamp`) VALUES
(1, 1, 61, 5, 'Highly Reccomended', '2023-11-21 10:00:34'),
(2, 1, 1, 4, 'Good Product', '2023-11-21 10:00:53'),
(3, 1, 2, 1, 'Very Bad !\r\n', '2023-11-21 10:01:10'),
(4, 4, 61, 5, 'Nice Product. Must Try!', '2023-11-21 10:02:48'),
(5, 4, 1, 3, 'GOod\r\n', '2023-11-21 10:03:02'),
(6, 6, 61, 4, 'Nice Product', '2023-11-21 10:16:33'),
(7, 6, 3, 5, 'Quality is good\r\n', '2023-11-21 10:16:47'),
(8, 6, 2, 4, 'Nice', '2023-11-21 10:17:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_pic` varchar(255) NOT NULL,
  `user_phone_no` varchar(10) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `zip_code` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_email`, `user_password`, `user_pic`, `user_phone_no`, `city`, `zip_code`, `state`, `created`) VALUES
(1, 'Shubham', 'shubham@sv.com', 'adminshubham', 'user_pic.jpg', '', 'kolkata', '', '', '2023-11-21 09:56:47'),
(2, 'Sayan', 'sayan@ss.com', 'adminsayan', 'businessman-character-avatar-isolated_24877-60111.avif', NULL, NULL, NULL, NULL, '2023-11-21 09:57:13'),
(3, 'Dhanraj', 'dhanraj@dd.com', 'admindhanraj', 'profile_pic_sukuna.jfif', NULL, NULL, NULL, NULL, '2023-11-21 09:57:36'),
(4, 'Rahul', 'rahul@ry.com', 'adminrahul', 'photo-1633332755192-727a05c4013d.avif', NULL, NULL, NULL, NULL, '2023-11-21 09:58:07'),
(5, 'Rabi', 'rabi@rj.com', 'adminrabi', 'IMG_20230429_200417423_BURST001_COMP (1).jpg', NULL, NULL, NULL, NULL, '2023-11-21 09:58:24'),
(6, 'Roshan', 'roshan@rs.com', 'adminroshan', 'IMG-20230409-WA0153.jpg', NULL, NULL, NULL, NULL, '2023-11-21 10:15:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `queries`
--
ALTER TABLE `queries`
  ADD PRIMARY KEY (`query_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`rating_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `queries`
--
ALTER TABLE `queries`
  MODIFY `query_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
