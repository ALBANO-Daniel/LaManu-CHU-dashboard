#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------
CREATE DATABASE IF NOT EXISTS `hospitalE2N` CHARACTER SET 'utf8';
USE `hospitalE2N`;

#------------------------------------------------------------
# Table: patients
#------------------------------------------------------------

CREATE TABLE IF NOT EXISTS `patients`(
        `id`        INT (11) AUTO_INCREMENT  NOT NULL ,
        `lastname`  VARCHAR (25) NOT NULL ,
        `firstname` VARCHAR (25) NOT NULL ,
        `birthdate` VARCHAR (100) NOT NULL ,
        `phone`     VARCHAR (25) ,
        `mail`      VARCHAR (100) NOT NULL ,
        PRIMARY KEY (`id`)
)ENGINE=InnoDB;

INSERT INTO patients (id,firstname,lastname,birthdate,phone,mail)
VALUES
  (1,"Tatiana","frzfz","04/06/2005","1-813-372-9443","rutrum.magna@icloud.couk"),
  (2,"Tyrone","aprat","08/10/1964","(876) 916-5466","luctus.ipsum@hotmail.net"),
  (3,"Janna","mino","19/11/1971","1-146-363-1231","dapibus.id@hotmail.couk"),
  (4,"Aaron","jako","20/10/1972","1-925-867-6577","eget.venenatis.a@aol.net"),
  (5,"Bruce","Banner","04/02/1987","1-925-867-6577","green.guy@gmail.com"),
  (6,"Matt","Murdock","07/01/1989","1-925-867-6577","devil.hellskitchen@gmail.com"),
  (7,"Peter","Parker","16/06/1999","1-925-867-6577","friendly.spider@gmail.com"),
  (8,"Tony","Stark","22/06/1980","1-925-867-6577","invincible.dude@gmail.com"),
  (9,"Steve","Rogers","04/07/1934","1-925-867-6577","star.spangled@gmail.com"),
  (10,"Zeph","Carpentier","06/11/1974","(141) 877-2691","non@icloud.org");

#------------------------------------------------------------
# Table: appointments
#------------------------------------------------------------

CREATE TABLE IF NOT EXISTS `appointments`(
        `id`         INT (11) AUTO_INCREMENT  NOT NULL ,
        `dateHour`   DATETIME NOT NULL ,
        `idPatients` INT (11) NOT NULL ,
        PRIMARY KEY (`id`)
)ENGINE=InnoDB;

-- ALTER TABLE appointments 
-- ADD CONSTRAINT FK_appointments_id_patients
--   FOREIGN KEY (idPatients)
--   REFERENCES patients (id)
--   ON DELETE CASCADE
--   ON UPDATE NO ACTION;

  INSERT INTO appointments (id,dateHour,idPatients)
VALUES
  (1,"2021-01-17 15:30:00",2),
  (2,"2021-01-14 13:25:00",1),
  (3,"2021-01-26 16:25:00",3),
  (4,"2021-03-12 14:25:00",5),
  (5,"2021-05-30 15:30:00",4),
  (6,"2021-01-08 17:00:00",8),
  (7,"2021-03-09 16:25:00",7),
  (8,"2021-05-06 12:45:00",10),
  (9,"2021-03-30 13:30:00",6),
  (10,"2021-05-14 14:25:00",9);
