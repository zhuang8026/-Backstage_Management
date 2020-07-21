-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2020-07-21 18:10:59
-- 伺服器版本： 10.4.11-MariaDB
-- PHP 版本： 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `backstage_management`
--

-- --------------------------------------------------------

--
-- 資料表結構 `items_type`
--

CREATE TABLE `items_type` (
  `typeid` tinyint(10) NOT NULL COMMENT '類型編號',
  `typename` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '類型名稱'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='類型表';

--
-- 傾印資料表的資料 `items_type`
--

INSERT INTO `items_type` (`typeid`, `typename`) VALUES
(1, '運動服'),
(2, '運動服'),
(3, '校園制服'),
(4, '幼兒園背包');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `items_type`
--
ALTER TABLE `items_type`
  ADD PRIMARY KEY (`typeid`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `items_type`
--
ALTER TABLE `items_type`
  MODIFY `typeid` tinyint(10) NOT NULL AUTO_INCREMENT COMMENT '類型編號', AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
