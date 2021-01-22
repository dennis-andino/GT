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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `binnacle`;

CREATE TABLE `binnacle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `typeevent` varchar(100) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `date_event` varchar(25) DEFAULT curdate(),
  `hour_event` varchar(25) DEFAULT date_format(current_timestamp(),'%H:%i'),
  `username` varchar(25) DEFAULT NULL,
  `ip_address` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8;

INSERT INTO binnacle VALUES (1,"login","inicio de sesion","2021-01-07","04:57","administrator_default","::1"),
(2,"login","inicio de sesion","2021-01-07","04:57","administrator_default","::1"),
(3,"login","inicio de sesion","2021-01-07","04:57","coordinador_default","::1"),
(4,"login","inicio de sesion","2021-01-07","04:57","coordinator_default","::1"),
(5,"login","inicio de sesion","2021-01-07","04:58","tutor_default","::1"),
(6,"login","inicio de sesion","2021-01-07","04:58","administrator_default","::1"),
(7,"login","inicio de sesion","2021-01-07","09:23","administrator_default","::1"),
(8,"login","inicio de sesion","2021-01-07","10:51","coordinador_default","::1"),
(9,"login","inicio de sesion","2021-01-07","10:52","coordinador_default","::1"),
(10,"login","inicio de sesion","2021-01-07","10:52","coordinator_default","::1"),
(11,"login","inicio de sesion","2021-01-07","15:05","student_default","::1"),
(12,"login","inicio de sesion","2021-01-07","16:07","coordinator_default","::1"),
(13,"login","inicio de sesion","2021-01-07","16:08","administrator_default","::1"),
(14,"login","inicio de sesion","2021-01-07","16:08","coordinator_default","::1"),
(15,"login","inicio de sesion","2021-01-07","16:09","coordinator_default","::1"),
(16,"login","inicio de sesion","2021-01-07","16:11","coordinator_default","::1"),
(17,"login","inicio de sesion","2021-01-07","16:13","coordinator_default","::1"),
(18,"login","inicio de sesion","2021-01-07","16:18","administrator_default","::1"),
(19,"login","inicio de sesion","2021-01-07","16:19","student_default","::1"),
(20,"login","inicio de sesion","2021-01-07","16:25","tutor_default","::1"),
(21,"login","inicio de sesion","2021-01-07","16:26","student_default","::1"),
(22,"login","inicio de sesion","2021-01-07","16:37","student_default","::1"),
(23,"login","inicio de sesion","2021-01-07","16:37","administrator_default","::1"),
(24,"login","inicio de sesion","2021-01-07","16:55","coordinator_default","::1"),
(25,"login","inicio de sesion","2021-01-08","15:48","coordinator_default","::1"),
(26,"login","inicio de sesion","2021-01-18","22:55","student_default","::1"),
(27,"login","inicio de sesion","2021-01-18","23:33","student_default","::1"),
(28,"login","inicio de sesion","2021-01-18","23:33","student_default","::1"),
(29,"login","inicio de sesion","2021-01-19","00:01","student_default","::1"),
(30,"login","inicio de sesion","2021-01-19","00:16","student_default","::1"),
(31,"login","inicio de sesion","2021-01-19","00:31","student_default","::1"),
(32,"login","inicio de sesion","2021-01-19","00:42","student_default","::1"),
(33,"login","inicio de sesion","2021-01-19","00:42","student_default","::1"),
(34,"login","inicio de sesion","2021-01-19","00:42","student_default","::1"),
(35,"login","inicio de sesion","2021-01-19","00:42","student_default","::1"),
(36,"login","inicio de sesion","2021-01-19","02:27","coordinator_default","::1"),
(37,"login","inicio de sesion","2021-01-19","02:40","coordinator_default","::1"),
(38,"login","inicio de sesion","2021-01-19","02:54","coordinator_default","::1"),
(39,"Nuevo","El usuario :::1 agrego una carrera nueva :Ingenieria en Puteria","2021-01-19","03:16","::1","coordinator_default"),
(40,"login","inicio de sesion","2021-01-19","03:17","coordinator_default","::1"),
(41,"Nuevo","El usuario :::1 agrego una carrera nueva :Ingenieria en Puteria","2021-01-19","03:17","::1","coordinator_default"),
(42,"login","inicio de sesion","2021-01-19","03:17","coordinator_default","::1"),
(43,"Nuevo","El usuario :::1 agrego una carrera nueva :Ingenieria en Puteria","2021-01-19","03:19","::1","coordinator_default"),
(44,"login","inicio de sesion","2021-01-19","04:01","coordinator_default","::1"),
(45,"login","inicio de sesion","2021-01-20","22:31","coordinator_default","::1"),
(46,"Nuevo","El usuario :::1 agrego una carrera nueva :Ingenieria en Geologia","2021-01-21","00:04","::1","coordinator_default"),
(47,"login","inicio de sesion","2021-01-21","01:17","coordinator_default","::1"),
(48,"login","inicio de sesion","2021-01-21","02:32","tutor_default","::1"),
(49,"login","inicio de sesion","2021-01-21","02:32","tutor_default","::1"),
(50,"login","inicio de sesion","2021-01-21","02:37","coordinator_default","::1"),
(51,"Eliminacion","El usuario :coordinator_default elimino la solicitud de tutoria con id :19","2021-01-21","03:52","coordinator_default","::1"),
(52,"Eliminacion","El usuario :coordinator_default elimino la solicitud de tutoria con id :31","2021-01-21","03:53","coordinator_default","::1"),
(53,"Eliminacion","El usuario :coordinator_default elimino la solicitud de tutoria con id :30","2021-01-21","03:56","coordinator_default","::1"),
(54,"login","inicio de sesion","2021-01-21","04:06","coordinator_default","::1"),
(55,"login","inicio de sesion","2021-01-21","04:17","tutor_default","::1"),
(56,"login","inicio de sesion","2021-01-21","04:22","coordinator_default","::1"),
(57,"login","inicio de sesion","2021-01-21","04:25","tutor_default","::1"),
(58,"login","inicio de sesion","2021-01-21","04:40","tutor_default","::1"),
(59,"login","inicio de sesion","2021-01-21","04:55","coordinator_default","::1"),
(60,"login","inicio de sesion","2021-01-21","04:56","tutor_default","::1"),
(61,"login","inicio de sesion","2021-01-21","07:06","administrator_default","::1"),
(62,"login","inicio de sesion","2021-01-21","22:37","administrator_default","::1"),
(63,"Registro","Registro de usuario Antonio ","2021-01-21","22:44","antonio_murillo","::1"),
(64,"login","inicio de sesion","2021-01-22","00:01","administrator_default","::1"),
(65,"login","inicio de sesion","2021-01-22","00:29","coordinator_default","::1"),
(66,"login","inicio de sesion","2021-01-22","01:04","administrator_default","::1"),
(67,"login","inicio de sesion","2021-01-22","01:07","coordinator_default","::1"),
(68,"login","inicio de sesion","2021-01-22","01:32","coordinator_default","::1"),
(69,"login","inicio de sesion","2021-01-22","02:55","administrator_default","::1"),
(70,"login","inicio de sesion","2021-01-22","03:03","coordinator_default","::1"),
(71,"login","inicio de sesion","2021-01-22","03:26","coordinator_default","::1"),
(72,"login","inicio de sesion","2021-01-22","03:30","student_default","::1"),
(73,"login","inicio de sesion","2021-01-22","03:40","student_default","::1"),
(74,"login","inicio de sesion","2021-01-22","03:40","coordinator_default","::1"),
(75,"login","inicio de sesion","2021-01-22","03:41","coordinator_default","::1"),
(76,"login","inicio de sesion","2021-01-22","03:41","tutor_default","::1"),
(77,"login","inicio de sesion","2021-01-22","03:41","coordinator_default","::1"),
(78,"login","inicio de sesion","2021-01-22","03:52","student_default","::1"),
(79,"login","inicio de sesion","2021-01-22","03:52","coordinator_default","::1"),
(80,"login","inicio de sesion","2021-01-22","03:59","student_default","::1"),
(81,"login","inicio de sesion","2021-01-22","03:59","student_default","::1"),
(82,"login","inicio de sesion","2021-01-22","04:02","coordinator_default","::1"),
(83,"login","inicio de sesion","2021-01-22","04:03","tutor_default","::1"),
(84,"login","inicio de sesion","2021-01-22","04:04","coordinator_default","::1"),
(85,"login","inicio de sesion","2021-01-22","04:04","tutor_default","::1"),
(86,"login","inicio de sesion","2021-01-22","04:05","administrator_default","::1");


DROP TABLE IF EXISTS `campus`;

CREATE TABLE `campus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO campus VALUES (1,"CEUTEC Tegucigalpa"),
(2,"CEUTEC San Pedro sula");


