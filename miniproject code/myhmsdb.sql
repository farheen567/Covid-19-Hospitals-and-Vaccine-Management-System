-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 16, 2020 at 02:34 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admintb`
--

CREATE TABLE `admintb` (
  `username` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admintb`
--

INSERT INTO `admintb` (`username`, `password`) VALUES
('admin', 'admin123');

-- --------------------------------------------------------

-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `name` varchar(30) NOT NULL,
  `email` text NOT NULL,
  `contact` varchar(10) NOT NULL,
  `message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

-- --------------------------------------------------------



--
-- Table structure for table `patreg`
--

CREATE TABLE `patreg` (
  `pid` int(11) NOT NULL  AUTO_INCREMENT,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL UNIQUE,
  `contact` varchar(10) NOT NULL,
  `password` varchar(30) NOT NULL,
  `cpassword` varchar(30) NOT NULL,
PRIMARY KEY(`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patreg`
--



-- --------------------------------------------------------





CREATE TABLE IF NOT EXISTS `hospitals`(
`hpid` varchar(30) NOT NULL,
`hname` varchar(50) NOT NULL,
`phn` varchar(10) NOT NULL,
`email` varchar(30)  NOT NULL,
`Location` varchar(30) NOT NULL,
`Address` varchar(100) NOT NULL,
PRIMARY KEY(`hpid`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1 ;

CREATE TABLE IF NOT EXISTS`admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hpid` varchar(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
 PRIMARY KEY (`id`),
FOREIGN KEY (`hpid`) REFERENCES `hospitals`(`hpid`) ON DELETE CASCADE,
  UNIQUE KEY `username` (`username`),
 UNIQUE KEY `email` (`email`)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;








CREATE TABLE `appointment` (
`hpid` varchar(30) NOT NULL,
  `aid` int(50) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `age` int(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(10) NOT NULL,
   `message` varchar(200),
  `appdate` date NOT NULL,
  `apptime` time NOT NULL,
  `bedR` int(5) NOT NULL,
  `userStatusA` int(5) NOT NULL,
  `doctorStatusA` int(5) NOT NULL,
  `doctorStatusB` int(5) NOT NULL,
  `time` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`aid`),
FOREIGN KEY(`hpid`)
REFERENCES hospitals(`hpid`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `beds`(
`hpid` varchar(30) NOT NULL,
`bid` int NOT NULL AUTO_INCREMENT,
`bno` varchar(30) NOT NULL,
`status` int(5) NOT NULL,
PRIMARY KEY(`bid`),
FOREIGN KEY(`hpid`)
REFERENCES hospitals(`hpid`) ON DELETE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `bedallot` (
`pid` int(11) NOT NULL,
`bid` int NOT NULL,
PRIMARY KEY (`pid`),
FOREIGN KEY(`pid`)
REFERENCES appointment(`aid`) ON DELETE CASCADE,
FOREIGN KEY(`bid`)
REFERENCES beds(`bid`) ON DELETE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `app`(
`apid` int(11) NOT NULL  AUTO_INCREMENT,
`aid` int(11) NOT NULL,
PRIMARY KEY (`apid`),
FOREIGN KEY(`aid`)
REFERENCES appointment(`aid`) ON DELETE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `rating`(
`rid` int(50) NOT NULL AUTO_INCREMENT,
`pid` int(11) NOT NULL,
`hpid` varchar(30) NOT NULL,
`rate` float NOT NULL,
PRIMARY KEY(rid),
FOREIGN KEY(pid) REFERENCES patreg(pid) ON DELETE CASCADE,
FOREIGN KEY(hpid) REFERENCES hospitals(hpid) ON DELETE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `avgr`(
`arid` int(50) NOT NULL AUTO_INCREMENT,
`hpid` varchar(30) NOT NULL,
`arate` float NOT NULL,
PRIMARY KEY(`arid`),
FOREIGN KEY(`hpid`) REFERENCES hospitals(`hpid`) ON DELETE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `block`(
`blid` int(100) NOT NULL AUTO_INCREMENT,
`hpid` varchar(30) NOT NULL UNIQUE,
 `time` datetime DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY(`blid`),
FOREIGN KEY(`hpid`) REFERENCES hospitals(`hpid`) ON DELETE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=latin1;





create table `vcenters`(
vid varchar(20) NOT NULL,
vname varchar(30) NOT NULL,
location varchar(30) NOT NULL,
address varchar(65535) NOT NULL,
PRIMARY KEY(vid));

CREATE TABLE IF NOT EXISTS `vadmin`(
vaid int(11) NOT NULL AUTO_INCREMENT,
vid varchar(20) NOT NULL,
username varchar(50) NOT NULL UNIQUE,
password varchar(50) NOT NULL,
email varchar(50) NOT NULL UNIQUE,
PRIMARY KEY(`vaid`),
FOREIGN KEY(`vid`) REFERENCES vcenters(`vid`) ON DELETE CASCADE
);

create table vinfo(
id int(100) NOT NULL AUTO_INCREMENT,
vid varchar(20) NOT NULL,
type varchar(30) NOT NULL,
dose varchar(30) NOT NULL,
age varchar(30) NOT NULL,
count int NOT NULL,
day varchar(30) NOT NULL,
PRIMARY KEY(`id`), 
FOREIGN KEY(`vid`) 
REFERENCES vcenters(`vid`) ON DELETE CASCADE
);



create table vbook(
vbid int(100) NOT NULL AUTO_INCREMENT,
pid int(11) NOT NULL,
id int(100) NOT NULL,
tslot varchar(12) NOT NULL,
aadhaar varchar(50) NOT NULL,
name varchar(50) NOT NULL,
gender varchar(20) NOT NULL,
dobyear int NOT NULL,
PRIMARY KEY(vbid),
FOREIGN KEY(id)
REFERENCES vinfo(id) ON DELETE CASCADE
);


create table block1(
vlid int(100) NOT NULL AUTO_INCREMENT,
vid varchar(30) NOT NULL UNIQUE,
time datetime DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY(`vlid`),
FOREIGN KEY(`vid`) REFERENCES vcenters(`vid`) ON DELETE CASCADE
);





