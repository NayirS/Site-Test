-- Créer la base de données
CREATE DATABASE villes_db;
USE villes_db;

-- Cette requete vous permet de creer la table villes
CREATE TABLE villes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    departement INT NOT NULL,
    population_2010 INT NOT NULL,
    code_postal INT NOT NULL,
    densite_2010 DECIMAL(10, 2) NOT NULL,
    nom_reel VARCHAR(255) NOT NULL,
    nom_simple VARCHAR(255) NOT NULL
);

-- Ici vous allez insérez des données pour l'exercice
INSERT INTO villes (nom, departement, population_2010, code_postal, densite_2010, nom_reel, nom_simple)
VALUES 
('Paris', 75, 2200000, 75000, 21000.00, 'Paris', 'Paris'),
('Pantin', 93, 53000, 93500, 8500.00, 'Pantin', 'Pantin'),
('Pontoise', 95, 30000, 95300, 3700.00, 'Pontoise', 'Pontoise'),
('Pau', 64, 80000, 64000, 2800.00, 'Pau', 'Pau'),
('Plaisir', 78, 31000, 78370, 2500.00, 'Plaisir', 'Plaisir'),
('Aix-en-Provence', 13, 145000, 13090, 1200.00, 'Aix-en-Provence', 'Aix'),
('Bordeaux', 33, 240000, 33000, 5100.00, 'Bordeaux', 'Bordeaux'),
('Lyon', 69, 513000, 69000, 10500.00, 'Lyon', 'Lyon'),
('Lyon', 69, 513000, 69001, 10500.00, 'Lyon 1', 'Lyon'),
('Levallois-Perret', 92, 64000, 92300, 26000.00, 'Levallois-Perret', 'Levallois'),
('Neuilly-sur-Seine', 92, 61000, 92200, 15000.00, 'Neuilly-sur-Seine', 'Neuilly'),
('Saint-Denis', 93, 112000, 93200, 8300.00, 'Saint-Denis', 'Saint-Denis'),
('Marseille', 13, 850000, 13000, 3600.00, 'Marseille', 'Marseille'),
('Nice', 6, 340000, 6000, 4700.00, 'Nice', 'Nice'),
('Toulouse', 31, 470000, 31000, 4100.00, 'Toulouse', 'Toulouse'),
('Versailles', 78, 86000, 78000, 3200.00, 'Versailles', 'Versailles'),
('Cergy', 95, 58000, 95000, 4200.00, 'Cergy', 'Cergy'),
('Meaux', 77, 55000, 77100, 2300.00, 'Meaux', 'Meaux'),
('Evry', 91, 53000, 91000, 3900.00, 'Evry', 'Evry'),
('Nanterre', 92, 92000, 92000, 7200.00, 'Nanterre', 'Nanterre'),
('Sartrouville', 78, 52000, 78500, 5600.00, 'Sartrouville', 'Sartrouville'),
('Colombes', 92, 86000, 92700, 11400.00, 'Colombes', 'Colombes'),
('Creil', 60, 35000, 60100, 4600.00, 'Creil', 'Creil'),
('Poissy', 78, 38000, 78300, 4100.00, 'Poissy', 'Poissy');

-- Sélectionner les données insérées pour vérification
SELECT * FROM villes;
