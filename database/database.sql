-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2023 at 06:56 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `selfcaredb`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text DEFAULT NULL,
  `picture_url` text DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `picture_url`, `created_on`, `updated_on`, `updated_by`) VALUES
(5, 'Parfume', 'Aroma dhe parfume te zgjedhura', 'https://hips.hearstapps.com/harpersbazaaruk.cdnds.net/16/50/4000x2000/landscape-1481713221-winter-fragrances.jpg', '2023-02-26 16:36:23', NULL, 4),
(6, 'Kujdes per lekure', 'Produkte per pastrimin dhe mirembajtjen e lekures', 'https://bluewaterdayspanapa.com/wp-content/uploads/2022/04/394bcea3-e2ac-4d96-b8cd-df695e396628.jpg', '2023-02-26 16:38:50', NULL, 4),
(7, 'Grim', 'Produkte te shumta duke filluar nga fondatinat, maskarat, buzekuqet me te perzgjedhur', 'https://media.allure.com/photos/63ed49438aefbb64740b797c/16:9/w_3488,h_1962,c_limit/2-15-body-make-up.jpg', '2023-02-26 16:40:11', NULL, 4),
(8, 'Kujdes per floke', 'Produkte duke filluar nga kujdesi deri te zbukurimi i flokeve', 'https://media.istockphoto.com/id/1218131909/photo/female-hair-hair-mask-and-bamboo-comb-on-white-background-top-view-flat-lay-copy-space-self.jpg?s=612x612&w=0&k=20&c=0C7SPmIgMhDB8eyq1heb7qHEypoOzhUwVW8ovMfCE0E=', '2023-02-26 16:41:42', '2023-02-26 22:24:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category_product_mapping`
--

CREATE TABLE `category_product_mapping` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_product_mapping`
--

INSERT INTO `category_product_mapping` (`id`, `category_id`, `product_id`) VALUES
(12, 5, 14),
(13, 5, 15),
(14, 5, 16),
(15, 6, 17),
(16, 6, 18),
(17, 6, 19),
(18, 6, 20),
(19, 7, 21),
(20, 7, 22),
(21, 7, 23),
(22, 7, 24),
(23, 8, 25),
(24, 8, 26),
(25, 8, 27),
(26, 8, 28);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `surname` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `hashed_password` varchar(1000) NOT NULL,
  `user_role` enum('regular','admin') DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `phone_number` varchar(256) DEFAULT NULL,
  `birthdate` datetime DEFAULT NULL,
  `gender` enum('male','female','other') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `surname`, `email`, `hashed_password`, `user_role`, `created_on`, `updated_on`, `updated_by`, `phone_number`, `birthdate`, `gender`) VALUES
(4, 'Erleta', 'Nasufi', 'erleta.nasufi@gmail.com', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 'admin', '2023-02-26 16:34:29', NULL, NULL, '+38344123456', '2000-03-19 00:00:00', 'female');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `product_id`, `quantity`) VALUES
(12, 7, 25, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `price` double NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) DEFAULT 1,
  `created_on` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `picture_url` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `price`, `stock`, `is_active`, `created_on`, `updated_on`, `updated_by`, `picture_url`) VALUES
(14, 'Eau De Parfum Hugo Boss Femme 30 ml', 'Njihet gjithashtu si “Extrait de Parfum” (që i referohet Parfumit të vërtetë), ky lloj përmban në vete koncentrim më të madh të ekstraktit (rreth 15% deri në 40% aromë) dhe që zgjat prej 6 deri në 8 orë. Në përgjithësi, për shkak të koncentrimit më të madh të aromës, ato kanë edhe çmimin më të lartë se sa llojet e parfumave të tjerë.', 28, 15, 1, '2023-02-26 16:49:06', NULL, 4, 'https://gv466hf5ah.gjirafa.net/image/0702/0702586.jpg?width=600&height=600'),
(15, 'Eau De Toilette Hugo Boss Orange Woman - 30 ml', ' Njihet gjithashtu si “Extrait de Parfum” (që i referohet Parfumit të vërtetë), ky lloj përmban në vete koncentrim më të madh të ekstraktit (rreth 15% deri në 40% aromë) dhe që zgjat prej 6 deri në 8 orë. Në përgjithësi, për shkak të koncentrimit më të madh të aromës, ato kanë edhe çmimin më të lartë se sa llojet e parfumave të tjerë.', 24, 9, 1, '2023-02-26 16:49:34', NULL, 4, 'https://gv466hf5ah.gjirafa.net/image/1738/1738945.jpg?width=600&height=600'),
(16, 'Parfum Gucci Bamboo, 30 ml', 'Është një ndër llojet më të kërkuara. Ky lloj ka koncentrim të ekstraktit prej 5% deri në 15% dhe zgjat 2-3 orë. Konsiderohen si më të lehtë/butë, për këtë arsye përdoren më shumë ditën krahasuar me “Parfumat” që përdoren më shumë natën.', 36, 22, 1, '2023-02-26 16:49:58', NULL, 4, 'https://gv466hf5ah.gjirafa.net/image/1301/1301935.jpg?width=600&height=600'),
(17, 'Pastrues për lëkurë të yndyrshme CeraVe, 236 ml', 'CeraVe Foaming Cleanser 236ml i zhvilluar nga dermatologët, është një pastrues me shkumë që pastron dhe largon sebumin e tepërt (fytyrë dhe trup) pa ndryshuar barrierën mbrojtëse të lëkurës. Ideale për lëkurën normale deri të yndyrshme, kjo formulë përmban 3 ceramide thelbësore që lëkura e shëndetshme ka nevojë për të ndihmuar në rinovimin dhe ruajtjen e barrierës së saj mbrojtëse natyrore, dhe acidin hialuronik.', 15, 22, 1, '2023-02-26 16:55:52', NULL, 4, 'https://gv466hf5ah.gjirafa.net/image/1453/1453739.jpg'),
(18, 'Krem hidratues CeraVe, 340 gr', 'Krem hidratues CeraVe ndihmon në hidratimin dhe lëkurën që ndihet e thatë dhe e pakëndshme. Struktura jo-yndyrore përmban tre Ceramide thelbësore dhe Acid Hialuronik që punojnë në sinergji ndaj lagështirës dhe mbrojnë pengesën natyrore të lëkurës. Formuluar posaçërisht për të hidratuar lëkurën e ndjeshme që është e thatë. Gjithashtu i përshtatshëm për t\'u përdorur në lëkurë me prirje për ekzemë. Hidraton barrierën mbrojtëse të lëkurës të fytyrës dhe trupit.', 26, 11, 1, '2023-02-26 16:56:25', NULL, 4, 'https://gv466hf5ah.gjirafa.net/image/2091/2091987.jpg'),
(19, 'Xhel La Roche Posay Cicaplast, 40ml', 'Kujdesi për rikuperim të lëkurës pas përdorimit të laserit, pas tretmaneve kozmetike dhe pas heqjes së qepjes së plagës. Për fëmijë dhe të rritur. CICAPLAST GEL B5 xheli përmban përbërës aktiv të kombinuar për të krijuar një kujdes të lartë për rikuperim të lëkurës.', 15, 10, 1, '2023-02-26 16:56:56', NULL, 4, ' https://gv466hf5ah.gjirafa.net/image/1957/1957530.jpg'),
(20, 'Gel pastrues La Roche Posay', 'Keni probleme me lëkurë të yndyrshme, pore të zgjeruara dhe akne? Ky gel pastrues është i duhuri për pastrimin e fytyrës suaj. Shëron lëkurën dhe eliminon mbetjet yndyrore. Përmirëson gjendjen e lëkurës dhe i mundëson funksionimin e duhur. Nuk përmban detergjent, ngjyra artificiale, paraben apo alkool. Ka nivel të pH-se 5.5. Aplikojeni në fytyrë dhe shkumojeni e masazhojeni, në fund shpëlajeni me ujë. Përdoreni në mëngjes dhe mbrëmje.', 17, 12, 1, '2023-02-26 16:57:26', NULL, 4, ' https://gv466hf5ah.gjirafa.net/image/0249/0249158.jpg'),
(21, 'Hije për sy Maybelline Total Temptation 9.6 g', 'Maybelline sjell në treg hijen për sy me teksturë inovative dhe ngjyrë intenzive e cila është e përsosur për çdo lloj stili e çdo lloj ngjarje. Kjo hije vjen me 10 nuanca me shkelqim dhe pa. Për shkak të përqendrimit të lartë të ngjyrës, hijet përdoren në një lëvizje dhe menjëherë theksojnë shprehjen e syve. Falë përmbajtjes së shtuar të pigmenteve të ngjyrave, hijet duken edhe më të shkëlqyera.', 7, 24, 1, '2023-02-26 17:03:36', NULL, 4, 'https://gv466hf5ah.gjirafa.net/image/1034/1034740.jpg'),
(22, 'Set brusha kozmetike Real Techniques Artist Essentials', ' Set brusha kozmetike për grim perfekt të fytyrës, syve dhe buzëve. Seti përmban: brushë për hijen e syve, brushë grimi, brushë për aplikimin e pudrës ndriçuese, brushë për aplikimin e buzëkuqit dhe brushë për aplikimin e pudrave. Brushat janë të punuara nga fijet sintetike dhe janë të përshtatshme për grimin e përditshëm.', 31, 15, 1, '2023-02-26 17:04:02', NULL, 4, 'https://gv466hf5ah.gjirafa.net/image/0828/0828942.jpg'),
(23, 'Krem pudër Double Wear SPF 10 Estée Lauder Nr. 4N1 Shell Beige 30 ml', ' Bëni grimin tuaj në mëngjes dhe largoni shqetësimin për mënyrën se si fytyra juaj duket gjatë gjithë ditës me këtë krem pudër. Pas 15 orësh lëkura juaj do të jetë ende e freskët dhe e natyrshme, edhe nëse qëndroni në një klimë të ngrohtë dhe të lagësht. Përbërja pa vaj dhe parfum, siguron mbrojtje të lehtë UV. Produkti është i përshtatshëm për të gjitha llojet e lëkurës. Testuar dermatologjikisht.', 39, 14, 1, '2023-02-26 17:04:32', NULL, 4, 'https://gv466hf5ah.gjirafa.net/image/0606/0606693.jpg'),
(24, 'Buzëkuq i lëngshëm NYX Soft Matte, Cannes, 8ml', ' Në ngjyrat mat që bëjnë deklarata, nuancat tona me bazë nude të kremit Soft Matte Lip krijojnë një shpërthim të ngjyrës kremoze që jep një fund mahnitës mat. E qëndrueshme, e lehtë dhe kremoze e këndshme, nuk është çudi që kjo formulë me aromë të këndshme është e preferuara e adhuruesve të Makeup Professional NYX.', 5, 35, 1, '2023-02-26 17:04:56', NULL, 4, 'https://gv466hf5ah.gjirafa.net/image/1290/1290167.jpg'),
(25, 'Trajtuespër flokë Olaplex Hair Perfector Nº 3, 100 ml', 'Është një trajtues intensiv që forcon dhe riparon flokët e dëmtuar dhe të dobësuar, duke i mbrojtur ata nga dëmtimet e ardhshme të shkaktuara nga zbardhja ose ngjyrosja. Produkti është ideal për të gjitha llojet e flokëve, veçanërisht ato të dobësuara, të thata dhe të dëmtuara nga trajtimet kimike.', 30, 9, 1, '2023-02-26 17:59:27', '2023-02-26 18:01:43', 4, 'https://gv466hf5ah.gjirafa.net/image/1809/1809335.jpg'),
(26, 'Tharëse për flokë Revlon One step Volumiser RVDR5222, 800 W', 'Furça Revlon Salon One-Step është një teknologji komplekse që e bën pajisjen një tharëse flokësh të nivelit të lartë. Falë tij, flokët bëhen më të bukur dhe më të zbutur dhe i gjithë frizuari fiton karakter. Produkti i krijuar për përdoruesit më kërkues do t\'ju ndihmojë të bëheni zot në vetëm pak minuta. Ju nuk keni nevojë për stilistë për këtë. ', 98, 5, 1, '2023-02-26 17:59:52', NULL, 4, 'https://gv466hf5ah.gjirafa.net/image/2074/2074672.jpg'),
(27, 'Stilues për flokë BaByliss PRO BAB2269TTE', 'Stiluesi ka sipërfaqe titaniumi dhe turmaline, e cila e mundëson ngrohjen e saj të shpejt dhe të njëtratshme. Me funksion të trefishtë ajo është ideale për krijimin në përsosmëri të dredhave të ngjajshme me vitet e 50-ta. Ajo ka rezistencë të lartë, kontrollim të temperaturës në mes të 140 deri në 220 gradë, ndërprerës për kyçje/çkyçje dhe kabllo 2.7 m. Vërejtje: lexoni mirë udhëzimet para përdorimit.', 67, 5, 1, '2023-02-26 18:00:24', NULL, 4, 'https://gv466hf5ah.gjirafa.net/image/0358/0358239.jpg'),
(28, 'Shampo për flokë OGX Brazilian Keratin, 385ml', 'Shampo brazilian me vaj kokosi, proteina keratine, vaj avokado dhe gjalpë kakao. Falë kësaj përbërjeje të pasur, produkti ndihmon në forcimin dhe zbutjen e flokëve dhe në të njëjtën kohë shton një shkëlqim rrezatues.', 7, 15, 1, '2023-02-26 18:00:48', NULL, 4, 'https://gv466hf5ah.gjirafa.net/image/1323/1323871.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total_price` double NOT NULL,
  `is_paid` tinyint(1) NOT NULL DEFAULT 0,
  `delivery_address` text NOT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`id`, `customer_id`, `total_price`, `is_paid`, `delivery_address`, `created_on`, `updated_on`, `updated_by`) VALUES
(7, 4, 30, 0, 'Rr. Edith Durhan', '2023-02-26 18:01:43', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `customer_id`, `product_id`, `created_on`) VALUES
(9, 4, 23, '2023-02-26 18:01:21'),
(10, 4, 22, '2023-02-26 18:01:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_product_mapping`
--
ALTER TABLE `category_product_mapping`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `category_product_mapping`
--
ALTER TABLE `category_product_mapping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category_product_mapping`
--
ALTER TABLE `category_product_mapping`
  ADD CONSTRAINT `category_product_mapping_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `category_product_mapping_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `order_products`
--
ALTER TABLE `order_products`
  ADD CONSTRAINT `order_products_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `user_orders` (`id`),
  ADD CONSTRAINT `order_products_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD CONSTRAINT `user_orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
