CREATE DATABASE music_application;

USE music_application;


CREATE TABLE UserRegistration(
    id int NOT null AUTO_INCREMENT PRIMARY KEY,
    username varchar(255) NOT null,
    email_id varchar(255)  NOT null,
    passwords varchar (255)  NOT null,
    is_premium int  NOT null,
    is_admin int  NOT null,
    created_at timestamp,
    updated_at timestamp
);

INSERT INTO UserRegistration (username,email_id,passwords,is_premium,is_admin,created_at,updated_at)
VALUES("admin","admin@gmail.com","admin",1,1,now(),now());

INSERT INTO UserRegistration (username,email_id,passwords,is_premium,is_admin,created_at,updated_at)
VALUES("rehan","rehan@gmail.com","rehan",0,0,now(),now());

INSERT INTO UserRegistration (username,email_id,passwords,is_premium,is_admin,created_at,updated_at)
VALUES("deepak","deepak@gmail.com","admin",0,0,now(),now());


CREATE TABLE artist (
    id int NOT null AUTO_INCREMENT PRIMARY KEY,
    artist_name varchar(255)  NOT null,
    created_at timestamp,
    updated_at timestamp
);


CREATE table album(
    id int NOT null AUTO_INCREMENT PRIMARY KEY,
    album_name varchar(255)  NOT null,
    album_artist int,
    created_at timestamp,
    updated_at timestamp,
    FOREIGN KEY (album_artist) REFERENCES artist(id)
);


CREATE TABLE images (
    id int NOT null AUTO_INCREMENT PRIMARY KEY,
    image_path varchar(255),
    artist_id int null,
    album_id int null,
    FOREIGN key (artist_id) REFERENCES artist(id),
    FOREIGN key (album_id) REFERENCES album(id),
    created_at timestamp,
    updated_at timestamp

);

CREATE TABLE playlists(
    id int NOT null AUTO_INCREMENT PRIMARY KEY,
    artist_id int,
    album_id int,
    created_at timestamp,
    updated_at timestamp,
    FOREIGN key(artist_id) REFERENCES artist(id),
    FOREIGN key(album_id) REFERENCES albums(id)
);

CREATE TABLE request(
    id INT NOT null AUTO_INCREMENT PRIMARY KEY,
    user_id int,
    is_approved int,
    FOREIGN KEY(user_id) REFERENCES registration(id)
);