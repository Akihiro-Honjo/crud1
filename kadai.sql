-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2023-12-21 13:52:37
-- サーバのバージョン： 10.4.32-MariaDB
-- PHP のバージョン: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gs_d14_03`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `kadai`
--

CREATE TABLE `kadai` (
  `id` int(11) NOT NULL,
  `place` varchar(128) NOT NULL,
  `genre` varchar(128) NOT NULL,
  `store` varchar(128) NOT NULL,
  `score` tinyint(4) NOT NULL,
  `comment` varchar(128) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `kadai`
--

INSERT INTO `kadai` (`id`, `place`, `genre`, `store`, `score`, `comment`, `date`) VALUES
(1, '西区', 'ラーメン', '丸かつ', 5, 'おいしい', '2023-12-10 00:00:00'),
(11, '東区', '定食', '枝', 4, 'おいしい', '2023-12-07 00:00:00'),
(12, '早良区', '揚げ物', '重廣', 5, '豚汁はダブルがおすすめ', '2023-12-01 00:00:00'),
(13, '城南区', 'ラーメン', 'ラーメン幕府', 5, '裏ラーメンがおいしい', '2023-12-19 00:00:00'),
(14, '東区', 'うどん', 'きねや', 5, '', '2023-12-21 00:00:00'),
(15, '東区', '中華', '桃里', 4, '安くて美味しい', '2023-11-16 00:00:00'),
(16, '博多区', '揚げ物', '修', 4, '少し高め', '2023-12-13 00:00:00'),
(17, '東区', 'ラーメン', '濃麻呂', 3, 'まあまあ', '2023-12-18 00:00:00'),
(18, '西区', '定食', 'きんのつる', 4, '惣菜食べ放題', '2023-12-13 00:00:00'),
(20, '早良区', 'ラーメン', 'ツミキ', 4, 'うまい！', '2023-12-19 00:00:00'),
(21, '早良区', 'ラーメン', 'ふくちゃんラーメン', 4, 'おいしいけど並ぶ', '2023-12-19 00:00:00'),
(22, '博多区', 'ラーメン', '一双', 4, '並ぶ', '2023-12-22 00:00:00');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `kadai`
--
ALTER TABLE `kadai`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `kadai`
--
ALTER TABLE `kadai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
