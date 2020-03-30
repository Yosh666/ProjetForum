-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour forum
CREATE DATABASE IF NOT EXISTS `forum` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `forum`;

-- Listage de la structure de la table forum. message
CREATE TABLE IF NOT EXISTS `message` (
  `id_message` int(11) NOT NULL AUTO_INCREMENT,
  `texte` text COLLATE utf8_bin NOT NULL,
  `date_post` datetime NOT NULL,
  `sujet_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id_message`),
  KEY `sujet_id` (`sujet_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `sujet_id` FOREIGN KEY (`sujet_id`) REFERENCES `sujet` (`id_sujet`),
  CONSTRAINT `user_id2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Listage des données de la table forum.message : ~6 rows (environ)
/*!40000 ALTER TABLE `message` DISABLE KEYS */;
INSERT INTO `message` (`id_message`, `texte`, `date_post`, `sujet_id`, `user_id`) VALUES
	(1, 'non, flemme et puis #TeamPyjama', '2020-03-27 14:13:41', 1, 4),
	(2, 'oui mais toi tu es toujours dans la team Pyjama & nudités...', '2020-03-27 14:14:37', 1, 1),
	(3, 'j\'avoue...', '2020-03-27 14:15:02', 1, 4),
	(4, 'zepùrhjgnùzolbgùlz lùzfnbgvùzolnbrg oùlerngvoùéezrbgolienrgvùlzebr', '2020-03-27 14:15:44', 8, 7),
	(5, 'j\'en ai marre mais vraiment la ', '2020-03-27 14:16:20', 5, 1),
	(6, 'je veux des calins des bisous et un massage!', '2020-03-27 14:16:43', 5, 3);
/*!40000 ALTER TABLE `message` ENABLE KEYS */;

-- Listage de la structure de la table forum. sujet
CREATE TABLE IF NOT EXISTS `sujet` (
  `id_sujet` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(100) COLLATE utf8_bin NOT NULL,
  `date_publication` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id_sujet`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Listage des données de la table forum.sujet : ~8 rows (environ)
/*!40000 ALTER TABLE `sujet` DISABLE KEYS */;
INSERT INTO `sujet` (`id_sujet`, `titre`, `date_publication`, `user_id`) VALUES
	(1, 'Doit\'on mettre un slip en confinement?', '2020-03-27 13:40:16', 4),
	(2, 'A quelle heure se laver devient obligatoire?', '2020-03-27 13:40:55', 1),
	(3, 'Tuer ses enfants et un flamant rose est ce un crime?', '2020-03-27 13:44:45', 4),
	(4, 'Faire des pompes en web-cam sexy ou pas?', '2020-03-27 13:46:20', 2),
	(5, 'Dois je rompre le confinement pour un rougail saucisses?', '2020-03-27 13:47:34', 3),
	(6, 'Le pangolin est il fractal?', '2020-03-27 13:48:18', 6),
	(7, 'les zboubeurs ce fléau!', '2020-03-27 13:51:18', 4),
	(8, 'surveiller des confinés un vendredi aprem.....', '2020-03-27 13:59:38', 7);
/*!40000 ALTER TABLE `sujet` ENABLE KEYS */;

-- Listage de la structure de la table forum. user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(20) COLLATE utf8_bin NOT NULL,
  `mail` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(15) COLLATE utf8_bin NOT NULL,
  `date_inscription` datetime NOT NULL,
  `role` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Listage des données de la table forum.user : ~6 rows (environ)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id_user`, `pseudo`, `mail`, `password`, `date_inscription`, `role`) VALUES
	(1, 'Yosh', 'yoshisis@hotmail.com', '1234', '2020-03-27 13:30:44', 'admin'),
	(2, 'Sev', 'lajoggeuse@gmail.com', '1234', '2020-03-27 13:31:32', NULL),
	(3, 'Mel', 'ladirectrice@gmail.com', '1234', '2020-03-27 13:32:08', NULL),
	(4, 'Anne', 'supermilf@proton.com', '1234', '2020-03-27 13:32:47', NULL),
	(5, 'Jagg', 'badass@gmail.com', '1234', '2020-03-27 13:34:36', NULL),
	(6, 'Virgile', 'cssmapassion@caramail.fr', '1234', '2020-03-27 13:36:34', NULL),
	(7, 'Micka', 'ninjadelagestion@cia.com', '1234', '2020-03-27 13:37:12', NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
