-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2014 at 01:11 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dms`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_distributor`
--

CREATE TABLE IF NOT EXISTS `tbl_distributor` (
  `distributor_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `zone_id` bigint(20) NOT NULL,
  `name` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `creation_date` datetime NOT NULL,
  `created_by` bigint(20) NOT NULL,
  PRIMARY KEY (`distributor_id`),
  UNIQUE KEY `user_id_UNIQUE` (`user_id`),
  UNIQUE KEY `zone_id_UNIQUE` (`zone_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_distributor`
--

INSERT INTO `tbl_distributor` (`distributor_id`, `user_id`, `zone_id`, `name`, `address`, `phone`, `creation_date`, `created_by`) VALUES
(8, 1, 3, 'Hasan', 'dhaka', '713131313', '2014-10-29 09:40:38', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_percentage`
--

CREATE TABLE IF NOT EXISTS `tbl_percentage` (
  `percentage_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `distributor_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `percetage_amount` float NOT NULL,
  `ref_no` varchar(45) NOT NULL,
  `creation_date` datetime NOT NULL,
  `created_by` bigint(20) NOT NULL,
  PRIMARY KEY (`percentage_id`),
  UNIQUE KEY `ref_no_UNIQUE` (`ref_no`),
  KEY `fk_tbl_percentage_tbl_distributor1_idx` (`distributor_id`),
  KEY `fk_tbl_percentage_tbl_product1_idx` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE IF NOT EXISTS `tbl_product` (
  `product_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `price` float NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `creation_date` datetime NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `name`, `price`, `created_by`, `creation_date`) VALUES
(1, 'Nokia 3250', 4500, 1, '2014-10-29 10:25:55'),
(2, 'Nokia 3310', 3250, 1, '2014-10-29 10:27:29'),
(3, 'Symphony W20', 4500, 1, '2014-10-29 10:29:19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sale`
--

CREATE TABLE IF NOT EXISTS `tbl_sale` (
  `sale_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `distributor_id` bigint(20) NOT NULL,
  `ref_no` varchar(45) NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `creation_date` datetime NOT NULL,
  PRIMARY KEY (`sale_id`),
  KEY `fk_tbl_sale_tbl_target1_idx` (`ref_no`),
  KEY `fk_tbl_sale_tbl_distributor1_idx` (`distributor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_target`
--

CREATE TABLE IF NOT EXISTS `tbl_target` (
  `target_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `distributor_id` bigint(20) NOT NULL,
  `target_price` float NOT NULL,
  `fullfill_price` float NOT NULL,
  `creation_date` datetime NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `ref_no` varchar(45) NOT NULL,
  PRIMARY KEY (`target_id`),
  KEY `fk_tbl_target_tbl_percentage1_idx` (`ref_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `user_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(45) NOT NULL,
  `pass` varchar(45) NOT NULL,
  `user_type` enum('a','d') NOT NULL,
  `user_status` enum('0','1') NOT NULL,
  `creation_date` varchar(45) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `pass`, `user_type`, `user_status`, `creation_date`) VALUES
(1, 'khokon', '1234', 'a', '1', '2014-10-29 02:39:12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_zone`
--

CREATE TABLE IF NOT EXISTS `tbl_zone` (
  `zone_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `zone_name` varchar(45) NOT NULL,
  `creation_date` datetime NOT NULL,
  `created_by` bigint(20) NOT NULL,
  PRIMARY KEY (`zone_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_zone`
--

INSERT INTO `tbl_zone` (`zone_id`, `zone_name`, `creation_date`, `created_by`) VALUES
(2, 'Mohakhali', '2014-10-29 08:31:47', 1),
(3, 'Banani', '2014-10-29 08:38:16', 1),
(4, 'Farmgate', '2014-10-29 08:47:50', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_distributor`
--
ALTER TABLE `tbl_distributor`
  ADD CONSTRAINT `fk_tbl_distributor_tbl_user` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_distributor_tbl_zone1` FOREIGN KEY (`zone_id`) REFERENCES `tbl_zone` (`zone_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_percentage`
--
ALTER TABLE `tbl_percentage`
  ADD CONSTRAINT `fk_tbl_percentage_tbl_distributor1` FOREIGN KEY (`distributor_id`) REFERENCES `tbl_distributor` (`distributor_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_percentage_tbl_product1` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_sale`
--
ALTER TABLE `tbl_sale`
  ADD CONSTRAINT `fk_tbl_sale_tbl_distributor1` FOREIGN KEY (`distributor_id`) REFERENCES `tbl_distributor` (`distributor_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_sale_tbl_target1` FOREIGN KEY (`ref_no`) REFERENCES `tbl_target` (`ref_no`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_target`
--
ALTER TABLE `tbl_target`
  ADD CONSTRAINT `fk_tbl_target_tbl_percentage1` FOREIGN KEY (`ref_no`) REFERENCES `tbl_percentage` (`ref_no`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
