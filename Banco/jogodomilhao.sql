-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20/11/2023 às 23:32
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
(2, 5, 5, 10, 15, 20, 25, 'd', 'x'),
(53, 8, 32, 23, 4, 48, 23, 'b', '/'),
(54, 20, 10, 30, 25, 15, 35, 'a', '+'),
(55, 9, 3, 6, 27, 12, 18, 'b', 'X'),
(56, 36, 6, 9, 4, 6, 12, 'c', '/'),
(57, 12, 6, 4, 2, 10, 6, 'd', '-'),
(58, 22, 11, 33, 20, 15, 40, 'a', '+'),
(59, 7, 4, 3, 28, 8, 12, 'b', 'X'),
(60, 63, 9, 5, 8, 7, 10, 'c', '/'),
(61, 14, 7, 3, 5, 10, 7, 'd', '-'),
(62, 28, 14, 42, 24, 18, 50, 'a', '+'),
(63, 8, 2, 4, 16, 6, 10, 'b', 'X'),
(64, 45, 5, 5, 15, 9, 25, 'c', '/'),
(65, 8, 4, 2, 3, 6, 4, 'd', '-'),
(66, 16, 8, 24, 12, 18, 30, 'a', '+'),
(67, 5, 3, 2, 15, 6, 8, 'b', 'X'),
(68, 28, 7, 8, 3, 4, 2, 'c', '/'),
(69, 15, 7, 10, 5, 8, 3, 'c', '-'),
(70, 30, 6, 36, 24, 18, 42, 'a', '+'),
(71, 10, 2, 8, 20, 12, 15, 'b', 'X'),
(72, 27, 3, 3, 6, 9, 12, 'c', '/'),
(73, 6, 2, 2, 1, 5, 4, 'd', '-'),
(74, 18, 9, 27, 15, 12, 30, 'a', '+'),
(75, 8, 4, 6, 32, 10, 15, 'b', 'X'),
(76, 9, 3, 12, 6, 18, 21, 'a', '+'),
(77, 24, 4, 40, 96, 25, 30, 'b', 'X'),
(78, 21, 7, 7, 9, 3, 1, 'c', '/'),
(79, 15, 5, 3, 2, 7, 10, 'd', '-'),
(80, 18, 6, 24, 12, 20, 30, 'a', '+'),
(81, 10, 2, 8, 20, 16, 15, 'b', 'X'),
(82, 25, 5, 15, 10, 5, 3, 'c', '/'),
(83, 8, 4, 3, 2, 6, 4, 'd', '-'),
(84, 30, 15, 45, 20, 30, 35, 'a', '+'),
(85, 7, 2, 5, 14, 10, 12, 'b', 'X'),
(86, 27, 9, 9, 6, 3, 27, 'c', '/'),
(87, 6, 3, 1, 2, 4, 3, 'd', '-'),
(88, 14, 7, 21, 12, 18, 25, 'a', '+'),
(89, 12, 3, 9, 36, 15, 18, 'b', 'X'),
(90, 35, 5, 20, 14, 7, 3, 'c', '/'),
(91, 10, 4, 2, 3, 7, 6, 'd', '-'),
(92, 20, 10, 30, 15, 25, 35, 'a', '+'),
(93, 16, 8, 32, 128, 18, 30, 'b', 'X'),
(94, 42, 6, 4, 6, 7, 12, 'c', '/'),
(95, 7, 3, 1, 2, 6, 4, 'd', '-');

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
  `rec_recorde` int(11) NOT NULL,
  `rec_vida` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `recorde`
--

INSERT INTO `recorde` (`rec_cod`, `rec_recorde`, `rec_vida`) VALUES
(1, 0, 3);

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
  MODIFY `per_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT de tabela `pergunta_ja_feita`
--
ALTER TABLE `pergunta_ja_feita`
  MODIFY `perjf_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=318;

--
-- AUTO_INCREMENT de tabela `recorde`
--
ALTER TABLE `recorde`
  MODIFY `rec_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
