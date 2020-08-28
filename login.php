<?php
@ob_start();
@session_start();

include "php/konekcija.php";

if(isset($_POST['login'])){
	$email = $_POST['username'];
	$password = md5($_POST['lozinka']);

	
	$upit = "SELECT k.*, s.naziv FROM korisnicisajta k INNER JOIN status s ON k.idStatus = s.idStatus WHERE email = :email AND sifra= :password AND aktivan = 1";

	$priprema = $konekcija->prepare($upit);

	$priprema->bindParam(":email", $email);

	$priprema->bindParam(":password", $password);

	try {
		$priprema->execute();

		if($priprema->rowCount() == 1){
			// echo "Postoji korisnik u bazi!";

			$korisnik = $priprema->fetch(); 
			// var_dump($korisnik);

			$_SESSION['korisnik'] = $korisnik;

			if($korisnik->naziv == "administrator"){
				header("Location: index.php?page=adminpanel");
			} else {
				header("Location: index.php?page=korisnik");
			}

		} else {
			header("Location: index.php?page=loselogovanje");
			
		}
	}
	catch(PDOException $x){
		echo $x->getMessage();
	}

}



