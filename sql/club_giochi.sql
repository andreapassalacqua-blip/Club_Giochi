CREATE DATABASE IF NOT EXISTS club_giochi;

USE club_giochi;

CREATE TABLE IF NOT EXISTS soci (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cognome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    anno_quota INT NOT NULL,
    ruolo VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS giochi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    data_acquisto DATE NOT NULL,
    donato_da INT NULL,
    FOREIGN KEY (donato_da) REFERENCES soci(id)
);

CREATE TABLE IF NOT EXISTS incontri (
    id INT AUTO_INCREMENT PRIMARY KEY,
    data_incontro DATE NOT NULL,
    vincitore INT NOT NULL,
    FOREIGN KEY (vincitore) REFERENCES soci(id)
);
