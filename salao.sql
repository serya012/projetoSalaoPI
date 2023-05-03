-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Maio-2023 às 11:02
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
-- Banco de dados: `salao`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agenda`
--

CREATE TABLE `agenda` (
  `cod_agenda` int(10) NOT NULL,
  `hora_agenda` time NOT NULL,
  `data_agenda` date NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `id_servico` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `agenda`
--

INSERT INTO `agenda` (`cod_agenda`, `hora_agenda`, `data_agenda`, `id_usuario`, `id_servico`) VALUES
(14, '10:00:00', '2023-06-07', 5, 24),
(15, '17:00:00', '2023-06-02', 6, 37),
(16, '16:00:00', '2023-05-25', 5, 16);

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `id_funcionario` int(10) NOT NULL,
  `nome_funcionario` varchar(50) NOT NULL,
  `cpf_funcionario` varchar(14) NOT NULL,
  `data_nascimento_funcionario` date NOT NULL,
  `telefone_funcionario` varchar(14) NOT NULL,
  `email_funcionario` varchar(100) NOT NULL,
  `senha_funcionario` varchar(255) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `funcao` varchar(50) NOT NULL,
  `nivel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`id_funcionario`, `nome_funcionario`, `cpf_funcionario`, `data_nascimento_funcionario`, `telefone_funcionario`, `email_funcionario`, `senha_funcionario`, `endereco`, `funcao`, `nivel`) VALUES
