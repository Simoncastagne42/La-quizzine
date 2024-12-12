CREATE TABLE `question`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `questionName` VARCHAR(255) NOT NULL,
    `idTheme` BIGINT NOT NULL
);
CREATE TABLE `answer`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `idQuestion` INT NOT NULL,
    `textReponse` VARCHAR(255) NOT NULL,
    `isCorrect` BOOLEAN NOT NULL
);
CREATE TABLE `user`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `pseudo` VARCHAR(255) NOT NULL,
    `score` INT NOT NULL
);
CREATE TABLE `theme`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `themeName` VARCHAR(255) NOT NULL
);
ALTER TABLE
    `question` ADD CONSTRAINT `question_idtheme_foreign` FOREIGN KEY(`idTheme`) REFERENCES `theme`(`id`);
ALTER TABLE
    `answer` ADD CONSTRAINT `answer_idquestion_foreign` FOREIGN KEY(`idQuestion`) REFERENCES `question`(`id`);