-- MySQL dump 10.13  Distrib 8.0.43, for Linux (x86_64)
--
-- Host: localhost    Database: lis_cms
-- ------------------------------------------------------
-- Server version	8.0.43-0ubuntu0.24.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `album_photo`
--

DROP TABLE IF EXISTS `album_photo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `album_photo` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `album_id` bigint unsigned NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `album_photo_album_id_foreign` (`album_id`),
  CONSTRAINT `album_photo_album_id_foreign` FOREIGN KEY (`album_id`) REFERENCES `albums` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=134 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `album_photo`
--

LOCK TABLES `album_photo` WRITE;
/*!40000 ALTER TABLE `album_photo` DISABLE KEYS */;
INSERT INTO `album_photo` VALUES (1,1,'assignments/S6edq637COwJs9TIBM8tMnxLktspgiEGjieTIBC9.png',1,'2025-08-07 13:50:30','2025-08-07 13:50:30'),(2,2,'assignments/gpcFFBfMNpkNCfyrpvfLTGnjRMtOMAk2BIYlentx.jpg',1,'2025-08-15 00:14:13','2025-08-15 00:14:13'),(3,2,'assignments/dglyAB8BeRYIzWmM7L0tB7RuCfbpNAn5PNabs2Z4.jpg',1,'2025-08-15 00:14:13','2025-08-15 00:14:13'),(4,2,'assignments/Mr389TmqhcIaj0g7SiFnxoakFkOsNi8SCpj1NPOr.jpg',1,'2025-08-15 00:14:13','2025-08-15 00:14:13'),(5,2,'assignments/WLT8x01Der5C5MIzsFTkIzrVnLGfEPBpm5SvJYjR.jpg',1,'2025-08-15 00:14:13','2025-08-15 00:14:13'),(6,2,'assignments/00eBTttvAg7psYdvMtelubZMPQcJlHHs0TNb4BYJ.jpg',1,'2025-08-15 00:14:13','2025-08-15 00:14:13'),(7,2,'assignments/y9yuJcCcpgIl0voqv1QfSjc8OcWT1iUf2nhWzGsu.jpg',1,'2025-08-15 00:14:13','2025-08-15 00:14:13'),(8,2,'assignments/LwsaiYGWdizzHEvmfv9swHnr8ho0n3mOaGxWjwu9.jpg',1,'2025-08-15 00:14:13','2025-08-15 00:14:13'),(9,2,'assignments/mvY6MXzuM6CzjUydpTh5QwJFHw4LxRCJN1FSwnSe.jpg',1,'2025-08-15 00:14:13','2025-08-15 00:14:13'),(10,2,'assignments/QwI8SpGld1gkJmO4I9H2mggjG56eM7U20ap5Kcb2.jpg',1,'2025-08-15 00:14:13','2025-08-15 00:14:13'),(11,2,'assignments/DYJzGKFOwrDcfos41L6WjEX7RsCaVQ1f6k5vMh7E.jpg',1,'2025-08-15 00:14:13','2025-08-15 00:14:13'),(12,2,'assignments/m6FHzHLpgaNctqSibUnrafEjaEgCCtTXG5WJzR3p.jpg',1,'2025-08-15 00:14:13','2025-08-15 00:14:13'),(13,2,'assignments/s13Ov71yGrxGJv37vY4EZwJQ5SE60xuMjFWIo5sp.jpg',1,'2025-08-15 00:14:13','2025-08-15 00:14:13'),(14,2,'assignments/lWspfNZFjMvxfuv1OWpS1Vak25GjuPQ9lvKuIXrE.jpg',1,'2025-08-15 00:14:13','2025-08-15 00:14:13'),(15,2,'assignments/ALioZ9xrzNvdvtSnIcZmsRzn87afPonXaulRq2fD.jpg',1,'2025-08-15 00:14:13','2025-08-15 00:14:13'),(16,2,'assignments/qDR4Qt9zeUdNXRVhfaj3HKcLjeNdGs70JtUd7d3J.jpg',1,'2025-08-15 00:14:13','2025-08-15 00:14:13'),(17,2,'assignments/21rgvFeLTWeA5ADSiXOl4If1SgA5wI2LjRFz3Rbe.jpg',1,'2025-08-15 00:14:13','2025-08-15 00:14:13'),(18,3,'assignments/vq07fMEtH4hxpBAsSZyhUwM6QP2MJ6wGm5nDVLRa.jpg',1,'2025-08-15 00:24:20','2025-08-15 00:24:20'),(19,3,'assignments/CMReml8VGkIKHKe96iOqtRA06pxs4KafuKqIOl1c.jpg',1,'2025-08-15 00:24:20','2025-08-15 00:24:20'),(20,3,'assignments/xYTZ1myV9C5XyQ3XOBFuGyEUe53MfqyV13kBw2wF.jpg',1,'2025-08-15 00:24:20','2025-08-15 00:24:20'),(21,4,'assignments/TttpVBpUD7H5P76KjGqAitnfrbpIDlIpQ7zKXbY5.jpg',1,'2025-08-19 08:39:29','2025-08-19 08:39:29'),(22,4,'assignments/8R6HwAxlldk2FBaL1d7aEBVvNgj3CKdV749vRFKp.jpg',1,'2025-08-19 08:39:29','2025-08-19 08:39:29'),(23,4,'assignments/zYo1WMqwUvLzHf0BdaRP1PzttYSp1iPxtsr9Tz4y.jpg',1,'2025-08-19 08:39:29','2025-08-19 08:39:29'),(24,4,'assignments/6mQkaCtYmFzof4hLZbMIRFhE8D9Tub0UXqSXiuxC.jpg',1,'2025-08-19 08:39:29','2025-08-19 08:39:29'),(25,5,'assignments/JdXoYZSOj2Vl2i1l9CUTs3Nc694A9C0HX7vWw6u7.jpg',1,'2025-08-19 08:45:43','2025-08-19 08:45:43'),(26,5,'assignments/2RuxKtIf7CTtcLHlEJBLYd7wpMCCQsdq8lqG9XqF.jpg',1,'2025-08-19 08:45:43','2025-08-19 08:45:43'),(27,5,'assignments/lUVSounYiQTu5U4CtSHSjKUowgivvKaxlgZhmz5E.jpg',1,'2025-08-19 08:45:43','2025-08-19 08:45:43'),(28,5,'assignments/iCDByp64AiRzuZmf1uLOiBR2CMFiOeplDi9FL1zR.jpg',1,'2025-08-19 08:45:43','2025-08-19 08:45:43'),(29,5,'assignments/OV0YFdOUBniPYGuIZDEBAUALepwfXKFNwDqheaBa.jpg',1,'2025-08-19 08:45:43','2025-08-19 08:45:43'),(30,5,'assignments/FbWU5qzLpqtY9aeodn6h1XGhiCzVpX8rLWdAOaef.jpg',1,'2025-08-19 08:45:43','2025-08-19 08:45:43'),(31,5,'assignments/jnzBMmp8fnl43HSPJHunslZQCQphIO1d2vqO5ufK.jpg',1,'2025-08-19 08:45:43','2025-08-19 08:45:43'),(32,5,'assignments/590zXfc35IPxPCPgiQ53v3gTGMLxhqFdE7AuyDdM.jpg',1,'2025-08-19 08:45:43','2025-08-19 08:45:43'),(33,5,'assignments/B0m04OHZxBHeg8kX7or0t7m4pPc8kapHvUOLWzIX.jpg',1,'2025-08-19 08:48:04','2025-08-19 08:48:04'),(34,6,'assignments/bEIyolcXQ10YFDIx1RIosujYrzgPEFvHPGy9xKyS.jpg',1,'2025-08-20 04:48:04','2025-08-20 04:48:04'),(35,6,'assignments/GbA4lgr05ySTcgMK7S4d9Vc7GXFXf2oRXfAzDX8s.jpg',1,'2025-08-20 04:48:14','2025-08-20 04:48:14'),(36,7,'assignments/4X7UUtW3dmlEmRUFzmJhxolc810IRmT0YxD0watP.jpg',1,'2025-08-28 06:01:51','2025-08-28 06:01:51'),(37,7,'assignments/NUmnjWKGRRsQEAFi57JFrsyrlcNOOERU3G8Ry6zI.jpg',1,'2025-08-28 06:01:51','2025-08-28 06:01:51'),(38,8,'assignments/5N4U5EgP3PMpGKOw6UGRqXjoABmeFE1IUDt2DO0g.jpg',0,'2025-08-30 13:24:50','2025-08-30 13:25:07'),(39,8,'assignments/jFRb8v5W7Hp0C7y7QDCjhHVGMoqFrSptT1ixLuDu.jpg',0,'2025-08-30 13:24:50','2025-08-30 13:25:24'),(40,8,'assignments/VWT13sRjsJK1XQQTLNcnbjwkkDRVYjjHgM8azcrw.jpg',0,'2025-08-30 13:24:50','2025-08-30 13:25:21'),(41,8,'assignments/H7qYhEao4uRfYiV6aEh48F7TpKWQb2tGZ4uzdeQQ.jpg',0,'2025-08-30 13:24:50','2025-08-30 13:25:20'),(42,8,'assignments/tdQ68pv94m11dq3l1sMcCOcxxRUwDWTjlHwNwKqT.jpg',0,'2025-08-30 13:24:50','2025-08-30 13:25:13'),(43,8,'assignments/sKiK0pHrVMKM7olamTj5VoE3WCAtdrGyNAQYugzJ.jpg',0,'2025-08-30 13:24:50','2025-08-30 13:25:11'),(44,8,'assignments/4PqY1uKlgnaufZvKbPrRnjSGKYru9XF5i4Mif2Ot.jpg',0,'2025-08-30 13:24:50','2025-08-30 13:25:05'),(45,8,'assignments/Ui6yxy2AVSSLW5Mfvyl6tUR6oyc1stZJENcgTnid.jpg',0,'2025-08-30 13:24:50','2025-08-30 13:25:03'),(46,8,'assignments/B19SkqAnCPe9iuC7eBXFtwjxogdOEwQVNVOUx1Vq.jpg',0,'2025-08-30 13:24:50','2025-08-30 13:25:02'),(47,8,'assignments/U56vve6FZXsztwjHZvKx2mDaIScId3Ab52VQpxNL.jpg',1,'2025-08-30 13:25:41','2025-08-30 13:25:41'),(48,8,'assignments/xYl9R1IBqmTFTow0plZqCG96iY3cYRfkr2nu54Gc.jpg',1,'2025-08-30 13:26:09','2025-08-30 13:26:09'),(49,8,'assignments/spO9dAI9cVa83bnNY2lw4hOwEByTwl0lH6XV0sJh.jpg',1,'2025-08-30 13:26:09','2025-08-30 13:26:09'),(50,8,'assignments/XpcinMifucHuhUDIcxOzbUbO0M0RekPPCSKSblQz.jpg',1,'2025-08-30 13:26:09','2025-08-30 13:26:09'),(51,8,'assignments/9Vk316CodiyMtLr6zriWr4hSv3ZmrsZGROg4kMVP.jpg',1,'2025-08-30 13:26:09','2025-08-30 13:26:09'),(52,8,'assignments/j45agKNQ9YP7PJFr3b23HWd3GNG2MSOU23bvRKYI.jpg',1,'2025-08-30 13:26:09','2025-08-30 13:26:09'),(53,8,'assignments/ZS1fSbzFqyox14FHeqKmThDAy46bStgmCBGasIYP.jpg',1,'2025-08-30 13:26:09','2025-08-30 13:26:09'),(54,8,'assignments/Wd2M6ZF24nAXSoq77ufd9FpuAibmErAKYGUPVMCo.jpg',1,'2025-08-30 13:26:09','2025-08-30 13:26:09'),(55,9,'assignments/XstEsy6ZVxmZAFUehdroKmQurjCgStH6ZJAYhlWR.jpg',1,'2025-09-02 08:14:14','2025-09-02 08:14:14'),(56,9,'assignments/OYrFrwoCYqt05bA9TYy218EQtu1ECozMg0bhLPT3.jpg',1,'2025-09-02 08:14:30','2025-09-02 08:14:30'),(57,9,'assignments/M05n9hEwydEDUmb4KZDJV7rez0qELTsGnVQRmqRR.jpg',1,'2025-09-02 08:14:30','2025-09-02 08:14:30'),(58,9,'assignments/emJ2xIrU0r1KDAnCZyzg94Jb8whmCdsO7GDSlbbM.jpg',1,'2025-09-02 08:14:41','2025-09-02 08:14:41'),(59,10,'assignments/58kP7xI0dyQAZ92nBiqVlGMnqMmFyibQ4Lmp0cQ7.jpg',1,'2025-09-05 08:17:45','2025-09-05 08:17:45'),(60,10,'assignments/d5QJPIZobqgC6yUgJx5Tp5D8k4rrGbGdg1iVSjHD.jpg',1,'2025-09-05 08:18:12','2025-09-05 08:18:12'),(61,10,'assignments/HXqTTsyvsTR9OUbeRHuBk6mgHzJV7wYuFO5pZahp.jpg',1,'2025-09-05 08:19:25','2025-09-05 08:19:25'),(62,10,'assignments/y46HWpeH3Y1RFl28lNp3cpU1rp0G4vbPd8TXhrzt.jpg',1,'2025-09-05 08:19:38','2025-09-05 08:19:38'),(63,10,'assignments/upuDGmoOcIFCdQCq75thKE95V2TEPnpGIzG5vTkm.jpg',1,'2025-09-05 08:19:38','2025-09-05 08:19:38'),(64,10,'assignments/vjHHCTNNsWRdiSQjWxHqRvFXyAFSzILl1Jrs2DjC.jpg',1,'2025-09-05 08:19:38','2025-09-05 08:19:38'),(65,10,'assignments/qSZJqqnvrnmTpRrRJj2IUlZxHWf4Bk2D2FZAfuRn.jpg',1,'2025-09-09 07:29:29','2025-09-09 07:29:29'),(66,10,'assignments/iFM0QVUcNltZQ9yN1qM76E3xa0bkUvgQgSG2DvKd.jpg',1,'2025-09-09 07:29:29','2025-09-09 07:29:29'),(67,10,'assignments/kXPpSskxWZkeTnyF4ni6sVroMUvLqj4CtH3YqnFY.jpg',1,'2025-09-09 07:29:29','2025-09-09 07:29:29'),(68,10,'assignments/RfN5qLLFfsFMl7afUhh6IyHDKg7WxBJkM4Thth0n.jpg',1,'2025-09-09 07:29:29','2025-09-09 07:29:29'),(69,10,'assignments/9LMvTniNgoN674I0ava2ODWFkdMxytLyndO4gxMX.jpg',1,'2025-09-09 07:29:29','2025-09-09 07:29:29'),(70,10,'assignments/lMuFkiXgooqhNlkEbYbvxfYcN8H0LISB5Viz9qxh.jpg',1,'2025-09-09 07:29:29','2025-09-09 07:29:29'),(71,10,'assignments/63Q3lnmOMDp9joh6F75mfXNPjxtjh9FHAYy5dMTx.jpg',1,'2025-09-09 07:29:29','2025-09-09 07:29:29'),(72,10,'assignments/qp9OJSHu3Cq3t1GtvG4AU5Yu5HjJAMI5uP1Vistb.jpg',1,'2025-09-09 07:29:29','2025-09-09 07:29:29'),(73,10,'assignments/B2B8Dauh3gHj7Y885AQHaAvtceipdqoZ21yE7Emv.jpg',1,'2025-09-09 07:29:29','2025-09-09 07:29:29'),(74,10,'assignments/9GqJAqihFy6GzHokoORvJg2pjClgyllDlfB8MvNv.jpg',1,'2025-09-09 07:29:29','2025-09-09 07:29:29'),(75,11,'assignments/9r3654QjvWI5gDiJDU5GglsxLhD6LTjqVCqBWbWq.jpg',1,'2025-09-09 07:32:10','2025-09-09 07:32:10'),(76,11,'assignments/0uQcFgYHQejE8SPLl5DNqfVDbaus8Fml6CQCiX6W.jpg',1,'2025-09-09 07:32:10','2025-09-09 07:32:10'),(77,12,'assignments/QbzxwrhyycyAcpvd86KAW8SudcL8vitrRg6xSh56.jpg',1,'2025-09-09 07:34:27','2025-09-09 07:34:27'),(78,12,'assignments/YkXWbKGIu4rcqBIJw2eBffxRRFMICsHI2obpqPpb.jpg',1,'2025-09-09 07:34:27','2025-09-09 07:34:27'),(79,12,'assignments/WD7Pe7fjLNAQ825vt44i99gbu9UAnf6fVL1GG7oE.jpg',1,'2025-09-09 07:34:27','2025-09-09 07:34:27'),(80,12,'assignments/gvxUQSx4EWKCrhxZ5XmDqRmtaNi0Ls7VhdGKz8ye.jpg',1,'2025-09-09 07:34:27','2025-09-09 07:34:27'),(81,12,'assignments/bX15BMydiOaQdPh2gUmd2x5qTGCbwcawjfR1i2Bl.jpg',1,'2025-09-09 07:34:27','2025-09-09 07:34:27'),(82,12,'assignments/ojvluey0MYOYdHkDCCDXyDz1uVitK51P6hz8wy1N.jpg',1,'2025-09-09 07:34:27','2025-09-09 07:34:27'),(83,12,'assignments/tK9ru2977n9nDp7Q5fxidDvVasr5IyoSQOlBTpkW.jpg',1,'2025-09-09 07:34:27','2025-09-09 07:34:27'),(84,12,'assignments/qft6pXBlDqiY5DABv7HLG5vHnm32UGk1wJgsemfb.jpg',1,'2025-09-09 07:34:27','2025-09-09 07:34:27'),(85,12,'assignments/RzOZKd9iocucc0E1YAFtliLxMsSDH2PuqaG3YcCd.jpg',1,'2025-09-09 07:34:27','2025-09-09 07:34:27'),(86,12,'assignments/Tw34f2SQSajdZTdy6huxAvtgtH4IvdyqjmgsvW0v.jpg',1,'2025-09-09 07:34:27','2025-09-09 07:34:27'),(87,12,'assignments/9i49QFSV6PHAqVG7kKzIOE1xp3cIRnbIIu2vlhRo.jpg',1,'2025-09-09 07:34:27','2025-09-09 07:34:27'),(88,13,'assignments/lvlk558QMd5OiDpXf3NCZFFnAcfbrDpD5WHgF3Al.jpg',1,'2025-09-09 07:35:07','2025-09-09 07:35:07'),(89,13,'assignments/Pbm8AASRMHIUHaKVCuvh7NKYXGd8dCqj1H8JQhuQ.jpg',1,'2025-09-09 07:35:20','2025-09-09 07:35:20'),(90,13,'assignments/fKimm4KZyfiD8F15qyD2yG7ktCd70FomkWBnU4K8.jpg',1,'2025-09-09 07:35:52','2025-09-09 07:35:52'),(91,13,'assignments/W5mqnqYrYe3usdl1utgUmt0AkIFEGsHqV7QuAFeT.jpg',1,'2025-09-09 07:35:52','2025-09-09 07:35:52'),(92,13,'assignments/XJ3nJygSwDGdujqV8uUypeXlTyvnfx5GJeHl6wHq.jpg',1,'2025-09-09 07:35:52','2025-09-09 07:35:52'),(93,13,'assignments/4oLpt1zu2DSAl5NM7AuyNwFNsPQzeoiqMXoRKDO7.jpg',1,'2025-09-09 07:35:52','2025-09-09 07:35:52'),(94,13,'assignments/D523Q2aGnmWCXphVt8Wo1vtgTd2yg8gd1oYXYQ88.jpg',1,'2025-09-09 07:35:52','2025-09-09 07:35:52'),(95,13,'assignments/KSe1zZpxd1sh9Obli0dP97eBUMx207xNemc36Ped.jpg',1,'2025-09-09 07:35:52','2025-09-09 07:35:52'),(96,13,'assignments/2aviI9W47Ahxog4xc8gZp58WyMNApvWVX6EB6yel.jpg',1,'2025-09-09 07:35:52','2025-09-09 07:35:52'),(97,13,'assignments/PLmLnEOkyNFKq8W5Y9mtdOWFbgDfQ26HYSbFUf9d.jpg',1,'2025-09-09 07:35:52','2025-09-09 07:35:52'),(98,13,'assignments/t9t6ccQ5ljqMim7lZ2e7y7bPysynBcW4Nq9y8Fy3.jpg',1,'2025-09-09 07:36:07','2025-09-09 07:36:07'),(99,13,'assignments/jyV66CXMO5NFjoyjwCRfkjp7cHI5MLnp5w0CJODa.jpg',0,'2025-09-09 07:36:07','2025-09-09 07:37:18'),(100,13,'assignments/qYA7MgbzFyXB4GcqPFedONQ6NNBljFkFmLOQRCfi.jpg',1,'2025-09-09 07:36:07','2025-09-09 07:36:07'),(101,13,'assignments/O2surTnnvOuzZKgISH3nfbdSiuc68qwt4eJALN7P.jpg',1,'2025-09-09 07:36:07','2025-09-09 07:36:07'),(102,13,'assignments/0K6Q0kkrkUmOKSxyHwX1hol7PvUXbHfsJESHGt6r.jpg',0,'2025-09-09 07:36:07','2025-09-09 07:37:14'),(103,13,'assignments/VLGUuORn4ygK8xL01OskxhLwkGMWKrokU10rc9rE.jpg',1,'2025-09-09 07:36:07','2025-09-09 07:36:07'),(104,13,'assignments/gAQudxvi5eIb2sS0YyBAZXFhFA086OuitjJXPOBc.jpg',1,'2025-09-09 07:36:07','2025-09-09 07:36:07'),(105,13,'assignments/4HozBYlnysslccTJCaWXsHAtG6SPAMAf4sPeishg.jpg',0,'2025-09-09 07:36:25','2025-09-09 07:37:04'),(106,13,'assignments/1VLysIKqx7BO1oFplAfX3Izzzt7Vrg6vOYMAoHUy.jpg',1,'2025-09-09 07:36:25','2025-09-09 07:36:25'),(107,13,'assignments/TyXo5VVcK4Awe9crGC9GftXDDkynRozlqqlBL1HM.jpg',1,'2025-09-09 07:36:25','2025-09-09 07:36:25'),(108,13,'assignments/c7cL1okt3RiLsWzMuevF6Y0SHrw9CK61sMpwyAOH.jpg',1,'2025-09-09 07:36:25','2025-09-09 07:36:25'),(109,13,'assignments/0Z8AWIs7fFerhlYluHoWnY5NUOJPGg1GGNiGr59l.jpg',1,'2025-09-09 07:37:35','2025-09-09 07:37:35'),(110,13,'assignments/sgOzn0Kpi8pyJZaVK2nuCmUSfD3pHZgvEicLmCUc.jpg',1,'2025-09-09 07:37:35','2025-09-09 07:37:35'),(111,13,'assignments/s7Ow2jW3RbF81SPccSN5VSt1olwxW8cbsfAyM15v.jpg',1,'2025-09-09 07:37:47','2025-09-09 07:37:47'),(112,14,'assignments/thGAHWRxGSRQqzmV9YAo4dsftJicZRoEiAOpiIAw.jpg',1,'2025-09-12 08:23:41','2025-09-12 08:23:41'),(113,14,'assignments/oCH8OdlhiuCtCLGWZLUHxWJ6LMFxPS92MjAaFgql.jpg',1,'2025-09-12 08:23:57','2025-09-12 08:23:57'),(114,14,'assignments/17XJKolwTHejzk45dqaN6JFWpwkWXpY8ltQQmiGi.jpg',1,'2025-09-12 08:24:54','2025-09-12 08:24:54'),(115,14,'assignments/ZT5dcyz2pU052yhkmQ8XLJEvMSsOL9sj8jB8rPuq.jpg',1,'2025-09-12 08:25:02','2025-09-12 08:25:02'),(116,14,'assignments/3Nn78bXxLo71vSHeDX2FOlas6NR9yb7jHuHNyCp8.jpg',1,'2025-09-12 08:25:44','2025-09-12 08:25:44'),(117,15,'assignments/8Vgk6SSXp6hysmPTNrLzEbRAui7D8fmZE0Hv4uad.jpg',1,'2025-09-13 14:14:09','2025-09-13 14:14:09'),(118,15,'assignments/ZUkgkSQw0EREbANC7Dic5nh2Ct5OL4looL36QhLP.jpg',1,'2025-09-13 14:14:24','2025-09-13 14:14:24'),(119,15,'assignments/NGwqmtlRcUv0dB214Ds96ZXlQSAaQzIBWCpkNczw.jpg',1,'2025-09-13 14:14:38','2025-09-13 14:14:38'),(120,15,'assignments/WOnrJBFkXXQ3mjapy702bUoZa41k3CEvwVNvWL4d.jpg',1,'2025-09-13 14:14:38','2025-09-13 14:14:38'),(121,15,'assignments/qHcP5E6MZxvJV25ZW16VwEkOSyCbrougsBtzRa0N.jpg',1,'2025-09-13 14:14:38','2025-09-13 14:14:38'),(122,15,'assignments/FE253IfkQkQ6i71PYlWl0kUErN8voSzZorjRvO5O.jpg',1,'2025-09-13 14:14:38','2025-09-13 14:14:38'),(123,15,'assignments/q4vq5siXpSHpib9P4cRbVINR6tA3qNUPFFXqbExI.jpg',1,'2025-09-13 14:14:38','2025-09-13 14:14:38'),(124,16,'assignments/MHVMWmqIZEvBTLEbUicz6UnkfXp3ZNHnb3Vo3OB1.jpg',1,'2025-09-22 05:44:50','2025-09-22 05:44:50'),(125,16,'assignments/FFeXGI7VIIElb93QJ5elTtHW7lX9cBUWiud6nPEW.jpg',1,'2025-09-22 05:44:50','2025-09-22 05:44:50'),(126,17,'assignments/B5kLY08Vk0tZaLsV8OhXQvZc3NinUuE80uhdlYhr.jpg',1,'2025-09-22 05:47:21','2025-09-22 05:47:21'),(127,17,'assignments/CfDqYwe1ki99sHuWGOknB0GrTH5ypWhYsFicPhJc.jpg',1,'2025-09-22 05:47:42','2025-09-22 05:47:42'),(128,17,'assignments/CKeScF6sGKVjeZjdBMc5RPDxTVk95qPWJIdTC7UA.jpg',1,'2025-09-22 05:47:42','2025-09-22 05:47:42'),(129,17,'assignments/l42Wv2VkBYwJKim77yLHqhZkJVmpZafQcSEYnTPq.jpg',1,'2025-09-22 05:47:42','2025-09-22 05:47:42'),(130,17,'assignments/33ggbLIkui1Qfe8bpOx1sho1Eb2mLWBWWnH6GOgl.jpg',1,'2025-09-22 05:47:52','2025-09-22 05:47:52'),(131,17,'assignments/0jgLPvP4c9YGJbnPLXGgTmoVZqq0oRKiieegwT8T.jpg',1,'2025-09-22 05:47:52','2025-09-22 05:47:52'),(132,17,'assignments/hi8yBDoHhbc2tLGK8K6AyJ29ViWwYnD45I3pTk53.jpg',1,'2025-09-22 05:47:52','2025-09-22 05:47:52'),(133,17,'assignments/nOSj5DXVRFwYpLMeD5c5tw69xuzSrIF6k58BGPF1.jpg',1,'2025-09-22 05:47:52','2025-09-22 05:47:52');
/*!40000 ALTER TABLE `album_photo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `albums`
--

