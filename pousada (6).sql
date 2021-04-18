-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 25-Abr-2019 às 21:16
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pousada`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `apresentacao`
--

CREATE TABLE IF NOT EXISTS `apresentacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(20) NOT NULL,
  `texto` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `apresentacao`
--

INSERT INTO `apresentacao` (`id`, `titulo`, `texto`) VALUES
(1, 'Reserve-se', 'FaÃ§a sua reserva com apenas alguns cliques, sem sair de casa e com um precinho camarada.'),
(2, 'Restaurante', 'Usufrua de um restaurante completo e um cafÃ© da manhÃ£ por nossa conta.'),
(3, 'Transporte', 'Nossa pousada fica muito bem localizada, prÃ³ximo Ã  rotas de tÃ¡xis e vans.'),
(4, 'Spa', 'Contamos com uma equipe especializada em estÃ©tica e relaxamento.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `bgimagens`
--

CREATE TABLE IF NOT EXISTS `bgimagens` (
  `section` varchar(30) NOT NULL,
  `src` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `bgimagens`
--

INSERT INTO `bgimagens` (`section`, `src`) VALUES
('home', '_images/_index/15562194925cc206641f806.jpg'),
('localizacao', '_images/_index/15562196695cc20715097d8.jpg'),
('apresentacao', '_images/_index/15562197115cc2073f46278.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `capa`
--

CREATE TABLE IF NOT EXISTS `capa` (
  `tituloCapa` varchar(100) DEFAULT NULL,
  `subtituloCapa` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `capa`
--

INSERT INTO `capa` (`tituloCapa`, `subtituloCapa`) VALUES
('Aproveite o Clima Serrano', 'HOSPEDE-SE CONOSCO!');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL DEFAULT '0',
  `cpf_cliente` varchar(15) NOT NULL DEFAULT '0',
  `email` varchar(100) NOT NULL DEFAULT '0',
  `newsletter` int(11) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  PRIMARY KEY (`id_cliente`),
  UNIQUE KEY `cpf_cliente` (`cpf_cliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=57 ;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nome`, `cpf_cliente`, `email`, `newsletter`, `cidade`, `estado`, `telefone`) VALUES
(44, 'José Warlys', '054.517.093-19', 'warlyndo@gmail.com', 1, 'Tianguá', 'Ceará (CE)', '(88) 99499-1997'),
(54, 'Alex Lima Rusbé', '058.629.973-42', 'alextexas@gmail.com', 0, 'São Paulo', 'São Paulo (SP)', '(23) 23232-3232'),
(56, 'Thiago Moita Fernandes', '082.841.463-71', 'thiagofernan8@gmail.com', 1, 'Tianguá', 'Ceará (CE)', '(23) 23233-2323');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes_contato`
--

CREATE TABLE IF NOT EXISTS `clientes_contato` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL,
  `cidade` varchar(25) NOT NULL,
  `estado` varchar(40) NOT NULL,
  `newsletter` int(11) NOT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Extraindo dados da tabela `clientes_contato`
--

INSERT INTO `clientes_contato` (`id_cliente`, `nome`, `email`, `cidade`, `estado`, `newsletter`) VALUES
(22, 'Thiago Moita', 'thiagofernan-@hotmail.com', 'Tianguá', 'Acre (AC)', 1),
(15, 'Thiago Moita', 'deede@efe.fef', 'ttet', 'Acre (AC)', 1),
(24, 'admin123', 'adminemail@gmail.com', 'Ipú', 'Pará (PA)', 1),
(27, 'Alex Texas', 'texas@uol.com', 'Los Angels', 'Goiás (GO)', 1),
(26, 'Antônio Fernandes', 'fernandes@mail.com', 'Sítio Bom Jesus 2', 'Piauí (PI)', 1),
(25, 'Zé Warlys', 'warlys@uol.com', 'Pintópolis', 'Pará (PA)', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cupom`
--

CREATE TABLE IF NOT EXISTS `cupom` (
  `id-cupom` int(11) NOT NULL AUTO_INCREMENT,
  `nome-cupom` varchar(50) DEFAULT '0',
  `token-cupom` varchar(50) DEFAULT '0',
  `descricao-cupom` varchar(50) DEFAULT NULL,
  `desconto-cupom` int(11) DEFAULT NULL,
  PRIMARY KEY (`id-cupom`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `dados`
--

CREATE TABLE IF NOT EXISTS `dados` (
  `enderecoDados` varchar(150) DEFAULT NULL,
  `link_airbnb` varchar(200) NOT NULL,
  `telefoneDados` varchar(20) DEFAULT NULL,
  `emailDados` varchar(150) DEFAULT NULL,
  `link_facebook` varchar(200) NOT NULL,
  `link_instagram` varchar(200) NOT NULL,
  `link_booking` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `dados`
--

INSERT INTO `dados` (`enderecoDados`, `link_airbnb`, `telefoneDados`, `emailDados`, `link_facebook`, `link_instagram`, `link_booking`) VALUES
('	Rua do meio, bairro do estÃ¡dio', 'www.airbnb.com', '	+55 (88) 99669-6969', 'info@new2.com', 'www.facebook.com', 'www.instagram.com', 'www.booking.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico`
--

CREATE TABLE IF NOT EXISTS `historico` (
  `id_reserva` int(255) NOT NULL AUTO_INCREMENT,
  `quarto` varchar(30) NOT NULL,
  `cpf_cliente` varchar(15) NOT NULL,
  `valor` float NOT NULL,
  `checkIn` varchar(20) NOT NULL,
  `checkOut` varchar(20) NOT NULL,
  PRIMARY KEY (`id_reserva`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=123 ;

--
-- Extraindo dados da tabela `historico`
--

INSERT INTO `historico` (`id_reserva`, `quarto`, `cpf_cliente`, `valor`, `checkIn`, `checkOut`) VALUES
(65, 'Premium', '082.841.463-71', 0, '2019-04-27', '2019-04-30'),
(64, 'Premium', '082.841.463-71', 0, '2019-04-27', '2019-04-30'),
(63, 'Deluxe', '082.841.463-71', 0, '2019-04-27', '2019-04-30'),
(62, 'Deluxe', '082.841.463-71', 0, '2019-04-27', '2019-04-30'),
(61, 'Premium', '082.841.463-71', 0, '2019-04-27', '2019-04-30'),
(60, 'Premium', '082.841.463-71', 0, '2019-04-27', '2019-04-30'),
(59, 'Premium', '082.841.463-71', 0, '2019-04-27', '2019-04-30'),
(58, 'Standart', '082.841.463-71', 0, '2019-04-27', '2019-04-30'),
(57, 'Standart', '082.841.463-71', 0, '2019-04-27', '2019-04-30'),
(56, 'Standart', '082.841.463-71', 0, '2019-04-27', '2019-04-30'),
(55, 'Standart', '082.841.463-71', 0, '2019-04-27', '2019-04-30'),
(54, 'Standart', '082.841.463-71', 0, '2019-04-27', '2019-04-30'),
(53, 'Premium', '082.841.463-71', 0, '2019-04-27', '2019-04-30'),
(52, 'Standart', '082.841.463-71', 0, '2019-04-23', '2019-04-26'),
(51, 'Standart', '082.841.463-71', 0, '2019-04-26', '2019-04-30'),
(50, 'Standart', '082.841.463-71', 0, '2019-04-27', '2019-04-29'),
(49, 'Deluxe', '082.841.463-71', 0, '2019-04-27', '2019-04-29'),
(48, 'Premium', '082.841.463-71', 0, '2019-04-26', '2019-04-27'),
(47, 'Premium', '082.841.463-71', 0, '2019-04-26', '2019-04-27'),
(46, 'Premium', '082.841.463-71', 0, '2019-04-26', '2019-04-27'),
(45, 'Standart', '082.841.463-71', 0, '2019-04-26', '2019-04-29'),
(44, 'Standart', '082.841.463-71', 0, '2019-04-01', '2019-04-02'),
(43, 'Standart', '082.841.463-71', 0, '2019-04-05', '2019-04-06'),
(42, 'Standart', '082.841.463-71', 0, '2019-04-05', '2019-04-06'),
(41, 'Standart', '082.841.463-71', 0, '2019-04-05', '2019-04-06'),
(40, 'Standart', '082.841.463-71', 0, '2019-04-17', '2019-04-18'),
(39, 'Standart', '082.841.463-71', 0, '2019-04-17', '2019-04-18'),
(38, 'Standart', '082.841.463-71', 0, '2019-04-27', '2019-04-30'),
(37, 'Standart', '082.841.463-71', 0, '2019-04-24', '2019-04-26'),
(36, 'Standart', '082.841.463-71', 0, '2019-04-10', '2019-04-12'),
(35, 'Standart', '082.841.463-71', 0, '2019-04-04', '2019-04-06'),
(34, 'Standart', '082.841.463-71', 0, '2019-04-04', '2019-04-06'),
(66, 'Premium', '082.841.463-71', 0, '2019-04-27', '2019-04-30'),
(67, 'Standart', '082.841.463-71', 0, '2019-04-27', '2019-05-15'),
(68, 'Premium', '082.841.463-71', 0, '2019-04-25', '2019-04-27'),
(69, 'Premium', '082.841.463-71', 0, '2019-04-25', '2019-04-27'),
(70, 'Premium', '082.841.463-71', 0, '2019-04-25', '2019-04-27'),
(71, 'Standart', '082.841.463-71', 0, '2019-04-29', '2019-04-30'),
(72, 'Standart', '082.841.463-71', 0, '2019-04-29', '2019-04-30'),
(73, 'Standart', '082.841.463-71', 0, '2019-04-29', '2019-04-30'),
(74, 'Standart', '082.841.463-71', 0, '2019-04-25', '2019-04-27'),
(75, 'Standart', '082.841.463-71', 0, '2019-04-25', '2019-04-27'),
(76, 'Standart', '058.629.973-42', 0, '2019-05-11', '2019-05-17'),
(77, 'Standart', '082.841.463-71', 0, '2019-04-25', '2019-04-27'),
(78, 'Deluxe', '082.841.463-71', 0, '2019-05-16', '2019-05-18'),
(79, 'Standart', '082.841.463-71', 9150, '2019-04-30', '2019-06-30'),
(80, 'Standart', '082.841.463-71', 150, '2019-04-29', '2019-04-30'),
(81, 'Deluxe', '082.841.463-71', 500, '2019-04-28', '2019-04-30'),
(82, 'Deluxe', '082.841.463-71', 500, '2019-05-25', '2019-05-27'),
(83, 'Premium', '082.841.463-71', 400, '2019-04-26', '2019-04-28'),
(84, 'Standart', '054.517.093-19', 150, '2019-04-25', '2019-04-26'),
(85, 'Standart', '054.517.093-19', 150, '2019-04-25', '2019-04-26'),
(86, 'Standart', '054.517.093-19', 150, '2019-04-25', '2019-04-26'),
(87, 'Standart', '054.517.093-19', 150, '2019-04-25', '2019-04-26'),
(88, 'Standart', '054.517.093-19', 150, '2019-04-25', '2019-04-26'),
(89, 'Standart', '054.517.093-19', 150, '2019-04-25', '2019-04-26'),
(90, 'Standart', '054.517.093-19', 150, '2019-04-25', '2019-04-26'),
(91, 'Standart', '054.517.093-19', 150, '2019-04-25', '2019-04-26'),
(92, 'Standart', '054.517.093-19', 150, '2019-04-25', '2019-04-26'),
(93, 'Standart', '054.517.093-19', 150, '2019-04-25', '2019-04-26'),
(94, 'Standart', '054.517.093-19', 150, '2019-04-25', '2019-04-26'),
(95, 'Standart', '054.517.093-19', 150, '2019-04-25', '2019-04-26'),
(96, 'Standart', '054.517.093-19', 150, '2019-04-25', '2019-04-26'),
(97, 'Standart', '054.517.093-19', 150, '2019-04-25', '2019-04-26'),
(98, 'Standart', '054.517.093-19', 150, '2019-04-25', '2019-04-26'),
(99, 'Standart', '054.517.093-19', 150, '2019-04-25', '2019-04-26'),
(100, 'Standart', '054.517.093-19', 150, '2019-04-25', '2019-04-26'),
(101, 'Standart', '054.517.093-19', 150, '2019-04-25', '2019-04-26'),
(102, 'Standart', '054.517.093-19', 150, '2019-04-25', '2019-04-26'),
(103, 'Standart', '054.517.093-19', 150, '2019-04-25', '2019-04-26'),
(104, 'Standart', '054.517.093-19', 150, '2019-04-25', '2019-04-26'),
(105, 'Deluxe', '082.841.463-71', 750, '2019-04-27', '2019-04-30'),
(106, 'Deluxe', '082.841.463-71', 750, '2019-04-27', '2019-04-30'),
(107, 'Standart', '054.517.093-19', 150, '2019-04-26', '2019-04-27'),
(108, 'Standart', '054.517.093-19', 150, '2019-04-26', '2019-04-27'),
(109, 'Standart', '054.517.093-19', 150, '2019-04-26', '2019-04-27'),
(110, 'Premium', '054.517.093-19', 400, '2019-05-11', '2019-05-13'),
(111, 'Standart', '082.841.463-71', 150, '2019-04-27', '2019-04-28'),
(112, 'Standart', '058.629.973-42', 150, '2019-04-26', '2019-04-27'),
(113, 'Standart', '082.841.463-71', 150, '2019-04-27', '2019-04-28'),
(114, 'Standart', '082.841.463-71', 150, '2019-04-27', '2019-04-28'),
(115, 'Standart', '082.841.463-71', 150, '2019-04-27', '2019-04-28'),
(116, 'Standart', '082.841.463-71', 150, '2019-04-27', '2019-04-28'),
(117, 'Premium', '082.841.463-71', 600, '2019-04-27', '2019-04-30'),
(118, 'Deluxe', '082.841.463-71', 250, '2019-05-16', '2019-05-17'),
(119, 'Standart', '058.629.973-42', 450, '2019-05-17', '2019-05-20'),
(120, 'Standart', '058.629.973-42', 450, '2019-05-17', '2019-05-20'),
(121, 'Premium', '082.841.463-71', 400, '2019-04-27', '2019-04-29'),
(122, 'Deluxe', '082.841.463-71', 250, '2019-04-27', '2019-04-28');

-- --------------------------------------------------------

--
-- Estrutura da tabela `icons`
--

CREATE TABLE IF NOT EXISTS `icons` (
  `nome` varchar(50) NOT NULL,
  `src` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `icons`
--

INSERT INTO `icons` (`nome`, `src`) VALUES
('icon_dark', '_images/_logos/15561316325cc0af30dc517.png'),
('icon_light', '_images/_logos/15561316185cc0af225c021.png'),
('favicon', '_images/15561316185cc0af224e176.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `linksuteis`
--

CREATE TABLE IF NOT EXISTS `linksuteis` (
  `nome` varchar(30) NOT NULL,
  `texto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `linksuteis`
--

INSERT INTO `linksuteis` (`nome`, `texto`) VALUES
('ganheCupons', 'Ao reservar o cliente recebe um cupom virtual, que servirÃ¡ para concorrer a diferentes premiaÃ§Ãµes como, descontos de atÃ© 50% do valor original, ou mesmo prÃªmios fisÃcos disponibilizados pela pousada.'),
('promocoes', 'Fique atento as promoÃ§Ãµes semanais que sÃ£o divulgadas no Instagram da pousada : @pousada_serrana, acompanhe-nos.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `localizacao`
--

CREATE TABLE IF NOT EXISTS `localizacao` (
  `titulo` varchar(30) NOT NULL,
  `subTitulo` varchar(30) NOT NULL,
  `texto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `localizacao`
--

INSERT INTO `localizacao` (`titulo`, `subTitulo`, `texto`) VALUES
('Bem-vindo a nossa pousada', 'Bem-vindo a pousada Serrana', 'A Pousada Serrana estÃ¡ localizada em TianguÃ¡, na Serra da Ibiapaba, um paraÃ­so de clima ameno e belezas naturais no extremo oeste do CearÃ¡, na divisa com o PiauÃ­, a pouco mais de 300km de Fortaleza. Cachoeiras, mirantes, bicas, trilhas ecolÃ³gicas e a belÃ­ssima flora compÃµem a paisagem de nossa regiÃ£o. HÃ¡ vÃ¡rios pontos de visitaÃ§Ã£o em todos os municÃ­pios da Serra, ideal para quem busca tranquilidade e um pouco de contato com a natureza.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `login_admin`
--

CREATE TABLE IF NOT EXISTS `login_admin` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL DEFAULT '0',
  `login` varchar(200) NOT NULL DEFAULT '0',
  `senha` varchar(255) NOT NULL DEFAULT '0',
  `ultimo_login` datetime DEFAULT NULL,
  `profile_img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nome_adm` (`nome`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `login_admin`
--

INSERT INTO `login_admin` (`id`, `nome`, `login`, `senha`, `ultimo_login`, `profile_img`) VALUES
(1, 'Administrador', 'admin123', '$2y$10$QK.rYK92vSUfUJkTVGg8XeU.1tEusMtpDIgxHiZOTaXUQZ2nVcrHq', '2019-04-25 15:38:41', '_images/_uploaded/15562022525cc1c30c33bde.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagem_contato`
--

CREATE TABLE IF NOT EXISTS `mensagem_contato` (
  `id_mensagem` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(40) NOT NULL,
  `assunto` varchar(30) NOT NULL,
  `mensagem` text NOT NULL,
  PRIMARY KEY (`id_mensagem`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Extraindo dados da tabela `mensagem_contato`
--

INSERT INTO `mensagem_contato` (`id_mensagem`, `email`, `assunto`, `mensagem`) VALUES
(12, 'deede@efe.fef', 'Sugestão', 'Eu sou obrigado a falar, essa pousada aqui tá uma porra!'),
(17, 'abcdefghijklmn@opqrstuvw.xyzabcde', 'Reclamação', 'abcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstu\r\n'),
(26, 'fernandes@mail.com', 'Sugestão', 'O site deveria possuir um sistema de pagamento online'),
(27, 'texas@uol.com', 'Reclamação', 'Não gostei do atendimento');

-- --------------------------------------------------------

--
-- Estrutura da tabela `privacidade`
--

CREATE TABLE IF NOT EXISTS `privacidade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `texto` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `privacidade`
--

INSERT INTO `privacidade` (`id`, `nome`, `texto`) VALUES
(1, 'servicos', 'A Pousada Serrana oferece a seus clientes um serviÃ§o de hospedagem de altÃ­ssima qualidade, junto de alimentaÃ§Ã£o, internet WI-FI, ar condicionado, frigobar, camas King Size dentro outros.'),
(2, 'sobreNos', 'Somos um estabelecimento com anos no mercado, que tem como objetivo oferecer o melhor serviÃ§o de hospedagem possÃ­vel. Seguimos todas as normal da ABNT e o regulamento geral dos meios de hospedagem'),
(3, 'termosUso', 'O cadastro dos dados errados é de total responsabilidade do cliente'),
(4, 'termosUso', 'Na data de check-in o cliente responsável pelo cadastro deverá levar documentos de identificação, e em casos de erros, a responsabilidade é do cliente'),
(9, 'termosUso', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `quartos`
--

CREATE TABLE IF NOT EXISTS `quartos` (
  `idQuarto` int(255) NOT NULL AUTO_INCREMENT,
  `numeroPessoas` int(255) NOT NULL DEFAULT '0',
  `camaQuarto` int(255) NOT NULL DEFAULT '0',
  `banheiroQuarto` int(255) NOT NULL DEFAULT '0',
  `area` float NOT NULL,
  `valor` float NOT NULL DEFAULT '0',
  `nomeQuarto` varchar(100) NOT NULL DEFAULT '0',
  `descricaoQuarto` varchar(1000) NOT NULL DEFAULT '0',
  `qtdQuartos` int(11) NOT NULL,
  PRIMARY KEY (`idQuarto`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `quartos`
--

INSERT INTO `quartos` (`idQuarto`, `numeroPessoas`, `camaQuarto`, `banheiroQuarto`, `area`, `valor`, `nomeQuarto`, `descricaoQuarto`, `qtdQuartos`) VALUES
(1, 2, 1, 1, 64, 150, 'Standart', 'Nem mais nem menos, apenas o essencial. Perfeito para quem busca passar a noite com conforto, seguranÃ§a e sem preocupaÃ§Ãµes. Perfeito para quem viaja sozinho ou com acompanhante.', 8),
(2, 3, 2, 2, 75, 200, 'Premium', 'Se hospede em uma acomodaÃ§Ãµes premium, com o mÃ¡ximo conforto e Ã³timo espaÃ§o para passar o dia e a noite. Perfeito para quem quer viajar com seu parceiro(a).', 3),
(3, 5, 3, 2, 10, 250, 'Deluxe', 'Desfrute de acomodaÃ§Ãµes com conforto presidencial, maior espaÃ§oo e tudo o que a pousada pode oferecer a vocÃª. Perfeito para quem quer viajar com a famÃ­lia.', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `quartos_images`
--

CREATE TABLE IF NOT EXISTS `quartos_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_quarto` varchar(100) NOT NULL,
  `src` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Extraindo dados da tabela `quartos_images`
--

INSERT INTO `quartos_images` (`id`, `nome_quarto`, `src`) VALUES
(2, 'standart', '_images/_index/15562003085cc1bb74caec1.jpg'),
(3, 'standart', '_images/_index/15562003085cc1bb74d4eeb.jpg'),
(4, 'premium', '_images/_index/15560927195cc0172f4d2f6.jpg'),
(5, 'premium', '_images/_index/15562003305cc1bb8a6412d.jpg'),
(6, 'premium', '_images/_index/15562003305cc1bb8a6f4e0.jpg'),
(8, 'deluxe', '_images/_index/15562003535cc1bba1b1f6f.jpg'),
(9, 'deluxe', '_images/_index/15562003535cc1bba1c11a3.jpg'),
(10, 'standart', '_images/_index/15562003085cc1bb74d953c.jpg'),
(12, 'premium', '_images/_index/15562003305cc1bb8a78952.jpg'),
(13, 'deluxe', '_images/_index/15562003535cc1bba1cb1cd.jpg'),
(14, 'standart', '_images/_index/15562003085cc1bb74e0e56.jpg'),
(15, 'deluxe', '_images/_index/15562003535cc1bba1d5db0.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `reserva`
--

CREATE TABLE IF NOT EXISTS `reserva` (
  `id_reserva` int(255) NOT NULL AUTO_INCREMENT,
  `quarto` varchar(20) NOT NULL,
  `pessoas` int(11) NOT NULL,
  `cpf_cliente` varchar(20) NOT NULL,
  `valor` float NOT NULL,
  `checkIn` date NOT NULL,
  `checkOut` date NOT NULL,
  PRIMARY KEY (`id_reserva`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=133 ;

--
-- Extraindo dados da tabela `reserva`
--

INSERT INTO `reserva` (`id_reserva`, `quarto`, `pessoas`, `cpf_cliente`, `valor`, `checkIn`, `checkOut`) VALUES
(119, 'Standart', 1, '054.517.093-19', 450, '2019-04-26', '2019-04-29'),
(131, 'Premium', 3, '082.841.463-71', 400, '2019-04-27', '2019-04-29'),
(132, 'Deluxe', 5, '082.841.463-71', 250, '2019-04-27', '2019-04-28'),
(128, 'Deluxe', 1, '082.841.463-71', 250, '2019-05-16', '2019-05-17'),
(129, 'Standart', 2, '058.629.973-42', 450, '2019-05-17', '2019-05-20'),
(130, 'Standart', 2, '058.629.973-42', 450, '2019-05-17', '2019-05-20');

-- --------------------------------------------------------

--
-- Estrutura da tabela `reservaimagens`
--

CREATE TABLE IF NOT EXISTS `reservaimagens` (
  `section` varchar(30) NOT NULL,
  `src` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `reservaimagens`
--

INSERT INTO `reservaimagens` (`section`, `src`) VALUES
('check-in', '_images/_index/15560733965cbfcbb462505.jpg'),
('check-out', '_images/_index/15562195905cc206c6a6b52.jpg'),
('clientes', '_images/_index/15562002465cc1bb360ad12.jpg'),
('quartos', '_images/_index/15560733965cbfcbb466144.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
