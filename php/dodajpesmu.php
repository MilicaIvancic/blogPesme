<?php
@session_start();



include("konekcija.php");





if(isset($_POST['potvrdipesmu']))
{

   $naziv = $_POST['naziv'];
    
   $status = 404;

   $regPesma = "/[a-zčćžšđ]{1,30}/";
   $regNaziv = "/^[A-ZČĆŽŠĐ]/";
   $korisnik = isset($_POST['korisnikpotvrda']) ? $_POST['korisnikpotvrda'] : null;
   $text=$_POST['pesma'];
   $slika = $_FILES['fajls'];
      

        $name = $slika['name'];
        $tmp_name = $slika['tmp_name'];
        $type = $slika['type'];
        $size = $slika['size'];
        $error = $slika['error'];
   $nizGreske = [];

   if(!preg_match($regNaziv, $naziv))
   {
      array_push($nizGreske, "Text nije u dobrom formatu");
   }
   
   if(!preg_match($regPesma, $text))
   {
      array_push($nizGreske, "Text pesme nije u dobrom formatu");
   }

    if(empty($korisnik)){
        $korisnik=$_SESSION['korisnik']->idKorisnik;
    }
    $velicina = 4.5 * 1024 * 1024;
    if($size > $velicina)
    {
        $nizGreske[] = "Velicina slike ne moze biti veca od 4.5 MB!";
    }
    if($type != "image/jpg" && $type != "image/jpeg" && $type != "image/png")
    {
        $nizGreske[] = "Format mora biti jpg, jpeg ili png!";
    }

    $type=explode("/", $type)[1];

    $imeSlike = explode(".", $name)[0];

    if($imeSlike == "slika")
    {
        $nizGreske[] = "Naziv slike ne moze biti slika!";
    }

   

   if(count($nizGreske) == 0)
   {

    $name = time() . $name;
            $novaLokacija = "../slike/$name";
            move_uploaded_file($tmp_name, $novaLokacija);
              
            $putanjaUOdnosuNaAdminPhp = "slike/$name";

   $datum=date("Y-m-d ");
    $upit = "INSERT INTO pesme VALUES(null, :naziv, :sadrzaj, :idk, :slika, 'slika koja opisuje pesmu', :datum)";
    $rez = $konekcija->prepare($upit);
    $rez -> bindParam(':idk', $korisnik);
    $rez -> bindParam(':sadrzaj', $text);
    $rez -> bindParam(':datum', $datum);
    $rez -> bindParam(':naziv', $naziv);
    $rez->bindParam(':slika', $putanjaUOdnosuNaAdminPhp);
    try
    {
        $bool = $rez->execute();
        if($bool)
        {
            $feedback = ["message" => "Uspešno ste uneli status."];
            $status = 201;
            header("Location: https://blogpesme.000webhostapp.com/index.php?page=sredinaindex");
        }

        
    }
    catch(PDOException $e)
    {
        $feedback = ["message" => "Greska! " . $e->getMessage()];
        $status = 409;
        var_dump($e->getMessage());
    }
    
      
   }

   else
   {
    $status = 422;
      $feedback = $nizGreske;
   }

}




?>