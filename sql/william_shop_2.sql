-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2020-04-24 10:04:17
-- 服务器版本： 10.4.11-MariaDB
-- PHP 版本： 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `william_shop`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE `admin` (
  `aid` int(11) NOT NULL COMMENT '流水號',
  `adminname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '賣家賬號',
  `pwd` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '賣家密碼',
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '賣家匿名',
  `adminlogo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '賣家頭像',
  `created_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT '新增時間',
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '更新時間',
  `isActivated` tinyint(1) NOT NULL DEFAULT 0 COMMENT '賣家開通狀況'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='會員登入';

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`aid`, `adminname`, `pwd`, `name`, `adminlogo`, `created_at`, `updated_at`, `isActivated`) VALUES
(1, 'test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'william', '', '2020-04-22 18:33:47', '2020-04-24 15:00:59', 0);

-- --------------------------------------------------------

--
-- 表的结构 `items`
--

CREATE TABLE `items` (
  `itemId` int(11) NOT NULL COMMENT '流水號',
  `itemName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '商品名稱',
  `itemImg` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '商品照片路徑',
  `itemPrice` int(11) NOT NULL COMMENT '商品價格',
  `itemQty` tinyint(3) NOT NULL COMMENT '商品數量',
  `itemCategoryId` int(11) NOT NULL COMMENT '商品種類編號',
  `created_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT '新增時間',
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '更新時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='商品列表';

--
-- 转存表中的数据 `items`
--

INSERT INTO `items` (`itemId`, `itemName`, `itemImg`, `itemPrice`, `itemQty`, `itemCategoryId`, `created_at`, `updated_at`) VALUES
(1, '皮卡丘A', 'item_20200422094405.png', 1000, 10, 1, '2020-04-22 15:44:05', '2020-04-22 15:44:05');

-- --------------------------------------------------------

--
-- 表的结构 `manager`
--

CREATE TABLE `manager` (
  `mid` int(11) NOT NULL COMMENT '流水號',
  `managername` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '管理者名稱',
  `pwd` char(40) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '管理者密碼',
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '姓名',
  `created_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT '新增時間',
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '更新時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='使用者資料表';

--
-- 转存表中的数据 `manager`
--

INSERT INTO `manager` (`mid`, `managername`, `pwd`, `name`, `created_at`, `updated_at`) VALUES
(1, 'otis', 'bf92921799879f0614f259d5dd2ee97f403939db', 'otis_test', '2020-04-24 11:05:38', '2020-04-24 11:06:20');

-- --------------------------------------------------------

--
-- 表的结构 `multiple_images`
--

CREATE TABLE `multiple_images` (
  `multipleImageId` int(11) NOT NULL COMMENT '流水號',
  `multipleImageImg` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '圖片名稱',
  `itemId` int(11) NOT NULL COMMENT '商品編號',
  `created_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT '新增時間',
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '更新時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='商品圖片';

-- --------------------------------------------------------

--
-- 表的结构 `users`
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
  `created_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT '新增時間',
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '更新時間',
  `isActivated` tinyint(1) NOT NULL DEFAULT 0 COMMENT '買家開通狀況'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='使用者資料表';

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `username`, `pwd`, `name`, `gender`, `userlogo`, `phoneNumber`, `card`, `birthday`, `address`, `created_at`, `updated_at`, `isActivated`) VALUES
(1, 'lemon', 'dfdd7bce2ad9f89d7204dd83161d66d1e521759c', '檸檬', '女', NULL, 988220900, 0, '2020-01-01', '泰山區台灣路上', '2020-04-24 15:08:54', '2020-04-24 15:08:54', 0),
(2, 'alex', '60c6d277a8bd81de7fdde19201bf9c58a3df08f4', '埃里克森', '男', NULL, 988888888, 0, '2020-01-02', '台北區台灣路上', '2020-04-24 15:08:54', '2020-04-24 15:08:54', 0),
(3, 'william', 'c824fe0afe16857dd6f587aa7c4044d2642d60fb', '威廉', '男', NULL, 988220903, 0, '2020-01-03', '台南區台灣路上', '2020-04-24 15:08:54', '2020-04-24 15:08:54', 0),
(4, 'boss', '05b1f356646c24bf1765f6f1b65aea3bde7247e1', '孫悟空', '男', NULL, 911111111, 0, '2020-02-02', '台灣區花果山路上', '2020-04-24 15:26:56', '2020-04-24 15:26:56', 1);

--
-- 转储表的索引
--

--
-- 表的索引 `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`),
  ADD UNIQUE KEY `username` (`adminname`);

--
-- 表的索引 `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`itemId`);

--
-- 表的索引 `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`mid`),
  ADD UNIQUE KEY `username` (`managername`);

--
-- 表的索引 `multiple_images`
--
ALTER TABLE `multiple_images`
  ADD PRIMARY KEY (`multipleImageId`);

--
-- 表的索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT COMMENT '流水號', AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `items`
--
ALTER TABLE `items`
  MODIFY `itemId` int(11) NOT NULL AUTO_INCREMENT COMMENT '流水號', AUTO_INCREMENT=7;

--
-- 使用表AUTO_INCREMENT `manager`
--
ALTER TABLE `manager`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT COMMENT '流水號', AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `multiple_images`
--
ALTER TABLE `multiple_images`
  MODIFY `multipleImageId` int(11) NOT NULL AUTO_INCREMENT COMMENT '流水號', AUTO_INCREMENT=19;

--
-- 使用表AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '流水號', AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
