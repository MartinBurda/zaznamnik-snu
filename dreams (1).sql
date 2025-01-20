-- Adminer 4.8.1 MySQL 8.0.33 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `dream_categories`;
CREATE TABLE `dream_categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `dream_categories` (`id`, `name`, `description`) VALUES
(1,	'Noční můra',	'Sny plné strachu a negativních emocí.'),
(2,	'Lucidní sen',	'Sny, ve kterých si uvědomujeme, že sníme.'),
(3,	'Kreativní sen',	'Sny, které inspirují nebo přinášejí nápady.'),
(4,	'Opakující se sen',	'Sny, které se často opakují.'),
(5,	'Symbolický sen',	'Sny plné skrytých symbolů a významů.');

DROP TABLE IF EXISTS `dreams`;
CREATE TABLE `dreams` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `category_id` int DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `dreams_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `dream_categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `dreams` (`id`, `name`, `description`, `category_id`, `created_at`) VALUES
(1,	'Pád z výšky',	'Zdálo se mi, že padám z obrovského útesu do neznáma.',	1,	'2025-01-20 13:03:01'),
(2,	'Let nad městem',	'Dokázal jsem létat a viděl své město z výšky.',	2,	'2025-01-20 13:03:01'),
(3,	'Nový hudební nápad',	'Vymyslel jsem krásnou melodii ve snu.',	3,	'2025-01-20 13:03:01'),
(4,	'Hledání pokladu',	'Sen, který se opakuje každý týden. Hledám poklad na ostrově.',	4,	'2025-01-20 13:03:01'),
(5,	'Cesta labyrintem',	'Procházel jsem labyrintem plným symbolů a obrazů.',	5,	'2025-01-20 13:03:01'),
(13,	'Pád do hluboké díry',	'V tomto snu jsem padal do nekonečné díry, která neměla žádné dno. Byl jsem bezmocný a nemohl jsem se zastavit.',	1,	'2025-01-20 13:04:57');

-- 2025-01-20 13:13:44
