-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27/05/2026 às 17:03
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
-- Banco de dados: `ifpr`
--
CREATE DATABASE IF NOT EXISTS `ifpr` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ifpr`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cpfcnpj` varchar(20) NOT NULL,
  `telefone` varchar(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `observacao` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `nome` int(11) NOT NULL,
  `descricao` int(11) NOT NULL,
  `preco` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`) VALUES
(2, 'Jonas', 'marcelo@borth.com.br', '1234'),
(3, 'Jonas', 'marcelo@borth.com.br', '1234'),
(4, 'Jonas', 'marcelo@borth.com.br', '1234'),
(5, 'Jonas', 'marcelo@borth.com.br', '1234'),
(6, 'Jonas', 'marcelo@borth.com.br', '1234'),
(7, 'Jonas', 'marcelo@borth.com.br', '1234'),
(8, 'Jonas', 'marcelo@borth.com.br', '1234'),
(9, 'fsdfsad', 'gasdgb@gmail.com', '1234'),
(10, 'fsdfsad', 'gasdgb@gmail.com', '12314'),
(11, 'fsdfsad', 'gasdgb@gmail.com', '12314'),
(12, 'fsdfsad', 'gasdgb@gmail.com', '12314'),
(13, 'fsdfsad', 'gasdgb@gmail.com', '12314'),
(14, 'fsdfsad', 'gasdgb@gmail.com', '12344'),
(15, 'fsdfsad', 'gasdgb@gmail.com', '12344'),
(16, 'ADad', 'sdf@gmail.com', '1234'),
(17, 'fsdfsad', 'sdf@gmail.com', '1234');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
