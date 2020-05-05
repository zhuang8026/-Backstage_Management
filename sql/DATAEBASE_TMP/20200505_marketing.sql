-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-05-05 11:19:30
-- 伺服器版本： 10.4.11-MariaDB
-- PHP 版本： 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `otis_shop`
--

-- --------------------------------------------------------

--
-- 資料表結構 `marketing`
--

CREATE TABLE `marketing` (
  `acId` int(3) NOT NULL COMMENT '活動ID',
  `acName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '活動名稱',
  `acDescription` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '活動文案',
  `acImg` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '活動圖片',
  `strId` int(4) NOT NULL COMMENT '賣場編號',
  `newTime` datetime NOT NULL DEFAULT current_timestamp() COMMENT '新增時間',
  `updTime` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '更新時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `marketing`
--

INSERT INTO `marketing` (`acId`, `acName`, `acDescription`, `acImg`, `strId`, `newTime`, `updTime`) VALUES
(1, 'aaaaaaaaa11', '買「Andromeda仙女座」或「Solaris太陽神」耳機，就送Litz 2.5mm以及 4.4mm平衡線各一條(對！你沒看錯，是兩種規格都送)數量有限送完為止！', 'NULL', 1, '2020-05-04 11:31:22', '2020-05-05 16:16:18'),
(16, '這是活動名稱', '這是活動文案', '20200505105541.jpg', 3, '2020-05-05 16:55:41', '2020-05-05 16:55:41'),
(17, '這是活動名稱', '這是活動文案', '20200505105702.jpg', 5, '2020-05-05 16:57:02', '2020-05-05 16:57:02');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `marketing`
--
ALTER TABLE `marketing`
  ADD PRIMARY KEY (`acId`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `marketing`
--
ALTER TABLE `marketing`
  MODIFY `acId` int(3) NOT NULL AUTO_INCREMENT COMMENT '活動ID', AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
