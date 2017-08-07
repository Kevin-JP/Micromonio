-- MySQL Script generated by MySQL Workbench
-- 05/04/17 15:34:25
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema micromonio
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema micromonio
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `micromonio` DEFAULT CHARACTER SET utf8 ;
USE `micromonio` ;

-- -----------------------------------------------------
-- Table `micromonio`.`console`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `micromonio`.`console` (
  `con_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `con_name` VARCHAR(64) NULL,
  `con_inserted` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`con_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `micromonio`.`genre`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `micromonio`.`genre` (
  `gen_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `gen_name` VARCHAR(64) NULL,
  `gen_inserted` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`gen_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `micromonio`.`videogame`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `micromonio`.`videogame` (
  `vid_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `vid_name` VARCHAR(128) NOT NULL COMMENT '\'Nom du jeu vidéo\'',
  `vid_year` YEAR NOT NULL COMMENT '\'Année de sorite du jeu vidéo\'',
  `vid_editor` VARCHAR(64) NOT NULL COMMENT '\'Editeur/Distributeur du jeu vidéo\'',
  `vid_image` VARCHAR(128) NOT NULL COMMENT 'URL (site externe) ou fichier uploadé sur le serveur local',
  `vid_inserted` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  `console_con_id` INT UNSIGNED NOT NULL,
  `genre_gen_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`vid_id`),
  INDEX `fk_videogame_console_idx` (`console_con_id` ASC),
  INDEX `fk_videogame_genre1_idx` (`genre_gen_id` ASC))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `micromonio`.`console`
-- -----------------------------------------------------
START TRANSACTION;
USE `micromonio`;
INSERT INTO `micromonio`.`console` (`con_id`, `con_name`, `con_inserted`) VALUES (1, 'Gameboy', NULL);
INSERT INTO `micromonio`.`console` (`con_id`, `con_name`, `con_inserted`) VALUES (2, 'NES', NULL);
INSERT INTO `micromonio`.`console` (`con_id`, `con_name`, `con_inserted`) VALUES (3, 'SNES', NULL);
INSERT INTO `micromonio`.`console` (`con_id`, `con_name`, `con_inserted`) VALUES (4, 'MegaDrive', NULL);
INSERT INTO `micromonio`.`console` (`con_id`, `con_name`, `con_inserted`) VALUES (5, 'Playstation', NULL);
INSERT INTO `micromonio`.`console` (`con_id`, `con_name`, `con_inserted`) VALUES (6, 'PC', NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `micromonio`.`genre`
-- -----------------------------------------------------
START TRANSACTION;
USE `micromonio`;
INSERT INTO `micromonio`.`genre` (`gen_id`, `gen_name`, `gen_inserted`) VALUES (1, 'Aventure', NULL);
INSERT INTO `micromonio`.`genre` (`gen_id`, `gen_name`, `gen_inserted`) VALUES (2, 'Simulation', NULL);
INSERT INTO `micromonio`.`genre` (`gen_id`, `gen_name`, `gen_inserted`) VALUES (3, 'Sport', NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `micromonio`.`videogame`
-- -----------------------------------------------------
START TRANSACTION;
USE `micromonio`;
INSERT INTO `micromonio`.`videogame` (`vid_id`, `vid_name`, `vid_year`, `vid_editor`, `vid_image`, `vid_inserted`, `console_con_id`, `genre_gen_id`) VALUES (1, 'Day of the tentacle', 1993, 'LucasArts', 'https://upload.wikimedia.org/wikipedia/en/7/79/Day_of_the_Tentacle_artwork.jpg', DEFAULT, 6, 1);
INSERT INTO `micromonio`.`videogame` (`vid_id`, `vid_name`, `vid_year`, `vid_editor`, `vid_image`, `vid_inserted`, `console_con_id`, `genre_gen_id`) VALUES (2, 'Theme Hospital', 1997, 'Bullfrog', 'https://upload.wikimedia.org/wikipedia/en/2/26/Theme_Hospital.front_cover.jpg', DEFAULT, 6, 2);
INSERT INTO `micromonio`.`videogame` (`vid_id`, `vid_name`, `vid_year`, `vid_editor`, `vid_image`, `vid_inserted`, `console_con_id`, `genre_gen_id`) VALUES (3, 'NBA Jam', 1993, 'Midway', 'https://upload.wikimedia.org/wikipedia/en/a/a0/Nbajam.jpg', DEFAULT, 4, 3);

COMMIT;

