<?php
@session_start();

if(isset($_SESSION['korisnik'])){
	//$ime = "Danijela";
	unset($_SESSION['korisnik']);
	session_destroy();
	header("Location: index.php?page=sredinaindex");
}
else{
	header("Location: index.php?page=sredinaindex");
}