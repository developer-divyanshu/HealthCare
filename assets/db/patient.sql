CREATE TABLE patient (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(255) not null,
    last_name VARCHAR(255) not null,
    password VARCHAR(1000) not null,
    email VARCHAR(255) not null
);