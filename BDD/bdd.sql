
CREATE TABLE school_years (
                              id INT AUTO_INCREMENT PRIMARY KEY,
                              name VARCHAR(255) NOT NULL,
                              start_date DATE NOT NULL,
                              end_date DATE NOT NULL
);

CREATE TABLE classes (
                         id INT AUTO_INCREMENT PRIMARY KEY,
                         name VARCHAR(255) NOT NULL,
                         school_year_id INT,
                         FOREIGN KEY (school_year_id) REFERENCES school_years(id)
);

CREATE TABLE modules (
                         id INT AUTO_INCREMENT PRIMARY KEY,
                         name VARCHAR(255) NOT NULL,
                         description TEXT,
                         class_id INT,
                         FOREIGN KEY (class_id) REFERENCES classes(id)
);

CREATE TABLE trainers (
                          id INT AUTO_INCREMENT PRIMARY KEY,
                          name VARCHAR(255) NOT NULL,
                          email VARCHAR(255),
                          phone VARCHAR(20)
);

CREATE TABLE events (
                        id INT AUTO_INCREMENT PRIMARY KEY,
                        title VARCHAR(255) NOT NULL,
                        start_date DATETIME NOT NULL,
                        end_date DATETIME,
                        module_id INT,
                        trainer_id INT,
                        class_id INT,
                        description TEXT,
                        FOREIGN KEY (module_id) REFERENCES modules(id),
                        FOREIGN KEY (trainer_id) REFERENCES trainers(id),
                        FOREIGN KEY (class_id) REFERENCES classes(id)
);

CREATE TABLE users (
                       id INT AUTO_INCREMENT PRIMARY KEY,
                       username VARCHAR(255) NOT NULL UNIQUE,
                       password VARCHAR(255) NOT NULL,
                       email VARCHAR(255),
                       role ENUM('admin', 'formateur', 'etudiant') NOT NULL
);
