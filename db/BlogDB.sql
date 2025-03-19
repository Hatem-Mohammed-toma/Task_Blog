
CREATE DATABASE BlogDB COLLATE utf8mb4_unicode_ci  ;


USE BlogDB;

CREATE TABLE users (
    id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    `password` VARCHAR(64) NOT NULL,
     role ENUM('admin', 'user') NOT NULL DEFAULT 'user',
    created_at DATETIME NOT NULL DEFAULT NOW(),
    PRIMARY KEY(id)
);


CREATE TABLE posts(
    `id` int unsigned  auto_increment PRIMARY KEY,
    `title` varchar(255) not null,
    `content` text not null,
    `created_at` datetime default now()
);
