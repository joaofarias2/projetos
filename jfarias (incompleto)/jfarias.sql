-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03/02/2024 às 22:12
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
-- Banco de dados: `jfarias`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_noticias`
--

CREATE TABLE `tbl_noticias` (
  `id_noticias` int(11) NOT NULL,
  `noticia_nome` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_utilizadores`
--

CREATE TABLE `tbl_utilizadores` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `user_password` varchar(1023) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_role` varchar(100) DEFAULT 'utilizador',
  `user_pic` varchar(255) NOT NULL DEFAULT '',
  `user_nome_completo` varchar(255) NOT NULL,
  `user_morada` varchar(255) NOT NULL,
  `user_telefone` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `tbl_utilizadores`
--

INSERT INTO `tbl_utilizadores` (`user_id`, `user_name`, `user_password`, `user_email`, `user_role`, `user_pic`, `user_nome_completo`, `user_morada`, `user_telefone`) VALUES
(11, 'joaofarias', '$2y$12$gewEJ2LOnuindJtlkafqeuXA.K2HYbJprTUPBmdxmp9jYj1.xHG9G', 'skrol1996@gmail.com', 'utilizador', '', '', '0', 0),
(18, '123123', '$2y$12$YjqlWvVUXoq.uqfu1vRtNuNP/dc6d21nqSmq7AAN/3239GwBZihUe', 'pppddddawdawd@gmail.com', 'utilizador', '', '', '0', 0),
(19, 'asadsdxxx', '$2y$12$nnFleSO3w.5eHNNStOducey/IzEhTjYOCq6yReNratMAM1UFcvcmG', 'asdasdasd@gmail.com', 'utilizador', '', '', '0', 0),
(20, 'dddaaa', '$2y$12$e0RIbvvUmadlddDAWVu7Q.5iOQGwwReNcZtZl.dmxydsWxYXfKaPS', 'awdawd@gmail.com', 'utilizador', '', '', '0', 0),
(21, 'joaomfarias', '$2y$12$2j//2KZTzMhVHWi5w5eS9eTzeU9BD/8p6E1bnP2Z91kW67swjRNCm', 'adsdsdsdsd@gmail.com', 'utilizador', '', '', '0', 0),
(22, 'admin', '$2y$12$DZHssyiGaMRkDQ1qK9lbLeFTba.zGUK/Ahm9ddOGY.OlhhvhrwzAG', 'skrol1996@gmail.com', 'admin', 'img/profilepic.jpg', 'Joao Farias', 'Urbanização Abertura-Mar Torre Mirapraia 10° A 8125 - 100 Quarteira', 2147483647),
(23, 'teste', '$2y$12$Xbw27youbDQODU9l4GzvD.KQQZ96aMTKjyz7Xr5mSadwBJ7azP2BC', 'asdasdas@gmail.com', 'utilizador', '', '', '0', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tbl_noticias`
--
ALTER TABLE `tbl_noticias`
  ADD PRIMARY KEY (`id_noticias`);

--
-- Índices de tabela `tbl_utilizadores`
--
ALTER TABLE `tbl_utilizadores`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbl_noticias`
--
ALTER TABLE `tbl_noticias`
  MODIFY `id_noticias` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbl_utilizadores`
--
ALTER TABLE `tbl_utilizadores`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
