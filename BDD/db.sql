-- Suppression de la base de données si elle existe
DROP DATABASE IF EXISTS projetDoriane;

-- Création de la base de données
CREATE DATABASE projetDoriane;
USE projetDoriane;

-- Suppression des tables existantes si elles existent
DROP TABLE IF EXISTS lesson;
DROP TABLE IF EXISTS module_teacher;
DROP TABLE IF EXISTS teacher;
DROP TABLE IF EXISTS module;
DROP TABLE IF EXISTS session;
DROP TABLE IF EXISTS class;
DROP TABLE IF EXISTS grade;

-- Table grade
CREATE TABLE grade (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    created_at DATETIME NOT NULL,
    created_by VARCHAR(255),
    updated_at DATETIME,
    updated_by VARCHAR(255)
) ENGINE=InnoDB;

-- Table class
CREATE TABLE class (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_grade INT NOT NULL,
    nom VARCHAR(255) NOT NULL,
    description TEXT,
    created_at DATETIME NOT NULL,
    created_by VARCHAR(255),
    updated_at DATETIME,
    updated_by VARCHAR(255),
    FOREIGN KEY (id_grade) REFERENCES grade(id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;

-- Table session
CREATE TABLE session (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    is_active BOOLEAN NOT NULL DEFAULT TRUE,
    created_at DATETIME NOT NULL,
    created_by VARCHAR(255),
    updated_at DATETIME,
    updated_by VARCHAR(255)
) ENGINE=InnoDB;

-- Table module
CREATE TABLE module (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_class INT NOT NULL,
    id_session INT NOT NULL,
    nom VARCHAR(255) NOT NULL,
    description TEXT,
    duration INT,
    color VARCHAR(7),
    is_option BOOLEAN NOT NULL DEFAULT FALSE,
    created_at DATETIME NOT NULL,
    created_by VARCHAR(255),
    updated_at DATETIME,
    updated_by VARCHAR(255),
    FOREIGN KEY (id_class) REFERENCES class(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_session) REFERENCES session(id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;

-- Table teacher
CREATE TABLE teacher (
    id INT AUTO_INCREMENT PRIMARY KEY,
    lastname VARCHAR(255) NOT NULL,
    firstname VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    description TEXT,
    created_at DATETIME NOT NULL,
    created_by VARCHAR(255),
    updated_at DATETIME,
    updated_by VARCHAR(255)
) ENGINE=InnoDB;

-- Table module-teacher (table de liaison entre teacher et module)
CREATE TABLE module_teacher (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_teacher INT NOT NULL,
    id_module INT NOT NULL,
    FOREIGN KEY (id_teacher) REFERENCES teacher(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_module) REFERENCES module(id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;

-- Table lesson
CREATE TABLE lesson (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_module INT NOT NULL,
    description TEXT,
    is_hp BOOLEAN NOT NULL DEFAULT FALSE,
    date_start DATETIME NOT NULL,
    date_end DATETIME NOT NULL,
    created_at DATETIME NOT NULL,
    created_by VARCHAR(255),
    updated_at DATETIME,
    updated_by VARCHAR(255),
    FOREIGN KEY (id_module) REFERENCES module(id)
) ENGINE=InnoDB;
