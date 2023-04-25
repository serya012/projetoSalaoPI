-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Abr-2023 às 19:46
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `agenda`
--

INSERT INTO `agenda` (`cod_agenda`, `hora_agenda`, `data_agenda`, `id_usuario`, `id_servico`) VALUES
(6, '16:00:00', '2023-05-18', 5, 12),
(9, '18:00:00', '2023-05-02', 5, 11),
(10, '14:00:00', '2023-05-06', 4, 11);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`id_funcionario`, `nome_funcionario`, `cpf_funcionario`, `data_nascimento_funcionario`, `telefone_funcionario`, `email_funcionario`, `senha_funcionario`, `endereco`, `funcao`, `nivel`) VALUES
(7, 'Thiago Viannay', '123.456.789-11', '2023-03-26', '(21)88888-8888', 'thiago@gmail.com', '$2y$10$kwfV6TZWo3qp3vOPRc10E.1IFq5VTKcNZXKsn3MqWplhtQPwi7Oui', 'Rua 2', 'Aluno', 2),
(8, 'Luiz André', '564.654.654-65', '2023-04-13', '(55)77777-7777', 'luiz@gmail.com', '$2y$10$MeS30d5VthDCcvSHUihIguxOTCcd8PTnSgw7qTdBQDst6IM8OT9NO', 'Rua 3', '123', 2),
(9, 'Patrick Vrau', '252.525.252-52', '2023-04-01', '(45)84949-4949', 'pk@gmail.com', '$2y$10$/uEG4CQ4r3vmaOZQsUH8W.zESnmU0PHKFHTHy6oAWvKTiaReaZplm', 'Rua 4', 'Aluno', 2);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `servico`
--

INSERT INTO `servico` (`id_servico`, `tipo_de_servico`, `servico`, `descricao`, `valor`, `id_funcionario`) VALUES
(11, 'cabelo', 'Cortar', 'Corta o cabelo', '30.00', 9),
(12, 'cabelo', 'Pintar ', 'Pinta o cabelo', '40.00', 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(10) NOT NULL,
  `nome_usuario` varchar(100) NOT NULL,
  `telefone_usuario` varchar(14) NOT NULL,
  `email_usuario` varchar(100) NOT NULL,
  `senha_usuario` varchar(255) NOT NULL,
  `nivel` int(11) NOT NULL,
  `cpf_usuario` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome_usuario`, `telefone_usuario`, `email_usuario`, `senha_usuario`, `nivel`, `cpf_usuario`) VALUES
(4, 'Thiago Viannay', '(21)99999-9999', 'thiago@gmail.com', '$2y$10$jEllmZoWSk4RZBSCdhjZweOGi6kS1M9I8ftFYS.K.ver13yrF6JH6', 1, '123.456.789-10'),
(5, 'Luiz André', '(21)99888-8888', 'luiz@gmail.com', '$2y$10$2W3fVyt6qIcUNpz6AJ49tuDnXIFtDOw3E9tAAoihmpebm2LuTjXMi', 1, '123.456.789-11'),
(6, 'Patrick Pk', '(21)77777-7777', 'patrick@gmail.com', '$2y$10$.mSqxGBvqd4WeXWkcQug4.Qg0NwmDszq0bE8jqJnxzyt9j5.KRNPW', 1, '123.456.789-12'),
(7, 'Ryan Botafogo', '(21)77777-7777', 'ryan@gmail.com', '$2y$10$kAUoh5E5KLujHhrq.Ukz3.8X11CxD8fzSbsvVBceWSPS06MhvU7rO', 1, '123.456.789-14');

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
  ADD PRIMARY KEY (`id_funcionario`);

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
  ADD UNIQUE KEY `cpf_usuario` (`cpf_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agenda`
--
ALTER TABLE `agenda`
  MODIFY `cod_agenda` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id_funcionario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `servico`
--
ALTER TABLE `servico`
  MODIFY `id_servico` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
