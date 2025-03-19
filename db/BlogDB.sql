
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


-- CREATE TABLE posts (
--     id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
--     user_id INTEGER UNSIGNED NOT NULL,
--      `title` varchar(255) not null,
--     `content` text not null,
--     `created_at` datetime default now()
--     PRIMARY KEY(id),
--     FOREIGN KEY(user_id) REFERENCES users(id) on update cascade on delete cascade
-- );


CREATE TABLE posts(
    `id` int unsigned  auto_increment PRIMARY KEY,
    `title` varchar(255) not null,
    `content` text not null,
    `created_at` datetime default now()
);
