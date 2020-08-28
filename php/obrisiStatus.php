<?php
include("konekcija.php");
if(isset($_POST['iddel']))
    {
        $obrisi = $_POST['iddel'];
        
      
      $upit7="DELETE FROM status where idStatus= :id";
      $rez7=$konekcija->prepare($upit7);
      $rez7->bindParam(':id', $obrisi);
      $rez7->execute();



      
    }