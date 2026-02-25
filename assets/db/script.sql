SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `darcomplaintsdb` ;
CREATE SCHEMA IF NOT EXISTS `darcomplaintsdb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `darcomplaintsdb` ;

-- -----------------------------------------------------
-- Table `darcomplaintsdb`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `darcomplaintsdb`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `fullname` VARCHAR(100) NOT NULL,
  `firstname` VARCHAR(45) NOT NULL,
  `lastname` VARCHAR(45) NOT NULL,
  `mi` CHAR(1) NULL,
  `phone` VARCHAR(10) NULL,
  `email` VARCHAR(60) NULL,
  `username` VARCHAR(15) NOT NULL,
  `passw` VARCHAR(128) NOT NULL,
  `gender` TINYINT(1) NOT NULL DEFAULT 1,
  `user_type` TINYINT(1) NOT NULL DEFAULT 1 COMMENT '1=ADMIN, 2=STAFF, 3=GUEST',
  `profile_url` VARCHAR(200) NOT NULL,
  `is_logged_in` TINYINT(1) NULL DEFAULT 0,
  `session_id` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `darcomplaintsdb`.`announcements`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `darcomplaintsdb`.`announcements` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `publish_date` DATETIME NOT NULL,
  `title` VARCHAR(100) NOT NULL,
  `content` VARCHAR(5000) NOT NULL,
  `announcement_type` TINYINT NOT NULL COMMENT '1=ALL, 2=SCHOLARS, 3=OFFICES',
  `posted_by` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `darcomplaintsdb`.`attachments`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `darcomplaintsdb`.`attachments` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `owner_id` INT NOT NULL,
  `file_url` VARCHAR(200) NOT NULL,
  `attachment_type` SMALLINT(1) NOT NULL COMMENT '1=ANNOUNCEMENT, 2=COMPLAINTS',
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `darcomplaintsdb`.`notifications`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `darcomplaintsdb`.`notifications` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `owner_id` INT NOT NULL,
  `noti_date` DATETIME NOT NULL,
  `title` VARCHAR(45) NOT NULL,
  `message` VARCHAR(200) NULL,
  `noti_for` TINYINT(1) NOT NULL COMMENT '0=SPECIFIC USER, 1=ALL, 2=STUDENTS ONLY, 3=SUP ONLY, 4=SUP & STUDENTS, 5=SUP & ADMINS, 6=ADMINS & STUDENTS',
  `notified_by` INT NOT NULL,
  `noti_type` TINYINT(1) NOT NULL COMMENT '1=ANNOUNCEMENT, 2=LETTER, 3=EVALUATIONS',
  `profiles_id` INT NOT NULL DEFAULT 0 COMMENT 'IF NOTIFICATION IS FOR SPECIFIC USER',
  `is_read` TINYINT NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `darcomplaintsdb`.`complaints`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `darcomplaintsdb`.`complaints` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `control_no` VARCHAR(45) NOT NULL,
  `complaint_date` DATE NOT NULL,
  `user_id` INT NOT NULL DEFAULT 0,
  `fullname` VARCHAR(100) NOT NULL,
  `address` VARCHAR(200) NOT NULL,
  `phone1` VARCHAR(10) NOT NULL,
  `email` VARCHAR(60) NOT NULL,
  `id_no` VARCHAR(45) NULL,
  `concerns` LONGTEXT NOT NULL,
  `status` TINYINT(1) NOT NULL COMMENT '0=PENDING, 1=IN PROGRESS, 2=RESOLVED, 3=REJECTED',
  `addressed_date` DATETIME NULL,
  `addressed_by` VARCHAR(100) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `darcomplaintsdb`.`feedbacks`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `darcomplaintsdb`.`feedbacks` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `lang` VARCHAR(45) NOT NULL DEFAULT 'english',
  `client_type` TINYINT NOT NULL COMMENT '1=CITIZEN, 2=STUDENT, 3=GOVT, 4=FARMER, 5=LANDOWNER, 6=OTHER',
  `client_type_other` VARCHAR(45) NULL,
  `age_group` TINYINT NOT NULL COMMENT '1=<30, 2=31-40, 3=41-50, 4=51-60, 5=>51',
  `feedback_date` DATE NOT NULL,
  `sex` TINYINT NOT NULL COMMENT '1=MALE, 2=FEMALE',
  `region` VARCHAR(45) NULL,
  `service_availed` VARCHAR(60) NULL,
  `time_in` VARCHAR(10) NULL,
  `time_out` VARCHAR(10) NULL,
  `cc1` TINYINT NOT NULL,
  `cc2` TINYINT NULL,
  `cc3` TINYINT NULL,
  `sqd0` TINYINT NULL,
  `sqd1` TINYINT NULL,
  `sqd2` TINYINT NULL,
  `sqd3` TINYINT NULL,
  `sqd4` TINYINT NULL,
  `sqd5` TINYINT NULL,
  `sqd6` TINYINT NULL,
  `sqd7` TINYINT NULL,
  `sqd8` TINYINT NULL,
  `suggestions` TEXT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `darcomplaintsdb`.`users`
-- -----------------------------------------------------
START TRANSACTION;
USE `darcomplaintsdb`;
INSERT INTO `darcomplaintsdb`.`users` (`id`, `fullname`, `firstname`, `lastname`, `mi`, `phone`, `email`, `username`, `passw`, `gender`, `user_type`, `profile_url`, `is_logged_in`, `session_id`) VALUES (1, 'Admin X. One', 'Admin', 'One', 'X', NULL, NULL, 'admin1', 'admin1', 2, 1, 'assets/img/profiles/female-1.jpg', NULL, NULL);

COMMIT;

