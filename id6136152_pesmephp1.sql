-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 09, 2019 at 02:38 PM
-- Server version: 10.2.17-MariaDB
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id6136152_pesmephp1`
--

-- --------------------------------------------------------

--
-- Table structure for table `anketa`
--

CREATE TABLE `anketa` (
  `id_a` int(10) NOT NULL,
  `pitanje` varchar(400) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `aktivna` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anketa`
--

INSERT INTO `anketa` (`id_a`, `pitanje`, `aktivna`) VALUES
(1, 'Da li vam se svidja sajt?', 1),
(2, 'Da li volite pesme', 1);

-- --------------------------------------------------------

--
-- Table structure for table `anketa_korisnik`
--

CREATE TABLE `anketa_korisnik` (
  `id_anketa_korisnik` int(50) NOT NULL,
  `id_anketa` int(10) NOT NULL,
  `id_korisnik` int(10) NOT NULL,
  `id_anketa_odgovor` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anketa_korisnik`
--

INSERT INTO `anketa_korisnik` (`id_anketa_korisnik`, `id_anketa`, `id_korisnik`, `id_anketa_odgovor`) VALUES
(1, 2, 38, 5),
(2, 1, 36, 3),
(3, 2, 36, 2),
(4, 1, 77, 4),
(5, 2, 77, 2),
(9, 1, 84, 4),
(10, 2, 84, 2),
(11, 2, 107, 1),
(12, 1, 107, 1),
(13, 1, 108, 4),
(14, 2, 108, 1);

-- --------------------------------------------------------

--
-- Table structure for table `anketa_odgovor`
--

CREATE TABLE `anketa_odgovor` (
  `id_a_o` int(10) NOT NULL,
  `id_anketa` int(10) NOT NULL,
  `id_odgovor` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anketa_odgovor`
--

INSERT INTO `anketa_odgovor` (`id_a_o`, `id_anketa`, `id_odgovor`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 2, 1),
(6, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `idKomentar` int(15) NOT NULL,
  `idKorisnik` int(10) NOT NULL,
  `idPesme` int(11) NOT NULL,
  `datumPostavljanja` date NOT NULL,
  `textKomentara` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`idKomentar`, `idKorisnik`, `idPesme`, `datumPostavljanja`, `textKomentara`) VALUES
(16, 107, 15, '2018-06-20', ' Ovo je moja prva pesma,\nnadam se da ce vam se svideti :) \nUskoro ce bit jos. Ko hoce moze da predlozi neke ideje.'),
(18, 107, 10, '2018-06-20', ' Cuvena Popina pesma.. lepo.'),
(21, 108, 10, '2018-06-20', 'Nisam neki ljubitelj nase poezije, ali ovo je fino :)'),
(22, 108, 14, '2018-06-20', ' Lepa, stara'),
(23, 108, 15, '2018-06-20', ' Jako lepo,samo nastavi tako! :) '),
(31, 38, 23, '2018-07-05', 'Like this comm'),
(32, 36, 23, '2018-07-05', 'Xaxxaxaxa ČD ');

-- --------------------------------------------------------

--
-- Table structure for table `korisnicisajta`
--

CREATE TABLE `korisnicisajta` (
  `idKorisnik` int(10) NOT NULL,
  `ime` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `nadimak` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sifra` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `idStatus` int(1) NOT NULL DEFAULT 1,
  `aktivan` tinyint(1) NOT NULL DEFAULT 0,
  `pol` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `aktivacioniKod` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnicisajta`
--

INSERT INTO `korisnicisajta` (`idKorisnik`, `ime`, `prezime`, `nadimak`, `email`, `sifra`, `idStatus`, `aktivan`, `pol`, `aktivacioniKod`) VALUES
(1, 'Admin', 'Admin', 'Admin', 'admin@gmail.com', 'e714f5e09b26f37bb36f63f24789a3b5', 1, 1, 'Muški', '0'),
(2, 'Milica', 'Ivančić', 'MicikaxD', 'ivancic@gmail.com', '0a344263f77037f83fdf09c000c0e976', 1, 1, 'Ženski', '0'),
(35, 'Pera', 'Pericic', 'Pekic', 'zed.noob123@gmail.com', 'f78a4f05ef070d6a4034e4014016b209', 1, 1, 'Muški', 'a38022eebf47db1597b098afa52dd25b4f54b02f'),
(36, 'Milica', 'Ivančić', 'AdminMicika', 'milica.zajeganovic.ivancic@gmail.com', '0a344263f77037f83fdf09c000c0e976', 2, 1, 'Ženski', 'a858db34ae9a1cc78d98c428f0f3e1294e673acb'),
(38, 'Ana', 'Marija', 'AnaMarijaMar', 'mariana@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', 1, 1, 'Drugo', '25f9e794323b453885f5181f1b624d0b'),
(49, 'Marija', 'Marija', 'MakiZaj', 'mzajeganovic@gmail.com', '0a344263f77037f83fdf09c000c0e976', 1, 0, 'Ženski', 'a31748219d6e4d5ee531e2d0bab26142'),
(66, 'Danijela', 'Nikitin', 'Danijelaaae', 'pera123tester@gmail.com', 'fef213de0f55d86f2f6ee663f346bd5e', 1, 0, 'Ženski', 'e21077e07767a4e547654f5b75dda14d'),
(76, 'Bojan', 'Didovic', 'BokiDi', 'bojandidovic@gmail.com', '0a344263f77037f83fdf09c000c0e976', 1, 1, 'Muški', '6dec4645f79ef82120aa4713aea10b0a'),
(77, 'Korisnik', 'Korisnik', 'Korisnik', 'korisnik123@gmail.com', '716b64c0f6bad9ac405aab3f00958dd1', 1, 1, 'Drugo', 'e10adc3949ba59abbe56e057f20f883e'),
(84, 'Mladen', 'Petrovic', 'Mladja', 'borismitric66666@gmail.com', '0a344263f77037f83fdf09c000c0e976', 1, 1, 'Muški', 'fe1ad89b5f72c668d439ec1e1ae36930'),
(85, 'Aca', 'Aca', 'Coa', 'aca@gmail.com', 'adafff23fe27d62fa9d5220cc0b3a8ea', 1, 0, 'Muški', 'ae46f3c7917cb080532dafbf0e12b384'),
(91, 'Aleksandra', 'Conic', 'Asdffdaas', 'k320857@nwytg.com', 'fba390e8f139bedc115d6489af4fcb72', 1, 0, 'Ženski', 'd869af80c7225dd5a20e3b4db36c2ab0'),
(107, 'Aleksandra', 'Conic', 'Aleks', 'akyca96@gmail.com', 'a5d15bd5953fd12962a52a70a88e6305', 1, 1, 'Ženski', 'dfe6067526a9b5e66645b039afd77160'),
(108, 'Jasna', 'Markovic', 'Jacaa', 'aleksandra.conic12@gmail.com', 'bec8324f2a4bdc46db1751a1df76a5fd', 1, 1, 'Drugo', '0b1d81d0b34bbcbc6adef25dd2c5ab54'),
(110, 'Sql', 'Injection', 'Jebiga', 'sqlinjection@jebiga.com', '0a344263f77037f83fdf09c000c0e976', 2, 1, 'Drugo', '4d40caef740f83f081f4d581a842ff24aae8010c'),
(111, 'Milica', 'Ivancic', 'MilicaIvancic', 'milica.ivancic.144.16@ict.edu.rs', '0a344263f77037f83fdf09c000c0e976', 1, 1, 'Ženski', '9e19367a537a4e130a46e3787f8208e2'),
(112, 'Test', 'Test', 'Test', 'testnanana40@gmail.com', '16d7a4fca7442dda3ad93c9a726597e4', 1, 1, 'Muški', '655eb82fb947e7a9ee1866406cf2914a'),
(121, 'Nikola', 'Milicevic', 'Dyoniiiii', 'milicevicnikola97@gmail.com', '7fb91db9298bf2ecd600a1834ef27e00', 1, 1, 'Muški', 'b5022cfe82a06c5c4ee90ecfb9fc8d1c');

-- --------------------------------------------------------

--
-- Table structure for table `meni`
--

CREATE TABLE `meni` (
  `idMeni` int(3) NOT NULL,
  `href` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `naziv` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `meni`
--

INSERT INTO `meni` (`idMeni`, `href`, `naziv`) VALUES
(3, 'index.php?page=kontakt', 'Kontakt'),
(4, 'index.php?page=login', 'Pesme'),
(6, 'index.php?page=adminpanel', 'Admin panel'),
(7, 'index.php?page=korisnik', 'Moj nalog'),
(10, 'index.php?page=anketa', 'Anketa'),
(12, 'index.php?page=autor', 'Autor'),
(13, 'logout.php', 'Odjavi se');

-- --------------------------------------------------------

--
-- Table structure for table `odgovor`
--

CREATE TABLE `odgovor` (
  `id_odgovor` int(5) NOT NULL,
  `odgovor` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `odgovor`
--

INSERT INTO `odgovor` (`id_odgovor`, `odgovor`) VALUES
(1, 'Da'),
(2, 'Ne'),
(3, 'Nisam zadivljen'),
(4, 'Okej je');

-- --------------------------------------------------------

--
-- Table structure for table `pesme`
--

CREATE TABLE `pesme` (
  `idPesme` int(11) NOT NULL,
  `naziv` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `sadrzaj` text COLLATE utf8_unicode_ci NOT NULL,
  `idKorisnik` int(10) NOT NULL,
  `slikaPesme` varchar(500) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'slike/pesma.jpg',
  `altPesme` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'slika koja opisuje pesmu',
  `datumPostavljanja` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pesme`
--

INSERT INTO `pesme` (`idPesme`, `naziv`, `sadrzaj`, `idKorisnik`, `slikaPesme`, `altPesme`, `datumPostavljanja`) VALUES
(10, 'Gde si', 'Idem\r\nOd jedne ruke do druge\r\nGde si\r\n\r\nZagrlio bih te\r\nGrlim tvoju odsutnost\r\nPoljubio bih ti glas\r\nČujem smeh daljina\r\nUsne mi lice rastrgle\r\n\r\nIz presahlih dlanova\r\nBlistava mi se pojavi\r\nHteo bih da te vidim\r\nPa oči zaklapam\r\n\r\nIdem\r\nOd jedne slepoočnice do druge\r\nGde si', 35, 'slike/15295013334e41054b8106f3bfabbd07a1ca9c7cad3b4e1cf1.jpg', 'slika koja opisuje pesmu', '2018-06-20'),
(13, 'Molim te radi', 'Hajde radi molim te,,\r\nMoli te radi\r\nZasto bneces da radis? \r\nzasto?\r\nmolim te ! ', 107, 'slike/1529503897image.jpg', 'slika koja opisuje pesmu', '2018-06-20'),
(14, 'Tomiradi', 'Volim te, djevojcice \r\ndok se nebo zatvara \r\nneka vriste nase ulice \r\nneka krene zabava \r\n\r\nBolja buducnost nije htjela \r\nnas da saceka \r\npridji blize da vidim tajnu \r\nkoju cuvas u ocima \r\n\r\nRef. \r\nTo mi radi, to mi radi \r\njer ti mozes \r\nda mi radis sve \r\nto mi radi, to mi radi \r\njer ja zaljubio sam se \r\n\r\nIza ugla cujem muziku \r\ngeneracija je cugala \r\na ja sam nocas slican urliku \r\nmoje je ime teska panika \r\n\r\nKad me palis, onda idi \r\nlomi do kraja \r\npridji blize da vidim tajnu \r\nkoju cuvas u ocima ', 107, 'slike/1529504088hqdefault.jpg', 'slika koja opisuje pesmu', '2018-06-20'),
(15, 'San', 'I mislim da sanjam\r\ndok gledam te kako letis,\r\nkako zoves me\r\nda sa mnom taj osecaj podelis.\r\nNe zelim da se probudim\r\njer zelim da te poljubim,\r\na onda s tobom poletim.', 107, 'slike/1529504312za sajt.jpeg', 'slika koja opisuje pesmu', '2018-06-20'),
(16, 'Beograd :)', 'On ima čudesnu moć\r\nda svetlom ispuni noć\r\nbelinom osmeha svog razgoni tugu\r\nOn ljubav svakome da\r\ni vrata otvara sva\r\nk\'o stari voljeni drug uvek je on\r\n\r\nBeograde, Beograde\r\nna ušću dveju reka ispod Avale\r\nBeograde, Beograde\r\nveć vekovima čuvas beo lik\r\nBeograde, Beograde\r\nti srce svoje nesebično daruješ\r\nBeograde, Beograde\r\ntvoj zagrljaj i ljubav žele svi\r\n\r\nZa tebe k\'o da stoji vreme\r\nti živiš srcem uvek mlad\r\nBeograde, Beograde\r\nsvi vole tvoje nasmejane ulice\r\nBeograde, Beograde\r\nsa nama i u nama živiš ti', 108, 'slike/1529506293bgslika.jpeg', 'slika koja opisuje pesmu', '2018-06-20'),
(18, 'Na dan njenog venčanja ', 'I srušiše se lepi snovi moji, \r\n\r\nJer glavu tvoju venac sad pokriva,\r\nKraj tebe drugi pred oltarom stoji-\r\nProsta ti bila moja ljubav živa! \r\n\r\nČestit’o sam ti. I ti reče “Hvala!”…\r\nA da li znadeš da se u tom času\r\nGranitna zgrada mojih ideala\r\nSruši i smrvi i u pep’o rasu? \r\n\r\nAl’ ne! Ne vidim od toga ni sena;\r\nPo tvom licu radost se razliva…\r\nI svršeno je! Ti si sada žena-\r\nProsta ti bila moja ljubav živa! \r\n\r\nJa neću kleti ni njega ni tebe,\r\nNi gorku sudbu što sam tebe sreo;\r\nJa neću kleti čak ni samog sebe,\r\nJer ja bih time svoju ljubav kleo. \r\n\r\nI našto kletve! Našto ružne reči?\r\nO sreći svojoj čovek vazda sniva;\r\nBol, jad i patnju smrt jedino leči.\r\nProsta ti bila moja ljubav živa!\r\n\r\nPa pođi s Bogom! Još ti mogu reći:\r\nDa Bog da sunce sreće da ti sija!\r\nSve što god počneš svršila u sreći!\r\nSa tvoje sreće biću srećan i ja. \r\n\r\nI svakog dana ja ću da se molim\r\nKad zvono verne u crkvu poziva…\r\nJa nisam znao da te tako volim.\r\nProsta ti bila moja ljubav živa! \r\n\r\nČuj, Bože, molbu moje duše jadne:\r\nSva patnja što si pis’o njoj, k’o ženi,\r\nNek’ mimoiđe nju, i nek padne\r\nNa onaj deo što je pisan meni! \r\n\r\nUsliši ovu molitvu, o Bože!\r\nI duša će mi mirno da počiva;\r\nI šaputaće večno, dok god može:\r\nProsta ti bila moja ljubav živa! \r\n\r\nI onda kada dođe ono doba\r\nU kom će zemlja telo da mi skriva,\r\nČućeš i opet sa dna moga groba:\r\n»Prosta ti bila moja ljubav živa!', 77, 'slike/1529592629tlp771344-e1459601882893.jpg', 'slika koja opisuje pesmu', '2018-06-21'),
(20, 'Al je lep ovaj svet', 'Ala je lep\r\nOvaj svet,\r\nOnde potok,\r\nOvde cvet;\r\nTamo njiva,\r\nOvde sad,\r\nEno sunce,\r\nEvo hlad!\r\nTamo dunav,\r\nZlata pun,\r\nOnde trava,\r\nOvde zbun,\r\nSlavuj pesmom\r\nLjulja lug.\r\nJa ga slusam\r\nI moj drug.', 38, 'slike/15302934311376_jovan_jovanovic_zmaj.jpg', 'slika koja opisuje pesmu', '2018-06-29'),
(21, 'Ruza', ' Probudila me tuga na sabah\r\nUmjesto tvoje ruke\r\nI kao da sam ronio na dah\r\nDivljim vodama\r\n\r\nVrelo ljeto , vreli dan\r\nTi i ja , jedna divna melodija\r\nVrelo ljeto , vreli dan\r\nTi i ja , jedna divna melodija\r\n\r\nJa cak na travi ni da skocim\r\nZoru vremena\r\nU te tvoje blage oci\r\nBoje kestena\r\n\r\nI to cudo svih cuda u svemiru\r\nNeke slike nikada ne umiru\r\nI to cudo svih cuda u svemiru\r\nNeke slike nikada ne umiru\r\n\r\nRefren2X\r\nU svakoj basti raste po jedna ruza\r\nI svako ima nekog da mu ruke pruza\r\n\r\nJa imam tebe ruzo moja\r\nTebe jednu, sto nespokoja\r\nJa imam tebe ruzo moja\r\nTebe jednu, sto nespokoja\r\n\r\nRefren2X\r\nU svakoj basti raste po jedna ruza\r\nI svako ima nekog da mu ruke pruza\r\n\r\nJa imam tebe ruzo moja\r\nTebe jednu, sto nespokoja\r\nJa imam tebe ruzo moja\r\nTebe jednu, sto nespokoja', 76, 'slike/1530293912ruža-koja-je.jpg', 'slika koja opisuje pesmu', '2018-06-29'),
(23, 'How deeep is your love', 'I want you to breathe me\r\nLet me be your air\r\nLet me roam your body freely\r\nNo inhibition, no fear\r\n\r\n[Chorus: Ina Wroldsen]\r\nHow deep is your love?\r\nIs it like the ocean?\r\nWhat devotion are you?\r\nHow deep is your love?\r\nIs it like nirvana?\r\nHit me harder again\r\nHow deep is your love?\r\nHow deep is your love?\r\nHow deep is your love?\r\nHow deep is your love?\r\nHow deep is your love?\r\n(How deep is your love?)\r\nHow deep is your love?\r\nHow deep is your love?\r\nIs it like the ocean?\r\nPull me closer again\r\nHow deep is your love?\r\nHow deep is your love?\r\n\r\n[Verse 2: Ina Wroldsen]\r\nOpen up my eyes and\r\nTell me who I am\r\nLet me in on all your secrets\r\nNo inhibition, no sin\r\n\r\n[Chorus: Ina Wroldsen]\r\nHow deep is your love?\r\nIs it like the ocean?\r\nWhat devotion are you?\r\nHow deep is your love?\r\nIs it like nirvana?\r\nHit me harder again\r\nHow deep is your love?\r\nHow deep is your love?\r\nHow deep is your love?\r\nHow deep is your love?\r\n(How deep is your love?)\r\nHow deep is your love?\r\nHow deep is your love?\r\nHow deep is your love?\r\nHow deep is your love?\r\nHow deep is your love?\r\nHow deep is your love?\r\nHow deep is your love?\r\nHow deep is your love?\r\nHow deep is your love?\r\nHow deep is your love?\r\nIs it like the ocean?\r\nPull me closer again\r\nHow deep is your love?\r\nHow deep is your love?\r\nHow deep is your love?\r\n\r\n[Bridge: Vocoder (Ina Wroldsen)]\r\nSo tell me, how deep is your love? Can it go deeper?\r\nSo tell me, how deep is your love? Can it go deep?\r\nSo tell me, how deep is your love? Can it go deeper?\r\nSo tell me, how deep is your love? Can it go deep?\r\n(How deep is your love?)\r\nSo tell me, how deep is your love? Can it go deeper?\r\nSo tell me, how deep is your love? Can it go deep?\r\n(How deep is your love?)\r\nSo tell me, how deep is your love? Can it go deeper?\r\n(Pull me closer, again)\r\nSo tell me, how deep is your love?\r\n(How deep is your love?\r\nHow deep is your love?\r\nHow deep is your love?)\r\n\r\n[Outro: Vocoder (Ina Wroldsen)]\r\nSo tell me, how deep is your love? Can it go deeper?\r\nSo tell me, how deep is your love? Can it go deep?\r\n(How deep is your love?)\r\nSo tell me, how deep is your love? Can it go deeper?\r\nSo tell me, how deep is your love? Can it go deep?', 121, 'slike/1530443329calvin-harris-debuts-sexy-how-deep-is-your-love-starring-gigi-hadid.jpg', 'slika koja opisuje pesmu', '2018-07-01');

-- --------------------------------------------------------

--
-- Table structure for table `slajder`
--

CREATE TABLE `slajder` (
  `idSlika` int(2) NOT NULL,
  `src` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `alt` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ljubavna slika za slajder'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slajder`
--

INSERT INTO `slajder` (`idSlika`, `src`, `alt`) VALUES
(1, 'slike/slajder1.png', 'ljubavna slika za slajder'),
(2, 'slike/slajder2.png', 'ljubavna slika za slajder'),
(3, 'slike/slajder5.png', 'ljubavna slika za slajder'),
(4, 'slike/slajder6.png', 'ljubavna slika za slajder'),
(5, 'slike/slajder3.png', 'ljubavna slika za slajder'),
(6, 'slike/slajder4.png', 'ljubavna slika za slajder'),
(7, 'slike/slajder7.jpg', 'ljubavna slika za slajder'),
(8, 'slike/slajder9.png', 'ljubavna slika za slajder'),
(9, 'slike/slajder8.png', 'ljubavna slika za slajder'),
(10, 'slike/1529197048ljubavne slike-slike ljubavne-facebook-srce-srca.jpg', 'slika za slajder srce'),
(11, 'slike/1529197423ljubavne slike-slike ljubavne-facebook-srce-srca.jpg', 'Neka slika alt ');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `idStatus` int(1) NOT NULL,
  `naziv` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`idStatus`, `naziv`) VALUES
(1, 'korisnik'),
(2, 'administrator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anketa`
--
ALTER TABLE `anketa`
  ADD PRIMARY KEY (`id_a`);

--
-- Indexes for table `anketa_korisnik`
--
ALTER TABLE `anketa_korisnik`
  ADD PRIMARY KEY (`id_anketa_korisnik`),
  ADD KEY `id_anketa` (`id_anketa`),
  ADD KEY `id_korisnik` (`id_korisnik`),
  ADD KEY `id_anketa_odgovor` (`id_anketa_odgovor`);

--
-- Indexes for table `anketa_odgovor`
--
ALTER TABLE `anketa_odgovor`
  ADD PRIMARY KEY (`id_a_o`),
  ADD KEY `id_anketa` (`id_anketa`),
  ADD KEY `id_odgovor` (`id_odgovor`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`idKomentar`,`idKorisnik`,`idPesme`),
  ADD KEY `idKorisnik` (`idKorisnik`),
  ADD KEY `idPesme` (`idPesme`);

--
-- Indexes for table `korisnicisajta`
--
ALTER TABLE `korisnicisajta`
  ADD PRIMARY KEY (`idKorisnik`),
  ADD UNIQUE KEY `nadimak` (`nadimak`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `idStatus` (`idStatus`);

--
-- Indexes for table `meni`
--
ALTER TABLE `meni`
  ADD PRIMARY KEY (`idMeni`),
  ADD UNIQUE KEY `naziv` (`naziv`);

--
-- Indexes for table `odgovor`
--
ALTER TABLE `odgovor`
  ADD PRIMARY KEY (`id_odgovor`);

--
-- Indexes for table `pesme`
--
ALTER TABLE `pesme`
  ADD PRIMARY KEY (`idPesme`),
  ADD KEY `idKorisnik` (`idKorisnik`);

--
-- Indexes for table `slajder`
--
ALTER TABLE `slajder`
  ADD PRIMARY KEY (`idSlika`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`idStatus`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anketa`
--
ALTER TABLE `anketa`
  MODIFY `id_a` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `anketa_korisnik`
--
ALTER TABLE `anketa_korisnik`
  MODIFY `id_anketa_korisnik` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `anketa_odgovor`
--
ALTER TABLE `anketa_odgovor`
  MODIFY `id_a_o` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `idKomentar` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `korisnicisajta`
--
ALTER TABLE `korisnicisajta`
  MODIFY `idKorisnik` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `meni`
--
ALTER TABLE `meni`
  MODIFY `idMeni` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `odgovor`
--
ALTER TABLE `odgovor`
  MODIFY `id_odgovor` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pesme`
--
ALTER TABLE `pesme`
  MODIFY `idPesme` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `slajder`
--
ALTER TABLE `slajder`
  MODIFY `idSlika` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `idStatus` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anketa_korisnik`
--
ALTER TABLE `anketa_korisnik`
  ADD CONSTRAINT `anketa_korisnik_ibfk_1` FOREIGN KEY (`id_korisnik`) REFERENCES `korisnicisajta` (`idKorisnik`),
  ADD CONSTRAINT `anketa_korisnik_ibfk_2` FOREIGN KEY (`id_anketa`) REFERENCES `anketa` (`id_a`),
  ADD CONSTRAINT `anketa_korisnik_ibfk_3` FOREIGN KEY (`id_anketa_odgovor`) REFERENCES `anketa_odgovor` (`id_a_o`);

--
-- Constraints for table `anketa_odgovor`
--
ALTER TABLE `anketa_odgovor`
  ADD CONSTRAINT `anketa_odgovor_ibfk_1` FOREIGN KEY (`id_anketa`) REFERENCES `anketa` (`id_a`),
  ADD CONSTRAINT `anketa_odgovor_ibfk_2` FOREIGN KEY (`id_odgovor`) REFERENCES `odgovor` (`id_odgovor`);

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`idKorisnik`) REFERENCES `korisnicisajta` (`idKorisnik`),
  ADD CONSTRAINT `komentar_ibfk_2` FOREIGN KEY (`idPesme`) REFERENCES `pesme` (`idPesme`);

--
-- Constraints for table `korisnicisajta`
--
ALTER TABLE `korisnicisajta`
  ADD CONSTRAINT `korisnicisajta_ibfk_1` FOREIGN KEY (`idStatus`) REFERENCES `status` (`idStatus`);

--
-- Constraints for table `pesme`
--
ALTER TABLE `pesme`
  ADD CONSTRAINT `pesme_ibfk_1` FOREIGN KEY (`idKorisnik`) REFERENCES `korisnicisajta` (`idKorisnik`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
