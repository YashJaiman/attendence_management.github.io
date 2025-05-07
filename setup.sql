CREATE DATABASE IF NOT EXISTS attendance_system;
USE attendance_system;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
);

INSERT INTO users (username, password) VALUES
('yash', '$2y$10$y3yU/gdP6nBqcz1n5A4IhOCmBF/VZ7IOhFaVv4/N7Kys0Qiz8pEcO');

CREATE TABLE IF NOT EXISTS students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    number VARCHAR(15),
    city VARCHAR(100),
    roll_no INT,
    attendance BOOLEAN DEFAULT 0
);