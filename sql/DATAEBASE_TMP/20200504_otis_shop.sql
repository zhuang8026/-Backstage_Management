-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 03, 2020 at 05:05 PM
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
  `itemstoreNumber` int(10) DEFAULT NULL COMMENT '賣場與商品對應編號',
  `itemscontent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '產品備註',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '新增時間',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='商品列表';

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`itemId`, `itemName`, `itemImg`, `colorid`, `itemsbrand`, `itemstype`, `itemPrice`, `itemQty`, `itemsales`, `itemsstar`, `itemstoreNumber`, `itemscontent`, `created_at`, `updated_at`) VALUES
(1, 'Beoplay H4 2nd Gen', 'beoplay1.jpg', 1, 'Bang &amp; Olufsen', '1', 9000, 799, 127, 5, 1, '時尚耳罩式耳機配備 Voice Assistant，可提供長時間的舒適感受和長達 19 小時的播放時間。', '2020-04-22 15:44:00', '2020-05-04 00:07:08'),
(2, 'Beoplay H9 3rd Gen', 'beoplay2.jpg', 1, 'Bang &amp; Olufsen', '1', 20000, 11000, 578, 4, 1, '先進的主動降噪功能、25 小時播放時間與語音助理.', '2020-04-22 15:44:00', '2020-05-02 01:26:22'),
(3, 'Beoplay H8i', 'beoplay3.jpg', 1, 'Bang & Olufsen', '2', 16000, 780, 967, 5, 1, '豪華耳罩式耳機，專為追求精湛風格和舒適性的音樂愛好者設計。可無線播放 Bang Olufsen Signature Sound 標誌性音效長達 30 小時。', '2020-04-22 15:44:00', '2020-05-01 17:59:32'),
(4, 'Beoplay E8 3rd Gen', 'beoplay4.jpg', 2, 'Bang & Olufsen', '4', 14000, 640, 846, 2, 1, '我們真正無線入耳式耳機的最新版本，具有長達 35 小時的電池使用時間、QI 認證的無線充電盒和藍牙 5.1 連線功能，可確保無縫且震憾的聆聽體驗。', '2020-04-22 15:44:00', '2020-05-01 17:59:33'),
(5, 'Beoplay E6', 'beoplay5.jpg', 1, 'Bang & Olufsen', '4', 8000, 1121, 1204, 3, 1, '專為活躍生活型態設計的無線入耳式耳機。Bang & Olufsen 最具代表性的美妙聲音，長達 5 小時的播放時間與外出充電。', '2020-04-22 15:44:00', '2020-05-01 17:59:35'),
(6, 'Beoplay E8 2.0 (2nd Gen)', 'beoplay6.jpg', 2, 'Bang & Olufsen', '4', 12000, 547, 168, 5, 2, '無線充電、優質音效、直覺式觸控和絕佳的舒適性，體驗真正的自由。', '2020-04-22 15:44:00', '2020-05-01 17:59:37'),
(7, 'Beoplay E6 動感活力', 'beoplay7.jpg', 7, 'Bang &amp; Olufsen', '1', 8000, 102, 458, 5, 2, '輕量、耳內、無線入耳式耳機，專為活躍主動的生活風格所設計。提供數種耳塞和耳鰭的尺寸選擇，E6 Motion 有完整的客製化服務。', '2020-04-22 15:44:00', '2020-05-02 01:54:55'),
(8, 'Beoplay E4', 'beoplay8.jpg', 8, 'Bang &amp; Olufsen', '1', 10000, 960, 945, 4, 2, '具先進主動式降噪功能的入耳式耳機，提供直接精準的音效、無與倫比的舒適感和簡便的控制方式。', '2020-04-22 15:44:00', '2020-05-02 01:14:52'),
(9, 'Beoplay H3', 'beoplay9.jpg', 8, 'Bang &amp; Olufsen', '1', 6000, 601, 831, 5, 13, '傳遞自然真實音效的頂級入耳式耳機。堅固耐用又輕量，專為準確性和服貼的舒適性而設計。', '2020-04-22 15:44:00', '2020-05-03 23:57:03'),
(10, 'DT 770 STUDIO', 'beyerdynamic_1.jpg', 7, 'beyerdynamic', '1', 4470, 230, 999, 2, NULL, '幾十年來，全世界的專業用戶一直對我們的經典產品系列DT 770/880/990 PRO表示信任。這些設置基準的錄音室耳機有三種不同的型號，具有極詳細的分辨率和非常透明的聲音。DT 770 PRO耳機是該系列的封閉式型號，可提供最大的靈活性和您可以信賴的細膩聲音。', '2020-04-22 15:44:00', '2020-05-01 11:38:52'),
(11, 'DT 770 PRO', 'beyerdynamic_2.jpg', 7, 'beyerdynamic', '1', 4470, 415, 277, 4, NULL, '幾十年來，全世界的專業用戶一直對我們的經典產品系列DT 770/880/990 PRO表示信任。這些設置基準的錄音室耳機有三種不同的型號，具有極詳細的分辨率和非常透明的聲音。', '2020-04-22 15:44:00', '2020-05-01 02:15:35'),
(12, 'DT 990 PRO', 'beyerdynamic_3.jpg', 7, 'beyerdynamic', '1', 4470, 2013, 361, 5, NULL, '幾十年來，全世界的專業用戶一直對我們的經典產品系列DT 770/880/990 PRO表示信任。這些設置基準的錄音室耳機有三種不同的型號，具有極詳細的分辨率和非常透明的聲音。', '2020-04-22 15:44:00', '2020-05-01 01:45:04'),
(13, 'DT 240 PRO', 'beyerdynamic_4.jpg', 8, 'beyerdynamic', '1', 2970, 661, 621, 4, NULL, '緊湊的耳罩非常適合移動使用，並在任何環境下都能提供真實的錄音室性能：直接在現場檢查錄音並在回家時進行項目。', '2020-04-22 15:44:00', '2020-05-01 01:45:07'),
(14, 'DT 1770 PRO', 'beyerdynamic_5.jpg', NULL, 'beyerdynamic', '1', 17970, 1170, 521, 5, NULL, '這些基准設定的封閉式錄音室耳機結合了數十年的耳機生產專業知識和最新的Tesla驅動技術。除了高分辨率和均衡的聲音外，beyerdynamic DT 1770 PRO耳機還樹立了新標準，尤其是在舒適性和工藝上。', '2020-04-22 15:44:00', '2020-05-01 01:45:10'),
(15, 'apple耳機2', 'item_20200427140729.png', 0, 'william', '10', 1000, 12, 1, 0, NULL, 'asdadasdasdasdasda', '2020-04-27 20:07:29', '2020-05-01 01:45:15'),
(21, 'Beoplay H4 2nd Gen1', 'item_20200430100532.png', 3, 'william', '1', 100, 10, 1, 1, NULL, 'q', '2020-04-30 16:05:32', '2020-05-01 02:16:11'),
(22, 'apple耳機2', 'item_20200430101149.jpg', 2, 'qweqweqw', '1', 1000, 111, 1, 1, NULL, 'test', '2020-04-30 16:11:49', '2020-05-01 02:16:15'),
(23, '旺嗝耳機', 'item_20200430174648.png', 2, '旺嗝牌', '1', 100, 1, 1, 1, NULL, '無', '2020-05-01 01:46:48', '2020-05-02 02:02:56'),
(24, '兔子', 'item_20200430175354.png', NULL, 'william', '10', 100, 1, 1, 1, NULL, 'no', '2020-05-01 01:53:54', '2020-05-01 11:33:48'),
(25, '旺嗝牌', 'item_20200430175615.png', NULL, 'william', '10', 1111, 1, 1, 1, NULL, 'nothing', '2020-05-01 01:56:15', '2020-05-01 01:59:18'),
(26, '兔子耳機', '', 8, '兔子', '10', 990, 1, 1, 1, 13, 'nothing', '2020-05-04 00:40:06', '2020-05-04 00:40:06');

-- --------------------------------------------------------

--
-- Table structure for table `items_color`
--

CREATE TABLE `items_color` (
  `coid` tinyint(20) NOT NULL COMMENT '顏色號碼',
  `colorname` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '顏色名字',
  `colorunicode` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '顏色代碼'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='顏色區分表';

--
-- Dumping data for table `items_color`
--

INSERT INTO `items_color` (`coid`, `colorname`, `colorunicode`) VALUES
(1, '真朱红', '#AB3B3A'),
(2, '黄丹橘', '#F05E1C'),
(3, '花葉黃', '#FFC408'),
(4, '青丹綠', '#516E41'),
(5, '千草藍', '#255359'),
(6, '桔梗紫', '#6A4C9C'),
(7, '胡粉白', '#BDC0BA'),
(8, '碳呂黑', '#0C0C0C'),
(9, '單純白', '#fff');

-- --------------------------------------------------------

--
-- Table structure for table `items_type`
--

CREATE TABLE `items_type` (
  `typeid` tinyint(10) NOT NULL COMMENT '類型編號',
  `typename` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '類型名稱'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='類型表';

--
-- Dumping data for table `items_type`
--

INSERT INTO `items_type` (`typeid`, `typename`) VALUES
(1, '有線耳罩式'),
(2, '無線耳罩式'),
(3, '有線入耳式'),
(4, '無線入耳式'),
(5, '有線耳道式'),
(6, '無線耳道式'),
(7, '有線耳塞式'),
(8, '無線耳塞式'),
(9, '有線耳掛式'),
(10, '無線耳掛式');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `mid` int(11) NOT NULL COMMENT '流水號',
  `managername` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '管理者名稱',
  `pwd` char(40) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '管理者密碼',
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '姓名',
  `managericon` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '管理者頭像',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '新增時間',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='使用者資料表';

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`mid`, `managername`, `pwd`, `name`, `managericon`, `created_at`, `updated_at`) VALUES
(1, 'otis', 'bf92921799879f0614f259d5dd2ee97f403939db', 'otis_test', '', '2020-04-24 11:05:38', '2020-04-24 11:06:20');

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
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `dssn` int(11) NOT NULL COMMENT '訂單編號',
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '使用者帳號',
  `paymentTypeName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '付款方式',
  `payment` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '等待付款' COMMENT '付款狀態',
  `delivery` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '未出貨' COMMENT '配送狀態',
  `orderRemark` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '訂單備註',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '新增時間',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='結帳資料表';

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`dssn`, `username`, `paymentTypeName`, `payment`, `delivery`, `orderRemark`, `created_at`, `updated_at`) VALUES
(1, 's012', 'ATM', '已付款', '已出貨', '', '2020-04-27 00:05:48', '2020-05-01 15:05:43'),
(2, 's003', '信用卡', '已付款', '已出貨', '', '2020-04-27 00:15:18', '2020-05-01 15:04:39'),
(3, 's013', '信用卡', '已付款', '已出貨', '請送到大樓管理員室', '2020-04-27 00:17:33', '2020-05-01 15:05:36'),
(4, 's013', '信用卡', '已付款', '已出貨', '', '2020-04-28 11:26:23', '2020-05-01 15:06:12'),
(5, 's001', 'ATM', '已付款', '已出貨', '', '2020-04-28 14:34:17', '2020-05-01 15:06:17'),
(6, 's019', '信用卡', '已付款', '已出貨', '送達時請來電 0905-123-123', '2020-04-28 15:25:15', '2020-05-01 15:04:23'),
(7, 's002', 'ATM', '已付款', '已出貨', '', '2020-04-29 10:10:53', '2020-05-01 15:05:02'),
(8, 's009', 'ATM', '已付款', '已出貨', '', '2020-04-29 10:11:23', '2020-05-01 15:05:11'),
(9, 's015', 'ATM', '已付款', '已出貨', '', '2020-04-29 10:16:07', '2020-05-01 15:06:47'),
(10, 's010', '信用卡', '已付款', '已出貨', '如果無法正常出貨請告知', '2020-04-29 15:26:28', '2020-05-01 15:02:02'),
(11, 's011', '信用卡', '等待付款', '未出貨', '', '2020-04-29 17:14:25', '2020-05-01 15:01:59'),
(12, 's002', 'ATM', '等待付款', '未出貨', '', '2020-04-29 17:24:23', '2020-05-01 15:06:05'),
(13, 's004', '信用卡', '等待付款', '未出貨', '白日到貨請來電:24220101', '2020-04-29 17:25:28', '2020-05-01 15:05:30'),
(14, 's014', '信用卡', '等待付款', '未出貨', '', '2020-04-29 17:26:10', '2020-05-01 15:03:06'),
(15, 's005', 'ATM', '等待付款', '未出貨', '無人請送管理室', '2020-05-01 14:55:06', '2020-05-01 15:12:32'),
(16, 's013', 'ATM', '等待付款', '未出貨', '', '2020-05-01 14:55:24', '2020-05-01 15:12:36'),
(17, 's015', 'ATM', '等待付款', '未出貨', '', '2020-05-01 14:55:37', '2020-05-01 15:12:39'),
(18, 's003', '信用卡', '等待付款', '未出貨', '請在晚上送達', '2020-05-01 14:55:52', '2020-05-01 15:12:43'),
(19, 's007', '信用卡', '等待付款', '未出貨', '', '2020-05-01 14:55:58', '2020-05-01 15:12:46'),
(20, 's001', 'ATM', '等待付款', '未出貨', '', '2020-05-01 15:13:22', '2020-05-01 15:13:32');

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `storeId` int(11) NOT NULL COMMENT '商場編號',
  `storeName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '商場名稱',
  `storeLogo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '商場圖片',
  `storeDescription` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '商場介紹',
  `storeItemsId` tinyint(10) DEFAULT NULL COMMENT '賣場商品編號',
  `storeOpened` tinyint(10) NOT NULL DEFAULT '1' COMMENT '商場權限',
  `createTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '新增時間',
  `updateTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`storeId`, `storeName`, `storeLogo`, `storeDescription`, `storeItemsId`, `storeOpened`, `createTime`, `updateTime`) VALUES
