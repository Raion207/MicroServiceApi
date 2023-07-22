DROP DATABASE IF EXISTS EcoleApp;
CREATE DATABASE EcoleApp DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE EcoleApp;

DROP TABLE IF EXISTS classes;
CREATE TABLE classes(
	idC int(5) NOT NULL AUTO_INCREMENT,
	libelleC varchar(10) NOT NULL,
	PRIMARY KEY (idC)
);

DROP TABLE IF EXISTS materiels;
CREATE TABLE materiels(
	idM int(5) NOT NULL AUTO_INCREMENT,
	libelleM varchar(20) NOT NULL,
	PRIMARY KEY (idM)
);

DROP TABLE IF EXISTS cours;
CREATE TABLE cours(
	idCo int(5) NOT NULL AUTO_INCREMENT,
	libelleCo varchar(50) NOT NULL,
	PRIMARY KEY (idCo)
);

DROP TABLE IF EXISTS formations;
CREATE TABLE formations(
	idF int(5) NOT NULL AUTO_INCREMENT,
	libelleF varchar(75) NOT NULL,
	descriptionF text NOT NULL,
	PRIMARY KEY (idF)
);

DROP TABLE IF EXISTS eleves;
CREATE TABLE eleves(
	idE int(5) NOT NULL AUTO_INCREMENT,
	nomE varchar(30) NOT NULL,
	prenomE varchar(50) NOT NULL,
	idClasse int(5) NOT NULL,
	idFormation int(5) NOT NULL,
	PRIMARY KEY (idE),
	FOREIGN KEY (idClasse) REFERENCES classes(idC),
	FOREIGN KEY (idFormation) REFERENCES formations(idF)
);

DROP TABLE IF EXISTS profs;
CREATE TABLE profs(
	idP int(5) NOT NULL AUTO_INCREMENT,
	nomP varchar(30) NOT NULL,
	prenomP varchar(50) NOT NULL,
	idClasse int(5) NOT NULL,
	PRIMARY KEY (idP),
	FOREIGN KEY (idClasse) REFERENCES classes(idC)
);