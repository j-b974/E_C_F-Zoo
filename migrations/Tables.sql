CREATE TABLE IF NOT EXISTS service(
    id int UNSIGNED NOT NULL AUTO_INCREMENT,
    nom varchar(255) NOT NULL ,
    image varchar(255) ,
    description varchar(255) NOT NULL ,
    primary key (id)
)ENGINE=InnoDB ;

CREATE TABLE IF NOT EXISTS avis(
    id int UNSIGNED NOT NULL AUTO_INCREMENT,
    pseudo varchar(255) NOT NULL,
    commentaire varchar(255) NOT NULL,
    isVisible boolean default(false),
    primary key (id)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS role(
    id int UNSIGNED NOT NULL AUTO_INCREMENT,
    label varchar(255) NOT NULL ,
    primary key (id)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS utilisateur(
    id int UNSIGNED NOT NULL AUTO_INCREMENT,
    username varchar(255) NOT NULL UNIQUE ,
    password varchar(255) NOT NULL ,
    nom varchar(255) NOT NULL ,
    prenom varchar(255) NOT NULL ,
    role_id int UNSIGNED NOT NULL ,
    primary key (id),
    CONSTRAINT  fk_role
      FOREIGN KEY (role_id)
          REFERENCES role (id)
          ON DELETE CASCADE
          ON UPDATE RESTRICT
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS race(
    id int UNSIGNED NOT NULL AUTO_INCREMENT,
    label varchar(255) NOT NULL ,
    PRIMARY KEY (id)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS habitat(
    id int UNSIGNED NOT NULL AUTO_INCREMENT,
    nom varchar(255) NOT NULL,
    description varchar(255) NOT NULL,
    commentaire_habitat varchar(255) NOT NULL,
    image varchar(255) NULL ,
    PRIMARY KEY (id)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS animal(
     id int UNSIGNED NOT NULL AUTO_INCREMENT,
     prenom varchar(255) NOT NULL,
     etat varchar(255) NOT NULL,
     image varchar(255) NULL ,
     race_id int UNSIGNED NOT NULL,
     habit_id int UNSIGNED NOT NULL,
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
    id int UNSIGNED NOT NULL AUTO_INCREMENT,
    date date DEFAULT(CURRENT_DATE),
    nouriture varchar(255) NOT NULL,
    quantite varchar(255) NOT NULL,
    etat varchar(255) NOT NULL,
    detail_etat varchar(255) not null,
    veterinaire_id int UNSIGNED NOT NULL ,
    primary key (id),
    CONSTRAINT  fk_veterinaire
        FOREIGN KEY (veterinaire_id)
            REFERENCES utilisateur (id)
            ON DELETE CASCADE
            ON UPDATE RESTRICT
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS rapport_veterinaire_annimaux(
    id_rapport int UNSIGNED NOT NULL ,
    id_animaux int UNSIGNED NOT NULL,
    primary key (id_rapport , id_animaux),
    CONSTRAINT  fk_rapport_veterianire
        FOREIGN KEY (id_rapport)
            REFERENCES rapport_veterinaire (id)
            ON DELETE CASCADE
            ON UPDATE RESTRICT,
    CONSTRAINT  fk_rapport_animaux
        FOREIGN KEY (id_animaux)
            REFERENCES animal (id)
            ON DELETE CASCADE
            ON UPDATE RESTRICT
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS rapport_employe(
    id int UNSIGNED NOT NULL AUTO_INCREMENT,
    nouriture VARCHAR(255) NOT NULL,
    quantite VARCHAR(255) NOT NULL ,
    date DATE DEFAULT(current_date),
    heure time ,
    employe_id int UNSIGNED NOT NULL ,
    PRIMARY KEY (id),
    CONSTRAINT fk_rapport_employe
        FOREIGN KEY (employe_id)
                REFERENCES utilisateur (id)
                ON DELETE CASCADE
                ON UPDATE RESTRICT
)ENGINE = InnoDB;
CREATE TABLE IF NOT EXISTS rapport_employe_animal(
    id_rapport_employe INT UNSIGNED NOT NULL ,
    id_animaux INT UNSIGNED NOT NULL ,
    PRIMARY KEY (id_rapport_employe , id_animaux),
    CONSTRAINT fk_employ_rapport
        FOREIGN KEY (id_rapport_employe)
            REFERENCES rapport_employe (id)
            ON DELETE CASCADE
            ON UPDATE RESTRICT ,
    CONSTRAINT fk_aniaux_rapport
        FOREIGN KEY (id_animaux)
            REFERENCES animal(id)
            ON DELETE CASCADE
            ON UPDATE RESTRICT
)ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS image(
    id int UNSIGNED NOT NULL AUTO_INCREMENT,
    image_data BLOB NOT NULL,
    PRIMARY KEY (id)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS habitat_image(
    habitat_id int UNSIGNED NOT NULL ,
    image_id int UNSIGNED NOT NULL ,
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
    animal_id int UNSIGNED NOT NULL ,
    image_id int UNSIGNED NOT NULL ,
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

CREATE TRIGGER unique_admin_role_trigger
    BEFORE INSERT ON utilisateur
    FOR EACH ROW
BEGIN
    DECLARE admin_count INT;

    IF NEW.role_id = (SELECT id FROM role WHERE label = 'administrateur') THEN
        SELECT COUNT(*) INTO admin_count FROM utilisateur WHERE role_id = NEW.role_id;

        IF admin_count > 0 THEN
            SIGNAL SQLSTATE '45000'
                SET MESSAGE_TEXT = 'Il ne peut y avoir qu\'un seul utilisateur avec le rôle admin.';
        END IF;
    END IF;
END;

CREATE TRIGGER unique_admin_role_update_trigger
    BEFORE UPDATE ON utilisateur
    FOR EACH ROW
BEGIN
    DECLARE admin_count INT;

    IF NEW.role_id = (SELECT id FROM role WHERE label = 'administrateur') THEN
        SELECT COUNT(*) INTO admin_count FROM utilisateur WHERE role_id = NEW.role_id;

        IF admin_count > 0 THEN
            IF (SELECT role_id FROM utilisateur WHERE username = NEW.username) != (SELECT id FROM role WHERE label = 'administrateur') THEN
                SIGNAL SQLSTATE '45000'
                    SET MESSAGE_TEXT = 'Le rôle admin ne peut être modifié que pour l\'utilisateur existant avec ce rôle.';
            END IF;
        END IF;

    END IF;
END;
