-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 11, 2016 at 04:12 PM
-- Server version: 5.7.16-0ubuntu0.16.04.1
-- PHP Version: 7.0.8-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clothingCloset`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `process_donation` (IN `PERSON_ID` INT(20), IN `cond` VARCHAR(20), IN `category` VARCHAR(10), IN `price` DOUBLE, IN `color` VARCHAR(10), IN `brand` VARCHAR(30), IN `description` VARCHAR(90), IN `item_type` VARCHAR(30), IN `size` VARCHAR(20), OUT `ITEM_ID` INT(20))  BEGIN
	DECLARE EXIT HANDLER FOR SQLEXCEPTION ROLLBACK;
    START TRANSACTION;
			
    INSERT 
		INTO item (
			cond, 
            category, 
            price, 
            color, 
            brand,
            description,
            item_type,
            size,
            item_value
            )
		VALUES
			(
            cond,
            category,
            price,
            color,
            brand,
            description,
            item_type,
            size,
            price
            );
            
	SET ITEM_ID = LAST_INSERT_ID() ;
	
    
    INSERT 
		INTO donation_history
        (
        PERSONID,
        ITEMID,
        valuedAt
        )
        values
        (
        PERSON_ID,
        ITEM_ID,
        price
        );
	COMMIT;
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `process_purchase` (IN `PID` INT(20), OUT `IS_SUCCESS` INT(1))  BEGIN
	DECLARE IS_DONE INT(1);
    DECLARE EACH_ITEM_ID INT(20);
    DECLARE V_ORDER_ID INT(20);
    DECLARE CURS 
			CURSOR FOR SELECT ITEM_ID 
			FROM cart 
			WHERE PERSON_ID = PID;
	DECLARE EXIT HANDLER FOR SQLEXCEPTION ROLLBACK; 
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET IS_DONE = 1;
    START TRANSACTION;
		INSERT INTO bills (PERSONID) VALUES (PID);
		OPEN CURS;
        SET IS_DONE = 0;
        SET IS_SUCCESS = 0; 
        
		REPEAT
			FETCH CURS INTO EACH_ITEM_ID;
			UPDATE item
                SET SOLD = 1
                WHERE ID = EACH_ITEM_ID;
		UNTIL IS_DONE END REPEAT;
		CLOSE CURS;
		DELETE FROM cart WHERE PERSON_ID = PID;
		SET IS_SUCCESS = 1;
		
            
	COMMIT;

    
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(20) DEFAULT NULL,
  `position` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `position`) VALUES
(1, 'DBA'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int(20) NOT NULL,
  `personid` int(20) NOT NULL,
  `purchaseDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `personid`, `purchaseDate`) VALUES
(1, 1, '2016-12-09 12:52:08'),
(2, 1, '2016-12-09 13:12:49'),
(3, 1, '2016-12-09 13:31:38'),
(4, 2, '2016-12-09 14:07:46');

