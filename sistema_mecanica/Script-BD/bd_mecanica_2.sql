-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28-Fev-2023 às 01:21
-- Versão do servidor: 10.4.6-MariaDB
-- versão do PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_mecanica`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_atividades`
--

CREATE TABLE `tbl_atividades` (
  `id_atividades` int(4) NOT NULL,
  `id_nome` int(4) DEFAULT NULL,
  `id_turma` int(4) DEFAULT NULL,
  `id_modelo` int(4) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `descricao_atividade` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_cadastro`
--

CREATE TABLE `tbl_cadastro` (
  `id_professor` int(4) NOT NULL,
  `nome_professor` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `senha` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbl_cadastro`
--

INSERT INTO `tbl_cadastro` (`id_professor`, `nome_professor`, `email`, `username`, `senha`) VALUES
(1, 'teste', 'teste', 'teste', 'teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_turma`
--

CREATE TABLE `tbl_turma` (
  `id_turma` int(4) NOT NULL,
  `nome_turma` varchar(45) NOT NULL,
  `periodo` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_veiculo`
--

CREATE TABLE `tbl_veiculo` (
  `id_veiculo` int(4) NOT NULL,
  `modelo_veiculo` varchar(45) NOT NULL,
  `cor_veiculo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbl_atividades`
--
ALTER TABLE `tbl_atividades`
  ADD PRIMARY KEY (`id_atividades`),
  ADD KEY `fk_id_nome` (`id_nome`),
  ADD KEY `fk_id_turma` (`id_turma`),
  ADD KEY `fk_id_modelo` (`id_modelo`);

--
-- Índices para tabela `tbl_cadastro`
--
ALTER TABLE `tbl_cadastro`
  ADD PRIMARY KEY (`id_professor`);

--
-- Índices para tabela `tbl_turma`
--
ALTER TABLE `tbl_turma`
  ADD PRIMARY KEY (`id_turma`);

--
-- Índices para tabela `tbl_veiculo`
--
ALTER TABLE `tbl_veiculo`
  ADD PRIMARY KEY (`id_veiculo`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbl_atividades`
--
ALTER TABLE `tbl_atividades`
  MODIFY `id_atividades` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbl_cadastro`
--
ALTER TABLE `tbl_cadastro`
  MODIFY `id_professor` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tbl_turma`
--
ALTER TABLE `tbl_turma`
  MODIFY `id_turma` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbl_veiculo`
--
ALTER TABLE `tbl_veiculo`
  MODIFY `id_veiculo` int(4) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tbl_atividades`
--
ALTER TABLE `tbl_atividades`
  ADD CONSTRAINT `fk_id_modelo` FOREIGN KEY (`id_modelo`) REFERENCES `tbl_veiculo` (`id_veiculo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_id_nome` FOREIGN KEY (`id_nome`) REFERENCES `tbl_cadastro` (`id_professor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_id_turma` FOREIGN KEY (`id_turma`) REFERENCES `tbl_turma` (`id_turma`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
