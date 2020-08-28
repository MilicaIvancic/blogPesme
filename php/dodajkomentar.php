<?php



include("konekcija.php");

if(isset($_POST['potvrdikomentar']))
{



   $naziv = $_POST['naziv'];
    
   $status = 404;

   $regNaziv = "/^[A-ZČĆŽŠĐ][a-zčćžšđ]{2,30}/";
   $korisnik = isset($_POST['korisnikpotvrda']) ? $_POST['korisnikpotvrda'] : null;
   $pesma = isset($_POST['pesmapotvrdi']) ? $_POST['pesmapotvrdi'] : null;
   $nizGreske = [];

   if(!preg_match($regNaziv, $naziv))
   {
      array_push($nizGreske, "Text nije u dobrom formatu");
   }
   
    if(empty($pesma)){
        array_push($nizGreske, "Pesma mor abiti odabrana");
    }
    if(empty($korisnik)){
        array_push($nizGreske, "Korisnik mor abiti odabrana");
    }

   if(count($nizGreske) == 0)
   {

   $datum=date("Y-m-d ");
    $upit = "INSERT INTO komentar VALUES(null, :idk, :idp, :datum, :naziv)";
    $rez = $konekcija->prepare($upit);
    $rez -> bindParam(':idk', $korisnik);
    $rez -> bindParam(':idp', $pesma);
    $rez -> bindParam(':datum', $datum);
    $rez -> bindParam(':naziv', $naziv);
    
    try
    {
        $bool = $rez->execute();
        if($bool)
        {
            $feedback = ["message" => "Uspešno ste uneli status."];
            $status = 201;
        }

        
    }
    catch(PDOException $e)
    {
        $feedback = ["message" => "Greska! " . $e->getMessage()];
        $status = 409;
    }
    
      
   }

   else
   {
    $status = 422;
      $feedback = $nizGreske;
   }

}

if(isset($status)){
http_response_code($status);
}
if(isset($feedback)){

echo json_encode($feedback);
}

?>