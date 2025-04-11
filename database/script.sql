-- Drop existing tables
DROP TABLE IF EXISTS Uitslag;
DROP TABLE IF EXISTS Spel;
DROP TABLE IF EXISTS Reservering;
DROP TABLE IF EXISTS Persoon;
DROP TABLE IF EXISTS PakketOptie;

-- Table: Persoon
CREATE TABLE Persoon (
    Id INT PRIMARY KEY,
    TypePersoon VARCHAR(20),
    Voornaam VARCHAR(50),
    Tussenvoegsel VARCHAR(20),
    Achternaam VARCHAR(50),
    Roepnaam VARCHAR(50),
    IsVolwassen BIT
);

INSERT INTO Persoon VALUES
(1, 'Klant', 'Mazin', NULL, 'Jamil', 'Mazin', 1),
(2, 'Klant', 'Arjan', 'de', 'Ruijter', 'Arjan', 1),
(3, 'Klant', 'Hans', NULL, 'Odijk', 'Hans', 1),
(4, 'Klant', 'Dennis', 'van', 'Wakeren', 'Dennis', 1),
(5, 'Medewerker', 'Wilco', 'Van de', 'Grift', 'Wilco', 1),
(6, 'Gast', 'Tom', NULL, 'Sanders', 'Tom', 0),
(7, 'Gast', 'Andrew', NULL, 'Sanders', 'Andrew', 0),
(8, 'Gast', 'Julian', NULL, 'Kaldenheuvel', 'Julian', 1);

-- Table: PakketOptie
CREATE TABLE PakketOptie (
    Id INT PRIMARY KEY,
    Naam VARCHAR(50)
);

INSERT INTO PakketOptie VALUES
(1, 'Standaard'),
(2, 'Deluxe'),
(3, 'Familie'),
(4, 'Avond');

-- Table: Reservering
CREATE TABLE Reservering (
    Id INT PRIMARY KEY,
    PersoonId INT,
    OpeningstijdId INT,
    BaanId INT,
    PakketOptieId INT,
    ReserveringStatus VARCHAR(50),
    Reserveringsnummer VARCHAR(20),
    Datum DATE,
    AantalUren INT,
    BeginTijd TIME,
    EindTijd TIME,
    AantalVolwassen INT,
    AantalKinderen INT
);

INSERT INTO Reservering VALUES
(1, 2, 2, 8, 1, 'Bevestigd', '2022122000001', '2022-12-20', 1, '15:00', '16:00', 4, 2),
(2, 2, 2, 3, 3, 'Bevestigd', '2022122000002', '2022-12-20', 1, '17:00', '18:00', 4, NULL),
(3, 3, 7, 3, 1, 'Bevestigd', '2022122400003', '2022-12-24', 2, '16:00', '18:00', 4, NULL),
(4, 1, 2, 6, NULL, 'Bevestigd', '2022122700004', '2022-12-27', 2, '17:00', '19:00', 2, NULL),
(5, 4, 5, 4, 4, 'Bevestigd', '2022122800005', '2022-12-28', 1, '14:00', '15:00', 3, NULL),
(6, 5, 10, 5, 4, 'Bevestigd', '2022122800006', '2022-12-28', 2, '19:00', '21:00', 2, NULL);

-- Table: Spel
CREATE TABLE Spel (
    Id INT PRIMARY KEY,
    PersoonId INT,
    ReserveringId INT
);

INSERT INTO Spel VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 5),
(5, 6, 5),
(6, 7, 5),
(7, 8, 5);

-- Table: Uitslag
CREATE TABLE Uitslag (
    Id INT PRIMARY KEY,
    SpelId INT,
    Aantalpunten INT
);

INSERT INTO Uitslag VALUES
(1, 1, 290),
(2, 2, 300),
(3, 3, 120),
(4, 4, 34),
(5, 5, NULL),
(6, 6, 234),
(7, 7, 299);
