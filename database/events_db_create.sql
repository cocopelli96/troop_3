
-- -----------------------------------------------------
-- Schema eventsdb
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS eventsdb ;

-- -----------------------------------------------------
-- Schema eventsdb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS eventsdb DEFAULT CHARACTER SET utf8 ;
USE eventsdb ;

-- -----------------------------------------------------
-- Table Event
-- -----------------------------------------------------
DROP TABLE IF EXISTS Event ;

CREATE TABLE IF NOT EXISTS Event (
  event_id INT NOT NULL,
  event_name VARCHAR(45) NOT NULL,
  description VARCHAR(225) NOT NULL,
  location VARCHAR(45) NOT NULL,
  start_date DATETIME NOT NULL,
  end_date DATETIME NOT NULL,
  PRIMARY KEY (event_id));


-- -----------------------------------------------------
-- Table SignUp
-- -----------------------------------------------------
DROP TABLE IF EXISTS SignUp ;

CREATE TABLE IF NOT EXISTS SignUp (
  signup_id INT NOT NULL,
  end_signup DATETIME NOT NULL,
  cost INT NOT NULL,
  event_id INT NOT NULL,
  PRIMARY KEY (signup_id),
  CONSTRAINT fk_SignUp_Event
    FOREIGN KEY (event_id)
    REFERENCES Event (event_id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table Attendant
-- -----------------------------------------------------
DROP TABLE IF EXISTS Attendant ;

CREATE TABLE IF NOT EXISTS Attendant (
  sid INT NOT NULL,
  event_id INT NOT NULL,
  PRIMARY KEY (event_id, sid),
  CONSTRAINT fk_Attendies_Event1
    FOREIGN KEY (event_id)
    REFERENCES Event (event_id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);
