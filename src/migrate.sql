-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for microblog
CREATE DATABASE IF NOT EXISTS `microblog` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `microblog`;

-- Dumping structure for table microblog.posts
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `user_id` int(6) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(85) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table microblog.posts: ~8 rows (approximately)
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` (`id`, `user_id`, `title`, `text`, `image`, `created_at`) VALUES
	(10, 1, 'Telescopes and space', 'A telescope is a device used to observe distant objects by their emission, absorption, or reflection of electromagnetic radiation.[1] Originally meaning only an optical instrument using lenses, curved mirrors, or a combination of both to observe distant objects, the word telescope now refers to a wide range of instruments capable of detecting different regions of the electromagnetic spectrum, and in some cases other types of detectors.\n\nHoysaleshwara Temple, Halebidu, Karnataka you will be astounded by many of the carvings. One such carving is of a person holding a gadget to the eye & looking skywards which means they had a device for looking at the sky. The carvings [[1]] in a 900 years old.\n\nThe first known practical telescopes were refracting telescopes with glass lenses and were invented in the Netherlands at the beginning of the 17th century. They were used for both terrestrial applications and astronomy.\n\nThe reflecting telescope, which uses mirrors to collect and focus light, was invented within a few decades of the first refracting telescope.\n\nIn the 20th century, many new types of telescopes were invented, including radio telescopes in the 1930s and infrared telescopes in the 1960s.\n\nThe reflecting telescope, which uses mirrors to collect and focus light, was invented within a few decades of the first refracting telescope.', 'VrGdbTk.jpeg', '2022-11-18 14:39:52'),
	(11, 1, 'NASA and space exploration', 'The idea of sending humans to Mars has been the subject of aerospace engineering and scientific studies since the late 1940s as part of the broader exploration of Mars. Some have also considered exploring the Martian moons of Phobos and Deimos.[1] Long-term proposals have included sending settlers and terraforming the planet. Proposals for human missions to Mars came from e.g. NASA, Russia, Boeing, and SpaceX. As of 2022, only robotic landers and rovers have been on Mars. The farthest humans have been beyond Earth is the Moon.\n\nConceptual proposals for missions that would involve human explorers started in the early 1950s, with planned missions typically being stated as taking place between 10 and 30 years from the time they are drafted.[2] The list of crewed Mars mission plans shows the various mission proposals that have been put forth by multiple organizations and space agencies in this field of space exploration. The plans for these crews have varied—from scientific expeditions, in which a small group (between two and eight astronauts) would visit Mars for a period of a few weeks or more, to a continuous presence (e.g. through research stations, colonization, or other continuous habitation).[citation needed] By 2020, virtual visits to Mars, using haptic technologies, had also been proposed.', 'vFWQe5p.jpeg', '2022-11-18 14:41:29');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;

-- Dumping structure for table microblog.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `email` varchar(86) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(85) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(85) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table microblog.users: ~1 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `email`, `password`, `name`, `created_at`) VALUES
	(3, 'pesho@abv.bg', '$2y$10$HQQg83DxOk83y4N871A27.t349M3pq4o7x6e6aYVd35T2PpnFYN5i', 'Peter', '2022-11-30 15:38:28');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
