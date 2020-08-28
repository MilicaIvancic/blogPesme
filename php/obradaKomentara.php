<?php
@session_start();

include("konekcija.php");

if(isset($_POST['potvrdi'])){
    $feedback=null;
    $tbkomentar=$_POST['tbkomentar'];
    $korisnik=$_SESSION['korisnik']->idKorisnik;
    //var_dump($korisnik);
    $idpesme=$_POST['skriveniId'];
    $timestamp=date("Y-m-d ");

    $status = 404;

    $regKomentar="/(.){5,500}/";
    $nizGreske = [];

    if(!preg_match($regKomentar, $tbkomentar))
   {
      array_push($nizGreske, "Komentar je prekratak ili predugacak");
   }

   if(count($nizGreske)==0){
   //idKomentar
   //idKorisnik?
   //idPesme?
   //datumPostavljanja
   //textKomentara	
   
  $upit = "INSERT INTO komentar VALUES(null, :idKorisnik, :idPesme, :datumPostavljanja, :textKomentara)";
    $rez = $konekcija->prepare($upit);
    $rez -> bindParam(':idKorisnik', $korisnik);
    $rez -> bindParam(':idPesme', $idpesme);
    $rez -> bindParam(':datumPostavljanja', $timestamp);
    $rez -> bindParam(':textKomentara', $tbkomentar);

    try
    {
        $bool = $rez->execute();
        if($bool)
        {
            $feedback = ["message" => "Uspešno ste postavili komentar."];
            $status = 201;
        }
        
        


    }

    catch(PDOException $e){
         $status=500;
         $feedback=["message" => "Nije uspeo unos.".$e->getMessage()];
    }

   }

   else{
      
      $status=422;
      $feedback=$nizGreske;
   }

   http_response_code($status);
   echo json_encode($feedback);
}