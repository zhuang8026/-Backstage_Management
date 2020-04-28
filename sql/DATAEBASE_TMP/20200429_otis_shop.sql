-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 28, 2020 at 05:38 PM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `otis_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(11) NOT NULL COMMENT '流水號',
  `adminname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '賣家賬號',
  `pwd` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '賣家密碼',
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '賣家匿名',
  `adminlogo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '賣家頭像',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '新增時間',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新時間',
  `isActivated` tinyint(1) NOT NULL DEFAULT '0' COMMENT '賣家開通狀況'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='會員登入';

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `adminname`, `pwd`, `name`, `adminlogo`, `created_at`, `updated_at`, `isActivated`) VALUES
(1, 'test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'william', '', '2020-04-22 18:33:47', '2020-04-24 15:00:59', 0);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `itemId` int(11) NOT NULL COMMENT '流水號',
  `itemName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '商品名稱',
  `itemImg` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '商品照片路徑',
  `colorid` tinyint(20) DEFAULT NULL COMMENT '產品顏色',
  `itemsbrand` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '產品品牌',
  `itemstype` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '產品類型',
  `itemPrice` int(11) NOT NULL COMMENT '商品價格',
  `itemQty` int(255) NOT NULL COMMENT '商品數量',
  `itemsales` int(255) NOT NULL DEFAULT '1' COMMENT '銷售量',
  `itemsstar` tinyint(10) NOT NULL DEFAULT '1' COMMENT '產品評分',
  `itemCategoryId` int(11) DEFAULT NULL COMMENT '商品種類編號',
  `itemscontent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '產品備註',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '新增時間',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='商品列表';

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`itemId`, `itemName`, `itemImg`, `colorid`, `itemsbrand`, `itemstype`, `itemPrice`, `itemQty`, `itemsales`, `itemsstar`, `itemCategoryId`, `itemscontent`, `created_at`, `updated_at`) VALUES
(1, 'Beoplay H4 2nd Gen', 'beoplay1.jpg', 1, 'Bang & Olufsen', '耳罩式耳機', 9000, 1270, 127, 5, 0, '時尚耳罩式耳機配備 Voice Assistant，可提供長時間的舒適感受和長達 19 小時的播放時間。', '2020-04-22 15:44:00', '2020-04-27 17:35:40'),
(2, 'Beoplay H9 3rd Gen', 'beoplay2.jpg', 2, 'Bang & Olufsen', '耳罩式耳機', 20000, 1100, 578, 4, 0, '先進的主動降噪功能、25 小時播放時間與語音助理.', '2020-04-22 15:44:00', '2020-04-27 17:35:45'),
(3, 'Beoplay H8i', 'beoplay3.jpg', 1, 'Bang & Olufsen', '耳罩式耳機', 16000, 780, 967, 5, 0, '豪華耳罩式耳機，專為追求精湛風格和舒適性的音樂愛好者設計。可無線播放 Bang Olufsen Signature Sound 標誌性音效長達 30 小時。', '2020-04-22 15:44:00', '2020-04-27 17:35:50'),
(4, 'Beoplay E8 3rd Gen', 'beoplay4.jpg', 2, 'Bang & Olufsen', '耳機', 14000, 640, 846, 2, 0, '我們真正無線入耳式耳機的最新版本，具有長達 35 小時的電池使用時間、QI 認證的無線充電盒和藍牙 5.1 連線功能，可確保無縫且震憾的聆聽體驗。', '2020-04-22 15:44:00', '2020-04-27 17:35:54'),
(5, 'Beoplay E6', 'beoplay5.jpg', 1, 'Bang & Olufsen', '耳機', 8000, 1121, 1204, 3, 0, '專為活躍生活型態設計的無線入耳式耳機。Bang & Olufsen 最具代表性的美妙聲音，長達 5 小時的播放時間與外出充電。', '2020-04-22 15:44:00', '2020-04-27 17:35:58'),
(6, 'Beoplay E8 2.0 (2nd Gen)', 'beoplay6.jpg', 2, 'Bang & Olufsen', '耳機', 12000, 547, 168, 5, 0, '無線充電、優質音效、直覺式觸控和絕佳的舒適性，體驗真正的自由。', '2020-04-22 15:44:00', '2020-04-27 17:36:02'),
(7, 'Beoplay E6 動感活力', 'beoplay7.jpg', 1, 'Bang & Olufsen', '耳機', 8000, 102, 458, 5, 0, '輕量、耳內、無線入耳式耳機，專為活躍主動的生活風格所設計。提供數種耳塞和耳鰭的尺寸選擇，E6 Motion 有完整的客製化服務。', '2020-04-22 15:44:00', '2020-04-27 17:36:06'),
(8, 'Beoplay E4', 'beoplay8.jpg', 2, 'Bang & Olufsen', '耳機', 10000, 960, 945, 5, 0, '具先進主動式降噪功能的入耳式耳機，提供直接精準的音效、無與倫比的舒適感和簡便的控制方式。', '2020-04-22 15:44:00', '2020-04-27 17:36:09'),
(9, 'Beoplay H3', 'beoplay9.jpg', 1, 'Bang & Olufsen', '耳機', 6000, 601, 831, 5, 0, '傳遞自然真實音效的頂級入耳式耳機。堅固耐用又輕量，專為準確性和服貼的舒適性而設計。', '2020-04-22 15:44:00', '2020-04-27 17:36:15'),
(10, 'DT 770 STUDIO (80 Ohms)', 'beyerdynamic_1.jpg', 2, 'beyerdynamic', '耳罩式耳機', 4470, 230, 999, 2, 0, '幾十年來，全世界的專業用戶一直對我們的經典產品系列DT 770/880/990 PRO表示信任。這些設置基準的錄音室耳機有三種不同的型號，具有極詳細的分辨率和非常透明的聲音。DT 770 PRO耳機是該系列的封閉式型號，可提供最大的靈活性和您可以信賴的細膩聲音。', '2020-04-22 15:44:00', '2020-04-27 17:36:20'),
(11, 'DT 770 PRO', 'beyerdynamic_2.jpg', 1, 'beyerdynamic', '耳罩式耳機', 4470, 415, 277, 4, 0, '幾十年來，全世界的專業用戶一直對我們的經典產品系列DT 770/880/990 PRO表示信任。這些設置基準的錄音室耳機有三種不同的型號，具有極詳細的分辨率和非常透明的聲音。', '2020-04-22 15:44:00', '2020-04-27 17:36:25'),
(12, 'DT 990 PRO', 'beyerdynamic_3.jpg', 2, 'beyerdynamic', '耳罩式耳機', 4470, 2013, 361, 5, 0, '幾十年來，全世界的專業用戶一直對我們的經典產品系列DT 770/880/990 PRO表示信任。這些設置基準的錄音室耳機有三種不同的型號，具有極詳細的分辨率和非常透明的聲音。', '2020-04-22 15:44:00', '2020-04-27 17:36:32'),
(13, 'DT 240 PRO', 'beyerdynamic_4.jpg', 1, 'beyerdynamic', '耳罩式耳機', 2970, 661, 621, 4, 0, '緊湊的耳罩非常適合移動使用，並在任何環境下都能提供真實的錄音室性能：直接在現場檢查錄音並在回家時進行項目。', '2020-04-22 15:44:00', '2020-04-27 17:36:39'),
(14, 'DT 1770 PRO', 'beyerdynamic_5.jpg', 2, 'beyerdynamic', '耳罩式耳機', 17970, 1170, 521, 5, 0, '這些基准設定的封閉式錄音室耳機結合了數十年的耳機生產專業知識和最新的Tesla驅動技術。除了高分辨率和均衡的聲音外，beyerdynamic DT 1770 PRO耳機還樹立了新標準，尤其是在舒適性和工藝上。', '2020-04-22 15:44:00', '2020-04-27 17:36:52'),
(15, 'apple耳機2', 'item_20200427140729.png', 0, 'william', 'william', 1000, 12, 1, 0, 0, 'asdadasdasdasdasda', '2020-04-27 20:07:29', '2020-04-27 20:07:29'),
(16, 'apple耳機22', 'item_20200427140817.png', 0, 'william', 'william', 1000, 12, 1, 0, 0, 'asdadasdasdasdasda', '2020-04-27 20:08:17', '2020-04-29 01:15:09'),
(18, 'william', '', 1, 'william', 'william', 100, 1, 1, 1, NULL, 'no', '2020-04-29 01:35:29', '2020-04-29 01:35:29'),
(19, 'william', '', 1, 'william', 'william', 100, 1, 1, 1, NULL, 'no', '2020-04-29 01:36:07', '2020-04-29 01:36:07'),
(20, '兔子', '', 1, 'william', '耳機', 1000, 1, 1, 1, NULL, '1', '2020-04-29 01:37:19', '2020-04-29 01:37:19');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `mid` int(11) NOT NULL COMMENT '流水號',
  `managername` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '管理者名稱',
  `pwd` char(40) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '管理者密碼',
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '姓名',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '新增時間',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='使用者資料表';

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`mid`, `managername`, `pwd`, `name`, `created_at`, `updated_at`) VALUES
(1, 'otis', 'bf92921799879f0614f259d5dd2ee97f403939db', 'otis_test', '2020-04-24 11:05:38', '2020-04-24 11:06:20');

-- --------------------------------------------------------

--
-- Table structure for table `multiple_images`
--

CREATE TABLE `multiple_images` (
  `multipleImageId` int(11) NOT NULL COMMENT '流水號',
  `multipleImageImg` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '圖片名稱',
  `itemId` int(11) NOT NULL COMMENT '商品編號',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '新增時間',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='商品圖片';

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL COMMENT '流水號',
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '使用者名稱',
  `pwd` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '使用者密碼',
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '姓名',
  `gender` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '性別',
  `userlogo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '使用者頭像',
  `phoneNumber` int(11) NOT NULL COMMENT '手機號碼',
  `card` tinyint(20) NOT NULL COMMENT '信用卡號碼',
  `birthday` date NOT NULL COMMENT '出生年月日',
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '地址',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '新增時間',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新時間',
  `isActivated` tinyint(1) NOT NULL DEFAULT '0' COMMENT '買家開通狀況'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='使用者資料表';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `pwd`, `name`, `gender`, `userlogo`, `phoneNumber`, `card`, `birthday`, `address`, `created_at`, `updated_at`, `isActivated`) VALUES
