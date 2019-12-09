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
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ktcxwvpv_wherefood` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;

USE `ktcxwvpv_wherefood`;

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

/*Data for the table `admin` */

/*Table structure for table `admin_role` */

DROP TABLE IF EXISTS `admin_role`;

CREATE TABLE `admin_role` (
  `Role` int(11) NOT NULL AUTO_INCREMENT,
  `RoleName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Role`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `admin_role` */

/*Table structure for table `food` */

DROP TABLE IF EXISTS `food`;

CREATE TABLE `food` (
  `FoodID` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `FoodName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `PictureToken` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Prices` bigint(20) DEFAULT NULL,
  `ShortDescription` text COLLATE utf8_unicode_ci,
  `LongDescription` text COLLATE utf8_unicode_ci,
  `AvgSurvey` float DEFAULT NULL,
  `RestaurantID` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Status` int NOT NULL,
  PRIMARY KEY (`FoodID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `food` */

/*Table structure for table `food_comment` */

DROP TABLE IF EXISTS `food_comment`;

CREATE TABLE `food_comment` (
  `FoodID` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `UserID` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `CommentID` int(11) NOT NULL,
  `CommentToken` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CommentContent` text COLLATE utf8_unicode_ci NOT NULL,
  `Status` int NOT NULL,
  PRIMARY KEY (`FoodID`,`UserID`,`CommentID`),
  KEY `UserID` (`UserID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `food_comment` */

/*Table structure for table `food_survey` */

DROP TABLE IF EXISTS `food_survey`;

CREATE TABLE `food_survey` (
  `FoodID` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `UserID` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SurveyPoint` int(11) NOT NULL,
  PRIMARY KEY (`FoodID`,`UserID`),
  KEY `UserID` (`UserID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `food_survey` */

/*Table structure for table `permalink_pictures` */

DROP TABLE IF EXISTS `permalink_pictures`;

CREATE TABLE `permalink_picture` (
  `FCP_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Token` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `PicturePermalink` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`FCP_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `permalink_pictures` */

/*Table structure for table `reporttype` */

DROP TABLE IF EXISTS `reporttype`;

CREATE TABLE `reporttype` (
  `ReportTypeID` int(11) NOT NULL AUTO_INCREMENT,
  `TypeName` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ReportTypeID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `reporttype` */

/*Table structure for table `sever_setting` */

DROP TABLE IF EXISTS `sever_setting`;

CREATE TABLE `sever_setting` (
  `_key` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `_value` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`_key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `sever_setting` */

/*Table structure for table `user` */

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

/*Data for the table `user` */

/*Table structure for table `user_bookmark` */

DROP TABLE IF EXISTS `user_bookmark`;

CREATE TABLE `user_bookmark` (
  `UserAccount` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `FoodID` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`UserAccount`,`FoodID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `user_bookmark` */

/*Table structure for table `user_contribution` */

DROP TABLE IF EXISTS `user_contribution`;

CREATE TABLE `user_contribution` (
  `UserAccount` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `RestaurantID` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ReportTime` bigint(20) NOT NULL,
  `Comment` text COLLATE utf8_unicode_ci NOT NULL,
  `Status` int NOT NULL,
  PRIMARY KEY (`UserAccount`,`RestaurantID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `user_contribution` */

/*Table structure for table `user_report` */

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
  `RestaurantID` int COLLATE utf8_unicode_ci NOT NULL,
  `RestaurantName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `RestaurantAddress` int(11) DEFAULT NULL,
  `Status` int DEFAULT NULL,
  PRIMARY KEY (`RestaurantID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `user_report` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
