CREATE DATABASE IF NOT EXISTS annonceo;

USE annonceo;

CREATE TABLE `annonce` (
    id_annonce INT(11) NOT NULL AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    short_description VARCHAR(255) NOT NULL,
    long_description VARCHAR(255) NOT NULL,
    price NUMERIC(8,2) NOT NULL,
    photo VARCHAR(255) NOT NULL,
    country VARCHAR(255) NOT NULL,
    city VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    zipcode INT(5) NOT NULL,
    record_date DATETIME NOT NULL,
    PRIMARY KEY (id_annonce),
    FOREIGN KEY 
    FOREIGN KEY
    FOREIGN KEY
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `member` (
    id_member INT(11) NOT NULL AUTO_INCREMENT,
    pseudo VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    lastName VARCHAR(255) NOT NULL,
    firstName VARCHAR(255) NOT NULL,
    phone INT(20) ZEROFILL,
    email VARCHAR(255) NOT NULL,
    civility ENUM("m", "f") NOT NULL,
    status ENUM("admin", "member"),
    join_date DATETIME,
    PRIMARY KEY (id_member)
) ENGIN=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `photo` (
    id_photo INT(11) NOT NULL AUTO_INCREMENT,
    photo1 VARCHAR(255) NOT NULL,
    photo2 VARCHAR(255),
    photo3 VARCHAR(255),
    photo4 VARCHAR(255),
    photo5 VARCHAR(255),
    PRIMARY KEY (id_photo)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `category` (
    id_category INT(11) NOT NULL AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    keywords TEXT NOT NULL,
    PRIMARY KEY (id_category)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

