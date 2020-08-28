<?php



include("konekcija.php");

if(isset($_POST['btnpotvrdi1']))
{
   $tbime = $_POST['tbime'];
   $tbprezime = $_POST['tbprezime'];
   $tbmail = $_POST['tbmail'];
   $tbnadimak=$_POST['tbnadimak'];
   $tbpassword= $_POST['tbpassword'];
   $izabraniRb = isset($_POST['izabraniRb']) ? $_POST['izabraniRb'] : null;
   $izabraniaktivan = isset($_POST['izabraniaktivan']) ? $_POST['izabraniaktivan'] : null;
   $uloga = isset($_POST['uloga']) ? $_POST['uloga'] : null;
   
   
    

   $status = 404;
   

   $regIme ="/^[A-ZČĆŽŠĐ][a-zčćžšđ]{2,19}(\s[A-ZČĆŽŠĐ][a-zčćžšđ]{2,19})?$/";
   $regPrezime ="/^[A-ZČĆŽŠĐ][a-zčćžšđ]{2,19}(\s[A-ZČĆŽŠĐ][a-zčćžšđ]{2,19})?$/";
   $regPasword ="/^(.){8,20}$/";
   $regNadimak="/^[A-Z][A-Za-z]{2,15}$/";
   $regMail="/^[a-z][a-z0-9\.\_]{2,40}\@([a-z]{3,8}\.)com$/";

   $nizGreske = [];

   if(!preg_match($regIme, $tbime))
   {
      array_push($nizGreske, "Ime nije u dobrom formatu");
   }

   if(!preg_match($regPrezime, $tbprezime))
   {
      array_push($nizGreske, "Prezime nije u dobrom formatu");
   }
   if(!preg_match($regMail, $tbmail))
   {
      array_push($nizGreske, "E-mail nije u dobrom formatu.");
   }
   if(!preg_match($regNadimak, $tbnadimak))
   {
      array_push($nizGreske, "Nadimak nije dobar");
   }

   if(!preg_match($regPasword, $tbpassword))
   {
      array_push($nizGreske, "Passwor nije dobar.");
   }
   

   if(empty($izabraniRb))
      {
         array_push($nizGreske, "Mora biti izabran pol.");
      }
      if(empty($izabraniRb))
      {
         array_push($izabraniaktivan, "Mora biti izabran status.");
      }
      if(empty($uloga))
      {
         array_push($nizGreske, "Mora biti izabran uloga.");
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
    
    
	$tbkod = sha1(md5(round(rand(1,999999999))));
    $tbpassword = md5($tbpassword);
    $uloga1=($uloga);
    $izabraniaktivan1=($izabraniaktivan);
    $upit = "INSERT INTO korisnicisajta VALUES(null, :ime, :prezime, :nadimak, :email, :sifra, :idStatus,  :aktivan,   :pol, :token)";
    $rez = $konekcija->prepare($upit);
    $rez -> bindParam(':ime', $tbime);
    $rez -> bindParam(':prezime', $tbprezime);
    $rez -> bindParam(':nadimak', $tbnadimak);
    $rez -> bindParam(':email', $tbmail);
    $rez -> bindParam(':sifra', $tbpassword);
    $rez -> bindParam(':pol', $izabraniRb);
    $rez -> bindParam(':idStatus', $uloga1);
    $rez -> bindParam(':token', $tbkod);
    $rez -> bindParam(':aktivan', $izabraniaktivan1);
    
    
    
    

    try
    {
        $bool = $rez->execute();
        if($bool)
        {
            $feedback = ["message" => "Uspešno ste se registrovali."];
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