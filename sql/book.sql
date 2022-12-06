CREATE TABLE `authors` (
                           `id` int NOT NULL AUTO_INCREMENT,
                           `name` varchar(255) NOT NULL,
                           PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `books` (
                         `id` int NOT NULL AUTO_INCREMENT,
                         `title` varchar(255) NOT NULL,
                         `author_id` int NOT NULL,
                         PRIMARY KEY (`id`),
                         FOREIGN KEY (`author_id`)
                             REFERENCES `authors`(`id`)
                             ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
