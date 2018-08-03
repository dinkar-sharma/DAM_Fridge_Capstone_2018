-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.33-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5279
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for damfridge
CREATE DATABASE IF NOT EXISTS `damfridge` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `damfridge`;

-- Dumping structure for table damfridge.currentuser
CREATE TABLE IF NOT EXISTS `currentuser` (
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table damfridge.currentuser: ~1 rows (approximately)
/*!40000 ALTER TABLE `currentuser` DISABLE KEYS */;
INSERT INTO `currentuser` (`email`) VALUES
	('mikeakl@gmail.com');
/*!40000 ALTER TABLE `currentuser` ENABLE KEYS */;

-- Dumping structure for table damfridge.itemlist
CREATE TABLE IF NOT EXISTS `itemlist` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Email` varchar(50) NOT NULL,
  `Item` varchar(50) NOT NULL,
  `ItemPic` varchar(100) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `TStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=188 DEFAULT CHARSET=latin1;

-- Dumping data for table damfridge.itemlist: ~0 rows (approximately)
/*!40000 ALTER TABLE `itemlist` DISABLE KEYS */;
INSERT INTO `itemlist` (`ID`, `Email`, `Item`, `ItemPic`, `Quantity`, `TStamp`) VALUES
	(177, 'mikeakl@gmail.com', 'orange', '/mnt/nfs/image/done/image-2018-07-30 13:46:55.257125.png', 3, '2018-07-30 13:47:43'),
	(178, 'mikeakl@gmail.com', 'orange', '/mnt/nfs/image/done/image-2018-07-30 13:47:02.776071.png', 3, '2018-07-30 13:47:50'),
	(179, 'mikeakl@gmail.com', 'apple', '/mnt/nfs/image/done/image-2018-07-30 13:47:53.866426.png', 1, '2018-07-30 13:48:41'),
	(180, 'mikeakl@gmail.com', 'orange', '/mnt/nfs/image/done/image-2018-07-30 13:48:59.929927.png', 1, '2018-07-30 13:49:48'),
	(181, 'mikeakl@gmail.com', 'banana', '/mnt/nfs/image/done/image-2018-07-30 13:49:33.349340.png', 1, '2018-07-30 13:50:21'),
	(182, 'mikeakl@gmail.com', 'banana', '/mnt/nfs/image/done/image-2018-07-30 13:49:40.372976.png', 1, '2018-07-30 13:50:28'),
	(183, 'mikeakl@gmail.com', 'banana', '/mnt/nfs/image/done/image-2018-07-30 13:50:19.620861.png', 1, '2018-07-30 13:51:07'),
	(184, 'mikeakl@gmail.com', 'apple', '/mnt/nfs/image/done/image-2018-07-30 13:50:47.640704.png', 1, '2018-07-30 13:51:35'),
	(185, 'mikeakl@gmail.com', 'apple', '/mnt/nfs/image/done/image-2018-07-30 13:51:49.097325.png', 1, '2018-07-30 13:52:36'),
	(186, 'mikeakl@gmail.com', 'apple', '/mnt/nfs/image/done/image-2018-07-30 13:59:12.969864.png', 1, '2018-07-30 14:00:00'),
	(187, 'mikeakl@gmail.com', 'orange', '/mnt/nfs/image/done/image-2018-07-30 13:59:47.001450.png', 1, '2018-07-30 14:00:34');
/*!40000 ALTER TABLE `itemlist` ENABLE KEYS */;

-- Dumping structure for table damfridge.log
CREATE TABLE IF NOT EXISTS `log` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Event` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table damfridge.log: ~0 rows (approximately)
/*!40000 ALTER TABLE `log` DISABLE KEYS */;
/*!40000 ALTER TABLE `log` ENABLE KEYS */;

-- Dumping structure for table damfridge.users
CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table damfridge.users: ~8 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`ID`, `Username`, `Password`, `Email`) VALUES
	(1, 'Anas1', '123', 'adssada@asda.com'),
	(3, 'Anas', 'asda', 'anasyasen1@hotmail.com'),
	(4, 'Anas', '123', 'anasyassin485@gmail.com'),
	(5, 'Anas', '456', 'anasyaswwwween1@hotmail.com'),
	(6, 'dinkar sharma', '123', 'dinkarsharma96@gmail.com'),
	(7, 'makl', '123abc', 'mikeakl@gmail.com'),
	(8, 'Mike', '456', 'mikeG@gmail.com'),
	(9, 'Anas', '123abcd', 'anasyaseen1@hotmail.com');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
