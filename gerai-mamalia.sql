-- Adminer 4.2.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `as_company`;
CREATE TABLE `as_company` (
  `companyID` int(11) NOT NULL AUTO_INCREMENT,
  `companyCode` varchar(20) NOT NULL,
  `companyName` varchar(100) NOT NULL,
  `contactPerson` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `village` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `zipcode` varchar(10) NOT NULL,
  `province` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `fax` varchar(50) NOT NULL,
  `phonecp` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `print_address` text NOT NULL,
  `faktur_address` text NOT NULL,
  PRIMARY KEY (`companyID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabel Perusahaan';

INSERT INTO `as_company` (`companyID`, `companyCode`, `companyName`, `contactPerson`, `address`, `village`, `district`, `city`, `zipcode`, `province`, `phone`, `fax`, `phonecp`, `email`, `print_address`, `faktur_address`) VALUES
(1,	'',	'MARIA BABY GARMEN',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'');

DROP TABLE IF EXISTS `companies`;
CREATE TABLE `companies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `companyCode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `companyName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contactPerson` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `village` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `district` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zipcode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fax` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phonecp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `print_address` text COLLATE utf8_unicode_ci NOT NULL,
  `faktur_address` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `companies_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `companies` (`id`, `companyCode`, `companyName`, `contactPerson`, `address`, `village`, `district`, `city`, `zipcode`, `province`, `phone`, `fax`, `phonecp`, `email`, `print_address`, `faktur_address`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1,	'2',	'MARIA BABY GARMEN',	'Novilia',	'Jl. E No. 23A',	'Kelapa Dua',	'Kebon Jeruk',	'Jakarta Barat',	'11550',	'DKI Jakarta',	'02153661705',	'02153661705',	'02153661705',	'novilia@hanadora.co.id',	'Jalan e ujung 23 A',	'Jalan e ujung 23 A',	'2017-01-16 04:18:34',	'2017-01-16 04:18:34',	NULL);

DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customerCode` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `customerName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `contactPerson` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address2` text COLLATE utf8_unicode_ci NOT NULL,
  `village` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `district` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `zipCode` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `province` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fax` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phonecp1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phonecp2` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `npwp` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pkpName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'inactive',
  `createdDate` date DEFAULT NULL,
  `createdUserID` int(11) DEFAULT NULL,
  `modifiedDate` date DEFAULT NULL,
  `modifiedUserID` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `customers` (`id`, `customerCode`, `customerName`, `contactPerson`, `address`, `address2`, `village`, `district`, `city`, `zipCode`, `province`, `phone`, `fax`, `phonecp1`, `phonecp2`, `email`, `note`, `npwp`, `pkpName`, `category`, `status`, `createdDate`, `createdUserID`, `modifiedDate`, `modifiedUserID`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1,	'GROS',	'GROSIR',	'',	'',	'',	'',	'',	'',	'0',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'retail',	'active',	'2016-08-10',	1,	'2016-08-10',	1,	NULL,	NULL,	NULL),
(2,	'CASH',	'CASH',	'',	'',	'',	'',	'',	'',	'0',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'retail',	'active',	'2016-08-10',	1,	'0000-00-00',	0,	NULL,	NULL,	NULL),
(3,	'KD',	'KIDDY',	'GINA',	'KARAWACI',	'',	'',	'',	'TANGERANG',	'0',	'BANTEN',	'',	'',	'',	'',	'',	'',	'125.235.12.95-889',	'GINA',	'distributor',	'active',	'2016-08-10',	1,	'2016-12-28',	2,	NULL,	NULL,	NULL),
(4,	'HAN',	'HANADORA',	'Novilia',	'',	'',	'',	'',	'Jakarta Barat',	'0',	'DKI Jakarta',	'',	'',	'',	'',	'novilia@hanadora.com',	'',	'',	'',	'distributor',	'active',	'2016-08-13',	1,	'2016-12-28',	2,	NULL,	NULL,	NULL);

DROP TABLE IF EXISTS `factories`;
CREATE TABLE `factories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `factoryCode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `factoryName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `factoryType` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `createdDate` date DEFAULT NULL,
  `createdUserID` int(11) DEFAULT NULL,
  `modifiedDate` date DEFAULT NULL,
  `modifiedUserID` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `factories` (`id`, `factoryCode`, `factoryName`, `factoryType`, `status`, `note`, `createdDate`, `createdUserID`, `modifiedDate`, `modifiedUserID`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1,	'fds',	'df',	'temporary',	'0',	'dfs',	'2017-01-18',	21,	'2017-01-26',	2,	'2017-01-16 20:33:34',	'2017-01-16 20:33:34',	NULL),
(2,	'22',	'21',	'permanent',	'1',	'dsf df sf sdf ds',	'2017-01-18',	1,	'2017-01-31',	2,	'2017-01-16 20:34:00',	'2017-01-16 20:34:00',	NULL);

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2014_10_12_100000_create_password_resets_table',	1),
(3,	'2017_01_16_072838_create_customers_table',	2),
(4,	'2017_01_16_075315_create_products_table',	3),
(5,	'2017_01_16_083605_create_sales_prices_table',	4),
(6,	'2017_01_16_100214_create_stock_products_table',	5),
(7,	'2017_01_16_103040_create_receives_table',	6),
(8,	'2017_01_16_111545_create_companies_table',	7),
(9,	'2017_01_16_121847_create_cobatries_table',	8),
(10,	'2017_01_16_122505_create_cobatries_table',	9),
(11,	'2017_01_16_125649_create_purchase_prices_table',	10),
(12,	'2017_01_16_125957_create_sales_prices_table',	11),
(13,	'2017_01_17_024244_create_salesorderitems_table',	12),
(14,	'2017_01_17_025610_create_salespayments_table',	13),
(15,	'2017_01_17_031435_create_customers_table',	14),
(16,	'2017_01_17_032050_create_ops_table',	15),
(17,	'2017_01_17_033238_create_factories_table',	16),
(18,	'2017_01_17_035144_create_products_table',	17),
(19,	'2017_01_17_051016_create_salesorders_table',	18),
(20,	'2017_01_17_064540_create_suppliers_table',	19),
(21,	'2017_01_17_065504_create_salesinvoices_table',	19),
(22,	'2017_01_19_080432_create_salesinvoices_table',	20);

DROP TABLE IF EXISTS `ms_suppliers`;
CREATE TABLE `ms_suppliers` (
  `supplierID` int(11) NOT NULL AUTO_INCREMENT,
  `supplierCode` varchar(10) NOT NULL,
  `supplierName` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `fax` varchar(50) NOT NULL,
  `contactPerson` varchar(100) NOT NULL,
  `email` varchar(120) NOT NULL,
  `createdDate` datetime DEFAULT NULL,
  `createdUserID` int(11) DEFAULT NULL,
  `modifiedDate` datetime DEFAULT NULL,
  `modifiedUserID` int(11) DEFAULT NULL,
  PRIMARY KEY (`supplierID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `paymentdetail`;
CREATE TABLE `paymentdetail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `paidID` int(11) NOT NULL,
  `invoiceID` int(11) NOT NULL,
  `invoiceNo` varchar(20) NOT NULL,
  `amountPaid` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `paymentdetail` (`id`, `paidID`, `invoiceID`, `invoiceNo`, `amountPaid`) VALUES
(1,	1,	1,	'INV/KD/00001',	4500000),
(2,	2,	1,	'INV/KD/00001',	5000000),
(3,	2,	2,	'INV/KD/00002',	6500000);

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `productCode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `productName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `unit` int(11) NOT NULL DEFAULT '1' COMMENT '1,2,3',
  `unitText` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'PCS' COMMENT 'PCS, SET, LSN',
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Inactive' COMMENT 'Active, Inactive',
  `createdDate` date DEFAULT NULL,
  `createdUserID` int(11) DEFAULT NULL,
  `modifiedDate` date DEFAULT NULL,
  `modifiedUserID` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `products` (`id`, `productCode`, `productName`, `unit`, `unitText`, `note`, `stock`, `image`, `status`, `createdDate`, `createdUserID`, `modifiedDate`, `modifiedUserID`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1,	'11148',	'Baby set baju, celana, topi, sepatu',	1,	'PCS',	'',	999999999,	'',	'active',	'0000-00-00',	5,	'0000-00-00',	0,	NULL,	'2017-01-21 03:38:28',	NULL),
(2,	'35109',	'Bedong Rotary 40S (isi 3 pcs)',	0,	'PCS',	'',	999999999,	'',	'1',	'0000-00-00',	5,	'0000-00-00',	0,	NULL,	NULL,	NULL),
(3,	'3539',	'Gurita Ibu Twill 4 Perekat',	0,	'PCS',	'',	999999999,	'',	'1',	'0000-00-00',	5,	'2016-12-09',	2,	NULL,	NULL,	NULL),
(4,	'3539B',	'Gurita Ibu Twill 4 Perekat Mika',	0,	'PCS',	'',	999999999,	'',	'1',	'0000-00-00',	5,	'0000-00-00',	0,	NULL,	NULL,	NULL),
(5,	'3565',	'Popok Kaos Sablon isi 6 pcs',	0,	'PCS',	'',	999999999,	'',	'1',	'0000-00-00',	5,	'0000-00-00',	0,	NULL,	NULL,	NULL),
(6,	'3590',	'Gurita Anak Polos isi 6 pcs',	0,	'PCS',	'',	999999999,	'',	'1',	'0000-00-00',	5,	'0000-00-00',	0,	NULL,	NULL,	NULL),
(7,	'3592',	'Popok Warna isi 6 pcs',	0,	'PCS',	'',	999999999,	'',	'1',	'0000-00-00',	5,	'0000-00-00',	0,	NULL,	NULL,	NULL),
(8,	'3703',	'Bib Kaos 40S Aplikasi Bordir isi 2',	0,	'PCS',	'',	999999999,	'',	'1',	'0000-00-00',	5,	'0000-00-00',	0,	NULL,	NULL,	NULL),
(9,	'3704',	'Washlap Handuk Bentuk Bordir',	0,	'PCS',	'',	999999999,	'',	'1',	'0000-00-00',	5,	'0000-00-00',	0,	NULL,	NULL,	NULL),
(10,	'3705',	'Washlap Handuk 2 pcs Bordir dan Sablon',	0,	'PCS',	'',	999999999,	'',	'1',	'0000-00-00',	5,	'0000-00-00',	0,	NULL,	NULL,	NULL),
(11,	'3766',	'Tatakan Iler Handuk Perekat',	0,	'PCS',	'',	999999999,	'',	'1',	'0000-00-00',	5,	'0000-00-00',	0,	NULL,	NULL,	NULL),
(12,	'3770',	'Washlap Handuk Jari+Kotak WR',	0,	'PCS',	'',	999999999,	'',	'1',	'0000-00-00',	5,	'0000-00-00',	0,	NULL,	NULL,	NULL),
(13,	'3771',	'Tatakan Iler Velcrow',	0,	'PCS',	'',	999999999,	'',	'1',	'0000-00-00',	5,	'0000-00-00',	0,	NULL,	NULL,	NULL),
(14,	'3773',	'Tatakan Iler Kancing 2 pcs',	0,	'PCS',	'',	999999999,	'',	'1',	'0000-00-00',	5,	'0000-00-00',	0,	NULL,	NULL,	NULL),
(15,	'3777',	'Washlap Handuk Bentuk Tangan',	0,	'PCS',	'',	999999999,	'',	'1',	'0000-00-00',	5,	'0000-00-00',	0,	NULL,	NULL,	NULL),
(16,	'3785',	'Bib Plastik Sablon Kecil',	0,	'PCS',	'',	999999999,	'',	'1',	'0000-00-00',	5,	'0000-00-00',	0,	NULL,	NULL,	NULL),
(17,	'3795',	'Bib Perekat Plastik 2 pcs',	0,	'PCS',	'',	999999999,	'',	'1',	'0000-00-00',	5,	'0000-00-00',	0,	NULL,	NULL,	NULL),
(18,	'3796',	'Bib Handuk Sablon n Bordir Aplikasi',	0,	'PCS',	'',	999999999,	'',	'1',	'0000-00-00',	5,	'0000-00-00',	0,	NULL,	NULL,	NULL),
(19,	'3836',	'STK Kaos Rib Sablon',	0,	'PCS',	'',	999999999,	'',	'1',	'0000-00-00',	5,	'0000-00-00',	0,	NULL,	NULL,	NULL),
(20,	'3836B',	'STK Kaos Rib',	0,	'PCS',	'',	999999999,	'',	'1',	'0000-00-00',	5,	'0000-00-00',	0,	NULL,	NULL,	NULL),
(21,	'3844',	'STK Kaos Karet Sablon',	0,	'PCS',	'',	999999999,	'',	'1',	'0000-00-00',	5,	'0000-00-00',	0,	NULL,	NULL,	NULL),
(22,	'3844B',	'STK Rotary 40S',	0,	'PCS',	'',	999999999,	'',	'1',	'0000-00-00',	5,	'0000-00-00',	0,	NULL,	NULL,	NULL),
(23,	'3855',	'Sarung Tangan /Sepatu WR 40S',	0,	'PCS',	'',	999999999,	'',	'1',	'0000-00-00',	5,	'0000-00-00',	0,	NULL,	NULL,	NULL),
(24,	'3860',	'STK Boneka',	0,	'PCS',	'',	999999999,	'',	'1',	'0000-00-00',	5,	'0000-00-00',	0,	NULL,	NULL,	NULL),
(25,	'3861',	'STK Sablon WR 30S',	0,	'PCS',	'',	999999999,	'',	'1',	'0000-00-00',	5,	'0000-00-00',	0,	NULL,	NULL,	NULL),
(26,	'3861B',	'STK Warna Sablon',	0,	'PCS',	'',	999999999,	'',	'1',	'0000-00-00',	5,	'0000-00-00',	0,	NULL,	NULL,	NULL),
(27,	'6011',	'Perlak Kecil',	0,	'PCS',	'',	999999999,	'',	'1',	'0000-00-00',	5,	'0000-00-00',	0,	NULL,	NULL,	NULL),
(28,	'6012',	'Perlak Besar',	0,	'PCS',	'',	999999999,	'',	'1',	'0000-00-00',	5,	'0000-00-00',	0,	NULL,	NULL,	NULL),
(29,	'9436',	'Bando Renda Pita Besar',	0,	'PCS',	'',	999999999,	'',	'1',	'0000-00-00',	5,	'0000-00-00',	0,	NULL,	NULL,	NULL),
(30,	'9437',	'Bando Renda Pita Bunga',	0,	'PCS',	'',	999999999,	'',	'1',	'0000-00-00',	5,	'0000-00-00',	0,	NULL,	NULL,	NULL),
(31,	'9438',	'Bando Renda PomPom',	0,	'PCS',	'',	999999999,	'',	'1',	'0000-00-00',	5,	'0000-00-00',	0,	NULL,	NULL,	NULL),
(32,	'9439',	'Bando Renda Bulu Pita Besar',	0,	'PCS',	'',	999999999,	'',	'1',	'0000-00-00',	5,	'0000-00-00',	0,	NULL,	NULL,	NULL),
(33,	'9440',	'Bando Renda Pita n 2 Jepitan',	0,	'PCS',	'',	999999999,	'',	'1',	'0000-00-00',	5,	'0000-00-00',	0,	NULL,	NULL,	NULL),
(34,	'CS001',	'Washlap Handuk Feeding Set',	0,	'PCS',	'',	999999999,	'',	'1',	'0000-00-00',	5,	'0000-00-00',	0,	NULL,	NULL,	NULL),
(35,	'CS11106',	'Baby Set Kaos Celana Bib STK',	0,	'PCS',	'',	999999999,	'',	'1',	'0000-00-00',	5,	'0000-00-00',	0,	NULL,	NULL,	NULL),
(36,	'CS11141',	'Baby Set Kimono Gurita Bedong',	0,	'PCS',	'',	999999999,	'',	'1',	'0000-00-00',	5,	'0000-00-00',	0,	NULL,	NULL,	NULL),
(37,	'UCMB001',	'Miabelle Bodysuit',	2,	'LSN',	'',	0,	'',	'0',	'2016-12-28',	2,	'0000-00-00',	0,	NULL,	NULL,	NULL),
(38,	'UCMB002',	'Miabelle Baby Tee Kerah Pundak',	2,	'LSN',	'',	0,	'',	'0',	'2016-12-28',	2,	'2016-12-28',	2,	NULL,	NULL,	NULL),
(39,	'UCMB003',	'Miabelle Baby Tee Kerah Bulat',	2,	'LSN',	'',	0,	'',	'0',	'2016-12-28',	2,	'0000-00-00',	0,	NULL,	NULL,	NULL),
(40,	'UCMB005',	'Miabelle Celana Cropped',	2,	'LSN',	'',	0,	'',	'0',	'2016-12-28',	2,	'0000-00-00',	0,	NULL,	NULL,	NULL),
(41,	'SBMB001/2',	'Miabelle Bedong isi 4pcs',	1,	'SET',	'',	0,	'',	'0',	'2016-12-28',	2,	'2016-12-28',	2,	NULL,	NULL,	NULL),
(42,	'NBML001/2',	'Mamalia Gurita Bayi isi 6pcs',	2,	'LSN',	'',	0,	'',	'0',	'2016-12-28',	2,	'0000-00-00',	0,	NULL,	NULL,	NULL),
(43,	'NBMB001',	'Miabelle Set Topi Kupluk + Sepatu',	1,	'SET',	'',	0,	'',	'0',	'2016-12-28',	2,	'2016-12-28',	2,	NULL,	NULL,	NULL),
(44,	'MCMM001',	'Mamalia Gurita Ibu Korset',	2,	'LSN',	'',	0,	'',	'0',	'2016-12-28',	2,	'0000-00-00',	0,	NULL,	NULL,	NULL),
(45,	'BBMB001/2',	'Miabelle Bandana Bib isi 4pcs',	1,	'SET',	'',	0,	'',	'0',	'2016-12-28',	2,	'0000-00-00',	0,	NULL,	NULL,	NULL),
(48,	'3502',	'Baju Rotary + Bando Renda',	1,	'SET',	'',	0,	'',	'0',	'2016-12-28',	2,	'0000-00-00',	0,	NULL,	NULL,	NULL);

DROP TABLE IF EXISTS `purchase_prices`;
CREATE TABLE `purchase_prices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `supplierID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `productCode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `purchase_prices` (`id`, `supplierID`, `productID`, `productCode`, `price`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1,	33,	432,	'43g34e',	4334.00,	'2017-01-16 05:57:33',	'2017-01-16 05:57:33',	NULL);

DROP TABLE IF EXISTS `receives`;
CREATE TABLE `receives` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `invoiceID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `invoiceTotal` int(11) NOT NULL,
  `receiveTotal` int(11) NOT NULL,
  `refundTotal` int(11) NOT NULL,
  `createdDate` date DEFAULT NULL,
  `createdUserID` int(11) DEFAULT NULL,
  `modifiedDate` date DEFAULT NULL,
  `modifiedUserID` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `receives` (`id`, `invoiceID`, `customerID`, `invoiceTotal`, `receiveTotal`, `refundTotal`, `createdDate`, `createdUserID`, `modifiedDate`, `modifiedUserID`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1,	1,	3,	12600000,	0,	0,	NULL,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(2,	2,	3,	6500000,	0,	0,	NULL,	1,	NULL,	NULL,	NULL,	NULL,	NULL),
(3,	3,	3,	4500000,	0,	0,	NULL,	1,	NULL,	NULL,	NULL,	NULL,	NULL);

DROP TABLE IF EXISTS `salesinvoices`;
CREATE TABLE `salesinvoices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `invoiceNo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `invoiceDate` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `soID` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '1,2,3',
  `statusText` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Faktur Baru' COMMENT 'Faktur Baru, Dibayar Sebagian, Lunas',
  `paymentType` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `expiredDate` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ppn` double DEFAULT NULL,
  `total` double NOT NULL,
  `discount` double NOT NULL,
  `grandtotal` double NOT NULL,
  `amountPaid` double NOT NULL,
  `customerID` int(11) NOT NULL,
  `customerName` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customerAddress` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `staffID` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `salesinvoices` (`id`, `invoiceNo`, `invoiceDate`, `soID`, `status`, `statusText`, `paymentType`, `expiredDate`, `ppn`, `total`, `discount`, `grandtotal`, `amountPaid`, `customerID`, `customerName`, `customerAddress`, `staffID`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1,	'INV/KD/00001',	'2017-01-20',	1,	2,	'Dibayar Sebagian',	'term',	'2017-03-01',	0,	12630000,	30000,	12600000,	9500000,	3,	'KIDDY',	'KARAWACI',	1,	NULL,	NULL,	NULL),
(2,	'INV/KD/00002',	'2017-01-20',	2,	3,	'Lunas',	'term',	'2017-04-02',	0,	6520000,	20000,	6500000,	6500000,	3,	'KIDDY',	'KARAWACI',	1,	NULL,	NULL,	NULL),
(3,	'INV/KD/00003',	'2017-01-20',	3,	1,	'Faktur Baru',	'term',	'2017-03-08',	0,	4500000,	0,	4500000,	0,	3,	'KIDDY',	'KARAWACI',	1,	NULL,	NULL,	NULL);

DROP TABLE IF EXISTS `salesorderitems`;
CREATE TABLE `salesorderitems` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `soID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `productID` int(11) NOT NULL,
  `productName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sku` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `salesorderitems` (`id`, `soID`, `productID`, `productName`, `sku`, `price`, `qty`, `note`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1,	'1',	10,	'Washlap Handuk 2 pcs Bordir dan Sablon',	'3705',	9500,	100,	NULL,	NULL,	NULL,	NULL),
(2,	'1',	1,	'Baby set baju, celana, topi, sepatu',	'11148',	26500,	100,	NULL,	NULL,	NULL,	NULL),
(3,	'1',	2,	'Bedong Rotary 40S (isi 3 pcs)',	'35109',	55800,	100,	NULL,	NULL,	NULL,	NULL),
(4,	'1',	36,	'Baby Set Kimono Gurita Bedong',	'CS11141',	26500,	100,	NULL,	NULL,	NULL,	NULL),
(5,	'1',	17,	'Bib Perekat Plastik 2 pcs',	'3795',	8000,	100,	NULL,	NULL,	NULL,	NULL),
(6,	'2',	35,	'Baby Set Kaos Celana Bib STK',	'CS11106',	21500,	100,	NULL,	NULL,	NULL,	NULL),
(7,	'2',	8,	'Bib Kaos 40S Aplikasi Bordir isi 2',	'3703',	17000,	100,	NULL,	NULL,	NULL,	NULL),
(8,	'2',	5,	'Popok Kaos Sablon isi 6 pcs',	'3565',	22000,	100,	NULL,	NULL,	NULL,	NULL),
(9,	'2',	21,	'STK Kaos Karet Sablon',	'3844',	4700,	100,	NULL,	NULL,	NULL,	NULL),
(10,	'3',	7,	'Popok Warna isi 6 pcs',	'3592',	23000,	100,	NULL,	NULL,	NULL,	NULL),
(11,	'3',	5,	'Popok Kaos Sablon isi 6 pcs',	'3565',	22000,	100,	NULL,	NULL,	NULL,	NULL);

DROP TABLE IF EXISTS `salesorders`;
CREATE TABLE `salesorders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `soNo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customerID` int(11) NOT NULL,
  `customerName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customerAddress` text COLLATE utf8_unicode_ci NOT NULL,
  `staffID` int(11) NOT NULL,
  `staffName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `orderDate` date NOT NULL,
  `needDate` date NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '1,2,3',
  `statusText` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Pesanan Baru' COMMENT 'Pesanan Baru, Sudah Ada Invoice, Sudah Ada Pembayaran',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `salesorders` (`id`, `soNo`, `customerID`, `customerName`, `customerAddress`, `staffID`, `staffName`, `orderDate`, `needDate`, `note`, `status`, `statusText`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1,	'ORD/KD/00001',	3,	'KIDDY',	'KARAWACI',	1,	'Nurul Irhamni',	'2017-01-20',	'2017-01-20',	'',	2,	'Sudah Ada Invoice',	NULL,	NULL,	NULL),
(2,	'ORD/KD/00002',	3,	'KIDDY',	'KARAWACI',	1,	'Nurul Irhamni',	'2017-01-20',	'2017-01-20',	'',	2,	'Sudah Ada Invoice',	NULL,	NULL,	NULL),
(3,	'ORD/KD/00003',	3,	'KIDDY',	'KARAWACI',	1,	'Nurul Irhamni',	'2017-01-20',	'2017-01-20',	'',	2,	'Sudah Ada Invoice',	NULL,	NULL,	NULL);

DROP TABLE IF EXISTS `salespayments`;
CREATE TABLE `salespayments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `paymentNo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `invoiceID` int(11) DEFAULT NULL,
  `paymentDate` date NOT NULL,
  `payType` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bankNo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bankName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bankAC` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `effectiveDate` date DEFAULT NULL,
  `total` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `customerName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customerAddress` text COLLATE utf8_unicode_ci NOT NULL,
  `ref` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `staffID` int(11) NOT NULL,
  `staffName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `createdDate` date DEFAULT NULL,
  `createdUserID` int(11) DEFAULT NULL,
  `modifiedDate` date DEFAULT NULL,
  `modifiedUserID` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `salespayments` (`id`, `paymentNo`, `invoiceID`, `paymentDate`, `payType`, `bankNo`, `bankName`, `bankAC`, `effectiveDate`, `total`, `customerID`, `customerName`, `customerAddress`, `ref`, `note`, `staffID`, `staffName`, `createdDate`, `createdUserID`, `modifiedDate`, `modifiedUserID`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1,	'PAY/KD/00001',	NULL,	'2017-01-21',	'transfer',	'123456789',	'Bank Mandiri',	'Nurul Irhamni',	'2017-01-21',	4500000,	3,	'KIDDY',	'',	NULL,	'Pembayaran pertama faktur  	INV/KD/00001',	1,	'Nurul Irhamni',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL),
(2,	'PAY/KD/00002',	NULL,	'2017-01-21',	'tunai',	'',	'',	'',	'2017-01-21',	11500000,	3,	'KIDDY',	'',	NULL,	'',	1,	'Nurul Irhamni',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL);

DROP TABLE IF EXISTS `sales_prices`;
CREATE TABLE `sales_prices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customerID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `productCode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `sales_prices` (`id`, `customerID`, `productID`, `productCode`, `price`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1,	3,	1,	'11148',	26500.00,	NULL,	NULL,	NULL),
(2,	3,	2,	'35109',	55800.00,	NULL,	NULL,	NULL),
(3,	3,	3,	'3539',	37000.00,	NULL,	NULL,	NULL),
(4,	3,	4,	'3539B',	39500.00,	NULL,	NULL,	NULL),
(5,	3,	5,	'3565',	22000.00,	NULL,	NULL,	NULL),
(6,	3,	6,	'3590',	22000.00,	NULL,	NULL,	NULL),
(7,	3,	7,	'3592',	23000.00,	NULL,	NULL,	NULL),
(8,	3,	8,	'3703',	17000.00,	NULL,	NULL,	NULL),
(9,	3,	9,	'3704',	6000.00,	NULL,	NULL,	NULL),
(10,	3,	10,	'3705',	9500.00,	NULL,	NULL,	NULL),
(11,	3,	11,	'3766',	4750.00,	NULL,	NULL,	NULL),
(12,	3,	12,	'3770',	7800.00,	NULL,	NULL,	NULL),
(13,	3,	13,	'3771',	5200.00,	NULL,	NULL,	NULL),
(14,	3,	14,	'3773',	7800.00,	NULL,	NULL,	NULL),
(15,	3,	15,	'3777',	4500.00,	NULL,	NULL,	NULL),
(16,	3,	16,	'3785',	3250.00,	NULL,	NULL,	NULL),
(17,	3,	17,	'3795',	8000.00,	NULL,	NULL,	NULL),
(18,	3,	18,	'3796',	8500.00,	NULL,	NULL,	NULL),
(19,	3,	19,	'3836',	4700.00,	NULL,	NULL,	NULL),
(20,	3,	20,	'3836B',	5000.00,	NULL,	NULL,	NULL),
(21,	3,	21,	'3844',	4700.00,	NULL,	NULL,	NULL),
(22,	3,	22,	'3844B',	5000.00,	NULL,	NULL,	NULL),
(23,	3,	23,	'3855',	5800.00,	NULL,	NULL,	NULL),
(24,	3,	24,	'3860',	5600.00,	NULL,	NULL,	NULL),
(25,	3,	25,	'3861',	4650.00,	NULL,	NULL,	NULL),
(26,	3,	26,	'3861B',	5100.00,	NULL,	NULL,	NULL),
(27,	3,	27,	'6011',	5000.00,	NULL,	NULL,	NULL),
(28,	3,	28,	'6012',	14500.00,	NULL,	NULL,	NULL),
(29,	3,	29,	'9436',	7000.00,	NULL,	NULL,	NULL),
(30,	3,	30,	'9437',	8100.00,	NULL,	NULL,	NULL),
(31,	3,	31,	'9438',	15000.00,	NULL,	NULL,	NULL),
(32,	3,	32,	'9439',	18000.00,	NULL,	NULL,	NULL),
(33,	3,	33,	'9440',	13500.00,	NULL,	NULL,	NULL),
(34,	3,	34,	'CS001',	2200.00,	NULL,	NULL,	NULL),
(35,	3,	35,	'CS11106',	21500.00,	NULL,	NULL,	NULL),
(36,	3,	36,	'CS11141',	26500.00,	NULL,	NULL,	NULL),
(37,	2,	0,	'UCMB001',	0.00,	NULL,	NULL,	NULL),
(38,	1,	0,	'UCMB001',	0.00,	NULL,	NULL,	NULL),
(39,	4,	0,	'UCMB001',	7000.00,	NULL,	NULL,	NULL),
(40,	3,	0,	'UCMB001',	0.00,	NULL,	NULL,	NULL),
(41,	2,	38,	'UCMB002',	0.00,	NULL,	NULL,	NULL),
(42,	1,	38,	'UCMB002',	0.00,	NULL,	NULL,	NULL),
(43,	4,	38,	'UCMB002',	5600.00,	NULL,	NULL,	NULL),
(44,	3,	38,	'UCMB002',	0.00,	NULL,	NULL,	NULL),
(45,	2,	0,	'UCMB003',	0.00,	NULL,	NULL,	NULL),
(46,	1,	0,	'UCMB003',	0.00,	NULL,	NULL,	NULL),
(47,	4,	0,	'UCMB003',	5600.00,	NULL,	NULL,	NULL),
(48,	3,	0,	'UCMB003',	0.00,	NULL,	NULL,	NULL),
(49,	2,	0,	'UCMB005',	0.00,	NULL,	NULL,	NULL),
(50,	1,	0,	'UCMB005',	0.00,	NULL,	NULL,	NULL),
(51,	4,	0,	'UCMB005',	5925.00,	NULL,	NULL,	NULL),
(52,	3,	0,	'UCMB005',	0.00,	NULL,	NULL,	NULL),
(53,	2,	0,	'SBMB001/2',	0.00,	NULL,	NULL,	NULL),
(54,	1,	0,	'SBMB001/2',	0.00,	NULL,	NULL,	NULL),
(55,	4,	0,	'SBMB001/2',	62500.00,	NULL,	NULL,	NULL),
(56,	3,	0,	'SBMB001/2',	0.00,	NULL,	NULL,	NULL),
(57,	2,	0,	'NBML001/2',	0.00,	NULL,	NULL,	NULL),
(58,	1,	0,	'NBML001/2',	0.00,	NULL,	NULL,	NULL),
(59,	4,	0,	'NBML001/2',	17500.00,	NULL,	NULL,	NULL),
(60,	3,	0,	'NBML001/2',	0.00,	NULL,	NULL,	NULL),
(61,	2,	0,	'NBMB001',	0.00,	NULL,	NULL,	NULL),
(62,	1,	0,	'NBMB001',	0.00,	NULL,	NULL,	NULL),
(63,	4,	0,	'NBMB001',	5500.00,	NULL,	NULL,	NULL),
(64,	3,	0,	'NBMB001',	0.00,	NULL,	NULL,	NULL),
(65,	2,	0,	'MCMM001',	0.00,	NULL,	NULL,	NULL),
(66,	1,	0,	'MCMM001',	0.00,	NULL,	NULL,	NULL),
(67,	4,	0,	'MCMM001',	32000.00,	NULL,	NULL,	NULL),
(68,	3,	0,	'MCMM001',	0.00,	NULL,	NULL,	NULL),
(69,	2,	0,	'BBMB001/2',	0.00,	NULL,	NULL,	NULL),
(70,	1,	0,	'BBMB001/2',	0.00,	NULL,	NULL,	NULL),
(71,	4,	0,	'BBMB001/2',	11000.00,	NULL,	NULL,	NULL),
(72,	3,	0,	'BBMB001/2',	0.00,	NULL,	NULL,	NULL),
(73,	2,	41,	'SBMB001/2',	0.00,	NULL,	NULL,	NULL),
(74,	1,	41,	'SBMB001/2',	0.00,	NULL,	NULL,	NULL),
(75,	4,	41,	'SBMB001/2',	0.00,	NULL,	NULL,	NULL),
(76,	3,	41,	'SBMB001/2',	0.00,	NULL,	NULL,	NULL),
(77,	2,	43,	'NBMB001',	0.00,	NULL,	NULL,	NULL),
(78,	1,	43,	'NBMB001',	0.00,	NULL,	NULL,	NULL),
(79,	4,	43,	'NBMB001',	5500.00,	NULL,	NULL,	NULL),
(80,	3,	43,	'NBMB001',	0.00,	NULL,	NULL,	NULL),
(81,	2,	48,	'3502',	0.00,	NULL,	NULL,	NULL),
(82,	1,	48,	'3502',	0.00,	NULL,	NULL,	NULL),
(83,	4,	48,	'3502',	0.00,	NULL,	NULL,	NULL),
(84,	3,	48,	'3502',	25000.00,	NULL,	NULL,	NULL);

DROP TABLE IF EXISTS `set_modules`;
CREATE TABLE `set_modules` (
  `modulID` int(11) NOT NULL AUTO_INCREMENT,
  `modulName` varchar(100) NOT NULL,
  `authorize` varchar(50) NOT NULL COMMENT 'Administrator, SPV, Sales, Kasir',
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `sort_id` int(5) NOT NULL,
  PRIMARY KEY (`modulID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `set_modules` (`modulID`, `modulName`, `authorize`, `status`, `sort_id`) VALUES
(1,	'Admin/ User',	'1,0,0,0',	'active',	0),
(2,	'Set Company Profile',	'1,0,0,0',	'active',	0),
(3,	'Customer',	'1,0,0,0',	'active',	0),
(4,	'Gudang / Faktori',	'1,0,0,0',	'active',	0),
(5,	'Produk',	'1,0,0,0',	'active',	0),
(6,	'Harga Produk',	'1,0,0,0',	'active',	0),
(7,	'Inventory',	'1,0,0,0',	'active',	0);

DROP TABLE IF EXISTS `stock_products`;
CREATE TABLE `stock_products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `productID` int(11) NOT NULL,
  `factoryID` int(11) NOT NULL,
  `stockIN` int(11) NOT NULL,
  `stockOut` int(11) NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `stock_products` (`id`, `productID`, `factoryID`, `stockIN`, `stockOut`, `note`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1,	54,	34,	21,	65,	'update postman',	'2017-01-16 03:03:53',	'2017-01-16 05:30:23',	NULL),
(2,	54,	34,	21,	65,	'update postman ds',	'2017-01-16 03:11:17',	'2017-01-16 19:38:40',	'2017-01-16 19:38:40'),
(3,	54,	34,	21,	65,	'update postman ds',	'2017-01-16 19:38:02',	'2017-01-16 19:38:02',	NULL),
(4,	543,	342,	212,	651,	'update postman dsf',	'2017-01-16 19:38:19',	'2017-01-16 19:38:19',	NULL);

DROP TABLE IF EXISTS `suppliers`;
CREATE TABLE `suppliers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `supplierCode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `supplierName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fax` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contactPerson` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	'Nurul Irhamni',	'nurul',	'nurul@redbuzz.co.id',	'$2y$10$zBZWkp4V5a4v615BFOjFh.LHUlRtUwz6bOuCxTXGXXaBU5qNdfacO',	'1',	NULL,	'2017-01-16 21:09:34',	'2017-01-16 21:09:34');

-- 2017-01-23 04:06:57
