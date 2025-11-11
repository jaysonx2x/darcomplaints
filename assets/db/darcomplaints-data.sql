-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.11-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for darcomplaintsdb
CREATE DATABASE IF NOT EXISTS `darcomplaintsdb` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `darcomplaintsdb`;

-- Dumping structure for table darcomplaintsdb.announcements
CREATE TABLE IF NOT EXISTS `announcements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `publish_date` datetime NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` varchar(5000) NOT NULL,
  `announcement_type` tinyint(4) NOT NULL COMMENT '1=ALL, 2=SCHOLARS, 3=OFFICES',
  `posted_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table darcomplaintsdb.announcements: ~0 rows (approximately)
INSERT INTO `announcements` (`id`, `publish_date`, `title`, `content`, `announcement_type`, `posted_by`) VALUES
	(1, '2025-10-13 15:16:36', 'FOR ALL', 'FOR ALL FOR ALL FOR ALL\n\nFOR ALL\n\nFOR ALLFOR ALL FOR ALL FOR ALL FOR ALL\n\nFOR ALL\nFOR ALLFOR ALL\nFOR ALL', 1, 1);

-- Dumping structure for table darcomplaintsdb.attachments
CREATE TABLE IF NOT EXISTS `attachments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `owner_id` int(11) NOT NULL,
  `file_url` varchar(200) NOT NULL,
  `attachment_type` smallint(1) NOT NULL COMMENT '1=ANNOUNCEMENT, 2=COMPLAINTS',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table darcomplaintsdb.attachments: ~2 rows (approximately)
INSERT INTO `attachments` (`id`, `owner_id`, `file_url`, `attachment_type`) VALUES
	(1, 1, 'assets/uploads/attachments/2/20251013151635998.jpg', 1),
	(2, 1, 'assets/uploads/attachments/2/20251013151635320.jpg', 1);

