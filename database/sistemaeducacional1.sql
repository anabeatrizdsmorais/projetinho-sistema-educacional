-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05/11/2023 às 21:22
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sistemaeducacional1`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `adm`
--

CREATE TABLE `adm` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `CPF` int(11) DEFAULT NULL,
  `inativo` set('sim','nao') DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `alunos`
--

CREATE TABLE `alunos` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `nome` varchar(100) NOT NULL,
  `data_nascimento` date DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `curso_id` int(11) DEFAULT NULL,
  `inativo` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `alunos`
--

INSERT INTO `alunos` (`id`, `user_id`, `nome`, `data_nascimento`, `endereco`, `email`, `curso_id`, `inativo`) VALUES
(8, NULL, 'ALUNO1', '2023-11-01', 'ALUNO1', 'ALUNO1@GMAIL.COM', 2, 0),
(9, NULL, 'ALUNO2', '2023-11-01', 'TESTES', 'ALUNO@HOTMAIL.COM', 3, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cursos`
--

CREATE TABLE `cursos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `inativo` set('sim','nao') DEFAULT NULL,
  `criado_em` date DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `origem` set('Exatas','Humanas','Biológica') DEFAULT NULL,
  `carga_horaria` varchar(10) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `descricao` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `cursos`
--

INSERT INTO `cursos` (`id`, `nome`, `inativo`, `criado_em`, `usuario`, `origem`, `carga_horaria`, `status`, `descricao`) VALUES
(2, 'CCO', NULL, NULL, NULL, 'Exatas', '380', 1, 'CCO'),
(3, 'SISTEMA', NULL, NULL, NULL, 'Exatas', '430', 1, '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `diario`
--

CREATE TABLE `diario` (
  `aluno_id` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `disciplina_id` int(11) DEFAULT NULL,
  `professor_id` int(11) DEFAULT NULL,
  `nota` decimal(3,0) DEFAULT NULL,
  `frequencia` set('P','A') DEFAULT NULL,
  `criado_em` date DEFAULT NULL,
  `conteudo` varchar(200) DEFAULT NULL,
  `situacao` set('aprovado','reprovado','cursando') DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `semestre` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `diario`
--

INSERT INTO `diario` (`aluno_id`, `id`, `disciplina_id`, `professor_id`, `nota`, `frequencia`, `criado_em`, `conteudo`, `situacao`, `usuario`, `semestre`) VALUES
(8, 4, 0, 13, 13, NULL, NULL, NULL, '', NULL, ''),
(9, 5, 0, 14, 999, NULL, NULL, NULL, '', NULL, '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `disciplinas`
--

CREATE TABLE `disciplinas` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `curso_id` int(11) DEFAULT NULL,
  `professor_id` int(100) DEFAULT NULL,
  `valor` decimal(10,2) DEFAULT NULL,
  `periodo` int(2) DEFAULT NULL,
  `criado_em` date DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `inscricoes`
--

CREATE TABLE `inscricoes` (
  `id` int(11) NOT NULL,
  `aluno_id` int(11) DEFAULT NULL,
  `curso_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `professores`
--

CREATE TABLE `professores` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `inativo` set('sim','nao') DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `especialidade` varchar(100) DEFAULT NULL,
  `telefone` int(11) DEFAULT NULL,
  `email_academico` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `professores`
--

INSERT INTO `professores` (`id`, `nome`, `user_id`, `inativo`, `usuario`, `especialidade`, `telefone`, `email_academico`) VALUES
(13, 'FILIPE', 1, NULL, NULL, 'CCO', 424242, 'FILIPE@UNICA'),
(14, 'MATEUS', 2, NULL, NULL, 'SISTEMA', 2147483647, 'MATEUS@UNICA');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `login` varchar(100) DEFAULT NULL,
  `senha` varchar(36) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `criado_em` date DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `atualizado_em` datetime DEFAULT NULL,
  `nivel` enum('0','1','2','3') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `login`, `senha`, `nome`, `criado_em`, `usuario`, `atualizado_em`, `nivel`) VALUES
(1, 'TESTE', 'teste', 'TESTE', NULL, NULL, NULL, '0'),
(2, '3213213', 'prof', 'PROF', NULL, NULL, NULL, '2');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `adm`
--
ALTER TABLE `adm`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices de tabela `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `curso_id` (`curso_id`);

--
-- Índices de tabela `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `diario`
--
ALTER TABLE `diario`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `disciplinas`
--
ALTER TABLE `disciplinas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `professor_id` (`professor_id`),
  ADD KEY `curso_id` (`curso_id`);

--
-- Índices de tabela `inscricoes`
--
ALTER TABLE `inscricoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aluno_id` (`aluno_id`),
  ADD KEY `curso_id` (`curso_id`);

--
-- Índices de tabela `professores`
--
ALTER TABLE `professores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `adm`
--
ALTER TABLE `adm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `alunos`
--
ALTER TABLE `alunos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `diario`
--
ALTER TABLE `diario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `disciplinas`
--
ALTER TABLE `disciplinas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `inscricoes`
--
ALTER TABLE `inscricoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `professores`
--
ALTER TABLE `professores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `alunos`
--
ALTER TABLE `alunos`
  ADD CONSTRAINT `alunos_ibfk_1` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`);

--
-- Restrições para tabelas `disciplinas`
--
ALTER TABLE `disciplinas`
  ADD CONSTRAINT `disciplinas_ibfk_1` FOREIGN KEY (`professor_id`) REFERENCES `professores` (`id`),
  ADD CONSTRAINT `disciplinas_ibfk_2` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`);

--
-- Restrições para tabelas `inscricoes`
--
ALTER TABLE `inscricoes`
  ADD CONSTRAINT `inscricoes_ibfk_1` FOREIGN KEY (`aluno_id`) REFERENCES `alunos` (`id`),
  ADD CONSTRAINT `inscricoes_ibfk_2` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`);

--
-- Restrições para tabelas `professores`
--
ALTER TABLE `professores`
  ADD CONSTRAINT `professores_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
