-- Création de la base de données
CREATE DATABASE animaux_db;
USE animaux_db;

-- Table utilisateur
CREATE TABLE utilisateur (
    utilisateur_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    nom VARCHAR(50),
    prenom VARCHAR(50)
);

-- Table role
CREATE TABLE role (
    role_id INT AUTO_INCREMENT PRIMARY KEY,
    label VARCHAR(50)
);

-- Relation possede (utilisateur <-> role)
CREATE TABLE possede (
    utilisateur_id INT,
    role_id INT,
    PRIMARY KEY (utilisateur_id, role_id),
    FOREIGN KEY (utilisateur_id) REFERENCES utilisateur(utilisateur_id),
    FOREIGN KEY (role_id) REFERENCES role(role_id)
);

-- Table animal
CREATE TABLE animal (
    animal_id INT AUTO_INCREMENT PRIMARY KEY,
    prenom VARCHAR(50),
    etat VARCHAR(50)
);

-- Table habitat
CREATE TABLE habitat (
    habitat_id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50),
    description VARCHAR(50),
    commentaire_habitat VARCHAR(50)
);

-- Relation detient (animal <-> habitat)
CREATE TABLE detient (
    animal_id INT,
    habitat_id INT,
    PRIMARY KEY (animal_id, habitat_id),
    FOREIGN KEY (animal_id) REFERENCES animal(animal_id),
    FOREIGN KEY (habitat_id) REFERENCES habitat(habitat_id)
);

-- Table race
CREATE TABLE race (
    race_id INT AUTO_INCREMENT PRIMARY KEY,
    label VARCHAR(50)
);

-- Relation dispose (animal <-> race)
CREATE TABLE dispose (
    animal_id INT,
    race_id INT,
    PRIMARY KEY (animal_id, race_id),
    FOREIGN KEY (animal_id) REFERENCES animal(animal_id),
    FOREIGN KEY (race_id) REFERENCES race(race_id)
);

-- Table rapport_veterinaire
CREATE TABLE rapport_veterinaire (
    rapport_veterinaire_id INT AUTO_INCREMENT PRIMARY KEY,
    animal_id INT,
    date DATE,
    detail VARCHAR(50),
    FOREIGN KEY (animal_id) REFERENCES animal(animal_id)
);

-- Table service
CREATE TABLE service (
    service_id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50),
    description VARCHAR(50)
);

-- Table image
CREATE TABLE image (
    image_id INT AUTO_INCREMENT PRIMARY KEY,
    image_data BLOB
);

-- Table avis
CREATE TABLE avis (
    avis_id INT AUTO_INCREMENT PRIMARY KEY,
    pseudo VARCHAR(50),
    commentaire VARCHAR(50),
    isVisible BOOLEAN
);
