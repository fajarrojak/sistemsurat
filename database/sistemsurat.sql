-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2022 at 09:41 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistemsurat`
--

-- --------------------------------------------------------

--
-- Table structure for table `disposisi`
--

CREATE TABLE `disposisi` (
  `id` int(11) NOT NULL,
  `id_surat` int(11) NOT NULL,
  `catatan_disposisi` text NOT NULL,
  `penerima_disposisi` int(11) NOT NULL,
  `tanggal_disposisi` date NOT NULL,
  `pembuat_disposisi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'kapus', 'Kepala pusat'),
(2, 'koordinator', 'koordinator'),
(6, 'subkoordinator', 'subkoordinator');

-- --------------------------------------------------------

--
-- Table structure for table `groups_menu`
--

CREATE TABLE `groups_menu` (
  `id_groups` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups_menu`
--

INSERT INTO `groups_menu` (`id_groups`, `id_menu`) VALUES
(1, 8),
(1, 89),
(1, 42),
(1, 43),
(1, 1),
(3, 1),
(5, 1),
(1, 40),
(1, 95),
(5, 95),
(1, 96),
(5, 96),
(1, 100),
(5, 100),
(1, 101),
(5, 101),
(1, 102),
(5, 102),
(1, 104),
(5, 104),
(1, 105),
(5, 105),
(1, 106),
(5, 106),
(1, 107),
(5, 107),
(1, 4),
(2, 4),
(3, 4),
(5, 4),
(1, 3),
(2, 3),
(3, 3),
(1, 92),
(2, 92),
(1, 44),
(0, 110),
(1, 114),
(1, 111),
(2, 111),
(6, 111),
(1, 112),
(1, 113),
(2, 113),
(6, 113);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT 99,
  `level` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `icon` varchar(125) NOT NULL,
  `label` varchar(25) NOT NULL,
  `link` varchar(125) NOT NULL,
  `id` varchar(25) NOT NULL DEFAULT '#',
  `id_menu_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `sort`, `level`, `parent_id`, `icon`, `label`, `link`, `id`, `id_menu_type`) VALUES
