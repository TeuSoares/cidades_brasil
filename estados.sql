-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 18-Jan-2022 às 17:46
-- Versão do servidor: 5.7.36
-- versão do PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `limeiraweb_mateus`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `estados`
--

DROP TABLE IF EXISTS `estados`;
CREATE TABLE IF NOT EXISTS `estados` (
  `uf` varchar(5) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `pop2000` int(11) NOT NULL,
  `homens` int(11) NOT NULL,
  `mulheres` int(11) NOT NULL,
  `urbana` int(11) NOT NULL,
  `rural` int(11) NOT NULL,
  `pop2010` int(11) NOT NULL,
  `cidades` int(11) NOT NULL,
  `capital` varchar(100) NOT NULL,
  `gentilico` varchar(100) NOT NULL,
  `area` varchar(100) NOT NULL,
  `codEstado` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `estados`
--

INSERT INTO `estados` (`uf`, `estado`, `pop2000`, `homens`, `mulheres`, `urbana`, `rural`, `pop2010`, `cidades`, `capital`, `gentilico`, `area`, `codEstado`) VALUES
('AC', 'Acre', 557526, 367864, 364929, 532080, 200713, 732793, 22, 'Rio Branco', 'Acreano', '152.581,39', NULL),
('AL', 'Alagoas', 2822621, 1511947, 1608975, 2298091, 822831, 3120922, 102, 'Maceió', 'Alagoano', '27.767,66', NULL),
('AM', 'Amazonas', 2812557, 1751328, 1729609, 2755756, 725181, 3480937, 62, 'Manaus', 'Amazonense', '1.570.745,68', NULL),
('AP', 'Amapá', 477032, 334674, 334015, 600561, 68128, 668689, 16, 'Macapá', 'Amapaense', '142.814,59', NULL),
('BA', 'Bahia', 13070250, 6880368, 7141064, 10105218, 3916214, 14021432, 417, 'Salvador', 'Baiano', '564.692,67', NULL),
('CE', 'Ceará', 7430661, 4118066, 4329989, 6343990, 2104065, 8448055, 184, 'Fortaleza', 'Cearense', '148.825,60', NULL),
('DF', 'Distrito Federal', 2051146, 1225237, 1337726, 2476249, 86714, 2562963, 1, 'Brasília', 'Brasiliense', '5.801,94', NULL),
('ES', 'Espírito Santo', 3097232, 1729670, 1783002, 2928993, 583679, 3512672, 78, 'Vitória', 'Capixaba', '46.077,52', NULL),
('GO', 'Goiás', 5003228, 2981542, 3022503, 5421069, 582976, 6004045, 246, 'Goiânia', 'Goiano', '340.086,70', NULL),
('MA', 'Maranhão', 5651475, 3258860, 3310823, 4143728, 2425955, 6569683, 217, 'São Luis', 'Maranhense', '331.983,29', NULL),
('MG', 'Minas Gerais', 17891494, 9640695, 9954614, 16713654, 2881655, 19595309, 853, 'Belo Horizonte', 'Mineiro', '586.528,29', NULL),
('MS', 'Mato Grosso do Sul', 2078001, 1220175, 1229166, 2097716, 351625, 2449341, 78, 'Campo Grande', 'Sul-matogrossense', '357.124,96', NULL),
('MT', 'Mato Grosso', 2504353, 1548894, 1485097, 2484838, 549153, 3033991, 141, 'Cuiabá', 'Matogrossense', '903.357,91', NULL),
('PA', 'Pará', 6192307, 3825245, 3762833, 5197118, 2390960, 7588078, 143, 'Belém', 'Paraense', '1.247.689,52', NULL),
('PB', 'Paraíba', 3443825, 1824495, 1942339, 2839002, 927832, 3766834, 223, 'João Pessoa', 'Paraibano', '56.439,84', NULL),
('PE', 'Pernambuco', 7918344, 4229897, 4566135, 7049868, 1746164, 8796032, 185, 'Recife', 'Pernambucano', '98.311,62', NULL),
('PI', 'Piauí', 2843278, 1528796, 1590219, 2051316, 1067699, 3119015, 224, 'Teresina', 'Piauiense', '251.529,19', NULL),
('PR', 'Paraná', 9563458, 5128503, 5311098, 8906442, 1533159, 10439601, 399, 'Curitiba', 'Paranaense', '199.314,85', NULL),
('RJ', 'Rio de Janeiro', 14391282, 7626920, 8366663, 15466996, 526587, 15993583, 92, 'Rio de Janeiro', 'Fluminense', '43.696,05', NULL),
('RN', 'Rio Grande do Norte', 2776782, 1548731, 1619402, 2465439, 702694, 3168133, 167, 'Natal', 'Pitiguar', '52.796,79', NULL),
('RO', 'Rondônia', 1379787, 793224, 767277, 1142648, 417853, 1560501, 52, 'Porto Velho', 'Rondonense', '237.576,17', NULL),
('RR', 'Roraima', 324397, 229343, 221884, 344780, 106447, 451227, 15, 'Boa Vista', 'Roraimense', '224.298,98', NULL),
('RS', 'Rio Grande do Sul', 10187798, 5205705, 5489827, 9102241, 1593291, 10695532, 496, 'Porto Alegre', 'Gaucho', '281.748,54', NULL),
('SC', 'Santa Catarina', 5356360, 3101087, 3148595, 5249197, 1000485, 6249682, 293, 'Florianópolis', 'Catarinense', '95.346,18', NULL),
('SE', 'Sergipe', 1784475, 1005049, 1062982, 1520243, 547788, 2068031, 75, 'Aracajú', 'Sergipano', '21.910,35', NULL),
('SP', 'São Paulo', 37032403, 20071766, 21180394, 39552234, 1699926, 41252160, 645, 'São Paulo', 'Paulista', '248.209,43', NULL),
('TO', 'Tocantins', 1157098, 702451, 681002, 1090241, 293212, 1383453, 139, 'Palmas', 'Tocantinense', '277.620,91', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
