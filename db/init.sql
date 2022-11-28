CREATE DATABASE IF NOT EXISTS appDB;
CREATE USER IF NOT EXISTS 'user' @'%' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON appDB.* TO 'user' @'%';
FLUSH PRIVILEGES;
USE appDB;
-- Fix Russian language
SET NAMES utf8mb4;
-- Tables
CREATE TABLE IF NOT EXISTS users (
    ID INT(11) NOT NULL AUTO_INCREMENT,
    name CHAR(20) NOT NULL UNIQUE,
    password CHAR(40) NOT NULL,
    PRIMARY KEY (ID)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
CREATE TABLE IF NOT EXISTS toys (
    ID INT(10) NOT NULL AUTO_INCREMENT,
    title VARCHAR(32) NOT NULL UNIQUE,
    cost INT(6) NOT NULL,
    PRIMARY KEY (ID)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
-- Admin (MD5)
-- https://www.web2generators.com/apache-tools/htpasswd-generator
INSERT INTO users (name, password)
VALUES
    (
        'login',
        'aaa' -- password
    ),
    (
        'login2',
        'bbb' -- password
    );
-- Toys
INSERT INTO toys (title, cost)
VALUES ('Дрель', 100),
    ('Гвозди',  200),
    ('Молоток', 300),
    ('Доски', 400);