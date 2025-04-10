CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);
 
INSERT INTO `users` (`id`, `name`) VALUES
  (1, 'John Doe'),
  (2, 'Jane Doe'),
  (3, 'Rusty Terry'),
  (4, 'Peers Sera'),
  (5, 'Jaslyn Keely');