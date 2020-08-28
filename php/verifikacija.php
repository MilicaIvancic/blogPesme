<?php

if(isset($_GET['token'])){
	$token = $_GET['token'];

	// upit ka bazi

	include "konekcija.php";

	$upit = "SELECT * FROM korisnicisajta WHERE aktivacioniKod = :token";

	$priprema_upit = $konekcija->prepare($upit);

	$priprema_upit->bindParam(":token", $token);

	try {
		$rezultat = $priprema_upit->execute();
		if($rezultat){
			$korisnik = $priprema_upit->fetch();
			if(empty($korisnik)){
				echo "Niste registrovani!";
				
			} else {

				// ako postoji korisnik

				// UPDATE aktivan

				$upit = "UPDATE korisnicisajta SET aktivan = 1
				 WHERE aktivacioniKod = :token";

				$priprema = $konekcija->prepare($upit);

				$priprema->bindParam(":token", $token);

				$rez = $priprema->execute();

				if($rez){
					header("Location: https://blogpesme.000webhostapp.com//index.php?page=sredinaindex");

				} else {
					echo "Izvinite, greska!";
				}



			}

		} else {
			echo "Upit nije ok.";
		}
	}
	catch(PDOException $ex){
		echo $ex->getMessage();
	}
}