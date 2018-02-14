-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 09-Fev-2018 às 17:43
-- Versão do servidor: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `revisao`
--

CREATE DATABASE `revisao`;
USE `revisao`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_03_13_212654_create_veiculos_table', 2),
(4, '2017_03_13_212736_create_servicos_table', 2),
(5, '2017_03_13_212828_create_vistorias_table', 2),
(6, '2017_03_13_213114_add_emveiculos_table', 3),
(7, '2017_03_13_213328_add_emvistorias_table', 4),
(8, '2017_03_13_213404_add_emservicos_table', 4),
(9, '2017_03_13_213620_add_emusers_table', 5),
(10, '2017_03_18_190443_remover_chave_servico', 6),
(11, '2017_03_18_190933_remover_chave_vistoria', 7),
(12, '2017_03_26_013351_add_servicosID_to_vistorias_table', 8),
(13, '2017_03_26_034229_add_userID_to_vistorias_table', 9),
(14, '2017_03_26_060415_create_noticias_table', 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

DROP TABLE IF EXISTS `servicos`;
CREATE TABLE IF NOT EXISTS `servicos` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nome` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor` double(10,2) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `servicos_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`id`, `created_at`, `updated_at`, `nome`, `valor`, `user_id`) VALUES
(11, '2018-02-05 06:54:31', '2018-02-05 06:54:31', 'Revisão Básica', 250.00, 5),
(12, '2018-02-05 07:03:39', '2018-02-05 07:03:39', 'Revisão Completa', 500.00, 5),
(13, '2018-02-07 15:51:04', '2018-02-07 15:51:04', 'Troca de Óleo', 100.00, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` smallint(6) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `type`) VALUES
(7, 'Ciclano', 'ciclano@email.com', '$2y$10$AYZEAfKV03esPs7yOh.Kpemj2TTGfwgxi5q6Vl.PThhJ.6LAEhSAu', '5a7Sl7WsE8oRjiTadV31GjhY8hNlNZb72AQYjfdEbTnk63ETO1PwCHS8kf3V', '2018-02-05 07:23:44', '2018-02-05 07:23:44', 1),
(5, 'Admin', 'admin@email.com', '$2y$10$1BZ292.scluOJ3jWW0i/CuGhBaDDuQWNiqb9oTy7jdyUa4MTI/Vi2', 'igQ9IBOc730eXZKoJTxkF3hpeZoX54PCssvNOlkCUw7Wsi4OZX4hvyNYGHQw', '2018-02-05 04:59:40', '2018-02-05 04:59:40', 2),
(6, 'Fulano', 'fulano@email.com', '$2y$10$NdPzMWhKMd65Tf62UHnk8udQhU/2kX68py7bRMu7kzf/DvLyB.C2.', '1diqzVZBSgYaEZzs3FYrrfhmfFFYnqWwQxjaEf9Bf7cy1hVccTBLg0SsUZcq', '2018-02-05 05:09:48', '2018-02-05 05:09:48', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculos`
--

DROP TABLE IF EXISTS `veiculos`;
CREATE TABLE IF NOT EXISTS `veiculos` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `placa` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modelo` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cor` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `veiculos_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `veiculos`
--

INSERT INTO `veiculos` (`id`, `created_at`, `updated_at`, `placa`, `modelo`, `cor`, `user_id`) VALUES
(9, '2018-02-07 15:45:06', '2018-02-07 15:45:06', 'gxs5678', 'Punto', 'Vermelho', 6),
(10, '2018-02-07 15:48:25', '2018-02-07 15:48:25', 'htl8900', 'Onix', 'Preto', 6),
(11, '2018-02-07 15:49:18', '2018-02-07 15:49:18', 'fcv2345', 'Gol', 'Prata', 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vistorias`
--

DROP TABLE IF EXISTS `vistorias`;
CREATE TABLE IF NOT EXISTS `vistorias` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `quilometragem` double(10,2) NOT NULL,
  `veiculo_id` int(10) UNSIGNED NOT NULL,
  `servico_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `vistorias_veiculo_id_foreign` (`veiculo_id`),
  KEY `vistorias_servico_id_foreign` (`servico_id`),
  KEY `vistorias_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `vistorias`
--

INSERT INTO `vistorias` (`id`, `created_at`, `updated_at`, `data`, `hora`, `quilometragem`, `veiculo_id`, `servico_id`, `user_id`) VALUES
(17, '2018-02-07 15:50:18', '2018-02-07 15:50:18', '2018-02-16', '14:00:00', 15000.00, 9, 11, 6),
(18, '2018-02-07 15:50:44', '2018-02-07 15:50:44', '2018-02-28', '13:00:00', 78000.00, 10, 12, 6),
(19, '2018-02-07 15:51:43', '2018-02-07 15:51:43', '2018-02-16', '08:00:00', 10000.00, 9, 13, 6);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
