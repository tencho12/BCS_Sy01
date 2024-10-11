CREATE DATABASE csrf_demo;
USE csrf_demo;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- Insert demo user
INSERT INTO users (username, password) VALUES ('admin', 'secure_password');
