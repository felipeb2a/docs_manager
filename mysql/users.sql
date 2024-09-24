CREATE DATABASE  IF NOT EXISTS `docs` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `docs`;

CREATE TABLE `users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NULL,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `isActive` TINYINT(1) NOT NULL,
  `isAdmin` TINYINT(1) NOT NULL,
  `createdAt` DATETIME NULL,
  `updatedAt` DATETIME NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) VISIBLE);

INSERT INTO `users` (`name`, `email`, `password`, `isActive`, `isAdmin`, `createdAt`, `updatedAt`) VALUES ('Admin', 'admin@admin.com.br', '$2y$10$6fr1MIwgD/v0yr8SPHxUR.H0o9r8skBGwoSHcn6iCadZ6psijIQcC', '1', '1', '2023-11-10 10:41:11', '2023-11-10 10:41:11');
