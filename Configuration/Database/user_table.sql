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