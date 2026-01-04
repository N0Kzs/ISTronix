-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2024 at 09:27 AM
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
-- Database: `bad_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_password`, `admin_email`, `admin_date`) VALUES
(1, 'BAD', '123', 'BAD123@wvsu.edu.ph', '2024-05-28');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(50) NOT NULL,
  `c_description` varchar(250) NOT NULL,
  `c_date` date NOT NULL,
  `c_img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`c_id`, `c_name`, `c_description`, `c_date`, `c_img`) VALUES
(8, 'Mobile Phones', 'High specs mobile phones for gaming and high quality camera for taking photos', '2024-05-30', 'androidphones-2048px-0803.jpg'),
(9, 'Monitors', 'HD monitors to satisfy your desire for a high quality resolution\"', '2024-05-30', '4kmonitors-2048px-9794.jpg'),
(10, 'Mouse', 'For high performance gaming!', '2024-05-30', 'wirelessmouse-2048px-7423.jpg'),
(11, 'Keyboards', 'Mechanical keyboards for that satisfying clicks!', '2024-05-30', 'mechanicalkeyboards-2048px-1360-1.jpg'),
(12, 'Desktop Setup', 'For a high performance gaming experience and high quality video and images editing!', '2024-05-30', 'maxresdefault.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `in_id` int(11) NOT NULL,
  `in_date` date NOT NULL,
  `in_priceTotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`in_id`, `in_date`, `in_priceTotal`) VALUES
(1, '2024-05-29', 96000),
(2, '2024-05-30', 660000),
(14, '2024-05-31', 162000),
(15, '2024-05-31', 75000),
(16, '2024-05-31', 120000),
(17, '2024-05-31', 87000),
(18, '2024-05-31', 3240000);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `o_id` int(11) NOT NULL,
  `o_date` date NOT NULL,
  `o_quantity` int(25) NOT NULL,
  `o_prize` double NOT NULL,
  `u_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `in_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`o_id`, `o_date`, `o_quantity`, `o_prize`, `u_id`, `p_id`, `in_id`) VALUES
