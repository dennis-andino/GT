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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



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
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4;

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
(33,"login","inicio de sesion","2021-01-22","13:47","administrator_default","::1");


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
(6,"Adminsitracion de empresas");


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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

INSERT INTO logins VALUES (1,"coordinator_default","$2y$04$ceZzEqKLv6MmmdXtjbglTedzwMp5aPIExpatwF3Wxk65tzZDs0MTG",3,"10-22-2020","10-15-2020","Dennis F motino Andino","coordinator default","dennis_andino@outlook.com",97231583,1,1,31711465,"10-22-2020","10-22-2016","pepito.jpg",0,NULL,1,1),
(2,"administrator_default","$2y$04$PJtbfSrpv/uttQfhJelJjOAg.90qn5./Ht9HBVyFz8D4iN6s/Nr3G",4,"10-22-2020","10-15-2020","Administrator","Administrator default","admin@outlook.com",97231583,1,1,31711465,"10-22-2020","10-22-2016","userdefault.png",0,NULL,1,1),
(4,"dennis_andino","$2y$04$yQgLo8HED9mYUxw6Gl3.SOZ0/Bv7DBw86UnqirtgWT/isEopjN5Km",1,"2021-01-22","2021-01-22","Dennis Fermin Motiño Andino","Dennis Motiño","dennis_andino@unitec.com",97231583,1,3,31711467,"1993-07-09","2016-01-22","usuario.png",0,NULL,1,1),
(5,"lidia_castillo","$2y$04$iwg62eG1P28OI0vvo6OyYOqcWN/kJ7Vtnf.0rQ2tyxtyD4ZMgf4Za",1,"2021-01-22","2021-01-22","Lidia Celena Castillo Palma","Lidia Castillo","lidiacelena96@gmail.com",32857015,1,6,31711468,"1996-01-20","2017-01-24","userdefault.png",0,"",1,1),
(6,"tomas_murillo","$2y$04$CMXVIdLM2gdg2fqAf.XH9OsGo8Q1aTrjSrESKzQB2aNCH2NDHDVtO",1,"2021-01-22","2021-01-22","Tomas Antonio Murillo","Tomas Murillo","tomas_antonio@outlook.com",972315833,1,4,56372245,"1990-12-30","2020-01-13","userdefault.png",0,NULL,1,1),
(7,"lourdes_gonzales","$2y$04$su.fLwkN6SkG/v3lp/VTSe6Q6tXZ8V6JD8AKd8tyf74tdeC6yYpIu",2,"2021-01-22","2021-01-22","Lourdes Carolina Gonzales Mendoza","Lourdes Gonzales","lourdesgonzales@unitec.edu",972315832,1,3,7898765,"1980-01-15","2000-01-23","lourdes.jpg",0,NULL,1,1),
(8,"osman_mejia","$2y$04$ItkUP.oPMfoydyrrOoXpB.s.g8BVvjkh6OXM6z/TJlg8lR4xX64RC",2,"2021-01-22","2021-01-22","Osman Antonio Mejia Alvarado","Osman Mejia","osman_mejia@unitec.edu",972315873,1,3,7898766,"1980-01-22","2005-01-08","Osman.jpg",0,"",1,1);


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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO members_assistance VALUES (1,13,4,1),
(2,14,6,0);


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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

INSERT INTO notifications VALUES (1,4,"Solicitud Aprobada","La solicitud con asunto: Polimorfismo , fue aprobada para el dia 2021-01-24 iniciando a las 14:00 impartida en : <br>https://zoom.us/j/93818575766?pwd=cHpTR2R3M0hCeFU2OXo5ZTBuZWZEZz09",1,"2021-01-22 12:56:26"),
(2,8,"Solicitud Asignada","Se le ha asignado una tutoria , con asunto: Polimorfismo , para el dia 2021-01-24 iniciando a las 14:00 impartida en : <br>https://zoom.us/j/93818575766?pwd=cHpTR2R3M0hCeFU2OXo5ZTBuZWZEZz09",1,"2021-01-22 12:56:26"),
(3,4,"Solicitud Aprobada","La solicitud con asunto: Polimorfismo , fue aprobada para el dia 2021-01-24 iniciando a las 14:00 impartida en : <br>https://zoom.us/j/93818575766?pwd=cHpTR2R3M0hCeFU2OXo5ZTBuZWZEZz09",0,"2021-01-22 13:05:55"),
(4,8,"Solicitud Asignada","Se le ha asignado una tutoria , con asunto: Polimorfismo , para el dia 2021-01-24 iniciando a las 14:00 impartida en : <br>https://zoom.us/j/93818575766?pwd=cHpTR2R3M0hCeFU2OXo5ZTBuZWZEZz09",0,"2021-01-22 13:05:55");


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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

INSERT INTO sch_tut VALUES (1,8,1,5,1),
(2,8,5,5,1),
(3,8,6,6,1),
(4,8,5,2,1),
(5,7,1,7,1),
(7,7,1,5,1),
(8,7,1,6,1),
(9,7,5,1,1),
(10,7,5,2,1);


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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

INSERT INTO tutorials VALUES (13,"Polimorfismo","No comprendo como aplicarlo y cuando.","2021-01-24","2021-01-22 7:06pm","ejer Repaso programacion.docx",1,4,"14:00","15:00","22-01-2021 12:58pm","22-01-2021 12:58pm","Me aclaro todas las dudas, gracias.",NULL,"https://zoom.us/j/93818575766?pwd=cHpTR2R3M0hCeFU2OXo5ZTBuZWZEZz09",1,6,1,8,4,1),
(14,"Factorizacion","no puedo factorizar","2021-01-24","2021-01-22 7:16pm",0,-1,0,"13:00","14:00",NULL,NULL,NULL,NULL,"No definido",1,2,1,7,6,0);


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


