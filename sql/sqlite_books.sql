CREATE TABLE `authors` (
                           `id` serial NOT NULL,
                           `name` varchar(255) NOT NULL
);

CREATE TABLE `books` (
                         `id` serial NOT NULL,
                         `title` varchar(255) NOT NULL,
                         `author_id` int NOT NULL,
                         `price` int NOT NULL,
                         FOREIGN KEY (`author_id`)
                             REFERENCES `authors`(`id`)
                             ON DELETE CASCADE
);
