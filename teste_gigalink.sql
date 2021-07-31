SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `teste_gigalink` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `teste_gigalink`;

DROP TABLE IF EXISTS `email`;
CREATE TABLE `email` (
  `id` int(11) NOT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `referencia` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `id_fornecedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `fornecedor`;
CREATE TABLE `fornecedor` (
  `id` int(11) NOT NULL,
  `nome` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `cidade` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `endereco` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `bairro` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `numero` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `item`;
CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `quantidade` float NOT NULL,
  `valor` float NOT NULL,
  `id_produto` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `pedido`;
CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `datahora` datetime DEFAULT NULL,
  `notafiscal` varchar(240) COLLATE utf8_unicode_ci NOT NULL,
  `valorfrete` float NOT NULL,
  `desconto` float NOT NULL,
  `valortotal` float NOT NULL,
  `id_transportadora` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `produto`;
CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `nome` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `id_fornecedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `telefone`;
CREATE TABLE `telefone` (
  `id` int(11) NOT NULL,
  `ddd` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `telefone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `referencia` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `id_fornecedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `transportadora`;
CREATE TABLE `transportadora` (
  `id` int(11) NOT NULL,
  `nome` varchar(60) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


ALTER TABLE `email`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_email_id_fornecedor` (`id_fornecedor`);

ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_item_id_produto` (`id_produto`),
  ADD KEY `FK_item_id_pedido` (`id_pedido`);

ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_pedido_id_transportadora` (`id_transportadora`);

ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_fornecedor_id_produto` (`id_fornecedor`);

ALTER TABLE `telefone`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_telefone_id_fornecedor` (`id_fornecedor`);

ALTER TABLE `transportadora`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `fornecedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `telefone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `transportadora`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `email`
  ADD CONSTRAINT `FK_email_id_fornecedor` FOREIGN KEY (`id_fornecedor`) REFERENCES `fornecedor` (`id`) ON UPDATE CASCADE;

ALTER TABLE `item`
  ADD CONSTRAINT `FK_item_id_pedido` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_item_id_produto` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id`) ON UPDATE CASCADE;

ALTER TABLE `pedido`
  ADD CONSTRAINT `FK_pedido_id_transportadora` FOREIGN KEY (`id_transportadora`) REFERENCES `transportadora` (`id`);

ALTER TABLE `produto`
  ADD CONSTRAINT `FK_fornecedor_id_produto` FOREIGN KEY (`id_fornecedor`) REFERENCES `fornecedor` (`id`) ON UPDATE CASCADE;

ALTER TABLE `telefone`
  ADD CONSTRAINT `FK_telefone_id_fornecedor` FOREIGN KEY (`id_fornecedor`) REFERENCES `fornecedor` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
