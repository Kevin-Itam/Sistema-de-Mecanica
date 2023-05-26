-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21-Mar-2023 às 01:23
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `datas` date DEFAULT NULL,
  `descricao_atividade` varchar(10000) DEFAULT NULL,
  `nome_turma` varchar(200) DEFAULT NULL,
  `periodo_turma` varchar(45) DEFAULT NULL,
  `modelo_veiculo` varchar(100) DEFAULT NULL,
  `cor_veiculo` varchar(45) DEFAULT NULL,
  `nome_professor` varchar(200) DEFAULT NULL,
  `tbl_atividadescol` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `tbl_cadastro`
--

INSERT INTO `tbl_cadastro` (`id_professor`, `nome_professor`, `email`, `username`, `senha`) VALUES
(5, 'ADMIN', 'ADMIN@ADMIN.COM', 'admin', 'admin'),
(6, 'André Manoel de Santana', 'andre.santana@e-mail.com', 'andre.santana', 'andre31'),
(7, 'Kevin Itamar', 'kevin.itamar@e-mail.com', 'kevin.itamar', '123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_turma`
--

CREATE TABLE `tbl_turma` (
  `id_turma` int(4) NOT NULL,
  `nome_turma` varchar(45) NOT NULL,
  `periodo` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `tbl_turma`
--

INSERT INTO `tbl_turma` (`id_turma`, `nome_turma`, `periodo`) VALUES
(6, 'MEC 2021', 'Matutino'),
(7, 'MEC 2021', 'Vespertino'),
(8, 'MEC 2021', 'Noturno'),
(9, 'MEC 2022', 'Matutino'),
(10, 'MEC 2022', 'Vespertino'),
(11, 'MEC 2022', 'Noturno'),
(12, 'MEC 2023', 'Matutino'),
(13, 'MEC 2023', 'Vespertino'),
(14, 'MEC 2023', 'Noturno');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_veiculo`
--

CREATE TABLE `tbl_veiculo` (
  `id_veiculo` int(4) NOT NULL,
  `modelo_veiculo` varchar(45) NOT NULL,
  `cor_veiculo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `tbl_veiculo`
--

INSERT INTO `tbl_veiculo` (`id_veiculo`, `modelo_veiculo`, `cor_veiculo`) VALUES
(6, 'Livina SL', 'Preto'),
(7, 'Livina SL', 'Verde'),
(8, 'March SL', 'Azul'),
(9, 'Versa SL', 'Cinza'),
(10, 'Focus Sedan GLX', 'Branco'),
(11, 'Fiesta 1.0 Flex 8V', 'Branco'),
(12, '320 GT', 'Branco'),
(13, 'Virtus GTS', 'Cinza'),
(14, 'T-Cross TSI', ' Azul'),
(15, 'Saveiro CROSS', 'Cinza'),
(16, 'Fox IMOTION', 'Branco');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbl_atividades`
--
ALTER TABLE `tbl_atividades`
  ADD PRIMARY KEY (`id_atividades`);

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
  MODIFY `id_atividades` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de tabela `tbl_cadastro`
--
ALTER TABLE `tbl_cadastro`
  MODIFY `id_professor` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `tbl_turma`
--
ALTER TABLE `tbl_turma`
  MODIFY `id_turma` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `tbl_veiculo`
--
ALTER TABLE `tbl_veiculo`
  MODIFY `id_veiculo` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
