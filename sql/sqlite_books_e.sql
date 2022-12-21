CREATE TABLE `authors` (
                           `id` int primary key,
                           `name` varchar(255) NOT NULL
);

CREATE TABLE `books` (
                         `id` int primary key,
                         `title` varchar(255) NOT NULL,
                         `description` text DEFAULT NULL,
                         `author_id` int NOT NULL,
                         `price` int NOT NULL,
                         FOREIGN KEY (`author_id`)
                             REFERENCES `authors`(`id`)
                             ON DELETE CASCADE
);

CREATE TABLE `likes` (
                             `id` int primary key,
                             `likable_id` int NOT NULL,
                             `likable_type` VARCHAR(255) NOT NULL
);
