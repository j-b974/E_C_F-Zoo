CREATE TABLE IF NOT EXISTS service(
    id int(50) UNSIGNED NOT NULL AUTO_INCREMENT,
    nom varchar(50) NOT NULL ,
    description varchar(50) NOT NULL ,
    primary key (id)
)ENGINE=InnoDB ;

CREATE TABLE IF NOT EXISTS avis(
    id int(50) UNSIGNED NOT NULL AUTO_INCREMENT,
    pseudo varchar(50) NOT NULL,
    commentaire varchar(50) NOT NULL,
    isVisible boolean default(false),
    primary key (id)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS role(
    id int(50) UNSIGNED NOT NULL AUTO_INCREMENT,
    label varchar(50) NOT NULL ,
    primary key (id)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS rapport_veterinaire(
    id int(50) UNSIGNED NOT NULL AUTO_INCREMENT,
    create_date date DEFAULT(CURRENT_DATE),
    delai varchar(50) not null,
    primary key (id)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS utilisateur(
    username varchar(50) NOT NULL ,
    password varchar(50) NOT NULL ,
    nom varchar(50) NOT NULL ,
    prenom varchar(50) NOT NULL ,
    role_id int(50) UNSIGNED NOT NULL ,
    rapport_veterinaire_id int(50) UNSIGNED NULL ,
    primary key (username),
    CONSTRAINT  fk_role
        FOREIGN KEY (role_id)
            REFERENCES role (id)
            ON DELETE CASCADE
            ON UPDATE RESTRICT,
    CONSTRAINT fk_rapport_veterinaire
        FOREIGN KEY (rapport_veterinaire_id)
            REFERENCES rapport_veterinaire (id)
            ON DELETE CASCADE
            ON UPDATE RESTRICT
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS race(
    id int(50) UNSIGNED NOT NULL AUTO_INCREMENT,
    label varchar(50) NOT NULL ,
    PRIMARY KEY (id)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS habitat(
    id int(50) UNSIGNED NOT NULL AUTO_INCREMENT,
    nom varchar(50) NOT NULL,
    description varchar(50) NOT NULL,
    commentaire_habitat varchar(50) NOT NULL,
    PRIMARY KEY (id)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS animal(
    id int(50) UNSIGNED NOT NULL AUTO_INCREMENT,
    prenom varchar(50) NOT NULL,
    etat varchar(50) NOT NULL,
    race_id int(50) UNSIGNED NOT NULL,
    habit_id int(50) UNSIGNED NOT NULL,
    rapport_id int(50) UNSIGNED NULL ,
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
            ON UPDATE RESTRICT,
    CONSTRAINT fk_rapport
        FOREIGN KEY (rapport_id)
            REFERENCES rapport_veterinaire (id)
            ON DELETE CASCADE
            ON UPDATE RESTRICT
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS image(
    id int(50) UNSIGNED NOT NULL AUTO_INCREMENT,
    image_data BLOB NOT NULL,
    PRIMARY KEY (id)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS habitat_image(
    habitat_id int(50) UNSIGNED NOT NULL ,
    image_id int(50) UNSIGNED NOT NULL ,
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
    animal_id int(50) UNSIGNED NOT NULL ,
    image_id int(50) UNSIGNED NOT NULL ,
    PRIMARY KEY (animal_id , image_id),
    CONSTRAINT fk_animal
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
