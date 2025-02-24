CREATE DATABASE IF NOT EXISTS annonceo;

USE annonceo;

CREATE TABLE `annonce` (
    id_annonce INT(11) NOT NULL AUTO_INCREMENT,
    member_id INT(11) NOT NULL,
    photo_id INT(11) NOT NULL,
    category_id INT(11) NOT NULL,
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
    FOREIGN KEY (member_id) REFERENCES member(id_member),
    FOREIGN KEY (photo_id) REFERENCES photo(id_photo),
    FOREIGN KEY (category_id) REFERENCES category(id_category)
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `comment` (
    id_comment INT(11) NOT NULL AUTO_INCREMENT,
    member_id INT(11) NOT NULL,
    annonce_id INT(11) NOT NULL,
    commentary TEXT NOT NULL,
    record_date DATETIME NOT NULL,
    PRIMARY KEY (id_comment),
    FOREIGN KEY (member_id) REFERENCES member(id_member),
    FOREIGN KEY (annonce_id) REFERENCES annonce(id_annonce)
) ENGINE=InnoDB DEFAULT CHARSET utf8mb4;

CREATE TABLE `note` (
    id_note INT(11) NOT NULL AUTO_INCREMENT,
    member_id1 INT(11) NOT NULL,
    member_id2 INT(11) NOT NULL,
    note INT(3) NOT NULL,
    opinion TEXT NOT NULL,
    record_date DATETIME,
    PRIMARY KEY (id_note),
    FOREIGN KEY (member_id1) REFERENCES member(id_member),
    FOREIGN KEY (member_id2) REFERENCES member(id_member)
) ENGINE=InnoDB DEFAULT CHARSET utf8mb4;