(1, 'lemon', 'dfdd7bce2ad9f89d7204dd83161d66d1e521759c', '檸檬', '女', NULL, 988220900, 0, '2020-01-01', '泰山區台灣路上', '2020-04-24 15:08:54', '2020-04-24 15:08:54', 0),
(2, 'alex', '60c6d277a8bd81de7fdde19201bf9c58a3df08f4', '埃里克森', '男', NULL, 988888888, 0, '2020-01-02', '台北區台灣路上', '2020-04-24 15:08:54', '2020-04-24 15:08:54', 0),
(3, 'william', 'c824fe0afe16857dd6f587aa7c4044d2642d60fb', '威廉', '男', NULL, 988220903, 0, '2020-01-03', '台南區台灣路上', '2020-04-24 15:08:54', '2020-04-24 15:08:54', 0),
(4, 'boss', '05b1f356646c24bf1765f6f1b65aea3bde7247e1', '孫悟空', '男', NULL, 911111111, 0, '2020-02-02', '台灣區花果山路上', '2020-04-24 15:26:56', '2020-04-24 15:26:56', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`),
  ADD UNIQUE KEY `username` (`adminname`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`itemId`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`mid`),
  ADD UNIQUE KEY `username` (`managername`);

--
-- Indexes for table `multiple_images`
--
ALTER TABLE `multiple_images`
  ADD PRIMARY KEY (`multipleImageId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT COMMENT '流水號', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `itemId` int(11) NOT NULL AUTO_INCREMENT COMMENT '流水號', AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT COMMENT '流水號', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `multiple_images`
--
ALTER TABLE `multiple_images`
  MODIFY `multipleImageId` int(11) NOT NULL AUTO_INCREMENT COMMENT '流水號';

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '流水號', AUTO_INCREMENT=5;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
