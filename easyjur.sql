-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09-Mar-2020 às 06:23
-- Versão do servidor: 10.4.8-MariaDB
-- versão do PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `easyjur`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `colours`
--

CREATE TABLE `colours` (
  `id_colour` int(11) NOT NULL,
  `colour_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `colours`
--

INSERT INTO `colours` (`id_colour`, `colour_name`) VALUES
(1, 'Preto'),
(2, 'Vermelho'),
(3, 'Azul'),
(4, 'Laranja'),
(5, 'Verde'),
(6, 'Amarelo'),
(7, 'Branco'),
(8, 'Marrom');

-- --------------------------------------------------------

--
-- Estrutura da tabela `products`
--

CREATE TABLE `products` (
  `id_product` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `products`
--

INSERT INTO `products` (`id_product`, `product_name`) VALUES
(45, 'Nescau'),
(46, 'Uva passa'),
(47, 'Feijão'),
(48, 'Arroz'),
(49, 'Vagem'),
(50, 'Pêra');

-- --------------------------------------------------------

--
-- Estrutura da tabela `products_colours`
--

CREATE TABLE `products_colours` (
  `id_products_colours` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_colour` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `products_colours`
--

INSERT INTO `products_colours` (`id_products_colours`, `id_product`, `id_colour`) VALUES
(118, 45, 1),
(119, 45, 7),
(120, 46, 1),
(121, 46, 3),
(122, 47, 1),
(123, 47, 2),
(124, 47, 7),
(125, 47, 8),
(126, 48, 7),
(127, 48, 8),
(128, 49, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id_user`, `email`, `password`) VALUES
(16, 'admin@admin.com', 'YWRtaW4=');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `colours`
--
ALTER TABLE `colours`
  ADD PRIMARY KEY (`id_colour`);

--
-- Índices para tabela `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`);

--
-- Índices para tabela `products_colours`
--
ALTER TABLE `products_colours`
  ADD PRIMARY KEY (`id_products_colours`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_colour` (`id_colour`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `colours`
--
ALTER TABLE `colours`
  MODIFY `id_colour` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de tabela `products_colours`
--
ALTER TABLE `products_colours`
  MODIFY `id_products_colours` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `products_colours`
--
ALTER TABLE `products_colours`
  ADD CONSTRAINT `products_colours_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`),
  ADD CONSTRAINT `products_colours_ibfk_2` FOREIGN KEY (`id_colour`) REFERENCES `colours` (`id_colour`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
