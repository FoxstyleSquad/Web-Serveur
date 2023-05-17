


CREATE DATABASE notedb;
USE notedb;
--
-- Base de données: `notedb`
--

-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `utilisateur`(
`Nom_utilisateur` varchar(100) NOT NULL,
`Mot_De_Passe` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `utilisateur` ( `Nom_utilisateur`, `Mot_De_Passe`) VALUES
( 'foxstyle', 'orange'),
('8000' , '0000'),
('8001' , '0001'),
('8002' , '0002'),
('8003' , '0003'),
('8004' , '0004'),
('8005' , '0005');


--
-- Structure de la table `note`
--

CREATE TABLE IF NOT EXISTS `note` (
  `matricule` varchar(20) NOT NULL,
  `matiere` varchar(100) NOT NULL,
  `controle` decimal(4,2) DEFAULT NULL,
  `examen` decimal(4,2) DEFAULT NULL,
  `tp` decimal(4,2) DEFAULT NULL,
  PRIMARY KEY (`matricule`,`matiere`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `note`
--

INSERT INTO `note` (`matricule`, `matiere`, `controle`, `examen`, `tp`) VALUES
('8000', 'WEB', '12.00',  NULL  , '19.00'),
('8001', 'WEB', '13.00', '12.00', '16.00'),
('8002', 'WEB', '14.00', '11.00', '15.00'),
('8003', 'WEB',  NULL  , '20.00',  NULL  ),
('8004', 'WEB', '14.75', '13.00', '15.00'),
('8005', 'WEB', '17.00', '09.00', '13.00'),

('8000', 'FR', '18.58',  NULL  , '13.34'),
('8001', 'FR', '14.05', '19.80', '12.22'),
('8002', 'FR', '08.22', '9.87' , '10.52'),
('8003', 'FR',  NULL  , '11.77', '10.79'),
('8004', 'FR', '02.75', '15.25', '07.05'),
('8005', 'Fr', '18.00', '8.82' ,  NULL  ),

('8000', 'RES', '16.29', '08.91' , '06.38'),
('8001', 'RES', '10.29', '01.32' ,  NULL  ),
('8002', 'RES', '02.09', '16.01' , '05.11'),
('8003', 'RES', '06.06',  NULL   , '06.80'),
('8004', 'RES', '12.00', '01.08' , '10.47'),
('8005', 'RES',  NULL  , '13.78' , '19.90');

-- --------------------------------------------------------

--
-- Structure de la table `secret`
--

CREATE TABLE IF NOT EXISTS `secret` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `login` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `secret`
--

INSERT INTO `secret` (`id`, `login`, `password`) VALUES
(1, 'foxstyle', 'orange');

