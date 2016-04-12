
-- -----------------------------------------------------
-- Schema rosterdb
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS rosterdb ;

-- -----------------------------------------------------
-- Schema rosterdb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS rosterdb DEFAULT CHARACTER SET utf8 ;
USE rosterdb ;

-- -----------------------------------------------------
-- Table Patrol
-- -----------------------------------------------------
DROP TABLE IF EXISTS Patrol ;

CREATE TABLE IF NOT EXISTS Patrol (
  patrol_id INT NOT NULL,
  pname VARCHAR(45) NOT NULL,
  PRIMARY KEY (patrol_id));


-- -----------------------------------------------------
-- Table LeadershipPosition
-- -----------------------------------------------------
DROP TABLE IF EXISTS LeadershipPosition ;

CREATE TABLE IF NOT EXISTS LeadershipPosition (
  lead_id INT NOT NULL,
  lead_title VARCHAR(45) NOT NULL,
  PRIMARY KEY (lead_id));


-- -----------------------------------------------------
-- Table Rank
-- -----------------------------------------------------
DROP TABLE IF EXISTS Rank ;

CREATE TABLE IF NOT EXISTS Rank (
  rank_id INT NOT NULL,
  rank_title VARCHAR(45) NOT NULL,
  PRIMARY KEY (rank_id));


-- -----------------------------------------------------
-- Table Scout
-- -----------------------------------------------------
DROP TABLE IF EXISTS Scout ;

CREATE TABLE IF NOT EXISTS Scout (
  sid INT NOT NULL,
  sfn VARCHAR(45) NOT NULL,
  sln VARCHAR(45) NOT NULL,
  patrol_id INT NOT NULL,
  lead_id INT NOT NULL,
  rank_id INT NOT NULL,
  PRIMARY KEY (sid),
  CONSTRAINT fk_Scout_Patrol1
    FOREIGN KEY (patrol_id)
    REFERENCES Patrol (patrol_id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_Scout_LeadershipPosition1
    FOREIGN KEY (lead_id)
    REFERENCES LeadershipPosition (lead_id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_Scout_Rank1
    FOREIGN KEY (rank_id)
    REFERENCES Rank (rank_id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table Badges
-- -----------------------------------------------------
DROP TABLE IF EXISTS Badges ;

CREATE TABLE IF NOT EXISTS Badges (
  badge_id INT NOT NULL,
  badge_name VARCHAR(45) NOT NULL,
  PRIMARY KEY (badge_id));


-- -----------------------------------------------------
-- Table contact
-- -----------------------------------------------------
DROP TABLE IF EXISTS contact ;

CREATE TABLE IF NOT EXISTS contact (
  cid INT NOT NULL,
  con_descript VARCHAR(45) NOT NULL,
  PRIMARY KEY (cid));


-- -----------------------------------------------------
-- Table Address
-- -----------------------------------------------------
DROP TABLE IF EXISTS Address ;

CREATE TABLE IF NOT EXISTS Address (
  aid INT NOT NULL,
  street VARCHAR(45) NOT NULL,
  city VARCHAR(45) NOT NULL,
  state VARCHAR(2) NOT NULL,
  zip VARCHAR(5) NOT NULL,
  sid INT NOT NULL,
  PRIMARY KEY (aid),
  CONSTRAINT fk_Address_Scout
    FOREIGN KEY (sid)
    REFERENCES Scout (sid)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table scoutcontact
-- -----------------------------------------------------
DROP TABLE IF EXISTS scoutcontact ;

CREATE TABLE IF NOT EXISTS scoutcontact (
    sid INT NOT NULL,
    cid INT NOT NULL,
    contact_val VARCHAR(45) NOT NULL,
    PRIMARY KEY (sid , cid),
    CONSTRAINT fk_scoutcontact_Scout1 FOREIGN KEY (sid)
        REFERENCES Scout (sid)
        ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT fk_scoutcontact_contact1 FOREIGN KEY (cid)
        REFERENCES contact (cid)
        ON DELETE NO ACTION ON UPDATE NO ACTION
);


-- -----------------------------------------------------
-- Table counselor
-- -----------------------------------------------------
DROP TABLE IF EXISTS counselor ;

CREATE TABLE IF NOT EXISTS counselor (
  sid INT NOT NULL,
  badge_id INT NOT NULL,
  PRIMARY KEY (sid, badge_id),
  CONSTRAINT fk_counselor_Badges1
    FOREIGN KEY (badge_id)
    REFERENCES Badges (badge_id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_counselor_Scout1
    FOREIGN KEY (sid)
    REFERENCES Scout (sid)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

