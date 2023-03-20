CREATE TABLE Ouvrage(
   Code_d_ouvrage INT NOT NULL AUTO_INCREMENT,
   Titre VARCHAR(50),
   Auteur VARCHAR(50),
   Image_ VARCHAR(100),
   Etat VARCHAR(50),
   Type VARCHAR(50),
   Date_d_édition DATE,
   Date_d_achat DATE,
   Status VARCHAR(50) NOT NULL DEFAULT 'Available',
   Nombre_de_pages INT,
   PRIMARY KEY(Code_d_ouvrage)
);

CREATE TABLE Adhérent(
   Nickname VARCHAR(50),
   Nom VARCHAR(50),
   Adresse VARCHAR(100),
   Email VARCHAR(100),
   Téléphone INT,
   CIN VARCHAR(50),
   Date_de_naissance DATE,
   Nombre_penalite INT  NOT NULL DEFAULT 0,
   Type_d_adhérent VARCHAR(50),
   Adhérent_type varchar(20) NOT NULL DEFAULT 'Adhérent',
   Mot_de_passe VARCHAR(100),
   Date_d_ouverture_du_compte DATE,
   PRIMARY KEY(Nickname)
);

CREATE TABLE Reservation(
   Reservation_Code INT(11) NOT NULL AUTO_INCREMENT,
   Reservation_Date datetime DEFAULT NULL,
   Date_limite  datetime DEFAULT NULL,
   Nickname VARCHAR(50) NOT NULL,
   code_d_ouvrage INT(11) NOT NULL,
   valid_admin bit(1) NOT NULL,
   PRIMARY KEY(Reservation_Code),
   FOREIGN KEY(Nickname) REFERENCES Adhérent(Nickname),
   FOREIGN KEY(Code_d_ouvrage) REFERENCES Ouvrage(Code_d_ouvrage)
);

CREATE TABLE Emprunt(
   Emprunt_Code INT(11) NOT NULL AUTO_INCREMENT,
   Date_emprunt datetime DEFAULT NULL,
   Date_de_retour datetime DEFAULT NULL,
   Reservation_Code INT(11) NOT NULL,
   Nickname VARCHAR(50) NOT NULL,
   Code_d_ouvrage INT(11) NOT NULL,
   valiid_return bit(1) NOT NULL,
   PRIMARY KEY(Emprunt_Code),
   FOREIGN KEY(Reservation_Code) REFERENCES Reservation(Reservation_Code),
   FOREIGN KEY(Nickname) REFERENCES Adhérent(Nickname),
   FOREIGN KEY(Code_d_ouvrage) REFERENCES Ouvrage(Code_d_ouvrage)
);
