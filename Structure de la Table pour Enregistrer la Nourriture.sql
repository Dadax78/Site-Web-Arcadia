CREATE TABLE consommations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    animal_id INT NOT NULL,
    date_consommation DATE NOT NULL,
    heure_consommation TIME NOT NULL,
    type_nourriture VARCHAR(255) NOT NULL,
    quantite DECIMAL(5,2) NOT NULL,
    FOREIGN KEY (animal_id) REFERENCES animaux(id)
);
