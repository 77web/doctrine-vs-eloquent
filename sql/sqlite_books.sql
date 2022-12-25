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
                         `created_at` datetime NOT NULL,
                         `updated_at` datetime NOT NULL,
                         FOREIGN KEY (`author_id`)
                             REFERENCES `authors`(`id`)
                             ON DELETE CASCADE
);

CREATE TABLE `reactions` (
    `id` int primary key,
    `book_id` int NOT NULL,
    `type` VARCHAR(255) NOT NULL
);

CREATE VIEW `author_stat` as select authors.id, authors.name, count(books.id) as books_count from authors left join books on books.author_id = authors.id group by authors.id, authors.name;
