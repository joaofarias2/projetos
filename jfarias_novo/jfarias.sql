-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26/02/2024 às 00:28
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
-- Estrutura para tabela `tbl_consulta`
--

CREATE TABLE `tbl_consulta` (
  `id_consulta` int(11) NOT NULL,
  `id_utilizador` int(11) NOT NULL,
  `titulo_consulta` varchar(250) NOT NULL,
  `texto_consulta` varchar(900) NOT NULL,
  `data_consulta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `tbl_consulta`
--

INSERT INTO `tbl_consulta` (`id_consulta`, `id_utilizador`, `titulo_consulta`, `texto_consulta`, `data_consulta`) VALUES
(3, 25, 'metereo', 'neve ', '2024-02-14'),
(8, 25, 'joao migyuel', 'joao farias', '2024-02-27'),
(9, 25, 'ggffdd', 'awdadsdasd', '2024-02-28'),
(12, 25, 'badjoras', 'yytgyhyh', '2024-02-28');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_noticias`
--

CREATE TABLE `tbl_noticias` (
  `id_noticias` int(11) NOT NULL,
  `noticias_titulo` varchar(250) NOT NULL,
  `noticias_texto` varchar(350) NOT NULL,
  `noticias_imagem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `tbl_noticias`
--

INSERT INTO `tbl_noticias` (`id_noticias`, `noticias_titulo`, `noticias_texto`, `noticias_imagem`) VALUES
(13, 'abacates', 'abacates frescos', 'firstava.png'),
(14, 'laranja', 'laranjas frescas', 'laranjas.jpg'),
(17, 'banana', 'banana verde', 'banana.jpg'),
(18, 'manga', 'manga madura', 'manga.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_projetos`
--

CREATE TABLE `tbl_projetos` (
  `id_projeto` int(11) NOT NULL,
  `projeto_nome` varchar(255) NOT NULL,
  `projeto_info` varchar(255) NOT NULL,
  `projeto_imagem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `tbl_projetos`
--

INSERT INTO `tbl_projetos` (`id_projeto`, `projeto_nome`, `projeto_info`, `projeto_imagem`) VALUES
(1, 'batatamaster', 'batatas semeadasddww', 'batatas.jpg');

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
(21, 'joaomfarias', '$2y$12$2j//2KZTzMhVHWi5w5eS9eTzeU9BD/8p6E1bnP2Z91kW67swjRNCm', 's1996@gmail.com', 'utilizador', '', 'Joao Farias', 'Urbanização Abertura-Mar Torre Mirapraia 10° A 8125 - 100', 2147483647),
(22, 'admin', '$2y$12$DZHssyiGaMRkDQ1qK9lbLeFTba.zGUK/Ahm9ddOGY.OlhhvhrwzAG', 'skrol1996@gail.co', 'admin', 'imgsobrenos.jpg', 'Joao Farias', 'Urbanização Abertura-Mar Torre Mirapraia 10° A 8125 - 100 Quarteira', 2147483647),
(24, 'adm', '$2y$12$hXUGnzuuseCAym8A3qCvK.Ps22rNEcDnAWVN7/5bUr2p/cAmjuUxS', 'paulasalvado1810@gmail.com', 'admin', 'black-paper-background.jpg', 'Paula Cristina Roque Salvado', 'Rua Manuel José Paiva lt11 bloco D r/c direito', 967413070),
(25, 'teste', '$2y$12$5WiJM9aCeoVxyrOgUSVF9OYcYePuobMaMn6plWviHJhEOk9tDNSFO', 'asdasdsddddd@gmail.com', 'utilizador', 'myava.jpg', 'Paula Cristina Roque Salvado', 'Rua Manuel José Paiva lt11 bloco D r/c direito', 967413070);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tbl_consulta`
--
ALTER TABLE `tbl_consulta`
  ADD PRIMARY KEY (`id_consulta`),
  ADD KEY `id_utilizador` (`id_utilizador`);

--
-- Índices de tabela `tbl_noticias`
--
ALTER TABLE `tbl_noticias`
  ADD PRIMARY KEY (`id_noticias`);

--
-- Índices de tabela `tbl_projetos`
--
ALTER TABLE `tbl_projetos`
  ADD PRIMARY KEY (`id_projeto`);

--
-- Índices de tabela `tbl_utilizadores`
--
ALTER TABLE `tbl_utilizadores`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbl_consulta`
--
ALTER TABLE `tbl_consulta`
  MODIFY `id_consulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `tbl_noticias`
--
ALTER TABLE `tbl_noticias`
  MODIFY `id_noticias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `tbl_projetos`
--
ALTER TABLE `tbl_projetos`
  MODIFY `id_projeto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tbl_utilizadores`
--
ALTER TABLE `tbl_utilizadores`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tbl_consulta`
--
ALTER TABLE `tbl_consulta`
  ADD CONSTRAINT `tbl_consulta_ibfk_1` FOREIGN KEY (`id_utilizador`) REFERENCES `tbl_utilizadores` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
