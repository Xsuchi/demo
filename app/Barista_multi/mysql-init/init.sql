CREATE DATABASE IF NOT EXISTS barista;
USE barista;

DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS reservations;

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(100) UNIQUE,
  password VARCHAR(255),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE reservations (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  phone VARCHAR(50),
  date DATE,
  time TIME,
  people INT,
  message TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ADMIN USER (password = admin123)
INSERT INTO users (username, password)
VALUES (
  'admin',
  'admin123'
);
