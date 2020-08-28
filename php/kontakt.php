<?php 
    @ob_start();
   @session_start();
    
   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\Exception;

  include 'phpmailer/src/Exception.php';
  include 'phpmailer/src/PHPMailer.php';
  include 'phpmailer/src/SMTP.php';



    if(isset($_POST['sbmKontakt']))
    {
        $sadrzaj = $_POST['sadrzaj'];
        $mailKorisnika = $_POST['mailKorisnika'];
        $passKorisnika = $_POST['passKorisnika'];
        $naslov = $_POST['naslov'];

        $mail = new PHPMailer(true);

        try
        {
            $mail->SMTPDebug = 2;
            $mail->SMTPOptions = array('ssl' => array('verify_peer' => false, 'verify_peer_name' => false,'allow_self_signed' => true));

            //$mail->SMTPDebug = 2;
            $mail->isSMTP(); 
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = $mailKorisnika; //testnanana40@gmail.com
            $mail->Password = $passKorisnika; //testnana52
            $mail->SMTPSecure = 'tls'; 
            $mail->Port = 587;
            $mail->setFrom($mailKorisnika, '');
            $mail->addAddress('perijanovic.peric@gmail.com');
            
            // content
            $mail->isHTML(true);
            $mail->Subject = $naslov;

            $mail->Body = $sadrzaj;

            $mail->send();
         echo json_encode(['msg1'=>'Message has been sent']);

            $status = 201;
            $_SESSION['info'] = "Vas mail je uspesno poslat.";
            header("Location: https://blogpesme.000webhostapp.com/index.php?page=kontakt");
        }

        catch (Exception $e) 
        {
            echo json_encode(['msg'=>'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo]);
            $_SESSION['info'] = "Poruka nije poslata! " . $mail->ErrorInfo;
            header("Location: https://blogpesme.000webhostapp.com/index.php?page=kontakt");
            
        }
        
    }
?>
