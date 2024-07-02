-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 02-Jul-2024 às 17:29
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `soga`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `Amizade`
--

CREATE TABLE `Amizade` (
  `id` int(11) NOT NULL,
  `usuario1_id` int(11) DEFAULT NULL,
  `usuario2_id` int(11) DEFAULT NULL,
  `status` enum('pendente','aceito','recusado') DEFAULT 'pendente',
  `data_criacao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `amizades`
--

CREATE TABLE `amizades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `usuario1_id` bigint(20) UNSIGNED NOT NULL,
  `usuario2_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('pendente','aceito','recusado') NOT NULL DEFAULT 'pendente',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `amizades`
--

INSERT INTO `amizades` (`id`, `usuario1_id`, `usuario2_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 4, 'aceito', NULL, NULL),
(2, 4, 5, 'aceito', NULL, NULL),
(3, 5, 4, 'aceito', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Clube`
--

CREATE TABLE `Clube` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` text DEFAULT NULL,
  `criador_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Comentario`
--

CREATE TABLE `Comentario` (
  `id` int(11) NOT NULL,
  `posts_id` int(11) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `texto` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `Comentario`
--

INSERT INTO `Comentario` (`id`, `posts_id`, `usuario_id`, `texto`, `created_at`, `updated_at`) VALUES
(12, 8, 4, 'dgdgdg', '2024-06-30 19:27:44', '2024-06-30 19:27:44'),
(13, 7, 4, 'kmklkmlklklmkkklkmkl', '2024-06-30 19:28:16', '2024-06-30 19:28:16'),
(14, 6, 4, 'vamos lá 🔥', '2024-06-30 19:59:27', '2024-06-30 19:59:27'),
(15, 7, 4, 'menina de rosa 🙌🏾🙌🏾', '2024-06-30 20:00:05', '2024-06-30 20:00:05'),
(16, 6, 4, 'dfdf', '2024-06-30 23:03:14', '2024-06-30 23:03:14'),
(17, 7, 5, 'Outubro Rosa ❤️', '2024-07-01 00:50:47', '2024-07-01 00:50:47');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Conteudo`
--

CREATE TABLE `Conteudo` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `tipo` enum('texto','imagem','video','link') NOT NULL,
  `texto` text DEFAULT NULL,
  `url_conteudo` varchar(255) DEFAULT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Curtida`
--

CREATE TABLE `Curtida` (
  `id` int(11) NOT NULL,
  `conteudo_id` int(11) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Evento`
--

CREATE TABLE `Evento` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` text DEFAULT NULL,
  `data_evento` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `criador_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `MembroClube`
--

CREATE TABLE `MembroClube` (
  `id` int(11) NOT NULL,
  `clube_id` int(11) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `data_entrada` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `MensagemPrivada`
--

CREATE TABLE `MensagemPrivada` (
  `id` int(11) NOT NULL,
  `remetente_id` int(11) DEFAULT NULL,
  `destinatario_id` int(11) DEFAULT NULL,
  `texto` text NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_06_18_230139_create_amizades_table', 2),
(5, '2024_06_25_140134_create_posts_table', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Notificacao`
--

CREATE TABLE `Notificacao` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `tipo` enum('amizade','curtida','comentario','mensagem_privada') NOT NULL,
  `texto` text DEFAULT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ParticipanteEvento`
--

CREATE TABLE `ParticipanteEvento` (
  `id` int(11) NOT NULL,
  `evento_id` int(11) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `data_participacao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `usuario_id` bigint(20) UNSIGNED NOT NULL,
  `texto` text DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `posts`
--

INSERT INTO `posts` (`id`, `usuario_id`, `texto`, `imagem`, `created_at`, `updated_at`) VALUES
(5, 4, 'dsfsdnfsdnflsdf', 'imagens/ucVDjoTlARe35DYUB7rjqjw2rxcUs3lFFtMYoJVh.jpg', '2024-06-25 13:37:49', '2024-06-25 13:37:49'),
(6, 5, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquid consequatur repudiandae maiores modi, dolorum eius excepturi illo eos tenetur veniam, esse voluptatum beatae? Possimus expedita beatae, sed cupiditate praesentium temLorem ipsum, dolor sit amet consectetur adipisicing elit. Earum explicabo, numquam debitis ex pariatur molestiae velit! Nostrum accusamus tenetur esse doloremque omnis sequi, incidunt dolor in? Praesentium illum accusantium voluptatum.', NULL, '2024-06-25 20:58:05', '2024-06-25 20:58:05'),
(7, 5, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquid consequatur repudiandae maiores modi, dolorum eius excepturi illo eos tenetur veniam, esse voluptatum beatae? Possimus expedita beatae, sed cupiditate praesentium temporeorem ipsum, dolor sit amet consectetur adipisicing elit. Earum explicabo, numquam debitis ex pariatur molestiae velit! Nostrum accusamus tenetur esse doloremque omnis sequi, incidunt dolor in? Praesentium illum accusantium voluptatum.', 'imagens/GyNiFqihyOI42mvUi0ivgdi6RWinU47rKPd8nuRZ.jpg', '2024-06-25 21:00:14', '2024-06-25 21:00:14'),
(8, 5, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquid consequatur repudiandae maiores modi, dolorum eius excepturi illo eos tenetur veniam, esse voluptatum beatae? Possimus expedita beatae, sed cupiditate praesentium tempore.rem ipsum, dolor sit amet consectetur adipisicing elit. Earum explicabo, numquam debitis ex pariatur molestiae velit! Nostrum accusamus tenetur esse doloremque omnis sequi, incidunt dolor in? Praesentium illum accusantium voluptatum.', 'imagens/ChXSrJ8iZa2HxLx16pTgNRkXvqW9TwVqPnJbDvC4.jpg', '2024-06-25 21:08:01', '2024-06-25 21:08:01');

-- --------------------------------------------------------

--
-- Estrutura da tabela `reactions`
--

CREATE TABLE `reactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `usuario_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `reactions`
--

INSERT INTO `reactions` (`id`, `post_id`, `usuario_id`, `type`, `created_at`, `updated_at`) VALUES
(6, 5, 4, 'heart', '2024-07-01 01:56:14', '2024-07-01 01:56:14'),
(10, 8, 4, 'heart', '2024-07-01 02:09:42', '2024-07-01 02:09:42'),
(12, 8, 5, 'like', '2024-07-01 02:10:17', '2024-07-01 02:10:17'),
(13, 6, 5, 'heart', '2024-07-01 02:10:22', '2024-07-01 02:10:22'),
(14, 5, 5, 'haha', '2024-07-01 02:10:25', '2024-07-01 02:10:25'),
(15, 6, 4, 'like', '2024-07-01 08:57:21', '2024-07-01 08:57:21'),
(19, 7, 4, 'haha', '2024-07-01 08:58:22', '2024-07-01 08:58:22');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('CO9jwRHmbzpiV95acM5MdfIzva9BMd71vHObWDGq', 4, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Safari/605.1.15', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRkt5em1DNFV4MjRCZHRWRUVPRmVwTWJabXZBZXVjTXlwdmlSNW1VdiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9wcm9maWxlIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NDt9', 1719934088),
('gEBtum2l4zMiPVwH3oip0SOeE3meGK3W0vULqcQd', 4, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Safari/605.1.15', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiYU5RQnJ0NHhKb0U0VHBya0lEWERvTGlHU1lFYWhNWnFueGdKU0dYViI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9pbmRleCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjQ7fQ==', 1719803382),
('IjnYtU8aTZJzqZJagBhu4qLt0VfjSFWzLy00TqXE', 5, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Safari/605.1.15', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoid09lUkt3bHJSbGpqQ2VEYng2VTVLRzJiWWlnTzMzSG82cE1CNXlIWSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9pbmRleCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjU7fQ==', 1719800910),
('LT1ermigI0lbA1d4o7An3QrjijLJqldLAvcP5r4S', 4, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Safari/605.1.15', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidWF2T2tHYnhHcEE1YlQ5ZmlOUFFoZmwyVDJrMGRRakdqdkQ4YXM4ZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9pbmRleCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjQ7fQ==', 1719827854),
('n1KzqRSeiwvJPDDoq3oKOyrjXIRjYjltwyXpqQDp', 4, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Safari/605.1.15', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiYnI4VDk3M1N5alNFa3RBRmU5dzdLaTF2RHRyejFHWTB1a1J2QlFKWCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9pbmRleCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjQ7fQ==', 1719845006),
('O3AblUhqRHyDdvUSnKmgcj5ocaigj0pOEY2zid5m', 4, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Safari/605.1.15', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiN2dKbWFmdWZqdkZReWJIZm5Td1BPZTRGRVJpM2QxZGo1bk1MMXFzcyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9pbmRleCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjQ7fQ==', 1719803184),
('OYBPRKsb4EF4YhcLW492ErkM3pU0DtU0rPkjIFVy', 5, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiYmZxUkpmRmIxUXVldnBGMkhhTWNnWmcyVTVaamxmRm9sOFlBUnRtRCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9pbmRleCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjU7fQ==', 1719803425),
('pkAX4zIm6CHVBMgd0FQjCrxpzJawAnXJZXOVCK2S', 4, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Safari/605.1.15', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoia1NPNmlFMXFjdE9ETUVVTEhVRGlEa2VHN3NLVlA0RWNQaUVlMnBRdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9pbmRleCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjQ7fQ==', 1719831933),
('yFBD66AYqQtLCFleMy4ZksZWGw4h3d1wp8nR8ykk', 4, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Safari/605.1.15', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNlRhaEJ4TkxCNHVkS2UzSlF1QTJBcDFRbTJtU09oRjQ4cXBaUE1HSiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjQ7fQ==', 1719867887);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Usuario`
--

CREATE TABLE `Usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `biografia` text DEFAULT NULL,
  `interesses` text DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(225) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` enum('offline','online') NOT NULL DEFAULT 'offline'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `Usuario`
--

INSERT INTO `Usuario` (`id`, `nome`, `foto`, `biografia`, `interesses`, `email`, `password`, `updated_at`, `created_at`, `status`) VALUES
(1, 'ssss', 'fotos/C683eaDi7KOjpMBrZlREpJg9eAxQgfQQfp859dmG.jpg', 'sddd', 'sasa', 'ss@gmail.com', '11111', '2024-06-17 02:42:43', '2024-06-17 02:42:43', 'offline'),
(2, 'Faf', 'fotos/hyHiAGXDWpAeLOFZuYuoD6ZK4Xlggro5kNsJltR9.jpg', 'dgf', 'fgdf', 'faf@gmail.com', '123', '2024-06-17 03:44:45', '2024-06-17 02:44:12', 'offline'),
(3, 'teste', 'fotos/Q61L30LUZZ7an11WcTsZz6Ag46G8JPaWRxNnj4cC.jpg', 'jnncxmb,mxncv', 'idhjisahfios', 'Tinacio@gmail.com', '123', '2024-06-17 04:00:10', '2024-06-17 02:49:16', 'offline'),
(4, 'Jose Inacio', 'fotos/fKh9Wcs9cDZxeabK2koPktv8L5OhTU8e9SR93BH3.jpg', 'wqwe', 'weqweqw', 'inacio@gmail.com', '$2y$12$rpu21/6RiFWqAVlVrNOB.OU7v5aEdadCikZaj2FbdIgit84QAijey', '2024-06-21 12:18:03', '2024-06-17 02:56:38', 'online'),
(5, 'goel', 'fotos/daq6bBDqnJ0zMtryaBibOaJCkoJ5lHqPuqrkTObY.jpg', 'goel', 'goel', 'goel@gmail.com', '$2y$12$zqK.RQ8SspGLTyKkFJB6K.NyNONJ7NTyi48OXdAudo9pwV2rcCj/q', '2024-06-21 12:21:30', '2024-06-17 03:27:10', 'online'),
(6, 'kaki Eugenio', 'fotos/ACe6F7pqPrjBnNN5udhS9xnHxnwwMgFSs3BdLIrj.jpg', 'bdsmwoewinrecvcx', 'dfnskdnown', 'kaki@gmail.com', '$2y$12$R9wJXOpB56Nmpklj7/Z9QueShRbFzOEnENI6/nWsyf.WE4rej4Ei.', '2024-06-18 01:00:33', '2024-06-18 01:00:33', 'offline');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `Amizade`
--
ALTER TABLE `Amizade`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario1_id` (`usuario1_id`),
  ADD KEY `usuario2_id` (`usuario2_id`);

--
-- Índices para tabela `amizades`
--
ALTER TABLE `amizades`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Índices para tabela `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Índices para tabela `Clube`
--
ALTER TABLE `Clube`
  ADD PRIMARY KEY (`id`),
  ADD KEY `criador_id` (`criador_id`);

--
-- Índices para tabela `Comentario`
--
ALTER TABLE `Comentario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_id` (`posts_id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Índices para tabela `Conteudo`
--
ALTER TABLE `Conteudo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Índices para tabela `Curtida`
--
ALTER TABLE `Curtida`
  ADD PRIMARY KEY (`id`),
  ADD KEY `conteudo_id` (`conteudo_id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Índices para tabela `Evento`
--
ALTER TABLE `Evento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `criador_id` (`criador_id`);

--
-- Índices para tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Índices para tabela `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Índices para tabela `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `MembroClube`
--
ALTER TABLE `MembroClube`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clube_id` (`clube_id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Índices para tabela `MensagemPrivada`
--
ALTER TABLE `MensagemPrivada`
  ADD PRIMARY KEY (`id`),
  ADD KEY `remetente_id` (`remetente_id`),
  ADD KEY `destinatario_id` (`destinatario_id`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `Notificacao`
--
ALTER TABLE `Notificacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Índices para tabela `ParticipanteEvento`
--
ALTER TABLE `ParticipanteEvento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evento_id` (`evento_id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Índices para tabela `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Índices para tabela `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `reactions`
--
ALTER TABLE `reactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reactions_post_id_foreign` (`post_id`);

--
-- Índices para tabela `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Índices para tabela `Usuario`
--
ALTER TABLE `Usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `Amizade`
--
ALTER TABLE `Amizade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `amizades`
--
ALTER TABLE `amizades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `Clube`
--
ALTER TABLE `Clube`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `Comentario`
--
ALTER TABLE `Comentario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `Conteudo`
--
ALTER TABLE `Conteudo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `Curtida`
--
ALTER TABLE `Curtida`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `Evento`
--
ALTER TABLE `Evento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `MembroClube`
--
ALTER TABLE `MembroClube`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `MensagemPrivada`
--
ALTER TABLE `MensagemPrivada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `Notificacao`
--
ALTER TABLE `Notificacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `ParticipanteEvento`
--
ALTER TABLE `ParticipanteEvento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `reactions`
--
ALTER TABLE `reactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `Usuario`
--
ALTER TABLE `Usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `Amizade`
--
ALTER TABLE `Amizade`
  ADD CONSTRAINT `amizade_ibfk_1` FOREIGN KEY (`usuario1_id`) REFERENCES `Usuario` (`id`),
  ADD CONSTRAINT `amizade_ibfk_2` FOREIGN KEY (`usuario2_id`) REFERENCES `Usuario` (`id`);

--
-- Limitadores para a tabela `Clube`
--
ALTER TABLE `Clube`
  ADD CONSTRAINT `clube_ibfk_1` FOREIGN KEY (`criador_id`) REFERENCES `Usuario` (`id`);

--
-- Limitadores para a tabela `Conteudo`
--
ALTER TABLE `Conteudo`
  ADD CONSTRAINT `conteudo_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `Usuario` (`id`);

--
-- Limitadores para a tabela `Curtida`
--
ALTER TABLE `Curtida`
  ADD CONSTRAINT `curtida_ibfk_1` FOREIGN KEY (`conteudo_id`) REFERENCES `Conteudo` (`id`),
  ADD CONSTRAINT `curtida_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `Usuario` (`id`);

--
-- Limitadores para a tabela `Evento`
--
ALTER TABLE `Evento`
  ADD CONSTRAINT `evento_ibfk_1` FOREIGN KEY (`criador_id`) REFERENCES `Usuario` (`id`);

--
-- Limitadores para a tabela `MembroClube`
--
ALTER TABLE `MembroClube`
  ADD CONSTRAINT `membroclube_ibfk_1` FOREIGN KEY (`clube_id`) REFERENCES `Clube` (`id`),
  ADD CONSTRAINT `membroclube_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `Usuario` (`id`);

--
-- Limitadores para a tabela `MensagemPrivada`
--
ALTER TABLE `MensagemPrivada`
  ADD CONSTRAINT `mensagemprivada_ibfk_1` FOREIGN KEY (`remetente_id`) REFERENCES `Usuario` (`id`),
  ADD CONSTRAINT `mensagemprivada_ibfk_2` FOREIGN KEY (`destinatario_id`) REFERENCES `Usuario` (`id`);

--
-- Limitadores para a tabela `Notificacao`
--
ALTER TABLE `Notificacao`
  ADD CONSTRAINT `notificacao_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `Usuario` (`id`);

--
-- Limitadores para a tabela `ParticipanteEvento`
--
ALTER TABLE `ParticipanteEvento`
  ADD CONSTRAINT `participanteevento_ibfk_1` FOREIGN KEY (`evento_id`) REFERENCES `Evento` (`id`),
  ADD CONSTRAINT `participanteevento_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `Usuario` (`id`);

--
-- Limitadores para a tabela `reactions`
--
ALTER TABLE `reactions`
  ADD CONSTRAINT `reactions_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
