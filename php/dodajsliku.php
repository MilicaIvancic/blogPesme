<?php 
@session_start();


include("konekcija.php");

   include 'konekcija.php';

    if(isset($_POST['potvrdisliku']))
    {
        $alt = $_POST['naziv'];
        $slika = $_FILES['fajl'];
      

        $name = $slika['name'];
        $tmp_name = $slika['tmp_name'];
        $type = $slika['type'];
        $size = $slika['size'];
        $error = $slika['error'];

        echo $type;

        $regNaslov = "/^[\w\s\"\-\.]+$/";
        
        
        $greske = [];

        if(!preg_match($regNaslov, $alt))
        {
            $greske[] = "Alt nije u dobrom formatu!";
        }
        

        $velicina = 4.5 * 1024 * 1024;
        if($size > $velicina)
        {
            $greske[] = "Velicina slike ne moze biti veca od 4.5 MB!";
        }
        if($type != "image/jpg" && $type != "image/jpeg" && $type != "image/png")
        {
            $greske[] = "Format mora biti jpg, jpeg ili png!";
        }

        $type=explode("/", $type)[1];

        $imeSlike = explode(".", $name)[0];

        if($imeSlike == "slika")
        {
            $greske[] = "Naziv slike ne moze biti slika!";
        }

       

        if(count($greske))
        {
            var_dump($greske);
        }
        else
        {
            

            $name = time() . $name;
            $novaLokacija = "../slike/$name";
            move_uploaded_file($tmp_name, $novaLokacija);
              
            $putanjaUOdnosuNaAdminPhp = "slike/$name";
            echo $putanjaUOdnosuNaAdminPhp;
            
            $upit = "INSERT INTO slajder VALUES(null, :slika ,:naslov)";
            $rez = $konekcija->prepare($upit);
            $rez->bindParam(':naslov', $alt);
            
            $rez->bindParam(':slika', $putanjaUOdnosuNaAdminPhp);
            
            

            try
            {
                $rez->execute();
               
                
            }
            catch(PDOException $e)
            {
                echo "Greska! " . $e->getMessage();
            }
            
        }
        
    }

?>