/*
 * Desarrollado por : DennisM.Andino
 * Contactame a mi correo : dennis_andino@outlook.com
 * mi canal de Youtube: CodigoCompartido
 * proyecto disponible en : https://github.com/dennis-andino/GT
*/

CREATE VIEW VW_SCHEDULES as
select s.id as id, s.availability,s.tutor as tutorid, l.alias as tutor, s2.starttime, s2.finishtime, c.id as course, c.coursename
from sch_tut as s
         inner join logins as l on s.tutor = l.id
         inner join schedules as s2 on s.schedule = s2.id
         inner join courses as c on s.course = c.id;

CREATE VIEW VW_NEXTUTORIALS AS
SELECT T.id,
       T.petitioner,
       C.career,
       T.score,
       T.subject,
       C.coursename,
       T.reservdate,
       T.initialtime AS starttime,
       T.finaltime AS finishtime,
       T.status,
       TU.alias  AS tutor,
     IF(T.modality=0,'Presencial','Virtual') AS modalidad,
       T.space
FROM TUTORIALS AS T
         INNER JOIN COURSES AS C ON T.asignatura = C.id
         INNER JOIN LOGINS TU ON T.tutor = TU.id;



CREATE VIEW VW_ALLTUTORIALS AS
SELECT T.id,
       T.reservdate,
       CONCAT(T.initialtime, '-', T.finaltime) AS schedule,
       T.status,
       C.coursename,
       TU.alias                                AS tutor,
       PE.alias                                AS student
FROM TUTORIALS AS T
         INNER JOIN COURSES AS C ON T.asignatura = C.id
         INNER JOIN LOGINS TU ON T.tutor = TU.id
         INNER JOIN LOGINS PE ON T.petitioner = PE.id;




CREATE VIEW GETTUTORIALINFO AS
SELECT T.id,
   CONCAT(T.initialtime,'-',T.finaltime) AS schedule,
       PE.alias AS studentname,
       TU.alias AS tutorname,
       T.subject,
       T.details,
       T.reservdate,
       T.requestdate,
       T.filename,
       T.status,
       T.score,
       T.starttime,
       T.finishtime,
       T.stucomment,
       T.tutcomment,
       T.modality,
       T.space,
       P.description AS period,
       C.coursename,
       CO.alias      AS approvedby
FROM TUTORIALS AS T
         INNER JOIN PERIODS P ON T.period_ = P.id
         INNER JOIN COURSES AS C ON T.asignatura = C.id
         INNER JOIN LOGINS CO ON T.approvedby = CO.id
         INNER JOIN LOGINS TU ON T.tutor = TU.id
         INNER JOIN LOGINS PE ON T.petitioner = PE.id;



CREATE VIEW VW_TUTBYTUTORS AS
SELECT T.id,
       PE.alias                                 AS student,
       C.coursename,
       T.subject,
       T.details,
       T.filename,
       T.reservdate,
       CONCAT(T.initialtime, '-', T.finaltime) as schedule,
       T.status,
       T.score,
       TU.id                                    as tutorid
FROM TUTORIALS AS T
         INNER JOIN COURSES AS C ON T.asignatura = C.id
         INNER JOIN LOGINS TU ON T.tutor = TU.id
         INNER JOIN LOGINS PE ON T.petitioner = PE.id;

CREATE VIEW GET_USER_INFO AS
SELECT L.id,
       L.username,
       L.fullname,
       L.alias,
       L.email,
       L.phone,
       L.account,
       L.birthDate,
       L.admissionDate,
       L.createOn,
       L.lastUpdate,
       L.photo,
       L.availability,
       L.generalPoint,
       L.observations,
       C.description  as campus,
       C2.description as career,
       R.privilege,
       R.baseon
FROM LOGINS AS L
         INNER JOIN CAMPUS C on L.campus = C.id
         INNER JOIN CAREERS C2 on L.career = C2.id
         INNER JOIN ROLES R on L.userRole = R.id;

CREATE VIEW GET_SCH_BYTUTORS AS
SELECT SC.id, SC.tutor, CONCAT(SCH.starttime, '-', SCH.finishtime) AS schedule, C.coursename, SC.availability
FROM sch_tut AS SC
         INNER JOIN schedules AS SCH ON SC.schedule = SCH.id
         INNER JOIN courses C on SC.course = C.id;


CREATE VIEW UserInfoEdit AS
select L.id,
       L.fullname,
       L.email,
       L.phone,
       L.birthDate,
       L.account,
       L.career       as careerid,
       CA.description as career,
       R.privilege,
       R.id           as roleid,
       C.id           as campusid,
       C.description  AS campus,
       L.observations
from logins as L
         inner join ROLES as R on L.userRole = R.id
         inner join campus as C on L.campus = C.id
         inner join careers as CA on L.career = CA.id;


CREATE VIEW GET_EVALUATION AS
SELECT CASE score
           WHEN 1 THEN 'Malo'
           WHEN 2 THEN 'Regular'
           WHEN 3 THEN 'Muy bueno'
           WHEN 4 THEN 'Excelente'
           ELSE 'Sin Calificar'
           END AS evaluation,COUNT(*) AS total,tutor FROM TUTORIALS GROUP BY evaluation;


CREATE VIEW GET_GUEST_ASSISTANCE AS
SELECT DISTINCT T.id,
                C.coursename,
                T.subject,
                T.reservdate,
                concat(T.initialtime, '-', T.finaltime)     AS schedule,
                l.alias                                     AS tutor,
                T.space,
                T.status,
                IF(T.modality = 0, 'Presencial', 'Virtual') AS modalidad,
                T.score,
                T.petitioner,
                ma.student
FROM members_assistance AS ma
         INNER JOIN TUTORIALS AS T ON ma.tutorial = T.id
         INNER JOIN courses AS C ON T.asignatura = C.id
         INNER JOIN logins AS l ON T.tutor = l.id;


