-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01-Mar-2023 às 11:51
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `jovem_db`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `pass` varchar(8) DEFAULT NULL,
  `username` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `admin`
--

INSERT INTO `admin` (`id`, `pass`, `username`) VALUES
(1, 'admin123', 'adminuser'),
(2, '432adm', 'usadimin'),
(3, 'admin', '1234'),
(4, '1234', 'admin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `formando`
--

CREATE TABLE `formando` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `formatura_id` int(11) NOT NULL,
  `turma` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `formando`
--

INSERT INTO `formando` (`id`, `nome`, `img`, `formatura_id`, `turma`) VALUES
(12, 'André', 'imgs/formatura/19/63b5617bda680.jpg', 19, '3C'),
(13, 'Paulo', 'imgs/formatura/19/63b5626d8e46e.jpg', 19, '3A'),
(15, 'André', 'imgs/formatura/19/63b5629dbec70.jpg', 19, '3C'),
(16, 'André', 'imgs/formatura/19/63b562db05c99.jpg', 19, '3C'),
(17, 'André', 'imgs/formatura/19/63b562fc9bddd.jpg', 19, '3C'),
(18, 'André', 'imgs/formatura/19/63b566b976396.jpg', 19, '3C'),
(19, 'André', 'imgs/formatura/19/63b566c01720c.jpg', 19, '3C'),
(20, 'Josué', 'imgs/formatura/19/63b5676273657.jpeg', 19, '3A'),
(21, 'Josué', 'imgs/formatura/19/63b5676717e3b.jpeg', 19, '3A'),
(22, 'Josué', 'imgs/formatura/19/63b5676a361fa.jpeg', 19, '3A'),
(23, 'Josué', 'imgs/formatura/19/63b5676c2144a.jpeg', 19, '3A'),
(24, 'Josué', 'imgs/formatura/19/63b56770c16e3.jpeg', 19, '3A'),
(25, 'Josué', 'imgs/formatura/19/63b567747c004.jpeg', 19, '3A'),
(26, 'Josué', 'imgs/formatura/19/63b5677921c9d.jpeg', 19, '3A'),
(27, 'oaufboaujen', 'imgs/formatura/19/63b6d7419f732.png', 19, '3B');

-- --------------------------------------------------------

--
-- Estrutura da tabela `formatura`
--

CREATE TABLE `formatura` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `ano_form` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `formatura`
--

INSERT INTO `formatura` (`id`, `descricao`, `ano_form`) VALUES
(19, 'Formatura realizada com as TURMAS', 2020),
(20, 'Formatura realizada em 2021', 2021);

-- --------------------------------------------------------

--
-- Estrutura da tabela `form_academica`
--

CREATE TABLE `form_academica` (
  `id` int(11) NOT NULL,
  `formacao` varchar(255) NOT NULL,
  `prof_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `form_academica`
--

INSERT INTO `form_academica` (`id`, `formacao`, `prof_id`) VALUES
(40, '', 36),
(41, '', 36);

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagens`
--

CREATE TABLE `imagens` (
  `id` int(11) NOT NULL,
  `nome_img` varchar(220) NOT NULL,
  `extensao` varchar(5) NOT NULL,
  `projeto_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `imagens`
--

INSERT INTO `imagens` (`id`, `nome_img`, `extensao`, `projeto_id`) VALUES
(22, '63a0ea83300b3', 'jpg', 19),
(23, '63a0ee4b1a15c', 'jpg', 19),
(24, '63a10f2862d19', 'jpeg', 25),
(25, '63a10f2863f7f', 'jpeg', 25);

-- --------------------------------------------------------

--
-- Estrutura da tabela `img_formatura`
--

CREATE TABLE `img_formatura` (
  `id` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  `formatura_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `img_formatura`
--

INSERT INTO `img_formatura` (`id`, `path`, `formatura_id`) VALUES
(14, 'imgs/formatura/19/63b5611455d03.jpeg', 19),
(15, 'imgs/formatura/19/63b56114601e4.jpeg', 19),
(16, 'imgs/formatura/19/63b561146138e.jpg', 19),
(17, 'imgs/formatura/20/63d133655d6e4.jpg', 20);

-- --------------------------------------------------------

--
-- Estrutura da tabela `materia`
--

CREATE TABLE `materia` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `materia`
--

INSERT INTO `materia` (`id`, `nome`) VALUES
(1, 'Biologia'),
(2, 'Português'),
(3, 'Matemática'),
(4, 'História'),
(6, 'Física'),
(7, 'Sociologia'),
(8, 'Filosofia'),
(9, 'Química');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pivot_materias`
--

CREATE TABLE `pivot_materias` (
  `prof_id` int(11) NOT NULL,
  `mat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pivot_materias`
--

INSERT INTO `pivot_materias` (`prof_id`, `mat_id`) VALUES
(38, 1),
(38, 4),
(36, 6),
(39, 9),
(35, 4),
(35, 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE `professor` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `img_perfil` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`id`, `nome`, `email`, `descricao`, `img_perfil`) VALUES
(35, 'Sabrina', 'sa@gmail.com', 'sobre', 'imgs/professores/63a614bb33397.jpeg'),
(36, 'Helmo', 'helm@gmail.com', 'Fisico ', 'imgs/professores/63a622b8290a1.jpg'),
(38, 'Tereza', 'tete@gmail.com', 'amor pela música', 'imgs/professores/63a9a2d7831e6.jpeg'),
(39, 'Sara', 'sara@gmail.com', 'Don\'t Call Me Angel', 'imgs/professores/63a9a605dfdee.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `projeto`
--

CREATE TABLE `projeto` (
  `id` int(11) NOT NULL,
  `titulo` varchar(85) NOT NULL,
  `descricao` text NOT NULL,
  `data_projeto` date NOT NULL,
  `laboratorio` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `projeto`
--

INSERT INTO `projeto` (`id`, `titulo`, `descricao`, `data_projeto`, `laboratorio`) VALUES
(19, 'Gato sorridente', 'descricao', '2022-12-26', 4),
(25, 'Shibas felizes', 'Muitos shibas.', '2022-10-16', 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `formando`
--
ALTER TABLE `formando`
  ADD PRIMARY KEY (`id`),
  ADD KEY `formatura_id` (`formatura_id`);

--
-- Índices para tabela `formatura`
--
ALTER TABLE `formatura`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `form_academica`
--
ALTER TABLE `form_academica`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_academica_ibfk_1` (`prof_id`);

--
-- Índices para tabela `imagens`
--
ALTER TABLE `imagens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `imagens_ibfk_1` (`projeto_id`);

--
-- Índices para tabela `img_formatura`
--
ALTER TABLE `img_formatura`
  ADD PRIMARY KEY (`id`),
  ADD KEY `formatura_id` (`formatura_id`);

--
-- Índices para tabela `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pivot_materias`
--
ALTER TABLE `pivot_materias`
  ADD KEY `pivot_materias_ibfk_1` (`prof_id`),
  ADD KEY `pivot_materias_ibfk_2` (`mat_id`);

--
-- Índices para tabela `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `projeto`
--
ALTER TABLE `projeto`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `formando`
--
ALTER TABLE `formando`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `formatura`
--
ALTER TABLE `formatura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `form_academica`
--
ALTER TABLE `form_academica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de tabela `imagens`
--
ALTER TABLE `imagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `img_formatura`
--
ALTER TABLE `img_formatura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `materia`
--
ALTER TABLE `materia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `professor`
--
ALTER TABLE `professor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de tabela `projeto`
--
ALTER TABLE `projeto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `formando`
--
ALTER TABLE `formando`
  ADD CONSTRAINT `formando_ibfk_1` FOREIGN KEY (`formatura_id`) REFERENCES `formatura` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `form_academica`
--
ALTER TABLE `form_academica`
  ADD CONSTRAINT `form_academica_ibfk_1` FOREIGN KEY (`prof_id`) REFERENCES `professor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `imagens`
--
ALTER TABLE `imagens`
  ADD CONSTRAINT `imagens_ibfk_1` FOREIGN KEY (`projeto_id`) REFERENCES `projeto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `imagens_ibfk_2` FOREIGN KEY (`projeto_id`) REFERENCES `projeto` (`id`);

--
-- Limitadores para a tabela `img_formatura`
--
ALTER TABLE `img_formatura`
  ADD CONSTRAINT `img_formatura_ibfk_1` FOREIGN KEY (`formatura_id`) REFERENCES `formatura` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `pivot_materias`
--
ALTER TABLE `pivot_materias`
  ADD CONSTRAINT `pivot_materias_ibfk_1` FOREIGN KEY (`prof_id`) REFERENCES `professor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pivot_materias_ibfk_2` FOREIGN KEY (`mat_id`) REFERENCES `materia` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
