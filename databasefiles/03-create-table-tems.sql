CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `team_name` varchar(255) NOT NULL,
  `tournament_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
   PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  CONSTRAINT FK_tournament_id FOREIGN KEY (tournament_id)
    REFERENCES tournaments(id)
)ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;