﻿-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 25, 2015 at 08:52 AM
-- Server version: 5.5.42-37.1-log
-- PHP Version: 5.4.23

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kronolog_kron2015`
--
USE `kronologger2015`;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `commentid` bigint(20) NOT NULL AUTO_INCREMENT,
  `msgid` bigint(20) NOT NULL,
  `contentcomment` text NOT NULL,
  `commentdate` datetime NOT NULL,
  PRIMARY KEY (`commentid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`commentid`, `msgid`, `contentcomment`, `commentdate`) VALUES
(1, 56, 'testing kasih comment pertamax', '2015-04-20 10:56:48'),
(2, 56, 'testing kasih comment kedua', '2015-04-20 10:56:57'),
(3, 46, 'bro/sis, ini passwordnya apa ya ?', '2015-04-20 10:57:16'),
(4, 42, 'wah...lagu jadul... mantap simple plan', '2015-04-20 10:57:38'),
(5, 44, 'maling kurang ajar !!!!', '2015-04-20 10:58:02'),
(6, 42, 'I am just a kid....', '2015-04-20 11:02:32'),
(7, 39, 'bisa dong', '2015-04-20 11:14:25'),
(8, 36, 'opo iki', '2015-04-20 21:59:28'),
(9, 49, 'wah berfungsi juga nih website', '2015-04-21 00:10:00'),
(10, 61, 'yakin? sumpee lo ? ah masa sih...', '2015-04-21 05:00:45'),
(11, 61, 'kantornya wilayah senayan ya. sama dong', '2015-04-21 05:17:49'),
(12, 64, 'aplikasi untuk berbagi file ke lokasi sekitar', '2015-04-21 20:48:08'),
(13, 36, 'Test Kronologer', '2015-04-21 21:00:15'),
(14, 36, 'tes', '2015-04-21 21:12:15'),
(15, 64, 'siapa pengguna first media? internetnya lemot gak?', '2015-04-22 01:36:02'),
(16, 66, 'barusan baca status di fb mas.. lngsung nyoba haha... nice inpoh! ', '2015-04-22 03:30:13'),
(17, 64, 'kadang lemot, kadang lamban', '2015-04-22 05:52:14'),
(18, 69, 'eh siapa nih.. tetangga sebelah ya', '2015-04-22 08:48:04'),
(19, 64, 'kadang lelet kadang mati', '2015-04-22 08:50:53'),
(20, 58, 'keren.. lagunya bisa langsung dicopy ke dropbox', '2015-04-22 08:55:03'),
(21, 68, 'jogja....', '2015-04-22 09:06:37'),
(22, 66, 'cerita dua jam yg lalu masih ada disni? yg mosting masih dikit ya??', '2015-04-22 10:30:26'),
(23, 64, 'tebak yg psoting ini siapa? termasuk yg komen ini siapa? :D #kode', '2015-04-22 10:30:57'),
(24, 69, 'kamu siapa? hahaha login biar eksist belum ready yah? ', '2015-04-22 10:31:36'),
(25, 69, 'aku penunggu gedung cyber', '2015-04-22 10:38:10'),
(26, 69, 'aku baru saja terdeteksi di http://setandisini.com', '2015-04-22 10:43:30'),
(27, 68, 'lagi di mm juice ring road utara ya', '2015-04-22 10:56:19'),
(28, 67, 'di sekitaran pasar johar baru ya ?', '2015-04-22 10:57:20'),
(29, 66, 'muncul postingnya berdasarkan area ya ?', '2015-04-22 17:18:07'),
(30, 72, 'ada yang lain kak ?', '2015-04-23 00:53:21'),
(31, 36, 'tes', '2015-04-23 01:57:34'),
(32, 72, 'ini aja dulu diabisin', '2015-04-23 02:03:38'),
(33, 71, 'iya betul betul', '2015-04-23 04:31:27'),
(34, 73, 'test kasih komet...', '2015-04-24 00:08:15'),
(35, 71, 'jadi ini anonimus gitu ya? hehe', '2015-04-24 19:28:39'),
(36, 83, 'ngetes komen', '2015-04-24 19:34:51'),
(37, 83, 'ngetes komen', '2015-04-24 19:38:25'),
(38, 82, 'wah ternyata bisa tuh', '2015-04-24 22:23:21'),
(39, 83, 'eh aku di bandung nih, di ciampelas walk', '2015-04-24 22:25:34'),
(40, 82, 'kalau comment nggK bisa kirim emoticon', '2015-04-25 01:43:55'),
(41, 84, 'gambanya bisa dicopy ke dropbox. mantap', '2015-04-25 01:44:36');