--
-- Triggers `bills`
--
DELIMITER $$
CREATE TRIGGER `bills_AFTER_INSERT` AFTER INSERT ON `bills` FOR EACH ROW BEGIN
	DECLARE IS_DONE INT(1);
	DECLARE EACH_ITEM_ID INT(20);
    DECLARE CURS 
			CURSOR FOR SELECT ITEM_ID 
			FROM cart 
			WHERE PERSON_ID = new.personid;
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET IS_DONE = 1;
	OPEN CURS;
        SET IS_DONE = 0;
        
		REPEAT
			FETCH CURS INTO EACH_ITEM_ID;
            	INSERT INTO purchase_history 
                (billid, personid, itemid)
				values 
                (new.id, new.personid, EACH_ITEM_ID);
		UNTIL IS_DONE END REPEAT;
	CLOSE CURS;
		
    
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `item_id` int(20) NOT NULL,
  `person_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(20) NOT NULL,
  `amount` double DEFAULT '0',
  `newsletter` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `amount`, `newsletter`) VALUES
(1, 810, 0),
(2, 629, 0),
(3, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `donation_history`
--

CREATE TABLE `donation_history` (
  `personid` int(20) NOT NULL,
  `itemid` int(20) NOT NULL,
  `donationdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `valuedAt` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donation_history`
--

INSERT INTO `donation_history` (`personid`, `itemid`, `donationdate`, `valuedAt`) VALUES
(1, 1, '2016-12-09 12:47:18', 50),
(1, 2, '2016-12-09 12:48:19', 50),
(1, 3, '2016-12-09 12:49:41', 30),
(1, 4, '2016-12-09 12:50:48', 80),
(1, 5, '2016-12-09 12:51:25', 100),
(2, 6, '2016-12-09 12:55:23', 60),
(1, 7, '2016-12-09 13:22:17', 500),
(2, 8, '2016-12-09 13:37:05', 40),
(2, 9, '2016-12-09 13:38:19', 29),
(2, 10, '2016-12-09 14:05:05', 500);

--
-- Triggers `donation_history`
--
DELIMITER $$
CREATE TRIGGER `update_amount` AFTER INSERT ON `donation_history` FOR EACH ROW BEGIN
        UPDATE `customer` SET customer.amount=customer.amount+new.valuedAt WHERE customer.id=new.personid;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(20) NOT NULL,
  `item_type` varchar(30) NOT NULL,
  `color` varchar(10) NOT NULL,
  `size` varchar(20) NOT NULL,
  `brand` varchar(30) NOT NULL,
  `cond` varchar(20) NOT NULL,
  `category` varchar(10) NOT NULL,
  `item_value` double NOT NULL,
  `description` varchar(90) NOT NULL,
  `dateOfAcquiring` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `price` double DEFAULT NULL,
  `posteddate` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `reduction` tinyint(1) NOT NULL DEFAULT '0',
  `sold` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `item_type`, `color`, `size`, `brand`, `cond`, `category`, `item_value`, `description`, `dateOfAcquiring`, `price`, `posteddate`, `status`, `reduction`, `sold`) VALUES
(1, 'Shirt', 'Black', 'Small', 'Zara', 'Good', 'Male', 50, '', '2016-12-09 12:47:18', 50, NULL, 1, 0, 1),
(2, 'Skirt', 'White', 'Small', 'Forever 21', 'Good', 'Female', 50, '', '2016-12-09 12:48:19', 50, NULL, 1, 0, 1),
(3, 'Hoodie', 'Blue', 'Small', 'Nike', 'Good', 'Male', 30, '', '2016-12-09 12:49:41', 30, NULL, 1, 0, 1),
(4, 'Dress', 'Red', 'Small', 'Zara', 'Satisfactory', 'Female', 80, '', '2016-12-09 12:50:48', 80, NULL, 1, 0, 1),
(5, 'Dress', 'Blue', 'Small', 'Guess', 'Good', 'Female', 100, '', '2016-12-09 12:51:25', 100, NULL, 1, 0, 1),
(6, 'Shirt', 'Blue', 'Small', 'Lee', 'Good', 'Male', 60, '', '2016-12-09 12:55:23', 60, NULL, 1, 0, 1),
(7, 'casual', 'Blue', 'Large', 'lee', 'Good', 'Male', 500, 'f;kjgefk', '2016-12-09 13:22:17', 400, NULL, 1, 0, 1),
(8, 'shirt', 'Red', 'Medium', 'GAP', 'Good', 'Male', 40, '', '2016-12-09 13:37:05', 40, NULL, 1, 0, 0),
(9, 'Shirt', 'Red', 'Medium', 'Lee', 'Good', 'Male', 29, '', '2016-12-09 13:38:19', 29, NULL, 1, 0, 0),
(10, 'Shirt', 'white', 'Medium', 'abc', 'Good', 'Male', 500, 'fdjsf;kgj fwjrkgd;kkv', '2016-12-09 14:05:05', 40, NULL, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `email` varchar(60) NOT NULL,
  `password` varchar(20) NOT NULL,
  `personid` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`email`, `password`, `personid`) VALUES
('amritbulusu@gmail.com', 'amrit', 1),
('gowthamk63@gmail.com', 'gowtham', 2),
('syeturu1@unccc.edu', 'abcd', 3);

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `id` int(20) NOT NULL,
  `name` varchar(120) NOT NULL,
  `email` varchar(60) NOT NULL,
  `address` varchar(40) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(40) NOT NULL,
  `zip` varchar(6) NOT NULL,
  `phone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`id`, `name`, `email`, `address`, `city`, `state`, `zip`, `phone`) VALUES
