CREATE DATABASE IF NOT EXISTS `gtBD`;

USE `gtBD`;

DROP TABLE IF EXISTS `backups`;

CREATE TABLE `backups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(25) NOT NULL DEFAULT current_timestamp(),
  `description` varchar(500) NOT NULL,
  `autor` varchar(50) NOT NULL,
  `filename` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO backups VALUES (1,"2021-01-22 13:49:14","primer respaldo Diciembre 2020","Administrator default","gtBD-20210122_204914.sql"),
(2,"2021-01-24 11:35:13","Respaldo domingo 26 enero 2021","Administrator default","gtBD-20210124_183513.sql");


DROP TABLE IF EXISTS `binnacle`;

CREATE TABLE `binnacle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `typeevent` varchar(100) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `date_event` varchar(25) DEFAULT curdate(),
  `hour_event` varchar(25) DEFAULT date_format(current_timestamp(),'%H:%i'),
  `username` varchar(25) DEFAULT 'Sistema',
  `ip_address` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=193 DEFAULT CHARSET=utf8mb4;

INSERT INTO binnacle VALUES (1,"Registro","Registro de usuario coordinator default","2021-01-22","10:13","coordinator_default","192.168.1.2"),
(2,"Registro","Registro de usuario Administrator default","2021-01-22","10:13","administrator_default","192.168.1.2"),
(3,"login","inicio de sesion","2021-01-22","10:20","coordinator_default","::1"),
(4,"login","inicio de sesion","2021-01-22","10:20","coordinator_default","::1"),
(5,"login","inicio de sesion","2021-01-22","10:20","coordinator_default","::1"),
(6,"Registro","Registro de usuario Dennis Motiño","2021-01-22","10:29","dennis_andino","::1"),
(7,"Registro","Registro de usuario Lidia Castillo","2021-01-22","10:33","lidia_castillo","::1"),
(8,"Nuevo","El usuario :::1 agrego una carrera nueva :Adminsitracion de empresas","2021-01-22","10:33","::1","coordinator_default"),
(9,"login","inicio de sesion","2021-01-22","10:35","coordinator_default","::1"),
(10,"login","inicio de sesion","2021-01-22","10:35","coordinator_default","::1"),
(11,"Registro","Registro de usuario Tomas Murillo","2021-01-22","10:38","tomas_murillo","::1"),
(12,"Registro","Registro de usuario Lourdes Gonzales","2021-01-22","10:42","lourdes_gonzales","::1"),
(13,"Registro","Registro de usuario Osman Mejia","2021-01-22","10:44","osman_mejia","::1"),
(14,"login","inicio de sesion","2021-01-22","10:56","coordinator_default","::1"),
(15,"login","inicio de sesion","2021-01-22","10:56","coordinator_default","::1"),
(16,"login","inicio de sesion","2021-01-22","10:56","coordinator_default","::1"),
(17,"login","inicio de sesion","2021-01-22","10:58","osman_mejia","::1"),
(18,"login","inicio de sesion","2021-01-22","11:04","coordinator_default","::1"),
(19,"login","inicio de sesion","2021-01-22","11:05","lourdes_gonzales","::1"),
(20,"login","inicio de sesion","2021-01-22","11:09","dennis_andino","::1"),
(21,"login","inicio de sesion","2021-01-22","12:08","coordinator_default","::1"),
(22,"login","inicio de sesion","2021-01-22","12:15","tomas_murillo","::1"),
(23,"login","inicio de sesion","2021-01-22","12:16","lidia_castillo","::1"),
(24,"login","inicio de sesion","2021-01-22","12:21","coordinator_default","::1"),
(25,"login","inicio de sesion","2021-01-22","12:56","dennis_andino","::1"),
(26,"login","inicio de sesion","2021-01-22","12:57","dennis_andino","::1"),
(27,"login","inicio de sesion","2021-01-22","12:58","osman_mejia","::1"),
(28,"login","inicio de sesion","2021-01-22","12:59","dennis_andino","::1"),
(29,"login","inicio de sesion","2021-01-22","13:06","osman_mejia","::1"),
(30,"login","inicio de sesion","2021-01-22","13:47","administrator_default","::1"),
(31,"login","inicio de sesion","2021-01-22","13:47","administrator_default","::1"),
(32,"login","inicio de sesion","2021-01-22","13:47","administrator_default","::1"),
(33,"login","inicio de sesion","2021-01-22","13:47","administrator_default","::1"),
(34,"login","inicio de sesion","2021-01-22","13:54","coordinator_default","::1"),
(35,"login","inicio de sesion","2021-01-22","13:59","dennis_andino","::1"),
(36,"login","inicio de sesion","2021-01-22","14:00","coordinator_default","::1"),
(37,"login","inicio de sesion","2021-01-22","14:12","coordinator_default","::1"),
(38,"Registro","Registro de usuario Alba Carranza","2021-01-22","14:26","alba_carranza","::1"),
(39,"Registro","Registro de usuario Karen Alvarado","2021-01-22","14:29","karen_alvarado","::1"),
(40,"login","inicio de sesion","2021-01-22","14:35","tutor_default","::1"),
(41,"login","inicio de sesion","2021-01-22","14:35","tutor_default","::1"),
(42,"login","inicio de sesion","2021-01-22","14:36","coordinator_default","::1"),
(43,"login","inicio de sesion","2021-01-22","14:36","osman_mejia","::1"),
(44,"login","inicio de sesion","2021-01-22","14:43","administrator_default","::1"),
(45,"login","inicio de sesion","2021-01-22","14:43","administrator_default","::1"),
(46,"login","inicio de sesion","2021-01-22","14:43","dennis_andino","::1"),
(47,"login","inicio de sesion","2021-01-22","14:45","coordinator_default","::1"),
(48,"login","inicio de sesion","2021-01-22","14:45","coordinator_default","::1"),
(49,"login","inicio de sesion","2021-01-23","00:12","coordinator_default","::1"),
(50,"login","inicio de sesion","2021-01-23","00:33","coordinator_default","::1"),
(51,"login","inicio de sesion","2021-01-23","00:41","coordinato_default","::1"),
(52,"login","inicio de sesion","2021-01-23","00:41","coordinator_default","::1"),
(53,"login","inicio de sesion","2021-01-23","01:45","coordinator_default","::1"),
(54,"login","inicio de sesion","2021-01-23","02:02","administrator_default","::1"),
(55,"login","inicio de sesion","2021-01-23","02:08","osman_mejia","::1"),
(56,"login","inicio de sesion","2021-01-23","02:15","dennis_andino","::1"),
(57,"login","inicio de sesion","2021-01-23","02:22","coordinator_default","::1"),
(58,"login","inicio de sesion","2021-01-23","21:45","dennis_andino","::1"),
(59,"login","inicio de sesion","2021-01-23","22:07","coordinator_default","::1"),
(60,"login","inicio de sesion","2021-01-23","22:30","osman_mejia","::1"),
(61,"login","inicio de sesion","2021-01-23","22:33","administrator_default","::1"),
(62,"login","inicio de sesion","2021-01-23","22:35","dennis_andino","::1"),
(63,"login","inicio de sesion","2021-01-23","22:36","dennis_andino","::1"),
(64,"login","inicio de sesion","2021-01-23","22:51","coordinator_default","::1"),
(65,"login","inicio de sesion","2021-01-24","00:16","dennis_andino","::1"),
(66,"login","inicio de sesion","2021-01-24","00:20","coordinator_default","::1"),
(67,"login","inicio de sesion","2021-01-24","00:30","osman_mejia","::1"),
(68,"login","inicio de sesion","2021-01-24","00:33","administrator_default","::1"),
(69,"login","inicio de sesion","2021-01-24","00:53","coordinator_default","::1"),
(70,"login","inicio de sesion","2021-01-24","00:54","coordinator_default","::1"),
(71,"login","inicio de sesion","2021-01-24","00:59","coordinator_default","::1"),
(72,"login","inicio de sesion","2021-01-24","00:59","coordinator_default","::1"),
(73,"login","inicio de sesion","2021-01-24","01:07","coordinator_default","::1"),
(74,"login","inicio de sesion","2021-01-24","01:17","dennis_andino","::1"),
(75,"login","inicio de sesion","2021-01-24","01:23","coordinator_default","::1"),
(76,"login","inicio de sesion","2021-01-24","01:32","osman_mejia","::1"),
(77,"login","inicio de sesion","2021-01-24","01:36","dennis_andino","::1"),
(78,"login","inicio de sesion","2021-01-24","01:37","admistrator_default","::1"),
(79,"login","inicio de sesion","2021-01-24","01:37","administrator_default","::1"),
(80,"login","inicio de sesion","2021-01-24","01:49","dennis_andino","::1"),
(81,"login","inicio de sesion","2021-01-24","01:54","coordinator_default","::1"),
(82,"login","inicio de sesion","2021-01-24","08:00","coordinator_default","::1"),
(83,"login","inicio de sesion","2021-01-24","08:25","coordinator_default","::1"),
(84,"login","inicio de sesion","2021-01-24","08:47","coordinator_default","::1"),
(85,"login","inicio de sesion","2021-01-24","08:53","coordinator_default","::1"),
(86,"login","inicio de sesion","2021-01-24","08:53","coordinator_default","::1"),
(87,"login","inicio de sesion","2021-01-24","08:53","coordinator_default","::1"),
(88,"login","inicio de sesion","2021-01-24","11:10","dennis_andino","::1"),
(89,"login","inicio de sesion","2021-01-24","11:16","coordinator_default","::1"),
(90,"login","inicio de sesion","2021-01-24","11:27","dennis_andino","::1"),
(91,"login","inicio de sesion","2021-01-24","11:27","osman_mejia","::1"),
(92,"login","inicio de sesion","2021-01-24","11:27","osman_mejia","::1"),
(93,"login","inicio de sesion","2021-01-24","11:32","dennis_andino","::1"),
(94,"login","inicio de sesion","2021-01-24","11:33","osman_mejia","::1"),
(95,"login","inicio de sesion","2021-01-24","11:33","admistrator_default","::1"),
(96,"login","inicio de sesion","2021-01-24","11:34","coordinator_default","::1"),
(97,"login","inicio de sesion","2021-01-24","11:34","coordinator_default","::1"),
(98,"login","inicio de sesion","2021-01-24","11:34","administrator_default","::1"),
(99,"login","inicio de sesion","2021-01-24","11:42","dennis_andino","::1"),
(100,"login","inicio de sesion","2021-01-24","11:42","dennis_andino","::1"),
(101,"login","inicio de sesion","2021-01-24","11:46","osman_mejia","::1"),
(102,"login","inicio de sesion","2021-01-24","11:46","dennis_andino","::1"),
(103,"login","inicio de sesion","2021-01-24","11:46","dennis_andino","::1"),
(104,"login","inicio de sesion","2021-01-24","11:46","dennis_andino","::1"),
(105,"login","inicio de sesion","2021-01-24","11:51","coordinator_default","::1"),
(106,"login","inicio de sesion","2021-01-27","20:40","coordinator_default","::1"),
(107,"login","inicio de sesion","2021-01-28","21:41","coordinator_default","::1"),
(108,"login","inicio de sesion","2021-01-28","23:54","coordinator_default","::1"),
(109,"login","inicio de sesion","2021-01-28","23:54","coordinator_default","::1"),
(110,"login","inicio de sesion","2021-01-29","01:29","coordinator_default","::1"),
(111,"login","inicio de sesion","2021-01-29","01:29","coordinator_default","::1"),
(112,"login","inicio de sesion","2021-01-29","01:29","coordinator_default","::1"),
(113,"login","inicio de sesion","2021-01-29","01:35","coordinator_default","::1"),
(114,"login","inicio de sesion","2021-01-29","01:35","coordinator_default","::1"),
(115,"login","inicio de sesion","2021-01-29","03:13","dennis_andino","::1"),
(116,"login","inicio de sesion","2021-01-29","03:14","coordinator_default","::1"),
(117,"login","inicio de sesion","2021-01-29","03:29","coordinator_default","::1"),
(118,"login","inicio de sesion","2021-01-29","03:32","coordinator_default","::1"),
(119,"login","inicio de sesion","2021-01-29","03:34","coordinator_default","::1"),
(120,"login","inicio de sesion","2021-01-29","04:40","osman_mejia","::1"),
(121,"login","inicio de sesion","2021-01-29","04:41","osman_mejia","::1"),
(122,"login","inicio de sesion","2021-01-29","04:42","osman_mejia","::1"),
(123,"login","inicio de sesion","2021-01-29","04:42","osman_mejia","::1"),
(124,"login","inicio de sesion","2021-01-29","04:52","osman_mejia","::1"),
(125,"login","inicio de sesion","2021-01-30","02:10","dennis_andino","::1"),
(126,"login","inicio de sesion","2021-01-30","02:41","osman_mejia","::1"),
(127,"login","inicio de sesion","2021-01-30","02:41","osman_mejia","::1"),
(128,"login","inicio de sesion","2021-01-30","02:41","osman_mejia","::1"),
(129,"login","inicio de sesion","2021-01-30","02:55","coordinator_default","::1"),
(130,"login","inicio de sesion","2021-01-30","03:21","administrator_default","::1"),
(131,"login","inicio de sesion","2021-01-30","12:17","dennis_andino","::1"),
(132,"login","inicio de sesion","2021-01-30","12:17","dennis_andino","::1"),
(133,"login","inicio de sesion","2021-01-30","12:21","alba_carranza","::1"),
(134,"login","inicio de sesion","2021-01-30","12:22","tomas_murillo","::1"),
(135,"login","inicio de sesion","2021-01-30","12:25","coordinator_default","::1"),
(136,"login","inicio de sesion","2021-01-30","13:31","coordinator_default","::1"),
(137,"login","inicio de sesion","2021-01-30","14:11","coordinator_default","::1"),
(138,"login","inicio de sesion","2021-01-30","14:11","coordinator_default","::1"),
(139,"login","inicio de sesion","2021-01-30","14:13","coordinator_default","::1"),
(140,"login","inicio de sesion","2021-01-30","14:19","coordinator_default","::1"),
(141,"login","inicio de sesion","2021-01-30","15:58","osman_mejia","::1"),
(142,"login","inicio de sesion","2021-01-30","16:03","coordinator_default","::1"),
(143,"login","inicio de sesion","2021-01-30","16:05","osman_mejia","::1"),
(144,"login","inicio de sesion","2021-01-30","16:21","dennis_andino","::1"),
(145,"login","inicio de sesion","2021-01-30","16:27","administrator_default","::1"),
(146,"login","inicio de sesion","2021-01-30","17:02","dennis_andino","::1"),
(147,"login","inicio de sesion","2021-01-30","17:06","tomas_murillo","::1"),
(148,"login","inicio de sesion","2021-01-30","17:07","coordinator_default","::1"),
(149,"login","inicio de sesion","2021-01-30","17:09","osman_mejia","::1"),
(150,"login","inicio de sesion","2021-01-30","17:10","lourdes_gonzales","::1"),
(151,"login","inicio de sesion","2021-01-30","17:11","administrator_default","::1"),
(152,"login","inicio de sesion","2021-01-30","17:52","dennis_andino","::1"),
(153,"login","inicio de sesion","2021-01-30","17:52","dennis_andino","::1"),
(154,"login","inicio de sesion","2021-01-30","17:55","tomas_murillo","::1"),
(155,"login","inicio de sesion","2021-01-30","17:55","tomas_murillo","::1"),
(156,"login","inicio de sesion","2021-01-30","17:59","karen_alvarado","::1"),
(157,"login","inicio de sesion","2021-01-30","18:00","coordinator_default","::1"),
(158,"Eliminacion","El usuario :coordinator_default elimino la solicitud de tutoria con id :23","2021-01-30","18:00","coordinator_default","::1"),
(159,"Eliminacion","El usuario :coordinator_default elimino la solicitud de tutoria con id :20","2021-01-30","18:00","coordinator_default","::1"),
(160,"Eliminacion","El usuario :coordinator_default elimino la solicitud de tutoria con id :17","2021-01-30","18:01","coordinator_default","::1"),
(161,"Eliminacion","El usuario :coordinator_default elimino la solicitud de tutoria con id :13","2021-01-30","18:01","coordinator_default","::1"),
(162,"Eliminacion","El usuario :coordinator_default elimino la solicitud de tutoria con id :16","2021-01-30","18:01","coordinator_default","::1"),
(163,"login","inicio de sesion","2021-01-30","18:04","dennis_andino","::1"),
(164,"login","inicio de sesion","2021-01-30","18:06","coordinator_default","::1"),
(165,"Eliminacion","El usuario :coordinator_default elimino la solicitud de tutoria con id :22","2021-01-30","18:07","coordinator_default","::1"),
(166,"Eliminacion","El usuario :coordinator_default elimino la solicitud de tutoria con id :19","2021-01-30","18:07","coordinator_default","::1"),
(167,"login","inicio de sesion","2021-01-30","18:11","dennis_andino","::1"),
(168,"login","inicio de sesion","2021-01-30","18:12","tomas_murillo","::1"),
(169,"login","inicio de sesion","2021-01-30","18:15","coordinator_default","::1"),
(170,"login","inicio de sesion","2021-01-30","18:15","coordinator_default","::1"),
(171,"Eliminacion","El usuario :coordinator_default elimino la solicitud de tutoria con id :21","2021-01-30","18:25","coordinator_default","::1"),
(172,"Eliminacion","El usuario :coordinator_default elimino la solicitud de tutoria con id :24","2021-01-30","18:25","coordinator_default","::1"),
(173,"Eliminacion","El usuario :coordinator_default elimino la solicitud de tutoria con id :25","2021-01-30","18:25","coordinator_default","::1"),
(174,"login","inicio de sesion","2021-01-30","18:28","dennis_andino","::1"),
(175,"login","inicio de sesion","2021-01-30","18:29","tomas_murillo","::1"),
(176,"login","inicio de sesion","2021-01-30","18:32","coordinator_default","::1"),
(177,"login","inicio de sesion","2021-01-30","18:33","tomas_murillo","::1"),
(178,"login","inicio de sesion","2021-01-30","18:34","lidia_castillo","::1"),
(179,"login","inicio de sesion","2021-01-30","18:34","alba_carranza","::1"),
(180,"login","inicio de sesion","2021-01-30","18:35","coordinator_default","::1"),
(181,"Eliminacion","El usuario :coordinator_default elimino la solicitud de tutoria con id :26","2021-01-30","18:35","coordinator_default","::1"),
(182,"login","inicio de sesion","2021-01-30","18:38","dennis_andino","::1"),
(183,"login","inicio de sesion","2021-01-30","18:40","tomas_murillo","::1"),
(184,"login","inicio de sesion","2021-01-30","18:41","coordinator_default","::1"),
(185,"login","inicio de sesion","2021-01-30","18:44","karen_alvarado","::1"),
(186,"login","inicio de sesion","2021-01-30","18:45","administrator_default","::1"),
(187,"login","inicio de sesion","2021-02-06","15:17","dennis_andino","::1"),
(188,"login","inicio de sesion","2021-02-06","15:27","coordinator_default","::1"),
(189,"login","inicio de sesion","2021-02-06","15:41","osman_mejia","::1"),
(190,"login","inicio de sesion","2021-02-06","15:46","dennis_andino","::1"),
(191,"login","inicio de sesion","2021-02-06","15:46","osman_mejia","::1"),
(192,"login","inicio de sesion","2021-02-06","15:47","administrator_default","::1");


