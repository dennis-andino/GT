/*
 * Desarrollado por : DennisM.Andino
 * Contactame a mi correo : dennis_andino@outlook.com
 * mi canal de Youtube: CodigoCompartido
 * proyecto disponible en : https://github.com/dennis-andino/GT
*/

INSERT INTO ROLES(baseon,privilege, announcement, Messenger, ownsched, createtutoring, crudstudent, denytutoring, jointutoring, foro)
VALUES ('Student','Estudiante',0,0,0,1,0,0,1,0);
INSERT INTO ROLES(baseon,privilege, announcement, Messenger, ownsched, createtutoring, crudstudent, denytutoring, jointutoring, foro)
VALUES ('Tutor','Tutor',1,1,1,0,0,0,0,0);
INSERT INTO ROLES(baseon,privilege, announcement, Messenger, ownsched, createtutoring, crudstudent, denytutoring, jointutoring, foro)
VALUES ('Coordinator','Coordinador',1,1,0,1,1,1,0,0);
INSERT INTO ROLES(baseon,privilege, announcement, Messenger, ownsched, createtutoring, crudstudent, denytutoring, jointutoring, foro)
VALUES ('Sys','Administrador',1,0,0,0,0,0,0,0);
SELECT * FROM roles;

INSERT INTO CAMPUS (description) VALUES ('CEUTEC Tegucigalpa');
INSERT INTO CAMPUS (description) VALUES ('CEUTEC San Pedro sula');
SELECT * FROM campus;

INSERT INTO careers(description) value ('Atenciones Especiales');
INSERT INTO careers(description) value ('Clases Generales');
INSERT INTO careers(description) value ('Ingenieria en informatica');
INSERT INTO careers(description) value ('Gestion Logistica');
INSERT INTO careers(description) value ('Mercadotecnia');
SELECT * FROM careers;

INSERT INTO courses(coursename,career) VALUES ('Español',2);
INSERT INTO courses(coursename,career) VALUES ('Matematica 1',2);
INSERT INTO courses(coursename,career) VALUES ('Gestion Aduanera',4);
INSERT INTO courses(coursename,career) VALUES ('Publicidad',5);
INSERT INTO courses(coursename,career) VALUES ('programacion 1',3);
INSERT INTO courses(coursename,career) VALUES ('programacion 2',3);
INSERT INTO courses(coursename,career) VALUES ('Base de datos',3);
INSERT INTO courses(coursename,career) VALUES ('Atencion sicologica',1);
INSERT INTO courses(coursename,career) VALUES ('planificacion familiar',1);
SELECT * FROM courses;


INSERT INTO tutortypes(DESCRIPTION, HOUR_PAYMENT)VALUES ('Ninguno',0.00);
INSERT INTO tutortypes(DESCRIPTION, HOUR_PAYMENT)VALUES ('Docente',200.00);
INSERT INTO tutortypes(DESCRIPTION, HOUR_PAYMENT)VALUES ('Estudiante',100.00);
SELECT * FROM tutortypes;




CALL REGISTER_USERS('student_default', '$2y$04$aTUU9OkCaLLY8Z/DfNCvbuoUt4VJt4ZEueKFIHTJJI3uK/.hhFcrW', 1, '10-22-2020', '10-15-2020',
                    'Dennis F Motino Andino', 'student default', 'dennis@andino@unitec.edu', '97231583', 1, 1,'31711456','10-22-2020','10-22-2016','192.168.1.2');
CALL REGISTER_USERS('tutor_default', '$2y$04$aTUU9OkCaLLY8Z/DfNCvbuoUt4VJt4ZEueKFIHTJJI3uK/.hhFcrW', 2, '10-22-2020', '10-15-2020',
                    'Dennis F motino Andino', 'tutor default', 'dennis@andino@unitec.edu', '97231583', 2, 2,'31711448','10-22-2020','10-22-2016','192.168.1.2');
CALL REGISTER_USERS('celena_castillo', '$2y$04$aTUU9OkCaLLY8Z/DfNCvbuoUt4VJt4ZEueKFIHTJJI3uK/.hhFcrW', 2, '10-22-2020', '10-15-2020',
                    'Celena Castillo Palma', 'Celena castillo', 'celenacastillo@unitec.edu', '97231583', 2, 2,'31711448','10-22-2020','10-22-2016','192.168.1.2');
CALL REGISTER_USERS('coordinator_default', '$2y$04$aTUU9OkCaLLY8Z/DfNCvbuoUt4VJt4ZEueKFIHTJJI3uK/.hhFcrW', 3, '10-22-2020', '10-15-2020',
                    'Dennis F motino Andino', 'coordinator default', 'dennis_andino@outlook.com', '97231583', 1, 1,'31711465','10-22-2020','10-22-2016','192.168.1.2');
CALL REGISTER_USERS('administrator_default', '$2y$04$aTUU9OkCaLLY8Z/DfNCvbuoUt4VJt4ZEueKFIHTJJI3uK/.hhFcrW', 4, '10-22-2020', '10-15-2020',
                    'Administrator', 'Administrator default', 'admin@outlook.com', '97231583', 1, 1,'31711465','10-22-2020','10-22-2016','192.168.1.2');