(1, '小豬豬耳機專賣店', '', '小豬豬耳機專賣店,真誠歡迎你！', 1, 1, '2020-05-01 17:27:13', '2020-05-02 03:15:19'),
(2, '鳳梨耳機專賣店', '', '鳳梨耳機專賣店,真誠歡迎你！', 2, 1, '2020-05-01 17:27:13', '2020-05-02 03:15:22'),
(3, '小蘋果的耳機店', '', '小蘋果的耳機店，歡迎光臨', 13, 1, '2020-05-03 23:49:28', '2020-05-03 23:56:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL COMMENT '流水號',
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '使用者名稱',
  `pwd` char(40) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '使用者密碼',
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '姓名',
  `gender` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '性別',
  `userlogo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '使用者頭像',
  `phoneNumber` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '手機號碼',
  `card` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '信用卡號碼',
  `birthday` date NOT NULL COMMENT '出生年月日',
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '地址',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '新增時間',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新時間',
  `isActivated` int(5) NOT NULL DEFAULT '0' COMMENT '賣家開通狀況',
  `shopopen` tinyint(1) NOT NULL DEFAULT '0' COMMENT '賣場開通狀況'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='使用者資料表';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `pwd`, `name`, `gender`, `userlogo`, `phoneNumber`, `card`, `birthday`, `address`, `created_at`, `updated_at`, `isActivated`, `shopopen`) VALUES
(1, 's001', 'a0147258', '楊OO', '2', '20200501171219.jpg', '0955582026', '1234-5555-8448-8888', '2020-01-17', '台北市中山區林森北路1號', '2020-04-26 15:17:44', '2020-05-02 03:19:30', 1, 1),
(2, 's002', 'a0147258', '楊XX', '1', '20200501171139.jpg', '0956569420', '3334-4455-8888-8888', '2020-04-15', '台北市中山區林森北路2號', '2020-04-26 15:20:56', '2020-05-04 00:04:45', 1, 1),
(3, 's003', 'a0147258', '楊OX', '1', '20200501171150.jpg', '0928251686', '5234-5555-8888-8888', '2020-04-01', '台北市中山區林森北路3號', '2020-04-26 15:24:18', '2020-05-04 00:06:23', 1, 0),
(4, 's004', 'a0147258', '楊XO', '1', '20200501171206.jpg', '0918427269', '8834-5985-8888-8888', '2020-04-15', '台北市中山區林森北路3號', '2020-04-26 15:24:18', '2020-05-01 23:12:06', 0, 0),
(5, 's005', '0147258', '黃OO', '2', '20200501171219.jpg', '0926392143', '9934-5555-8888-8888', '2020-04-02', '台北市中山區林森北路5號', '2020-04-26 15:33:12', '2020-05-01 23:12:19', 0, 0),
(6, 's006', '0147258', '黃XX', '2', '20200501171229.jpg', '0952153427', '5534-5555-8888-8888', '2020-04-17', '台北市中山區林森北路6號', '2020-04-26 15:33:12', '2020-05-01 23:12:29', 0, 0),
(7, 's007', '0147258', '黃XO', '2', '20200501171239.jpg', '0956754756', '4434-5555-8888-8888', '2020-04-18', '台北市中山區林森北路7號', '2020-04-26 15:33:12', '2020-05-01 23:12:39', 0, 0),
(8, 's008', '0147258', '黃OX', '2', '20200501171256.jpg', '0920602202', '8834-5555-8888-8888', '2020-04-11', '台北市中山區林森北路8號', '2020-04-26 15:33:12', '2020-05-01 23:12:56', 0, 0),
(9, 's009', '258369', '白OO', '2', '20200501171309.jpg', '0970884130', '9934-5555-8888-8888', '2020-04-14', '台北市中山區林森北路9號', '2020-04-26 15:33:12', '2020-05-01 23:13:09', 0, 0),
(10, 's010', '258369', '白XX', '1', '20200501171328.jpg', '0954192057', '3334-5555-8888-8888', '2020-04-17', '台北市中山區林森北路10號', '2020-04-26 15:33:12', '2020-05-02 10:57:33', 0, 0),
(11, 's011', '258369', '白OX', '1', '20200501171349.jpg', '0987550683', '4434-5555-8888-8888', '2020-04-01', '台北市中山區林森北路11號', '2020-04-26 15:33:12', '2020-05-02 11:39:45', 0, 0),
(12, 's012', '85455', '王OO', '1', '13.jpg', '0955555789', '8834-5555-8558-8888', '2020-04-01', '台北市中山區林森北路12號', '2020-04-27 16:54:31', '2020-05-02 11:29:34', 0, 0),
(13, 's013', 'ss412', '王XX', '1', '3.jpg', '0978555333', '1234-5555-1548-2258', '2016-01-13', '台北市中山區林森北路13號', '2020-05-01 19:58:32', '2020-05-04 00:40:31', 1, 1),
(14, 's014', 'cc958', '王XO', '1', '20200501171139.jpg', '0987546892', '1234-5665-1548-2258', '2019-03-05', '台北市中山區林森北路14號', '2020-05-01 19:58:32', '2020-05-02 11:39:43', 0, 0),
(15, 's015', 'ss854', '王OX', '2', '21.jpeg', '0912333456', '4469-5555-1548-2258', '2020-05-02', '台北市中山區林森北路15號', '2020-05-01 19:58:32', '2020-05-01 23:15:23', 0, 0),
(16, 's016', 'ss722', '莊OO', '2', '20.png', '0987223555', '3384-5555-1548-2258', '2020-05-21', '台北市中山區林森北路16號', '2020-05-01 19:58:32', '2020-05-01 23:15:48', 0, 0),
(17, 's017', 'ss622', '莊XX', '2', '15.jpg', '0987456123', '1234-5445-1668-2258', '2020-05-14', '台北市中山區林森北路17號', '2020-05-01 19:58:32', '2020-05-01 23:16:18', 0, 0),
(18, 's018', 'ss335', '莊OX', '2', '18.jpg', '0984321855', '4234-7855-1548-2358', '2018-11-23', '台北市中山區林森北路18號', '2020-05-01 19:58:32', '2020-05-02 11:39:33', 0, 0),
(19, 's019', 'ss722', '莊XO', '2', '19.jpg', '0921555888', '1324-5445-1908-2668', '2020-05-28', '台北市中山區林森北路19號', '2020-05-01 19:58:32', '2020-05-02 11:39:28', 0, 0),
(20, 's020', 'aa945', '林OO', '2', '12.jpg', '0955666888', '1234-5665-1788-2258', '2020-05-03', '台北市中山區林森北路20號', '2020-05-01 19:58:32', '2020-05-02 11:39:22', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`itemId`);

--
-- Indexes for table `items_color`
--
ALTER TABLE `items_color`
  ADD PRIMARY KEY (`coid`);

--
-- Indexes for table `items_type`
--
ALTER TABLE `items_type`
  ADD PRIMARY KEY (`typeid`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`dssn`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`storeId`);

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
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `itemId` int(11) NOT NULL AUTO_INCREMENT COMMENT '流水號', AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `items_color`
--
ALTER TABLE `items_color`
  MODIFY `coid` tinyint(20) NOT NULL AUTO_INCREMENT COMMENT '顏色號碼', AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `items_type`
--
ALTER TABLE `items_type`
  MODIFY `typeid` tinyint(10) NOT NULL AUTO_INCREMENT COMMENT '類型編號', AUTO_INCREMENT=11;

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
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `dssn` int(11) NOT NULL AUTO_INCREMENT COMMENT '訂單編號', AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `storeId` int(11) NOT NULL AUTO_INCREMENT COMMENT '商場編號', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '流水號', AUTO_INCREMENT=21;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
