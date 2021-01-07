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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

INSERT INTO careers VALUES (1,"Especial"),
(2,"Clases Generales"),
(3,"Ing. en informática"),
(4,"Ing. en Gestión Logística"),
(5,"Mercadotecnia"),
(14,"Odontologia"),
(15,"Lic. Ciberseguridad");


DROP TABLE IF EXISTS `courses`;

CREATE TABLE `courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coursename` varchar(100) NOT NULL,
  `career` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `career` (`career`),
  CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`career`) REFERENCES `careers` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

INSERT INTO courses VALUES (1,"Español",2),
(2,"Matematica 110",2),
(3,"Gestion logistica 1",4),
(4,"Publicidad",5),
(5,"Programacion 1",3),
(6,"programacion 2",3),
(7,"Base de datos",3),
(8,"Filosofia",2),
(9,"Analisis de informacion",15),
(10,"Explotacion de vulnerabilidades",15),
(11,"Ingenieria Social",15);


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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

INSERT INTO logins VALUES (2,"dennis_andino","$2y$04$AwVLA12xB5mD2C7tXxJwiuqESFMyjtM1G6WMJqqXr.smSclv1KHpe",1,"2020-11-09","2020-11-09","Dennis Fermin Motino Andino","Dennis Motino","dennis_andino@unitec.edu",97231583,1,3,31745643,"1993-07-09","2020-11-09","Student.png",0,"soy estudiante pasante de la carrera....",1,1),
(3,"student_default","$2y$04$efTyMrEgOzUkEVAfSNRnr.A2Z1D868MDx6zOrfFi1Re9mdhPhntr6",1,"2020-11-09","2020-11-09","student default","student ","studentdefault@gmail.com",97231583,1,3,31745643,"2020-11-19","2020-11-10","Student.png",0,"usuario por defecto del sistema.",1,1),
(4,"tutor_default","$2y$04$efTyMrEgOzUkEVAfSNRnr.A2Z1D868MDx6zOrfFi1Re9mdhPhntr6",2,"10-22-2020","10-15-2020","Dennis F motino Andino","tutor default","dennis___andino@unitec.edu",97231583,2,2,31711449,"2021-01-24","10-22-2016","Student.png",0,"",1,1),
(5,"coordinator_default","$2y$04$efTyMrEgOzUkEVAfSNRnr.A2Z1D868MDx6zOrfFi1Re9mdhPhntr6",3,"10-22-2020","10-15-2020","Dennis F motino Andino","coordinator default","dennis_andino@unitec.com",97231583,1,1,31711465,"09-07-2020","10-22-2016","pepito.jpg",0,"Coordinador del departamento de Asistencia estudiantil desde 2002 con alto reconocimiento bla bla...",1,1),
(6,"celena_castillo","$2y$04$efTyMrEgOzUkEVAfSNRnr.A2Z1D868MDx6zOrfFi1Re9mdhPhntr6",2,"10-22-2020","10-15-2020","Lidia Celena Castillo Palma","Celena castillo","celenacastillo@unitec.edu",32857015,1,5,31711448,"1996-01-20","10-22-2016","userdefault.png",0,"Pasante de Administración , bilingue , soltera , buena onda la wuirra.",1,1),
(7,"gustavo_ochoa","$2y$04$efTyMrEgOzUkEVAfSNRnr.A2Z1D868MDx6zOrfFi1Re9mdhPhntr6",2,"2020-11-14","2020-11-14","Gustavo Alfredo Ochoa","Gustavo Ochoa","gustavo8@unitec.edu",97231345,1,3,31745567,"1993-11-14","2016-11-27","userdefault.png",0,NULL,1,1),
(8,"lourdes_mendoza","$2y$04$efTyMrEgOzUkEVAfSNRnr.A2Z1D868MDx6zOrfFi1Re9mdhPhntr6",2,"2020-11-14","2020-11-14","Lourdes Lorena Mendoza","Lourdes Mendoza","lorenamendoza@unitec.edu",768694043,1,3,31745643,"1970-11-12","2010-11-11","userdefault.png",0,"",1,1),
(9,"juna_zuniga","$2y$04$efTyMrEgOzUkEVAfSNRnr.A2Z1D868MDx6zOrfFi1Re9mdhPhntr6",2,"2020-11-14","2020-11-14","Juan Antonio Zunigo","Juan Zunigo","juan@unitec.edu",354672987,1,3,31745888,"1990-11-14","2016-11-21","userdefault.png",0,NULL,1,1),
(17,"diego_armando","$2y$04$efTyMrEgOzUkEVAfSNRnr.A2Z1D868MDx6zOrfFi1Re9mdhPhntr6",2,"2020-11-25","2020-11-25","Diego Armando Maradona","Diego MAradona","diegoarmando@gmail.com",97231583,1,1,32145678,"1960-11-25","2017-11-18","userdefault.png",0,"",1,1),
(20,"administrator_default","$2y$04$efTyMrEgOzUkEVAfSNRnr.A2Z1D868MDx6zOrfFi1Re9mdhPhntr6",4,"10-22-2020","10-15-2020","Administrator","Administrator default","admin@outlook.com",97231583,1,1,31711465,"10-22-2020","10-22-2016","userdefault.png",0,"usuario por defecto del sistema.",1,1),
(21,"sandra_andino","$2y$04$efTyMrEgOzUkEVAfSNRnr.A2Z1D868MDx6zOrfFi1Re9mdhPhntr6",2,"2020-11-26","2020-11-26","Sandra Isabel Andino","Sandra Andino","sandra@outlook.com",97231583,2,4,321456876,"1968-03-31","2014-11-15","userdefault.png",0,NULL,1,1),
(22,"julio_cesar","$2y$04$efTyMrEgOzUkEVAfSNRnr.A2Z1D868MDx6zOrfFi1Re9mdhPhntr6",1,"2020-11-28","2020-11-28","Julio Cesar Salazar","Julio Salazar","julio@unitec.edu",97865463,1,4,32145645,"1994-11-04","2016-11-14","userdefault.png",0,NULL,1,1),
(23,"denis_alberto","$2y$04$QXdSA5evxiUowLkpu621lu0rRH5Srj3Jh0qgnM9Pc6BDa2QuifbIW",1,"2020-12-17","2020-12-17","Denis alberto godoy hernandez","Denis godoy","deniasalberto@gmail.com",9723158377,1,3,317164535,"2020-12-19","2020-12-17","userdefault.png",0,"",1,1);


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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