(1, '2024-05-29', 1, 87000, 1, 46, 1),
(2, '2024-05-29', 1, 9000, 1, 23, 1),
(3, '2024-05-30', 12, 540000, 3, 28, 2),
(4, '2024-05-30', 1, 120000, 3, 36, 2),
(13, '2024-05-31', 1, 75000, 1, 47, 14),
(14, '2024-05-31', 1, 87000, 1, 46, 14),
(15, '2024-05-31', 1, 75000, 1, 47, 15),
(16, '2024-05-31', 1, 60000, 1, 48, 16),
(17, '2024-05-31', 1, 60000, 1, 54, 16),
(18, '2024-05-31', 1, 87000, 1, 46, 17),
(19, '2024-05-31', 2, 240000, 1, 37, 18),
(20, '2024-05-31', 15, 3000000, 1, 38, 18);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `p_specs` varchar(250) NOT NULL,
  `p_price` double NOT NULL,
  `p_quantity` int(50) NOT NULL,
  `p_img` varchar(250) NOT NULL,
  `p_description` varchar(250) NOT NULL,
  `c_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `p_name`, `p_specs`, `p_price`, `p_quantity`, `p_img`, `p_description`, `c_id`) VALUES
(5, 'Logitech G Pro X Superlight', ' Wireless, 25K DPI sensor', 7000, 12, '6657567c0659a.jpg', 'An ultra-lightweight wireless gaming mouse with a 25K DPI sensor, offering precision and speed for competitive gaming.', 10),
(6, 'Razer DeathAdder V2', ' Wired, 20K DPI sensor', 3500, 32, '665756bda14f1.jpg', 'A popular wired gaming mouse with a 20K DPI sensor and ergonomic design, ensuring comfort and accuracy during gameplay.', 10),
(7, 'SteelSeries Rival 600', 'Wired, Dual sensor', 4000, 21, '665756f366358.jpg', 'Features a dual sensor system for accurate tracking, customizable weights, and a comfortable design for gaming.', 10),
(8, 'Corsair Dark Core RGB Pro', 'Wireless, 18K DPI sensor', 5000, 10, '665757584f07c.jpg', 'A wireless gaming mouse with an 18K DPI sensor, customizable RGB lighting, and ergonomic design for extended use', 10),
(9, 'Zowie EC2', 'Wired, 3360 sensor', 4500, 20, '6657578725c30.jpg', 'A simple and effective wired gaming mouse with a 3360 sensor, known for its reliability and performance in esports', 10),
(10, 'Glorious Model O', 'Wired, 12K DPI sensor', 3000, 0, '665757c0ca1a2.jpg', 'A lightweight gaming mouse with a 12K DPI sensor and a honeycomb design, providing comfort and speed for fast-paced gaming.', 10),
(11, 'Roccat Kone AIMO', 'Wired, 16K DPI sensor', 3800, 37, '665757f557533.jpg', 'Features a 16K DPI sensor, customizable buttons, and AIMO RGB lighting, offering a personalized gaming experience', 10),
(12, 'HyperX Pulsefire FPS Pro', 'Wired, 16K DPI sensor', 3200, 42, '665758228e4cd.jpg', 'A wired gaming mouse with a 16K DPI sensor, RGB lighting, and an ergonomic design for comfortable use during long gaming sessions.', 10),
(13, 'Asus ROG Gladius II', 'Wired, 12K DPI sensor', 4200, 21, '66575b1426069.jpg', 'The Asus ROG Gladius II features a 12K DPI sensor and customizable buttons, offering flexibility and precision for gamers.', 10),
(14, 'Cooler Master MM720', 'Wired, 16K DPI sensor', 3000, 21, '66575b4e07bf2.jpg', 'The Cooler Master MM720 is a lightweight wired mouse with a 16K DPI sensor, designed for agility and speed in gaming.', 10),
(15, 'Logitech G915 TKL', 'Wireless, Mechanical, RGB', 12000, 22, '66575cb2b7b92.jpg', 'A compact, wireless mechanical keyboard with customizable RGB lighting and low-profile switches, offering a premium typing experience.\r\n', 11),
(16, 'Razer Huntsman Elite', 'Wired, Optical switches, RGB', 10000, 18, '66575cec5e366.jpg', 'Features optical switches for fast actuation, customizable RGB lighting, and a comfortable wrist rest for extended use.', 11),
(17, 'Corsair K95 RGB Platinum XT', 'Wired, Mechanical, RGB', 11000, 39, '66575d3935a17.jpg', 'A high-end mechanical keyboard with customizable RGB lighting, dedicated macro keys, and a durable aluminum frame.\r\n', 11),
(18, 'SteelSeries Apex Pro', 'Wired, Mechanical, RGB', 10500, 7, '66575d83e1663.jpg', 'Offers adjustable mechanical switches, customizable RGB lighting, and an OLED smart display for a tailored gaming experience.', 11),
(19, 'HyperX Alloy FPS Pro', 'Wired, Mechanical, RGB', 5000, 25, '66575db9048a8.jpg', 'A compact mechanical keyboard with customizable RGB lighting and a sturdy design, ideal for FPS gamers', 11),
(20, 'Ducky One 2 Mini', ' Wired, Mechanical, RGB', 7000, 17, '66575dfb2c35b.jpg', 'A 60% mechanical keyboard with customizable RGB lighting and high-quality switches, popular among enthusiasts and gamers', 11),
(21, 'Cooler Master MK730', ' Wired, Mechanical, RGB', 6000, 26, '66575e36980c3.jpg', 'A tenkeyless mechanical keyboard with customizable RGB lighting and Cherry MX switches, offering a compact and reliable option.\r\n', 11),
(22, 'Asus ROG Strix Scope', 'Wired, Mechanical, RGB', 8000, 5, '66575e605051f.jpg', 'Features mechanical switches, customizable RGB lighting, and an extra-wide Ctrl key, designed for FPS gamers.', 11),
(23, 'Roccat Vulcan 120 AIMO', ' Wired, Mechanical, RGB', 9000, 19, '66575e920d155.jpg', 'A mechanical keyboard with unique Titan switches, customizable AIMO RGB lighting, and a stylish aluminum top plate.', 11),
(24, 'Logitech G Pro X', ' Wired, Mechanical, RGB', 7500, 34, '66575ecebb13c.jpg', 'A professional-grade mechanical keyboard with swappable switches, customizable RGB lighting, and a compact design for esports.', 11),
(25, 'LG UltraGear 27GN950', '27-inch 4K, 144Hz, Nano IPS', 50000, 15, '6657600587006.jpg', 'A top-tier gaming monitor with a 27-inch 4K Nano IPS display, 144Hz refresh rate, and 1ms response time, providing stunning visuals and smooth gameplay.\r\n', 9),
(26, 'Samsung Odyssey G7', ' 32-inch QHD, 240Hz, VA panel', 38000, 10, '665760409793b.jpg', 'Features a 32-inch QHD display with a 240Hz refresh rate and a curved VA panel, offering immersive and fluid gaming experiences.', 9),
(27, 'ASUS ROG Swift PG279Q', '27-inch QHD, 165Hz, IPS', 40000, 9, '6657607e2cd58.jpg', 'A 27-inch QHD gaming monitor with a 165Hz refresh rate and IPS technology, ensuring fast response times and vivid colors.', 9),
(28, 'Dell UltraSharp U2720Q', ' 27-inch 4K, IPS', 45000, -9, '665760aecd873.jpg', 'Offers a 27-inch 4K IPS display with excellent color accuracy and USB-C connectivity, ideal for professional use and creative work.', 9),
(29, 'Acer Predator X34', '34-inch QHD, 100Hz, IPS', 65000, 5, '665760e08496b.jpg', 'A 34-inch curved QHD monitor with a 100Hz refresh rate and IPS technology, providing an ultra-wide, immersive gaming experience.\r\n', 9),
(30, 'BenQ PD3220U', '32-inch 4K, IPS, HDR', 55000, 17, '665761431fc9a.jpg', 'Features a 32-inch 4K IPS display with HDR support, delivering exceptional color accuracy and clarity for creative professionals.', 9),
(31, 'MSI Optix MAG272CQR', '27-inch QHD, 165Hz, Curved', 30000, 30, '665761784e08a.jpg', 'A 27-inch curved QHD monitor with a 165Hz refresh rate, offering a smooth and immersive gaming experience.\r\n', 9),
(32, 'ViewSonic Elite XG270QG', '27-inch QHD, 165Hz, IPS', 35000, 19, '665761b0554ad.jpg', 'Combines a 27-inch QHD display with a 165Hz refresh rate and IPS technology, providing excellent color reproduction and fluid gameplay.\r\n', 9),
(33, 'Gigabyte AORUS FI27Q-P', '27-inch QHD, 165Hz, IPS', 36000, 3, '665761e84905e.jpg', 'Offers a 27-inch QHD IPS display with a 165Hz refresh rate, perfect for gaming with vibrant colors and fast response times.\r\n', 9),
(34, 'HP Omen X 27', '27-inch QHD, 240Hz, TN panel', 40000, 10, '665762173eb53.jpg', 'A 27-inch QHD monitor with a 240Hz refresh rate and a TN panel, providing ultra-fast response times ideal for competitive gaming', 9),
(36, 'Dell XPS Tower', 'Processor: Intel Core i7-12700K (12 cores, up to 5.0 GHz) Memory: 32GB DDR4 RAM (3200MHz) Storage: 1TB NVMe SSD + 2TB HDD Graphics: NVIDIA GeForce RTX 3080 (10GB GDDR6X) Cooling: Air cooling Operating System: Windows 11 Home', 120000, 2, '665763f4b2877.jpg', 'A powerful desktop designed for high performance, featuring an Intel Core i7-12700K processor and 32GB of RAM for smooth multitasking. The RTX 3080 GPU ensures excellent graphics performance, making it ideal for gaming, video editing, and other deman', 12),
(37, 'HP Omen 30L', 'Processor: Intel Core i7-12700K (12 cores, up to 5.0 GHz) Memory: 16GB DDR4 RAM (3200MHz) Storage: 1TB NVMe SSD Graphics: NVIDIA GeForce RTX 3070 (8GB GDDR6) Cooling: Liquid cooling Operating System: Windows 11 Home', 120000, 3, '6657645ce8a1b.jpg', 'Combines the power of an i7-12700K processor with 16GB of RAM and an RTX 3070 GPU, providing excellent performance for gaming and creative work. The liquid cooling system keeps the system running efficiently under heavy loads.', 12),
(38, 'Alienware Aurora R13', 'Processor: Intel Core i9-12900K (16 cores, up to 5.2 GHz) Memory: 32GB DDR5 RAM (4800MHz) Storage: 2TB NVMe SSD + 2TB HDD Graphics: NVIDIA GeForce RTX 3090 (24GB GDDR6X) Cooling: Advanced liquid cooling Operating System: Windows 11 Pro', 200000, -13, '6657649ec3a93.jpg', 'A top-of-the-line desktop featuring an i9-12900K processor, 32GB of DDR5 RAM, and an RTX 3090 GPU. It’s a powerhouse for gaming, 3D rendering, and heavy-duty tasks, with advanced liquid cooling to maintain optimal performance.', 12),
(39, 'Corsair Vengeance a7200', 'Processor: AMD Ryzen 9 5900X (12 cores, up to 4.8 GHz) Memory: 32GB DDR4 RAM (3600MHz) Storage: 1TB NVMe SSD + 2TB HDD Graphics: NVIDIA GeForce RTX 3080 (10GB GDDR6X) Cooling: Liquid cooling Operating System: Windows 11 Home', 150000, 8, '665764efa7337.jpg', 'A high-performance desktop with a Ryzen 9 5900X processor and 32GB of RAM, ideal for gaming and content creation. The RTX 3080 GPU ensures stunning graphics, and the liquid cooling system helps keep the system cool during intense use.', 12),
(40, 'MSI Trident X', 'Processor: Intel Core i9-11900K (8 cores, up to 5.3 GHz) Memory: 16GB DDR4 RAM (3200MHz) Storage: 1TB NVMe SSD Graphics: NVIDIA GeForce RTX 3080 (10GB GDDR6X) Cooling: Silent Storm Cooling 3 Operating System: Windows 11 Home', 145000, 6, '66576531052e9.jpg', 'A compact yet powerful gaming desktop with an i9-11900K processor, 16GB of RAM, and an RTX 3080 GPU. The Silent Storm Cooling 3 system ensures efficient heat dissipation, making it perfect for high-performance gaming in a small form factor.', 12),
(41, 'Asus ROG Strix GA35', 'Processor: AMD Ryzen 9 5900X (12 cores, 3.7GHz base, up to 4.8GHz Turbo Boost) Memory: 32GB DDR4 RAM (3600MHz) Graphics: NVIDIA GeForce RTX 3080 (10GB GDDR6X) Storage: 1TB NVMe SSD + 2TB HDD Operating System: Windows 11 Home', 160000, 5, '66576613b0fe3.jpg', 'Designed for serious gaming and multitasking, this desktop combines a Ryzen 9 5900X processor with 32GB of RAM and an RTX 3080 GPU. The dual storage setup provides both speed and ample space for games and files.', 12),
(42, 'Lenovo Legion Tower 7i', 'Processor: Intel Core i9-11900K (8 cores, 3.5GHz base, up to 5.3GHz Turbo Boost) Memory: 32GB DDR4 RAM (3200MHz) Graphics: NVIDIA GeForce RTX 3080 (10GB GDDR6X) Storage: 1TB NVMe SSD + 2TB HDD Operating System: Windows 11 Home', 140000, 14, '6657664e161b3.jpg', 'Featuring an i9-11900K processor, 32GB of RAM, and an RTX 3080 GPU, this desktop offers powerful performance for gaming and productivity. Its robust configuration ensures it can handle intensive tasks and large files with ease.', 12),
(44, ' NZXT Streaming PC', 'Processor: Intel Core i7-12700K (12 cores, 3.6GHz base, up to 5.0GHz Turbo Boost) Memory: 16GB DDR4 RAM (3200MHz) Graphics: NVIDIA GeForce RTX 3070 (8GB GDDR6) Storage: 1TB NVMe SSD Operating System: Windows 11 Home', 135000, 17, '6657679d1143d.jpg', 'Designed specifically for streaming and gaming, this PC features an i7-12700K processor, 16GB of RAM, and an RTX 3070 GPU. It delivers reliable and powerful performance, ensuring smooth gameplay and high-quality streams.', 12),
(45, 'CyberPowerPC Gamer Supreme', 'Processor: AMD Ryzen 7 5800X (8 cores, 3.8GHz base, up to 4.7GHz Turbo Boost) Memory: 16GB DDR4 RAM (3200MHz) Graphics: NVIDIA GeForce RTX 3070 (8GB GDDR6) Storage: 1TB NVMe SSD Operating System: Windows 11 Home', 120000, 10, '665767d214eb9.jpg', 'A well-rounded gaming desktop with a Ryzen 7 5800X processor, 16GB of RAM, and an RTX 3070 GPU. It offers excellent value and performance for high-end gaming, ensuring a smooth and immersive experience.', 12),
(46, 'Apple iPhone 14 Pro Max', 'A16 Bionic chip, 6.7-inch OLED display, 48MP camera', 87000, 27, '66576880ec599.png', 'The latest flagship from Apple, featuring a powerful A16 Bionic chip, a stunning 6.7-inch OLED display, and an advanced 48MP camera system for exceptional photography.', 8),
(47, 'Samsung Galaxy S23 Ultra', 'Specs: Snapdragon 8 Gen 2, 6.8-inch AMOLED, 108MP camera', 75000, 22, '665768b23f519.png', 'Boasts a large 6.8-inch AMOLED display, the latest Snapdragon 8 Gen 2 processor, and a remarkable 108MP camera, making it ideal for high-end performance and photography.\r\n', 8),
(48, 'Google Pixel 7 Pro', 'Google Tensor G2, 6.7-inch OLED, 50MP camera', 60000, 24, '665768e41b741.png', 'Offers a seamless Android experience with the Google Tensor G2 chip, a vibrant 6.7-inch OLED display, and a 50MP camera for high-quality photos.', 8),
(49, 'OnePlus 11', ' Snapdragon 8 Gen 2, 6.55-inch AMOLED, 50MP camera', 44000, 43, '665769164201f.png', 'Features a Snapdragon 8 Gen 2 processor, a 6.55-inch AMOLED display, and a 50MP camera, delivering a smooth and efficient user experience.', 8),
(52, 'Huawei P60 Pro', 'Kirin 9000, 6.6-inch OLED, 50MP camera', 55000, 29, '665769ec22829.png', 'Features the Kirin 9000 chip, a 6.6-inch OLED display, and a 50MP camera, offering robust performance and excellent photography capabilities.\r\n', 8),
(53, 'Sony Xperia 1 IV', ' Snapdragon 8 Gen 1, 6.5-inch OLED, 12MP camera', 65000, 12, '66576a1e2e411.png', 'Known for its 6.5-inch 4K HDR OLED display and Snapdragon 8 Gen 1 processor, this phone is perfect for multimedia and photography with its 12MP triple camera setup.', 8),
(54, 'Asus ROG Phone 6', 'Snapdragon 8+ Gen 1, 6.78-inch AMOLED, 64MP camera', 60000, 14, '66576a4e822b4.png', 'Designed for gamers, it features a 6.78-inch AMOLED display, Snapdragon 8+ Gen 1 chip, and a 64MP camera, delivering top-tier gaming performance and visuals.', 8),
(55, 'Realme GT 2 Pro', 'Snapdragon 8 Gen 1, 6.7-inch AMOLED, 50MP camera', 40000, 40, '66576a8bc4fa5.png', 'Offers excellent performance with a Snapdragon 8 Gen 1 processor, a 6.7-inch AMOLED display, and a 50MP camera at an affordable price.', 8);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(50) NOT NULL,
  `u_Fname` varchar(50) NOT NULL,
  `u_Lname` varchar(50) NOT NULL,
  `u_email` varchar(50) NOT NULL,
  `u_phone` varchar(50) NOT NULL,
  `u_password` varchar(50) NOT NULL,
  `u_address` varchar(50) NOT NULL,
  `u_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_name`, `u_Fname`, `u_Lname`, `u_email`, `u_phone`, `u_password`, `u_address`, `u_date`) VALUES
(1, 'Sample', 'Sample', 'Sample', 'Sample@wvsu.edu.ph', '99999', 'Sample', 'Sample', '2024-05-29'),
(2, 'Sample3', 'Sample2', 'Sample2', 'Sample2', '988888', 'Sample2', 'Sample2', '2024-05-29'),
(3, 'gio', 'gio anthony', 'callos', 'gioanthonycallos@gmail.com', '09993340142', 'gio123', 'iloilo', '2024-05-30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`in_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`o_id`),
  ADD KEY `user_1` (`u_id`),
  ADD KEY `product_1` (`p_id`),
  ADD KEY `invoice_id` (`in_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `category_1` (`c_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `in_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `invoice_id` FOREIGN KEY (`in_id`) REFERENCES `invoice` (`in_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_1` FOREIGN KEY (`p_id`) REFERENCES `product` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `category_1` FOREIGN KEY (`c_id`) REFERENCES `categories` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
