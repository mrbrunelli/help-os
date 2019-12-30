-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 30-Dez-2019 às 12:09
-- Versão do servidor: 10.1.39-MariaDB
-- versão do PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `helpos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `anexo_ticket`
--

CREATE TABLE `anexo_ticket` (
  `idanexoticket` int(11) NOT NULL,
  `url` text,
  `idticket` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `atendente`
--

CREATE TABLE `atendente` (
  `idatendente` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `status` enum('A','I') NOT NULL,
  `foto` text NOT NULL,
  `custohora` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `atendente`
--

INSERT INTO `atendente` (`idatendente`, `nome`, `email`, `senha`, `status`, `foto`, `custohora`) VALUES
(1, 'Matheus Brunelli', 'matheus.brunelli@gazin.com.br', 'de979380332bcdff326f9aa2571e78bc003edf41', 'A', 'assets\\img\\mrbrunelli.jpg', 8.23),
(2, 'Armando Bretas', 'armando.luiz@gazin.com.br', '113cafab03c3018ea7aaf12c8570ab7a823dc214', 'A', 'assets\\img\\armandobretas.jpg', 15.61);

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria_ticket`
--

CREATE TABLE `categoria_ticket` (
  `idcategoriaticket` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categoria_ticket`
--

INSERT INTO `categoria_ticket` (`idcategoriaticket`, `nome`) VALUES
(3, 'App Jornada'),
(11, 'App Logística Gazin'),
(9, 'Biblioteca Gazin'),
(4, 'Excel'),
(15, 'Outros'),
(7, 'Portal de Agendamento'),
(6, 'Portal de Faturas'),
(1, 'Qlik Sense'),
(13, 'Sabium'),
(8, 'Sinistros Gazin'),
(2, 'Sistema Jornada'),
(12, 'Sistema Logística Gazin'),
(10, 'UniGazin'),
(5, 'Verbas Gazin'),
(14, 'WMS');

-- --------------------------------------------------------

--
-- Estrutura da tabela `entidade`
--

CREATE TABLE `entidade` (
  `identidade` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `entidade`
--

INSERT INTO `entidade` (`identidade`, `nome`) VALUES
(1, 'Gazin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `log_ticket`
--

CREATE TABLE `log_ticket` (
  `idlogticket` int(11) NOT NULL,
  `idticket` int(11) NOT NULL,
  `datahora` datetime NOT NULL,
  `idatendente` int(11) NOT NULL,
  `idsituacaoticket` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `prioridade_ticket`
--

CREATE TABLE `prioridade_ticket` (
  `idprioridadeticket` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `prioridade_ticket`
--

INSERT INTO `prioridade_ticket` (`idprioridadeticket`, `nome`, `cor`) VALUES
(1, 'Baixa', '#3498db'),
(2, 'Média', '#f1c40f'),
(3, 'Alta', '#c0392b');

-- --------------------------------------------------------

--
-- Estrutura da tabela `situacao_ticket`
--

CREATE TABLE `situacao_ticket` (
  `idsituacaoticket` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `situacao_ticket`
--

INSERT INTO `situacao_ticket` (`idsituacaoticket`, `nome`) VALUES
(1, 'Pendente'),
(2, 'Em progresso'),
(3, 'Finalizado'),
(4, 'Cancelado'),
(5, 'Recusado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ticket`
--

CREATE TABLE `ticket` (
  `idticket` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `datahoraabertura` datetime NOT NULL,
  `datahorafechamento` datetime DEFAULT NULL,
  `dataprevisao` date DEFAULT NULL,
  `idusuario` int(11) NOT NULL,
  `idatendente` int(11) DEFAULT NULL,
  `idtipoticket` int(11) NOT NULL,
  `idcategoriaticket` int(11) NOT NULL,
  `idsituacaoticket` int(11) NOT NULL,
  `idprioridadeticket` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `navegador` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ticket`
--

INSERT INTO `ticket` (`idticket`, `titulo`, `descricao`, `datahoraabertura`, `datahorafechamento`, `dataprevisao`, `idusuario`, `idatendente`, `idtipoticket`, `idcategoriaticket`, `idsituacaoticket`, `idprioridadeticket`, `ip`, `navegador`) VALUES
(38, 'Preciso de uma visão no qlik', 'UHJlY2lzbyBkZSB1bWEgdmlzw6NvIGNvbSBvIHBpcyBkb3MgbW90b3Jpc3RhcyBjYWRhZHRyYWRvcywgZSBhIGZhaXhhIHNhbGFyaWFsIGRlIGNhZGEgdW0=', '2019-12-28 10:21:10', '0000-00-00 00:00:00', '2019-12-30', 2, 1, 3, 1, 2, 1, '172.17.8.56', 'Chrome'),
(39, 'Preciso de um app que calcule', 'UHJlY2lzbyBkZSB1bSBhcHAgcXVlIGNhbGN1bGUgYSBkaXN0YW5jaWEgZG8gdHJhamV0byBlIHRyYWdhIGEgcXVhbnRpZGFkZSBkZSBjb21idXN0aXZlbCBuZWNlc3NhcmlhLg==', '2019-12-28 10:35:51', '0000-00-00 00:00:00', '0000-00-00', 2, NULL, 3, 15, 1, 1, '172.17.8.56', 'Chrome'),
(40, 'Como eu faço para acessar as visoes', 'TsOjbyBlc3RvdSBjb25zZWd1aW5kbyBhY2Vzc2FyIGFzIHZpc8O1ZXMgZG8gcWxpay4gUHJlY2lzbyBkZSB1bSB1c3VhcmlvIGUgc2VuaGEu', '2019-12-28 10:37:13', '0000-00-00 00:00:00', '2019-12-31', 2, 1, 1, 1, 3, 1, '172.17.8.56', 'Chrome'),
(41, 'Não estou conseguindo deletar', 'TXVpdG8gYm9tIGRpYSwgcHJlY2lzbyBkZWxldGFyIHVtIGFnZW5kYW1lbnRvIGxhbsOnYWRvIGVycmFkbyBlIG7Do28gZXN0b3UgY29uc2VndWluZG8uIFBvciBmYXZvciwgYWRpY2lvbmUgYSBvcMOnw6NvIHBhcmEgZXhjbHVpci4=', '2019-12-28 10:38:13', '0000-00-00 00:00:00', '2019-12-29', 2, 1, 2, 7, 2, 3, '172.17.8.56', 'Chrome'),
(42, 'Inserção de km', 'TXVpdG8gYm9tIGRpYSwgZmF2b3IgYW5hbGlzYXIgYSBpbnNlcsOnw6NvIGRlIGttIHF1ZSBsaW1pdGEgbyBibGEgYmxhIGJsYQ==', '2019-12-28 10:51:17', '0000-00-00 00:00:00', '2020-01-10', 2, 1, 3, 11, 2, 2, '172.17.8.56', 'Chrome'),
(43, 'Como deixar o cabeçalho fixo', 'Q29tbyBkZWl4YXIgbyBjYWJlw6dhbGhvIGZpeG8gbm8gZXhjZWwu', '2019-12-28 11:20:33', '0000-00-00 00:00:00', NULL, 2, NULL, 1, 4, 1, 1, '172.17.8.56', 'Chrome');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipousuario`
--

CREATE TABLE `tipousuario` (
  `idtipousuario` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipousuario`
--

INSERT INTO `tipousuario` (`idtipousuario`, `nome`) VALUES
(1, 'Básico'),
(3, 'Gerencial');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_ticket`
--

CREATE TABLE `tipo_ticket` (
  `idtipoticket` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipo_ticket`
--

INSERT INTO `tipo_ticket` (`idtipoticket`, `nome`) VALUES
(1, 'Dúvidas de usuário'),
(2, 'Erros de sistema'),
(3, 'Desenvolvimento');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `status` enum('A','I') NOT NULL,
  `nome` varchar(255) NOT NULL,
  `telefone` varchar(11) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `idtipousuario` int(11) NOT NULL,
  `identidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idusuario`, `status`, `nome`, `telefone`, `email`, `senha`, `idtipousuario`, `identidade`) VALUES
(2, 'A', 'Luana Isabela dos Santos', '44991145646', 'luana.santos@gazin.com.br', 'de979380332bcdff326f9aa2571e78bc003edf41', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anexo_ticket`
--
ALTER TABLE `anexo_ticket`
  ADD PRIMARY KEY (`idanexoticket`),
  ADD KEY `fk_idticket` (`idanexoticket`);

--
-- Indexes for table `atendente`
--
ALTER TABLE `atendente`
  ADD PRIMARY KEY (`idatendente`);

--
-- Indexes for table `categoria_ticket`
--
ALTER TABLE `categoria_ticket`
  ADD PRIMARY KEY (`idcategoriaticket`),
  ADD UNIQUE KEY `nome_UNIQUE` (`nome`);

--
-- Indexes for table `entidade`
--
ALTER TABLE `entidade`
  ADD PRIMARY KEY (`identidade`);

--
-- Indexes for table `log_ticket`
--
ALTER TABLE `log_ticket`
  ADD PRIMARY KEY (`idlogticket`),
  ADD KEY `fk_log_ticket_ticket1_idx` (`idticket`),
  ADD KEY `fk_log_ticket_atendente1_idx` (`idatendente`),
  ADD KEY `fk_log_ticket_situacao_ticket1_idx` (`idsituacaoticket`);

--
-- Indexes for table `prioridade_ticket`
--
ALTER TABLE `prioridade_ticket`
  ADD PRIMARY KEY (`idprioridadeticket`);

--
-- Indexes for table `situacao_ticket`
--
ALTER TABLE `situacao_ticket`
  ADD PRIMARY KEY (`idsituacaoticket`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`idticket`),
  ADD KEY `fk_ticket_atendente1_idx` (`idatendente`),
  ADD KEY `fk_ticket_tipoticket1_idx` (`idtipoticket`),
  ADD KEY `fk_ticket_usuario1_idx` (`idusuario`),
  ADD KEY `fk_ticket_categoria_ticket1_idx` (`idcategoriaticket`),
  ADD KEY `fk_ticket_situacao_ticket1_idx` (`idsituacaoticket`),
  ADD KEY `fk_ticket_prioridade_ticket1_idx` (`idprioridadeticket`);

--
-- Indexes for table `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`idtipousuario`);

--
-- Indexes for table `tipo_ticket`
--
ALTER TABLE `tipo_ticket`
  ADD PRIMARY KEY (`idtipoticket`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD KEY `fk_usuario_tipousuario_idx` (`idtipousuario`),
  ADD KEY `fk_usuario_entidade1_idx` (`identidade`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anexo_ticket`
--
ALTER TABLE `anexo_ticket`
  MODIFY `idanexoticket` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `atendente`
--
ALTER TABLE `atendente`
  MODIFY `idatendente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categoria_ticket`
--
ALTER TABLE `categoria_ticket`
  MODIFY `idcategoriaticket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `entidade`
--
ALTER TABLE `entidade`
  MODIFY `identidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `log_ticket`
--
ALTER TABLE `log_ticket`
  MODIFY `idlogticket` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prioridade_ticket`
--
ALTER TABLE `prioridade_ticket`
  MODIFY `idprioridadeticket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `situacao_ticket`
--
ALTER TABLE `situacao_ticket`
  MODIFY `idsituacaoticket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `idticket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `idtipousuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tipo_ticket`
--
ALTER TABLE `tipo_ticket`
  MODIFY `idtipoticket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `log_ticket`
--
ALTER TABLE `log_ticket`
  ADD CONSTRAINT `fk_log_ticket_atendente1` FOREIGN KEY (`idatendente`) REFERENCES `atendente` (`idatendente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_log_ticket_situacao_ticket1` FOREIGN KEY (`idsituacaoticket`) REFERENCES `situacao_ticket` (`idsituacaoticket`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_log_ticket_ticket1` FOREIGN KEY (`idticket`) REFERENCES `ticket` (`idticket`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `fk_ticket_atendente1` FOREIGN KEY (`idatendente`) REFERENCES `atendente` (`idatendente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ticket_categoria_ticket1` FOREIGN KEY (`idcategoriaticket`) REFERENCES `categoria_ticket` (`idcategoriaticket`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ticket_prioridade_ticket1` FOREIGN KEY (`idprioridadeticket`) REFERENCES `prioridade_ticket` (`idprioridadeticket`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ticket_situacao_ticket1` FOREIGN KEY (`idsituacaoticket`) REFERENCES `situacao_ticket` (`idsituacaoticket`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ticket_tipoticket1` FOREIGN KEY (`idtipoticket`) REFERENCES `tipo_ticket` (`idtipoticket`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ticket_usuario1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_entidade1` FOREIGN KEY (`identidade`) REFERENCES `entidade` (`identidade`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idtipousuario` FOREIGN KEY (`idtipousuario`) REFERENCES `tipousuario` (`idtipousuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