DROP TABLE IF EXISTS `campus`;

CREATE TABLE `campus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO campus VALUES (1,"CEUTEC Tegucigalpa"),
(2,"CEUTEC San Pedro sula");


DROP TABLE IF EXISTS `careers`;

CREATE TABLE `careers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

INSERT INTO careers VALUES (1,"Atenciones Especiales"),
(2,"Clases Generales"),
(3,"Ingenieria en informatica"),
(4,"Gestion Logistica"),
(5,"Mercadotecnia"),
(6,"Administracion de empresas");


DROP TABLE IF EXISTS `courses`;

CREATE TABLE `courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coursename` varchar(100) NOT NULL,
  `career` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `career` (`career`),
  CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`career`) REFERENCES `careers` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

INSERT INTO courses VALUES (1,"Español",2),
(2,"Matematica 1",2),
(3,"Gestion Aduanera",4),
(4,"Publicidad",5),
(5,"programacion 1",3),
(6,"programacion 2",3),
(7,"Base de datos",3),
(8,"Atencion sicologica",1),
(9,"planificacion familiar",1),
(10,"Matematicas financieras",6),
(11,"Gestion de recursos humanos",6);


DROP TABLE IF EXISTS `institution`;

CREATE TABLE `institution` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `vision` varchar(500) NOT NULL,
  `mission` varchar(500) NOT NULL,
  `address` varchar(150) NOT NULL,
  `telefone` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO institution VALUES (1,"CEUTEC","Ser una universidad referente a nivel internacional en la formación de profesionales íntegros, competentes y emprendedores, que contribuyan al desarrollo y transformación de la sociedad.","Formar profesionales líderes, con visión global y compromiso social, mediante un modelo educativo basado en competencias, valores, emprendimiento, innovación académica y tecnológica, internacionalidad, investigación y vinculación con la sociedad.","Boulevard Kennedy, V-782, frente a Residencial Honduras.","+504 2268-1000","admisionesteg@unitec.edu","logo.png");


