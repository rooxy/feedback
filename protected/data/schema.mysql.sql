SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `feedback` DEFAULT CHARACTER SET utf8 ;
USE `feedback` ;

-- -----------------------------------------------------
-- Table `feedback`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `feedback`.`user` ;

CREATE  TABLE IF NOT EXISTS `feedback`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `login` VARCHAR(128) NOT NULL ,
  `password` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `login_UNIQUE` (`login` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `feedback`.`team`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `feedback`.`team` ;

CREATE  TABLE IF NOT EXISTS `feedback`.`team` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `title` VARCHAR(128) NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `title_UNIQUE` (`title` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `feedback`.`membership`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `feedback`.`membership` ;

CREATE  TABLE IF NOT EXISTS `feedback`.`membership` (
  `user` INT NOT NULL ,
  `team` INT NOT NULL ,
  PRIMARY KEY (`user`, `team`) ,
  INDEX `fk_membership_team` (`team` ASC) ,
  INDEX `fk_membership_user` (`user` ASC) ,
  CONSTRAINT `fk_membership_user`
    FOREIGN KEY (`user` )
    REFERENCES `feedback`.`user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_membership_team`
    FOREIGN KEY (`team` )
    REFERENCES `feedback`.`team` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `feedback`.`surveytype`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `feedback`.`surveytype` ;

CREATE  TABLE IF NOT EXISTS `feedback`.`surveytype` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `title` VARCHAR(128) NOT NULL ,
  `defaultDaysToAnswer` INT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `title_UNIQUE` (`title` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `feedback`.`topic`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `feedback`.`topic` ;

CREATE  TABLE IF NOT EXISTS `feedback`.`topic` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `surveytype` INT NOT NULL ,
  `title` VARCHAR(128) NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_topic_surveytype` (`surveytype` ASC) ,
  CONSTRAINT `fk_topic_surveytype`
    FOREIGN KEY (`surveytype` )
    REFERENCES `feedback`.`surveytype` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `feedback`.`survey`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `feedback`.`survey` ;

CREATE  TABLE IF NOT EXISTS `feedback`.`survey` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `title` VARCHAR(128) NULL ,
  `deadline` DATE NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `feedback`.`covering`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `feedback`.`covering` ;

CREATE  TABLE IF NOT EXISTS `feedback`.`covering` (
  `survey` INT NOT NULL ,
  `topic` INT NOT NULL ,
  PRIMARY KEY (`survey`, `topic`) ,
  INDEX `fk_covering_topic` (`topic` ASC) ,
  INDEX `fk_covering_survey` (`survey` ASC) ,
  CONSTRAINT `fk_survey_has_topic_survey1`
    FOREIGN KEY (`survey` )
    REFERENCES `feedback`.`survey` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_survey_has_topic_topic1`
    FOREIGN KEY (`topic` )
    REFERENCES `feedback`.`topic` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `feedback`.`opinion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `feedback`.`opinion` ;

CREATE  TABLE IF NOT EXISTS `feedback`.`opinion` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `user` INT NOT NULL ,
  `topic` INT NOT NULL ,
  `text` VARCHAR(500) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_opinion_user` (`user` ASC) ,
  INDEX `fk_opinion_topic` (`topic` ASC) ,
  CONSTRAINT `fk_opinion_user`
    FOREIGN KEY (`user` )
    REFERENCES `feedback`.`user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_opinion_topic`
    FOREIGN KEY (`topic` )
    REFERENCES `feedback`.`topic` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
