<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

include("konekcija.php");

if(isset($_POST['btnpotvrdi']))
{
   $tbime = $_POST['tbime'];
   $tbprezime = $_POST['tbprezime'];
   $tbmail = $_POST['tbmail'];
   $tbnadimak=$_POST['tbnadimak'];
   $tbpassword= $_POST['tbpassword'];
   $izabraniRb = isset($_POST['izabraniRb']) ? $_POST['izabraniRb'] : null;
   
    

   $status = 404;

   $regIme ="/^[A-ZČĆŽŠĐ][a-zčćžšđ]{2,9}(\s[A-ZČĆŽŠĐ][a-zčćžšđ]{2,9})?$/";
   $regPrezime ="/^[A-ZČĆŽŠĐ][a-zčćžšđ]{2,9}(\s[A-ZČĆŽŠĐ][a-zčćžšđ]{2,9})?$/";
   $regPasword ="/^(.){8,20}$/";
   $regNadimak="/^[A-Z][A-Za-z]{2,15}$/";
   $regMail="/^[a-z0-9]([a-z0-9\.\_]{2,40})+\@([a-z]{2,8}\.)+(com|rs)$/";

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
    
    $tbpassword = md5($tbpassword);
    $upit = "INSERT INTO korisnicisajta VALUES(null, :ime, :prezime, :nadimak, :email, :sifra, 1,  0,   :pol, :token)";
    $rez = $konekcija->prepare($upit);
    $rez -> bindParam(':ime', $tbime);
    $rez -> bindParam(':prezime', $tbprezime);
    $rez -> bindParam(':nadimak', $tbnadimak);
    $rez -> bindParam(':email', $tbmail);
    $rez -> bindParam(':sifra', $tbpassword);
    $rez -> bindParam(':pol', $izabraniRb);
    
    $token = md5(round(rand(1,999999999)));
   
    $rez->bindParam(":token", $token);
    

    try
    {
        $bool = $rez->execute();
        if($bool)
        {
            $feedback = ["message" => "Uspešno ste se registrovali."];
            $status = 201;
        }

        //slanje maila
        $mail = new PHPMailer(true);

        try {
//Server settings
$mail->SMTPDebug = 0;
                                        // Enable verbose debug output
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'perijanovic.peric@gmail.com';                 // SMTP username
$mail->Password = 'milicaivancicq1q1q1';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to
 $mail->SMTPOptions = array(
'ssl' => array(
    'verify_peer' => false,
    'verify_peer_name' => false,
    'allow_self_signed' => true
)
);  

//Recipients
$mail->setFrom('perijanovic.peric@gmail.com', 'Millica Ivancic');
 $mail->addAddress($tbmail, 'Milica Ivancic');     // Add a recipient
// $mail->addAddress('ellen@example.com');               // Name is optional
// $mail->addReplyTo('info@example.com', 'Information');
// $mail->addCC('cc@example.com');
// $mail->addBCC('bcc@example.com');

//Attachments
// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

//Content
$mail->isHTML(true);                                  // Set email format to HTML
$mail->Subject = 'Registracija';
$mail->Body    = "Verifikacija mejla, ici na: root sajta i /php/verifikacija.php?token=".$token.".";
// $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

$mail->send();
$feedback = ["message" => "Uspešno je  POSLALT MEJL. Potvrdite nalog putem e-maila."];

// echo 'Message has been sent';
$code = 200;
} catch (Exception $e) {
$code = 500;
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
else
{
   header("Location: http://localhost/php1sajt/php1sajt/index.php"); // ovde moze da stoji i header("Location: index.php") jer ako udje u else znaci da je probao direktan pristup strani
}

http_response_code($status);
echo json_encode($feedback);

?>