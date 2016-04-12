
-- -----------------------------------------------------
-- Schema filesdb
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS filesdb ;

-- -----------------------------------------------------
-- Schema filesdb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS filesdb DEFAULT CHARACTER SET utf8 ;
USE filesdb ;

-- -----------------------------------------------------
-- Table FileType
-- -----------------------------------------------------
DROP TABLE IF EXISTS FileType ;

CREATE TABLE IF NOT EXISTS FileType (
  type_id INT NOT NULL,
  file_type VARCHAR(45) NOT NULL,
  PRIMARY KEY (type_id));


-- -----------------------------------------------------
-- Table Files
-- -----------------------------------------------------
DROP TABLE IF EXISTS Files ;

CREATE TABLE IF NOT EXISTS Files (
  fid INT NOT NULL,
  path VARCHAR(85) NOT NULL,
  fname VARCHAR(45) NOT NULL,
  type_id INT NOT NULL,
  PRIMARY KEY (fid),
  CONSTRAINT fk_Files_FileType
    FOREIGN KEY (type_id)
    REFERENCES FileType (type_id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

