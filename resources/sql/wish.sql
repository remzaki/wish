--
-- MySQL 5.5.20
-- Mon, 18 Nov 2013 10:31:41 +0000
--

CREATE DATABASE `wish` DEFAULT CHARSET latin1;

USE `wish`;

CREATE TABLE `avatar` (
   `ID` int(255) not null auto_increment,
   `TeamID` varchar(16) not null,
   `UserID` varchar(16) not null,
   `Codename` varchar(25) CHARSET utf8 not null,
   `WishItem` varchar(255) not null,
   `WishDesc` varchar(255) not null,
   `Avatar` varchar(255) not null,
   `Upload` varchar(255) not null,
   `Link` varchar(255) not null,
   `Comments` int(255) not null,
   `Validity` int(1) not null default '1',
   PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `comments` (
   `ID` int(255) not null auto_increment,
   `AvatarID` int(255) not null,
   `User` varchar(255) not null,
   `Comment` varchar(255) not null,
   `DateStamp` varchar(100) not null,
   `Status` int(1) not null default '1',
   PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `logs` (
   `ID` int(255) unsigned not null auto_increment,
   `Type` int(2) not null,
   `Description` varchar(255) not null,
   `User` varchar(255) not null,
   `Details` varchar(255) not null,
   `IPAddress` text not null,
   `UserAgent` varchar(255) not null,
   `Date` varchar(100) not null,
   PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `pairs` (
   `ID` int(255) not null auto_increment,
   `UID` varchar(16) not null,
   `PUID` varchar(16) not null,
   `TeamID` varchar(16) not null,
   PRIMARY KEY (`ID`),
   UNIQUE KEY (`UID`),
   UNIQUE KEY (`PUID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `passcode` (
   `ID` int(255) not null auto_increment,
   `UserID` varchar(255) not null,
   `Passcode` varchar(255) not null,
   `Validity` int(1) not null default '1',
   PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `team` (
   `ID` int(255) unsigned not null auto_increment,
   `TeamCode` varchar(255) not null,
   `TeamDesc` varchar(255) not null,
   PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `teammates` (
   `ID` int(255) not null auto_increment,
   `TeamCode` varchar(255) not null,
   `QuicklookID` varchar(8) not null,
   `Flag1` int(1) not null default '0',
   `Flag2` int(1) not null default '0',
   PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `users` (
   `ID` int(255) unsigned not null auto_increment,
   `Username` varchar(255) not null,
   `Password` varchar(255) not null,
   `Firstname` char(255) not null,
   `Lastname` varchar(255) not null,
   `QuicklookID` varchar(8) not null,
   `Date` varchar(255) not null,
   PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `views` (
   `ID` int(255) not null auto_increment,
   `AvatarID` int(255),
   `User` varchar(255),
   `IPAddress` varchar(15),
   `Date` varchar(8),
   PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
