-- --------------------------------------------------------
-- Хост:                         192.168.30.223
-- Версия сервера:               10.5.10-MariaDB-log - Source distribution
-- Операционная система:         Linux
-- HeidiSQL Версия:              11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Дамп структуры базы данных bid
CREATE DATABASE IF NOT EXISTS `bid` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `bid`;

-- Дамп структуры для таблица bid.catalog
DROP TABLE IF EXISTS `catalog`;
CREATE TABLE IF NOT EXISTS `catalog` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `id_parent` int(10) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы bid.catalog: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `catalog` DISABLE KEYS */;
INSERT INTO `catalog` (`id`, `name`, `id_parent`) VALUES
	(1, 'уровень 1', 0),
	(2, 'уровень 2', 0),
	(3, 'уровень 3', 0),
	(4, 'под уровень 1_1', 1),
	(5, 'под уровень 1_2', 1),
	(6, 'под уровень 2_1', 2),
	(7, 'под уровень 3_1', 3),
	(8, 'под уровень 3_1_1', 7),
	(9, 'под уровень 3_1_2', 7),
	(10, 'под уровень 3_2', 3),
	(11, 'под уровень 3_3', 3),
	(12, 'под 1_3', 1),
	(13, 'под 1_3_1', 12),
	(14, 'уроывень 4', 0),
	(15, 'под 4_1', 14),
	(16, 'gjl 3_4', 3);
/*!40000 ALTER TABLE `catalog` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
