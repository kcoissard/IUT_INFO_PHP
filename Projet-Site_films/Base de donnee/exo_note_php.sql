



/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;

/*!40101 SET NAMES utf8 */;




CREATE TABLE IF NOT EXISTS `acteurs` (
  
`id_acteur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
 
`prenom` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  
PRIMARY KEY (`id_acteur`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;







INSERT INTO `acteurs` (`id_acteur`, `nom`, `prenom`) VALUES
(1, 'JOLIE', 'Angelina'),
(2, 'PITT', 'Brad'),
(3, 'SMITH', 'Will'),
(4, 'Baron Cohen', 'Sacha'),
(5, 'Chabat', 'Alain'),
(6, 'CRAIG', 'Daniel'),
(7, 'NIVEN', 'David'),
(8, 'GYLLENHAAL', 'Jake'),
(9, 'GREEN', 'Eva'),
(10, 'MITRA', 'Rhona'),
(11, 'FREEMAN', 'Martin'),
(12, 'DANCE', 'Charles'),
(13, 'BELLUCCI', 'Monica');




CREATE TABLE IF NOT EXISTS `casting` (
  `id_film` int(11) NOT NULL,
  `id_acteur` int(11) NOT NULL,
  
PRIMARY KEY (`id_film`,`id_acteur`),
  KEY `fk_casting_acteur` (`id_acteur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;





INSERT INTO `casting` (`id_film`, `id_acteur`) VALUES
(8, 1),
(12, 1),
(8, 2),
(13, 2),
(11, 3),
(6, 4),
(9, 5),
(10, 5),
(15, 6),
(14, 7),
(7, 8),
(15, 9),
(6, 10),
(6, 11),
(6, 12),
(10, 13);

-- --------------------------------------------------------

--
-- Structure de la table `films`
--

CREATE TABLE IF NOT EXISTS `films` (
  `id_film` int(11) NOT NULL AUTO_INCREMENT,
  `nom_film` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `annee_film` smallint(6) NOT NULL,
  `score` float NOT NULL,
  PRIMARY KEY (`id_film`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Contenu de la table `films`
--

INSERT INTO `films` (`id_film`, `nom_film`, `annee_film`, `score`) VALUES
(6, 'Ali G', 2002, 5.4),
(7, 'Night Call ', 2014, 8.7),
(8, 'Mr &amp; Mrs SMITH', 2005, 6.2),
(9, 'RRRrrrr !!!', 2004, 4.4),
(10, 'Astérix et Obélix : Mission Cléopâtre', 2002, 8),
(11, 'i Robot', 2004, 7.6),
(12, 'Wanted : Choisis ton destin', 2008, 6.1),
(13, 'Fight Club', 1999, 9),
(14, 'Casino Royale', 1967, 8.7),
(15, 'Casino Royale', 2006, 8.2);


ALTER TABLE `casting`
  ADD CONSTRAINT `fk_casting_acteur` FOREIGN KEY (`id_acteur`) 
REFERENCES `acteurs` (`id_acteur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_casting_film` FOREIGN KEY (`id_film`) 
REFERENCES `films` (`id_film`) ON DELETE CASCADE ON UPDATE CASCADE;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
