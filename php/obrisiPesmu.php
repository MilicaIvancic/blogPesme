<?php
include("konekcija.php");
if(isset($_POST['iddel']))
    {
        $obrisi = $_POST['iddel'];
        
      $upit="SELECT * FROM komentar where idPesme= :id";
      $rez=$konekcija->prepare($upit);
      $rez->bindParam(':id', $obrisi);
      $rez->execute();
      //var_dump($rez);
      $rez->fetchAll();

      if($rez->rowCount()>0){
          $upit2="DELETE FROM komentar where idPesme= :id";
          $rez2=$konekcija->prepare($upit2);
          $rez2->bindParam(':id', $obrisi);
          $rez2->execute();
      }

      $upit7="DELETE FROM pesme where idPesme= :id";
      $rez7=$konekcija->prepare($upit7);
      $rez7->bindParam(':id', $obrisi);
      $rez7->execute();



      
    }