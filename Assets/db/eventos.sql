-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Set-2023 às 16:10
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `eventos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `eventos`
--

CREATE TABLE `eventos` (
  `evento_id` int(11) NOT NULL,
  `nome_evento` varchar(255) NOT NULL,
  `vagas_disponiveis` int(11) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_final` date NOT NULL,
  `numero_dias` int(11) NOT NULL,
  `horario_inicio` time NOT NULL,
  `horario_final` time NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `localizacao` varchar(255) NOT NULL,
  `nome_contato` varchar(255) NOT NULL,
  `telefone_contato` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `eventos`
--

INSERT INTO `eventos` (`evento_id`, `nome_evento`, `vagas_disponiveis`, `data_inicio`, `data_final`, `numero_dias`, `horario_inicio`, `horario_final`, `endereco`, `localizacao`, `nome_contato`, `telefone_contato`) VALUES
(1, 'Evento A', 100, '2023-09-10', '2023-09-15', 6, '09:00:00', '18:00:00', 'Rua Evento A, 123', 'Local A', 'Contato A', '123-456-7890'),
(2, 'Evento B', 50, '2023-10-05', '2023-10-07', 3, '10:00:00', '17:00:00', 'Rua Evento B, 456', 'Local B', 'Contato B', '987-654-3210'),
(3, 'Evento C', 80, '2023-11-20', '2023-11-22', 3, '11:00:00', '19:00:00', 'Rua Evento C, 789', 'Local C', 'Contato C', '555-123-4567'),
(4, 'Evento D', 120, '2023-12-15', '2023-12-20', 6, '08:30:00', '17:30:00', 'Rua Evento D, 101', 'Local D', 'Contato D', '777-888-9999'),
(5, 'Evento E', 70, '2023-08-25', '2023-08-27', 3, '12:00:00', '20:00:00', 'Rua Evento E, 789', 'Local E', 'Contato E', '333-444-5555'),
(6, 'Teste Evento 01', 15, '2023-09-08', '2023-09-11', 4, '18:00:00', '22:00:00', 'Quadra 302 Conjunto 06 lote 01', 'Brasilia', 'Rodrigo Marques ', '61981962730'),
(7, 'Teste evento 2', 75, '2023-09-08', '2023-09-11', 4, '18:00:00', '22:00:00', 'Quadra 302 Conjunto 6 Lote 01', 'Samambaia ', 'RODRIGO MARQUES DOS SANTOS', '61981962730');

-- --------------------------------------------------------

--
-- Estrutura da tabela `motoristas`
--

