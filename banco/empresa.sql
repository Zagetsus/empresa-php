-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 30-Maio-2019 às 21:08
-- Versão do servidor: 5.7.24
-- versão do PHP: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `empresa`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

DROP TABLE IF EXISTS `funcionarios`;
CREATE TABLE IF NOT EXISTS `funcionarios` (
  `id_funcionarios` int(11) NOT NULL AUTO_INCREMENT,
  `nome_funcionario` varchar(60) DEFAULT NULL,
  `sexo` char(1) DEFAULT NULL,
  `data_nasc` varchar(13) DEFAULT NULL,
  `observacoes` text,
  `id_setor` int(11) NOT NULL,
  PRIMARY KEY (`id_funcionarios`),
  KEY `id_setor` (`id_setor`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`id_funcionarios`, `nome_funcionario`, `sexo`, `data_nasc`, `observacoes`, `id_setor`) VALUES
(1, 'Luan Verdelho de Freitas', 'm', 'Sep 18, 2001', 'Um bom funcionÃ¡rio', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `setores`
--

DROP TABLE IF EXISTS `setores`;
CREATE TABLE IF NOT EXISTS `setores` (
  `id_setores` int(11) NOT NULL AUTO_INCREMENT,
  `nome_setor` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id_setores`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `setores`
--

INSERT INTO `setores` (`id_setores`, `nome_setor`) VALUES
(1, 'Tecnologia da InformaÃ§Ã£o');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
