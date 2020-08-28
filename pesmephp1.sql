-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2018 at 12:20 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pesmephp1`
--

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
(1, 8, 1, '2018-06-13', 'Bas lepa pesma'),
(2, 1, 2, '2018-06-09', 'Dugo nisam procitao ovako lepu pesmu. '),
(3, 36, 1, '2018-06-09', ' Moja omiljena :D'),
(4, 36, 3, '2018-06-10', ' OvoJeKomentar123\n'),
(5, 37, 3, '2018-06-10', ' ZastoOvoRadim?\n'),
(6, 37, 3, '2018-06-10', ' DO JAJA'),
(7, 37, 3, '2018-06-10', ' Mrzece te da brises ovo zar ne?\n'),
(8, 37, 3, '2018-06-10', ' Kojic je gej'),
(9, 37, 3, '2018-06-10', ' Ne salim se, garantovano je izabrao pol \"drugo\" kad je pravio nalog');

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
  `idStatus` int(1) NOT NULL DEFAULT '1',
  `aktivan` tinyint(1) NOT NULL DEFAULT '0',
  `pol` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `aktivacioniKod` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnicisajta`
--

INSERT INTO `korisnicisajta` (`idKorisnik`, `ime`, `prezime`, `nadimak`, `email`, `sifra`, `idStatus`, `aktivan`, `pol`, `aktivacioniKod`) VALUES
(1, 'Vuk', 'Vucko', 'Vukica', 'pera@gmai.com', 'vukvucko', 1, 0, '', '0'),
(2, 'Milica', 'Ivančić', 'MicikaxD', 'ivancic@gmail.com', 'moramdauspem123', 1, 1, '', '0'),
(4, 'Pera', 'Peric', 'Pekiii', 'pera1@gmail.com', '5a84b6430ed957bb8a115f515fe1c67f', 1, 0, 'on', '0'),
(8, 'Marko', 'Marković', 'Mare', 'mare@gmail.com', '25f9e794323b453885f5181f1b624d0b', 1, 0, 'on', '0'),
(35, 'Pera', 'Pericic', 'Pekic', 'zed.noob123@gmail.com', 'f78a4f05ef070d6a4034e4014016b209', 1, 1, 'Muški', 'a38022eebf47db1597b098afa52dd25b4f54b02f'),
(36, 'Milica', 'Ivančić', 'AdminMicika', 'milica.zajeganovic.ivancic@gmail.com', '0a344263f77037f83fdf09c000c0e976', 2, 1, 'Ženski', 'a858db34ae9a1cc78d98c428f0f3e1294e673acb'),
(37, 'Boris', 'Mitric', 'Boki', 'borismitric666@gmail.com', '2276acf74ffce7a60931833fd3143ee4', 1, 1, 'Drugo', 'fd450432805bc606704d444a6e064db59101cd67');

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
(1, 'index.php?page=sredinaindex', 'Početna'),
(3, 'index.php?page=kontakt', 'Kontakt'),
(4, 'index.php?page=login', 'Pesme'),
(5, 'index.php?page=galerija', 'Galerija'),
(6, 'index.php?page=adminpanel', 'Admin panel'),
(7, 'index.php?page=korisnik', 'Moj nalog'),
(8, 'logout.php', 'Odjavi se');

-- --------------------------------------------------------

--
-- Table structure for table `pesme`
--

