-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2013 at 03:07 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `demo`
--
CREATE DATABASE IF NOT EXISTS `demo` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `demo`;

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetProduct`(IN In_Product_Name VARCHAR(255))
BEGIN
 SELECT * FROM products
 WHERE ProductName like "In_Product_Name";
   END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetProductByName`( IN In_Product_Name VARCHAR( 100 ) )
BEGIN 

SELECT p.ProductID, p.ProductName, s.CompanyName, p.UnitsInStock FROM suppliers AS s, products AS p WHERE( p.ProductName LIKE CONCAT('%',In_Product_Name,'%') )AND  (p.SupplierID = s.SupplierID);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SearchProductByName`(
IN in_product_name VARCHAR(100))
BEGIN
SELECT *
FROM `products`
WHERE Productname like "%in_product_name%";
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `ProductID` int(11) NOT NULL AUTO_INCREMENT,
  `ProductName` varchar(40) CHARACTER SET latin1 DEFAULT NULL,
  `SupplierID` int(11) DEFAULT NULL,
  `UnitsInStock` varchar(20) CHARACTER SET latin1 DEFAULT '0',
  PRIMARY KEY (`ProductID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=78 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductID`, `ProductName`, `SupplierID`, `UnitsInStock`) VALUES
(1, 'Chai', 1, '39'),
(2, 'Chang', 1, '17'),
(3, 'Aniseed Syrup', 1, '13'),
(4, 'Chef Anton''s Cajun Seasoning', 2, '53'),
(5, 'Chef Anton''s Gumbo Mix', 2, '0'),
(6, 'Grandma''s Boysenberry Spread', 3, '120'),
(7, 'Uncle Bob''s Organic Dried Pears', 3, '15'),
(8, 'Northwoods Cranberry Sauce', 3, '6'),
(9, 'Mishi Kobe Niku', 4, '29'),
(10, 'Ikura', 4, '31'),
(11, 'Queso Cabrales', 5, '22'),
(12, 'Queso Manchego La Pastora', 5, '86'),
(13, 'Konbu', 6, '24'),
(14, 'Tofu', 6, '35'),
(15, 'Genen Shouyu', 6, '39'),
(16, 'Pavlova', 7, '29'),
(17, 'Alice Mutton', 7, '0'),
(18, 'Carnarvon Tigers', 7, '42'),
(19, 'Teatime Chocolate Biscuits', 8, '25'),
(20, 'Sir Rodney''s Marmalade', 8, '40'),
(21, 'Sir Rodney''s Scones', 8, '3'),
(22, 'Gustaf''s Kn?ckebr?d', 9, '104'),
(23, 'Tunnbr?d', 9, '61'),
(24, 'Guaran? Fant?stica', 10, '20'),
(25, 'NuNuCa Nu?-Nougat-Creme', 11, '76'),
(26, 'Gumb?r Gummib?rchen', 11, '15'),
(27, 'Schoggi Schokolade', 11, '49'),
(28, 'R?ssle Sauerkraut', 12, '26'),
(29, 'Th?ringer Rostbratwurst', 12, '0'),
(30, 'Nord-Ost Matjeshering', 13, '10'),
(31, 'Gorgonzola Telino', 14, '0'),
(32, 'Mascarpone Fabioli', 14, '9'),
(33, 'Geitost', 15, '112'),
(34, 'Sasquatch Ale', 16, '111'),
(35, 'Steeleye Stout', 16, '20'),
(36, 'Inlagd Sill', 17, '112'),
(37, 'Gravad lax', 17, '11'),
(38, 'C?te de Blaye', 18, '17'),
(39, 'Chartreuse verte', 18, '69'),
(40, 'Boston Crab Meat', 19, '123'),
(41, 'Jack''s New England Clam Chowder', 19, '85'),
(42, 'Singaporean Hokkien Fried Mee', 20, '26'),
(43, 'Ipoh Coffee', 20, '17'),
(44, 'Gula Malacca', 20, '27'),
(45, 'R?gede sild', 21, '5'),
(46, 'Spegesild', 21, '95'),
(47, 'Zaanse koeken', 22, '36'),
(48, 'Chocolade', 22, '15'),
(49, 'Maxilaku', 23, '10'),
(50, 'Valkoinen suklaa', 23, '65'),
(51, 'Manjimup Dried Apples', 24, '20'),
(52, 'Filo Mix', 24, '38'),
(53, 'Perth Pasties', 24, '0'),
(54, 'Tourti?re', 25, '21'),
(55, 'P?t? chinois', 25, '115'),
(56, 'Gnocchi di nonna Alice', 26, '21'),
(57, 'Ravioli Angelo', 26, '36'),
(58, 'Escargots de Bourgogne', 27, '62'),
(59, 'Raclette Courdavault', 28, '79'),
(60, 'Camembert Pierrot', 28, '19'),
(61, 'Sirop d''?rable', 29, '113'),
(62, 'Tarte au sucre', 29, '17'),
(63, 'Vegie-spread', 7, '24'),
(64, 'Wimmers gute Semmelkn?del', 12, '22'),
(65, 'Louisiana Fiery Hot Pepper Sauce', 2, '76'),
(66, 'Louisiana Hot Spiced Okra', 2, '4'),
(67, 'Laughing Lumberjack Lager', 16, '52'),
(68, 'Scottish Longbreads', 8, '6'),
(69, 'Gudbrandsdalsost', 15, '26'),
(70, 'Outback Lager', 7, '15'),
(71, 'Fl?temysost', 15, '26'),
(72, 'Mozzarella di Giovanni', 14, '14'),
(73, 'R?d Kaviar', 17, '101'),
(74, 'Longlife Tofu', 4, '4'),
(75, 'Rh?nbr?u Klosterbier', 12, '125'),
(76, 'Lakkalik??ri', 23, '57'),
(77, 'Original Frankfurter gr?ne So?e', 12, '32');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE IF NOT EXISTS `suppliers` (
  `SupplierID` int(11) NOT NULL AUTO_INCREMENT,
  `CompanyName` varchar(40) DEFAULT NULL,
  `ContactName` varchar(30) DEFAULT NULL,
  `ContactTitle` varchar(30) DEFAULT NULL,
  `Address` varchar(60) DEFAULT NULL,
  `City` varchar(15) DEFAULT NULL,
  `Region` varchar(15) DEFAULT NULL,
  `PostalCode` varchar(10) DEFAULT NULL,
  `Country` varchar(15) DEFAULT NULL,
  `Phone` varchar(24) DEFAULT NULL,
  `Fax` varchar(24) DEFAULT NULL,
  `HomePage` text,
  PRIMARY KEY (`SupplierID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`SupplierID`, `CompanyName`, `ContactName`, `ContactTitle`, `Address`, `City`, `Region`, `PostalCode`, `Country`, `Phone`, `Fax`, `HomePage`) VALUES