DROP TABLE IF EXISTS `albums`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `albums` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `albums`
--

LOCK TABLES `albums` WRITE;
/*!40000 ALTER TABLE `albums` DISABLE KEYS */;
INSERT INTO `albums` VALUES (1,'sample',0,'2025-08-07 13:50:20','2025-08-07 13:55:54'),(2,'Dialogue Meeting, Bannawag',1,'2025-08-15 00:13:25','2025-08-15 00:13:25'),(3,'Reading Empowers Youth_JRS',1,'2025-08-15 00:24:01','2025-08-15 00:24:01'),(4,'Distribution of Rice Subsidies',1,'2025-08-19 08:39:12','2025-08-19 08:39:12'),(5,'EODB Compliance Audit',1,'2025-08-19 08:45:30','2025-08-19 08:45:30'),(6,'Innovations Division Program',1,'2025-08-20 04:46:33','2025-08-20 04:46:33'),(7,'8TH Regular Session',1,'2025-08-28 06:01:35','2025-09-09 07:30:19'),(8,'Joint Committee Meeting',1,'2025-08-30 13:24:29','2025-08-30 13:24:29'),(9,'Civil Service Month',1,'2025-09-02 08:13:51','2025-09-02 08:13:51'),(10,'Evaluation DILG Legislative',1,'2025-09-05 08:17:25','2025-09-05 08:17:25'),(11,'9th_Regular Session',1,'2025-09-09 07:31:20','2025-09-09 07:31:20'),(12,'10th_Regular Session',1,'2025-09-09 07:32:42','2025-09-09 07:32:42'),(13,'11th_Regular Session',1,'2025-09-09 07:34:48','2025-09-09 07:34:48'),(14,'refresher course',1,'2025-09-12 08:23:01','2025-09-12 08:23:01'),(15,'TUPAD Pay-out',1,'2025-09-13 14:13:19','2025-09-13 14:13:19'),(16,'12th _Regular Session',1,'2025-09-22 05:44:28','2025-09-22 05:44:28'),(17,'AKAP Pay-out',1,'2025-09-22 05:46:44','2025-09-22 05:46:44');
/*!40000 ALTER TABLE `albums` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assignment_member`
--

DROP TABLE IF EXISTS `assignment_member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `assignment_member` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `assignment_id` bigint unsigned NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `assignment_member_assignment_id_foreign` (`assignment_id`),
  CONSTRAINT `assignment_member_assignment_id_foreign` FOREIGN KEY (`assignment_id`) REFERENCES `assignments` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assignment_member`
--

LOCK TABLES `assignment_member` WRITE;
/*!40000 ALTER TABLE `assignment_member` DISABLE KEYS */;
INSERT INTO `assignment_member` VALUES (3,1,'sample11','sample1',1,'2025-08-07 13:54:58','2025-08-07 13:54:58'),(4,1,'sample1','sample1',1,'2025-08-07 13:54:58','2025-08-07 13:54:58'),(5,1,'sample','sample',1,'2025-08-07 13:54:58','2025-08-07 13:54:58'),(15,2,'HON. JOHN M. SABINIANO','Sanguniang Bayan Member',1,'2025-08-30 13:33:43','2025-08-30 13:33:43'),(16,2,'HON. VIRGINIA B. SY','Sanguniang Bayan Member',1,'2025-08-30 13:33:43','2025-08-30 13:33:43'),(17,3,'HON. ARLAND F. RAMOS','Sanguniang Bayan Member',1,'2025-08-30 13:35:05','2025-08-30 13:35:05'),(18,3,'HON. SUZETTE D. SEBATIAN','Sanguniang Bayan Member',1,'2025-08-30 13:35:05','2025-08-30 13:35:05'),(19,4,'HON. CYNTHIA C. BANGLOY','Sanguniang Bayan Member',1,'2025-08-30 13:35:53','2025-08-30 13:35:53'),(20,4,'HON. JERVIN P. REYES','Sanguniang Bayan Member',1,'2025-08-30 13:35:53','2025-08-30 13:35:53'),(21,5,'HON. MIKE CEASAR C. MONTANO','Sanguniang Bayan Member',1,'2025-08-30 13:36:38','2025-08-30 13:36:38'),(22,5,'HON. IRENE U. AGGABAO','Sanguniang Bayan Member',1,'2025-08-30 13:36:38','2025-08-30 13:36:38');
/*!40000 ALTER TABLE `assignment_member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assignments`
--

DROP TABLE IF EXISTS `assignments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `assignments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assignments`
--

LOCK TABLES `assignments` WRITE;
/*!40000 ALTER TABLE `assignments` DISABLE KEYS */;
INSERT INTO `assignments` VALUES (1,'sample1',NULL,0,'2025-08-07 13:49:54','2025-08-07 13:55:46'),(2,'DISTRICT I - Barangay I, San Isidro, Payac, San Vicente, Lacab, Malannit, Dalibubon, Linamanan, Divinan, Dipangit, Pungpongan (July 1, 2025 - March 30, 2026)',NULL,1,'2025-08-29 05:17:29','2025-08-30 13:33:43'),(3,'DISTRICT II - Barangay II, Disimpit, San Jose, Palagaom, Arubub, Addalam, Fugo, San Roque, Barangcuag, Tupax, San Antonio (July 1, 2025 - March 30, 2026)',NULL,1,'2025-08-29 05:20:59','2025-08-30 13:35:05'),(4,'DISTRICT III - San Sebastian, Diarao, Bantay, Abulan, Daligan, Usol, Dibuluan, Linomot, Namnama, Villa Bello (July 1, 2025 - March 30, 2026)',NULL,1,'2025-08-29 05:22:42','2025-08-30 13:35:53'),(5,'DISTRICT IV - Dicamay I, Dicamay II, Papan Este, Sta. Isabel, Napaliong, Minuri, Papan Weste, Sto. Domingo, Dumawing, Bannawag (July 1, 2025 - March 30, 2026)',NULL,1,'2025-08-29 05:24:19','2025-08-30 13:36:38');
/*!40000 ALTER TABLE `assignments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `barangay_officials`
--

DROP TABLE IF EXISTS `barangay_officials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `barangay_officials` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `barangay` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `barangay_officials`
--

LOCK TABLES `barangay_officials` WRITE;
/*!40000 ALTER TABLE `barangay_officials` DISABLE KEYS */;
INSERT INTO `barangay_officials` VALUES (1,'satest','test','test','barangays/6E083ojnM6ynbp2u4VrMPXHhDXCLXxZrVKkjsuji.png',0,'2025-08-07 13:53:01','2025-08-08 05:16:26'),(2,'Alejandro G. Acierto','Disimpit','Secretary','barangays/pM3XNZlsHpgd6T1Bci01Wv36WkXpLoDLBPGlimJw.jpg',1,'2025-08-29 02:39:53','2025-08-29 02:39:53'),(3,'Charmane L. Mirador','Disimpit','BHW','barangays/HM24xh75Kg0QzXfXXfAsGvpBsw3Ry0ijzlj5nX1b.jpg',1,'2025-08-29 02:40:36','2025-08-29 02:40:36'),(4,'Haydee B. Burgos','Disimpit','CDW','barangays/QQaC8hhjdE0uzCfAYJlZ8ZpjjhkbEG86G0y0o49B.jpg',1,'2025-08-29 02:41:16','2025-08-29 02:41:16'),(5,'Hon. Antonio Burgos','Disimpit','Barangay Kagawad','barangays/3ksJ8IhYm0iPAb8HeW2yAXXqv7l76Bf5x9qjWNIa.jpg',1,'2025-08-29 02:42:09','2025-08-29 02:42:09'),(6,'Hon. Arnulfo Batoon Jr.','Disimpit','Barangay Kagawad','barangays/AY35AeDj3q8610fT0pJoFFoRlvf1TkGZ8CZuQd2T.jpg',1,'2025-08-29 02:42:36','2025-08-29 02:42:36'),(7,'Hon. Edison Andres','Disimpit','Barangay Kagawad','barangays/7eYg1upDgYnWDs0CwhCv3WwgoUIwONAz7Y8WupX8.jpg',1,'2025-08-29 02:43:07','2025-08-29 02:43:07'),(8,'Hon. Henry Allan Macarilay','Disimpit','Barangay Kagawad','barangays/jJsioAUNv2vIZq9yIpyv3HGUJas1WGEVlF1sMnuR.jpg',1,'2025-08-29 02:43:32','2025-08-29 02:43:32'),(9,'Hon. Ibelo B. Burgos II','Disimpit','Barangay Captain','barangays/BCtTWS4OQrmMYLkLSJ5sUdKuIO7B0esW5kgllos6.jpg',1,'2025-08-29 02:44:02','2025-08-29 02:44:02'),(10,'Hon. Joshua Lamug','Disimpit','SK Chairman','barangays/KOgn1T82d4MQ5rVDqhJbga28ZGP6OQfYQA5kPbk8.jpg',1,'2025-08-29 02:46:05','2025-08-29 02:46:05'),(11,'Hon. Kyrle Bryan Andres','Disimpit','Barangay Kagawad','barangays/hMYefQ4LQIe8LDwsiTuWrWBrq6Qzy2zVUfi35vUX.jpg',1,'2025-08-29 02:46:57','2025-08-29 02:46:57'),(12,'Hon. Lerma Jesusa Luis','Disimpit','Barangay Kagawad','barangays/5mwWmX8rWEU7vGxWpDWk5X3cXbNjbvLzs3xeukeS.jpg',1,'2025-08-29 02:47:27','2025-08-29 02:47:27'),(13,'Hon. Nino Acosta','Disimpit','Barangay Kagawad','barangays/I98wi5UO2PmD7ugBtiHDtoBjHUMxHMssv8zATtGm.jpg',1,'2025-08-29 02:48:15','2025-08-29 02:48:15'),(14,'Jhan Kristel B. Mantala','Disimpit','Barangay Treasurer','barangays/SizMXL1l6BOq03PR8qWUxf7oSgb67NnSZDO32KeW.jpg',1,'2025-08-29 02:49:08','2025-08-29 02:49:08'),(15,'Leah P. Alejo','Disimpit','BNS','barangays/tvlV7VBMvF7eFmArZr7GVX65sUeVKAxMYrkppeqo.jpg',1,'2025-08-29 02:49:48','2025-08-29 02:49:48'),(16,'Niomeline L. Lamug','Disimpit','BHW','barangays/JoY4mRHpzzNvefuD6oUvOixKUJsqOszW6NzZM9Nj.jpg',1,'2025-08-29 02:50:08','2025-08-29 02:50:08');
/*!40000 ALTER TABLE `barangay_officials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
INSERT INTO `cache` VALUES ('admin@cms.com|10.168.1.1','i:1;',1756768872),('admin@cms.com|10.168.1.1:timer','i:1756768872;',1756768872),('admin@dms.com|10.168.1.1','i:2;',1758527940),('admin@dms.com|10.168.1.1:timer','i:1758527940;',1758527940),('admin@example.com|10.168.1.1','i:1;',1757037083),('admin@example.com|10.168.1.1:timer','i:1757037083;',1757037083),('admin|10.168.1.1','i:1;',1757037092),('admin|10.168.1.1:timer','i:1757037092;',1757037092),('liscms|10.168.1.1','i:1;',1757033133),('liscms|10.168.1.1:timer','i:1757033133;',1757033133);
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `calendar_events`
--

DROP TABLE IF EXISTS `calendar_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `calendar_events` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `all_day` tinyint(1) NOT NULL DEFAULT '0',
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calendar_events`
--

LOCK TABLES `calendar_events` WRITE;
/*!40000 ALTER TABLE `calendar_events` DISABLE KEYS */;
INSERT INTO `calendar_events` VALUES (1,'test1','test1','2025-08-07 21:52:00','2025-08-07 22:52:00','#3788d8',0,0,'2025-08-07 13:52:45','2025-08-07 13:56:16'),(2,'regular session','VM / SB','2025-08-27 09:00:00','2025-08-27 12:00:00','#3788d8',0,1,'2025-08-22 16:21:49','2025-08-22 16:27:09');
/*!40000 ALTER TABLE `calendar_events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `members` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `members`
--

LOCK TABLES `members` WRITE;
/*!40000 ALTER TABLE `members` DISABLE KEYS */;
INSERT INTO `members` VALUES (1,'Sample test','Sample test','members/kymeeLJaxz75olRfjPOuPxoIkA84JR3ZHupHAp05.jpg',0,'2025-08-07 13:45:23','2025-08-07 14:18:27'),(2,'aa','a','members/sHivZdH57IySJGaAMro6Xy5IG0Ojb0eXC4wLliDu.jpg',0,'2025-08-07 14:05:19','2025-08-07 14:18:29'),(3,'HON. EVELYN R. RASPADO','Municipal Vice Mayor','members/fapueh3IeIsJgF8V26y1Gz2HYJK5NnO6dO8mgDV3.jpg',1,'2025-08-07 14:19:39','2025-08-22 03:44:45'),(4,'HON. MIKE CEASAR C. MONTANO','Sanguniang Bayan Member','members/qtfalRuCXEonkzecqa1RWavJ3VCQkbDorjktMykT.jpg',1,'2025-08-07 14:20:51','2025-08-22 03:46:00'),(5,'HON. CYNTHIA C. BANGLOY','Sanguniang Bayan Member','members/VcjcrDwBmSu8GrEn9e58eWnZWUBA37hgNx9B3ttl.jpg',1,'2025-08-07 14:21:56','2025-08-22 03:44:32'),(6,'HON. ARLAND F. RAMOS','Sanguniang Bayan Member','members/PXitSa0S9Jn7cdNhGa9z2LFFOroufUJoAqqdNOXy.jpg',1,'2025-08-08 01:43:01','2025-08-22 03:45:15'),(7,'HON. IRENE U. AGGABAO','Sanguniang Bayan Member','members/jxFbpg1GHp7KZM7GliCgwXN4OxSaZfD94Rkrs7fJ.jpg',1,'2025-08-08 01:43:54','2025-08-22 03:45:48'),(8,'HON. SUZETTE D. SEBATIAN','Sanguniang Bayan Member','members/Lf2YgWtLuzVTFe7cDgLUXxOqCml2ITH8ewf6wROA.jpg',1,'2025-08-08 01:45:53','2025-08-22 03:45:35'),(9,'HON. JERVIN P. REYES','Sanguniang Bayan Member','members/Gpexd2eYPHo4XK9HsmCp7CY3Dw6SyWWLFc9q8qad.jpg',1,'2025-08-08 01:46:11','2025-08-22 03:44:18'),(10,'HON. JOHN M. SABINIANO','Sanguniang Bayan Member','members/HUY6ozFaDmcruKwWKsf8Tcqm5bkbsskrdNUIGYeD.jpg',1,'2025-08-08 01:46:32','2025-08-22 03:45:05'),(11,'HON. VIRGINIA B. SY','Sanguniang Bayan Member','members/u3eH20XgmyocNkS96QNq5YfJSyg4FFOfgn9eiMRZ.jpg',1,'2025-08-08 01:46:56','2025-08-22 03:45:25'),(12,'HON. ROGER CARAMANSION','LNB President','members/FGEpd9G7gFcOxFewl17jPyNChQhJvoWnHehI5xwo.jpg',1,'2025-08-08 01:48:32','2025-08-22 03:44:55'),(13,'HON. AIRISH JANN MARC  BALLESTEROS','SK Federation President','members/DT6YUYlfr3y2VeyA9dY6MBzRdSvssv0x3asArTWm.jpg',1,'2025-08-08 01:48:51','2025-08-22 03:46:14');
/*!40000 ALTER TABLE `members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (27,'0001_01_01_000000_create_users_table',1),(28,'0001_01_01_000001_create_cache_table',1),(29,'0001_01_01_000002_create_jobs_table',1),(30,'2025_07_15_081119_create_members_table',1),(31,'2025_07_15_104619_create_standing_comittee_table',1),(32,'2025_07_15_104803_create_standing_comittee_member_table',1),(33,'2025_07_15_134730_create_assignments_table',1),(34,'2025_07_15_134747_create_assignment_member_table',1),(35,'2025_07_16_053738_create_albums_table',1),(36,'2025_07_16_053748_create_album_photo_table',1),(37,'2025_07_16_150046_create_organization_node_table',1),(38,'2025_07_16_191117_create_calendar_events_table',1),(39,'2025_07_16_195253_create_barangay_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `organization_node`
--

DROP TABLE IF EXISTS `organization_node`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organization_node` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `parent_id` bigint unsigned DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organization_node`
--

LOCK TABLES `organization_node` WRITE;
/*!40000 ALTER TABLE `organization_node` DISABLE KEYS */;
INSERT INTO `organization_node` VALUES (1,'sample',NULL,'sample','organization/Utgtb2wpABKkVbAiecTSn7iMEkOF9EerM5RWa99e.png',0,'2025-08-07 13:51:25','2025-08-08 10:44:25'),(2,'test',1,'test','organization/UcCBYtYcGAXl9UK7Acq8MIhaS7dsPZpwE3YRrwcX.png',0,'2025-08-07 13:51:43','2025-08-08 10:44:23'),(3,'testing name',NULL,'testing position','organization/jQAkz1HpsLMpInnpzh43LWsxUB4P1jmw6d1MwWMH.png',0,'2025-08-22 13:52:18','2025-08-22 13:56:31'),(4,'testing name 2',3,'testing position 2','organization/QNW5xvW1b0z2F08jaFoOGKUaWyzlIzBjrK269xzj.png',0,'2025-08-22 13:53:08','2025-08-22 13:56:36'),(5,'testing name B',NULL,'testing name B','organization/o31p3rVoRmacsGA0uIhvWL7Bgnlr2ceo2YwHpQoV.png',0,'2025-08-22 13:55:00','2025-08-22 13:56:33'),(6,'testing name AB',5,'testing  position AB','organization/TzQBbQ9MaSWOaKvoaC0ARHYCgydqzTcbtm60gL4F.png',0,'2025-08-22 13:55:48','2025-08-22 13:56:38'),(7,'NOVELYN M. BULAN',34,'Secretary to the Sagguniang Bayan','organization/6ZVcjyaZzjuzOpf4HlAOUDVkdC5oEI9FZHhYjwrp.jpg',1,'2025-08-22 14:47:47','2025-08-22 15:54:00'),(8,'REAH G. TEMPLO',7,'Administrative Officer V','organization/rIW7F8ufhAJKnByD8QpCnGKKmNy6D6Yy9cTmsSqe.jpg',1,'2025-08-22 14:49:04','2025-08-22 14:49:04'),(9,'MARY JANE F. SALADINO',8,'Local Legislative Staff Officer II','organization/mTFwOlpORi2IpUtTXZyJxiftRjpfd4S6ExKHxiSI.jpg',1,'2025-08-22 14:53:51','2025-08-22 14:53:51'),(10,'SHERYLL C. DINGCONG',8,'Senior Administrative Assistant I','organization/wB3hPZtENEb8zukvFH0jKJqiAztU20lpt7oR18xE.jpg',1,'2025-08-22 14:55:13','2025-08-22 14:55:13'),(11,'JASMINE S. OANAGUEN',8,'Administrative Officer II','organization/Dy1rwn0gJZuWsQnrMr50UV8E7b0aufvb9RgZ9h6p.jpg',1,'2025-08-22 15:05:27','2025-08-22 15:05:27'),(12,'NOMELYN L. NICOLAS',8,'Administrative Assistant V','organization/aDqSMho1pw95T38xksc6diU0ceyGALZXiVJRw1GY.jpg',1,'2025-08-22 15:06:58','2025-08-22 15:06:58'),(13,'VIRGIE D. ABARA',8,'Local Legislative Staff III','organization/bTLfAHT2ALQRpvsYzkBcn3Y4R1JKcFlVcoBDHBVa.jpg',1,'2025-08-22 15:09:17','2025-08-22 15:09:17'),(14,'HARLENE GRACE G. VICTORIANO',8,'Administrative Assistant III','organization/pvdJ8riV1e0F9ByONGPJrXRiQaCdkXE8vCuIIRMb.jpg',1,'2025-08-22 15:10:41','2025-08-22 15:10:41'),(15,'JONALETH B. DELA CRUZ',8,'Administrative Assistant II','organization/bi7CoeA5zkMAMWnCbJBzr6x3jxYLaeL5gXhl3DO0.jpg',1,'2025-08-22 15:14:38','2025-08-22 15:14:38'),(16,'MAYROSE A. CARREON',8,'Administrative Aide VI','organization/KF2K5SlYosYhT4mSz8FT5hG5kbDbzBk9YqHpa18E.jpg',1,'2025-08-22 15:16:14','2025-08-22 15:16:14'),(17,'JORDAN HOPE D. OJERIO',8,'Administrative Aide VI','organization/cuUrCecVElW1lbCQDIJBmbszNGXUEvcCImXIrUco.jpg',1,'2025-08-22 15:17:26','2025-08-22 15:17:26'),(18,'GLATHAR JANE G. BAUTISTA',8,'Administrative Aide VI','organization/SHf2JUkELVDc9bJWAF3KFxJjNwgICj2vW4zXwfVP.jpg',1,'2025-08-22 15:18:19','2025-08-22 15:18:19'),(19,'ART B. MABBAYAD',17,'Messenger','organization/2mfOB4Uw9xiqzQTIgvPxZwA8lZDMRHvrIRNUyP57.jpg',1,'2025-08-22 15:20:32','2025-08-22 15:20:32'),(20,'BOMBI NINNO S. BAGUIO',17,'Messenger','organization/xSDxXDbaUeJrVPHAzDjsaYelyYeWVAnai9CYuz8w.jpg',1,'2025-08-22 15:23:25','2025-08-22 15:23:25'),(21,'HON. EVELYN R. RASPADO',NULL,'Vice Mayor','organization/0P4yyH9zmbIvob1vgsohwWYPM6uBVaX7LO0MUPv7.jpg',1,'2025-08-22 15:28:48','2025-08-22 15:28:48'),(22,'ACE NICKSON M. TOLENTINO',35,'Local Legislative Staff Officer I','organization/e3MeDbRN5tD8DSeo34uwTmc28k7WekDzeHgRlugc.jpg',1,'2025-08-22 15:32:19','2025-08-22 15:58:28'),(23,'DANICA DIANE L. JUAN',35,'Private Secretary','organization/WRi51UlKdyDsO3jzmivZ66EpNIpvI22wscwNClaO.jpg',1,'2025-08-22 15:33:17','2025-08-22 15:58:50'),(24,'JONATHAN A. LANON',35,'Administrative Aide III','organization/JApZsvj1Q4eIwwttJgevdAiEx0DO6O5om9PscsEm.jpg',1,'2025-08-22 15:35:28','2025-08-22 15:59:48'),(25,'AOI ANDIOPHINE B. MEJIA',35,'Administrative Aide IV','organization/shGFDBVy0PkPxQrmn0rEaNu1Rzd2M7dPysu6j949.jpg',1,'2025-08-22 15:36:55','2025-08-22 16:00:04'),(26,'JOAN M. DEL ROSARIO',35,'Administrative Aide II','organization/niKnETPdlEqUcH5mWkdE9hH4sfDBIzhE2ztrNYBg.jpg',1,'2025-08-22 15:37:53','2025-08-22 16:06:20'),(27,'MARICEL F. DELA CRUZ',35,'Administrative Aide II','organization/HvD2G71GsdGwJvJi9Oy59ByVF7WRXzZTJIKsJoCB.jpg',1,'2025-08-22 15:38:54','2025-08-22 16:06:42'),(28,'RIZALYN R. RATUM',35,'Administrative Aide I','organization/EeqQvlQcQfRFanDOIYvnhXr79P8WaxNfHv73gIwD.jpg',1,'2025-08-22 15:39:37','2025-08-22 16:07:02'),(29,'SHIELLA G. DAPPANAN',36,'Administrative Aide IV','organization/1IQPCWxLsT0d56PllGQQXpkSawJ6wk8rQBgizoS1.jpg',1,'2025-08-22 15:42:46','2025-08-22 16:01:37'),(30,'ANALYN M. MESIA',36,'Administrative Aide VI','organization/EcQrP0TcR9ebZnhWVhM5JrKQuqttNmYsqcXhWNXk.jpg',1,'2025-08-22 15:43:35','2025-08-22 16:01:52'),(31,'PERLITA G. BALAUAG',36,'Administrative Aide II','organization/XFXa8K3ZSThkWOz1wcuQy3pZFzdhaDYqGDLtF1wZ.jpg',1,'2025-08-22 15:44:30','2025-08-22 16:02:25'),(32,'FRANCISCO RODEO',36,'Administrative Aide I','organization/uArrIrPwp5rc4FQEj3NTFvaiQlJa8AjOtUNsouJP.jpg',1,'2025-08-22 15:45:29','2025-08-22 16:02:58'),(33,'BENELYN F. ACIDO',36,'Administrative Aide I','organization/vsCpXRDtc0PzsyCLQphXAQg4INtpBKzCWUWrmVtl.jpg',1,'2025-08-22 15:46:08','2025-08-22 16:03:09'),(34,'Office of the.',21,'Secretary to the Sangguniang Bayan','organization/5hhqIUP30AezEh7xzUYIbkH41V3PhtBwqxlw1QT5.jpg',1,'2025-08-22 15:53:07','2025-08-22 16:11:01'),(35,'Office of the..',21,'Municipal Vice Mayor','organization/4oyXpy5HokscTeL1pf5rUdZtaTSIcGqBbsJgzg1C.jpg',1,'2025-08-22 15:58:10','2025-08-22 16:10:33'),(36,'Office of the',21,'Sagguniang Bayan','organization/vErIM19UuvWP1zYCuPAHrVv3xUcshuBfTEvHicQs.jpg',1,'2025-08-22 16:01:19','2025-08-22 16:09:23'),(37,'JOB ORDER',21,'.','organization/4FKJgWbvhZcmXZWZL5L2tJMSdGWXfyOFuf3WQ7zw.jpg',1,'2025-08-22 16:08:38','2025-08-22 16:08:38'),(38,'LALIE GUMPAL',37,'.','organization/7ITXn9n919x5o3vUjB5ktPoTGlYijnxpnSIfk3ph.png',1,'2025-08-29 06:38:59','2025-08-29 06:38:59'),(39,'WEVELYN PEDRO',37,'.','organization/CsH45T5LmZ0ptHYz1iI90vRdWWnAdMYnD5zPvqOc.jpg',1,'2025-08-29 06:39:43','2025-08-29 06:39:43'),(40,'MARY FATIMA R. PADACA',37,'.','organization/hvD1DGL2TzCeb2SRHMxSDJ5o8Ru0PpmS9lp1C3oa.png',1,'2025-08-29 06:41:53','2025-08-29 06:41:53'),(41,'JO ALLAN MARK CRISTOBAL',37,'.','organization/wQHbIKfaQbnzWaiEWXb176zzyjb81yKRVFK6ygBk.jpg',1,'2025-08-29 06:42:33','2025-08-29 06:42:33'),(42,'LEISEL SALVADOR',37,'.','organization/CIL4x0ecVFadqeqg4cvr5su1AzVQUOhyb2vxZnkS.png',1,'2025-08-29 06:43:16','2025-08-29 06:43:16'),(43,'XUAN WEI BULAN',37,'.','organization/qjaLGawhruowRTcXnuSlVsBOZGeuPzOPcSKzSfDu.jpg',1,'2025-08-29 06:43:46','2025-08-29 06:43:46'),(44,'ERRON CARL SALVADOR',37,'.','organization/jG0U2YcwnjDHj79LjLsiQKTrBuDGeLW4WXgx7OQM.jpg',1,'2025-08-29 06:44:12','2025-08-29 06:44:12'),(45,'PRINCE ADAM CLIMACO',37,'.','organization/HQGfWUspwRdCGxs6LGL0lJNZZbyXMCs7vLjvUZIJ.jpg',1,'2025-08-29 06:44:47','2025-08-29 06:44:47'),(46,'MEL JOY DACO',37,'.','organization/eCmCgFJTXcLpfrDjnD5ctvkIXR5rozDMOLsRV3l4.jpg',1,'2025-08-29 06:45:15','2025-08-29 06:45:15'),(47,'CANDYLEI G. DOMINGO',37,'.','organization/Yir5ByBRFaMchgmi5BPIS7qF4SddkvuH7LVyFitz.png',1,'2025-08-29 06:45:47','2025-08-29 06:45:47'),(48,'DENMARC HERMANO',37,'.','organization/II7kTnyO5LvICurEM0HMumNb48PfxNnYLZYMVm38.jpg',1,'2025-08-29 06:46:27','2025-08-29 06:46:27'),(49,'MARINELLA MENDRAJAL',37,'.','organization/q2ekYEUo7zj1qfYM3omKXGAXktOvbmmMu2LNqnHR.png',1,'2025-08-29 06:47:14','2025-08-29 06:47:14');
/*!40000 ALTER TABLE `organization_node` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text,
  `payload` longtext NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('20xZGjj6Gh4iCcrUkYzniZQdeiNKuDkfSvjMmdWG',NULL,'10.168.1.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Safari/605.1.15','YToyOntzOjY6Il90b2tlbiI7czo0MDoiT3NkVDd5RUdrQ21qQW83V1lnTWNCSm9rYUVmZTlnZEtucnBJcWhVeCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1758687423),('3avcxLp0Mp3sxVMwLrnUIi13xJ7DJmrDaHD5FgR2',NULL,'10.168.1.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.4 Safari/605.1.15','YToyOntzOjY6Il90b2tlbiI7czo0MDoiWDIzSGl4dkZmT0JtQzVTeG93em40MmI4SVdnSlhlR3AxdzRkUkdEViI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1758687631),('7EqlosUyQVLz02a710QBLsoQlH6jWgdaCxOc7x3a',NULL,'10.168.1.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36','YToyOntzOjY6Il90b2tlbiI7czo0MDoiM1dYNWVVWWpoNnhCN0lWU21sSnhoTlVXaVRHbTNHNVBYWkRSQndRRyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1758766502),('8JappR3bAA3KBYilMWIAvgd9Psyc6Hdm7SinMmHb',NULL,'10.168.1.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36','YToyOntzOjY6Il90b2tlbiI7czo0MDoiUlUzTGZIalo4Mm5KOEJMVHY4UzNLNjRkNExqWGQ2VGMwakt0Y0l3YiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1758591911),('ADI7qqXJuKwaDBhF20z32ZBpPZwTzZCrIS9PT3KW',NULL,'10.168.1.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36','YToyOntzOjY6Il90b2tlbiI7czo0MDoicUJia2dHY241WHN6QUxzbEJYZFUxbGh4dzFicFQ5QzVDeWwya3VsayI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1758591899),('aERLDlrxdQep6TDZL19byynIoW6A84N40RaNWJin',NULL,'10.168.1.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.4 Safari/605.1.15','YToyOntzOjY6Il90b2tlbiI7czo0MDoibHc5anRJcTBlcWF5S2NJaE9QMER6cFpaYzU0ajJzcHdla0ZVNHBOaCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1758687655),('bCtJqFcwIGeePHsZdTChv9uYhqtCeIevrFV1PdMi',NULL,'10.168.1.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.4 Safari/605.1.15','YToyOntzOjY6Il90b2tlbiI7czo0MDoibkFkTFhsMm1BS1BQQkhYaG9CRTVoMXZaYUVzTGxLS0VRcUttdUtEeiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1758687634),('bz3KX6t6kFXq3pgwIsV5Zi4lK4ZxCtbGupHQbMq5',NULL,'10.168.1.1','Mozilla/5.0 (iPhone; CPU iPhone OS 18_1_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.1.1 Mobile/15E148 Safari/604.1','YToyOntzOjY6Il90b2tlbiI7czo0MDoiTnhtTEpzb2VTd1hHQXd5d3NJN3VzSkV0dElKdTNpWm56QkwweFVTRiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1758520214),('dsAa6MVFi8Uj1j2IFqwuMWbdRj6L1FsbDvpvBHt0',NULL,'10.168.1.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.4 Safari/605.1.15','YToyOntzOjY6Il90b2tlbiI7czo0MDoieVAxSDRxbXV5TVlqVzVzSHdFYWxSVDNXdGRZUkViSmE0QkZHYU4zNyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1758687595),('dxCiXRLpvI0ebxu5MiSnz3YGWL6R1dlamxGu3Elo',NULL,'10.168.1.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiZWtYdjJScjBURlJxWDZuVFZ4d2R1akRmQVRXMXBmMVk1dVZqcTdBeCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHBzOi8vbGlzLWNtcy5ub3Z1bHV0aW9ucy5jb20vam9uZXMvbG9naW4iO319',1758520222),('fCtyXwZAJhVCQNks5t1anIy1gSPF4moONKjR7iXH',NULL,'10.168.1.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.4 Safari/605.1.15','YToyOntzOjY6Il90b2tlbiI7czo0MDoiN082c2JSbFF0UTRoYXhOUmdveHdMUmlXRTBkc1dPckJoTmFaQjQ4WiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1758687591),('FEEcxH4LylWPif4UlkSRxc3PUuMkg5fV0gPRKeOU',NULL,'10.168.1.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36','YToyOntzOjY6Il90b2tlbiI7czo0MDoiNGR3MjZXVTJSUURBMDFVVWlyRWFBS3kyTDNKb1UxejJqU0hHUGd4MSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1758766470),('HTjDdTpqaaN98MBU6W3hQXAA5F5KiUtiSkD27TJH',NULL,'10.168.1.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Safari/605.1.15','YToyOntzOjY6Il90b2tlbiI7czo0MDoiNVBQamk0VEdveGNjOWZlRWs2MDY0aFNWbGZoMTQyVnZ0TTFPQXdjcCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1758687158),('iwsWbGKEA3uWkrTnnuYznfYOd6PxifxRlYLrA0mM',NULL,'10.168.1.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiTDRWYkdWZ1hvdVU5c2hadkswTVgxZEl0a0x4bnA4MlhmaXFDZ1g0cSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHBzOi8vbGlzLWNtcy5ub3Z1bHV0aW9ucy5jb20vam9uZXMvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1758591140),('iX4TXRDIUSaeqRKeWPLYxCZo2o1gWcl71A0lvQ0n',NULL,'10.168.1.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36','YToyOntzOjY6Il90b2tlbiI7czo0MDoiQ1RyM0tqQU5TNEZqbFlBTWpPNGc4S3NibXFna0VwUGFZZktNczFzWSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1758766469),('J9kNsmHEP7xrl48vuJMw1RCq4DrnhvwkVrDB12U1',NULL,'10.168.1.1','Mozilla/5.0 (iPhone; CPU iPhone OS 18_1_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.1.1 Mobile/15E148 Safari/604.1','YToyOntzOjY6Il90b2tlbiI7czo0MDoiWmh3bWs2alR0bTl2YUh2VWwyajU3VEoxeFJQbHE0enVUc3g1cm1PaCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1758526053),('jC2bNpNBujVVFwCL2FZsblDUBuByf1VKVV5TFvjV',NULL,'10.168.1.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Safari/605.1.15','YToyOntzOjY6Il90b2tlbiI7czo0MDoiVVhxSnZiYXRzck53S3dNVDdYOE1SSVY2MUVlUE9vYTNOVTZvWVBibyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1758687161),('jtfRKWEJ7A2STBcmxmPSxiSJhRybPYiID8CxhWjV',NULL,'10.168.1.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.4 Safari/605.1.15','YToyOntzOjY6Il90b2tlbiI7czo0MDoiSzNMdGpCdW5hV1FXR0tPNWtDMXcyOG9qZ005Z2xUbnlmZ1BDZm9BZSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1758687660),('L4ToAwNSlfd9rDRlowiuVj5du3G3A0MzR8POlKp7',NULL,'10.168.1.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36','YToyOntzOjY6Il90b2tlbiI7czo0MDoiZm4xNlF3QjdiVk5ydFlhbmgyRTV1UGp1U0hicGRZMTBLTHhaSkJGbSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1758766502),('lOANhzt08jL66R4gREcY83vXaLp9njXCHZxz2xpQ',NULL,'10.168.1.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36','YToyOntzOjY6Il90b2tlbiI7czo0MDoiUVN4Qkw4OWtvV1pMNnpMRGpLYXZUbzhuUlRJbVU2M1loNlBralZQUSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1758591900),('MmdCpUD0e456MvQC0pfsWaZXwleIygRsEqy4vRnL',NULL,'10.168.1.1','Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Mobile/15E148 Safari/604.1','YToyOntzOjY6Il90b2tlbiI7czo0MDoidExGaVNaSW1hSW1LREJIQzV0Sko1ZHpvcThTb2JKNG1CaUJjYUNrYyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1758688419),('OVZD17s687RyyWmmJDW3J8XKIew22yWtp7nEng55',NULL,'10.168.1.1','Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Mobile Safari/537.36','YToyOntzOjY6Il90b2tlbiI7czo0MDoiMmNSdWVxVDdpVnFRZ0xuQVdOcVZDNHRjWmszYXZ1RnVwVmNZbWxDbyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1758542449),('pBudUAEDJFqdpbnsG1SgFr1ka6OgxzkBYErEQltj',NULL,'10.168.1.1','Mozilla/5.0 (iPhone; CPU iPhone OS 18_1_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.1.1 Mobile/15E148 Safari/604.1','YToyOntzOjY6Il90b2tlbiI7czo0MDoiamN0UHY0WVBMUWJxVEpFcmNKM25YRGp4QzV3c1VJRnJrNTFGa2haUyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1758520098),('PcerBNGaxAL5ShNxGnmHPZyBn7AOw1sheI2f0vYI',NULL,'10.168.1.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Safari/605.1.15','YToyOntzOjY6Il90b2tlbiI7czo0MDoiU1c1MnEyT2RTWlpvUWpabklJeWcwMlhVRkxZUVpmM0tWZnZZdXRIcCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1758686905),('PyZGlTg3JVy6JKsr7ix7ZOD4wszXyPEnxUrORRs7',NULL,'10.168.1.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36','YToyOntzOjY6Il90b2tlbiI7czo0MDoiTEFxOTRQVGc2WnMwUzRPQnVMMk5rbUpTSEZHRVJlN2c4Nk9NbDBuYSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1758766313),('qfHTc05FunrnstiSbEWLoRdveidEyBxiF767sBls',NULL,'10.168.1.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36','YToyOntzOjY6Il90b2tlbiI7czo0MDoiU0dWakhTZ0ZXa0Y2Vnl4N0J3eE9XQ3BQY3dwdzEydGNlanRDN0lEaiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1758591909),('qwpNx4M5nMpddeqgFFA6VySRiIAyMq4DGoUdlLNg',NULL,'10.168.1.1','Mozilla/5.0 (iPhone; CPU iPhone OS 18_1_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.1.1 Mobile/15E148 Safari/604.1','YToyOntzOjY6Il90b2tlbiI7czo0MDoiaEpFSXJQZldBeHpMRFdPaDlUMHpCZ0xOSTBhSjlVdnZSZTV0U0VaUiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1758520209),('srCTMzF3X8E30PYawdxXIrJXDJkgf5MBwlZSfvFL',1,'10.168.1.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiOXE5eFR2YWdLUUJYMjNRSnJhUkNLb1Exemo1VWt5RlN5STYwblB3ViI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjQ6ImF1dGgiO2E6MTp7czoyMToicGFzc3dvcmRfY29uZmlybWVkX2F0IjtpOjE3NTg3NjY0ODU7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQ1OiJodHRwczovL2xpcy1jbXMubm92dWx1dGlvbnMuY29tL2pvbmVzL21lbWJlcnMiO319',1758766485),('SYonBGvBKcrocvy9YMrkynNIbxyhYK9ubh7xPDTH',1,'10.168.1.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36','YTo1OntzOjY6Il90b2tlbiI7czo0MDoidkI5dnB3VndMYXNvVWVBQ2RmUlI4QXNtVzBQQjJXbmZMMFZwd0htYiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTg6Imh0dHBzOi8vbGlzLWNtcy5ub3Z1bHV0aW9ucy5jb20vam9uZXMvZGlzdHJpY3QtYXNzaWdubWVudHMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6NDoiYXV0aCI7YToxOntzOjIxOiJwYXNzd29yZF9jb25maXJtZWRfYXQiO2k6MTc1ODU5MTEwMzt9fQ==',1758592877),('TkoOR93tMpKFidTVgBElCjaTo9zn0yePdCI9OtYw',NULL,'10.168.1.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36','YToyOntzOjY6Il90b2tlbiI7czo0MDoiQ3IyUzdYWFlPVVFaSDlkVmUzTHlHRHczZEJrTWk1dEJsTXJvbTZvWSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1758591909),('tQZpqC5ia7mHFHSePuGwwmZV0zYlpodSp2ZkUlaS',NULL,'10.168.1.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36','YToyOntzOjY6Il90b2tlbiI7czo0MDoiQjlpUlhUbVAxQ3dDYzVuS1BzbjV3cXEzWTZRZlFUTGpLWWlNRGlUYiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1758766497),('UuVayvYX7hGNtgm0Vw9mLJTcnxr0XVWLW6AyeshK',NULL,'10.168.1.1','Mozilla/5.0 (iPhone; CPU iPhone OS 18_1_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.1.1 Mobile/15E148 Safari/604.1','YToyOntzOjY6Il90b2tlbiI7czo0MDoiNkJrMk53dk1VU2UxOG1veE0yenlHcWtuUHFpaHFrc2VVb24yV1RZWSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1758520094),('uXLyGmkPybbTcjNX9uKYbbz48DX2J0xknTqmAWkW',NULL,'10.168.1.1','Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Mobile/15E148 Safari/604.1','YToyOntzOjY6Il90b2tlbiI7czo0MDoiM3M4cUw2anc1SnhrUXNjUE5OblVGZ3VlWGhleU9yQm0zbTR0ZmVuSyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1758687677),('vGi7XF8HzqqM11BfbMd3UNZb951Sc6Zb5i1pOlw4',NULL,'10.168.1.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36','YToyOntzOjY6Il90b2tlbiI7czo0MDoiQ3FHWlZlSXRqRHhzV1JRcHY3RFVNakpQczBsOHRIbTRWRXZieVJ3VyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1758591904),('Vxv6Yb0jTBbNcQYqOS00gDGOX6W1TKacF7nJvJJP',NULL,'10.168.1.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Safari/605.1.15','YToyOntzOjY6Il90b2tlbiI7czo0MDoiTHdLQnJsUFlqbUJJN2xmN3ptS1lNcDM2MWFjeGl3TDc1ZkJsWTRXdSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1758687412),('W5OlI7F8H0jbLFtUn27CePAa7rg5NWOo7eDMy31M',1,'10.168.1.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiUzNVczBRcm4xWEpWOGlqM2w4ekVUU2k2SVljdHBRN0pBaHFmWWNZTyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHBzOi8vbGlzLWNtcy5ub3Z1bHV0aW9ucy5jb20vam9uZXMvbWVtYmVycyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czo0OiJhdXRoIjthOjE6e3M6MjE6InBhc3N3b3JkX2NvbmZpcm1lZF9hdCI7aToxNzU4Njg3MDA5O319',1758687061),('w7jzYTckcneo4v5zIBAMufPdISc3dlWPTaOTIG0l',NULL,'10.168.1.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Safari/605.1.15','YTozOntzOjY6Il90b2tlbiI7czo0MDoiV0VEMWRXQmJEWnhRQk9VY29xRzNrc1lGRmVrSDE2Y1JPUWlid0tnbyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHBzOi8vbGlzLWNtcy5ub3Z1bHV0aW9ucy5jb20vam9uZXMvbG9naW4iO319',1758528031),('xs7rBqWvFOq1TSwYllcnXr6PBtXAYrUYCv1TBmHj',NULL,'10.168.1.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36','YToyOntzOjY6Il90b2tlbiI7czo0MDoibXM5UHJZZ1pnYWp3RXg2TFBuSlRreHhKdTg2YkpEM2hUdjc5UjdtdSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1758766323),('ym52PsSsx5zqu6dHyD10HlKa10ghZMNTWujDMKOF',NULL,'10.168.1.1','Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Mobile Safari/537.36','YToyOntzOjY6Il90b2tlbiI7czo0MDoiNEcyaFlUbE9SanoxQmYyTExIWklweEZKazVFc3J3M3dXdW5EVE5pTyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1758542050),('Z4gBRHdCTOAnXQGE4KFNJPiakBDGvlAG5EYBYebj',NULL,'10.168.1.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Safari/605.1.15','YToyOntzOjY6Il90b2tlbiI7czo0MDoiR3lHMFBKWmg0QUh1UzZpb1VSSldQbXlBREo5VTlDazFiS1dCMDFZUyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1758687168),('ZYFjiM17rx2REZYngC8lCv1NBDQ5aI4SpgBAD5AT',NULL,'10.168.1.1','Mozilla/5.0 (iPhone; CPU iPhone OS 18_1_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.1.1 Mobile/15E148 Safari/604.1','YToyOntzOjY6Il90b2tlbiI7czo0MDoidzlMT2RHRDR2TTJWMTJYSnJMdEJvUlp4dDhRMmtFaWlTMVR5aklVNyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1758520216);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `standing_comittee`
--

DROP TABLE IF EXISTS `standing_comittee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `standing_comittee` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `standing_comittee`
--

LOCK TABLES `standing_comittee` WRITE;
/*!40000 ALTER TABLE `standing_comittee` DISABLE KEYS */;
INSERT INTO `standing_comittee` VALUES (1,'standinga',0,'2025-08-07 13:49:23','2025-08-07 13:55:41'),(2,'Committee on Finance, Budget, and Appropriation & Ways and Means',1,'2025-08-29 02:54:53','2025-08-29 02:54:53'),(3,'Committee on Agriculture and Cooperatives / Agrarian Reform  and Development',1,'2025-08-29 02:57:06','2025-08-29 02:57:06'),(4,'Committee on Education',1,'2025-08-29 02:59:05','2025-08-29 02:59:05'),(5,'Committee on Peace and Order and Public Safety',1,'2025-08-29 03:19:32','2025-08-29 03:19:32'),(6,'Committee on Indigenous Peoples and Indigenous Cultural Communities and Human Rights',1,'2025-08-29 03:21:43','2025-08-29 03:21:43'),(7,'Committee on Rules and Privileges and Ordinances and Legal Matters',1,'2025-08-29 03:23:44','2025-08-29 03:23:44'),(8,'Committee on Infrastructure and Public Works',1,'2025-08-29 03:25:42','2025-08-29 03:25:42'),(9,'Committee on Environmental Protection and Management',1,'2025-08-29 03:27:16','2025-08-29 03:27:16'),(10,'Committee on Transportation, Communication and Public Utilities',1,'2025-08-29 04:43:05','2025-08-29 04:43:05'),(11,'Committee on Games and Amusement',1,'2025-08-29 04:44:45','2025-08-29 04:44:45'),(12,'Committee on Women and Family',1,'2025-08-29 04:46:05','2025-08-29 04:46:05'),(13,'Committee on Good Government, Public Ethics and Accountability',1,'2025-08-29 04:47:31','2025-08-29 04:47:31'),(14,'Committee on Health and Social Welfare Services',1,'2025-08-29 04:49:09','2025-08-29 04:49:09'),(15,'Committee on Commerce, Trade, Industry and Economic Enterprises',1,'2025-08-29 04:50:54','2025-08-29 04:50:54'),(16,'Committee on Barangay Affairs',1,'2025-08-29 04:52:19','2025-08-29 04:52:19'),(17,'Committee on Youth and Sports Development',1,'2025-08-29 04:53:43','2025-08-29 04:53:43'),(18,'Committee on Labor and Employment',1,'2025-08-29 04:54:11','2025-08-29 04:55:16'),(19,'Committee on Housing, Zoning and Land Use Regulation',1,'2025-08-29 05:11:15','2025-08-29 05:11:15'),(20,'Committee on Disaster Risk Reduction and Management',1,'2025-08-29 05:12:34','2025-08-29 05:12:34'),(21,'Committee on Tourism, Arts and Culture',1,'2025-08-29 05:13:56','2025-08-29 05:13:56');
/*!40000 ALTER TABLE `standing_comittee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `standing_comittee_member`
--

DROP TABLE IF EXISTS `standing_comittee_member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `standing_comittee_member` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `standing_comittee_id` bigint unsigned NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `standing_comittee_member_standing_comittee_id_foreign` (`standing_comittee_id`),
  CONSTRAINT `standing_comittee_member_standing_comittee_id_foreign` FOREIGN KEY (`standing_comittee_id`) REFERENCES `standing_comittee` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `standing_comittee_member`
--

LOCK TABLES `standing_comittee_member` WRITE;
/*!40000 ALTER TABLE `standing_comittee_member` DISABLE KEYS */;
INSERT INTO `standing_comittee_member` VALUES (2,1,'standinga','standinga',1,'2025-08-07 13:55:22','2025-08-07 13:55:22'),(3,2,'Hon. John. M. Sabiniano','Chairman',1,'2025-08-29 02:54:53','2025-08-29 02:54:53'),(4,2,'Hon. Cynthia C. Bangloy','Vice-Chairman',1,'2025-08-29 02:54:53','2025-08-29 02:54:53'),(5,2,'Hon. Suzette D. Sebastian','Member',1,'2025-08-29 02:54:53','2025-08-29 02:54:53'),(6,2,'Hon. Virginia B. Sy','Member',1,'2025-08-29 02:54:53','2025-08-29 02:54:53'),(7,2,'Hon. Arland F. Ramos','Member',1,'2025-08-29 02:54:53','2025-08-29 02:54:53'),(8,3,'Hon. Arland F. Ramos','Chairman',1,'2025-08-29 02:57:06','2025-08-29 02:57:06'),(9,3,'Hon. Jervin P. Reyes','Vice-Chairman',1,'2025-08-29 02:57:06','2025-08-29 02:57:06'),(10,3,'Hon. Mike Cesar C. Montano','Member',1,'2025-08-29 02:57:06','2025-08-29 02:57:06'),(11,3,'Hon. Roger G. Caramancion','Member',1,'2025-08-29 02:57:06','2025-08-29 02:57:06'),(12,3,'Hon. John M. Sabiniano','Member',1,'2025-08-29 02:57:06','2025-08-29 02:57:06'),(13,4,'Hon. Cynthia C. Bangloy','Chairman',1,'2025-08-29 02:59:05','2025-08-29 02:59:05'),(14,4,'Hon. Suzette D. Sebastian','Vice-Chairman',1,'2025-08-29 02:59:05','2025-08-29 02:59:05'),(15,4,'Hon. Mike Cesar C. Montano','Member',1,'2025-08-29 02:59:05','2025-08-29 02:59:05'),(16,4,'Hon. Arland F. Ramos','Member',1,'2025-08-29 02:59:05','2025-08-29 02:59:05'),(17,4,'Hon. Virginia B. Sy','Member',1,'2025-08-29 02:59:05','2025-08-29 02:59:05'),(18,5,'Hon. John M. Sabiniano','Chairman',1,'2025-08-29 03:19:32','2025-08-29 03:19:32'),(19,5,'Hon. Roger G. Caramancion','Vice-Chairman',1,'2025-08-29 03:19:32','2025-08-29 03:19:32'),(20,5,'Hon. Mike Cesar C. Montano','Member',1,'2025-08-29 03:19:32','2025-08-29 03:19:32'),(21,5,'Hon. Jervin P. Reyes','Member',1,'2025-08-29 03:19:32','2025-08-29 03:19:32'),(22,5,'Hon. Airish Jann Marc D. Ballesteros','Member',1,'2025-08-29 03:19:32','2025-08-29 03:19:32'),(23,6,'Hon. Virginia B. Sy','Chairman',1,'2025-08-29 03:21:43','2025-08-29 03:21:43'),(24,6,'Hon. Irene U. Aggabao','Vice-Chairman',1,'2025-08-29 03:21:43','2025-08-29 03:21:43'),(25,6,'Hon. Hon. Arland F. Ramos','Member',1,'2025-08-29 03:21:43','2025-08-29 03:21:43'),(26,6,'Hon. Suzette D. Sebastian','Member',1,'2025-08-29 03:21:43','2025-08-29 03:21:43'),(27,6,'Hon. Jervin P. Reyes','Member',1,'2025-08-29 03:21:43','2025-08-29 03:21:43'),(28,7,'Hon. Cynthia C. Bangloy','Chairman',1,'2025-08-29 03:23:44','2025-08-29 03:23:44'),(29,7,'Hon. Suzette D. Sebastian','Vice Chairman',1,'2025-08-29 03:23:44','2025-08-29 03:23:44'),(30,7,'Hon. John M. Sabiniano','Member',1,'2025-08-29 03:23:44','2025-08-29 03:23:44'),(31,7,'Hon. Arland F. Ramos','Member',1,'2025-08-29 03:23:44','2025-08-29 03:23:44'),(32,7,'Hon. Virginia B. Sy','Member',1,'2025-08-29 03:23:44','2025-08-29 03:23:44'),(33,8,'Hon. Mike Cesar C. Montano','Chairman',1,'2025-08-29 03:25:42','2025-08-29 03:25:42'),(34,8,'Hon. John M. Sabiniano','Vice-Chairman',1,'2025-08-29 03:25:42','2025-08-29 03:25:42'),(35,8,'Hon. Cynthia C. Bangloy','Member',1,'2025-08-29 03:25:42','2025-08-29 03:25:42'),(36,8,'Hon. Irene U. Aggabao','Member',1,'2025-08-29 03:25:42','2025-08-29 03:25:42'),(37,8,'Hon. Jervin P. Reyes','Member',1,'2025-08-29 03:25:42','2025-08-29 03:25:42'),(38,9,'Hon. Suzette D. Sebastian','Chairman',1,'2025-08-29 03:27:16','2025-08-29 03:27:16'),(39,9,'Hon. Jervin P. Reyes','Vice-Chairman',1,'2025-08-29 03:27:16','2025-08-29 03:27:16'),(40,9,'Hon. John M. Sabiniano','Member',1,'2025-08-29 03:27:16','2025-08-29 03:27:16'),(41,9,'Hon. Roger G. Caramancion','Member',1,'2025-08-29 03:27:16','2025-08-29 03:27:16'),(42,9,'Hon. Airish Jann Marc D. Ballesteros','Member',1,'2025-08-29 03:27:16','2025-08-29 03:27:16'),(43,10,'Hon. Jervin P. Reyes','Chairman',1,'2025-08-29 04:43:05','2025-08-29 04:43:05'),(44,10,'Hon. Arland F. Ramos','Vice-Chairman',1,'2025-08-29 04:43:05','2025-08-29 04:43:05'),(45,10,'Hon. Irene U. Aggabao','Member',1,'2025-08-29 04:43:05','2025-08-29 04:43:05'),(46,10,'Hon. Cynthia C. Bangloy','Member',1,'2025-08-29 04:43:05','2025-08-29 04:43:05'),(47,10,'Hon. Mike Cesar C. Montano','Member',1,'2025-08-29 04:43:05','2025-08-29 04:43:05'),(48,11,'Hon. Jervin P. Reyes','Chairman',1,'2025-08-29 04:44:45','2025-08-29 04:44:45'),(49,11,'Hon. Airish Jann Marc D. Ballesteros','Vice-Chairman',1,'2025-08-29 04:44:45','2025-08-29 04:44:45'),(50,11,'Hon. John M. Sabiniano','Member',1,'2025-08-29 04:44:45','2025-08-29 04:44:45'),(51,11,'Hon. Mike Cesar C. Montano','Member',1,'2025-08-29 04:44:45','2025-08-29 04:44:45'),(52,11,'Hon. Arland F. Ramos','Member',1,'2025-08-29 04:44:45','2025-08-29 04:44:45'),(53,12,'Hon. Virginia B. Sy','Chairman',1,'2025-08-29 04:46:05','2025-08-29 04:46:05'),(54,12,'Hon. Irene U. Aggabao','Vice-Chairman',1,'2025-08-29 04:46:05','2025-08-29 04:46:05'),(55,12,'Hon. Cynthia C. Bangloy','Member',1,'2025-08-29 04:46:05','2025-08-29 04:46:05'),(56,12,'Hon. Suzette D. Sebastian','Member',1,'2025-08-29 04:46:05','2025-08-29 04:46:05'),(57,12,'Hon. Jervin P. Reyes','Member',1,'2025-08-29 04:46:05','2025-08-29 04:46:05'),(58,13,'Hon. Suzette D. Sebastian','Chairman',1,'2025-08-29 04:47:31','2025-08-29 04:47:31'),(59,13,'Hon. Arland F. Ramos','Vice-Chairman',1,'2025-08-29 04:47:31','2025-08-29 04:47:31'),(60,13,'Hon. Cynthia C. Bangloy','Member',1,'2025-08-29 04:47:31','2025-08-29 04:47:31'),(61,13,'Hon. John M. Sabiniano','Member',1,'2025-08-29 04:47:31','2025-08-29 04:47:31'),(62,13,'Hon. Airish Jann Marc D. Ballesteros','Member',1,'2025-08-29 04:47:31','2025-08-29 04:47:31'),(63,14,'Hon.  Suzette D. Sebastian','Chairman',1,'2025-08-29 04:49:09','2025-08-29 04:49:09'),(64,14,'Hon.  John M. Sabiniano','Vice-Chairman',1,'2025-08-29 04:49:09','2025-08-29 04:49:09'),(65,14,'Hon.  Virginia B. Sy','Member',1,'2025-08-29 04:49:09','2025-08-29 04:49:09'),(66,14,'Hon.  Jervin P. Reyes','Member',1,'2025-08-29 04:49:09','2025-08-29 04:49:09'),(67,14,'Hon.  Cynthia C. Bangloy','Member',1,'2025-08-29 04:49:09','2025-08-29 04:49:09'),(68,15,'Hon. Irene U. Aggabao','Chairman',1,'2025-08-29 04:50:54','2025-08-29 04:50:54'),(69,15,'Hon.  Virginia B. Sy','Vice-Chairman',1,'2025-08-29 04:50:54','2025-08-29 04:50:54'),(70,15,'Hon.  Cynthia C. Bangloy','Member',1,'2025-08-29 04:50:54','2025-08-29 04:50:54'),(71,15,'Hon.  Arland F. Ramos','Member',1,'2025-08-29 04:50:54','2025-08-29 04:50:54'),(72,15,'Hon.  Suzette D. Sebastian','Member',1,'2025-08-29 04:50:54','2025-08-29 04:50:54'),(73,16,'Hon. Roger G. Caramancion','Chairman',1,'2025-08-29 04:52:19','2025-08-29 04:52:19'),(74,16,'Hon. John M. Sabiniano','Vice-Chairman',1,'2025-08-29 04:52:19','2025-08-29 04:52:19'),(75,16,'Hon. Suzette D. Sebastian','Member',1,'2025-08-29 04:52:19','2025-08-29 04:52:19'),(76,16,'Hon. Mike Cesar C. Montano','Member',1,'2025-08-29 04:52:19','2025-08-29 04:52:19'),(77,16,'Hon. Airish Jann Marc D. Ballesteros','Member',1,'2025-08-29 04:52:19','2025-08-29 04:52:19'),(78,17,'Hon. Airish Jann Marc D. Ballesteros','Chairman',1,'2025-08-29 04:53:43','2025-08-29 04:53:43'),(79,17,'Hon. Mike Cesar C. Montano','Vice-Chairman',1,'2025-08-29 04:53:43','2025-08-29 04:53:43'),(80,17,'Hon. Suzette D. Sebastian','Member',1,'2025-08-29 04:53:43','2025-08-29 04:53:43'),(81,17,'Hon. Irene U. Aggabao','Member',1,'2025-08-29 04:53:43','2025-08-29 04:53:43'),(82,17,'Hon. Jervin P. Reyes','Member',1,'2025-08-29 04:53:43','2025-08-29 04:53:43'),(84,18,'Hon. Cynthia C. Bangloy','Chairman',1,'2025-08-29 04:55:16','2025-08-29 04:55:16'),(85,18,'Hon. Virginia B. Sy','Vice-Chairman',1,'2025-08-29 04:55:16','2025-08-29 04:55:16'),(86,18,'Hon. Jervin P. Reyes','Member',1,'2025-08-29 04:55:16','2025-08-29 04:55:16'),(87,18,'Hon.  Suzette D. Sebastian','Member',1,'2025-08-29 04:55:16','2025-08-29 04:55:16'),(88,18,'Hon. Roger G. Caramancion','Member',1,'2025-08-29 04:55:16','2025-08-29 04:55:16'),(89,19,'Hon. Arland F. Ramos','Chairman',1,'2025-08-29 05:11:15','2025-08-29 05:11:15'),(90,19,'Hon. Mike Cesar C. Montano','Vice-Chairman',1,'2025-08-29 05:11:15','2025-08-29 05:11:15'),(91,19,'Hon. Virginia B. Sy','Member',1,'2025-08-29 05:11:15','2025-08-29 05:11:15'),(92,19,'Hon. Roger G. Caramancion','Member',1,'2025-08-29 05:11:15','2025-08-29 05:11:15'),(93,19,'Hon. John M. Sabiniano','Member',1,'2025-08-29 05:11:15','2025-08-29 05:11:15'),(94,20,'Hon. Mike Cesar C. Montano','Chairman',1,'2025-08-29 05:12:34','2025-08-29 05:12:34'),(95,20,'Hon. Cynthia C. Bangloy','Vice-Chairman',1,'2025-08-29 05:12:34','2025-08-29 05:12:34'),(96,20,'Hon. Arland F. Ramos','Member',1,'2025-08-29 05:12:34','2025-08-29 05:12:34'),(97,20,'Hon. Roger G. Caramancion','Member',1,'2025-08-29 05:12:34','2025-08-29 05:12:34'),(98,20,'Hon. Airish Jann Marc D. Ballesteros','Member',1,'2025-08-29 05:12:34','2025-08-29 05:12:34'),(99,21,'Hon. Irene U. Aggabao','Chairman',1,'2025-08-29 05:13:56','2025-08-29 05:13:56'),(100,21,'Hon. Suzette D. Sebastian','Vice-Chairman',1,'2025-08-29 05:13:56','2025-08-29 05:13:56'),(101,21,'Hon. Virginia B. Sy','Member',1,'2025-08-29 05:13:56','2025-08-29 05:13:56'),(102,21,'Hon. Mike Cesar C. Montano','Member',1,'2025-08-29 05:13:56','2025-08-29 05:13:56'),(103,21,'Hon. Cynthia C. Bangloy','Member',1,'2025-08-29 05:13:56','2025-08-29 05:13:56');
/*!40000 ALTER TABLE `standing_comittee_member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin User','admin@gmail.com','2025-08-06 19:16:12','$2y$12$xd1lmc6INFLwLYOalxF6oe/VlAM2ES0qf2Id2NS0/FlfdvK56dc/6',NULL,'2025-08-06 19:16:12','2025-08-06 19:16:12');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-09-25  2:45:41