(1, 'amritbulusu', 'amritbulusu@gmail.com', '204 Barton Creek Drive', 'Charlotte', 'NC', '28262', '3103449469'),
(2, 'gowthamkommi', 'gowthamk63@gmail.com', '430 Barton Creek drive', 'Charlotte', 'NC', '28262', '3103449469'),
(3, 'saikalyan', 'syeturu1@unccc.edu', '430 Barton creek drive', 'charlotte', 'nc', '28262', '1111111111');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_history`
--

CREATE TABLE `purchase_history` (
  `billid` int(20) NOT NULL,
  `purchaseDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `itemid` int(20) NOT NULL,
  `personid` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_history`
--

INSERT INTO `purchase_history` (`billid`, `purchaseDate`, `itemid`, `personid`) VALUES
(1, '2016-12-09 12:52:08', 1, 1),
(1, '2016-12-09 12:52:08', 1, 1),
(2, '2016-12-09 13:12:49', 2, 1),
(2, '2016-12-09 13:12:49', 2, 1),
(3, '2016-12-09 13:31:38', 3, 1),
(3, '2016-12-09 13:31:38', 4, 1),
(3, '2016-12-09 13:31:38', 4, 1),
(4, '2016-12-09 14:07:46', 5, 2),
(4, '2016-12-09 14:07:46', 6, 2),
(4, '2016-12-09 14:07:46', 7, 2),
(4, '2016-12-09 14:07:46', 7, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD KEY `id` (`id`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `personid` (`personid`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD KEY `person_id` (`person_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD KEY `Customer_ibfk_1` (`id`);

--
-- Indexes for table `donation_history`
--
ALTER TABLE `donation_history`
  ADD KEY `donation_history_ibfk_1` (`personid`),
  ADD KEY `donation_history_ibfk_2` (`itemid`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD KEY `personid` (`personid`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`,`email`);

--
-- Indexes for table `purchase_history`
--
ALTER TABLE `purchase_history`
  ADD KEY `bills_index` (`billid`,`itemid`),
  ADD KEY `itemid` (`itemid`),
  ADD KEY `personid` (`personid`),
  ADD KEY `billid` (`billid`,`itemid`,`personid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`id`) REFERENCES `person` (`id`);

--
-- Constraints for table `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_ibfk_1` FOREIGN KEY (`personid`) REFERENCES `person` (`id`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`),
  ADD CONSTRAINT `cart_ibfk_3` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`id`) REFERENCES `person` (`id`);

--
-- Constraints for table `donation_history`
--
ALTER TABLE `donation_history`
  ADD CONSTRAINT `donation_history_ibfk_1` FOREIGN KEY (`personid`) REFERENCES `person` (`id`),
  ADD CONSTRAINT `donation_history_ibfk_2` FOREIGN KEY (`itemid`) REFERENCES `item` (`id`);

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`personid`) REFERENCES `person` (`id`);

--
-- Constraints for table `purchase_history`
--
ALTER TABLE `purchase_history`
  ADD CONSTRAINT `purchase_history_ibfk_1` FOREIGN KEY (`itemid`) REFERENCES `item` (`id`),
  ADD CONSTRAINT `purchase_history_ibfk_2` FOREIGN KEY (`personid`) REFERENCES `person` (`id`),
  ADD CONSTRAINT `purchase_history_ibfk_3` FOREIGN KEY (`billid`) REFERENCES `bills` (`id`);

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `price_reduction` ON SCHEDULE EVERY 1 MONTH STARTS '2016-12-09 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE item SET price=price*0.5 where sold=0$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
