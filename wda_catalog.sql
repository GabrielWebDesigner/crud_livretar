CREATE DATABASE IF NOT EXISTS `wda_catalog` 
DEFAULT CHARACTER SET utf8mb4 
COLLATE utf8mb4_general_ci;

USE `wda_catalog`;

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(100) NOT NULL,
  `cpf_cnpj` varchar(14) NOT NULL,
  `birthdate` datetime NOT NULL,
  `address` varchar(255) NOT NULL,
  `hood` varchar(100) NOT NULL,
  `zip_code` varchar(8) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(2) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `ie` varchar(15) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `customers` (`name`, `cpf_cnpj`, `birthdate`, `address`, `hood`, `zip_code`, `city`, `state`, `phone`, `ie`, `created`, `modified`) 
VALUES
('Gabriel Rodrigues Neto', '44444444000', '2024-09-03 00:00:00', 'Antenor Maciel', 'Jardim Montreal', '18071410', 'Sorocaba', 'SP', '15991422976', '351234567', '2024-09-16 20:16:16', '2024-09-16 20:16:16');

CREATE TABLE IF NOT EXISTS `livros` (
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nome` varchar(100) NOT NULL,
  `autor` varchar(100) NOT NULL,
  `estadolivro` varchar(50) NOT NULL,
  `preco` DECIMAL(10, 2) NOT NULL,
  `datacadastro` datetime NOT NULL,
  `resumo` text DEFAULT NULL,
  `obs` text DEFAULT NULL,
  `foto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `livros` (`id`, `nome`, `autor`, `estadolivro`, `preco`, `datacadastro`, `resumo`, `obs`, `foto`) 
VALUES 
-- 3300 = 33,00
(1, '1984', 'George Orwell', 'Novo', 2700, '2024-09-16 00:00:00', 'Utopia', '', '1984.jpg'),
(2, 'Alice no País das Maravilhas', 'Lewis Carroll', 'Novo', 3350, '2024-09-16 00:00:00', 'Mundo Fantástico', '', 'País das Maravilhas.jpeg');

CREATE TABLE usuarios(
    id int AUTO_INCREMENT not null PRIMARY KEY,
    nome varchar(50) not null,
    user varchar(50) not null,
    password varchar(100) not null,
    foto varchar(50) );

INSERT INTO 
`usuarios`(`nome`, `user`, `password`)
VALUES
('admin', 'admin', '$2a$08$CflfllePArKlBJomM0F6a.e9wMGIXjP.shQQi7ABJAW3X.ep8BNru');
