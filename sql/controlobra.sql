-- MySQL dump 10.13  Distrib 5.5.46, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: controlobra
-- ------------------------------------------------------
-- Server version	5.5.46-0ubuntu0.14.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `_material_category`
--

DROP TABLE IF EXISTS `_material_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_material_category` (
  `matCatId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `active` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`matCatId`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `_material_concept`
--

DROP TABLE IF EXISTS `_material_concept`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_material_concept` (
  `matConceptId` int(11) NOT NULL AUTO_INCREMENT,
  `matCatId` int(11) NOT NULL,
  `matSubcatId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `active` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`matConceptId`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `_material_subcategory`
--

DROP TABLE IF EXISTS `_material_subcategory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_material_subcategory` (
  `matSubcatId` int(11) NOT NULL AUTO_INCREMENT,
  `matCatId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `active` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`matSubcatId`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `_subcategory`
--

DROP TABLE IF EXISTS `_subcategory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_subcategory` (
  `subcategoryId` int(11) NOT NULL AUTO_INCREMENT,
  `categoryId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `active` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`subcategoryId`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `account_pagos`
--

DROP TABLE IF EXISTS `account_pagos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `account_pagos` (
  `accountPagoId` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` enum('Cheque','Transferencia') NOT NULL DEFAULT 'Cheque',
  `projectId` int(11) NOT NULL,
  `orderBuyId` int(11) NOT NULL,
  `accountPaymentId` int(11) NOT NULL,
  `supplierId` int(11) NOT NULL,
  `bankId` int(11) NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `currency` varchar(10) NOT NULL,
  `noCheque` varchar(255) NOT NULL,
  `noInvoice` varchar(255) NOT NULL,
  `fecha` varchar(10) NOT NULL,
  `fechaRecoger` varchar(10) NOT NULL,
  `personaRecoger` varchar(255) NOT NULL,
  `fechaCobro` varchar(10) NOT NULL,
  `obsCancel` text NOT NULL,
  `fechaCancel` varchar(10) NOT NULL,
  `status` enum('Activo','Cancelado') NOT NULL DEFAULT 'Activo',
  `statusCheque` enum('Emitido','Recogido','Cobrado') NOT NULL,
  PRIMARY KEY (`accountPagoId`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `account_payment`
--

DROP TABLE IF EXISTS `account_payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `account_payment` (
  `accountPaymentId` int(11) NOT NULL AUTO_INCREMENT,
  `projectId` int(11) NOT NULL,
  `orderBuyId` int(11) NOT NULL,
  `supplierId` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `pagado` enum('0','1') NOT NULL DEFAULT '0',
  `revisado` enum('0','1') NOT NULL DEFAULT '0',
  `fecha` varchar(10) NOT NULL,
  PRIMARY KEY (`accountPaymentId`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `bank`
--

DROP TABLE IF EXISTS `bank`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bank` (
  `bankId` int(11) NOT NULL AUTO_INCREMENT,
  `bank` varchar(255) NOT NULL,
  `startBalance` decimal(10,2) NOT NULL,
  `currentBalance` decimal(10,2) NOT NULL,
  `accountNumber` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `titular` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `clabe` varchar(255) NOT NULL,
  `projectId` int(11) NOT NULL,
  `currency` varchar(10) NOT NULL,
  `noCheque` int(11) NOT NULL,
  `active` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`bankId`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `bank_project`
--

DROP TABLE IF EXISTS `bank_project`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bank_project` (
  `bankProjId` int(11) NOT NULL AUTO_INCREMENT,
  `bankId` int(11) NOT NULL,
  `projectId` int(11) NOT NULL,
  PRIMARY KEY (`bankProjId`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `categoryId` int(11) NOT NULL AUTO_INCREMENT,
  `noCat` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `active` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`categoryId`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `city` (
  `cityId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `stateId` int(11) NOT NULL,
  PRIMARY KEY (`cityId`)
) ENGINE=MyISAM AUTO_INCREMENT=2599 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `concept`
--

DROP TABLE IF EXISTS `concept`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `concept` (
  `conceptId` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(255) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `subcategoryId` int(11) NOT NULL,
  `conceptConId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `unitId` int(255) NOT NULL,
  `steel` enum('0','1') NOT NULL DEFAULT '0',
  `comment` text NOT NULL,
  PRIMARY KEY (`conceptId`)
) ENGINE=MyISAM AUTO_INCREMENT=184 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `concept_concept`
--

DROP TABLE IF EXISTS `concept_concept`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `concept_concept` (
  `conceptConId` int(11) NOT NULL AUTO_INCREMENT,
  `categoryId` int(11) NOT NULL,
  `subcategoryId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `active` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`conceptConId`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `concept_material`
--

DROP TABLE IF EXISTS `concept_material`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `concept_material` (
  `conceptMatId` int(11) NOT NULL AUTO_INCREMENT,
  `conceptId` int(11) NOT NULL,
  `matCatId` int(11) NOT NULL,
  `matSubcatId` int(11) NOT NULL,
  `materialId` int(11) NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `unitPrice` decimal(10,2) NOT NULL,
  PRIMARY KEY (`conceptMatId`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `concept_price`
--

DROP TABLE IF EXISTS `concept_price`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `concept_price` (
  `conceptPriceId` int(11) NOT NULL AUTO_INCREMENT,
  `conceptId` int(11) NOT NULL,
  `supplierId` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `iva` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `fecha` varchar(10) NOT NULL,
  `supMain` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`conceptPriceId`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `contract`
--

DROP TABLE IF EXISTS `contract`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contract` (
  `contractId` int(11) NOT NULL AUTO_INCREMENT,
  `projectId` int(11) NOT NULL,
  `noContract` varchar(255) NOT NULL,
  `tipoClte` enum('Cliente','Inversionista','Accionista') NOT NULL DEFAULT 'Cliente',
  `projItemId` int(11) NOT NULL,
  `projLevelId` int(11) NOT NULL,
  `projDeptoId` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `abono` decimal(10,2) NOT NULL,
  `saldo` decimal(10,2) NOT NULL,
  `fechaIniCont` varchar(10) NOT NULL,
  `fechaIniPagos` varchar(10) NOT NULL,
  `noTerrazas` int(11) NOT NULL,
  `jardines` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `currency` varchar(10) NOT NULL,
  `priceM2` decimal(10,2) NOT NULL,
  `m2Depto` decimal(10,2) NOT NULL,
  `noCajones` int(11) NOT NULL,
  `noBodegas` int(11) NOT NULL,
  `notas` text NOT NULL,
  `status` enum('Activo','Cancelado') NOT NULL,
  PRIMARY KEY (`contractId`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `contract_bodega`
--

DROP TABLE IF EXISTS `contract_bodega`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contract_bodega` (
  `contBodegaId` int(11) NOT NULL AUTO_INCREMENT,
  `projectId` int(11) NOT NULL,
  `contractId` int(11) NOT NULL,
  `projBodegaId` int(11) NOT NULL,
  PRIMARY KEY (`contBodegaId`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `contract_cajon`
--

DROP TABLE IF EXISTS `contract_cajon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contract_cajon` (
  `contCajonId` int(11) NOT NULL AUTO_INCREMENT,
  `projectId` int(11) NOT NULL,
  `contractId` int(11) NOT NULL,
  `projCajonId` int(11) NOT NULL,
  PRIMARY KEY (`contCajonId`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `contract_cancel`
--

DROP TABLE IF EXISTS `contract_cancel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contract_cancel` (
  `contCancelId` int(11) NOT NULL AUTO_INCREMENT,
  `qtyCheque` decimal(10,2) NOT NULL,
  `noCheque` int(11) NOT NULL,
  `contractId` int(11) NOT NULL,
  `contractId2` int(11) NOT NULL,
  `qtyTraspaso` int(11) NOT NULL,
  `currency` varchar(10) NOT NULL,
  `bankId` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `totalCurrency` varchar(10) NOT NULL,
  `details` text NOT NULL,
  `montoPena` decimal(10,2) NOT NULL,
  `totalNeto` decimal(10,2) NOT NULL,
  PRIMARY KEY (`contCancelId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `contract_cheque`
--

DROP TABLE IF EXISTS `contract_cheque`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contract_cheque` (
  `contChequeId` int(11) NOT NULL AUTO_INCREMENT,
  `contCancelId` int(11) NOT NULL,
  `contractId` int(11) NOT NULL,
  `bankId` int(11) NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `noCheque` varchar(255) NOT NULL,
  PRIMARY KEY (`contChequeId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `contract_expiry`
--

DROP TABLE IF EXISTS `contract_expiry`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contract_expiry` (
  `contExpiryId` int(11) NOT NULL AUTO_INCREMENT,
  `projectId` int(11) NOT NULL,
  `contractId` int(11) NOT NULL,
  `mantEquipId` int(11) NOT NULL,
  `noExpiry` varchar(255) NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `fecha` varchar(10) NOT NULL,
  `obs` varchar(255) NOT NULL,
  PRIMARY KEY (`contExpiryId`)
) ENGINE=MyISAM AUTO_INCREMENT=173 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `contract_pago`
--

DROP TABLE IF EXISTS `contract_pago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contract_pago` (
  `contPagoId` int(11) NOT NULL AUTO_INCREMENT,
  `contractId` int(11) NOT NULL,
  `contPaymentId` int(11) NOT NULL,
  `contExpiryId` int(11) NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  PRIMARY KEY (`contPagoId`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `contract_payment`
--

DROP TABLE IF EXISTS `contract_payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contract_payment` (
  `contPaymentId` int(11) NOT NULL AUTO_INCREMENT,
  `projectId` int(11) NOT NULL,
  `contractId` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `bankId` int(11) NOT NULL,
  `projItemId` int(11) NOT NULL,
  `projLevelId` int(11) NOT NULL,
  `projDeptoId` int(11) NOT NULL,
  `fecha` varchar(10) NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `currency` varchar(10) NOT NULL,
  `currencyExchange` decimal(10,2) NOT NULL,
  `concepto` varchar(10) NOT NULL,
  `observaciones` text NOT NULL,
  PRIMARY KEY (`contPaymentId`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cuantificacion`
--

DROP TABLE IF EXISTS `cuantificacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cuantificacion` (
  `cuantificacionId` int(11) NOT NULL AUTO_INCREMENT,
  `projectId` int(11) NOT NULL,
  `supplierId` int(11) NOT NULL,
  `conceptId` int(11) NOT NULL,
  `projTypeId` int(11) NOT NULL,
  `qtyConcept` int(11) NOT NULL,
  `noPresupuesto` varchar(255) NOT NULL,
  `qtyArea` int(11) NOT NULL,
  `b` decimal(10,2) NOT NULL,
  `h` decimal(10,2) NOT NULL,
  `z` decimal(10,2) NOT NULL,
  `bV` decimal(10,2) NOT NULL,
  `hV` decimal(10,2) NOT NULL,
  `zV` decimal(10,2) NOT NULL,
  `unitId` int(11) NOT NULL,
  `unitPrice` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `steel` enum('0','1') NOT NULL DEFAULT '0',
  `isExtra` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`cuantificacionId`)
) ENGINE=MyISAM AUTO_INCREMENT=103 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cuantificacion_ejes`
--

DROP TABLE IF EXISTS `cuantificacion_ejes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cuantificacion_ejes` (
  `cuantEjeId` int(11) NOT NULL AUTO_INCREMENT,
  `cuantificacionId` int(11) NOT NULL,
  `projEjeNId` int(11) NOT NULL,
  `projEjeLId` int(11) NOT NULL,
  `projEjeN2Id` int(11) NOT NULL,
  `projEjeL2Id` int(11) NOT NULL,
  PRIMARY KEY (`cuantEjeId`)
) ENGINE=MyISAM AUTO_INCREMENT=139 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cuantificacion_item`
--

DROP TABLE IF EXISTS `cuantificacion_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cuantificacion_item` (
  `cuantItemId` int(11) NOT NULL AUTO_INCREMENT,
  `cuantificacionId` int(11) NOT NULL,
  `projItemId` int(11) NOT NULL,
  `projLevelId` int(11) NOT NULL,
  `projLevelId2` int(11) NOT NULL,
  `totalLevel` int(11) NOT NULL,
  `totalAreas` int(11) NOT NULL,
  PRIMARY KEY (`cuantItemId`)
) ENGINE=MyISAM AUTO_INCREMENT=112 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cuantificacion_material`
--

DROP TABLE IF EXISTS `cuantificacion_material`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cuantificacion_material` (
  `cuantMatId` int(11) NOT NULL AUTO_INCREMENT,
  `cuantificacionId` int(11) NOT NULL,
  `conceptMatId` int(11) NOT NULL,
  `traslape` decimal(10,2) NOT NULL,
  `bulbos` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `mtoLineal` int(11) NOT NULL,
  `weight` decimal(10,2) NOT NULL,
  `totalWeight` decimal(10,2) NOT NULL,
  PRIMARY KEY (`cuantMatId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cuantificacion_type`
--

DROP TABLE IF EXISTS `cuantificacion_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cuantificacion_type` (
  `cuantTypeId` int(11) NOT NULL AUTO_INCREMENT,
  `cuantificacionId` int(11) NOT NULL,
  `projTypeId` int(11) NOT NULL,
  PRIMARY KEY (`cuantTypeId`)
) ENGINE=MyISAM AUTO_INCREMENT=123 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer` (
  `customerId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `rfc` varchar(255) NOT NULL,
  `active` enum('0','1') NOT NULL DEFAULT '0',
  `street` varchar(255) NOT NULL,
  `noExt` varchar(255) NOT NULL,
  `noInt` varchar(255) NOT NULL,
  `postalCode` varchar(255) NOT NULL,
  `colonia` varchar(255) NOT NULL,
  `cityId` int(11) NOT NULL,
  `stateId` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `edoCivil` varchar(255) NOT NULL,
  `regimenMat` varchar(255) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `otraReligion` varchar(255) NOT NULL,
  `birthdate` varchar(10) NOT NULL,
  `notes` text NOT NULL,
  `company` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `archivo` varchar(255) NOT NULL,
  PRIMARY KEY (`customerId`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `customer_address`
--

DROP TABLE IF EXISTS `customer_address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer_address` (
  `custAddressId` int(11) NOT NULL AUTO_INCREMENT,
  `customerId` int(11) NOT NULL,
  `street` varchar(255) NOT NULL,
  `noExt` varchar(255) NOT NULL,
  `noInt` varchar(255) NOT NULL,
  `postalCode` varchar(255) NOT NULL,
  `colonia` varchar(255) NOT NULL,
  `cityId` int(11) NOT NULL,
  `stateId` int(11) NOT NULL,
  PRIMARY KEY (`custAddressId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `customer_doc`
--

DROP TABLE IF EXISTS `customer_doc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer_doc` (
  `custDocId` int(11) NOT NULL AUTO_INCREMENT,
  `customerId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`custDocId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `empresas`
--

DROP TABLE IF EXISTS `empresas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empresas` (
  `id` int(11) NOT NULL,
  `fechaRegistro` timestamp NULL DEFAULT NULL,
  `nombreComercial` varchar(255) NOT NULL,
  `razonSocial` varchar(255) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `nombreContacto` varchar(50) NOT NULL,
  `email` varchar(120) NOT NULL,
  `telefonoContacto` varchar(45) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `estimacion`
--

DROP TABLE IF EXISTS `estimacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estimacion` (
  `estimacionId` int(11) NOT NULL AUTO_INCREMENT,
  `projectId` int(11) NOT NULL,
  `conceptId` int(11) NOT NULL,
  `supplierId` int(11) NOT NULL,
  `projTypeId` int(11) NOT NULL,
  `qtyConcept` int(11) NOT NULL,
  `priceConcept` decimal(10,2) NOT NULL,
  `qtyArea` int(11) NOT NULL,
  `totalRango` decimal(10,2) NOT NULL,
  `estimActual` decimal(10,2) NOT NULL,
  `saldoRango` decimal(10,2) NOT NULL,
  `totalConcept` decimal(10,2) NOT NULL,
  `saldoConcept` decimal(10,2) NOT NULL,
  `retencion` decimal(10,2) NOT NULL,
  `totalEst` decimal(10,2) NOT NULL,
  `totalRetenido` decimal(10,2) NOT NULL,
  `steel` enum('0','1') NOT NULL DEFAULT '0',
  `status` enum('Pendiente','Proceso','Completo') NOT NULL DEFAULT 'Pendiente',
  PRIMARY KEY (`estimacionId`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `estimacion_depto`
--

DROP TABLE IF EXISTS `estimacion_depto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estimacion_depto` (
  `estDeptoId` int(11) NOT NULL AUTO_INCREMENT,
  `estimacionId` int(11) NOT NULL,
  `estItemId` int(11) NOT NULL,
  `projDeptoId` int(11) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `estimacion` decimal(10,2) NOT NULL,
  PRIMARY KEY (`estDeptoId`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `estimacion_item`
--

DROP TABLE IF EXISTS `estimacion_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estimacion_item` (
  `estItemId` int(11) NOT NULL AUTO_INCREMENT,
  `estimacionId` int(11) NOT NULL,
  `cuantItemId` int(11) NOT NULL,
  `projItemId` int(11) NOT NULL,
  `projLevelId` int(11) NOT NULL,
  `projLevelId2` int(11) NOT NULL,
  `totalLevel` int(11) NOT NULL,
  `totalAreas` int(11) NOT NULL,
  PRIMARY KEY (`estItemId`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `estimacion_level`
--

DROP TABLE IF EXISTS `estimacion_level`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estimacion_level` (
  `estLevelId` int(11) NOT NULL AUTO_INCREMENT,
  `estimacionId` int(11) NOT NULL,
  `cuantItemId` int(11) NOT NULL,
  `projItemId` int(11) NOT NULL,
  `projLevelId` int(11) NOT NULL,
  `projLevelId2` int(11) NOT NULL,
  `totalLevel` int(11) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `estimacion` decimal(10,2) NOT NULL,
  PRIMARY KEY (`estLevelId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `estimacion_pagos`
--

DROP TABLE IF EXISTS `estimacion_pagos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estimacion_pagos` (
  `estimacionPagoId` int(11) NOT NULL AUTO_INCREMENT,
  `projectId` int(11) NOT NULL,
  `estimacionId` int(11) NOT NULL,
  `estimacionPaymentId` int(11) NOT NULL,
  `supplierId` int(11) NOT NULL,
  `bankId` int(11) NOT NULL,
  `tipo` enum('Cheque','Transferencia') NOT NULL DEFAULT 'Cheque',
  `quantity` decimal(10,2) NOT NULL,
  `noCheque` varchar(255) NOT NULL,
  `noInvoice` varchar(255) NOT NULL,
  `fecha` varchar(10) NOT NULL,
  `fechaRecoger` varchar(255) NOT NULL,
  `personaRecoger` varchar(255) NOT NULL,
  `fechaCobro` varchar(255) NOT NULL,
  `obsCancel` text NOT NULL,
  `fechaCancel` varchar(10) NOT NULL,
  `status` enum('Activo','Cancelado') NOT NULL DEFAULT 'Activo',
  `statusCheque` enum('Emitido','Recogido','Cobrado') NOT NULL DEFAULT 'Emitido',
  PRIMARY KEY (`estimacionPagoId`)
) ENGINE=MyISAM AUTO_INCREMENT=107 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `estimacion_payment`
--

DROP TABLE IF EXISTS `estimacion_payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estimacion_payment` (
  `estimacionPaymentId` int(11) NOT NULL AUTO_INCREMENT,
  `projectId` int(11) NOT NULL,
  `estimacionId` int(11) NOT NULL,
  `supplierId` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `pagado` enum('0','1') NOT NULL DEFAULT '0',
  `revisado` enum('0','1') NOT NULL DEFAULT '0',
  `fecha` varchar(10) NOT NULL,
  `tipo` enum('N','R') NOT NULL DEFAULT 'N',
  PRIMARY KEY (`estimacionPaymentId`)
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `estimacion_type`
--

DROP TABLE IF EXISTS `estimacion_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estimacion_type` (
  `estTypeId` int(11) NOT NULL AUTO_INCREMENT,
  `estimacionId` int(11) NOT NULL,
  `projTypeId` int(11) NOT NULL,
  PRIMARY KEY (`estTypeId`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `material`
--

DROP TABLE IF EXISTS `material`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `material` (
  `materialId` int(11) NOT NULL AUTO_INCREMENT,
  `categoryId` int(11) NOT NULL,
  `subcategoryId` int(11) NOT NULL,
  `conceptConId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `waste` decimal(10,2) NOT NULL,
  `unitId` int(11) NOT NULL,
  `unitPrice` decimal(10,2) NOT NULL,
  `steel` enum('0','1') NOT NULL DEFAULT '0',
  `comment` text NOT NULL,
  `diameter` decimal(10,2) NOT NULL,
  `weight` decimal(10,2) NOT NULL,
  `traslape` decimal(10,2) NOT NULL,
  `bulbos` decimal(10,2) NOT NULL,
  `active` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`materialId`)
) ENGINE=MyISAM AUTO_INCREMENT=110 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `material_price`
--

DROP TABLE IF EXISTS `material_price`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `material_price` (
  `matPriceId` int(11) NOT NULL AUTO_INCREMENT,
  `materialId` int(11) NOT NULL,
  `supplierId` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `currency` varchar(10) NOT NULL,
  `iva` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `fecha` varchar(10) NOT NULL,
  `supMain` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`matPriceId`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `order_buy`
--

DROP TABLE IF EXISTS `order_buy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_buy` (
  `orderBuyId` int(11) NOT NULL AUTO_INCREMENT,
  `projectId` int(11) NOT NULL,
  `requisicionId` int(11) NOT NULL,
  `reqPedidoId` int(11) NOT NULL,
  `reqMatId` int(11) NOT NULL,
  `supplierId` int(11) NOT NULL,
  `conceptMatId` int(11) NOT NULL,
  `noInvoice` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `fecha` varchar(10) NOT NULL,
  `fechaEnvio` varchar(10) NOT NULL,
  `fechaEntrega` varchar(10) NOT NULL,
  `comments` text NOT NULL,
  `confirm` enum('0','1') NOT NULL,
  `enviado` enum('0','1') NOT NULL DEFAULT '0',
  `status` enum('Pendiente','Completo','Confirmado') NOT NULL DEFAULT 'Pendiente',
  `stEntrega` enum('Pendiente','Proceso','Completo','Pagos') NOT NULL DEFAULT 'Pendiente',
  PRIMARY KEY (`orderBuyId`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `order_buy_entrega`
--

DROP TABLE IF EXISTS `order_buy_entrega`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_buy_entrega` (
  `orderBuyEntId` int(11) NOT NULL AUTO_INCREMENT,
  `projectId` int(11) NOT NULL,
  `requisicionId` int(11) NOT NULL,
  `orderBuyId` int(11) NOT NULL,
  `ordBuyItemId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `fecha` varchar(10) NOT NULL,
  PRIMARY KEY (`orderBuyEntId`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `order_buy_item`
--

DROP TABLE IF EXISTS `order_buy_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_buy_item` (
  `ordBuyItemId` int(11) NOT NULL AUTO_INCREMENT,
  `orderBuyId` int(11) NOT NULL,
  `requisicionId` int(11) NOT NULL,
  `reqPedidoId` int(11) NOT NULL,
  `reqMatId` int(11) NOT NULL,
  `conceptMatId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `status` enum('Pendiente','Proceso','Completo') NOT NULL DEFAULT 'Pendiente',
  PRIMARY KEY (`ordBuyItemId`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `personal`
--

DROP TABLE IF EXISTS `personal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal` (
  `personalId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `active` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`personalId`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project` (
  `projectId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `responsable` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `items` int(11) NOT NULL,
  `separacion` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `valPromM2` decimal(10,2) NOT NULL,
  `active` enum('0','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`projectId`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `project_bodega`
--

DROP TABLE IF EXISTS `project_bodega`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_bodega` (
  `projBodegaId` int(11) NOT NULL AUTO_INCREMENT,
  `projectId` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  PRIMARY KEY (`projBodegaId`)
) ENGINE=MyISAM AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `project_cajon`
--

DROP TABLE IF EXISTS `project_cajon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_cajon` (
  `projCajonId` int(11) NOT NULL AUTO_INCREMENT,
  `projectId` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  PRIMARY KEY (`projCajonId`)
) ENGINE=MyISAM AUTO_INCREMENT=233 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `project_depto`
--

DROP TABLE IF EXISTS `project_depto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_depto` (
  `projDeptoId` int(11) NOT NULL AUTO_INCREMENT,
  `projLevelId` int(11) NOT NULL,
  `projItemId` int(11) NOT NULL,
  `projectId` int(11) NOT NULL,
  `projTypeId` int(11) NOT NULL,
  `projSubTypeId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`projDeptoId`)
) ENGINE=MyISAM AUTO_INCREMENT=263 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `project_ejes_l`
--

DROP TABLE IF EXISTS `project_ejes_l`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_ejes_l` (
  `projEjeLId` int(11) NOT NULL AUTO_INCREMENT,
  `projectId` int(11) NOT NULL,
  `letra` varchar(10) NOT NULL,
  PRIMARY KEY (`projEjeLId`)
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `project_ejes_n`
--

DROP TABLE IF EXISTS `project_ejes_n`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_ejes_n` (
  `projEjeNId` int(11) NOT NULL AUTO_INCREMENT,
  `projectId` int(11) NOT NULL,
  `numero` varchar(10) NOT NULL,
  PRIMARY KEY (`projEjeNId`)
) ENGINE=MyISAM AUTO_INCREMENT=77 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `project_equip`
--

DROP TABLE IF EXISTS `project_equip`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_equip` (
  `projEquipId` int(11) NOT NULL AUTO_INCREMENT,
  `projectId` int(11) NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `currency` varchar(10) NOT NULL,
  PRIMARY KEY (`projEquipId`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `project_item`
--

DROP TABLE IF EXISTS `project_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_item` (
  `projItemId` int(11) NOT NULL AUTO_INCREMENT,
  `projectId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`projItemId`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `project_level`
--

DROP TABLE IF EXISTS `project_level`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_level` (
  `projLevelId` int(11) NOT NULL AUTO_INCREMENT,
  `projItemId` int(11) NOT NULL,
  `projectId` int(11) NOT NULL,
  `level` decimal(10,2) NOT NULL,
  `typeId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `comunArea` decimal(10,2) NOT NULL,
  `realArea` decimal(10,2) NOT NULL,
  `totalArea` decimal(10,2) NOT NULL,
  PRIMARY KEY (`projLevelId`)
) ENGINE=MyISAM AUTO_INCREMENT=121 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `project_mant`
--

DROP TABLE IF EXISTS `project_mant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_mant` (
  `projMantId` int(11) NOT NULL AUTO_INCREMENT,
  `projectId` int(11) NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `currency` varchar(10) NOT NULL,
  PRIMARY KEY (`projMantId`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `project_subtype`
--

DROP TABLE IF EXISTS `project_subtype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_subtype` (
  `projSubTypeId` int(11) NOT NULL AUTO_INCREMENT,
  `projTypeId` int(11) NOT NULL,
  `projectId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `redondeo` decimal(10,2) NOT NULL,
  `comunArea` decimal(10,2) NOT NULL,
  `realArea` decimal(10,2) NOT NULL,
  `ventaArea` decimal(10,2) NOT NULL,
  `terrazaReal` decimal(10,2) NOT NULL,
  `terrazaComun` decimal(10,2) NOT NULL,
  `jardinReal` decimal(10,2) NOT NULL,
  `jardinComun` decimal(10,2) NOT NULL,
  `color` varchar(7) NOT NULL,
  `abierta` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`projSubTypeId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `project_type`
--

DROP TABLE IF EXISTS `project_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_type` (
  `projTypeId` int(11) NOT NULL AUTO_INCREMENT,
  `projectId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `redondeo` decimal(10,2) NOT NULL,
  `comunArea` decimal(10,2) NOT NULL,
  `realArea` decimal(10,2) NOT NULL,
  `ventaArea` decimal(10,2) NOT NULL,
  `terrazaReal` decimal(10,2) NOT NULL,
  `terrazaComun` decimal(10,2) NOT NULL,
  `jardinReal` decimal(10,2) NOT NULL,
  `jardinComun` decimal(10,2) NOT NULL,
  `color` varchar(7) NOT NULL,
  `abierta` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`projTypeId`)
) ENGINE=MyISAM AUTO_INCREMENT=85 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `requisicion`
--

DROP TABLE IF EXISTS `requisicion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requisicion` (
  `requisicionId` int(11) NOT NULL AUTO_INCREMENT,
  `projectId` int(11) NOT NULL,
  `conceptId` int(11) NOT NULL,
  `conceptIdObra` int(11) NOT NULL,
  `projTypeId` int(11) NOT NULL,
  `qtyConcept` int(11) NOT NULL,
  `qtyArea` int(11) NOT NULL,
  `totalRango` decimal(10,2) NOT NULL,
  `requiActual` decimal(10,2) NOT NULL,
  `saldoRango` decimal(10,2) NOT NULL,
  `totalConcept` decimal(10,2) NOT NULL,
  `saldoConcept` decimal(10,2) NOT NULL,
  `retencion` decimal(10,2) NOT NULL,
  `totalReq` decimal(10,2) NOT NULL,
  `totalRetenido` decimal(10,2) NOT NULL,
  `steel` enum('0','1') NOT NULL DEFAULT '0',
  `fecha` varchar(10) NOT NULL,
  `status` enum('Pendiente','Completado') NOT NULL DEFAULT 'Pendiente',
  PRIMARY KEY (`requisicionId`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `requisicion_depto`
--

DROP TABLE IF EXISTS `requisicion_depto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requisicion_depto` (
  `reqDeptoId` int(11) NOT NULL AUTO_INCREMENT,
  `requisicionId` int(11) NOT NULL,
  `reqItemId` int(11) NOT NULL,
  `projDeptoId` int(11) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `requisicion` decimal(10,2) NOT NULL,
  PRIMARY KEY (`reqDeptoId`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `requisicion_item`
--

DROP TABLE IF EXISTS `requisicion_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requisicion_item` (
  `reqItemId` int(11) NOT NULL AUTO_INCREMENT,
  `requisicionId` int(11) NOT NULL,
  `cuantItemId` int(11) NOT NULL,
  `projItemId` int(11) NOT NULL,
  `projLevelId` int(11) NOT NULL,
  `projLevelId2` int(11) NOT NULL,
  `totalLevel` int(11) NOT NULL,
  `totalAreas` int(11) NOT NULL,
  PRIMARY KEY (`reqItemId`)
) ENGINE=MyISAM AUTO_INCREMENT=182 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `requisicion_level`
--

DROP TABLE IF EXISTS `requisicion_level`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requisicion_level` (
  `reqLevelId` int(11) NOT NULL AUTO_INCREMENT,
  `requisicionId` int(11) NOT NULL,
  `cuantItemId` int(11) NOT NULL,
  `projItemId` int(11) NOT NULL,
  `projLevelId` int(11) NOT NULL,
  `projLevelId2` int(11) NOT NULL,
  `totalLevel` int(11) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `requisicion` decimal(10,2) NOT NULL,
  PRIMARY KEY (`reqLevelId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `requisicion_material`
--

DROP TABLE IF EXISTS `requisicion_material`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requisicion_material` (
  `reqMatId` int(11) NOT NULL AUTO_INCREMENT,
  `projectId` int(11) NOT NULL,
  `requisicionId` int(11) NOT NULL,
  `conceptId` int(11) NOT NULL,
  `reqPedidoId` int(11) NOT NULL,
  `conceptMatId` int(11) NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `supplierId` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`reqMatId`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `requisicion_pedido`
--

DROP TABLE IF EXISTS `requisicion_pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requisicion_pedido` (
  `reqPedidoId` int(11) NOT NULL AUTO_INCREMENT,
  `projectId` int(11) NOT NULL,
  `requisicionId` int(11) NOT NULL,
  `supplierId` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `status` enum('Pendiente','Completo') NOT NULL DEFAULT 'Pendiente',
  PRIMARY KEY (`reqPedidoId`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `requisicion_type`
--

DROP TABLE IF EXISTS `requisicion_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requisicion_type` (
  `reqTypeId` int(11) NOT NULL AUTO_INCREMENT,
  `requisicionId` int(11) NOT NULL,
  `projTypeId` int(11) NOT NULL,
  PRIMARY KEY (`reqTypeId`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `state`
--

DROP TABLE IF EXISTS `state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `state` (
  `stateId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`stateId`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `subcategory`
--

DROP TABLE IF EXISTS `subcategory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subcategory` (
  `subcategoryId` int(11) NOT NULL AUTO_INCREMENT,
  `categoryId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `active` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`subcategoryId`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `supplier` (
  `supplierId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `razonSocial` varchar(255) NOT NULL,
  `rfc` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `colonia` varchar(255) NOT NULL,
  `cityId` int(11) NOT NULL,
  `stateId` int(11) NOT NULL,
  `postalCode` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email2` varchar(255) NOT NULL,
  `email3` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL DEFAULT '0',
  `pdf` varchar(255) NOT NULL,
  PRIMARY KEY (`supplierId`)
) ENGINE=MyISAM AUTO_INCREMENT=73 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `supplier_contact`
--

DROP TABLE IF EXISTS `supplier_contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `supplier_contact` (
  `supContId` int(11) NOT NULL AUTO_INCREMENT,
  `supplierId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `puesto` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`supContId`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `supplier_project`
--

DROP TABLE IF EXISTS `supplier_project`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `supplier_project` (
  `supProjId` int(11) NOT NULL AUTO_INCREMENT,
  `supplierId` int(11) NOT NULL,
  `projectId` int(11) NOT NULL,
  `retencion` decimal(10,2) NOT NULL,
  `pdf` varchar(255) NOT NULL,
  PRIMARY KEY (`supProjId`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `type`
--

DROP TABLE IF EXISTS `type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type` (
  `typeId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `comunArea` decimal(10,2) NOT NULL,
  `realArea` decimal(10,2) NOT NULL,
  `totalArea` decimal(10,2) NOT NULL,
  `active` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`typeId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `unit`
--

DROP TABLE IF EXISTS `unit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `unit` (
  `unitId` int(11) NOT NULL AUTO_INCREMENT,
  `clave` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `active` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`unitId`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `active` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`userId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user_history`
--

DROP TABLE IF EXISTS `user_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_history` (
  `userHistId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `itemId` int(11) NOT NULL,
  `module` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY (`userHistId`)
) ENGINE=InnoDB AUTO_INCREMENT=795 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `usuarioscol` varchar(100) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '0',
  `empresas_id` int(11) NOT NULL,
  PRIMARY KEY (`empresas_id`),
  CONSTRAINT `fk_usuarios_1` FOREIGN KEY (`empresas_id`) REFERENCES `empresas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `vistaCheques`
--

DROP TABLE IF EXISTS `vistaCheques`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vistaCheques` (
  `vistaChequeId` int(11) NOT NULL AUTO_INCREMENT,
  `chequeId` int(11) NOT NULL,
  `seccion` enum('R','E') NOT NULL DEFAULT 'R',
  `projectId` int(11) NOT NULL,
  `orderBuyId` int(11) NOT NULL,
  `supplierId` int(11) NOT NULL,
  `bankId` int(11) NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `currency` varchar(10) NOT NULL,
  `noCheque` varchar(255) NOT NULL,
  `noInvoice` varchar(255) NOT NULL,
  `fecha` varchar(10) NOT NULL,
  `status` enum('Activo','Cancelado') NOT NULL DEFAULT 'Activo',
  `statusCheque` enum('Emitido','Recogido','Cobrado') NOT NULL,
  PRIMARY KEY (`vistaChequeId`)
) ENGINE=MyISAM AUTO_INCREMENT=78 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-01-21 12:04:24