CREATE TABLE `motoristas` (
  `motorista_id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `celular` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `motoristas`
--

INSERT INTO `motoristas` (`motorista_id`, `nome`, `email`, `celular`) VALUES
(1, 'Motorista 1', 'motorista1@email.com', '999-888-7777'),
(2, 'Motorista 2', 'motorista2@email.com', '222-111-0000'),
(3, 'Motorista 3', 'motorista3@email.com', '123-456-7890'),
(4, 'Motorista 4', 'motorista4@email.com', '777-888-9999'),
(5, 'Motorista 5', 'motorista5@email.com', '555-123-4567');

-- --------------------------------------------------------

--
-- Estrutura da tabela `presencas`
--

CREATE TABLE `presencas` (
  `presenca_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `evento_id` int(11) NOT NULL,
  `vai_de_onibus` tinyint(1) NOT NULL,
  `viagem_ida_id` int(11) DEFAULT NULL,
  `viagem_volta_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `presencas`
--

INSERT INTO `presencas` (`presenca_id`, `usuario_id`, `evento_id`, `vai_de_onibus`, `viagem_ida_id`, `viagem_volta_id`) VALUES
(1, 1, 1, 1, 1, 2),
(2, 2, 1, 1, 1, 2),
(3, 3, 2, 1, 3, NULL),
(4, 4, 3, 1, 4, 5),
(5, 5, 4, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario_id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `celular` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `nome`, `email`, `celular`) VALUES
(1, 'Usuário 1', 'usuario1@email.com', '111-222-3333'),
(2, 'Usuário 2', 'usuario2@email.com', '444-555-6666'),
(3, 'Usuário 3', 'usuario3@email.com', '777-888-9999'),
(4, 'Usuário 4', 'usuario4@email.com', '123-456-7890'),
(5, 'Usuário 5', 'usuario5@email.com', '555-123-4567'),
(6, 'Rodrigo marques', 'rodrigoicco@gmail.com', '(61) 98196-2730');

-- --------------------------------------------------------

--
-- Estrutura da tabela `viagens`
--

CREATE TABLE `viagens` (
  `viagem_id` int(11) NOT NULL,
  `evento_id` int(11) NOT NULL,
  `data_viagem` date NOT NULL,
  `valor_passagem` decimal(10,2) NOT NULL,
  `numero_viagens` int(11) NOT NULL,
  `vagas_disponiveis_ida` int(11) NOT NULL,
  `vagas_disponiveis_volta` int(11) NOT NULL,
  `partida` time NOT NULL,
  `volta` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `viagens`
--

INSERT INTO `viagens` (`viagem_id`, `evento_id`, `data_viagem`, `valor_passagem`, `numero_viagens`, `vagas_disponiveis_ida`, `vagas_disponiveis_volta`, `partida`, `volta`) VALUES
(1, 1, '2023-09-12', '50.00', 2, 40, 40, '00:00:00', '00:00:00'),
(2, 1, '2023-09-13', '50.00', 2, 40, 40, '00:00:00', '00:00:00'),
(3, 2, '2023-10-06', '30.00', 1, 20, 20, '00:00:00', '00:00:00'),
(4, 3, '2023-11-21', '40.00', 2, 30, 30, '00:00:00', '00:00:00'),
(5, 4, '2023-12-18', '60.00', 2, 60, 60, '00:00:00', '00:00:00');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`evento_id`);

--
-- Índices para tabela `motoristas`
--
ALTER TABLE `motoristas`
  ADD PRIMARY KEY (`motorista_id`);

--
-- Índices para tabela `presencas`
--
ALTER TABLE `presencas`
  ADD PRIMARY KEY (`presenca_id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `evento_id` (`evento_id`),
  ADD KEY `viagem_ida_id` (`viagem_ida_id`),
  ADD KEY `viagem_volta_id` (`viagem_volta_id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario_id`);

--
-- Índices para tabela `viagens`
--
ALTER TABLE `viagens`
  ADD PRIMARY KEY (`viagem_id`),
  ADD KEY `evento_id` (`evento_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `eventos`
--
ALTER TABLE `eventos`
  MODIFY `evento_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `motoristas`
--
ALTER TABLE `motoristas`
  MODIFY `motorista_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `presencas`
--
ALTER TABLE `presencas`
  MODIFY `presenca_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `viagens`
--
ALTER TABLE `viagens`
  MODIFY `viagem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `presencas`
--
ALTER TABLE `presencas`
  ADD CONSTRAINT `presencas_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`usuario_id`),
  ADD CONSTRAINT `presencas_ibfk_2` FOREIGN KEY (`evento_id`) REFERENCES `eventos` (`evento_id`),
  ADD CONSTRAINT `presencas_ibfk_3` FOREIGN KEY (`viagem_ida_id`) REFERENCES `viagens` (`viagem_id`),
  ADD CONSTRAINT `presencas_ibfk_4` FOREIGN KEY (`viagem_volta_id`) REFERENCES `viagens` (`viagem_id`);

--
-- Limitadores para a tabela `viagens`
--
ALTER TABLE `viagens`
  ADD CONSTRAINT `viagens_ibfk_1` FOREIGN KEY (`evento_id`) REFERENCES `eventos` (`evento_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
