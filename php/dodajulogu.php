<?php

@session_start();





include("konekcija.php");

if(isset($_POST['potvrdiulogu']))
{

   $naziv = $_POST['naziv'];
    
   $status = 404;

   $regNaziv = "/^[a-zčćžšđ]{2,9}(\s[a-zčćžšđ]{2,9})?$/";
   $nizGreske = [];

   if(!preg_match($regNaziv, $naziv))
   {
      array_push($nizGreske, "Naziv nije u dobrom formatu");
   }
   

   if(count($nizGreske) == 0)
   {

   
    $upit = "INSERT INTO status VALUES(null, :naziv)";
    $rez = $konekcija->prepare($upit);
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