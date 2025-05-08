--creo il database "club_giochi" se non esiste già
CREATE DATABASE IF NOT EXISTS club_giochi;

--seleziono il database "club_giochi" per lavorarci
USE club_giochi;

--creo la tabella "soci" se non esiste già
CREATE TABLE IF NOT EXISTS soci (
    id INT AUTO_INCREMENT PRIMARY KEY,  -- definisco un ID unico per ogni socio, che si incrementa automaticamente
    nome VARCHAR(100) NOT NULL,  -- campo per il nome del socio, non può essere vuoto
    cognome VARCHAR(100) NOT NULL,  -- campo per il cognome del socio, non può essere vuoto
    email VARCHAR(100) NOT NULL,  -- campo per l'email del socio, non può essere vuoto
    anno_quota INT NOT NULL,  -- campo per l'anno della quota associativa, non può essere vuoto
    ruolo VARCHAR(50) NOT NULL  -- campo per il ruolo del socio (Regolare, Donatore, Curatore), non può essere vuoto
);

--creo la tabella "giochi" per memorizzare i giochi, se non esiste già
CREATE TABLE IF NOT EXISTS giochi (
    id INT AUTO_INCREMENT PRIMARY KEY,  -- ID unico per ogni gioco, si incrementa automaticamente
    nome VARCHAR(100) NOT NULL,  -- nome del gioco, non può essere vuoto
    data_acquisto DATE NOT NULL,  -- data di acquisto del gioco, non può essere vuota
    donato_da INT NULL,  -- ID del socio che ha donato il gioco (può essere NULL se il gioco non è stato donato)
    FOREIGN KEY (donato_da) REFERENCES soci(id)  -- collego il campo "donato_da" alla tabella "soci" (chi ha donato il gioco)
);

--creo la tabella "incontri" per registrare gli incontri, se non esiste già
CREATE TABLE IF NOT EXISTS incontri (
    id INT AUTO_INCREMENT PRIMARY KEY,  -- ID unico per ogni incontro, si incrementa automaticamente
    data_incontro DATE NOT NULL,  -- data dell'incontro, non può essere vuota
    vincitore INT NOT NULL,  -- ID del socio che ha vinto l'incontro
    FOREIGN KEY (vincitore) REFERENCES soci(id)  -- collego il campo "vincitore" alla tabella "soci" (chi ha vinto l'incontro)
);

--creo la tabella "prestiti" per registrare i prestiti dei giochi, se non esiste già
CREATE TABLE IF NOT EXISTS prestiti (
    id INT AUTO_INCREMENT PRIMARY KEY,  -- ID unico per ogni prestito, si incrementa automaticamente
    gioco_id INT NOT NULL,  -- ID del gioco prestato, non può essere vuoto
    socio_id INT NOT NULL,  -- ID del socio che ha preso in prestito il gioco, non può essere vuoto
    data_prestito DATE NOT NULL,  -- data del prestito, non può essere vuota
    data_restituzione DATE NULL,  -- data di restituzione (può essere NULL se il gioco non è stato ancora restituito)
    FOREIGN KEY (gioco_id) REFERENCES giochi(id),  -- collego il campo "gioco_id" alla tabella "giochi" (il gioco prestato)
    FOREIGN KEY (socio_id) REFERENCES soci(id)  -- collego il campo "socio_id" alla tabella "soci" (chi ha preso in prestito il gioco)
);

--creo la tabella "restituzioni" per registrare le restituzioni dei giochi, se non esiste già
CREATE TABLE IF NOT EXISTS restituzioni (
    id INT AUTO_INCREMENT PRIMARY KEY,  -- ID unico per ogni restituzione, si incrementa automaticamente
    prestito_id INT NOT NULL,  -- ID del prestito associato, non può essere vuoto
    data_restituzione DATE NOT NULL,  -- data della restituzione, non può essere vuota
    FOREIGN KEY (prestito_id) REFERENCES prestiti(id)  -- collego il campo "prestito_id" alla tabella "prestiti" (il prestito che è stato restituito)
);