(1, 0, 1, 0, 'empty', 'MAIN NAVIGATION', '#', '#', 1),
(3, 1, 2, 1, 'fas fa-tachometer-alt', 'Dashboard', 'dashboard', '#', 1),
(4, 13, 2, 40, 'fas fa-table', 'CRUD Generator', 'crudbuilder', '1', 1),
(8, 12, 2, 40, 'fas fa-bars', 'Menu', 'cms/menu/side-menu', 'navMenu', 1),
(40, 11, 1, 0, 'empty', 'DEV', '#', '#', 1),
(42, 8, 2, 92, 'fas fa-users-cog', 'User', '#', '1', 1),
(43, 9, 3, 42, 'fas fa-angle-double-right', 'Users', 'users', '1', 1),
(44, 10, 3, 42, 'fas fa-angle-double-right', 'Hak akses', 'groups', '2', 1),
(89, 15, 2, 110, 'fas fa-th-list', 'Menu Type', 'menu_type', 'menu_type', 1),
(92, 6, 1, 0, 'empty', 'MASTER DATA', '#', 'masterdata', 1),
(107, 16, 2, 110, 'fas fa-cog', 'Setting', 'setting', 'setting', 1),
(110, 14, 1, 0, 'fab fa-500px', 'Hidden', '#', '#', 1),
(111, 2, 2, 1, 'fas fa-envelope', 'Kelola Surat Masuk', 'Surat_masuk', '#', 1),
(112, 3, 2, 1, 'far fa-envelope-open', 'Kelola Surat Keluar', 'Surat_keluar', '#', 1),
(113, 4, 2, 1, 'fas fa-envelope-square', 'Disposisi', 'Disposisi', '#', 1),
(114, 5, 2, 1, 'fab fa-envira', 'View Laporan', '#', '#', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu_type`
--

CREATE TABLE `menu_type` (
  `id_menu_type` int(11) NOT NULL,
  `type` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu_type`
--

INSERT INTO `menu_type` (`id_menu_type`, `type`) VALUES
(1, 'Side menu');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nilai` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `kode`, `nama`, `nilai`) VALUES
(1, 'lg.png', 'Sistem Surat', 'www');

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE `surat` (
  `id_surat` int(11) NOT NULL,
  `isi_surat` text NOT NULL,
  `file_surat` varchar(100) NOT NULL,
  `jenis_surat` int(11) NOT NULL COMMENT '1 = surat masuk\r\n2 = surat keluar',
  `no_surat` varchar(100) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `tanggal_dikirim` date NOT NULL,
  `tanggal_terima` date NOT NULL,
  `jumlah_lampiran` int(11) NOT NULL,
  `pengirim` varchar(100) NOT NULL,
  `penerima` varchar(100) NOT NULL,
  `perihal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surat`
--

INSERT INTO `surat` (`id_surat`, `isi_surat`, `file_surat`, `jenis_surat`, `no_surat`, `tanggal_surat`, `tanggal_dikirim`, `tanggal_terima`, `jumlah_lampiran`, `pengirim`, `penerima`, `perihal`) VALUES
(2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita, ullam fuga! Provident dolorum quisquam placeat expedita distinctio reprehenderit pariatur minima architecto? Libero consequatur fuga nostrum magnam praesentium facilis quam harum.\r\nVel doloremque, consequuntur ipsam labore corporis deserunt hic delectus molestias velit eveniet nobis, error laboriosam voluptatibus officiis inventore maiores corrupti perferendis earum ex veniam aspernatur cum, saepe aut quisquam! Qui.\r\nTemporibus quibusdam eligendi voluptatibus officia exercitationem tempore asperiores esse consectetur, soluta obcaecati nulla ex quam ratione eveniet laudantium totam dignissimos a natus ut corporis vel quos error. Aliquam, sapiente enim!\r\nAperiam quisquam, ut inventore accusantium totam officiis maxime blanditiis impedit voluptates repudiandae doloremque fugiat corporis nostrum atque et rem at adipisci esse animi itaque est aspernatur porro iste odio? Quibusdam?\r\nEos recusandae ex asperiores ratione molestiae illum reiciendis architecto aliquam perspiciatis aut facilis, sapiente cupiditate accusamus, libero cum natus sunt dolorem autem. Ab maiores, quasi omnis maxime mollitia doloremque. Deleniti?\r\nAb harum cum qui aut consequatur commodi, aliquid accusantium, quidem minima libero ullam a dignissimos iusto debitis enim expedita saepe quaerat perspiciatis voluptas natus beatae esse ut dolor! Illo, neque?\r\nQuidem quo eum, nostrum veniam doloribus sed ut! Nostrum ut vitae, eveniet qui asperiores accusantium quaerat provident fuga eligendi eius natus voluptas aliquid repellat, rem odit cum. At, veritatis id.\r\nPerferendis dicta neque sequi nobis aliquam modi, maiores culpa aut rerum a non? Nihil, consequatur quod odit mollitia iure optio maxime sequi rem voluptate, asperiores provident exercitationem quibusdam, esse eos.\r\nOmnis dolores in doloribus iste cumque iure quas odit non, optio fuga enim quae labore quos sit molestiae officia animi illum! Nulla quisquam consequatur minus adipisci autem dolorem harum non!\r\nVelit totam, iusto repudiandae molestias perferendis deleniti amet soluta atque numquam dolorem ea ullam doloribus magni consequuntur nam ab illo. Veritatis natus, nemo sapiente dolorem dolor quia fugiat culpa eius.', 'surat.pdf', 2, '958690688678s', '2022-07-15', '2022-07-19', '0000-00-00', 1, 'ppsdm hrhr', 'pt git', 'Wisuda'),
(3, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita, ullam fuga! Provident dolorum quisquam placeat expedita distinctio reprehenderit pariatur minima architecto? Libero consequatur fuga nostrum magnam praesentium facilis quam harum.\r\nVel doloremque, consequuntur ipsam labore corporis deserunt hic delectus molestias velit eveniet nobis, error laboriosam voluptatibus officiis inventore maiores corrupti perferendis earum ex veniam aspernatur cum, saepe aut quisquam! Qui.\r\nTemporibus quibusdam eligendi voluptatibus officia exercitationem tempore asperiores esse consectetur, soluta obcaecati nulla ex quam ratione eveniet laudantium totam dignissimos a natus ut corporis vel quos error. Aliquam, sapiente enim!\r\nAperiam quisquam, ut inventore accusantium totam officiis maxime blanditiis impedit voluptates repudiandae doloremque fugiat corporis nostrum atque et rem at adipisci esse animi itaque est aspernatur porro iste odio? Quibusdam?\r\nEos recusandae ex asperiores ratione molestiae illum reiciendis architecto aliquam perspiciatis aut facilis, sapiente cupiditate accusamus, libero cum natus sunt dolorem autem. Ab maiores, quasi omnis maxime mollitia doloremque. Deleniti?\r\nAb harum cum qui aut consequatur commodi, aliquid accusantium, quidem minima libero ullam a dignissimos iusto debitis enim expedita saepe quaerat perspiciatis voluptas natus beatae esse ut dolor! Illo, neque?\r\nQuidem quo eum, nostrum veniam doloribus sed ut! Nostrum ut vitae, eveniet qui asperiores accusantium quaerat provident fuga eligendi eius natus voluptas aliquid repellat, rem odit cum. At, veritatis id.\r\nPerferendis dicta neque sequi nobis aliquam modi, maiores culpa aut rerum a non? Nihil, consequatur quod odit mollitia iure optio maxime sequi rem voluptate, asperiores provident exercitationem quibusdam, esse eos.\r\nOmnis dolores in doloribus iste cumque iure quas odit non, optio fuga enim quae labore quos sit molestiae officia animi illum! Nulla quisquam consequatur minus adipisci autem dolorem harum non!\r\nVelit totam, iusto repudiandae molestias perferendis deleniti amet soluta atque numquam dolorem ea ullam doloribus magni consequuntur nam ab illo. Veritatis natus, nemo sapiente dolorem dolor quia fugiat culpa eius.', 'surat8.pdf', 1, '958690688678sssxxxx', '2022-07-28', '0000-00-00', '2022-07-27', 1, 'ppsdm hrhr', 'pt git', 'Wisuda'),
(4, 'hahahahahahahahahahahha', 'surat1.pdf', 2, 'ut58ungug5y', '2022-07-14', '2022-07-16', '0000-00-00', 1, 'ppsdm hr', 'bnn', 'tes');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `image` varchar(128) NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `password`, `email`, `active`, `first_name`, `last_name`, `phone`, `image`) VALUES
(12, '$2y$08$gIcKdOUAjrcamqQDATEIduem.6hJXOSAy.YOcnozQMwvfJtU0LuQG', 'admin1@gmail.com', 1, 'admin', '1', '+6285158339041', 'default.jpg'),
(13, '$2y$08$svPbFR4WLW85xta8FLion.t21zEsBfl4d34grG7K8kkBULxgXcZXq', 'fajarsomantri124@gmail.com', 1, 'fajar', 'somantri', '085158339041', 'default.jpg'),
(14, '$2y$08$RQ0NZ3jYK4QIzCNfyI/cAuVUxqpoOuVaj5Y.F9ttMeFAwDB4ZpCTe', 'rojaksomantri12@gmail.com', 1, 'rojak', 'soman', '08951267543', 'default.jpg'),
(15, '$2y$08$Unq.bwfwfF1fdkZMicNfuOdfBGJwFYJD0Z0kE3/Cew1QzsV0AQxvS', 'januarsomantri123@gmail.com', 1, 'januar', 'somantri', '08523423675', 'default.jpg'),
(16, '$2y$08$GG9cB4qJ82hm1vMt/Jq8G.tWqGh2aFfkf11gXJ8y44HJZYpZL/RN2', 'febrisomantri123@gmail.com', 1, 'febri', 'somantri', '08946467464', 'default.jpg'),
(17, '$2y$08$9ywd2wU.Ceu/MAhiwd5spesE3moJHq1LuOR1sKj05jaP4bJgNTrWu', 'akusiapa12@gmail.com', 1, 'aku', 'siapa', '089656478847', 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(36, 12, 1),
(37, 13, 2),
(39, 14, 6),
(40, 15, 2),
(41, 16, 6),
(42, 17, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disposisi`
--
ALTER TABLE `disposisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `menu_type`
--
ALTER TABLE `menu_type`
  ADD PRIMARY KEY (`id_menu_type`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `disposisi`
--
ALTER TABLE `disposisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `menu_type`
--
ALTER TABLE `menu_type`
  MODIFY `id_menu_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `surat`
--
ALTER TABLE `surat`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
