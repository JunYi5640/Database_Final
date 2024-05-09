-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2024-05-08 13:33:16
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
-- 資料表結構 `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `CustomerID` int(10) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `PhoneNumber` varchar(20) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `RegistrationDate` date NOT NULL,
  `CustomerType` enum('Individual','Corporate') NOT NULL,
  PRIMARY KEY (`CustomerID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



-- --------------------------------------------------------

--
-- 資料表結構 `customerinteractions`
--

CREATE TABLE IF NOT EXISTS `customerinteractions` (
  `InteractionID` int(10) NOT NULL AUTO_INCREMENT,
  `CustomerID` int(10) NOT NULL,
  `Date` date NOT NULL,
  `Mode` enum('Email','Phone','In-Person') NOT NULL,
  `Description` text NOT NULL,
  PRIMARY KEY (`InteractionID`),
  FOREIGN KEY (`CustomerID`) REFERENCES Customers(CustomerID) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- --------------------------------------------------------

--
-- 資料表結構 `salesorders`
--

CREATE TABLE IF NOT EXISTS `salesorders` (
  `OrderID` int(10) NOT NULL AUTO_INCREMENT,
  `CustomerID` int(10) NOT NULL,
  `OrderDate` date NOT NULL,
  `TotalAmount` int(10) NOT NULL,
  `PaymentStatus` enum('Unpaid','Paid') NOT NULL,
  `DeliveryStatus` enum('Pending','Shipped','Delivered') NOT NULL,
  PRIMARY KEY (`OrderID`),
  FOREIGN KEY (`CustomerID`) REFERENCES Customers(CustomerID) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `ProductID` int(10) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `Price` int(10) NOT NULL,
  `StockQuantity` int(10) NOT NULL,
  `CategoryID` int(10) NOT NULL,
  PRIMARY KEY (`ProductID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `orderdetails`
--

CREATE TABLE IF NOT EXISTS `orderdetails` (
  `OrderID` int(10) NOT NULL,
  `ProductID` int(10) NOT NULL,
  `Quantity` int(10) NOT NULL,
  `Price` int(10) NOT NULL,
  FOREIGN KEY (`OrderID`) REFERENCES salesorders(OrderID) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`ProductID`) REFERENCES products(ProductID) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `servicerequests`
--

CREATE TABLE IF NOT EXISTS `servicerequests` (
  `RequestID` int(10) NOT NULL AUTO_INCREMENT,
  `CustomerID` int(10) NOT NULL,
  `ProductID` int(10) NOT NULL,
  `IssueDescription` text NOT NULL,
  `RequestDate` date NOT NULL,
  `ResolutionDate` date NOT NULL,
  `Status` enum('Submitted','In Progress','Completed') NOT NULL,
  PRIMARY KEY (`RequestID`),
  FOREIGN KEY (`CustomerID`) REFERENCES Customers(CustomerID) ON DELETE NO ACTION ON UPDATE CASCADE,
  FOREIGN KEY (`ProductID`) REFERENCES products(ProductID) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