CREATE TABLE `pesme` (
  `idPesme` int(11) NOT NULL,
  `naziv` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `sadrzaj` text COLLATE utf8_unicode_ci NOT NULL,
  `idKorisnik` int(10) NOT NULL,
  `slikaPesme` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'slike/pesma.jpg',
  `altPesme` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'slika koja opisuje pesmu',
  `datumPostavljanja` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pesme`
--

INSERT INTO `pesme` (`idPesme`, `naziv`, `sadrzaj`, `idKorisnik`, `slikaPesme`, `altPesme`, `datumPostavljanja`) VALUES
(1, 'Pesma o tebi', 'Ako prva odem, javiću ti\r\njaviću ti šta biva kad se brat i sestra\r\ni mati i prijatelj polako raziđu\r\ni pljusak se kroz rastresitu humku sruči,\r\ni treba li se bojati pauka savesti\r\ni šta on među crvima i stonogama znači.\r\n\r\nJaviću ti ima li razlike\r\nizmeđu grumena zemlje i čoveka,\r\nizmeđu suza i voda ponornica,\r\ni treba li strepeti od izjednačenja\r\nsa biljkom, kapljom i mineralom,\r\na i tebe to molim.\r\n\r\nJaviću ti treba li se bojati časa\r\nkad sve naše riznice pređu u nepoznate ruke\r\ni da li se njihova vrednost tamo menja\r\ni da li je život samo šahovska igra\r\njezgri i ćelija, a i tebe to molim.\r\n\r\nAko prva odem, javiću ti,\r\njaviću ti sudbinu pesnika, srca,\r\ni šta on u susedstvu večne ravnodušnosti znači,\r\ni šta bude sa munjama i dugama naših ljubavi,\r\na i tebe to molim.', 2, 'slike/pesma.jpg', 'slika koja opisuje pesmu', '2018-06-14'),
(2, 'ZENDAGI   MAGZARA', 'ašto je vreme tmurno,\r\nZbog cega kiša lije,\r\nZašto se zastava tuge\r\nNad dušom mojom vije?\r\nO Bože, za kim tako\r\nBolno, sa tornja zvono bije.\r\n   	Tužan mi pogled luta\r\nPo zidovima porušenih kuca,\r\nPo mnogim leševima pored puta,\r\nI po spaljenim kolibama od pruca.\r\n   	ZENDAGI   MAGZARA\r\nSvuda se cuje pesma, i šapat nežnih rewci:\r\nBELAC   CRNCU  zdravicu drži-\r\nI pred istim BOGOM  kleci.\r\n   	ZENDAGI   MAGZARA \r\nTrenuci srece, ma koliko kratkotrajni bili,\r\nIskren osmeh sa lica sto oci u\r\nDva kestena stvor,\r\nVredi no ceo neproživljeni život\r\nU kome za srecu, telo se bori.\r\nKLECECI   PRED   TOBOM\r\nPRELEPA   GOSPO\r\nObraca ti se srce koje kontrolisati ne mogu:\r\nPodari mi maramu svoju, i bicu tvoj\r\nVITEZ,   SLUGA  i  BARD.\r\nU nezaborav lepota ode, tuga i bol\r\nKERBERU   na dar.\r\nZENDAGI   MAGZARA\r\n', 2, 'slike/pesma.jpg', 'slika koja opisuje pesmu', '2018-06-07'),
(3, 'Pepeo', 'Jedni su noći drugi zvezde\r\nSvаkа noć zаpаli svoju zvezdu\r\nI igrа crnu igru oko nje\r\nSve dok joj zvezdа ne izgori\r\nNoći se zаtim među sobom podele\r\nJedne budu zvezde\r\nDruge ostаnu noći\r\nOpet svаkа noć zаpаli svoju zvezdu\r\nI igrа crnu igru oko nje\r\nSve dok joj zvezdа ne izgori\r\nNoć poslednjа bude i zvezdа i noć\r\nSаmа sebe zаpаli\r\nSаmа oko sebe crnu igru odigrа.', 36, 'slike/pesma.jpg', 'slika koja opisuje pesmu', '2018-06-09'),
(4, 'Možda spava', 'Zaboravio sam jutros pesmu jednu ja,\r\nPesmu jednu u snu što sam svu noc slušao:\r\nDa je čujem uzalud sam danas kušao,\r\nKao da je pesma bila sreća moja sva.\r\nZaboravio sam jutros pesmu jednu ja.\r\n\r\nU snu svome nisam znao za budjenja moć,\r\nI da zemlji treba sunca, jutra i zore;\r\nDa u danu gube zvezde bele odore;\r\nBledi mesec da se kreće u umrlu noć.\r\nU snu svome nisam znao za buđenja moć.\r\n\r\nJa sad jedva mogu znati da imadoh san,\r\nI u njemu oči neke, nebo nečije,\r\nNeko lice, ne znam kakvo, mozda dečije,\r\nStaru pesmu, stare zvezde, neki stari dan.\r\nJa sad jedva mogu znati da imadoh san.\r\n\r\nNe sećam se niceg više, ni očiju tih:\r\nKao da je san mi ceo bio od pene,\r\nIl\' te oči da su moja duša van mene,\r\nNi arije, ni sveg drugog, sto ja noćas snih;\r\nNe sećam se nićeg više, ni očiju tih.\r\n\r\nAli slutim, a slutiti još znam.\r\nJa sad slutim za te oči, da su baš one,\r\nŠto me čudno po životu vode i gone:\r\nU snu dođu, da me vide, šta li radim sam.\r\nAli slutim, a slutiti još jedino znam.\r\n\r\nDa me vide dođu oči, i ja vidim tad\r\nI te oči, i tu ljubav, i taj put sreće;\r\nNjene oči, njeno lice, njeno proleće\r\nU snu vidim, ali ne znam, što ne vidim sad.\r\nDa me vide, dođu oči, i ja vidim tad.\r\n\r\nNjenu glavu s krunom kose i u kosi cvet,\r\nI njen pogled što me gleda kao iz cveća,\r\nŠto me gleda, što mi kaze, da me oseća,\r\nŠto mi brižno pruža odmor i nežnosti svet,\r\nNjenu glavu s krunom kose i u kosi cvet.\r\n\r\nJa sad nemam svoju dragu, i njen ne znam glas;\r\nNe znam mesto na kom živi ili počiva;\r\nNe znam zašto nju i san mi java pokriva;\r\nMožda spava, i grob tužno neguje joj stas.\r\nJa sad nemam svoju dragu, i njen ne znam glas.\r\n\r\nMožda spava sa očima izvan svakog zla,\r\nIzvan stvari, iluzija, izvan života,\r\nI s njom spava, nevidjena, njena lepota;\r\nMožda živi i doći će posle ovog sna.\r\nMožda spava sa očima izvan svakog zla.', 1, 'slike/pesma.jpg', 'slika koja opisuje pesmu', '2018-06-10'),
(5, 'Čežnja', 'Sanjam da ćeš doći:\r\njer mirišu noći, a drveće lista,\r\ni novo se cveće svakog jutra rodi;\r\njer osmesi ljupki igraju po vodi,\r\ni proletnjim nebom što od sreće blista;\r\n\r\nJer pupe topole, i kao da hoće\r\nk nebu, pune tople, nabujale žudi;\r\njer u duši bilja ljubav već se budi,\r\ni mirisnim snegom osulo se voće;\r\n\r\nJer zbog tebe čežnje u vazduhu plove;\r\nsvu prirodu Gospod za tvoj doček kiti.\r\nCveće, vode, magle, jablanovi viti,\r\nsve okolo mene čeka te i zove.\r\n\r\nDođi! Snovi moji u gustome roju\r\ntebi lete. Dođi, bez tebe se pati!\r\nDođi! Sve kraj mene osmeh će ti dati\r\ni u svemu čežnju opazićeš moju.', 36, 'slike/pesma.jpg', 'slika koja opisuje pesmu', '2018-06-12');

-- --------------------------------------------------------

--
-- Table structure for table `slajder`
--

CREATE TABLE `slajder` (
  `idSlika` int(2) NOT NULL,
  `src` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
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
(9, 'slike/slajder8.png', 'ljubavna slika za slajder');

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
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `idKomentar` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `korisnicisajta`
--
ALTER TABLE `korisnicisajta`
  MODIFY `idKorisnik` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `meni`
--
ALTER TABLE `meni`
  MODIFY `idMeni` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pesme`
--
ALTER TABLE `pesme`
  MODIFY `idPesme` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `slajder`
--
ALTER TABLE `slajder`
  MODIFY `idSlika` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `idStatus` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

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
