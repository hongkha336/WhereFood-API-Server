/*
SQLyog Community v13.1.5  (64 bit)
MySQL - 5.7.26 : Database - whererfood
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`wherefood` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;

USE `wherefood`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `Account` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `HashPassWord` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Role` int(11) DEFAULT NULL,
  `Status` bit(1) DEFAULT NULL,
  PRIMARY KEY (`Account`),
  KEY `Role` (`Role`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `admin_role`;

CREATE TABLE `admin_role` (
  `Role` int(11) NOT NULL AUTO_INCREMENT,
  `RoleName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Role`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `food`;

CREATE TABLE `food` (
  `FoodID` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `FoodName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `PictureToken` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Prices` bigint(20) DEFAULT NULL,
  `ShortDescription` text COLLATE utf8_unicode_ci,
  `LongDescriptioon` text COLLATE utf8_unicode_ci,
  `AvgSurvey` float DEFAULT NULL,
  `RestaurantID` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Status` int NOT NULL,
  PRIMARY KEY (`FoodID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



DROP TABLE IF EXISTS `food_comment`;

CREATE TABLE `food_comment` (
  `FoodID` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `UserID` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `CommentID` int(11) NOT NULL AUTO_INCREMENT,
  `CommentToken` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CommentContent` text COLLATE utf8_unicode_ci NOT NULL,
  `Status` int NOT NULL,
  PRIMARY KEY (`CommentID`),
  KEY `UserID` (`UserID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



DROP TABLE IF EXISTS `food_survey`;

CREATE TABLE `food_survey` (
  `FoodID` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `UserID` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SurveyPoint` int(11) NOT NULL,
  PRIMARY KEY (`FoodID`,`UserID`),
  KEY `UserID` (`UserID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `permalink_pictures`;

CREATE TABLE `permalink_picture` (
  `FCP_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Token` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `PicturePermalink` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`FCP_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `reporttype`;

CREATE TABLE `reporttype` (
  `ReportTypeID` int(11) NOT NULL AUTO_INCREMENT,
  `TypeName` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ReportTypeID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



DROP TABLE IF EXISTS `sever_setting`;

CREATE TABLE `sever_setting` (
  `_key` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `_value` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`_key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `UserAccount` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `HashPassWord` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `RegisteredTime` bigint(20) NOT NULL,
  `FullName` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DateOfBirth` bigint(20) DEFAULT NULL,
  `PhoneNumber` varchar(14) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Status` bit(1) DEFAULT NULL,
  PRIMARY KEY (`UserAccount`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



DROP TABLE IF EXISTS `user_bookmark`;

CREATE TABLE `user_bookmark` (
  `UserAccount` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `FoodID` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`UserAccount`,`FoodID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



DROP TABLE IF EXISTS `user_contribution`;

CREATE TABLE `user_contribution` (
  `UserAccount` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `RestaurantID` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ReportTime` bigint(20) NOT NULL,
  `Comment` text COLLATE utf8_unicode_ci NOT NULL,
  `Status` int NOT NULL,
  PRIMARY KEY (`UserAccount`,`RestaurantID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `user_report`;

CREATE TABLE `user_report` (
  `ReportID` int(11) NOT NULL AUTO_INCREMENT,
  `UserAccount` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ReportTypeID` int(11) NOT NULL,
  `MetaData1` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MetaData2` text COLLATE utf8_unicode_ci NOT NULL,
  `Status` int DEFAULT NULL,
  PRIMARY KEY (`ReportID`),
  KEY `ReportTypeID` (`ReportTypeID`),
  KEY `UserAccount` (`UserAccount`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `restaurant`;

CREATE TABLE `restaurant` (
  `RestaurantID` int COLLATE utf8_unicode_ci NOT NULL AUTO_INCREMENT,
  `RestaurantName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `RestaurantAddress` varchar(255) DEFAULT NULL,
  `Longitude` varchar(50) DEFAULT NULL,
  `Latitude` varchar(50) DEFAULT NULL,
  `Status` int DEFAULT NULL,
  PRIMARY KEY (`Account`),
  KEY `Role` (`Role`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

