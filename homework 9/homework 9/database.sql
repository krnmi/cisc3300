CREATE DATABASE IF NOT EXISTS cafedb;
USE cafedb;

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    category VARCHAR(255) NOT NULL,
    price INT NOT NULL
);

INSERT INTO products (name, category, price) VALUES
('espresso', 'coffee', 300),
('cappucino', 'coffe', 400),
('muffin', 'pastry', 200),