DROP TABLE IF EXISTS `logins`;

CREATE TABLE `logins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `userRole` int(11) NOT NULL,
  `createOn` varchar(20) NOT NULL,
  `lastUpdate` varchar(20) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `alias` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `campus` int(11) NOT NULL,
  `career` int(11) NOT NULL,
  `account` varchar(20) NOT NULL,
  `birthDate` varchar(20) NOT NULL,
  `admissionDate` varchar(25) NOT NULL,
  `photo` varchar(300) DEFAULT 'userdefault.png',
  `generalPoint` int(11) DEFAULT 0,
  `observations` varchar(500) DEFAULT NULL,
  `tutorCategory` int(11) NOT NULL DEFAULT 1,
  `availability` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `tutorCategory` (`tutorCategory`),
  KEY `userRole` (`userRole`),
  KEY `career` (`career`),
  KEY `campus` (`campus`),
  CONSTRAINT `logins_ibfk_1` FOREIGN KEY (`tutorCategory`) REFERENCES `tutortypes` (`id`),
  CONSTRAINT `logins_ibfk_2` FOREIGN KEY (`userRole`) REFERENCES `roles` (`id`),
  CONSTRAINT `logins_ibfk_3` FOREIGN KEY (`career`) REFERENCES `careers` (`id`),
  CONSTRAINT `logins_ibfk_4` FOREIGN KEY (`campus`) REFERENCES `campus` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

INSERT INTO logins VALUES (1,"coordinator_default","$2y$04$65rL6E7noi./j.34E2RSLu/4kqidDV4ZnsYrXIRG3x0smI8Y5nqq.",3,"10-22-2020","10-15-2020","Dennis F motino Andino","coordinator default","dennis_andino@unitec.edu",97231583,1,1,31711465,"","10-22-2016","pepito.jpg",0,"",1,1),
(2,"administrator_default","$2y$04$PJtbfSrpv/uttQfhJelJjOAg.90qn5./Ht9HBVyFz8D4iN6s/Nr3G",4,"10-22-2020","10-15-2020","Administrator","Administrator default","admin@outlook.com",97231583,1,1,31711465,"10-22-2020","10-22-2016","userdefault.png",0,NULL,1,1),
(4,"dennis_andino","$2y$04$yQgLo8HED9mYUxw6Gl3.SOZ0/Bv7DBw86UnqirtgWT/isEopjN5Km",1,"2021-01-22","2021-01-22","Dennis Fermin Motiño Andino","Dennis Motiño","dennis_andino@unitec.com",97231582,1,3,31711467,"1993-07-09","2016-01-22","DenisCVPhoto.png",0,"",1,1),
(5,"lidia_castillo","$2y$04$iwg62eG1P28OI0vvo6OyYOqcWN/kJ7Vtnf.0rQ2tyxtyD4ZMgf4Za",1,"2021-01-22","2021-01-22","Lidia Celena Castillo Palma","Lidia Castillo","lidiacelena96@gmail.com",32857015,1,6,31711468,"1996-01-20","2017-01-24","userdefault.png",0,"",1,1),
(6,"tomas_murillo","$2y$04$CMXVIdLM2gdg2fqAf.XH9OsGo8Q1aTrjSrESKzQB2aNCH2NDHDVtO",1,"2021-01-22","2021-01-22","Tomas Antonio Murillo","Tomas Murillo","tomas_antonio@outlook.com",972315833,1,4,56372245,"1990-12-30","2020-01-13","userdefault.png",0,NULL,1,1),
(7,"lourdes_gonzales","$2y$04$su.fLwkN6SkG/v3lp/VTSe6Q6tXZ8V6JD8AKd8tyf74tdeC6yYpIu",2,"2021-01-22","2021-01-22","Lourdes Carolina Gonzales Mendoza","Lourdes Gonzales","lourdesgonzales@unitec.edu",972315832,1,3,7898765,"1980-01-15","2000-01-23","lourdes.jpg",0,NULL,1,1),
(8,"osman_mejia","$2y$04$ItkUP.oPMfoydyrrOoXpB.s.g8BVvjkh6OXM6z/TJlg8lR4xX64RC",2,"2021-01-22","2021-01-22","Osman Antonio Mejia Alvarado","Osman Mejia","osman_mejia@unitec.edu",972315873,1,3,7898766,"1980-01-22","2005-01-08","Osman.jpg",0,"",1,1),
(9,"alba_carranza","$2y$04$N4nZi/D97CZNK0uHzsnQCe8Ac0JlTvzqWzfMUOv6uHBF4WHdO3IGK",2,"2021-01-22","2021-01-22","Alba Lorena Carranza","Alba Carranza","albacarranza@gmail.com",887231583,1,1,31711444,"1989-01-09","2012-01-13","userdefault.png",0,NULL,1,1),
(10,"karen_alvarado","$2y$04$dE3oIbLVncFT1rdctEO/g.sy9FNF1gxznIAPU5zXhyUsWZocwvL8m",2,"2021-01-22","2021-01-22","Karen Anahi Alvarado Perez","Karen Alvarado","karenalvarado@gmail.com",97231583,1,2,56372333,"1970-01-15","2015-01-17","userdefault.png",0,NULL,1,1);


DROP TABLE IF EXISTS `members_assistance`;

CREATE TABLE `members_assistance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tutorial` int(11) NOT NULL,
  `student` int(11) NOT NULL,
  `assistance` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `tutorial` (`tutorial`),
  KEY `student` (`student`),
  CONSTRAINT `members_assistance_ibfk_1` FOREIGN KEY (`tutorial`) REFERENCES `tutorials` (`id`),
  CONSTRAINT `members_assistance_ibfk_2` FOREIGN KEY (`student`) REFERENCES `logins` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

INSERT INTO members_assistance VALUES (2,14,6,0),
(3,15,4,1),
(4,14,4,0),
(5,14,4,0),
(8,18,4,0),
(17,27,4,1),
(18,28,6,0),
(19,28,4,0),
(20,29,4,1);


DROP TABLE IF EXISTS `notifications`;

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `destinationid` int(11) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `content` varchar(700) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `date` varchar(25) NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `destinationid` (`destinationid`),
  CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`destinationid`) REFERENCES `logins` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4;

INSERT INTO notifications VALUES (1,4,"Solicitud Aprobada","La solicitud con asunto: Polimorfismo , fue aprobada para el dia 2021-01-24 iniciando a las 14:00 impartida en : <br>https://zoom.us/j/93818575766?pwd=cHpTR2R3M0hCeFU2OXo5ZTBuZWZEZz09",1,"2021-01-22 12:56:26"),
(2,8,"Solicitud Asignada","Se le ha asignado una tutoria , con asunto: Polimorfismo , para el dia 2021-01-24 iniciando a las 14:00 impartida en : <br>https://zoom.us/j/93818575766?pwd=cHpTR2R3M0hCeFU2OXo5ZTBuZWZEZz09",1,"2021-01-22 12:56:26"),
(3,4,"Solicitud Aprobada","La solicitud con asunto: Polimorfismo , fue aprobada para el dia 2021-01-24 iniciando a las 14:00 impartida en : <br>https://zoom.us/j/93818575766?pwd=cHpTR2R3M0hCeFU2OXo5ZTBuZWZEZz09",1,"2021-01-22 13:05:55"),
(4,8,"Solicitud Asignada","Se le ha asignado una tutoria , con asunto: Polimorfismo , para el dia 2021-01-24 iniciando a las 14:00 impartida en : <br>https://zoom.us/j/93818575766?pwd=cHpTR2R3M0hCeFU2OXo5ZTBuZWZEZz09",1,"2021-01-22 13:05:55"),
(5,4,"Solicitud Aprobada","La solicitud con asunto: Recursividad , fue aprobada para el dia 2021-01-26 iniciando a las 14:00 impartida en : <br>laboratorio 1",1,"2021-01-24 01:27:25"),
(6,8,"Solicitud Asignada","Se le ha asignado una tutoria , con asunto: Recursividad , para el dia 2021-01-26 iniciando a las 14:00 impartida en : <br>laboratorio 1",1,"2021-01-24 01:27:25"),
(7,4,"Solicitud Aprobada","La solicitud con asunto: La normalizacion , fue aprobada para el dia 2021-01-26 iniciando a las 07:30 impartida en : <br>laboratorio 1",1,"2021-01-24 11:20:56"),
(8,7,"Solicitud Asignada","Se le ha asignado una tutoria , con asunto: La normalizacion , para el dia 2021-01-26 iniciando a las 07:30 impartida en : <br>laboratorio 1",0,"2021-01-24 11:20:56"),
(9,6,"Solicitud Cancelada","La solicitud con asunto: Factorizacion , fue cancelada a razon de : No cumple con los requisitos",0,"2021-01-24 11:21:33"),
(10,8,"Tutoria reprogramada","Se ha reprogramado la tutoria #13 con asunto : Polimorfismo para el dia: 2021-01-31",1,"2021-01-29 03:18:21"),
(11,4,"Tutoria reprogramada","Se ha reprogramado la solicitud con asunto : Polimorfismo para el dia: 2021-01-31",1,"2021-01-29 03:18:21"),
(12,8,"Tutoria reprogramada","Se ha reprogramado la tutoria #17 con asunto : Objetos para el dia: 2021-01-31",1,"2021-01-29 03:19:09"),
(13,4,"Tutoria reprogramada","Se ha reprogramado la solicitud con asunto : Objetos para el dia: 2021-01-31",1,"2021-01-29 03:19:09"),
(14,4,"Solicitud Aprobada","La solicitud con asunto: inner join , fue aprobada para el dia 2021-01-31 iniciando a las 07:30 impartida en : <br>laboratorio 1",1,"2021-01-29 03:28:01"),
(15,7,"Solicitud Asignada","Se le ha asignado una tutoria , con asunto: inner join , para el dia 2021-01-31 iniciando a las 07:30 impartida en : <br>laboratorio 1",0,"2021-01-29 03:28:01"),
(16,8,"Tutoria reprogramada","Se ha reprogramado la tutoria #17 con asunto : Objetos para el dia: 2021-01-31",1,"2021-01-29 04:02:53"),
(17,4,"Tutoria reprogramada","Se ha reprogramado la solicitud con asunto : Objetos para el dia: 2021-01-31",1,"2021-01-29 04:02:53"),
(18,7,"Tutoria reprogramada","Se ha reprogramado la tutoria #17 con asunto : Objetos para el dia: 2021-01-31",0,"2021-01-29 04:03:25"),
(19,4,"Tutoria reprogramada","Se ha reprogramado la solicitud con asunto : Objetos para el dia: 2021-01-31",1,"2021-01-29 04:03:25"),
(20,7,"Tutoria reprogramada","Se ha reprogramado la tutoria #18 con asunto : inner join para el dia: 2021-01-31",0,"2021-01-29 04:04:40"),
(21,4,"Tutoria reprogramada","Se ha reprogramado la solicitud con asunto : inner join para el dia: 2021-01-31",1,"2021-01-29 04:04:40"),
(22,7,"Tutoria reprogramada","Se ha reprogramado la tutoria #18 con asunto : inner join para el dia: 2021-01-31",0,"2021-01-29 04:06:36"),
(23,4,"Tutoria reprogramada","Se ha reprogramado la solicitud con asunto : inner join para el dia: 2021-01-31",1,"2021-01-29 04:06:36"),
(24,7,"Tutoria reprogramada","Se ha reprogramado la tutoria #18 con asunto : inner join para el dia: 2021-01-31",0,"2021-01-29 04:07:09"),
(25,4,"Tutoria reprogramada","Se ha reprogramado la solicitud con asunto : inner join para el dia: 2021-01-31",1,"2021-01-29 04:07:09"),
(26,8,"Tutoria reprogramada","Se ha reprogramado la tutoria #18 con asunto : inner join para el dia: 2021-01-31",1,"2021-01-29 04:34:01"),
(27,4,"Tutoria reprogramada","Se ha reprogramado la solicitud con asunto : inner join para el dia: 2021-01-31",1,"2021-01-29 04:34:01"),
(28,4,"Solicitud Aprobada","La solicitud con asunto: atencion personalizada , fue aprobada para el dia 2021-02-01 iniciando a las 07:30 impartida en : <br>laboratorio 1",1,"2021-01-30 12:27:05"),
(29,9,"Solicitud Asignada","Se le ha asignado una tutoria , con asunto: atencion personalizada , para el dia 2021-02-01 iniciando a las 07:30 impartida en : <br>laboratorio 1",0,"2021-01-30 12:27:05"),
(30,6,"Solicitud Aprobada","La solicitud con asunto: Pasado perfecto , fue aprobada para el dia 2021-02-01 iniciando a las 07:30 impartida en : <br>laboratorio 2",0,"2021-01-30 15:43:02"),
(31,10,"Solicitud Asignada","Se le ha asignado una tutoria , con asunto: Pasado perfecto , para el dia 2021-02-01 iniciando a las 07:30 impartida en : <br>laboratorio 2",0,"2021-01-30 15:43:02"),
(32,4,"Solicitud Aprobada","La solicitud con asunto: inner join , fue aprobada para el dia 2021-01-31 iniciando a las 14:00 impartida en : <br>Aula 25-Edificio B2",1,"2021-01-30 16:05:21"),
(33,8,"Solicitud Asignada","Se le ha asignado una tutoria , con asunto: inner join , para el dia 2021-01-31 iniciando a las 14:00 impartida en : <br>Aula 25-Edificio B2",1,"2021-01-30 16:05:21"),
(34,4,"Solicitud Aprobada","La solicitud con asunto: join , fue aprobada para el dia 2021-02-02 iniciando a las 07:30 impartida en : <br>laboratorio 1",1,"2021-01-30 17:07:56"),
(35,7,"Solicitud Asignada","Se le ha asignado una tutoria , con asunto: join , para el dia 2021-02-02 iniciando a las 07:30 impartida en : <br>laboratorio 1",0,"2021-01-30 17:07:56"),
(36,6,"Solicitud Aprobada","La solicitud con asunto: Integracion por partes , fue aprobada para el dia 2021-02-02 iniciando a las 07:30 impartida en : <br>laboratorio 2",0,"2021-01-30 17:09:16"),
(37,10,"Solicitud Asignada","Se le ha asignado una tutoria , con asunto: Integracion por partes , para el dia 2021-02-02 iniciando a las 07:30 impartida en : <br>laboratorio 2",0,"2021-01-30 17:09:16"),
(38,4,"Solicitud Aprobada","La solicitud con asunto: Factorizacion de polinomios , fue aprobada para el dia 2021-02-02 iniciando a las 07:30 impartida en : <br>laboratorio 2",1,"2021-01-30 18:15:56"),
(39,10,"Solicitud Asignada","Se le ha asignado una tutoria , con asunto: Factorizacion de polinomios , para el dia 2021-02-02 iniciando a las 07:30 impartida en : <br>laboratorio 2",0,"2021-01-30 18:15:56"),
(40,4,"Solicitud Aprobada","La solicitud con asunto: Factorizacion de polinomios , fue aprobada para el dia 2021-02-02 iniciando a las 07:30 impartida en : <br>laboratorio 1",1,"2021-01-30 18:42:22"),
(41,10,"Solicitud Asignada","Se le ha asignado una tutoria , con asunto: Factorizacion de polinomios , para el dia 2021-02-02 iniciando a las 07:30 impartida en : <br>laboratorio 1",0,"2021-01-30 18:42:22"),
(42,6,"Solicitud Aprobada","La solicitud con asunto: conjugacion de verbos , fue aprobada para el dia 2021-02-02 iniciando a las 07:30 impartida en : <br>laboratorio 2",0,"2021-01-30 18:43:23"),
(43,9,"Solicitud Asignada","Se le ha asignado una tutoria , con asunto: conjugacion de verbos , para el dia 2021-02-02 iniciando a las 07:30 impartida en : <br>laboratorio 2",0,"2021-01-30 18:43:23"),
(44,4,"Solicitud Aprobada","La solicitud con asunto: Polimorfismo y Herencia , fue aprobada para el dia 2021-02-08 iniciando a las 14:00 impartida en : <br>Aula 45 Edificio F5",0,"2021-02-06 15:40:14"),
(45,8,"Solicitud Asignada","Se le ha asignado una tutoria , con asunto: Polimorfismo y Herencia , para el dia 2021-02-08 iniciando a las 14:00 impartida en : <br>Aula 45 Edificio F5",1,"2021-02-06 15:40:14");


DROP TABLE IF EXISTS `periods`;

CREATE TABLE `periods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(100) NOT NULL,
  `stardate` varchar(20) NOT NULL,
  `finishdate` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO periods VALUES (1,"1ero 2021","2020-8-1","2020-12-1");


DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `baseon` varchar(20) NOT NULL,
  `privilege` varchar(20) NOT NULL,
  `announcement` tinyint(1) NOT NULL DEFAULT 0,
  `Messenger` tinyint(1) NOT NULL DEFAULT 0,
  `ownsched` tinyint(1) NOT NULL DEFAULT 1,
  `createtutoring` tinyint(1) NOT NULL DEFAULT 1,
  `crudstudent` tinyint(1) NOT NULL DEFAULT 0,
  `denytutoring` tinyint(1) NOT NULL DEFAULT 0,
  `jointutoring` tinyint(1) NOT NULL DEFAULT 1,
  `foro` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `privilege` (`privilege`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

INSERT INTO roles VALUES (1,"Student","Estudiante",0,0,0,1,0,0,1,0),
(2,"Tutor","Tutor",1,1,1,0,0,0,0,0),
(3,"Coordinator","Coordinador",1,1,0,1,1,1,0,0),
(4,"Sys","Administrador",1,0,0,0,0,0,0,0);


DROP TABLE IF EXISTS `sch_tut`;

CREATE TABLE `sch_tut` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tutor` int(11) NOT NULL,
  `schedule` int(11) NOT NULL,
  `course` int(11) NOT NULL,
  `availability` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `tutor` (`tutor`),
  KEY `schedule` (`schedule`),
  KEY `course` (`course`),
  CONSTRAINT `sch_tut_ibfk_1` FOREIGN KEY (`tutor`) REFERENCES `logins` (`id`),
  CONSTRAINT `sch_tut_ibfk_2` FOREIGN KEY (`schedule`) REFERENCES `schedules` (`id`),
  CONSTRAINT `sch_tut_ibfk_3` FOREIGN KEY (`course`) REFERENCES `courses` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

INSERT INTO sch_tut VALUES (1,8,1,5,1),
(2,8,5,5,1),
(3,8,6,6,0),
(4,8,5,2,1),
(5,7,1,7,1),
(7,7,1,5,1),
(8,7,1,6,1),
(9,7,5,1,1),
(10,7,5,2,1),
(11,9,1,8,1),
(12,9,3,9,1),
(13,10,1,1,1),
(14,10,1,2,1),
(15,9,1,1,1),
(16,7,2,7,1);


DROP TABLE IF EXISTS `schedules`;

CREATE TABLE `schedules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `starttime` varchar(10) NOT NULL,
  `finishtime` varchar(10) NOT NULL,
  `availability` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

INSERT INTO schedules VALUES (1,"07:30","08:30",1),
(2,"09:00","10:00",1),
(3,"10:00","11:00",1),
(4,"11:00","12:00",1),
(5,"13:00","14:00",1),
(6,"14:00","15:00",1),
(7,"15:00","16:00",1);


DROP TABLE IF EXISTS `sections`;

CREATE TABLE `sections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(100) NOT NULL,
  `availability` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

INSERT INTO sections VALUES (1,"laboratorio 1",1),
(2,"laboratorio 2",1),
(3,"Aula 25-Edificio B2",1),
(4,"Aula 45 Edificio F5",1),
(5,"Aula Magna",1),
(6,"laboratorio 3 ",1);


DROP TABLE IF EXISTS `tutorials`;

CREATE TABLE `tutorials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(100) NOT NULL,
  `details` varchar(500) NOT NULL,
  `reservdate` varchar(25) NOT NULL,
  `requestdate` varchar(25) NOT NULL,
  `filename` varchar(100) DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT -1,
  `score` int(11) DEFAULT 0,
  `initialtime` varchar(25) DEFAULT NULL,
  `finaltime` varchar(25) DEFAULT NULL,
  `starttime` varchar(25) DEFAULT NULL,
  `finishtime` varchar(25) DEFAULT NULL,
  `stucomment` varchar(500) DEFAULT NULL,
  `tutcomment` varchar(500) DEFAULT NULL,
  `space` varchar(500) NOT NULL DEFAULT 'No definido',
  `period_` int(11) NOT NULL,
  `asignatura` int(11) NOT NULL,
  `approvedby` int(11) DEFAULT NULL,
  `tutor` int(11) NOT NULL,
  `petitioner` int(11) NOT NULL,
  `modality` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `asignatura` (`asignatura`),
  KEY `tutor` (`tutor`),
  KEY `petitioner` (`petitioner`),
  KEY `approvedby` (`approvedby`),
  KEY `period_` (`period_`),
  CONSTRAINT `tutorials_ibfk_1` FOREIGN KEY (`asignatura`) REFERENCES `courses` (`id`),
  CONSTRAINT `tutorials_ibfk_2` FOREIGN KEY (`tutor`) REFERENCES `logins` (`id`),
  CONSTRAINT `tutorials_ibfk_3` FOREIGN KEY (`petitioner`) REFERENCES `logins` (`id`),
  CONSTRAINT `tutorials_ibfk_4` FOREIGN KEY (`approvedby`) REFERENCES `logins` (`id`),
  CONSTRAINT `tutorials_ibfk_5` FOREIGN KEY (`period_`) REFERENCES `periods` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4;

INSERT INTO tutorials VALUES (14,"Factorizacion","no puedo factorizar","2021-01-24","2021-01-22 7:16pm",0,3,0,"13:00","14:00",NULL,NULL,NULL,NULL,"No cumple con los requisitos",1,2,1,7,6,0),
(15,"Recursividad","No comprendo cuando o como utilizar la recursivad en Java.","2021-01-26","2021-01-24 8:20am","ejer Repaso programacion.docx",2,4,"14:00","15:00","24-01-2021 11:28am","24-01-2021 11:30am","El tutor me despejo todas las dudas.",NULL,"laboratorio 1",1,6,1,8,4,0),
(18,"inner join","no comprendo la diferencia entre inner join , left join y right join.","2021-01-31","2021-01-29 10:14am",0,2,0,"14:00","15:00","30-01-2021 4:05pm","30-01-2021 4:06pm",NULL,NULL,"Aula 25-Edificio B2",1,6,1,8,4,0),
(27,"Factorizacion de polinomios","no comprendo la factorizacion por tanteo.","2021-02-02","2021-01-31 1:39am",0,2,4,"07:30","08:30","30-01-2021 6:44pm","30-01-2021 6:45pm","se me aclararon todas las dudas",NULL,"laboratorio 1",1,2,1,10,4,0),
(28,"conjugacion de verbos","no puedo conjugar los verbos","2021-02-02","2021-01-31 1:41am",0,1,0,"07:30","08:30",NULL,NULL,NULL,NULL,"laboratorio 2",1,1,1,9,6,0),
(29,"Polimorfismo y Herencia","no comprendo bien la herencia multiple en PHP y el polimorfismo","2021-02-08","2021-02-06 10:25pm","ejer Repaso programacion.docx",2,4,"14:00","15:00","06-02-2021 3:42pm","06-02-2021 3:43pm","me ayudo mucho, ahora entiendo mejor.",NULL,"Aula 45 Edificio F5",1,6,1,8,4,0);


DROP TABLE IF EXISTS `tutortypes`;

CREATE TABLE `tutortypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(50) NOT NULL,
  `hour_payment` float(8,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO tutortypes VALUES (1,"Ninguno","0.00"),
(2,"Docente","200.00"),
(3,"Estudiante","100.00");


