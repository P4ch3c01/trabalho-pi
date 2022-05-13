-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12-Maio-2022 às 21:29
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Banco de dados: `site`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aparelhos`
--

CREATE TABLE `aparelhos` (
  `id_aparelho` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `tp_aparelho` varchar(150) NOT NULL,
  `marca` varchar(150) NOT NULL,
  `sistema` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro_cliente`
--

CREATE TABLE `cadastro_cliente` (
  `id_cliente` int(11) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `telefone` varchar(12) NOT NULL,
  `sexo` varchar(12) NOT NULL,
  `data_nasc` date NOT NULL,
  `cidade` varchar(250) NOT NULL,
  `estado` varchar(250) NOT NULL,
  `endereco` varchar(250) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cadastro_cliente`
--

INSERT INTO `cadastro_cliente` (`id_cliente`, `nome`, `telefone`, `sexo`, `data_nasc`, `cidade`, `estado`, `endereco`, `id_usuario`) VALUES
(19, 'henrique', '40028922', 'masculino', '2022-05-16', 'gravatai', 'rs', 'tal', 9),
(21, 'teste1', '40028922', 'masculino', '2022-05-16', 'tal', 'tal', 'tal', 9),
(22, 'teste2', '40028922', 'masculino', '2022-05-16', 'tal', 'tal', 'tal', 9),
(31, 'Henrique', '40028922', 'masculino', '2022-05-05', 'Gravatai', 'RS', 'sla', 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

CREATE TABLE `servicos` (
  `id_servico` int(11) NOT NULL,
  `procedimento` varchar(150) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_aparelho` int(11) NOT NULL,
  `data1` date NOT NULL,
  `resumo` text NOT NULL,
  `valor` double NOT NULL
) ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `senha` varchar(64) NOT NULL,
  `admin` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `email`, `senha`, `admin`) VALUES
(8, 'henriquematheussp@gmail.com', '202cb962ac59075b964b07152d234b70', 0),
(9, 'teste@gmail.com', '202cb962ac59075b964b07152d234b70', 0),
(10, '', 'd41d8cd98f00b204e9800998ecf8427e', 0),
(11, 'teste1@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(15, 'teste3@gmail.com', '202cb962ac59075b964b07152d234b70', 0),
(16, 'teste4@gmail.com', '202cb962ac59075b964b07152d234b70', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `aparelhos`
--
ALTER TABLE `aparelhos`
  ADD PRIMARY KEY (`id_aparelho`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Índices para tabela `cadastro_cliente`
--
ALTER TABLE `cadastro_cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `cadastro_cliente_ibfk_1` (`id_usuario`);

--
-- Índices para tabela `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`id_servico`),
  ADD KEY `id_aparelho` (`id_aparelho`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `aparelhos`
--
ALTER TABLE `aparelhos`
  MODIFY `id_aparelho` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cadastro_cliente`
--
ALTER TABLE `cadastro_cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de tabela `servicos`
--
ALTER TABLE `servicos`
  MODIFY `id_servico` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `aparelhos`
--
ALTER TABLE `aparelhos`
  ADD CONSTRAINT `aparelhos_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cadastro_cliente` (`id_cliente`);

--
-- Limitadores para a tabela `cadastro_cliente`
--
ALTER TABLE `cadastro_cliente`
  ADD CONSTRAINT `cadastro_cliente_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Limitadores para a tabela `servicos`
--
ALTER TABLE `servicos`
  ADD CONSTRAINT `servicos_ibfk_1` FOREIGN KEY (`id_aparelho`) REFERENCES `aparelhos` (`id_aparelho`),
  ADD CONSTRAINT `servicos_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `cadastro_cliente` (`id_cliente`);
COMMIT;
