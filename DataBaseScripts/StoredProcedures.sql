/*
 * Desarrollado por : DennisM.Andino
 * Contactame a mi correo : dennis_andino@outlook.com
 * mi canal de Youtube: CodigoCompartido
 * proyecto disponible en : https://github.com/dennis-andino/GT
*/


DELIMITER $$
CREATE
    DEFINER = `root`@`localhost` PROCEDURE `REGISTER_USERS`(IN `username_` VARCHAR(25),
                                                            IN `pass_` VARCHAR(200),
                                                            IN `userRole_` INT,
                                                            IN `createOn_` VARCHAR(20),
                                                            IN `lastUpdate_` VARCHAR(20),
                                                            IN `fullname_` VARCHAR(50),
                                                            IN `alias_` VARCHAR(50),
                                                            IN `email_` VARCHAR(200),
                                                            IN `phone_` VARCHAR(100),
                                                            IN `campus_` INT,
                                                            IN `career_` INT,
                                                            IN `account_` VARCHAR(20),
                                                            IN `birthDate_` VARCHAR(20),
                                                            IN `admissionDate_` VARCHAR(25),
                                                            IN `ip_addr` VARCHAR(50))
BEGIN
    DECLARE id_user INT;
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
        BEGIN
            ROLLBACK;
            SET id_user = 0;
            SELECT id_user;
        END;
    DECLARE EXIT HANDLER FOR SQLWARNING
        BEGIN
            ROLLBACK;
            SET id_user = 0;
            SELECT id_user;
        END;
    START TRANSACTION;
    SET id_user = 0;
    INSERT INTO logins(username, pass, userRole, createOn, lastUpdate, fullname, alias, email, phone, campus, career,
                       account, birthDate, admissionDate)
    VALUES (username_, pass_, userRole_, createOn_, lastUpdate_, fullname_, alias_, email_, phone_, campus_, career_,
            account_, birthDate_, admissionDate_);
    select id INTO id_user from logins where username = username_;
    IF (id_user > 0) THEN
        INSERT INTO binnacle (typeevent, description, date_event,hour_event, username, ip_address)
        VALUES ('Registro', concat('Registro de usuario ', alias_),CURDATE(),DATE_FORMAT(NOW( ), "%H:%i"), username_, ip_addr);
        COMMIT;
    ELSE
        ROLLBACK;
    END IF;
    SELECT id_user;
END $$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE `LOGIN`(IN `_username` VARCHAR(25), IN `ip_addr` VARCHAR(50))
BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
        BEGIN
            ROLLBACK;
        END;
    DECLARE EXIT HANDLER FOR SQLWARNING
        BEGIN
            ROLLBACK;
        END;
    START TRANSACTION;
    INSERT INTO binnacle (typeevent, description, date_event,hour_event, username, ip_address)
    VALUES ('login', concat('inicio de sesion'),CURDATE(),DATE_FORMAT(NOW( ), "%H:%i"), _username, ip_addr);
    COMMIT;
    SELECT l.id,
           l.username,
           l.pass,
           l.alias,
           l.email,
           l.career,
           l.birthDate,
           l.photo,
           r.announcement,
           r.ownsched,
           r.createtutoring,
           r.denytutoring,
           r.jointutoring,
           r.baseon,
        (SELECT name from institution where id=1) AS institution,
        (SELECT logo from institution where id=1) AS logo
    FROM logins l
             INNER JOIN roles r on l.userRole = r.id
    WHERE username = _username AND l.availability = 1;
END$$
DELIMITER ;

drop procedure CREATE_TUTORIA;
DELIMITER $$
CREATE
    DEFINER = `root`@`localhost` PROCEDURE `CREATE_TUTORIA`(IN `schedule_` INT,
                                                            IN `petitioner_` INT,
                                                            IN `subject_` VARCHAR(100),
                                                            IN `details_` VARCHAR(500),
                                                            IN `reservdate_` VARCHAR(25),
                                                            IN `requestdate_` VARCHAR(25),
                                                            IN `filename_` VARCHAR(100),
                                                            IN `modality_` TINYINT)
