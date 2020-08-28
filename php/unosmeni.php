<?php



include("konekcija.php");

if(isset($_POST['potvrdimeni']))
{
   $href = $_POST['href'];
   $naziv = $_POST['naziv'];
 
   
   
    

   $status = 404;
   

   $regNaziv = "/^[A-ZČĆŽŠĐ][a-zčćžšđ]{2,9}(\s[a-zčćžšđ]{2,9})?$/";
   $regHref = "/[^\s]/";

   $nizGreske = [];

   if(!preg_match($regHref, $href))
   {
      array_push($nizGreske, "Href nije okej");
   }

   if(!preg_match($regNaziv, $naziv))
   {
      array_push($nizGreske, "Naziv nije u dobrom formatu");
   }
   

   if(count($nizGreske) == 0)
   {

   
    //idKorisnik  
    //ime
    //prezime
    //nadimak
    //datumRegistracije
    //email
    //sifra
    //idStatus
    //aktivan
    //aktivacioniKod
    //pol
    
    
	
    $upit = "INSERT INTO meni VALUES(null, :href, :naziv)";
    $rez = $konekcija->prepare($upit);
    $rez -> bindParam(':href', $href);
    $rez -> bindParam(':naziv', $naziv);
    
    
    
    
    

    try
    {
        $bool = $rez->execute();
        if($bool)
        {
            $feedback = ["message" => "Uspešno ste uneli meni."];
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