(1, 'Exotic Liquids', 'Charlotte Cooper', 'Purchasing Manager', '49 Gilbert St.', 'London', '', 'EC1 4SD', 'United Kingdom', '(171) 555-2222', '', ''),
(2, 'New Orleans Cajun Delights', 'Shelley Burke', 'Order Administrator', 'P.O. Box 78934', 'New Orleans', 'LA', '70117', 'United States', '(100) 555-4822', '', '#CAJUN.HTM#'),
(3, 'Grandma Kelly''s Homestead', 'Regina Murphy', 'Sales Representative', '707 Oxford Rd.', 'Ann Arbor', 'MI', '48104', 'United States', '(313) 555-5735', '(313) 555-3349', ''),
(4, 'Tokyo Traders', 'Yoshi Nagase', 'Marketing Manager', '9-8 Sekimai\r\nMUnited Statesshino-shi', 'Tokyo', '', '100', 'Japan', '(03) 3555-5011', '', ''),
(5, 'Cooperativa de Quesos ''Las Cabras''', 'Antonio del Valle Saavedra', 'Export Administrator', 'Calle del Rosal 4', 'Oviedo', 'Asturias', '33007', 'Spain', '(98) 598 76 54', '', ''),
(6, 'Mayumi''s', 'Mayumi Ohno', 'Marketing Representative', '92 Setsuko\r\nChuo-ku', 'Osaka', '', '545', 'Japan', '(06) 431-7877', '', 'Mayumi''s (on the World Wide Web)#http://www.microsoft.com/accessdev/sampleapps/mayumi.htm#'),
(7, 'Pavlova, Ltd.', 'Ian Devling', 'Marketing Manager', '74 Rose St.\r\nMoonie Ponds', 'Melbourne', 'Victoria', '3058', 'Australia', '(03) 444-2343', '(03) 444-6588', ''),
(8, 'Specialty Biscuits, Ltd.', 'Peter Wilson', 'Sales Representative', '29 King''s Way', 'Manchester', '', 'M14 GSD', 'United Kingdom', '(161) 555-4448', '', ''),
(9, 'PB Kn?ckebr?d AB', 'Lars Peterson', 'Sales Agent', 'Kaloadagatan 13', 'G?teborg', '', 'S-345 67', 'Sweden', '031-987 65 43', '031-987 65 91', ''),
(10, 'Refrescos Americanas LTDA', 'Carlos Diaz', 'Marketing Manager', 'Av. das Americanas 12.890', 'S?o Paulo', '', '5442', 'Brazil', '(11) 555 4640', '', ''),
(11, 'Heli S??waren GmbH & Co. KG', 'Petra Winkler', 'Sales Manager', 'Tiergartenstra?e 5', 'Berlin', '', '10785', 'Germany', '(010) 9984510', '', ''),
(12, 'Plutzer Lebensmittelgro?m?rkte AG', 'Martin Bein', 'International Marketing Mgr.', 'Bogenallee 51', 'Frankfurt', '', '60439', 'Germany', '(069) 992755', '', 'Plutzer (on the World Wide Web)#http://www.microsoft.com/accessdev/sampleapps/plutzer.htm#'),
(13, 'Nord-Ost-Fisch Handelsgesellschaft mbH', 'Sven Petersen', 'Coordinator Foreign Markets', 'Frahmredder 112a', 'Cuxhaven', '', '27478', 'Germany', '(04721) 8713', '(04721) 8714', ''),
(14, 'Formaggi Fortini s.r.l.', 'Elio Rossi', 'Sales Representative', 'Viale Dante, 75', 'Ravenna', '', '48100', 'Italy', '(0544) 60323', '(0544) 60603', '#FORMAGGI.HTM#'),
(15, 'Norske Meierier', 'Beate Vileid', 'Marketing Manager', 'Hatlevegen 5', 'Sandvika', '', '1320', 'Norway', '(0)2-953010', '', ''),
(16, 'Bigfoot Breweries', 'Cheryl Saylor', 'Regional Account Rep.', '3400 - 8th Avenue\r\nSuite 210', 'Bend', 'OR', '97101', 'United States', '(503) 555-9931', '', ''),
(17, 'Svensk Sj?f?da AB', 'Michael Bj?rn', 'Sales Representative', 'Brovallav?gen 231', 'Stockholm', '', 'S-123 45', 'Sweden', '08-123 45 67', '', ''),
(18, 'Aux joyeux eccl?siastiques', 'Guyl?ne Nodier', 'Sales Manager', '203, Rue des Francs-Bourgeois', 'Paris', '', '75004', 'France', '(1) 03.83.00.68', '(1) 03.83.00.62', ''),
(19, 'New England Seafood Cannery', 'Robb Merchant', 'Wholesale Account Agent', 'Order Processing Dept.\r\n2100 Paul Revere Blvd.', 'Boston', 'MA', '02134', 'United States', '(617) 555-3267', '(617) 555-3389', ''),
(20, 'Leka Trading', 'Chandra Leka', 'Owner', '471 Serangoon Loop, Suite #402', 'Singapore', '', '0512', 'Singapore', '555-8787', '', ''),
(21, 'Lyngbysild', 'Niels Petersen', 'Sales Manager', 'Lyngbysild\r\nFiskebakken 10', 'Lyngby', '', '2800', 'Denmark', '43844108', '43844115', ''),
(22, 'Zaanse Snoepfabriek', 'Dirk Luchte', 'Accounting Manager', 'Verkoop\r\nRijnweg 22', 'Zaandam', '', '9999 ZZ', 'Netherlands', '(12345) 1212', '(12345) 1210', ''),
(23, 'Karkki Oy', 'Anne Heikkonen', 'Product Manager', 'Valtakatu 12', 'Lappeenranta', '', '53120', 'Finland', '(953) 10956', '', ''),
(24, 'G''day, Mate', 'Wendy Mackenzie', 'Sales Representative', '170 Prince Edward Parade\r\nHunter''s Hill', 'Sydney', 'NSW', '2042', 'Australia', '(02) 555-5914', '(02) 555-4873', 'G''day Mate (on the World Wide Web)#http://www.microsoft.com/accessdev/sampleapps/gdaymate.htm#'),
(25, 'Ma Maison', 'Jean-Guy Lauzon', 'Marketing Manager', '2960 Rue St. Laurent', 'Montr?al', 'Qu?bec', 'H1J 1C3', 'Canada', '(514) 555-9022', '', ''),
(26, 'Pasta Buttini s.r.l.', 'Giovanni Giudici', 'Order Administrator', 'Via dei Gelsomini, 153', 'Salerno', '', '84100', 'Italy', '(089) 6547665', '(089) 6547667', ''),
(27, 'Escargots Nouveaux', 'Marie Delamare', 'Sales Manager', '22, rue H. Voiron', 'Montceau', '', '71300', 'France', '85.57.00.07', '', ''),
(28, 'Gai p?turage', 'Eliane Noz', 'Sales Representative', 'Bat. B\r\n3, rue des Alpes', 'Annecy', '', '74000', 'France', '38.76.98.06', '38.76.98.58', ''),
(29, 'For?ts d''?rables', 'Chantal Goulet', 'Accounting Manager', '148 rue Chasseur', 'Ste-Hyacinthe', 'Qu?bec', 'J2S 7S8', 'Canada', '(514) 555-2955', '(514) 555-2921', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci,
  `fullname` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `fullname`) VALUES
('admin', '123456', 'Nguyễn Văn A'),
('nguyenvanb', 'nguyenvanb', 'Nguyễn Văn B');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
