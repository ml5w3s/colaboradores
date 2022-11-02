SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE database versati1_projeto;
use versati1_projeto;

CREATE TABLE IF NOT EXISTS `usuarios` (
  `usuario` VARCHAR(45) NOT NULL COMMENT '',
  `senha` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`usuario`)  COMMENT '')
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `area_atuacao` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `descricao` VARCHAR(255) NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '')
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `tempo_experiencia` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `descricao` VARCHAR(255) NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '')
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `cargo` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `descricao` VARCHAR(255) NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '')
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `capital` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `descricao` VARCHAR(255) NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '')
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `contatos` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `nome` VARCHAR(45) NOT NULL COMMENT '',
  `telefone` VARCHAR(45) NOT NULL COMMENT '',
  `email` VARCHAR(45) NOT NULL COMMENT '',
  `comentario` TEXT NOT NULL COMMENT '',
  `area_atuacao_id` INT NOT NULL COMMENT '',
  `tempo_experiencia_id` INT NOT NULL COMMENT '',
  `cargo_id` INT NOT NULL COMMENT '',
  `capital_id` INT NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  CONSTRAINT `fk_contatos_area_atuacao`
    FOREIGN KEY (`area_atuacao_id`)
    REFERENCES `area_atuacao` (`id`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT,
  CONSTRAINT `fk_contatos_tempo_experiencia1`
    FOREIGN KEY (`tempo_experiencia_id`)
    REFERENCES `tempo_experiencia` (`id`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT,
  CONSTRAINT `fk_contatos_cargo1`
    FOREIGN KEY (`cargo_id`)
    REFERENCES `cargo` (`id`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT,
  CONSTRAINT `fk_contatos_capital1`
    FOREIGN KEY (`capital_id`)
    REFERENCES `capital` (`id`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT)
ENGINE = InnoDB;

CREATE INDEX `fk_contatos_area_atuacao_idx` ON `contatos` (`area_atuacao_id` ASC)  COMMENT '';

CREATE INDEX `fk_contatos_tempo_experiencia1_idx` ON `contatos` (`tempo_experiencia_id` ASC)  COMMENT '';

CREATE INDEX `fk_contatos_cargo1_idx` ON `contatos` (`cargo_id` ASC)  COMMENT '';

CREATE INDEX `fk_contatos_capital1_idx` ON `contatos` (`capital_id` ASC)  COMMENT '';


INSERT INTO `area_atuacao`(`descricao`) VALUES('Design'),('Programador'),('Analista de Banco de Dados'),('Help desk');

INSERT INTO `tempo_experiencia`(`descricao`) VALUES('Sem experiência'),('1 ano ou menos'),('1 a 3 anos.'),('3 a 5 anos'), ('5 a 7 anos'), ('7 anos ou mais.');

INSERT INTO `cargo`(`descricao`) VALUES('Trainee'),('Operacional'),('Supervisor'),('Gerente'), ('Estagiário');

INSERT INTO `capital`(`descricao`) VALUES('Brasília'),('São Paulo'),('Rio de Janeiro'),('Goiás');

INSERT INTO `usuarios` (`usuario`, `senha`) VALUES('demo@versatildf.com.br', '#SouVersatil2022');

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