INSERT INTO members_assistance VALUES (1,1,3,0),
(2,1,3,0),
(3,2,3,0),
(4,3,3,0),
(5,4,3,0),
(6,5,2,0),
(7,6,2,0),
(8,7,3,1),
(9,8,3,0),
(10,9,3,0),
(13,3,3,0),
(22,5,3,0),
(23,5,3,0),
(24,19,2,0),
(25,3,2,0);


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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

INSERT INTO notifications VALUES (1,3,"Solicitud Aprobada","La solicitud con asunto: Algebra Booleana , fue aprobada para el dia 2020-11-30 iniciando a las 19:00 impartida en : <br>laboratorio 2",1,"2020-12-12 02:04:35"),
(2,7,"Solicitud Asignada","Se le ha asignado una tutoria , con asunto: Algebra Booleana , para el dia 2020-11-30 iniciando a las 19:00 impartida en : <br>laboratorio 2",1,"2020-12-12 02:04:35"),
(3,4,"Tutoria reprogramada","Se ha reprogramado la tutoria #7 con asunto : POO para el dia: 2020-07-03",1,"2020-12-12 03:44:17"),
(4,3,"Tutoria reprogramada","Se ha reprogramado la solicitud con asunto : POO para el dia: 2020-07-03",1,"2020-12-12 03:44:17"),
(5,4,"Tutoria reprogramada","Se ha reprogramado la tutoria #7 con asunto : POO para el dia: 2020-07-03",1,"2020-12-12 03:50:07"),
(6,3,"Tutoria reprogramada","Se ha reprogramado la solicitud con asunto : POO para el dia: 2020-07-03",1,"2020-12-12 03:50:07"),
(7,4,"Tutoria reprogramada","Se ha reprogramado la tutoria #7 con asunto : POO para el dia: 2020-07-03",1,"2020-12-12 03:51:18"),
(8,3,"Tutoria reprogramada","Se ha reprogramado la solicitud con asunto : POO para el dia: 2020-07-03",1,"2020-12-12 03:51:18"),
(9,3,"Solicitud Aprobada","La solicitud con asunto:  , fue aprobada para el dia 2020-12-26 iniciando a las 07:00 impartida en : <br>http://localhost/GT/tutorials/getinfo",1,"2020-12-15 19:27:07"),
(10,4,"Solicitud Asignada","Se le ha asignado una tutoria , con asunto:  , para el dia 2020-12-26 iniciando a las 07:00 impartida en : <br>http://localhost/GT/tutorials/getinfo",1,"2020-12-15 19:27:07"),
(11,2,"Solicitud Cancelada","La solicitud con asunto: Instalacion de  MSSQL , fue cancelada a razon de : el alumno solicito su cancelacion",1,"2020-12-17 02:53:31"),
(12,2,"Solicitud Aprobada","La solicitud con asunto: Instalacion de  MSSQL , fue aprobada para el dia 2020-12-18 iniciando a las 10:00 impartida en : <br>Aula 45 Edificio F5",1,"2020-12-17 02:55:00"),
(13,4,"Solicitud Asignada","Se le ha asignado una tutoria , con asunto: Instalacion de  MSSQL , para el dia 2020-12-18 iniciando a las 10:00 impartida en : <br>Aula 45 Edificio F5",1,"2020-12-17 02:55:00"),
(14,4,"Tutoria reprogramada","Se ha reprogramado la tutoria #19 con asunto : Instalacion de  MSSQL para el dia: 2020-12-18",1,"2020-12-17 03:15:23"),
(15,2,"Tutoria reprogramada","Se ha reprogramado la solicitud con asunto : Instalacion de  MSSQL para el dia: 2020-12-18",1,"2020-12-17 03:15:23"),
(16,2,"Solicitud Aprobada","La solicitud con asunto: Polimorfismo con herencia multiple , fue aprobada para el dia 2020-12-21 iniciando a las 09:00 impartida en : <br>https://zoom.us/j/93818575766?pwd=",1,"2020-12-19 15:23:51"),
(17,4,"Solicitud Asignada","Se le ha asignado una tutoria , con asunto: Polimorfismo con herencia multiple , para el dia 2020-12-21 iniciando a las 09:00 impartida en : <br>https://zoom.us/j/93818575766?pwd=",1,"2020-12-19 15:23:51"),
(18,2,"Solicitud Aprobada","La solicitud con asunto: Instalacion de  MSSQL , fue aprobada para el dia 2020-12-18 iniciando a las 07:00 impartida en : <br>laboratorio 1",0,"2020-12-22 22:49:57"),
(19,4,"Solicitud Asignada","Se le ha asignado una tutoria , con asunto: Instalacion de  MSSQL , para el dia 2020-12-18 iniciando a las 07:00 impartida en : <br>laboratorio 1",1,"2020-12-22 22:49:57"),
(20,2,"Solicitud Aprobada","La solicitud con asunto: Polimorfismo con herencia multiple , fue aprobada para el dia 2020-12-21 iniciando a las 09:00 impartida en : <br>https://zoom.us",0,"2020-12-22 23:26:57"),
(21,4,"Solicitud Asignada","Se le ha asignado una tutoria , con asunto: Polimorfismo con herencia multiple , para el dia 2020-12-21 iniciando a las 09:00 impartida en : <br>https://zoom.us",1,"2020-12-22 23:26:57"),
(22,2,"Solicitud Aprobada","La solicitud con asunto: Polimorfismo con herencia multiple , fue aprobada para el dia 2020-12-21 iniciando a las 09:00 impartida en : <br>https://zoom.us/j/96806268727?pwd=dTQzYmpieUV6VlAzZmVod0haY2lYZz09",0,"2020-12-22 23:56:58"),
(23,4,"Solicitud Asignada","Se le ha asignado una tutoria , con asunto: Polimorfismo con herencia multiple , para el dia 2020-12-21 iniciando a las 09:00 impartida en : <br>https://zoom.us/j/96806268727?pwd=dTQzYmpieUV6VlAzZmVod0haY2lYZz09",1,"2020-12-22 23:56:58"),
(24,2,"Solicitud Aprobada","La solicitud con asunto: Instalacion de  MSSQL , fue aprobada para el dia 2020-12-18 iniciando a las 07:00 impartida en : <br>laboratorio 2",0,"2020-12-23 01:39:58"),
(25,4,"Solicitud Asignada","Se le ha asignado una tutoria , con asunto: Instalacion de  MSSQL , para el dia 2020-12-18 iniciando a las 07:00 impartida en : <br>laboratorio 2",1,"2020-12-23 01:39:58"),
(26,2,"Solicitud Aprobada","La solicitud con asunto: Instalacion de  MSSQL , fue aprobada para el dia 2020-12-18 iniciando a las 07:00 impartida en : <br>laboratorio 2",0,"2020-12-31 01:33:41"),
(27,4,"Solicitud Asignada","Se le ha asignado una tutoria , con asunto: Instalacion de  MSSQL , para el dia 2020-12-18 iniciando a las 07:00 impartida en : <br>laboratorio 2",1,"2020-12-31 01:33:41");


