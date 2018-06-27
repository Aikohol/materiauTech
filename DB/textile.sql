DROP DATABASE IF EXISTS casa93_textile;
CREATE DATABASE casa93_textile;

USE casa93_textile;

DROP TABLE IF EXISTS `tag`;

CREATE TABLE `tag` (
  `id_tag` int(11) NOT NULL auto_increment,
  `nom` varchar(16) NOT NULL,
  `valeur` varchar(30) NOT NULL,
    PRIMARY KEY(`id_tag`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `compte`;

CREATE TABLE `compte` (
	`id` int(11) NOT NULL,
	`mdp` varchar(126) NOT NULL,
	PRIMARY KEY(`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


CREATE TABLE `textile` (
  `id_textile` int(11) NOT NULL auto_increment,
  `categorie` varchar(16) NOT NULL,
  `texture` varchar(16) NOT NULL,
  `couleur` varchar(16) NOT NULL,
  `matiere` varchar(30) NOT NULL,
    PRIMARY KEY(`id_textile`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
