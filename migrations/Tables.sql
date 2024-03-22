CREATE TABLE IF NOT EXISTS service(
    id int(255) UNSIGNED NOT NULL AUTO_INCREMENT,
    nom varchar(255) NOT NULL ,
    description varchar(255) NOT NULL ,
    primary key (id)
)ENGINE=InnoDB ;

CREATE TABLE IF NOT EXISTS avis(
    id int(255) UNSIGNED NOT NULL AUTO_INCREMENT,
    pseudo varchar(255) NOT NULL,
    commentaire varchar(255) NOT NULL,
    isVisible boolean default(false),
    primary key (id)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS role(
    id int(255) UNSIGNED NOT NULL AUTO_INCREMENT,
    label varchar(255) NOT NULL ,
    primary key (id)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS utilisateur(
    username varchar(255) NOT NULL ,
    password varchar(255) NOT NULL ,
    nom varchar(255) NOT NULL ,
    prenom varchar(255) NOT NULL ,
    role_id int(255) UNSIGNED NOT NULL ,
    primary key (username),
    CONSTRAINT  fk_role
      FOREIGN KEY (role_id)
          REFERENCES role (id)
          ON DELETE CASCADE
          ON UPDATE RESTRICT
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS race(
    id int(255) UNSIGNED NOT NULL AUTO_INCREMENT,
    label varchar(255) NOT NULL ,
    PRIMARY KEY (id)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS habitat(
    id int(255) UNSIGNED NOT NULL AUTO_INCREMENT,
    nom varchar(255) NOT NULL,
    description varchar(255) NOT NULL,
    commentaire_habitat varchar(255) NOT NULL,
    PRIMARY KEY (id)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS animal(
     id int(255) UNSIGNED NOT NULL AUTO_INCREMENT,
     prenom varchar(255) NOT NULL,
     etat varchar(255) NOT NULL,
     race_id int(255) UNSIGNED NOT NULL,
     habit_id int(255) UNSIGNED NOT NULL,
     rapport_id int(255) UNSIGNED NULL ,
     PRIMARY KEY (id),
     CONSTRAINT fk_race
         FOREIGN KEY (race_id)
             REFERENCES race (id)
             ON DELETE CASCADE
             ON UPDATE RESTRICT,
     CONSTRAINT fk_habit
         FOREIGN KEY (habit_id)
             REFERENCES habitat (id)
             ON DELETE CASCADE
             ON UPDATE RESTRICT
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS rapport_veterinaire(
    id int(255) UNSIGNED NOT NULL AUTO_INCREMENT,
    create_date date DEFAULT(CURRENT_DATE),
    detail varchar(255) not null,
    veterinaire varchar(255) NOT NULL ,
    aniaml_id int(255) UNSIGNED NOT NULL ,
    primary key (id),
    CONSTRAINT  fk_veterinaire
        FOREIGN KEY (veterinaire)
            REFERENCES utilisateur (username)
            ON DELETE CASCADE
            ON UPDATE RESTRICT,
    CONSTRAINT fk_animal
        FOREIGN KEY (aniaml_id)
            REFERENCES animal (id)
            ON DELETE CASCADE
            ON UPDATE RESTRICT
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS image(
    id int(255) UNSIGNED NOT NULL AUTO_INCREMENT,
    image_data BLOB NOT NULL,
    PRIMARY KEY (id)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS habitat_image(
    habitat_id int(255) UNSIGNED NOT NULL ,
    image_id int(255) UNSIGNED NOT NULL ,
    PRIMARY KEY (habitat_id , image_id),
    CONSTRAINT fk_habitat_id
        FOREIGN KEY (habitat_id)
            REFERENCES habitat (id)
            ON DELETE CASCADE
            ON UPDATE RESTRICT,
    CONSTRAINT fk_image_id
        FOREIGN KEY (image_id)
            REFERENCES image (id)
            ON DELETE CASCADE
            ON UPDATE RESTRICT
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS animal_image(
    animal_id int(255) UNSIGNED NOT NULL ,
    image_id int(255) UNSIGNED NOT NULL ,
    PRIMARY KEY (animal_id , image_id),
    CONSTRAINT fk_animal_id
        FOREIGN KEY (animal_id)
        REFERENCES animal (id)
        ON DELETE CASCADE
        ON UPDATE RESTRICT,
    CONSTRAINT fk_image_id_animal
        FOREIGN KEY (image_id)
            REFERENCES image (id)
            ON DELETE CASCADE
            ON UPDATE RESTRICT
)ENGINE= InnoDB;