BEGIN
    DECLARE error, periodo INT;
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
        BEGIN
            ROLLBACK;
            SET error = 1;
            SELECT error;
        END;
    DECLARE EXIT HANDLER FOR SQLWARNING
        BEGIN
            ROLLBACK;
            SET error = 1;
            SELECT error;
        END;
    START TRANSACTION;
    SET error = 0;
    select MAX(id) INTO periodo from periods;
    INSERT INTO tutorials(subject, details, reservdate, requestdate, filename, initialtime, finaltime, period_,
                          asignatura,approvedby, tutor, petitioner,modality)
    VALUES (subject_,
            details_,
            reservdate_,
            requestdate_,
            filename_,
            (select starttime from schedules where id = (select schedule from sch_tut where id = schedule_)),
            (select finishtime from schedules where id = (select schedule from sch_tut where id = schedule_)),
            periodo,
            (select course from sch_tut where id = schedule_),
            1,
            (select tutor from sch_tut where id = schedule_),
            petitioner_,modality_);
    IF error = 0 THEN
        INSERT INTO members_assistance(tutorial, student) VALUES ((select MAX(id) from tutorials), petitioner_);
        COMMIT;
    ELSE
        ROLLBACK;
    END IF;
    SELECT error;
END$$
DELIMITER ;

DELIMITER $$
CREATE
    DEFINER = `root`@`localhost` PROCEDURE `aproval_tutoria`(IN `tutoriaid` INT, IN `aproval_state` INT, IN `coordinator` INT,IN `place` VARCHAR(500))
BEGIN
    DECLARE result INT;
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
        BEGIN
            ROLLBACK;
            SET result = 1;
            SELECT result;
        END;
    DECLARE EXIT HANDLER FOR SQLWARNING
        BEGIN
            ROLLBACK;
            SET result = 1;
            SELECT result;
        END;
    START TRANSACTION;
    SET result = 0;
    UPDATE tutorials SET status=aproval_state , approvedby=coordinator,space=place WHERE id = tutoriaid;
    IF result = 0 THEN
        IF aproval_state=1 THEN
            INSERT INTO notifications(destinationid, subject, content, date)
            VALUES ((select petitioner from tutorials where id=tutoriaid),'Solicitud Aprobada',(SELECT CONCAT('La solicitud con asunto: ',subject,' , fue aprobada para el dia ',reservdate,' iniciando a las ',initialtime, ' impartida en : <br>', space) as resumo from tutorials where id=tutoriaid),(SELECT NOW()));
            INSERT INTO notifications(destinationid, subject, content, date)
            VALUES ((select tutor from tutorials where id=tutoriaid),'Solicitud Asignada',(SELECT CONCAT('Se le ha asignado una tutoria , con asunto: ',subject,' , para el dia ',reservdate,' iniciando a las ',initialtime, ' impartida en : <br>', space) as resumo from tutorials where id=tutoriaid),(SELECT NOW()));
        ELSE
            INSERT INTO notifications(destinationid, subject, content, date)
            VALUES ((select petitioner from tutorials where id=tutoriaid),'Solicitud Cancelada',(SELECT CONCAT('La solicitud con asunto: ',subject,' , fue cancelada a razon de : ', space) as resumo from tutorials where id=tutoriaid),(SELECT NOW()));
        END IF;
        COMMIT;
    ELSE
        ROLLBACK;
    END IF;
    SELECT result;
END$$
DELIMITER ;

DELIMITER $$
CREATE
    DEFINER = `root`@`localhost` PROCEDURE `update_tutoria`(IN `tutoriaid` INT, IN `schedull` INT, IN `reserv` VARCHAR(25), IN `space_` VARCHAR(150))
BEGIN
    DECLARE result INT;
    DECLARE tutor_ INT;
    DECLARE tutsubject VARCHAR(100);
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
        BEGIN
            ROLLBACK;
            SET result = 1;
            SELECT result;
        END;
    DECLARE EXIT HANDLER FOR SQLWARNING
        BEGIN
            ROLLBACK;
            SET result = 1;
            SELECT result;
        END;
    START TRANSACTION;
    SET result = 0;
    SELECT tutor INTO tutor_ from sch_tut where id = schedull;
    SELECT subject INTO tutsubject from tutorials where id = tutoriaid;
    UPDATE tutorials
    SET tutor=tutor_,
        asignatura=(select course from sch_tut where id = schedull),
        initialtime=(select starttime from schedules where id = (select schedule from sch_tut where id = schedull)),
        finaltime=(select finishtime from schedules where id = (select schedule from sch_tut where id = schedull)),
        reservdate=reserv,
        space=space_ WHERE id = tutoriaid;

    IF result = 0 THEN
        INSERT INTO notifications(destinationid, subject, content)
        VALUES (
                tutor_ ,
                'Tutoria reprogramada',
                (SELECT CONCAT('Se ha reprogramado la tutoria #',tutoriaid, ' con asunto : ',tutsubject,
                               ' para el dia: ',reserv)));
        INSERT INTO notifications(destinationid, subject, content)
        VALUES (
                   (select petitioner from tutorials where id=tutoriaid) ,
                   'Tutoria reprogramada',
                   (SELECT CONCAT('Se ha reprogramado la solicitud con asunto : ',tutsubject,' para el dia: ',reserv)));

        COMMIT;
    END IF;
    SELECT result;