DROP TABLE IF EXISTS `periods`;

CREATE TABLE `periods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(100) NOT NULL,
  `stardate` varchar(20) NOT NULL,
  `finishdate` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO periods VALUES (1,"4to 2020","2020-6-1","2020-10-1"),
(2,"3ero 2020","2020-7-1","2020-11-1"),
(3,"1ero 2020","2020-8-1","2020-12-1");


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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

INSERT INTO sch_tut VALUES (1,4,1,5,0),
(2,4,2,6,1),
(28,7,2,1,1);


DROP TABLE IF EXISTS `schedules`;

CREATE TABLE `schedules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `starttime` varchar(10) NOT NULL,
  `finishtime` varchar(10) NOT NULL,
  `availability` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

INSERT INTO schedules VALUES (1,"07:00","10:30",1),
(2,"09:00","10:00",1),
(3,"10:00","11:30",1),
(4,"11:00","12:00",1),
(5,"13:00","14:00",1),
(6,"15:00","16:00",1),
(7,"17:00","18:00",1),
(8,"19:00","21:00",1),
(9,"07:40","03:47",1);


DROP TABLE IF EXISTS `sections`;

CREATE TABLE `sections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(100) NOT NULL,
  `availability` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

INSERT INTO tutorials VALUES (1,"POO","No comprendo la Herencia","2020-12-02","2020-11-14","cuestionario.docx",3,4,"09:00","10:00","26-11-2020 1:24am","26-11-2020 1:25am","excelente","excelente","No definido",1,6,5,4,2,0),
(2,"Diagrama ER","no comprendo al clase padre","2020-11-28","2020-11-26 9:13am","tarea_bd_5.docx",2,0,"10:00","11:30",NULL,NULL,"Me confundio mas",NULL,"No definido",2,7,3,4,3,0),
(3,"Algebra Booleana","No comprendo el AND XOR etc","2020-11-30","2020-11-28 12:45am",0,1,2,"19:00","21:00",NULL,NULL,"Sabe bastante, pero no explica bien",NULL,"laboratorio 2",2,2,5,7,3,0),
(4,"funciones SQL","no comprendo las funciones de SQL","2020-11-30","2020-11-28 12:47am",0,2,0,"10:00","11:30","15-12-2020 12:20am","15-12-2020 12:20am","Es bueno",NULL,"laboratorio 1",3,7,5,4,3,0),
(5,"pseudocodigo","no se como usar pseint","2020-11-30","2020-11-28 12:48am",0,2,4,"08:00","08:55","15-12-2020 7:29pm","15-12-2020 7:29pm","Muy Buena tutoria",NULL,"Aula 25-Edificio B2",3,5,5,4,2,0),
(6,"SQL","no comprendo SQL","2020-11-30","2020-11-28 12:50am",0,2,0,"10:00","11:30","30-12-2020 3:26am","30-12-2020 3:43am","Me parecio Excelente",NULL,"No definido",3,7,3,4,2,0),
(7,"POO","","2020-07-03","2020-11-30 12:08am",0,2,4,"07:00","08:30","30-12-2020 11:39pm","30-12-2020 11:39pm","Me gusto la tutoria, el tutor muy bien preparado.",NULL,"https://web.whatsapp.com/",3,5,5,4,3,1),
(8,"POO","","2020-12-02","2020-11-30 12:10am",0,3,0,"09:00","10:00",NULL,NULL,NULL,NULL,"Se cancelo por falta de respuesta del alumno.",3,6,5,4,3,0),
(9,"Funciones trigonométricas","no comprendo el uso del SENO y COSENO","2020-12-09","2020-12-07 3:12am",0,0,0,"19:00","21:00",NULL,NULL,NULL,NULL,"el alumno solicito su cancelacion",3,2,5,7,3,1),
(19,"Instalacion de  MSSQL","no se me instala el sql","2020-12-18","2020-12-16 2:25am",0,-1,0,"07:00","08:30",NULL,NULL,NULL,NULL,"laboratorio 2",3,5,5,4,2,1);


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

