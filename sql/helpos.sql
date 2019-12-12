-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 12-Dez-2019 às 19:39
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
  `url` text
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
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria_ticket`
--

CREATE TABLE `categoria_ticket` (
  `idticketcategoria` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `entidade`
--

CREATE TABLE `entidade` (
  `identidade` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

-- --------------------------------------------------------

--
-- Estrutura da tabela `situacao_ticket`
--

CREATE TABLE `situacao_ticket` (
  `idsituacaoticket` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ticket`
--

CREATE TABLE `ticket` (
  `idticket` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `datahoraabertura` datetime NOT NULL,
  `datahorafechamento` datetime NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idatendente` int(11) NOT NULL,
  `idtipoticket` int(11) NOT NULL,
  `idticketcategoria` int(11) NOT NULL,
  `idanexoticket` int(11) NOT NULL,
  `idsituacaoticket` int(11) NOT NULL,
  `idprioridadeticket` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipousuario`
--

CREATE TABLE `tipousuario` (
  `idtipousuario` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_ticket`
--

CREATE TABLE `tipo_ticket` (
  `idtipoticket` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Indexes for dumped tables
--

--
-- Indexes for table `anexo_ticket`
--
ALTER TABLE `anexo_ticket`
  ADD PRIMARY KEY (`idanexoticket`);

--
-- Indexes for table `atendente`
--
ALTER TABLE `atendente`
  ADD PRIMARY KEY (`idatendente`);

--
-- Indexes for table `categoria_ticket`
--
ALTER TABLE `categoria_ticket`
  ADD PRIMARY KEY (`idticketcategoria`),
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
  ADD KEY `fk_ticket_categoria_ticket1_idx` (`idticketcategoria`),
  ADD KEY `fk_ticket_anexo_ticket1_idx` (`idanexoticket`),
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
  MODIFY `idatendente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categoria_ticket`
--
ALTER TABLE `categoria_ticket`
  MODIFY `idticketcategoria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `entidade`
--
ALTER TABLE `entidade`
  MODIFY `identidade` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log_ticket`
--
ALTER TABLE `log_ticket`
  MODIFY `idlogticket` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prioridade_ticket`
--
ALTER TABLE `prioridade_ticket`
  MODIFY `idprioridadeticket` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `situacao_ticket`
--
ALTER TABLE `situacao_ticket`
  MODIFY `idsituacaoticket` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `idticket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `idtipousuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tipo_ticket`
--
ALTER TABLE `tipo_ticket`
  MODIFY `idtipoticket` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `fk_ticket_anexo_ticket1` FOREIGN KEY (`idanexoticket`) REFERENCES `anexo_ticket` (`idanexoticket`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ticket_atendente1` FOREIGN KEY (`idatendente`) REFERENCES `atendente` (`idatendente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ticket_categoria_ticket1` FOREIGN KEY (`idticketcategoria`) REFERENCES `categoria_ticket` (`idticketcategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
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
