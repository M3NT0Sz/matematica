-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10/11/2023 às 14:58
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `jogodomilhao`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `perguntas`
--

CREATE TABLE `perguntas` (
  `per_cod` int(11) NOT NULL,
  `per_num1` int(11) NOT NULL,
  `per_num2` int(11) NOT NULL,
  `per_value1` int(11) NOT NULL,
  `per_value2` int(11) NOT NULL,
  `per_value3` int(11) NOT NULL,
  `per_value4` int(11) NOT NULL,
  `per_result` varchar(1) NOT NULL,
  `per_simbolo` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `perguntas`
--

INSERT INTO `perguntas` (`per_cod`, `per_num1`, `per_num2`, `per_value1`, `per_value2`, `per_value3`, `per_value4`, `per_result`, `per_simbolo`) VALUES
(1, 10, 10, 100, 200, 300, 400, 'a', 'x'),
(2, 5, 5, 10, 15, 20, 25, 'd', 'x');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pergunta_ja_feita`
--

CREATE TABLE `pergunta_ja_feita` (
  `perjf_cod` int(11) NOT NULL,
  `perjf_perguntafeita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `recorde`
--

CREATE TABLE `recorde` (
  `rec_cod` int(11) NOT NULL,
  `rec_recorde` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `recorde`
--

INSERT INTO `recorde` (`rec_cod`, `rec_recorde`) VALUES
(1, 16);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `perguntas`
--
ALTER TABLE `perguntas`
  ADD PRIMARY KEY (`per_cod`);

--
-- Índices de tabela `pergunta_ja_feita`
--
ALTER TABLE `pergunta_ja_feita`
  ADD PRIMARY KEY (`perjf_cod`);

--
-- Índices de tabela `recorde`
--
ALTER TABLE `recorde`
  ADD PRIMARY KEY (`rec_cod`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `perguntas`
--
ALTER TABLE `perguntas`
  MODIFY `per_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `pergunta_ja_feita`
--
ALTER TABLE `pergunta_ja_feita`
  MODIFY `perjf_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `recorde`
--
ALTER TABLE `recorde`
  MODIFY `rec_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
