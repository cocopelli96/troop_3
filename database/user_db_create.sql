
-- -----------------------------------------------------
-- Schema userdb
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS userdb ;

-- -----------------------------------------------------
-- Schema userdb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS userdb DEFAULT CHARACTER SET utf8 ;
USE userdb ;

-- -----------------------------------------------------
-- Table Permission
-- -----------------------------------------------------
DROP TABLE IF EXISTS Permission ;

CREATE TABLE IF NOT EXISTS Permission (
  perm_id INT NOT NULL,
  perm_title VARCHAR(45) NOT NULL,
  perm_level INT NOT NULL,
  PRIMARY KEY (perm_id));


-- -----------------------------------------------------
-- Table UserAccount
-- -----------------------------------------------------
DROP TABLE IF EXISTS UserAccount ;

CREATE TABLE IF NOT EXISTS UserAccount (
  uid INT NOT NULL,
  uname VARCHAR(45) NOT NULL,
  pass VARCHAR(45) NOT NULL,
  perm_id INT NOT NULL,
  PRIMARY KEY (uid),
  CONSTRAINT fk_UserAccount_Permission1
    FOREIGN KEY (perm_id)
    REFERENCES Permission (perm_id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table UserContact
-- -----------------------------------------------------
DROP TABLE IF EXISTS UserContact ;

CREATE TABLE IF NOT EXISTS UserContact (
  contact_id INT NOT NULL,
  descript VARCHAR(45) NOT NULL,
  PRIMARY KEY (contact_id));


-- -----------------------------------------------------
-- Table AccountContact
-- -----------------------------------------------------
DROP TABLE IF EXISTS AccountContact ;

CREATE TABLE IF NOT EXISTS AccountContact (
  uid INT NOT NULL,
  contact_id INT NOT NULL,
  acct_contact VARCHAR(45) NOT NULL,
  PRIMARY KEY (uid, contact_id),
  CONSTRAINT fk_AccountContact_UserAccount1
    FOREIGN KEY (uid)
    REFERENCES UserAccount (uid)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_AccountContact_UserContact1
    FOREIGN KEY (contact_id)
    REFERENCES UserContact (contact_id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table UserScout
-- -----------------------------------------------------
DROP TABLE IF EXISTS UserScout ;

CREATE TABLE IF NOT EXISTS UserScout (
  uid INT NOT NULL,
  sid INT NOT NULL,
  PRIMARY KEY (uid),
  CONSTRAINT fk_table1_UserAccount1
    FOREIGN KEY (uid)
    REFERENCES UserAccount (uid)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);