DROP TABLE IF EXISTS `careers`;

CREATE TABLE `careers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

INSERT INTO careers VALUES (1,"Especial"),
(2,"Clases Generales"),
(3,"Ing. en informática"),
(4,"Ing. en Gestión Logística"),
(5,"Mercadotecnia"),
(14,"Odontologia"),
(15,"Lic. Ciberseguridad"),
(16,"Administracion de empresas"),
(17,"Licenciatura en periodismo"),
(18,"Ingenieria de Software"),
(19,"Ingenieria en Geologia");


DROP TABLE IF EXISTS `courses`;

CREATE TABLE `courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coursename` varchar(100) NOT NULL,
  `career` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `career` (`career`),
  CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`career`) REFERENCES `careers` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

INSERT INTO courses VALUES (1,"Español",2),
(2,"Matematica 1",2),
(3,"Gestion de inventario",4),
(4,"Publicidad",5),
(5,"Programacion 1",3),
(6,"programacion 2",3),
(7,"Base de datos",3),
(8,"Filosofia",2),
(9,"Analisis de informacion",15),
(10,"Explotacion de vulnerabilidades",15),
(11,"Ingenieria Social",15),
(12,"default_course",16),
(13,"Tecnicas de investigacion",17),
(14,"Programacion Basica",18),
(15,"ciencias Naturales",2),
(16,"Sociologia",2),
(20,"Topografia 1",19),
(21,"Topografia 2",19),
(22,"Redes",3),
(23,"Transporte",4),
(24,"Tecnicas de produccion",4),
(25,"Distribucion",4),
(26,"Mercados",5),
(27,"Marketing",5),
(28,"Comunicacion 1",17),
(29,"Comunicacion 2",17),
(30,"Modelado de software",18),
(31,"Estructura de datos",18);


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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO institution VALUES (1,"CEUTEC","Ser una universidad referente a nivel internacional en la formación de profesionales íntegros Y competentes, que contribuyan al desarrollo y transformación de la sociedad. RRRR","Formar profesionales líderes, con visión global y comprometidos, mediante un modelo educativo basado en competencias, valores, emprendimiento, innovación académica y tecnológica, internacionalidad, investigación y vinculación con la sociedad.RRR","Boulevard Kennedy, V-784, frente a Residencial Honduras.","+504 2268-1000","admisionesteg@unitec.edu","unitec.png");


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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

INSERT INTO logins VALUES (2,"dennis_andino","$2y$04$CSNSt51BedtE6fqt5/q0Petil/KwCEs3hs1AzkYNYyerBHSnBhDK.",1,"2020-11-09","2020-11-09","Dennis Fermin Motino Andino","Dennis Motino","dennis_andino@unitec.edu",97231583,1,3,31745643,"1993-07-09","2020-11-09","Student.png",0,"soy estudiante pasante de la carrera....",1,1),
(3,"student_default","$2y$04$CSNSt51BedtE6fqt5/q0Petil/KwCEs3hs1AzkYNYyerBHSnBhDK.",1,"2020-11-09","2020-11-09","student default","student ","studentdefault@gmail.com","(504) 97231583",1,3,31745643,"1994-07-09","2020-11-10","Student.png",0,"usuario por defecto del sistema.",1,1),
(4,"tutor_default","$2y$04$CSNSt51BedtE6fqt5/q0Petil/KwCEs3hs1AzkYNYyerBHSnBhDK.",2,"10-22-2020","10-15-2020","Dennis F motino Andino","tutor default","dennis___andino@unitec.edu",97231583,2,2,31711449,"2021-01-24","10-22-2016","Student.png",0,"",1,1),
(5,"coordinator_default","$2y$04$CSNSt51BedtE6fqt5/q0Petil/KwCEs3hs1AzkYNYyerBHSnBhDK.",3,"10-22-2020","10-15-2020","Dennis F motino Andino","coordinator default","dennis_andino@unitec.com",97231583,1,1,31711465,"09-07-2020","10-22-2016","pepito.jpg",0,"Coordinador del departamento de Asistencia estudiantil desde 2002 con alto reconocimiento bla bla...",1,1),
(6,"celena_castillo","$2y$04$CSNSt51BedtE6fqt5/q0Petil/KwCEs3hs1AzkYNYyerBHSnBhDK.",2,"10-22-2020","10-15-2020","Lidia Celena Castillo Palma","Celena castillo","celenacastillo@unitec.edu",32857015,1,5,31711448,"1996-01-20","10-22-2016","userdefault.png",0,"Pasante de Administración , bilingue , soltera , buena onda la wuirra.",1,1),
(7,"gustavo_ochoa","$2y$04$CSNSt51BedtE6fqt5/q0Petil/KwCEs3hs1AzkYNYyerBHSnBhDK.",2,"2020-11-14","2020-11-14","Gustavo Alfredo Ochoa","Gustavo Ochoa","gustavo8@unitec.edu",97231345,1,3,31745567,"1993-11-14","2016-11-27","userdefault.png",0,NULL,1,1),
(8,"lourdes_mendoza","$2y$04$CSNSt51BedtE6fqt5/q0Petil/KwCEs3hs1AzkYNYyerBHSnBhDK.",2,"2020-11-14","2020-11-14","Lourdes Lorena Mendoza","Lourdes Mendoza","lorenamendoza@unitec.edu",768694043,1,3,31745643,"1970-11-12","2010-11-11","userdefault.png",0,"",1,1),
(9,"juna_zuniga","$2y$04$CSNSt51BedtE6fqt5/q0Petil/KwCEs3hs1AzkYNYyerBHSnBhDK.",2,"2020-11-14","2020-11-14","Juan Antonio Zunigo","Juan Zunigo","juan@unitec.edu",354672987,1,3,31745888,"1990-11-14","2016-11-21","userdefault.png",0,NULL,1,1),
(17,"diego_armando","$2y$04$CSNSt51BedtE6fqt5/q0Petil/KwCEs3hs1AzkYNYyerBHSnBhDK.",2,"2020-11-25","2020-11-25","Diego Armando Maradona","Diego MAradona","diegoarmando@gmail.com",97231583,1,1,32145678,"1960-11-25","2017-11-18","userdefault.png",0,"",1,1),
(20,"administrator_default","$2y$04$CSNSt51BedtE6fqt5/q0Petil/KwCEs3hs1AzkYNYyerBHSnBhDK.",4,"10-22-2020","10-15-2020","Administrator","Administrator default","admin@outlook.com",97231583,1,1,31711465,"10-22-2020","10-22-2016","userdefault.png",0,"usuario por defecto del sistema.",1,1),
(21,"sandra_andino","$2y$04$CSNSt51BedtE6fqt5/q0Petil/KwCEs3hs1AzkYNYyerBHSnBhDK.",2,"2020-11-26","2020-11-26","Sandra Isabel Andino","Sandra Andino","sandra@outlook.com",97231583,2,4,321456876,"1968-03-31","2014-11-15","userdefault.png",0,NULL,1,1),
(22,"julio_cesar","$2y$04$CSNSt51BedtE6fqt5/q0Petil/KwCEs3hs1AzkYNYyerBHSnBhDK.",1,"2020-11-28","2020-11-28","Julio Cesar Salazar","Julio Salazar","julio@unitec.edu",97865463,1,4,32145645,"1994-11-04","2016-11-14","userdefault.png",0,NULL,1,1),
(23,"denis_alberto","$2y$04$CSNSt51BedtE6fqt5/q0Petil/KwCEs3hs1AzkYNYyerBHSnBhDK.",1,"2020-12-17","2020-12-17","Dennis Alberto Godoy Hernandez","Denis godoy","denis_alberto@gmail.com",97231583,1,3,317164535,"1990-12-19","2020-12-17","userdefault.png",0,"",1,1),
(26,"antonio_murillo","$2y$04$CSNSt51BedtE6fqt5/q0Petil/KwCEs3hs1AzkYNYyerBHSnBhDK.",3,"2021-01-21","2021-01-21","Antonio Murillo","Antonio ","antonio@outlook.com",97231583,1,2,56372223,"1990-01-24","2000-01-09","userdefault.png",0,NULL,1,1);


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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO members_assistance VALUES (1,1,3,0),
(2,2,3,0);


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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `periods`;

CREATE TABLE `periods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(100) NOT NULL,
  `stardate` varchar(20) NOT NULL,
  `finishdate` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO periods VALUES (1,"4to 2020","2020-6-1","2020-10-1"),