INSERT INTO SCHEDULES(starttime, finishtime) VALUES ('08:00','09:00');
INSERT INTO SCHEDULES(starttime, finishtime) VALUES ('09:00','10:00');
INSERT INTO SCHEDULES(starttime, finishtime) VALUES ('10:00','11:00');
INSERT INTO SCHEDULES(starttime, finishtime) VALUES ('11:00','12:00');
INSERT INTO SCHEDULES(starttime, finishtime) VALUES ('13:00','14:00');
INSERT INTO SCHEDULES(starttime, finishtime) VALUES ('15:00','16:00');
SELECT * FROM SCHEDULES;

INSERT INTO SCH_TUT(tutor, schedule, course, availability) VALUES (4, 1, 5, 1);
INSERT INTO SCH_TUT(tutor, schedule, course, availability) VALUES (4, 2, 6, 1);
INSERT INTO SCH_TUT(tutor, schedule, course, availability) VALUES (4, 3, 7, 1);
SELECT * FROM sch_tut;
select * from logins;
select * from roles;
select * from courses;

INSERT INTO PERIODS(description, stardate, finishdate)VALUES ('4to 2020','2020-6-1','2020-10-1');
INSERT INTO PERIODS(description, stardate, finishdate)VALUES ('3ero 2020','2020-7-1','2020-11-1');
INSERT INTO PERIODS(description, stardate, finishdate)VALUES ('1ero 2021','2020-8-1','2020-12-1');
SELECT * FROM PERIODS;

select * from binnacle;

INSERT INTO binnacle(typeevent, description, date_event, hour_event, username, ip_address) VALUES ('error','No se encontro la base de datos','2020-01-01','00:00','defaul user','204.34.21.12');
INSERT INTO binnacle(typeevent, description, date_event, hour_event, username, ip_address) VALUES ('error','No se encontro el recurso solicitado','2020-02-01','08:00','defaul user','204.34.21.13');
INSERT INTO binnacle(typeevent, description, date_event, hour_event, username, ip_address) VALUES ('error','No se encontro la base de datos','2020-03-01','12:00','defaul user','204.34.21.14');
INSERT INTO binnacle(typeevent, description, date_event, hour_event, username, ip_address) VALUES ('error','No se encontro la base de datos','2020-04-01','13:00','defaul user','204.34.21.15');
INSERT INTO binnacle(typeevent, description, date_event, hour_event, username, ip_address) VALUES ('error','No se encontro la base de datos','2020-05-01','21:00','defaul user','204.34.21.16');
INSERT INTO binnacle(typeevent, description, date_event, hour_event, username, ip_address) VALUES ('error','No se encontro la base de datos','2020-06-01','14:00','defaul user','204.34.21.17');
INSERT INTO binnacle(typeevent, description, date_event, hour_event, username, ip_address) VALUES ('error','No se encontro la base de datos','2020-07-01','10:00','defaul user','204.34.21.18');
INSERT INTO binnacle(typeevent, description, date_event, hour_event, username, ip_address) VALUES ('error','No se encontro la base de datos','2020-08-01','22:00','defaul user','204.34.21.19');
INSERT INTO binnacle(typeevent, description, date_event, hour_event, username, ip_address) VALUES ('error','No se encontro la base de datos','2020-09-01','23:00','defaul user','204.34.21.14');
INSERT INTO binnacle(typeevent, description, date_event, hour_event, username, ip_address) VALUES ('error','No se encontro la base de datos','2020-10-01','01:00','defaul user','204.34.21.12');
INSERT INTO binnacle(typeevent, description, date_event, hour_event, username, ip_address) VALUES ('error','No se encontro la base de datos','2020-12-01','02:00','defaul user','204.34.21.11');

INSERT INTO INSTITUTION(name,vision,mission,address,telefone,email,logo)
 VALUES (
         'CEUTEC',
         'Ser una universidad referente a nivel internacional en la formación de profesionales íntegros, competentes y emprendedores, que contribuyan al desarrollo y transformación de la sociedad.',
         'Formar profesionales líderes, con visión global y compromiso social, mediante un modelo educativo basado en competencias, valores, emprendimiento, innovación académica y tecnológica, internacionalidad, investigación y vinculación con la sociedad.',
         'Boulevard Kennedy, V-782, frente a Residencial Honduras.',
         '+504 2268-1000',
         'admisionesteg@unitec.edu',
         'logo.png'
         );

INSERT INTO SECTIONS(description) VALUES ('laboratorio 1');
INSERT INTO SECTIONS(description) VALUES ('laboratorio 2');
INSERT INTO SECTIONS(description) VALUES ('Aula 25-Edificio B2');
INSERT INTO SECTIONS(description) VALUES ('Aula 45 Edificio F5');
INSERT INTO SECTIONS(description) VALUES ('Aula Magna');
select * from logins;