--
-- Table structure for table users
--

CREATE TABLE users
(
    `id`            int(11)      NOT NULL,
    `name`          varchar(50)  NOT NULL,
    `email`         varchar(255) NOT NULL,
    `password_hash` varchar(255) NOT NULL,
    `created_at` timestamp    NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table users
--
ALTER TABLE users
    ADD PRIMARY KEY (`id`),
    ADD KEY created_at (`created_at`),
    ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table users
--
ALTER TABLE users
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Additional columns for password reset
--

ALTER TABLE `users`
    ADD `password_reset_hash` VARCHAR(64) NULL DEFAULT NULL AFTER `password_hash`,
    ADD `password_reset_expires_at` DATETIME NULL DEFAULT NULL AFTER `password_reset_hash`,
    ADD UNIQUE (`password_reset_hash`);

--
-- Additional columns for account activation
--

ALTER TABLE `users`
    ADD `activation_hash` VARCHAR(64) NULL DEFAULT NULL AFTER `password_reset_expires_at`,
    ADD `is_active` BOOLEAN NOT NULL DEFAULT FALSE AFTER `activation_hash`,
    ADD UNIQUE (`activation_hash`);

--
-- Truncate user table
--
TRUNCATE TABLE `users`;