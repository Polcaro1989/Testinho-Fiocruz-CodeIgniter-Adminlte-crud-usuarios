-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql:3306
-- Tempo de geração: 22/09/2024 às 23:40
-- Versão do servidor: 5.7.44
-- Versão do PHP: 8.2.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `crud`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `perfil` enum('Administrador','Convidado') DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `perfil`, `senha`, `created_at`, `updated_at`) VALUES
(1, 'teste15', 'teste15@gmail.com', 'Administrador', '$2y$10$XkhmP4ciDDFpDfQPDZ5jX.MmTaKc7S7RdpOgH1EAvIVYZnH338q6i', '2024-09-19 02:06:29', '2024-09-19 02:07:53'),
(2, 'teste10', 'teste10@gmail.com', 'Convidado', '$2y$10$mifuI9Si7tw25LoUsSopIeBZAdnD5jxPdF8l3SY4BRHq.Md6g6Fwi', '2024-09-19 02:59:43', '2024-09-19 02:59:43'),
(3, 'teste35', 'abraao695@gmail.com', 'Convidado', '$2y$10$3wGjGSk1qvov2zldTb829.jv3DjkiRzElkzUPeQ4UgUroZ7OU6j96', '2024-09-19 03:21:30', '2024-09-19 03:21:30'),
(4, 'teste500', 'teste500@gmail.com', 'Administrador', '$2y$10$6xWhr3b8lkhDfVRztDvz8uRyyYz9Fqxtix6FBezMYPftYFZrvrga2', '2024-09-22 23:10:22', '2024-09-22 23:10:22'),
(5, 'teste400', 'teste400@gmail.com', 'Convidado', '$2y$10$Ir4GyIl6GIj1MHP1CF0wa.nPkyNZ5jBTgiWYYU7tMaZWPWD.8HKKu', '2024-09-22 23:14:21', '2024-09-22 23:14:21'),
(6, 'teste10000', 'teste1000@gmai.com', 'Convidado', '$2y$10$rhHac7hSFyyD2OEYt41oS.jEU09WmkMn2EzCgM6fSEr0VAMhbINmu', '2024-09-22 23:26:23', '2024-09-22 23:26:23');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
