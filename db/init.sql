CREATE DATABASE IF NOT EXISTS appDB DEFAULT CHARACTER SET utf8;
CREATE USER IF NOT EXISTS 'user' @'%' IDENTIFIED BY 'password';
GRANT SELECT,
    UPDATE,
    INSERT ON appDB.* TO 'user' @'%';
FLUSH PRIVILEGES;
USE appDB;
-- Tables
CREATE TABLE IF NOT EXISTS users (
    ID INT(11) NOT NULL AUTO_INCREMENT,
    name VARCHAR(20) NOT NULL,
    password VARCHAR(40) NOT NULL,
    PRIMARY KEY (ID)
);
CREATE TABLE IF NOT EXISTS toys (
    ID INT(10) NOT NULL AUTO_INCREMENT,
    title VARCHAR(32) NOT NULL,
    cost INT(6) NOT NULL,
    PRIMARY KEY (ID)
);
CREATE TABLE IF NOT EXISTS bulgarian (
    ID INT(10) NOT NULL AUTO_INCREMENT,
    title VARCHAR(32) NOT NULL,
    cost INT(6) NOT NULL,
    PRIMARY KEY (ID)
);
CREATE TABLE IF NOT EXISTS nails (
    ID INT(10) NOT NULL AUTO_INCREMENT,
    title VARCHAR(32) NOT NULL,
    cost INT(6) NOT NULL,
    PRIMARY KEY (ID)
);
CREATE TABLE IF NOT EXISTS nails (
    ID INT(10) NOT NULL AUTO_INCREMENT,
    title VARCHAR(32) NOT NULL,
    cost INT(6) NOT NULL,
    PRIMARY KEY (ID)
);
-- Admin
INSERT INTO users (name, password)
SELECT *
FROM (
        SELECT 'admin',
            'password'
    ) AS temp
WHERE NOT EXISTS (
        SELECT name
        FROM users
        WHERE name = 'admin'
            AND password = 'password'
    )
LIMIT 1;
-- Toys
INSERT INTO toys (title, cost)
SELECT *
FROM (
        SELECT 'Manual',
            500
    ) AS temp
WHERE NOT EXISTS (
        SELECT title
        FROM toys
        WHERE title = 'Manual'
            AND cost = 500
    )
LIMIT 1;
INSERT INTO toys (title, cost)
SELECT *
FROM (
        SELECT 'Automatic',
            2000
    ) AS temp
WHERE NOT EXISTS (
        SELECT title
        FROM toys
        WHERE title = 'Automatic'
            AND cost = 2000
    )
LIMIT 1;


INSERT INTO bulgarian (title, cost)
SELECT *
FROM (
        SELECT 'household',
            500
    ) AS temp
WHERE NOT EXISTS (
        SELECT title
        FROM bulgarian
        WHERE title = 'household'
            AND cost = 2000
    )
LIMIT 1;
INSERT INTO bulgarian (title, cost)
SELECT *
FROM (
        SELECT 'professional',
            2000
    ) AS temp
WHERE NOT EXISTS (
        SELECT title
        FROM bulgarian
        WHERE title = 'professional'
            AND cost = 2000
    )
LIMIT 1;


INSERT INTO nails (title, cost)
SELECT *
FROM (
        SELECT 'iron',
            500
    ) AS temp
WHERE NOT EXISTS (
        SELECT title
        FROM nails
        WHERE title = 'iron'
            AND cost = 2000
    )
LIMIT 1;
INSERT INTO nails (title, cost)
SELECT *
FROM (
        SELECT 'copper',
            2000
    ) AS temp
WHERE NOT EXISTS (
        SELECT title
        FROM nails
        WHERE title = 'copper'
            AND cost = 2000
    )
LIMIT 1;


INSERT INTO brick (title, cost)
SELECT *
FROM (
        SELECT 'silicate',
            500
    ) AS temp
WHERE NOT EXISTS (
        SELECT title
        FROM brick
        WHERE title = 'silicate'
            AND cost = 2000
    )
LIMIT 1;
INSERT INTO brick (title, cost)
SELECT *
FROM (
        SELECT 'ceramic',
            2000
    ) AS temp
WHERE NOT EXISTS (
        SELECT title
        FROM brick
        WHERE title = 'ceramic'
            AND cost = 2000
    )
LIMIT 1;