-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2017 at 11:25 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mamalia`
--

-- --------------------------------------------------------

--
-- Table structure for table `as_company`
--

CREATE TABLE `as_company` (
  `companyID` int(11) NOT NULL,
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
  `faktur_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabel Perusahaan';

--
-- Dumping data for table `as_company`
--

INSERT INTO `as_company` (`companyID`, `companyCode`, `companyName`, `contactPerson`, `address`, `village`, `district`, `city`, `zipcode`, `province`, `phone`, `fax`, `phonecp`, `email`, `print_address`, `faktur_address`) VALUES
(1, '', 'MARIA BABY GARMEN', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `companyCode`, `companyName`, `contactPerson`, `address`, `village`, `district`, `city`, `zipcode`, `province`, `phone`, `fax`, `phonecp`, `email`, `print_address`, `faktur_address`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2', 'MARIA BABY GARMEN', 'Novilia', 'Jl. E No. 23A', 'Kelapa Dua', 'Kebon Jeruk', 'Jakarta Barat', '11550', 'DKI Jakarta', '02153661705', '02153661705', '02153661705', 'novilia@hanadora.co.id', 'Jalan e ujung 23 A', 'Jalan e ujung 23 A', '2017-01-16 04:18:34', '2017-01-16 04:18:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customerCode`, `customerName`, `contactPerson`, `address`, `address2`, `village`, `district`, `city`, `zipCode`, `province`, `phone`, `fax`, `phonecp1`, `phonecp2`, `email`, `note`, `npwp`, `pkpName`, `category`, `status`, `createdDate`, `createdUserID`, `modifiedDate`, `modifiedUserID`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'GROS', 'GROSIR', '', '', '', '', '', '', '0', '', '', '', '', '', '', '', '', '', 'retail', 'active', '2016-08-10', 1, '2016-08-10', 1, NULL, NULL, NULL),
(2, 'CASH', 'CASH', '', '', '', '', '', '', '0', '', '', '', '', '', '', '', '', '', 'retail', 'active', '2016-08-10', 1, '0000-00-00', 0, NULL, NULL, NULL),
(3, 'KD', 'KIDDY', 'GINA', 'KARAWACI', '', '', '', 'TANGERANG', '0', 'BANTEN', '', '', '', '', '', '', '125.235.12.95-889', 'GINA', 'distributor', 'active', '2016-08-10', 1, '2016-12-28', 2, NULL, NULL, NULL),
(4, 'HAN', 'HANADORA', 'Novilia', '', '', '', '', 'Jakarta Barat', '0', 'DKI Jakarta', '', '', '', '', 'novilia@hanadora.com', '', '', '', 'distributor', 'active', '2016-08-13', 1, '2016-12-28', 2, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `factories`
--

CREATE TABLE `factories` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `factories`
--

INSERT INTO `factories` (`id`, `factoryCode`, `factoryName`, `factoryType`, `status`, `note`, `createdDate`, `createdUserID`, `modifiedDate`, `modifiedUserID`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'fds', 'df', 'temporary', '0', 'dfs', '2017-01-18', 21, '2017-01-26', 2, '2017-01-16 20:33:34', '2017-01-16 20:33:34', NULL),
(2, '22', '21', 'permanent', '1', 'dsf df sf sdf ds', '2017-01-18', 1, '2017-01-31', 2, '2017-01-16 20:34:00', '2017-01-16 20:34:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_01_16_072838_create_customers_table', 2),
(4, '2017_01_16_075315_create_products_table', 3),
(5, '2017_01_16_083605_create_sales_prices_table', 4),
(6, '2017_01_16_100214_create_stock_products_table', 5),
(7, '2017_01_16_103040_create_receives_table', 6),
(8, '2017_01_16_111545_create_companies_table', 7),
(9, '2017_01_16_121847_create_cobatries_table', 8),
(10, '2017_01_16_122505_create_cobatries_table', 9),
(11, '2017_01_16_125649_create_purchase_prices_table', 10),
(12, '2017_01_16_125957_create_sales_prices_table', 11),
(13, '2017_01_17_024244_create_salesorderitems_table', 12),
(14, '2017_01_17_025610_create_salespayments_table', 13),
(15, '2017_01_17_031435_create_customers_table', 14),
(16, '2017_01_17_032050_create_ops_table', 15),
(17, '2017_01_17_033238_create_factories_table', 16),
(18, '2017_01_17_035144_create_products_table', 17),
(19, '2017_01_17_051016_create_salesorders_table', 18),
(20, '2017_01_17_064540_create_suppliers_table', 19),
(21, '2017_01_17_065504_create_salesinvoices_table', 19),
(22, '2017_01_19_080432_create_salesinvoices_table', 20),
(23, '2017_01_24_114956_create_UpdateHarga_table', 21),
(28, '2017_02_06_092930_create_roles_table', 22);

-- --------------------------------------------------------

--
-- Table structure for table `ms_suppliers`
--

CREATE TABLE `ms_suppliers` (
  `supplierID` int(11) NOT NULL,
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
  `modifiedUserID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paymentdetail`
--

CREATE TABLE `paymentdetail` (
  `id` int(11) NOT NULL,
  `paidID` int(11) NOT NULL,
  `invoiceID` int(11) NOT NULL,
  `invoiceNo` varchar(20) NOT NULL,
  `amountPaid` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paymentdetail`
--

INSERT INTO `paymentdetail` (`id`, `paidID`, `invoiceID`, `invoiceNo`, `amountPaid`) VALUES
(1, 1, 1, 'INV/KD/00001', 4500000),
(2, 2, 1, 'INV/KD/00001', 5000000),
(3, 2, 2, 'INV/KD/00002', 6500000),
(4, 3, 1, 'INV/KD/00001', 5555),
(5, 3, 3, 'INV/KD/00003', 5555555);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `productCode`, `productName`, `unit`, `unitText`, `note`, `stock`, `image`, `status`, `createdDate`, `createdUserID`, `modifiedDate`, `modifiedUserID`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '11148', 'Baby set baju, celana, topi, sepatu', 1, 'PCS', '', 999999999, '', 'active', '0000-00-00', 5, '0000-00-00', 0, NULL, '2017-01-20 20:38:28', NULL),
(2, '35109', 'Bedong Rotary 40S (isi 3 pcs)', 0, 'PCS', '', 999999999, '', '1', '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(3, '3539', 'Gurita Ibu Twill 4 Perekat', 0, 'PCS', '', 999999999, '', 'active', '0000-00-00', 5, '2016-12-09', 2, NULL, '2017-01-29 20:12:57', NULL),
(4, '3539B', 'Gurita Ibu Twill 4 Perekat Mika', 0, 'PCS', '', 999999999, '', '1', '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(5, '3565', 'Popok Kaos Sablon isi 6 pcs', 0, 'PCS', '', 999999999, '', '1', '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(6, '3590', 'Gurita Anak Polos isi 6 pcs', 0, 'PCS', '', 999999999, '', '1', '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(7, '3592', 'Popok Warna isi 6 pcs', 0, 'PCS', '', 999999999, '', '1', '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(8, '3703', 'Bib Kaos 40S Aplikasi Bordir isi 2', 0, 'PCS', '', 999999999, '', '1', '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(9, '3704', 'Washlap Handuk Bentuk Bordir', 0, 'PCS', '', 999999999, '', '1', '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(10, '3705', 'Washlap Handuk 2 pcs Bordir dan Sablon', 0, 'PCS', '', 999999999, '', '1', '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(11, '3766', 'Tatakan Iler Handuk Perekat', 0, 'PCS', '', 999999999, '', '1', '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(12, '3770', 'Washlap Handuk Jari+Kotak WR', 0, 'PCS', '', 999999999, '', '1', '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(13, '3771', 'Tatakan Iler Velcrow', 0, 'PCS', '', 999999999, '', '1', '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(14, '3773', 'Tatakan Iler Kancing 2 pcs', 0, 'PCS', '', 999999999, '', '1', '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(15, '3777', 'Washlap Handuk Bentuk Tangan', 0, 'PCS', '', 999999999, '', '1', '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(16, '3785', 'Bib Plastik Sablon Kecil', 0, 'PCS', '', 999999999, '', '1', '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(17, '3795', 'Bib Perekat Plastik 2 pcs', 0, 'PCS', '', 999999999, '', '1', '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(18, '3796', 'Bib Handuk Sablon n Bordir Aplikasi', 0, 'PCS', '', 999999999, '', '1', '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(19, '3836', 'STK Kaos Rib Sablon', 0, 'PCS', '', 999999999, '', '1', '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(20, '3836B', 'STK Kaos Rib', 0, 'PCS', '', 999999999, '', '1', '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(21, '3844', 'STK Kaos Karet Sablon', 0, 'PCS', '', 999999999, '', '1', '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(22, '3844B', 'STK Rotary 40S', 0, 'PCS', '', 999999999, '', '1', '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(23, '3855', 'Sarung Tangan /Sepatu WR 40S', 0, 'PCS', '', 999999999, '', '1', '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(24, '3860', 'STK Boneka', 0, 'PCS', '', 999999999, '', '1', '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(25, '3861', 'STK Sablon WR 30S', 0, 'PCS', '', 999999999, '', '1', '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(26, '3861B', 'STK Warna Sablon', 0, 'PCS', '', 999999999, '', '1', '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(27, '6011', 'Perlak Kecil', 0, 'PCS', '', 999999999, '', '1', '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(28, '6012', 'Perlak Besar', 0, 'PCS', '', 999999999, '', '1', '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(29, '9436', 'Bando Renda Pita Besar', 0, 'PCS', '', 999999999, '', '1', '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(30, '9437', 'Bando Renda Pita Bunga', 0, 'PCS', '', 999999999, '', '1', '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(31, '9438', 'Bando Renda PomPom', 0, 'PCS', '', 999999999, '', '1', '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(32, '9439', 'Bando Renda Bulu Pita Besar', 0, 'PCS', '', 999999999, '', '1', '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(33, '9440', 'Bando Renda Pita n 2 Jepitan', 0, 'PCS', '', 999999999, '', '1', '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(34, 'CS001', 'Washlap Handuk Feeding Set', 0, 'PCS', '', 999999999, '', '1', '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(35, 'CS11106', 'Baby Set Kaos Celana Bib STK', 0, 'PCS', '', 999999999, '', '1', '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(36, 'CS11141', 'Baby Set Kimono Gurita Bedong', 0, 'PCS', '', 999999999, '', '1', '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(37, 'UCMB001', 'Miabelle Bodysuit', 2, 'LSN', '', 0, '', '0', '2016-12-28', 2, '0000-00-00', 0, NULL, NULL, NULL),
(38, 'UCMB002', 'Miabelle Baby Tee Kerah Pundak', 2, 'LSN', '', 0, '', '0', '2016-12-28', 2, '2016-12-28', 2, NULL, NULL, NULL),
(39, 'UCMB003', 'Miabelle Baby Tee Kerah Bulat', 2, 'LSN', '', 0, '', '0', '2016-12-28', 2, '0000-00-00', 0, NULL, NULL, NULL),
(40, 'UCMB005', 'Miabelle Celana Cropped', 2, 'LSN', '', 0, '', '0', '2016-12-28', 2, '0000-00-00', 0, NULL, NULL, NULL),
(41, 'SBMB001/2', 'Miabelle Bedong isi 4pcs', 1, 'SET', '', 0, '', '0', '2016-12-28', 2, '2016-12-28', 2, NULL, NULL, NULL),
(42, 'NBML001/2', 'Mamalia Gurita Bayi isi 6pcs', 2, 'LSN', '', 0, '', '0', '2016-12-28', 2, '0000-00-00', 0, NULL, NULL, NULL),
(43, 'NBMB001', 'Miabelle Set Topi Kupluk + Sepatu', 1, 'SET', '', 0, '', '0', '2016-12-28', 2, '2016-12-28', 2, NULL, NULL, NULL),
(44, 'MCMM001', 'Mamalia Gurita Ibu Korset', 2, 'LSN', '', 0, '', '0', '2016-12-28', 2, '0000-00-00', 0, NULL, NULL, NULL),
(45, 'BBMB001/2', 'Miabelle Bandana Bib isi 4pcs', 1, 'SET', '', 0, '', '0', '2016-12-28', 2, '0000-00-00', 0, NULL, NULL, NULL),
(48, '3502', 'Baju Rotary + Bando Renda', 1, 'SET', '', 0, '', '0', '2016-12-28', 2, '0000-00-00', 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `produks`
--

CREATE TABLE `produks` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `produks`
--

INSERT INTO `produks` (`id`, `productCode`, `productName`, `unit`, `unitText`, `note`, `stock`, `image`, `status`, `createdDate`, `createdUserID`, `modifiedDate`, `modifiedUserID`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '11148', 'Baby set baju, celana, topi, sepatu', 1, 'PCS', '', 999999999, '', 'active', '0000-00-00', 5, '0000-00-00', 0, NULL, '2017-01-21 03:38:28', NULL),
(2, '35109', 'Bedong Rotary 40S (isi 3 pcs)', 0, 'PCS', '', 999999999, '', '1', '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(3, '3539', 'Gurita Ibu Twill 4 Perekat', 0, 'PCS', '', 999999999, '', '1', '0000-00-00', 5, '2016-12-09', 2, NULL, NULL, NULL),
(4, '3539B', 'Gurita Ibu Twill 4 Perekat Mika', 0, 'PCS', '', 999999999, '', '1', '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(5, '3565', 'Popok Kaos Sablon isi 6 pcs', 0, 'PCS', '', 999999999, '', '1', '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(6, '3590', 'Gurita Anak Polos isi 6 pcs', 0, 'PCS', '', 999999999, '', '1', '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(7, '3592', 'Popok Warna isi 6 pcs', 0, 'PCS', '', 999999999, '', '1', '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(8, '3703', 'Bib Kaos 40S Aplikasi Bordir isi 2', 0, 'PCS', '', 999999999, '', '1', '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(9, '3704', 'Washlap Handuk Bentuk Bordir', 0, 'PCS', '', 999999999, '', '1', '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(10, '3705', 'Washlap Handuk 2 pcs Bordir dan Sablon', 0, 'PCS', '', 999999999, '', '1', '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(11, '3766', 'Tatakan Iler Handuk Perekat', 0, 'PCS', '', 999999999, '', '1', '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(12, '3770', 'Washlap Handuk Jari+Kotak WR', 0, 'PCS', '', 999999999, '', '1', '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(13, '3771', 'Tatakan Iler Velcrow', 0, 'PCS', '', 999999999, '', '1', '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(14, '3773', 'Tatakan Iler Kancing 2 pcs', 0, 'PCS', '', 999999999, '', '1', '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(15, '3777', 'Washlap Handuk Bentuk Tangan', 0, 'PCS', '', 999999999, '', '1', '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(16, '3785', 'Bib Plastik Sablon Kecil', 0, 'PCS', '', 999999999, '', '1', '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(17, '3795', 'Bib Perekat Plastik 2 pcs', 0, 'PCS', '', 999999999, '', '1', '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(18, '3796', 'Bib Handuk Sablon n Bordir Aplikasi', 0, 'PCS', '', 999999999, '', '1', '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(19, '3836', 'STK Kaos Rib Sablon', 0, 'PCS', '', 999999999, '', '1', '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(20, '3836B', 'STK Kaos Rib', 0, 'PCS', '', 999999999, '', '1', '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(21, '3844', 'STK Kaos Karet Sablon', 0, 'PCS', '', 999999999, '', '1', '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(22, '3844B', 'STK Rotary 40S', 0, 'PCS', '', 999999999, '', '1', '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(23, '3855', 'Sarung Tangan /Sepatu WR 40S', 0, 'PCS', '', 999999999, '', '1', '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(24, '3860', 'STK Boneka', 0, 'PCS', '', 999999999, '', '1', '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(25, '3861', 'STK Sablon WR 30S', 0, 'PCS', '', 999999999, '', '1', '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(26, '3861B', 'STK Warna Sablon', 0, 'PCS', '', 999999999, '', '1', '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(27, '6011', 'Perlak Kecil', 0, 'PCS', '', 999999999, '', '1', '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(28, '6012', 'Perlak Besar', 0, 'PCS', '', 999999999, '', '1', '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(29, '9436', 'Bando Renda Pita Besar', 0, 'PCS', '', 999999999, '', '1', '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(30, '9437', 'Bando Renda Pita Bunga', 0, 'PCS', '', 999999999, '', '1', '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(31, '9438', 'Bando Renda PomPom', 0, 'PCS', '', 999999999, '', '1', '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(32, '9439', 'Bando Renda Bulu Pita Besar', 0, 'PCS', '', 999999999, '', '1', '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(33, '9440', 'Bando Renda Pita n 2 Jepitan', 0, 'PCS', '', 999999999, '', '1', '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(34, 'CS001', 'Washlap Handuk Feeding Set', 0, 'PCS', '', 999999999, '', '1', '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(35, 'CS11106', 'Baby Set Kaos Celana Bib STK', 0, 'PCS', '', 999999999, '', '1', '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(36, 'CS11141', 'Baby Set Kimono Gurita Bedong', 0, 'PCS', '', 999999999, '', '1', '0000-00-00', 5, '0000-00-00', 0, NULL, NULL, NULL),
(37, 'UCMB001', 'Miabelle Bodysuit', 2, 'LSN', '', 0, '', '0', '2016-12-28', 2, '0000-00-00', 0, NULL, NULL, NULL),
(38, 'UCMB002', 'Miabelle Baby Tee Kerah Pundak', 2, 'LSN', '', 0, '', '0', '2016-12-28', 2, '2016-12-28', 2, NULL, NULL, NULL),
(39, 'UCMB003', 'Miabelle Baby Tee Kerah Bulat', 2, 'LSN', '', 0, '', '0', '2016-12-28', 2, '0000-00-00', 0, NULL, NULL, NULL),
(40, 'UCMB005', 'Miabelle Celana Cropped', 2, 'LSN', '', 0, '', '0', '2016-12-28', 2, '0000-00-00', 0, NULL, NULL, NULL),
(41, 'SBMB001/2', 'Miabelle Bedong isi 4pcs', 1, 'SET', '', 0, '', '0', '2016-12-28', 2, '2016-12-28', 2, NULL, NULL, NULL),
(42, 'NBML001/2', 'Mamalia Gurita Bayi isi 6pcs', 2, 'LSN', '', 0, '', '0', '2016-12-28', 2, '0000-00-00', 0, NULL, NULL, NULL),
(43, 'NBMB001', 'Miabelle Set Topi Kupluk + Sepatu', 1, 'SET', '', 0, '', '0', '2016-12-28', 2, '2016-12-28', 2, NULL, NULL, NULL),
(44, 'MCMM001', 'Mamalia Gurita Ibu Korset', 2, 'LSN', '', 0, '', '0', '2016-12-28', 2, '0000-00-00', 0, NULL, NULL, NULL),
(45, 'BBMB001/2', 'Miabelle Bandana Bib isi 4pcs', 1, 'SET', '', 0, '', '0', '2016-12-28', 2, '0000-00-00', 0, NULL, NULL, NULL),
(48, '3502', 'Baju Rotary + Bando Renda', 1, 'SET', '', 0, '', '0', '2016-12-28', 2, '0000-00-00', 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_prices`
--

CREATE TABLE `purchase_prices` (
  `id` int(10) UNSIGNED NOT NULL,
  `supplierID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `productCode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `purchase_prices`
--

INSERT INTO `purchase_prices` (`id`, `supplierID`, `productID`, `productCode`, `price`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 33, 432, '43g34e', '4334.00', '2017-01-16 05:57:33', '2017-01-16 05:57:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `receives`
--

CREATE TABLE `receives` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `receives`
--

INSERT INTO `receives` (`id`, `invoiceID`, `customerID`, `invoiceTotal`, `receiveTotal`, `refundTotal`, `createdDate`, `createdUserID`, `modifiedDate`, `modifiedUserID`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 3, 12600000, 0, 0, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(2, 2, 3, 6500000, 0, 0, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(3, 3, 3, 4500000, 0, 0, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(4, 4, 3, 117750, 0, 0, NULL, 1, NULL, NULL, NULL, NULL, NULL),
(5, 5, 4, 86000, 0, 0, NULL, 1, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'Use this account with extreme caution. When using this account it is possible to cause irreversible damage to the system.', '2017-02-06 02:37:10', '2017-02-06 02:37:10'),
(2, 'Spv', 'Full access to create, edit, and update companies, and orders.', '2017-02-06 02:37:10', '2017-02-06 02:37:10'),
(3, 'Sales', 'Ability to create new companies and orders, or edit and update any existing ones.', '2017-02-06 02:37:10', '2017-02-06 02:37:10'),
(4, 'Kasir', 'Able to manage the company that the user belongs to, including adding sites, creating new users and assigning licences.', '2017-02-06 02:37:10', '2017-02-06 02:37:10'),
(5, 'User', 'A standard user that can have a licence assigned to them. No administrative features.', '2017-02-06 02:37:10', '2017-02-06 02:37:10');

-- --------------------------------------------------------

--
-- Table structure for table `salesinvoices`
--

CREATE TABLE `salesinvoices` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `amountPaid` double DEFAULT NULL,
  `customerID` int(11) NOT NULL,
  `customerName` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customerAddress` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `staffID` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `salesinvoices`
--

INSERT INTO `salesinvoices` (`id`, `invoiceNo`, `invoiceDate`, `soID`, `status`, `statusText`, `paymentType`, `expiredDate`, `ppn`, `total`, `discount`, `grandtotal`, `amountPaid`, `customerID`, `customerName`, `customerAddress`, `staffID`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'INV/KD/00001', '2017-01-20', 1, 2, 'Dibayar Sebagian', 'term', '2017-03-01', 0, 12630000, 30000, 12600000, 9505555, 3, 'KIDDY', 'KARAWACI', 1, NULL, NULL, NULL),
(2, 'INV/KD/00002', '2017-01-20', 2, 3, 'Lunas', 'term', '2017-04-02', 0, 6520000, 20000, 6500000, 6500000, 3, 'KIDDY', 'KARAWACI', 1, NULL, NULL, NULL),
(3, 'INV/KD/00003', '2017-01-20', 3, 3, 'Lunas', 'term', '2017-03-08', 0, 4500000, 0, 4500000, 5555555, 3, 'KIDDY', 'KARAWACI', 1, NULL, NULL, NULL),
(4, 'INV/KD/00004', '2017-01-24', 5, 1, 'Faktur Baru', 'tunai', '', 0, 117750, 0, 117750, NULL, 3, 'KIDDY', 'KARAWACI', 1, NULL, NULL, NULL),
(5, 'INV/HAN/00001', '2017-01-27', 4, 1, 'Faktur Baru', 'term', '2017-01-27', 0, 86000, 0, 86000, 0, 4, 'HANADORA', '', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `salesorderitems`
--

CREATE TABLE `salesorderitems` (
  `id` int(10) UNSIGNED NOT NULL,
  `soID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `productID` int(11) NOT NULL,
  `productName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sku` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `salesorderitems`
--

INSERT INTO `salesorderitems` (`id`, `soID`, `productID`, `productName`, `sku`, `price`, `qty`, `note`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', 10, 'Washlap Handuk 2 pcs Bordir dan Sablon', '3705', 9500, 100, NULL, NULL, NULL, NULL),
(2, '1', 1, 'Baby set baju, celana, topi, sepatu', '11148', 26500, 100, NULL, NULL, NULL, NULL),
(3, '1', 2, 'Bedong Rotary 40S (isi 3 pcs)', '35109', 55800, 100, NULL, NULL, NULL, NULL),
(4, '1', 36, 'Baby Set Kimono Gurita Bedong', 'CS11141', 26500, 100, NULL, NULL, NULL, NULL),
(5, '1', 17, 'Bib Perekat Plastik 2 pcs', '3795', 8000, 100, NULL, NULL, NULL, NULL),
(6, '2', 35, 'Baby Set Kaos Celana Bib STK', 'CS11106', 21500, 100, NULL, NULL, NULL, NULL),
(7, '2', 8, 'Bib Kaos 40S Aplikasi Bordir isi 2', '3703', 17000, 100, NULL, NULL, NULL, NULL),
(8, '2', 5, 'Popok Kaos Sablon isi 6 pcs', '3565', 22000, 100, NULL, NULL, NULL, NULL),
(9, '2', 21, 'STK Kaos Karet Sablon', '3844', 4700, 100, NULL, NULL, NULL, NULL),
(10, '3', 7, 'Popok Warna isi 6 pcs', '3592', 23000, 100, NULL, NULL, NULL, NULL),
(11, '3', 5, 'Popok Kaos Sablon isi 6 pcs', '3565', 22000, 100, NULL, NULL, NULL, NULL),
(12, '4', 35, 'Baby Set Kaos Celana Bib STK', 'CS11106', 21500, 4, NULL, NULL, NULL, NULL),
(24, '5', 35, 'Baby Set Kaos Celana Bib STK', 'CS11106', 21500, 1, NULL, NULL, NULL, NULL),
(25, '5', 32, 'Bando Renda Bulu Pita Besar', '9439', 18000, 1, NULL, NULL, NULL, NULL),
(26, '5', 36, 'Baby Set Kimono Gurita Bedong', 'CS11141', 26500, 1, NULL, NULL, NULL, NULL),
(27, '5', 21, 'STK Kaos Karet Sablon', '3844', 4700, 1, NULL, NULL, NULL, NULL),
(28, '5', 19, 'STK Kaos Rib Sablon', '3836', 4700, 1, NULL, NULL, NULL, NULL),
(29, '5', 16, 'Bib Plastik Sablon Kecil', '3785', 3250, 1, NULL, NULL, NULL, NULL),
(30, '5', 21, 'STK Kaos Karet Sablon', '3844', 4700, 1, NULL, NULL, NULL, NULL),
(31, '5', 25, 'STK Sablon WR 30S', '3861', 4650, 1, NULL, NULL, NULL, NULL),
(32, '5', 36, 'Baby Set Kimono Gurita Bedong', 'CS11141', 26500, 1, NULL, NULL, NULL, NULL),
(33, '5', 16, 'Bib Plastik Sablon Kecil', '3785', 3250, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `salesorders`
--

CREATE TABLE `salesorders` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `salesorders`
--

INSERT INTO `salesorders` (`id`, `soNo`, `customerID`, `customerName`, `customerAddress`, `staffID`, `staffName`, `orderDate`, `needDate`, `note`, `status`, `statusText`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ORD/KD/00001', 3, 'KIDDY', 'KARAWACI', 1, 'Nurul Irhamni', '2017-01-20', '2017-01-20', '', 3, 'Sudah Ada Pembayaran', NULL, NULL, NULL),
(2, 'ORD/KD/00002', 3, 'KIDDY', 'KARAWACI', 1, 'Nurul Irhamni', '2017-01-20', '2017-01-20', '', 2, 'Sudah Ada Invoice', NULL, NULL, NULL),
(3, 'ORD/KD/00003', 3, 'KIDDY', 'KARAWACI', 1, 'Nurul Irhamni', '2017-01-20', '2017-01-20', '', 3, 'Sudah Ada Pembayaran', NULL, NULL, NULL),
(4, 'ORD/HAN/00001', 4, 'HANADORA', '', 1, 'Administrator Staff', '2017-01-24', '2017-01-24', '', 2, 'Sudah Ada Invoice', NULL, NULL, NULL),
(5, 'ORD/KD/00004', 3, 'KIDDY', 'KARAWACI', 1, 'Administrator Staff', '2017-01-24', '2017-01-24', '', 2, 'Pesanan Baru', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `salespayments`
--

CREATE TABLE `salespayments` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `salespayments`
--

INSERT INTO `salespayments` (`id`, `paymentNo`, `invoiceID`, `paymentDate`, `payType`, `bankNo`, `bankName`, `bankAC`, `effectiveDate`, `total`, `customerID`, `customerName`, `customerAddress`, `ref`, `note`, `staffID`, `staffName`, `createdDate`, `createdUserID`, `modifiedDate`, `modifiedUserID`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'PAY/KD/00001', 1, '2017-01-21', 'transfer', '123456789', 'Bank Mandiri', 'Nurul Irhamni', '2017-01-21', 4500000, 3, 'KIDDY', '', NULL, 'Pembayaran pertama faktur  	INV/KD/00001', 1, 'Nurul Irhamni', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'PAY/KD/00002', 2, '2017-01-21', 'tunai', '55432746857', '', '', '2017-01-21', 11500000, 3, 'KIDDY', '', '8857930854', '', 1, 'Nurul Irhamni', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'PAY/KD/00003', NULL, '2017-01-27', 'tunai', '', '', '', '2017-01-28', 5561110, 3, 'KIDDY', '', NULL, '', 1, 'Administrator Staff', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sales_prices`
--

CREATE TABLE `sales_prices` (
  `id` int(10) UNSIGNED NOT NULL,
  `customerID` int(11) NOT NULL,
  `productID` varchar(11) COLLATE utf8_unicode_ci NOT NULL COMMENT 'kode',
  `productCode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sales_prices`
--

INSERT INTO `sales_prices` (`id`, `customerID`, `productID`, `productCode`, `price`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '1', '11148', '234.00', '2017-02-03 01:19:04', '2017-02-06 02:58:38', NULL),
(2, 2, '1', '11148', '432.00', '2017-02-03 01:19:04', '2017-02-06 02:58:38', NULL),
(3, 3, '1', '11148', '234.00', '2017-02-03 01:19:04', '2017-02-06 02:58:38', NULL),
(4, 4, '1', '11148', '546.00', '2017-02-03 01:19:04', '2017-02-06 02:58:38', NULL),
(5, 1, '2', '35109', '234.00', '2017-02-03 01:19:04', '2017-02-06 02:58:38', NULL),
(6, 2, '2', '35109', '432.00', '2017-02-03 01:19:04', '2017-02-06 02:58:38', NULL),
(7, 3, '2', '35109', '234.00', '2017-02-03 01:19:04', '2017-02-06 02:58:38', NULL),
(8, 4, '2', '35109', '546.00', '2017-02-03 01:19:04', '2017-02-06 02:58:38', NULL),
(9, 1, '3', '3539', '234.00', '2017-02-03 01:19:04', '2017-02-06 02:58:38', NULL),
(10, 2, '3', '3539', '432.00', '2017-02-03 01:19:04', '2017-02-06 02:58:38', NULL),
(11, 3, '3', '3539', '234.00', '2017-02-03 01:19:04', '2017-02-06 02:58:38', NULL),
(12, 4, '3', '3539', '546.00', '2017-02-03 01:19:04', '2017-02-06 02:58:38', NULL),
(13, 1, '4', '3539B', '234.00', '2017-02-03 01:19:04', '2017-02-06 02:58:38', NULL),
(14, 2, '4', '3539B', '432.00', '2017-02-03 01:19:04', '2017-02-06 02:58:38', NULL),
(15, 3, '4', '3539B', '234.00', '2017-02-03 01:19:04', '2017-02-06 02:58:38', NULL),
(16, 4, '4', '3539B', '546.00', '2017-02-03 01:19:04', '2017-02-06 02:58:38', NULL),
(17, 1, '5', '3565', '234.00', '2017-02-03 01:19:04', '2017-02-06 02:58:38', NULL),
(18, 2, '5', '3565', '432.00', '2017-02-03 01:19:04', '2017-02-06 02:58:38', NULL),
(19, 3, '5', '3565', '234.00', '2017-02-03 01:19:04', '2017-02-06 02:58:38', NULL),
(20, 4, '5', '3565', '546.00', '2017-02-03 01:19:04', '2017-02-06 02:58:38', NULL),
(21, 1, '6', '3590', '234.00', '2017-02-03 01:19:04', '2017-02-06 02:58:38', NULL),
(22, 2, '6', '3590', '432.00', '2017-02-03 01:19:04', '2017-02-06 02:58:38', NULL),
(23, 3, '6', '3590', '234.00', '2017-02-03 01:19:04', '2017-02-06 02:58:38', NULL),
(24, 4, '6', '3590', '546.00', '2017-02-03 01:19:04', '2017-02-06 02:58:38', NULL),
(25, 1, '7', '3592', '234.00', '2017-02-03 01:19:04', '2017-02-06 02:58:38', NULL),
(26, 2, '7', '3592', '432.00', '2017-02-03 01:19:04', '2017-02-06 02:58:38', NULL),
(27, 3, '7', '3592', '234.00', '2017-02-03 01:19:04', '2017-02-06 02:58:38', NULL),
(28, 4, '7', '3592', '546.00', '2017-02-03 01:19:04', '2017-02-06 02:58:38', NULL),
(29, 1, '8', '3703', '234.00', '2017-02-03 01:19:04', '2017-02-06 02:58:38', NULL),
(30, 2, '8', '3703', '432.00', '2017-02-03 01:19:04', '2017-02-06 02:58:38', NULL),
(31, 3, '8', '3703', '234.00', '2017-02-03 01:19:04', '2017-02-06 02:58:38', NULL),
(32, 4, '8', '3703', '546.00', '2017-02-03 01:19:04', '2017-02-06 02:58:38', NULL),
(33, 1, '9', '3704', '234.00', '2017-02-03 01:19:04', '2017-02-06 02:58:38', NULL),
(34, 2, '9', '3704', '432.00', '2017-02-03 01:19:04', '2017-02-06 02:58:38', NULL),
(35, 3, '9', '3704', '234.00', '2017-02-03 01:19:04', '2017-02-06 02:58:38', NULL),
(36, 4, '9', '3704', '546.00', '2017-02-03 01:19:04', '2017-02-06 02:58:38', NULL),
(37, 1, '10', '3705', '234.00', '2017-02-03 01:19:04', '2017-02-06 02:58:38', NULL),
(38, 2, '10', '3705', '432.00', '2017-02-03 01:19:04', '2017-02-06 02:58:38', NULL),
(39, 3, '10', '3705', '234.00', '2017-02-03 01:19:04', '2017-02-06 02:58:38', NULL),
(40, 4, '10', '3705', '546.00', '2017-02-03 01:19:04', '2017-02-06 02:58:38', NULL),
(41, 1, '11', '3766', '234.00', '2017-02-03 01:19:04', '2017-02-06 02:58:38', NULL),
(42, 2, '11', '3766', '432.00', '2017-02-03 01:19:04', '2017-02-06 02:58:38', NULL),
(43, 3, '11', '3766', '234.00', '2017-02-03 01:19:04', '2017-02-06 02:58:38', NULL),
(44, 4, '11', '3766', '546.00', '2017-02-03 01:19:04', '2017-02-06 02:58:38', NULL),
(45, 1, '12', '3770', '234.00', '2017-02-03 01:19:04', '2017-02-06 02:58:38', NULL),
(46, 2, '12', '3770', '432.00', '2017-02-03 01:19:04', '2017-02-06 02:58:38', NULL),
(47, 3, '12', '3770', '234.00', '2017-02-03 01:19:04', '2017-02-06 02:58:38', NULL),
(48, 4, '12', '3770', '546.00', '2017-02-03 01:19:04', '2017-02-06 02:58:38', NULL),
(49, 1, '13', '3771', '234.00', '2017-02-03 01:19:04', '2017-02-06 02:58:38', NULL),
(50, 2, '13', '3771', '432.00', '2017-02-03 01:19:04', '2017-02-06 02:58:38', NULL),
(51, 3, '13', '3771', '234.00', '2017-02-03 01:19:04', '2017-02-06 02:58:38', NULL),
(52, 4, '13', '3771', '546.00', '2017-02-03 01:19:04', '2017-02-06 02:58:38', NULL),
(53, 1, '14', '3773', '234.00', '2017-02-03 01:19:04', '2017-02-06 02:58:38', NULL),
(54, 2, '14', '3773', '432.00', '2017-02-03 01:19:04', '2017-02-06 02:58:38', NULL),
(55, 3, '14', '3773', '234.00', '2017-02-03 01:19:04', '2017-02-06 02:58:38', NULL),
(56, 4, '14', '3773', '546.00', '2017-02-03 01:19:04', '2017-02-06 02:58:38', NULL),
(57, 1, '15', '3777', '234.00', '2017-02-03 01:19:04', '2017-02-06 02:58:38', NULL),
(58, 2, '15', '3777', '432.00', '2017-02-03 01:19:04', '2017-02-06 02:58:38', NULL),
(59, 3, '15', '3777', '234.00', '2017-02-03 01:19:04', '2017-02-06 02:58:38', NULL),
(60, 4, '15', '3777', '546.00', '2017-02-03 01:19:05', '2017-02-06 02:58:38', NULL),
(61, 1, '16', '3785', '234.00', '2017-02-03 01:19:05', '2017-02-06 02:58:38', NULL),
(62, 2, '16', '3785', '432.00', '2017-02-03 01:19:05', '2017-02-06 02:58:38', NULL),
(63, 3, '16', '3785', '234.00', '2017-02-03 01:19:05', '2017-02-06 02:58:38', NULL),
(64, 4, '16', '3785', '546.00', '2017-02-03 01:19:05', '2017-02-06 02:58:38', NULL),
(65, 1, '17', '3795', '234.00', '2017-02-03 01:19:05', '2017-02-06 02:58:38', NULL),
(66, 2, '17', '3795', '432.00', '2017-02-03 01:19:05', '2017-02-06 02:58:38', NULL),
(67, 3, '17', '3795', '234.00', '2017-02-03 01:19:05', '2017-02-06 02:58:38', NULL),
(68, 4, '17', '3795', '546.00', '2017-02-03 01:19:05', '2017-02-06 02:58:38', NULL),
(69, 1, '18', '3796', '234.00', '2017-02-03 01:19:05', '2017-02-06 02:58:38', NULL),
(70, 2, '18', '3796', '432.00', '2017-02-03 01:19:05', '2017-02-06 02:58:38', NULL),
(71, 3, '18', '3796', '234.00', '2017-02-03 01:19:05', '2017-02-06 02:58:38', NULL),
(72, 4, '18', '3796', '546.00', '2017-02-03 01:19:05', '2017-02-06 02:58:38', NULL),
(73, 1, '19', '3836', '234.00', '2017-02-03 01:19:05', '2017-02-06 02:58:38', NULL),
(74, 2, '19', '3836', '432.00', '2017-02-03 01:19:05', '2017-02-06 02:58:38', NULL),
(75, 3, '19', '3836', '234.00', '2017-02-03 01:19:05', '2017-02-06 02:58:38', NULL),
(76, 4, '19', '3836', '546.00', '2017-02-03 01:19:05', '2017-02-06 02:58:38', NULL),
(77, 1, '20', '3836B', '234.00', '2017-02-03 01:19:05', '2017-02-06 02:58:38', NULL),
(78, 2, '20', '3836B', '432.00', '2017-02-03 01:19:05', '2017-02-06 02:58:38', NULL),
(79, 3, '20', '3836B', '234.00', '2017-02-03 01:19:05', '2017-02-06 02:58:38', NULL),
(80, 4, '20', '3836B', '546.00', '2017-02-03 01:19:05', '2017-02-06 02:58:38', NULL),
(81, 1, '21', '3844', '234.00', '2017-02-03 01:19:05', '2017-02-06 02:58:38', NULL),
(82, 2, '21', '3844', '432.00', '2017-02-03 01:19:05', '2017-02-06 02:58:38', NULL),
(83, 3, '21', '3844', '234.00', '2017-02-03 01:19:05', '2017-02-06 02:58:38', NULL),
(84, 4, '21', '3844', '546.00', '2017-02-03 01:19:05', '2017-02-06 02:58:38', NULL),
(85, 1, '22', '3844B', '234.00', '2017-02-03 01:19:05', '2017-02-06 02:58:38', NULL),
(86, 2, '22', '3844B', '432.00', '2017-02-03 01:19:05', '2017-02-06 02:58:38', NULL),
(87, 3, '22', '3844B', '234.00', '2017-02-03 01:19:05', '2017-02-06 02:58:38', NULL),
(88, 4, '22', '3844B', '546.00', '2017-02-03 01:19:05', '2017-02-06 02:58:38', NULL),
(89, 1, '23', '3855', '234.00', '2017-02-03 01:19:05', '2017-02-06 02:58:38', NULL),
(90, 2, '23', '3855', '432.00', '2017-02-03 01:19:05', '2017-02-06 02:58:38', NULL),
(91, 3, '23', '3855', '234.00', '2017-02-03 01:19:05', '2017-02-06 02:58:38', NULL),
(92, 4, '23', '3855', '546.00', '2017-02-03 01:19:05', '2017-02-06 02:58:38', NULL),
(93, 1, '24', '3860', '234.00', '2017-02-03 01:19:05', '2017-02-06 02:58:38', NULL),
(94, 2, '24', '3860', '432.00', '2017-02-03 01:19:05', '2017-02-06 02:58:38', NULL),
(95, 3, '24', '3860', '234.00', '2017-02-03 01:19:05', '2017-02-06 02:58:38', NULL),
(96, 4, '24', '3860', '546.00', '2017-02-03 01:19:05', '2017-02-06 02:58:38', NULL),
(97, 1, '25', '3861', '234.00', '2017-02-03 01:19:05', '2017-02-06 02:58:38', NULL),
(98, 2, '25', '3861', '432.00', '2017-02-03 01:19:05', '2017-02-06 02:58:38', NULL),
(99, 3, '25', '3861', '234.00', '2017-02-03 01:19:05', '2017-02-06 02:58:38', NULL),
(100, 4, '25', '3861', '546.00', '2017-02-03 01:19:05', '2017-02-06 02:58:38', NULL),
(101, 1, '26', '3861B', '234.00', '2017-02-03 01:19:05', '2017-02-06 02:58:38', NULL),
(102, 2, '26', '3861B', '432.00', '2017-02-03 01:19:05', '2017-02-06 02:58:38', NULL),
(103, 3, '26', '3861B', '234.00', '2017-02-03 01:19:05', '2017-02-06 02:58:38', NULL),
(104, 4, '26', '3861B', '546.00', '2017-02-03 01:19:05', '2017-02-06 02:58:38', NULL),
(105, 1, '27', '6011', '234.00', '2017-02-03 01:19:05', '2017-02-06 02:58:38', NULL),
(106, 2, '27', '6011', '432.00', '2017-02-03 01:19:05', '2017-02-06 02:58:38', NULL),
(107, 3, '27', '6011', '234.00', '2017-02-03 01:19:05', '2017-02-06 02:58:38', NULL),
(108, 4, '27', '6011', '546.00', '2017-02-03 01:19:05', '2017-02-06 02:58:38', NULL),
(109, 1, '28', '6012', '234.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(110, 2, '28', '6012', '432.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(111, 3, '28', '6012', '234.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(112, 4, '28', '6012', '546.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(113, 1, '29', '9436', '234.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(114, 2, '29', '9436', '432.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(115, 3, '29', '9436', '234.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(116, 4, '29', '9436', '546.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(117, 1, '30', '9437', '234.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(118, 2, '30', '9437', '432.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(119, 3, '30', '9437', '234.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(120, 4, '30', '9437', '546.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(121, 1, '31', '9438', '234.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(122, 2, '31', '9438', '432.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(123, 3, '31', '9438', '234.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(124, 4, '31', '9438', '546.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(125, 1, '32', '9439', '234.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(126, 2, '32', '9439', '432.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(127, 3, '32', '9439', '234.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(128, 4, '32', '9439', '546.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(129, 1, '33', '9440', '234.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(130, 2, '33', '9440', '432.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(131, 3, '33', '9440', '234.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(132, 4, '33', '9440', '546.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(133, 1, '34', 'CS001', '234.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(134, 2, '34', 'CS001', '432.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(135, 3, '34', 'CS001', '234.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(136, 4, '34', 'CS001', '546.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(137, 1, '35', 'CS11106', '234.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(138, 2, '35', 'CS11106', '432.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(139, 3, '35', 'CS11106', '234.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(140, 4, '35', 'CS11106', '546.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(141, 1, '36', 'CS11141', '234.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(142, 2, '36', 'CS11141', '432.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(143, 3, '36', 'CS11141', '234.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(144, 4, '36', 'CS11141', '546.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(145, 1, '37', 'UCMB001', '234.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(146, 2, '37', 'UCMB001', '432.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(147, 3, '37', 'UCMB001', '234.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(148, 4, '37', 'UCMB001', '546.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(149, 1, '38', 'UCMB002', '234.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(150, 2, '38', 'UCMB002', '432.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(151, 3, '38', 'UCMB002', '234.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(152, 4, '38', 'UCMB002', '546.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(153, 1, '39', 'UCMB003', '234.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(154, 2, '39', 'UCMB003', '432.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(155, 3, '39', 'UCMB003', '234.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(156, 4, '39', 'UCMB003', '546.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(157, 1, '40', 'UCMB005', '234.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(158, 2, '40', 'UCMB005', '432.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(159, 3, '40', 'UCMB005', '234.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(160, 4, '40', 'UCMB005', '546.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(161, 1, '41', 'SBMB001/2', '234.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(162, 2, '41', 'SBMB001/2', '432.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(163, 3, '41', 'SBMB001/2', '234.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(164, 4, '41', 'SBMB001/2', '546.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(165, 1, '42', 'NBML001/2', '234.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(166, 2, '42', 'NBML001/2', '432.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(167, 3, '42', 'NBML001/2', '234.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(168, 4, '42', 'NBML001/2', '546.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(169, 1, '43', 'NBMB001', '234.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(170, 2, '43', 'NBMB001', '432.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(171, 3, '43', 'NBMB001', '234.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(172, 4, '43', 'NBMB001', '546.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(173, 1, '44', 'MCMM001', '234.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(174, 2, '44', 'MCMM001', '432.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(175, 3, '44', 'MCMM001', '234.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(176, 4, '44', 'MCMM001', '546.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(177, 1, '45', 'BBMB001/2', '234.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(178, 2, '45', 'BBMB001/2', '432.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(179, 3, '45', 'BBMB001/2', '234.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(180, 4, '45', 'BBMB001/2', '546.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(181, 1, '48', '3502', '234.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(182, 2, '48', '3502', '432.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(183, 3, '48', '3502', '234.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL),
(184, 4, '48', '3502', '546.00', '2017-02-03 01:19:05', '2017-02-06 02:58:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `set_modules`
--

CREATE TABLE `set_modules` (
  `modulID` int(11) NOT NULL,
  `modulName` varchar(100) NOT NULL,
  `authorize` varchar(50) NOT NULL COMMENT 'Administrator, SPV, Sales, Kasir',
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `sort_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `set_modules`
--

INSERT INTO `set_modules` (`modulID`, `modulName`, `authorize`, `status`, `sort_id`) VALUES
(1, 'Admin/ User', '1,0,0,0', 'active', 0),
(2, 'Set Company Profile', '1,0,0,0', 'active', 0),
(3, 'Customer', '1,0,0,0', 'active', 0),
(4, 'Gudang / Faktori', '1,0,0,0', 'active', 0),
(5, 'Produk', '1,0,0,0', 'active', 0),
(6, 'Harga Produk', '1,0,0,0', 'active', 0),
(7, 'Inventory', '1,0,0,0', 'active', 0);

-- --------------------------------------------------------

--
-- Table structure for table `stock_products`
--

CREATE TABLE `stock_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `productID` int(11) NOT NULL,
  `factoryID` int(11) NOT NULL,
  `stockIN` int(11) NOT NULL,
  `stockOut` int(11) NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `stock_products`
--

INSERT INTO `stock_products` (`id`, `productID`, `factoryID`, `stockIN`, `stockOut`, `note`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 54, 34, 21, 65, 'update postman', '2017-01-16 03:03:53', '2017-01-16 05:30:23', NULL),
(2, 54, 34, 21, 65, 'update postman ds', '2017-01-16 03:11:17', '2017-01-16 19:38:40', '2017-01-16 19:38:40'),
(3, 54, 34, 21, 65, 'update postman ds', '2017-01-16 19:38:02', '2017-01-16 19:38:02', NULL),
(4, 543, 342, 212, 651, 'update postman dsf', '2017-01-16 19:38:19', '2017-01-16 19:38:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `updateharga`
--

CREATE TABLE `updateharga` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `updateharga`
--

INSERT INTO `updateharga` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'judul 1', 'des judul 1', '2017-01-10 17:00:00', NULL),
(2, 'judul 1', 'des judul 1', NULL, NULL),
(3, 'itsolutionstuff.com', 'Larave Tuto..', NULL, NULL),
(4, 'Demo.itsolutionstuff.com', 'Demo fo Larave Tuto..', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'administrator', 'administrator', 'administrator@gmail.com', '$2y$10$/dtGj1CdreSROQIERn/i7eqw3RCGoZXwexGUOpxv2xq1B57mwCcDa', '1', 'bKf3zREDAoFkU9ACv0PR7jFPkHJeGQGz5ahehcTb9cIYFoOJyLx7eENIScdN', '2017-02-06 02:45:52', '2017-02-06 02:46:14'),
(2, 'kasir1', 'kasir1', 'kasir1@gmail.com', '$2y$10$nLD4yW0RH3yCiFKdx6Jn5e3EREo1wLVCXlD4oEGSaO8WAFj7itR96', '4', 'gZi6RkZ9acQNBR6XPdO3GcYhFhu9NgFPlKArdX8vPMqWCdsCcxOlMKs6ts8b', '2017-02-06 02:46:38', '2017-02-06 02:55:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `as_company`
--
ALTER TABLE `as_company`
  ADD PRIMARY KEY (`companyID`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `companies_email_unique` (`email`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `factories`
--
ALTER TABLE `factories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_suppliers`
--
ALTER TABLE `ms_suppliers`
  ADD PRIMARY KEY (`supplierID`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `paymentdetail`
--
ALTER TABLE `paymentdetail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_prices`
--
ALTER TABLE `purchase_prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receives`
--
ALTER TABLE `receives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salesinvoices`
--
ALTER TABLE `salesinvoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salesorderitems`
--
ALTER TABLE `salesorderitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salesorders`
--
ALTER TABLE `salesorders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salespayments`
--
ALTER TABLE `salespayments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_prices`
--
ALTER TABLE `sales_prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `set_modules`
--
ALTER TABLE `set_modules`
  ADD PRIMARY KEY (`modulID`);

--
-- Indexes for table `stock_products`
--
ALTER TABLE `stock_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `updateharga`
--
ALTER TABLE `updateharga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `as_company`
--
ALTER TABLE `as_company`
  MODIFY `companyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `factories`
--
ALTER TABLE `factories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `ms_suppliers`
--
ALTER TABLE `ms_suppliers`
  MODIFY `supplierID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `paymentdetail`
--
ALTER TABLE `paymentdetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `produks`
--
ALTER TABLE `produks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `purchase_prices`
--
ALTER TABLE `purchase_prices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `receives`
--
ALTER TABLE `receives`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `salesinvoices`
--
ALTER TABLE `salesinvoices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `salesorderitems`
--
ALTER TABLE `salesorderitems`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `salesorders`
--
ALTER TABLE `salesorders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `salespayments`
--
ALTER TABLE `salespayments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sales_prices`
--
ALTER TABLE `sales_prices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;
--
-- AUTO_INCREMENT for table `set_modules`
--
ALTER TABLE `set_modules`
  MODIFY `modulID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `stock_products`
--
ALTER TABLE `stock_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `updateharga`
--
ALTER TABLE `updateharga`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
