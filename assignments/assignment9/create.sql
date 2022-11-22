
CREATE TABLE date_notes (
 date_id int NOT NULL AUTO_INCREMENT,
 date_time datetime NULL,
 note_content text(500) NULL,
 PRIMARY KEY (date_id)

) ENGINE = InnoDB;