-- --------------------------------------------------------

--
-- Table structure for table `shout`
--

DROP TABLE IF EXISTS `shout`;
CREATE TABLE IF NOT EXISTS `shout` (
  `msgid` bigint(20) NOT NULL AUTO_INCREMENT,
  `lat_shout` double(18,10) NOT NULL,
  `lon_shout` double(18,10) NOT NULL,
  `contentmsg` text NOT NULL,
  `fileattachment` text NOT NULL,
  `thumbnail` varchar(100) NOT NULL,
  `msgdate` datetime NOT NULL,
  `passprotected` varchar(255) NOT NULL,
  PRIMARY KEY (`msgid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=87 ;

--
-- Dumping data for table `shout`
--

INSERT INTO `shout` (`msgid`, `lat_shout`, `lon_shout`, `contentmsg`, `fileattachment`, `thumbnail`, `msgdate`, `passprotected`) VALUES
(11, -6.2369953000, 106.9073468000, 'testing lagi ya', 'files/8689435087-4084407003-42670781305.jpg', 'thumbnail/th-8689435087-4084407003-42670781305.jpg', '2015-04-15 12:47:59', ''),
(10, -6.2401541000, 106.9063606000, 'ini juga bisa pake hyperlink automatis, test ya <a target=_new href="http://kumpulblogger.com">http://kumpulblogger.com</a>', '', '', '2015-04-15 12:44:39', ''),
(9, -6.2401541000, 106.9063606000, 'test upload file dll', '', '', '2015-04-15 12:43:22', ''),
(8, -6.2401541000, 106.9063606000, 'coba upload gambar penguin', 'files/8606013846-2252419992-60836137365.jpg', 'thumbnail/th-8606013846-2252419992-60836137365.jpg', '2015-04-15 12:42:11', ''),
(7, -6.2401541000, 106.9063606000, 'testing posting gambar animated gif', 'files/4702737383-6253099069-31380124856.gif', '', '2015-04-15 12:41:36', ''),
(12, -6.2369597800, 106.9073057200, 'gambar apa ini', 'files/6602462404-1899155369-51052758191.jpg', 'thumbnail/th-6602462404-1899155369-51052758191.jpg', '2015-04-15 12:51:44', ''),
(13, -6.2401541000, 106.9063606000, 'qrcode u', 'files/6782767777-5650892486-28265176574.png', 'thumbnail/th-6782767777-5650892486-28265176574.png', '2015-04-15 16:49:25', ''),
(14, -6.2401541000, 106.9063606000, 'test lagi deh ya', '', '', '2015-04-15 17:17:51', ''),
(15, -6.2369639000, 106.9074543000, 'anter anak sekolah', '', '', '2015-04-15 17:40:24', ''),
(16, -6.2488995000, 106.9291145000, 'anter anak sekolah dan bayarab', '', '', '2015-04-15 17:40:49', ''),
(18, -6.2401541000, 106.9063606000, 'testing lagi pake upload gambar qrcode', 'files/6915585934-6846789662-91060932306.png', 'thumbnail/th-6915585934-6846789662-91060932306.png', '2015-04-15 18:48:43', ''),
(19, 0.0000000000, 0.0000000000, 'Ada yang pacaran disini', '', '', '2015-04-15 19:04:27', ''),
(20, -6.2369597800, 106.9073057200, 'sedang mencoba kronologger', 'files/4768420206-200038339-52115600277.jpg', 'thumbnail/th-4768420206-200038339-52115600277.jpg', '2015-04-15 20:08:20', ''),
(21, 0.0000000000, 0.0000000000, 'AlguÃƒÂ©m aÃƒÂ­?', '', '', '2015-04-15 20:59:17', ''),
(22, -6.2373476000, 106.8986465000, 'lagi di klender stasiun kereta', '', '', '2015-04-15 21:46:07', ''),
(23, -6.2098758000, 106.8497557000, 'sudah sampai stasiun manggarai', '', '', '2015-04-15 22:01:15', ''),
(24, -6.2005693000, 106.8159118000, 'sudah sampai di karet staaiun', '', '', '2015-04-15 22:25:09', ''),
(25, -6.2214803542, 106.7910932174, 'akhirnya sampai kantor deh', '', '', '2015-04-15 22:47:34', ''),
(26, -6.2231720000, 106.8037460000, 'hahaha...nih gw kasih gambar', 'files/8680018908-6301288637-68261352274.jpg', 'thumbnail/th-8680018908-6301288637-68261352274.jpg', '2015-04-15 23:45:42', ''),
(27, -6.2231720000, 106.8037460000, 'comic tentang perbedaan jobs dan startup', 'files/4516967926-1514926460-65876446664.jpg', 'thumbnail/th-4516967926-1514926460-65876446664.jpg', '2015-04-16 00:12:50', ''),
(28, -6.2075699903, 106.7974097077, 'capenya.. stasiun palmerah', '', '', '2015-04-16 05:14:04', ''),
(29, -6.1854651000, 106.8107932000, 'sekarang di tanah abang stasiun', '', '', '2015-04-16 05:34:03', ''),
(30, -6.2130561000, 106.8991674000, 'sudah sampai klender', '', '', '2015-04-16 06:08:52', ''),
(31, -6.2401341000, 106.9063606000, 'berangkat dulu ya', '', '', '2015-04-16 17:18:59', ''),
(32, -6.2131564000, 106.8992721000, 'ngetem di jatinrgara', '', '', '2015-04-16 21:33:18', ''),
(33, -6.2098907000, 106.8502513000, 'manggarai manggarai', '', '', '2015-04-16 21:47:48', ''),
(34, -6.2025432000, 106.8093650000, 'macetnya pejompongan', '', '', '2015-04-16 22:09:52', ''),
(35, -6.2395332000, 106.7981271000, 'menuju kemang villages', '', '', '2015-04-17 03:45:58', ''),
(36, 0.0000000000, 0.0000000000, 'someone  wanna bang', '', '', '2015-04-18 00:50:52', ''),
(57, -6.2401341000, 106.9063606000, 'upload mp3 surat cintaku yang pertama dari vina panduwinata', 'files/6750108711-2718769768-57059288304.mp3', '', '2015-04-20 11:41:33', ''),
(38, -6.1950540000, 106.8219735000, 'lagi di grand indonesia', '', '', '2015-04-18 05:27:09', ''),
(39, -6.2369711000, 106.9073212000, 'mantep dah... bisa posting jualan juga ya disini', '', '', '2015-04-18 23:41:31', ''),
(40, -6.2369649000, 106.9073174000, 'test gif', 'files/6785127977-3232684103-83940804377.gif', '', '2015-04-19 00:48:43', ''),
(41, -6.2401341000, 106.9063606000, 'mencoba upload file movie mp4', 'files/4546229383-3715449665-76358301844.mp4', '', '2015-04-19 02:35:34', ''),
(42, -6.2401341000, 106.9063606000, 'test upload mp3 file, i am just a kid from simple plan', 'files/6059957887-5623631468-65469694603.mp3', '', '2015-04-19 04:44:08', ''),
(43, -6.2401341000, 106.9063606000, 'mp3 , lagunya andra and the backbone, hitamku. selamat menikmati.', 'files/9969126712-6985941063-81872171582.mp3', '', '2015-04-19 05:05:47', ''),
(44, -6.2369744000, 106.9073222000, 'nih ada maling', 'files/1854621996-6121257432-28359188978.mp4', '', '2015-04-19 05:14:22', ''),
(45, -6.2401341000, 106.9063606000, 'ini file jpg dipasangi password, hanya dibagi ke orang-orang tertenu saja', 'files/6629269318-3619086510-72875206079.jpg', 'thumbnail/th-6629269318-3619086510-72875206079.jpg', '2015-04-19 08:19:33', 'f7b1c776f72e90b28153f216c1e3b1f5'),
(46, -6.2401341000, 106.9063606000, 'ini file txt, dibagikan ke orang-orang internal saja. dipasangin password ah', 'files/459244955-9375588018-11175835319.txt', '', '2015-04-19 08:32:15', 'f7b1c776f72e90b28153f216c1e3b1f5'),
(47, -6.1856554000, 106.8836399000, 'setlist the adams', 'files/1646079203-6458589583-67629942624.jpg', 'thumbnail/th-1646079203-6458589583-67629942624.jpg', '2015-04-19 12:04:07', ''),
(48, -6.1856274000, 106.8836505000, 'Sulap', 'files/6476018457-2255274649-48581757490.mp4', '', '2015-04-19 12:10:22', ''),
(49, -6.2235730000, 106.7883531000, 'informasi pengalihan arus lalu lintas sekitar sudirman thamrin pada 19 sampai 24 april 2015. ', 'files/4321783306-9783813026-12807881413.jpg', 'thumbnail/th-4321783306-9783813026-12807881413.jpg', '2015-04-20 01:11:52', ''),
(50, -6.1820633000, 106.8302639000, 'alow\\r\\n', 'files/3180497820-2628048402-50322660059.jpg', 'thumbnail/th-3180497820-2628048402-50322660059.jpg', '2015-04-20 01:42:37', ''),
(52, -6.2235730000, 106.7883531000, 'lagu jadul dari third eye blind - semi charmed life', 'files/4142104467-155041465-66623978363.mp3', '', '2015-04-20 02:35:52', ''),
(53, -6.1856563000, 106.8836461000, 'Ada menu mpek-mpek di Tjikini', '', '', '2015-04-20 04:28:51', ''),
(54, -6.2558725000, 106.8024698000, 'good quote', 'files/9106029886-2520533572-29457844747.jpg', 'thumbnail/th-9106029886-2520533572-29457844747.jpg', '2015-04-20 04:30:44', ''),
(55, -6.2074938000, 106.7974287000, 'foto selfi. malu ah. dikasih password ya supaya orang lain nggak bisa lihat', 'files/1638770206-7262313938-14088970097.jpg', 'thumbnail/th-1638770206-7262313938-14088970097.jpg', '2015-04-20 05:17:58', '8afd09e1a46165a4acbe426a78f5f524'),
(56, -6.2401541000, 106.9063606000, 'Company Profile Perusahaan terkemuka di sekitar sini', 'files/9189547137-9679276486-16452205647.pdf', '', '2015-04-20 09:25:26', '8afd09e1a46165a4acbe426a78f5f524'),
(58, -6.1894592000, 106.8827542000, 'you got some fucking attitude.', 'files/6151301064-909462944-93673159228.mp3', '', '2015-04-20 11:48:58', ''),
(59, -6.2489272000, 106.9290460000, 'tumben jalanan kali malang jam segini kok sepi ya', '', '', '2015-04-20 17:45:40', ''),
(60, -6.2235730000, 106.7883531000, 'oke boleh aplikasinya, mantap sekali, ini jajal kirim gambar photo perempuan cantik seksi, tapi dipassword ya...', 'files/9256493114-1561218687-20446651429.jpg', 'thumbnail/th-9256493114-1561218687-20446651429.jpg', '2015-04-21 00:53:30', '8afd09e1a46165a4acbe426a78f5f524'),
(61, -6.2207895000, 106.7914975000, 'Ada mas kukuh TW disini.', '', '', '2015-04-21 04:47:48', ''),
(62, -6.2098907000, 106.8502513000, 'stasiun manggarai rame banget. penumpang menumpuk. keretanya nggak dateng dateng', '', '', '2015-04-21 06:06:49', ''),
(63, -6.2401341000, 106.9063606000, 'ini game flash, dicoba deh...lucu lho', 'files/2832238218-5988256712-82497046934.swf', '', '2015-04-21 08:39:33', ''),
(64, -6.2087634000, 106.8455990000, 'ini apaan ... cc apaan.co ', '', '', '2015-04-21 20:41:20', ''),
(65, -6.1855556000, 106.8108039000, 'mari belanja di grosirbersama.com , grosir online bermarkas di tanah abang', '', '', '2015-04-21 22:34:03', ''),
(66, -6.1965891126, 106.8161280025, 'hampir kecopetan di bus s608 pas mau turun di patal senayan. 2 orang menghalangi orang turun. 1 orang di belakang udah raba raba kantong', '', '', '2015-04-21 23:40:01', ''),
(67, -6.3046641000, 106.9361864000, 'Aman', '', '', '2015-04-22 03:58:41', ''),
(68, -7.7500435000, 110.3729068000, 'Ngoahahaha', '', '', '2015-04-22 04:24:22', ''),
(69, -6.2389531000, 106.8242571000, 'what happen aya naon .. ', '', '', '2015-04-22 08:43:31', ''),
(70, -6.2131651000, 106.8992386000, 'kalau bisa kirim file dan pesan dari sms dan mms, bakalan oke banget nih', '', '', '2015-04-22 22:20:22', ''),
(71, -6.2099143000, 106.8498481000, 'testing menggunakan kronologger. bisa dibikin banyak variasi penggunaan nih', '', '', '2015-04-22 23:02:23', ''),
(72, -6.2235730000, 106.7883531000, 'Challenging Big Brand .... ini materinya... pelajari ya', 'files/6217336319-4945466546-37967482442.pdf', '', '2015-04-23 00:34:42', ''),
(73, -6.2198832000, 106.7922145000, 'ada kecelakaan di rel kereta patal senayan jam 10 pagi hari ini. perempuan ditabrak kereta', '', '', '2015-04-23 02:04:57', ''),
(74, -6.2415856138, 106.6272926331, 'lagi di summarecon mall serpong, borong tas kresek', '', '', '2015-04-23 23:43:45', ''),
(83, -6.8943343000, 107.6070666000, 'Haloo, Bandung mana suaranya?', '', '', '2015-04-24 19:34:21', ''),
(76, -6.5147141143, 107.4585628510, 'Purwakarta..... adakah orang di sekitaran sini ?', '', '', '2015-04-23 23:46:34', ''),
(81, -6.3449215298, 106.7371129990, 'kuliah di universitas pamulang', '', '', '2015-04-23 23:51:19', ''),
(78, -7.8059868939, 110.3637599945, 'jalan-jalan ke jogjakarta, lihat keraton', '', '', '2015-04-23 23:48:14', ''),
(82, -6.2087634000, 106.8455990000, 'coba dulu, kalau di komputer gak bisa kedeteksi ya lokasinya?', '', '', '2015-04-24 19:31:04', ''),
(84, -6.2248833000, 106.8544184000, 'nyoba kirim gambar ya', 'files/446653199-8074521278-81343484390.jpg', 'thumbnail/th-446653199-8074521278-81343484390.jpg', '2015-04-25 01:43:07', ''),
(85, -6.1794388000, 106.7923308000, 'mall taman anggrek. jalan jalan malam minggu', '', '', '2015-04-25 02:52:24', ''),
(86, -6.2401341000, 106.9063606000, 'pengumuman untuk warga pondok bambu. cek file attachment ini ya', 'files/1444335906-7815624545-66083977464.jpg', 'thumbnail/th-1444335906-7815624545-66083977464.jpg', '2015-04-25 08:40:32', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