(10, 'Administrador', '641.695.156-15', '2023-04-30', '(59)61891-9898', 'adm@gmail.com', '$2y$10$eT2FBxbhj6mwjvKM.alvnuPw5OiTA5s9sedIv1teitcRgLg0rXUoK', 'Rua 03', 'Teste', 2),
(11, 'Juliana', '455.556.566-66', '2015-02-04', '(56)16516-5156', 'juliana@gmail.com', '$2y$10$kE499cWZKHdbvucKwrFGS.9cvWm1qYjHkCpykKZv0ki6lyG/mceZa', 'Rua 34', 'Sócia', 2),
(12, 'Gilda', '321.350.816-51', '2003-07-21', '(98)41981-5605', 'gilda@gmail.com', '$2y$10$Vpg9VGnDb/zEujOlHggfLOzD.n6VRDuELb73MZMT7lOdxwL2hME8e', 'Rua Vinho', 'Sócia', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

CREATE TABLE `servico` (
  `id_servico` int(10) NOT NULL,
  `tipo_de_servico` varchar(50) NOT NULL,
  `servico` varchar(100) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `id_funcionario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `servico`
--

INSERT INTO `servico` (`id_servico`, `tipo_de_servico`, `servico`, `descricao`, `valor`, `id_funcionario`) VALUES
(14, 'cabelos', 'Coloração', 'é um procedimento químico que altera a coloração de seus cabelos', '60.00', 10),
(15, 'cabelos', 'Balayage', 'Lhe confere um look bronzeado e natural', '120.00', 11),
(16, 'cabelos', 'Escovas Modeladas', 'Modela seu cabelo', '50.00', 12),
(17, 'cabelos', 'Terapias Capilares', 'Trate seus cabelos', '80.00', 11),
(18, 'cabelos', 'Tratamentos Capilares', 'Hidrate, nutre, reconstrua...', '120.00', 11),
(19, 'cabelos', 'Cortes', 'Corte seus cabelos ', '50.00', 11),
(20, 'cabelos', 'Penteados soltos e presos', 'Técnicas tendências para você', '70.00', 11),
(21, 'cabelos', ' Alisamento', 'Alise seus cabelos', '80.00', 12),
(22, 'cabelos', 'Relaxamento', 'Dê um dia de descanso aos seus cabelos', '90.00', 11),
(23, 'cabelos', 'Alongamento dos fios', 'Alonga os fios', '80.00', 12),
(24, 'cabelos', 'Extensões', 'Deixe seus cabelos mais vivos e volumosos', '300.00', 12),
(25, 'maquiagem', 'Maquiagem', 'Maquiagem profissional', '100.00', 12),
(26, 'cilios e sobrancelhas', 'Colocação de Cílios', 'Melhores cílios do mercado', '50.00', 12),
(27, 'estetica', 'Limpeza de Pele', 'Cuidar da pele sempre faz bem', '150.00', 11),
(28, 'estetica', 'Peelings', 'Remoção das camadas mais superficiais da pele', '120.00', 11),
(29, 'estetica', 'Tratamento anti-aging', 'Trate sua idade como ela merece', '200.00', 12),
(30, 'estetica', 'Drenagem facial e corporal ', 'Trate como deve ser tratado', '200.00', 11),
(31, 'estetica', 'Massagens Relaxantes', 'Um dia de princesa precisa disso', '300.00', 11),
(32, 'estetica', 'Banho de Lua', '', '87.00', 11),
(33, 'estetica', 'Relaxamento', '', '100.00', 11),
(34, 'estetica', 'Esfoliação Corporal', '', '200.00', 12),
(35, 'estetica', 'Regeneração Facial', '', '80.00', 11),
(36, 'estetica', 'Revitalização', '', '150.00', 11),
(37, 'estetica', ' Hidratação', '', '60.00', 12),
(38, 'estetica', 'Depilação a Laser', '', '180.00', 11),
(39, 'estetica', 'Micropigmentação', '', '160.00', 11),
(40, 'estetica', 'Microblanding', '', '150.00', 11),
(41, 'cilios e sobrancelhas', 'Design de Sobrancelha Tradicional', '', '150.00', 11),
(42, 'cilios e sobrancelhas', 'Design de Sobrancelha com Linha ', '', '120.00', 12),
(43, 'cilios e sobrancelhas', 'Tintura de Sobrancelha', '', '170.00', 11),
(44, 'cilios e sobrancelhas', 'Sobrancelha com Henna', '', '60.00', 11),
(45, 'cilios e sobrancelhas', 'Tintura de Cílios', '', '40.00', 12),
(46, 'cilios e sobrancelhas', 'Micropigmentação', '', '120.00', 12),
(47, 'cilios e sobrancelhas', 'Microblanding', '', '90.00', 11),
(48, 'pes e maos', 'Manicure', '', '80.00', 11),
(49, 'pes e maos', 'Pedicure', '', '60.00', 11),
(50, 'cabelos', 'Esmaltação', '', '60.00', 11),
(51, 'pes e maos', 'Unhas Artísticas ', '', '70.00', 11),
(52, 'pes e maos', ' Esfoliação ', '', '50.00', 11),
(53, 'pes e maos', 'Reflexologia', '', '90.00', 11),
(54, 'pes e maos', 'Podologia', '', '60.00', 11);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(10) NOT NULL,
  `nome_usuario` varchar(100) NOT NULL,
  `cpf_usuario` varchar(100) NOT NULL,
  `telefone_usuario` varchar(14) NOT NULL,
  `email_usuario` varchar(100) NOT NULL,
  `senha_usuario` varchar(255) NOT NULL,
  `nivel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome_usuario`, `cpf_usuario`, `telefone_usuario`, `email_usuario`, `senha_usuario`, `nivel`) VALUES
(5, 'Thiago Viannay ', '180.992.929-29', '(21)94949-4949', 'thiago@gmail.com', '$2y$10$3cDXAMey6zoULe.8LfSoweQYHSaI7y5yAFVlg.UTrHYBrUTMIuvTG', 1),
(6, 'Patrick Andrade', '000.000.000-02', '(21)78789-897', 'patrick@gmail.com', '$2y$10$wC8IzXsBcLLG6AbXClyRCO2msnxIEDU4sB9Da7VUsxvjGSjZS0ypu', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`cod_agenda`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_servico` (`id_servico`);

--
-- Índices para tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id_funcionario`),
  ADD UNIQUE KEY `cpf_funcionario` (`cpf_funcionario`),
  ADD UNIQUE KEY `email_funcionario` (`email_funcionario`);

--
-- Índices para tabela `servico`
--
ALTER TABLE `servico`
  ADD PRIMARY KEY (`id_servico`),
  ADD KEY `id_funcionario` (`id_funcionario`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `cpf_usuario` (`cpf_usuario`,`email_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agenda`
--
ALTER TABLE `agenda`
  MODIFY `cod_agenda` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id_funcionario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `servico`
--
ALTER TABLE `servico`
  MODIFY `id_servico` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `agenda`
--
ALTER TABLE `agenda`
  ADD CONSTRAINT `agenda_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `agenda_ibfk_2` FOREIGN KEY (`id_servico`) REFERENCES `servico` (`id_servico`);

--
-- Limitadores para a tabela `servico`
--
ALTER TABLE `servico`
  ADD CONSTRAINT `servico_ibfk_1` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionario` (`id_funcionario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
