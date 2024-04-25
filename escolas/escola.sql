-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11/03/2024 às 02:32
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `escola`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_atividades`
--

CREATE TABLE `tbl_atividades` (
  `atividades_id` int(11) NOT NULL,
  `titulo_atividade` text NOT NULL,
  `inicio_atividade` date NOT NULL,
  `termino_atividade` date NOT NULL,
  `atividade_escola_id` int(11) NOT NULL,
  `descricao_atividade` text NOT NULL,
  `tipo_atividade` tinyint(1) NOT NULL,
  `roteiro_atividade` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbl_atividades`
--

INSERT INTO `tbl_atividades` (`atividades_id`, `titulo_atividade`, `inicio_atividade`, `termino_atividade`, `atividade_escola_id`, `descricao_atividade`, `tipo_atividade`, `roteiro_atividade`) VALUES
(17, 'andebol', '2024-03-17', '2024-03-18', 6, 'campo grande', 1, ''),
(20, 'bicicleta', '2024-03-09', '2024-03-10', 3, 'asdasdsad', 3, 'asdasdasd'),
(23, 'futsal', '2024-03-12', '2024-03-19', 4, 'terças e quartas', 0, ''),
(25, 'corta mato', '2024-03-10', '2024-03-09', 5, 'corta mato 2km', 0, '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_escolas`
--

CREATE TABLE `tbl_escolas` (
  `escola_id` int(11) NOT NULL,
  `escola_username` varchar(255) NOT NULL,
  `escola_nome` varchar(255) NOT NULL,
  `escola_password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbl_escolas`
--

INSERT INTO `tbl_escolas` (`escola_id`, `escola_username`, `escola_nome`, `escola_password`, `is_admin`) VALUES
(1, 'admin', 'admin1', '$2y$10$45ypYCVsOozIjSJ1wdOnneCS7MWD14Jq7uvMus6T897nBEhFFUzpa', 1),
(3, 'esjoaodedeus', 'Escola Secundária João de Deus', '$2y$10$.CzfjyQ5FwV2e3w3H99gruz3V3SL5HMq23QtpwY07zO/ag4t8YuEC', 0),
(4, 'eb23santoantonio', 'EB 2,3 Santo António', '$2y$10$94Nc4PrC6KLp6XPokZROSOgeZB4Nfr.YB8h20qCTp.G17vJ/HJ7XW', 0),
(5, 'ebriaformosa', 'Escola Básica Ria Formosa', '$2y$10$oseRe8LLXBliLqdbxvjX8O87Zr8YxaAyyFLpNG3QVOK705Bz0atw2', 0),
(6, 'eb1ferradeira', 'EB 1 da Ferradeira', '$2y$10$iJozAl7tYx4PEO1yAChfX.x6bdHYEJDL7.JYn5dSyzBI57FaeVuNy', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tbl_atividades`
--
ALTER TABLE `tbl_atividades`
  ADD PRIMARY KEY (`atividades_id`),
  ADD KEY `escolasID` (`atividade_escola_id`);

--
-- Índices de tabela `tbl_escolas`
--
ALTER TABLE `tbl_escolas`
  ADD PRIMARY KEY (`escola_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbl_atividades`
--
ALTER TABLE `tbl_atividades`
  MODIFY `atividades_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `tbl_escolas`
--
ALTER TABLE `tbl_escolas`
  MODIFY `escola_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tbl_atividades`
--
ALTER TABLE `tbl_atividades`
  ADD CONSTRAINT `escolasID` FOREIGN KEY (`atividade_escola_id`) REFERENCES `tbl_escolas` (`escola_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
