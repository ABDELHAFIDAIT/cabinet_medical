CREATE TYPE user_status AS ENUM ('Actif', 'Suspendu');
CREATE TYPE rdv_status AS ENUM ('Confirmé', 'En Attente', 'Annulé');

CREATE TABLE roles (
    id_role SERIAL PRIMARY KEY,
    label VARCHAR(30) NOT NULL
);

CREATE TABLE users (
    id_user SERIAL PRIMARY KEY,
    nom VARCHAR(30) NOT NULL,
    prenom VARCHAR(30) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    id_role INT NOT NULL,
    status user_status DEFAULT 'Actif',
    date_inscription DATE DEFAULT CURRENT_DATE,
    FOREIGN KEY (id_role) REFERENCES roles(id_role) ON DELETE SET NULL ON UPDATE CASCADE
);


CREATE TABLE infos_medecin (
    id_medecin INT NOT NULL PRIMARY KEY,
    speciality VARCHAR(150) NOT NULL,
    experience INT NOT NULL CHECK (experience >= 0),
    FOREIGN KEY (id_medecin) REFERENCES users(id_user) ON DELETE CASCADE ON UPDATE CASCADE
);


CREATE TABLE rendez_vous (
    id_rdv SERIAL PRIMARY KEY,
    id_medecin INT NOT NULL,
    id_patient INT NOT NULL,
    date_rdv DATE NOT NULL,
    status_rdv rdv_status DEFAULT 'En Attente',
    FOREIGN KEY (id_medecin) REFERENCES users(id_user) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_patient) REFERENCES users(id_user) ON DELETE CASCADE ON UPDATE CASCADE
);