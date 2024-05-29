-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2024-05-29 17:40:08
-- 伺服器版本： 10.4.32-MariaDB
-- PHP 版本： 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `final_project`
--

-- --------------------------------------------------------

--
-- 資料表結構 `customerinteractions`
--

CREATE TABLE `customerinteractions` (
  `InteractionID` int(10) NOT NULL,
  `CustomerID` int(10) NOT NULL,
  `Date` date NOT NULL,
  `Mode` enum('Email','Phone','In-Person') NOT NULL,
  `Description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `customerinteractions`
--

INSERT INTO `customerinteractions` (`InteractionID`, `CustomerID`, `Date`, `Mode`, `Description`) VALUES
(1, 11, '2024-05-04', 'In-Person', 'Testing123');

-- --------------------------------------------------------

--
-- 資料表結構 `customers`
--

CREATE TABLE `customers` (
  `CustomerID` int(10) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `PhoneNumber` varchar(20) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `RegistrationDate` date NOT NULL,
  `CustomerType` enum('Individual','Corporate') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `customers`
--

INSERT INTO `customers` (`CustomerID`, `Name`, `Email`, `PhoneNumber`, `Address`, `RegistrationDate`, `CustomerType`) VALUES
(1, 'Roger', 'Roger9527@gmail.com', '0987540887', 'No. 87, Gongguan Rd., Beitou Dist., Taipei City , Taiwan', '2024-05-29', 'Corporate'),
(2, 'NL', 'sunbaby87@gmail.com', '0912345678', 'No. 87, Zhongzheng Rd., Bade Dist., Taoyuan City, Taiwan', '2024-05-29', 'Individual'),
(3, 'Wang,Si-Ming', 'treesentinel87@gmail.com', '0980497079', 'No. 134, Longchuan 2nd St., Zhongli Dist., Taoyuan City, Taiwan', '2024-05-29', 'Individual'),
(4, 'Han,Guo-Yu', 'koreanfish87@gmail.com', '0988168168', 'No. 87, Yiliu St., Douliu City, Yunlin County, Taiwan', '2024-05-29', 'Individual'),
(5, 'Jhang,Jia-Hang', 'asiagodtonegg3be0@gmail.com', '0974147414', 'No. 87, Lixing St., Zhongli Dist., Taoyuan City, Taiwan', '2024-05-29', 'Individual'),
(6, 'Test', 'Test@gmail.com', '0900000000', 'No. 43, Sec. 4, Keelung Rd., Da’an Dist., Taipei City , Taiwan', '2024-05-29', 'Corporate'),
(7, 'Test123', 'Test123@gmail.com', '0911111111', 'No. 43, Sec. 4, Keelung Rd., Da’an Dist., Taipei City, Taiwan', '2024-05-29', 'Corporate'),
(8, 'Test321', 'Test321@gmail.com', '0922222222', 'No. 43, Sec. 4, Keelung Rd., Da’an Dist., Taipei City, Taiwan', '2024-05-29', 'Corporate'),
(9, 'Test1234', 'Test1234@gmail.com', '0933333333', 'No. 43, Sec. 4, Keelung Rd., Da’an Dist., Taipei City, Taiwan', '2024-05-29', 'Corporate'),
(10, 'Test4321', 'Test4321@gmail.com', '0944444444', 'No. 43, Sec. 4, Keelung Rd., Da’an Dist., Taipei City, Taiwan', '2024-05-29', 'Corporate'),
(11, 'Testing', 'Testing@gmail.com', '0955555555', '29 Hardwick Lane Nakina,nc, 28455 United States', '2024-05-29', 'Individual');

-- --------------------------------------------------------

--
-- 資料表結構 `orderdetails`
--

CREATE TABLE `orderdetails` (
  `OrderID` int(10) NOT NULL,
  `ProductID` int(10) NOT NULL,
  `Quantity` int(10) UNSIGNED NOT NULL,
  `Price` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `orderdetails`
--

INSERT INTO `orderdetails` (`OrderID`, `ProductID`, `Quantity`, `Price`) VALUES
(1, 8, 20, 2460),
(1, 9, 10, 3210);

-- --------------------------------------------------------

--
-- 資料表結構 `products`
--

CREATE TABLE `products` (
  `ProductID` int(10) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Description` text DEFAULT NULL,
  `Price` int(10) UNSIGNED NOT NULL,
  `StockQuantity` int(10) UNSIGNED NOT NULL,
  `CategoryID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `products`
--

INSERT INTO `products` (`ProductID`, `Name`, `Description`, `Price`, `StockQuantity`, `CategoryID`) VALUES
(1, 'ASUS ROG Strix GeForce RTX 4070 12GB', 'Grapic card.', 24990, 14, 1),
(2, 'Ergonomic Mesh Office Chair with 3D Adjustable Armrest,High Back Desk Computer Chair Ergo3d Ergonomic Office Chair with Wheels for Home & Office Black', 'PatioMage is committed to creating the most comfortable ergonomic mesh office chair. Our office chairs are perfectly designed according to the four curvatures of the human spine. With our ergonomic design based on human body curve and real needs from customers,it is easier to work in comfort by freely adjusting the headrest,lumbar support,armrest,seat depth & heigth,footrest as you need to truly make it perfect for a long office day at home!', 12000, 30, 2),
(3, 'Razer Viper V3 Pro Wireless Esports Gaming Mouse', 'Symmetrical - 54g Lightweight - 8K Polling - 35K DPI Optical Sensor - Gen3 Optical Switches - 8 Programmable Controls- 95 Hr Battery - Black', 4665, 30, 3),
(4, 'Nintendo Switch™ with Neon Blue and Neon Red Joy‑Con™', '6.2” LCD screen, Three play modes: TV, tabletop, and handheld, Local co-op, online, and local wireless multiplayer, Detachable Joy-Con controllers, Nintendo Switch is the home of Mario & friends.', 9000, 27, 4),
(5, 'Mario Kart 8 Deluxe - Nintendo Switch', 'Hit the road with the definitive version of Mario Kart 8 and play anytime, anywhere. Race your friends or battle them in a revised battle mode for new and returning battle courses.', 1650, 10, 5),
(6, 'Sunbaby', 'Red sun in your heart', 10000, 1, 6),
(7, 'The Legend of Zelda: Tears of the Kingdom - Nintendo Switch', 'An epic adventure across the land and skies of Hyrule awaits in The Legend of Zelda™: Tears of the Kingdom for Nintendo Switch. The adventure is yours to create in a world fueled by your imagination.\nIn this sequel to The Legend of Zelda: Breath of the Wild, you’ll decide your own path through the sprawling landscapes of Hyrule and the mysterious islands floating in the vast skies above. Can you harness the power of Link’s new abilities to fight back against the malevolent forces that threaten the kingdom?', 1650, 30, 5),
(8, 'Test123', 'Test123', 123, 103, 7),
(9, 'Test321', 'Test321', 321, 311, 7);

-- --------------------------------------------------------

--
-- 資料表結構 `salesorders`
--

CREATE TABLE `salesorders` (
  `OrderID` int(10) NOT NULL,
  `CustomerID` int(10) NOT NULL,
  `OrderDate` date NOT NULL,
  `TotalAmount` int(10) UNSIGNED NOT NULL,
  `PaymentStatus` enum('Unpaid','Paid') NOT NULL,
  `DeliveryStatus` enum('Pending','Shipping','Delivered') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `salesorders`
--

INSERT INTO `salesorders` (`OrderID`, `CustomerID`, `OrderDate`, `TotalAmount`, `PaymentStatus`, `DeliveryStatus`) VALUES
(1, 11, '2024-05-29', 5670, 'Unpaid', 'Pending'),
(2, 10, '2024-05-03', 0, 'Unpaid', 'Pending');

-- --------------------------------------------------------

--
-- 資料表結構 `servicerequests`
--

CREATE TABLE `servicerequests` (
  `RequestID` int(10) NOT NULL,
  `CustomerID` int(10) NOT NULL,
  `ProductID` int(10) NOT NULL,
  `IssueDescription` text DEFAULT NULL,
  `RequestDate` date NOT NULL,
  `ResolutionDate` date DEFAULT NULL,
  `Status` enum('Submitted','In-Progress','Completed') NOT NULL DEFAULT 'Submitted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `servicerequests`
--

INSERT INTO `servicerequests` (`RequestID`, `CustomerID`, `ProductID`, `IssueDescription`, `RequestDate`, `ResolutionDate`, `Status`) VALUES
(1, 11, 9, 'Testing123', '2024-05-29', NULL, 'Submitted');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `customerinteractions`
--
ALTER TABLE `customerinteractions`
  ADD PRIMARY KEY (`InteractionID`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- 資料表索引 `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`CustomerID`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `PhoneNumber` (`PhoneNumber`);

--
-- 資料表索引 `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`OrderID`,`ProductID`),
  ADD KEY `OrderID` (`OrderID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- 資料表索引 `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductID`);

