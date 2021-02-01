/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.13-MariaDB : Database - dbhotel
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dbhotel` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `dbhotel`;

/*Table structure for table `amenities` */

DROP TABLE IF EXISTS `amenities`;

CREATE TABLE `amenities` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `banner_collections` */

DROP TABLE IF EXISTS `banner_collections`;

CREATE TABLE `banner_collections` (
  `banner_collection_id` int(4) unsigned NOT NULL,
  `name` varchar(32) NOT NULL,
  PRIMARY KEY (`banner_collection_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `banners` */

DROP TABLE IF EXISTS `banners`;

CREATE TABLE `banners` (
  `banner_id` int(9) unsigned NOT NULL,
  `banner_collection_id` int(9) unsigned NOT NULL,
  `name` varchar(128) NOT NULL,
  `heading` varchar(128) NOT NULL,
  `description` text NOT NULL,
  `enable_date` date NOT NULL,
  `disable_date` date NOT NULL,
  `image` varchar(64) NOT NULL,
  `link` varchar(128) DEFAULT NULL,
  `new_window` tinyint(1) DEFAULT NULL,
  `sequence` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`banner_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `cities` */

DROP TABLE IF EXISTS `cities`;

CREATE TABLE `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `state_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47584 DEFAULT CHARSET=latin1;

/*Table structure for table `countries` */

DROP TABLE IF EXISTS `countries`;

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `sortname` varchar(3) NOT NULL,
  `name` varchar(150) NOT NULL,
  `sequence` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `coupons` */

DROP TABLE IF EXISTS `coupons`;

CREATE TABLE `coupons` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `type` enum('Percentage','Fixed','','') NOT NULL,
  `value` varchar(255) NOT NULL,
  `date_from` datetime NOT NULL,
  `date_to` datetime NOT NULL,
  `min_amount` decimal(10,2) NOT NULL,
  `max_amount` decimal(10,2) NOT NULL,
  `include_user` text NOT NULL,
  `exclude_user` text NOT NULL,
  `include_room_type` text NOT NULL,
  `exclude_room_type` text NOT NULL,
  `limit_per_user` int(11) DEFAULT NULL,
  `limit_per_coupon` int(11) DEFAULT NULL,
  `paid_services` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Table structure for table `currency` */

DROP TABLE IF EXISTS `currency`;

CREATE TABLE `currency` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `isd` varchar(32) NOT NULL,
  `iso_alpha2` varchar(2) DEFAULT NULL,
  `iso_alpha3` varchar(3) DEFAULT NULL,
  `iso_numeric` int(11) DEFAULT NULL,
  `currency_code` char(3) DEFAULT NULL,
  `currency_name` varchar(32) DEFAULT NULL,
  `currrency_symbol` varchar(55) DEFAULT NULL,
  `flag` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Table structure for table `departments` */

DROP TABLE IF EXISTS `departments`;

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `designation` */

DROP TABLE IF EXISTS `designation`;

CREATE TABLE `designation` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `expanses` */

DROP TABLE IF EXISTS `expanses`;

CREATE TABLE `expanses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `expanses_category_id` int(10) unsigned NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `remarks` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Table structure for table `expenses_category` */

DROP TABLE IF EXISTS `expenses_category`;

CREATE TABLE `expenses_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Table structure for table `facilities` */

DROP TABLE IF EXISTS `facilities`;

CREATE TABLE `facilities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(556) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Table structure for table `facilities_images` */

DROP TABLE IF EXISTS `facilities_images`;

CREATE TABLE `facilities_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  `is_featured` int(11) NOT NULL,
  `facilities_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Table structure for table `floors` */

DROP TABLE IF EXISTS `floors`;

CREATE TABLE `floors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `floor_no` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Table structure for table `gallery` */

DROP TABLE IF EXISTS `gallery`;

CREATE TABLE `gallery` (
  `id` int(11) unsigned NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `guests` */

DROP TABLE IF EXISTS `guests`;

CREATE TABLE `guests` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `gender` tinyint(1) NOT NULL DEFAULT 0,
  `dob` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(40) NOT NULL,
  `country_id` int(10) unsigned NOT NULL,
  `state_id` int(10) unsigned NOT NULL,
  `city_id` int(10) unsigned NOT NULL,
  `address` text NOT NULL,
  `mobile` varchar(32) NOT NULL,
  `id_type` varchar(255) DEFAULT NULL,
  `id_no` varchar(128) NOT NULL,
  `id_upload` varchar(255) DEFAULT NULL,
  `remark` text NOT NULL,
  `added` datetime DEFAULT NULL,
  `vip` tinyint(1) NOT NULL DEFAULT 0,
  `token` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Table structure for table `house_keeping_status` */

DROP TABLE IF EXISTS `house_keeping_status`;

CREATE TABLE `house_keeping_status` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `short_description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `housekeeping` */

DROP TABLE IF EXISTS `housekeeping`;

CREATE TABLE `housekeeping` (
  `id` int(10) unsigned NOT NULL,
  `room_id` int(10) unsigned NOT NULL,
  `housekeeping_status` int(10) unsigned NOT NULL,
  `room_availblity` varchar(255) DEFAULT NULL,
  `remark` text NOT NULL,
  `assigned_to` int(10) unsigned NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `language` */

DROP TABLE IF EXISTS `language`;

CREATE TABLE `language` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(128) NOT NULL,
  `flag` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `mail_templates` */

DROP TABLE IF EXISTS `mail_templates`;

CREATE TABLE `mail_templates` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `content` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `menus` */

DROP TABLE IF EXISTS `menus`;

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `position` tinyint(1) DEFAULT NULL COMMENT '1.Other, 2.Top, 3.Bottom',
  `content` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `orders` */

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_no` varchar(255) NOT NULL,
  `txn_id` varchar(255) DEFAULT NULL,
  `guest_id` int(11) unsigned NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `adults` tinyint(4) unsigned NOT NULL,
  `kids` tinyint(4) unsigned NOT NULL DEFAULT 0,
  `room_type_id` int(10) unsigned NOT NULL,
  `room_id` int(11) NOT NULL,
  `ordered_on` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `payment_status` tinyint(1) NOT NULL DEFAULT 0,
  `payment_gateway_status` varchar(255) DEFAULT NULL,
  `payment_gateway_name` varchar(255) DEFAULT NULL,
  `base_price` decimal(10,2) NOT NULL,
  `additional_person` tinyint(4) NOT NULL DEFAULT 0,
  `additional_person_amount` decimal(10,2) DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL,
  `taxamount` decimal(10,2) NOT NULL,
  `paid_service_amount` decimal(10,2) DEFAULT NULL,
  `totalamount` decimal(10,2) NOT NULL,
  `advance_amount` decimal(10,2) NOT NULL,
  `nights` tinyint(4) NOT NULL DEFAULT 0,
  `currency` varchar(32) NOT NULL,
  `currency_unit` decimal(10,4) NOT NULL,
  `coupon` varchar(255) DEFAULT NULL,
  `coupon_discount` decimal(10,2) DEFAULT NULL,
  `after_coupon_totalamount` decimal(10,2) DEFAULT NULL,
  `free_paid_services` text NOT NULL,
  `free_paid_services_title` text NOT NULL,
  `free_paid_services_amount` decimal(10,2) DEFAULT NULL,
  `is_new` tinyint(1) NOT NULL DEFAULT 0,
  `is_cancel_by_guest` tinyint(1) NOT NULL DEFAULT 0,
  `is_cancel_view` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Table structure for table `pages` */

DROP TABLE IF EXISTS `pages`;

CREATE TABLE `pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Table structure for table `payment` */

DROP TABLE IF EXISTS `payment`;

CREATE TABLE `payment` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(11) unsigned NOT NULL,
  `date_time` datetime DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL,
  `invoice` int(11) unsigned NOT NULL,
  `is_main_amount` tinyint(1) NOT NULL DEFAULT 0,
  `payment_method` varchar(255) DEFAULT NULL,
  `added_date` date DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Table structure for table `price_manager` */

DROP TABLE IF EXISTS `price_manager`;

CREATE TABLE `price_manager` (
  `id` int(10) unsigned NOT NULL,
  `room_type_id` int(10) unsigned NOT NULL,
  `price_type` tinyint(1) NOT NULL DEFAULT 0,
  `mon` decimal(10,2) NOT NULL,
  `tue` decimal(10,2) NOT NULL,
  `wed` decimal(10,2) NOT NULL,
  `thu` decimal(10,2) NOT NULL,
  `fri` decimal(10,2) NOT NULL,
  `sat` decimal(10,2) NOT NULL,
  `sun` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `rel_gallery_image` */

DROP TABLE IF EXISTS `rel_gallery_image`;

CREATE TABLE `rel_gallery_image` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `gallery_id` int(11) unsigned NOT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

/*Table structure for table `rel_orders_prices` */

DROP TABLE IF EXISTS `rel_orders_prices`;

CREATE TABLE `rel_orders_prices` (
  `order_id` int(11) unsigned NOT NULL,
  `date` date NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `additional_person` tinyint(4) NOT NULL DEFAULT 0,
  `additional_person_price` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `room_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `rel_orders_services` */

DROP TABLE IF EXISTS `rel_orders_services`;

CREATE TABLE `rel_orders_services` (
  `order_id` int(11) unsigned NOT NULL,
  `service_id` int(11) unsigned NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `rel_orders_taxes` */

DROP TABLE IF EXISTS `rel_orders_taxes`;

CREATE TABLE `rel_orders_taxes` (
  `order_id` int(11) unsigned NOT NULL,
  `tax_id` int(10) unsigned NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `rel_room_types_amenities` */

DROP TABLE IF EXISTS `rel_room_types_amenities`;

CREATE TABLE `rel_room_types_amenities` (
  `room_type_id` int(10) unsigned NOT NULL,
  `amenity_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `rel_room_types_services` */

DROP TABLE IF EXISTS `rel_room_types_services`;

CREATE TABLE `rel_room_types_services` (
  `service_id` int(10) unsigned NOT NULL,
  `room_type_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `room_types` */

DROP TABLE IF EXISTS `room_types`;

CREATE TABLE `room_types` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(556) NOT NULL,
  `shortcode` varchar(32) NOT NULL,
  `description` text DEFAULT NULL,
  `base_occupancy` varchar(255) NOT NULL,
  `higher_occupancy` varchar(255) NOT NULL,
  `extra_bed` tinyint(1) DEFAULT NULL,
  `extra_beds` varchar(32) DEFAULT NULL,
  `kids_occupancy` varchar(255) NOT NULL,
  `base_price` decimal(10,2) NOT NULL,
  `additional_person` decimal(10,2) NOT NULL,
  `extra_bed_price` decimal(10,2) NOT NULL,
  `maintenance_mode` tinyint(1) NOT NULL,
  `maintenance_message` text NOT NULL,
  `room_block_start_date` date DEFAULT NULL,
  `room_block_end_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `room_types_images` */

DROP TABLE IF EXISTS `room_types_images`;

CREATE TABLE `room_types_images` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `room_type_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `rooms` */

DROP TABLE IF EXISTS `rooms`;

CREATE TABLE `rooms` (
  `id` int(11) unsigned NOT NULL,
  `floor_id` int(11) unsigned NOT NULL,
  `room_no` varchar(255) NOT NULL,
  `room_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `services` */

DROP TABLE IF EXISTS `services`;

CREATE TABLE `services` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `short_description` text NOT NULL,
  `price_type` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Table structure for table `settings` */

DROP TABLE IF EXISTS `settings`;

CREATE TABLE `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `fax` varchar(255) NOT NULL,
  `language` varchar(255) DEFAULT NULL,
  `currency` int(10) unsigned NOT NULL,
  `date_format` varchar(255) NOT NULL,
  `timezone` varchar(255) NOT NULL,
  `minimum_booking` int(11) DEFAULT NULL,
  `advance_payment` decimal(10,2) DEFAULT NULL,
  `taxes` text NOT NULL,
  `check_in_time` time NOT NULL,
  `check_out_time` time NOT NULL,
  `time_format` tinyint(1) NOT NULL DEFAULT 0,
  `maintenance_mode` tinyint(1) NOT NULL DEFAULT 0,
  `maintenance_message` text DEFAULT NULL,
  `currency_api` int(10) unsigned NOT NULL,
  `payment_gateway` text NOT NULL,
  `google_analytics_code` text NOT NULL,
  `smtp_mail` varchar(255) NOT NULL,
  `smtp_host` varchar(255) NOT NULL,
  `smtp_user` varchar(255) NOT NULL,
  `smtp_pass` varchar(255) NOT NULL,
  `smtp_port` varchar(8) NOT NULL,
  `invoice` int(11) unsigned DEFAULT NULL,
  `room_block_start_date` date DEFAULT NULL,
  `room_block_end_date` date DEFAULT NULL,
  `paypal` tinyint(1) DEFAULT NULL,
  `stripe` tinyint(1) DEFAULT NULL,
  `pay_on_arrival` tinyint(1) DEFAULT NULL,
  `paypal_sandbox` tinyint(1) DEFAULT NULL,
  `paypal_business_email` varchar(255) DEFAULT NULL,
  `stripe_key` varchar(255) DEFAULT NULL,
  `stripe_api_key` varchar(255) DEFAULT NULL,
  `facebook_link` text DEFAULT NULL,
  `twitter_link` text DEFAULT NULL,
  `google_plus_link` text DEFAULT NULL,
  `linkedin_link` text DEFAULT NULL,
  `footer_text` text DEFAULT NULL,
  `cancellation_policy` text DEFAULT NULL,
  `content_section_title` varchar(255) DEFAULT NULL,
  `content_section_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Table structure for table `special_price` */

DROP TABLE IF EXISTS `special_price`;

CREATE TABLE `special_price` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `room_type_id` int(10) unsigned NOT NULL,
  `date_from` datetime DEFAULT NULL,
  `date_to` datetime DEFAULT NULL,
  `mon` decimal(10,2) NOT NULL,
  `tue` decimal(10,2) NOT NULL,
  `wed` decimal(10,2) NOT NULL,
  `thu` decimal(10,2) NOT NULL,
  `fri` decimal(10,2) NOT NULL,
  `sat` decimal(10,2) NOT NULL,
  `sun` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Table structure for table `states` */

DROP TABLE IF EXISTS `states`;

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `country_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `taxes` */

DROP TABLE IF EXISTS `taxes`;

CREATE TABLE `taxes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(32) NOT NULL,
  `type` enum('Percentage','Fixed','','') NOT NULL,
  `rate` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Table structure for table `testimonials` */

DROP TABLE IF EXISTS `testimonials`;

CREATE TABLE `testimonials` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `auther_name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `testimonial` text NOT NULL,
  `auther_image` varchar(255) NOT NULL,
  `rating` varchar(32) NOT NULL,
  `country` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_role` int(10) unsigned NOT NULL,
  `phone` varchar(32) NOT NULL,
  `added` timestamp NOT NULL DEFAULT current_timestamp(),
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `department_id` int(10) unsigned NOT NULL,
  `designation_id` int(10) unsigned NOT NULL,
  `gender` varchar(32) NOT NULL,
  `dob` date DEFAULT NULL,
  `country_id` int(10) unsigned NOT NULL,
  `state_id` int(10) unsigned NOT NULL,
  `city_id` int(10) unsigned NOT NULL,
  `address` text NOT NULL,
  `id_type` varchar(255) NOT NULL,
  `id_no` varchar(255) NOT NULL,
  `id_upload` varchar(255) NOT NULL,
  `salary` decimal(10,2) NOT NULL,
  `join_date` date DEFAULT NULL,
  `remarks` text NOT NULL,
  `shift_from` datetime NOT NULL,
  `shift_to` datetime NOT NULL,
  `token` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
