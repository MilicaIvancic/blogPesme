<?php
@ob_start();
@session_start();
$page = "";


if(isset($_GET['page'])){
		$page = $_GET['page'];}

//var_dump($_GET);
echo "<br/>";

include "php/funkcije.php";
include "php/konekcija.php";
include "php/korinikobrada.php";
include "login.php";
include "views/head.php";
include "views/logo.php";
if(!isset($_SESSION['korisnik'])){

	include "views/logovanje.php";
	
}



include "views/meni.php";



switch($page){
	case "sredinaindex":
		include "views/sredinaindex.php";
		break;
	case "izmeniKorisnika":
	    if(isset($_SESSION['korisnik'])){
if($_SESSION['korisnik']->naziv == "administrator"){
		include "views/izmeniKorisnika.php";}}
		else {
		   include "views/greska403.php";
		}
		break;
		case "izmenimeni":
		include "views/izmenimeni.php";
		break;
	case "sredinapesme":
		include "views/pesme.php";
		break;
			case "autor":
		include "views/autor.php";
		break;
		case "adminpanel":
		include "views/adminpanel.php";
		break;
		case "galerija":
		include "views/galerija.php";
		break;
		case "kontakt":
		include "views/kontakt.php";
		break;
		case "login":
		include "views/login.php";
		break;
		case "registrujse":
		include "views/registrujse.php";
		break;
		case "korisnik":
		include "views/korisnik.php";
		break;
		case "greska403":
		include "views/greska403.php";
		break;
		case "loselogovanje":
		include "views/loselogovanje.php";
		break;
		case "dodajkorisnika":if(isset($_SESSION['korisnik'])){
if($_SESSION['korisnik']->naziv == "administrator"){
		include "views/dodajkorisnika.php";}}
		else {
		   include "views/greska403.php";
		}
		break;
		case "unosmeni":
		    if(isset($_SESSION['korisnik'])){
if($_SESSION['korisnik']->naziv == "administrator"){
		include "views/unosmeni.php";}}
		else {
		   include "views/greska403.php";
		}
		break;
		case "dodajulogu":
		    if(isset($_SESSION['korisnik'])){
if($_SESSION['korisnik']->naziv == "administrator"){
		include "views/dodajulogu.php";}}
		else {
		   include "views/greska403.php";
		}
		break;
		case "dodajkomentar":
		    if(isset($_SESSION['korisnik'])){
if($_SESSION['korisnik']->naziv == "administrator"){
		include "views/dodajkomentar.php";}}
		else {
		   include "views/greska403.php";
		}
		break;
		case "dodajpesmu":
		    if(isset($_SESSION['korisnik'])){

		include "views/dodajpesmu.php";}
		else {
		   include "views/greska403.php";
		}
		break;
		case "dodajsliku":
		    if(isset($_SESSION['korisnik'])){
if($_SESSION['korisnik']->naziv == "administrator"){
		include "views/dodajsliku.php";}}
		else {
		   include "views/greska403.php";
		}
		break;
		

		case "anketa":
		    if(isset($_SESSION['korisnik'])){
		include "views/anketa.php";}
		else {
		   include "views/greska403.php";
		}
		break;
		
		
		
}

include "views/futer.php";