--
-- 資料表索引 `salesorders`
--
ALTER TABLE `salesorders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- 資料表索引 `servicerequests`
--
ALTER TABLE `servicerequests`
  ADD PRIMARY KEY (`RequestID`),
  ADD KEY `CustomerID` (`CustomerID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `customerinteractions`
--
ALTER TABLE `customerinteractions`
  MODIFY `InteractionID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `customers`
--
ALTER TABLE `customers`
  MODIFY `CustomerID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `products`
--
ALTER TABLE `products`
  MODIFY `ProductID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `salesorders`
--
ALTER TABLE `salesorders`
  MODIFY `OrderID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `servicerequests`
--
ALTER TABLE `servicerequests`
  MODIFY `RequestID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `customerinteractions`
--
ALTER TABLE `customerinteractions`
  ADD CONSTRAINT `customerinteractions_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customers` (`CustomerID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `salesorders` (`OrderID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`) ON UPDATE CASCADE;

--
-- 資料表的限制式 `salesorders`
--
ALTER TABLE `salesorders`
  ADD CONSTRAINT `salesorders_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customers` (`CustomerID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `servicerequests`
--
ALTER TABLE `servicerequests`
  ADD CONSTRAINT `servicerequests_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customers` (`CustomerID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `servicerequests_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