(2,"3ero 2020","2020-7-1","2020-11-1"),
(3,"1ero 2020","2020-8-1","2020-12-1"),
(4,"1er 2021","2021-01-20","2021-04-20");


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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

INSERT INTO sch_tut VALUES (1,6,1,5,1),
(2,7,3,5,1),
(3,7,2,7,1),
(4,9,1,7,1),
(5,17,8,2,1),
(6,17,5,2,1),
(7,7,6,9,1),
(8,7,7,6,1),
(9,6,7,6,1),
(10,4,1,1,1);


DROP TABLE IF EXISTS `schedules`;

CREATE TABLE `schedules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `starttime` varchar(10) NOT NULL,
  `finishtime` varchar(10) NOT NULL,
  `availability` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

INSERT INTO schedules VALUES (1,"07:00","08:00",1),
(2,"08:00","09:00",1),
(3,"09:00","10:00",1),
(4,"10:00","11:00",1),
(5,"11:00","12:00",1),
(6,"13:00","14:00",1),
(7,"14:00","15:00",1),
(8,"15:00","16:00",0);


DROP TABLE IF EXISTS `sections`;

CREATE TABLE `sections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(100) NOT NULL,
  `availability` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

INSERT INTO sections VALUES (1,"laboratorio 1",1),
(2,"laboratorio 2",1),
(3,"Aula 25-Edificio B2",1),
(4,"Aula 45 Edificio F5",1),
(5,"Aula Magna",1);


DROP TABLE IF EXISTS `tutorials`;

CREATE TABLE `tutorials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(100) NOT NULL,
  `details` varchar(500) NOT NULL,
  `reservdate` varchar(25) NOT NULL,
  `requestdate` varchar(25) NOT NULL,
  `filename` varchar(100) DEFAULT 'emt',
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
  `modality` tinyint(4) DEFAULT 0,
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO tutorials VALUES (1,"Polimorfismo","No comprendo como aplicar el polimorfismo","2021-01-24","2021-01-22 11:00am","cuestionario.docx",-1,0,"09:00","10:00",NULL,NULL,NULL,NULL,"No definido",4,5,3,7,3,1),
(2,"Factorizacion","como determinar el factor comun","2021-01-24","2021-01-22 11:02am",0,-1,0,"15:00","16:00",NULL,NULL,NULL,NULL,"No definido",4,2,3,17,3,0);


DROP TABLE IF EXISTS `tutortypes`;

CREATE TABLE `tutortypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(50) NOT NULL,
  `hour_payment` float(8,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO tutortypes VALUES (1,"Ninguno","0.00"),
(2,"Docente","200.00"),
(3,"Estudiante","100.00");