END$$
DELIMITER ;

DELIMITER $$
CREATE
    DEFINER = `root`@`localhost` PROCEDURE `delete_tutoria`(IN `tutoriaid` INT,IN `username_` VARCHAR(25),IN `ip_addr` VARCHAR(50))
BEGIN
    DECLARE result INT;
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
        BEGIN
            ROLLBACK;
            SET result = 1;
            SELECT result;
        END;
    DECLARE EXIT HANDLER FOR SQLWARNING
        BEGIN
            ROLLBACK;
            SET result = 1;
            SELECT result;
        END;
    START TRANSACTION;
    SET result = 0;
    DELETE FROM members_assistance WHERE tutorial = tutoriaid;
    IF result = 0 THEN
        DELETE FROM tutorials WHERE id = tutoriaid;
        INSERT INTO binnacle (typeevent, description, date_event,hour_event, username, ip_address)
        VALUES ('Eliminacion', concat('El usuario :',username_,' elimino la solicitud de tutoria con id :',tutoriaid),CURDATE(),DATE_FORMAT(NOW( ), "%H:%i"), username_, ip_addr);
        COMMIT;
    END IF;
    SELECT result;
END$$
DELIMITER ;


DELIMITER $$
CREATE
    DEFINER = `root`@`localhost` PROCEDURE `register_assistence`(IN `assistenceid` INT)
BEGIN
    DECLARE result INT;
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
        BEGIN
            ROLLBACK;
            SET result = 1;
        END;
    DECLARE EXIT HANDLER FOR SQLWARNING
        BEGIN
            ROLLBACK;
            SET result = 1;
        END;
    START TRANSACTION;
    SET result = 0;
    UPDATE members_assistance SET assistance=1 WHERE id = assistenceid;
    IF result = 0 THEN
        COMMIT;
    END IF;
END$$
DELIMITER ;


DELIMITER $$
CREATE
    DEFINER = `root`@`localhost` PROCEDURE `WATCH_NOTIFICATIONS`(IN `userid` INT)
BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
        BEGIN
            ROLLBACK;
            SELECT id,subject,content,date FROM notifications WHERE destinationid=userid ORDER BY id DESC LIMIT 15;
        END;
    DECLARE EXIT HANDLER FOR SQLWARNING
        BEGIN
            ROLLBACK;
            SELECT id,subject,content,date FROM notifications WHERE destinationid=userid ORDER BY id DESC LIMIT 15;
        END;
START TRANSACTION;
    UPDATE notifications SET status=1 WHERE destinationid = userid AND status = 0;
    COMMIT;
    SELECT id,subject,content,date FROM notifications WHERE destinationid=userid ORDER BY id DESC LIMIT 15;
END$$
DELIMITER ;

DELIMITER $$
CREATE
    DEFINER = `root`@`localhost` PROCEDURE `CREATE_CAREER`(IN `career_name` VARCHAR(100),
                                                            IN `ip` VARCHAR(50),
                                                            IN `user_name` VARCHAR(25))
BEGIN
    DECLARE result INT;
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
        BEGIN
            ROLLBACK;
            SET result = 1;
            SELECT result;
        END;
    DECLARE EXIT HANDLER FOR SQLWARNING
        BEGIN
            ROLLBACK;
            SET result = 1;
            SELECT result;
        END;
    START TRANSACTION;
    SET result = 0;
    INSERT INTO careers(description)VALUES(career_name);
    IF result = 0 THEN
        INSERT INTO courses(coursename, career) VALUES ('default_course',(select max(id) from careers));
        INSERT INTO binnacle (typeevent, description, date_event,hour_event, username, ip_address)
        VALUES ('Nuevo', concat('El usuario :',user_name,' agrego una carrera nueva :',career_name),CURDATE(),DATE_FORMAT(NOW( ), "%H:%i"), user_name, ip);
        COMMIT;
    ELSE
        ROLLBACK;
    END IF;
    SELECT result;
END$$
DELIMITER ;