-- Dumping structure for table darcomplaintsdb.complaints
CREATE TABLE IF NOT EXISTS `complaints` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `control_no` varchar(45) NOT NULL,
  `complaint_date` date NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `fullname` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone1` varchar(10) NOT NULL,
  `email` varchar(60) NOT NULL,
  `id_no` varchar(60) NOT NULL,
  `concerns` longtext NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0=PENDING, 1=IN PROGRESS, 2=RESOLVED, 3=REJECTED',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table darcomplaintsdb.complaints: ~5 rows (approximately)
INSERT INTO `complaints` (`id`, `control_no`, `complaint_date`, `user_id`, `fullname`, `address`, `phone1`, `email`, `id_no`, `concerns`, `status`) VALUES
	(2, '202510-4169', '2025-10-10', 0, 'Jacq Dimasuhid', '1540 E Dundee Rd Suite 110', '9839748327', 'onestudent@gmail.com', '111-111111', 'sa sad sadsa\r\na sdsa d\r\n\r\n asdsadsa\r\n\r\n asdsada d   asd saddsa', 0),
	(4, '202510-5245', '2025-10-13', 0, 'sa dasd asdsa', 'sadsa', '4353554354', 'asdsads@gmail.com', '324244343', 'sad saddsasasadsadsa', 0),
	(5, '202510-1569', '2025-10-13', 0, 'as dsadsad', 'asdsadas', '3424343243', 'asdsads@gmail.com', 'sadsadsa', 'asd adsadssa', 0),
	(6, '202510-7442', '2025-10-13', 0, 'as dsaddsa', 'asd sadssad', '3244324343', 'jjuid@dagg.com', '3243243432', 'sad sada sad sada dsdsa', 0),
	(7, '202510-5661', '2025-10-13', 0, 'asdsad', '3432432432432', '3233432432', 'asdsads@gmail.com', 'sadsadssa', 'saasd asd dsa dsadsa', 0);

-- Dumping structure for table darcomplaintsdb.feedbacks
CREATE TABLE IF NOT EXISTS `feedbacks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lang` varchar(50) NOT NULL DEFAULT 'english',
  `client_type` tinyint(4) NOT NULL COMMENT '1=CITIZEN, 2=STUDENT, 3=GOVT, 4=FARMER, 5=LANDOWNER, 6=OTHER',
  `client_type_other` varchar(45) DEFAULT NULL,
  `age_group` tinyint(4) NOT NULL COMMENT '1=<30, 2=31-40, 3=41-50, 4=51-60, 5=>51',
  `feedback_date` date NOT NULL,
  `sex` tinyint(4) NOT NULL COMMENT '1=MALE, 2=FEMALE',
  `region` varchar(45) DEFAULT NULL,
  `service_availed` varchar(60) DEFAULT NULL,
  `time_in` varchar(10) DEFAULT NULL,
  `time_out` varchar(10) DEFAULT NULL,
  `cc1` tinyint(4) NOT NULL,
  `cc2` tinyint(4) DEFAULT NULL,
  `cc3` tinyint(4) DEFAULT NULL,
  `sqd0` tinyint(4) DEFAULT NULL,
  `sqd1` tinyint(4) DEFAULT NULL,
  `sqd2` tinyint(4) DEFAULT NULL,
  `sqd3` tinyint(4) DEFAULT NULL,
  `sqd4` tinyint(4) DEFAULT NULL,
  `sqd5` tinyint(4) DEFAULT NULL,
  `sqd6` tinyint(4) DEFAULT NULL,
  `sqd7` tinyint(4) DEFAULT NULL,
  `sqd8` tinyint(4) DEFAULT NULL,
  `suggestions` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table darcomplaintsdb.feedbacks: ~2 rows (approximately)
INSERT INTO `feedbacks` (`id`, `lang`, `client_type`, `client_type_other`, `age_group`, `feedback_date`, `sex`, `region`, `service_availed`, `time_in`, `time_out`, `cc1`, `cc2`, `cc3`, `sqd0`, `sqd1`, `sqd2`, `sqd3`, `sqd4`, `sqd5`, `sqd6`, `sqd7`, `sqd8`, `suggestions`) VALUES
	(6, 'tagalog', 1, NULL, 2, '2025-11-11', 1, 'Rehiyon (Region of Concern):', 'Uri ng transaksyon o serbisyo', '10:00 AM', '11:00 AM', 1, 1, 1, 5, 4, 3, 2, 1, 2, 3, 4, 5, 'Mga suhestiyon kung paano pa mapabubuti ang aming serbisyo (opsyonal): Mga suhestiyon kung paano pa mapabubuti ang aming serbisyo (opsyonal): Mga suhestiyon kung paano pa mapabubuti ang aming serbisyo (opsyonal): Mga suhestiyon kung paano pa mapabubuti ang aming serbisyo (opsyonal):\r\n\r\nMga suhestiyon kung paano pa mapabubuti ang aming serbisyo (opsyonal): Mga suhestiyon kung paano pa mapabubuti ang aming serbisyo (opsyonal): Mga suhestiyon kung paano pa mapabubuti ang aming serbisyo (opsyonal): Mga suhestiyon kung paano pa mapabubuti ang aming serbisyo (opsyonal): Mga suhestiyon kung paano pa mapabubuti ang aming serbisyo (opsyonal): Mga suhestiyon kung paano pa mapabubuti ang aming serbisyo (opsyonal): Mga suhestiyon kung paano pa mapabubuti ang aming serbisyo (opsyonal):'),
	(7, 'english', 2, NULL, 3, '2025-11-11', 2, 'Region', 'Service Availed: *', '09:00 AM', '10:00 PM', 2, 2, 2, 1, 2, 3, 4, 5, 6, 5, 4, 3, 'Suggestions on how we can further improve our services (optional): Suggestions on how we can further improve our services (optional): Suggestions on how we can further improve our services (optional): Suggestions on how we can further improve our services (optional):\r\n\r\nSuggestions on how we can further improve our services (optional): Suggestions on how we can further improve our services (optional): Suggestions on how we can further improve our services (optional):');

-- Dumping structure for table darcomplaintsdb.notifications
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `owner_id` int(11) NOT NULL,
  `noti_date` datetime NOT NULL,
  `title` varchar(45) NOT NULL,
  `message` varchar(200) DEFAULT NULL,
  `noti_for` tinyint(1) NOT NULL COMMENT '0=SPECIFIC USER, 1=ALL, 2=STUDENTS ONLY, 3=SUP ONLY, 4=SUP & STUDENTS, 5=SUP & ADMINS, 6=ADMINS & STUDENTS',
  `notified_by` int(11) NOT NULL,
  `noti_type` tinyint(1) NOT NULL COMMENT '1=ANNOUNCEMENT, 2=LETTER, 3=EVALUATIONS',
  `profiles_id` int(11) NOT NULL DEFAULT 0 COMMENT 'IF NOTIFICATION IS FOR SPECIFIC USER',
  `is_read` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table darcomplaintsdb.notifications: ~0 rows (approximately)
INSERT INTO `notifications` (`id`, `owner_id`, `noti_date`, `title`, `message`, `noti_for`, `notified_by`, `noti_type`, `profiles_id`, `is_read`) VALUES
	(1, 1, '2025-10-13 15:16:36', 'New Announcement', 'FOR ALL - FOR ALL FOR ALL FOR ALL\n\nFOR ALL\n\nFOR ALLFOR ALL FOR ALL FOR ALL FOR ALL\n\nFOR ALL\nFOR ALLFOR ALL\nFOR ALL', 1, 1, 1, 0, 0);

-- Dumping structure for table darcomplaintsdb.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `mi` char(1) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `username` varchar(15) NOT NULL,
  `passw` varchar(128) NOT NULL,
  `gender` tinyint(1) NOT NULL DEFAULT 1,
  `user_type` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=ADMIN, 2=STAFF, 3=GUEST',
  `profile_url` varchar(200) NOT NULL,
  `is_logged_in` tinyint(1) DEFAULT 0,
  `session_id` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table darcomplaintsdb.users: ~0 rows (approximately)
INSERT INTO `users` (`id`, `fullname`, `firstname`, `lastname`, `mi`, `phone`, `email`, `username`, `passw`, `gender`, `user_type`, `profile_url`, `is_logged_in`, `session_id`) VALUES
	(1, 'ADMIN X. ONE', 'Admin', 'One', 'X', '3232432432', 'asdsads@gmail.com', 'admin1', 'admin1', 2, 1, 'assets/uploads/avatars68ecaf24b6a70.png', 1, 'sl9utlcff99gll05ftipksbqntl8b8s0');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
