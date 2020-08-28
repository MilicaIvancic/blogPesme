<?php
include("konekcija.php");
if(isset($_POST['iddel']))
    {
        $obrisi = $_POST['iddel'];
        
      $upit="SELECT * FROM komentar where idKorisnik= :id";
      $rez=$konekcija->prepare($upit);
      $rez->bindParam(':id', $obrisi);
      $rez->execute();
      //var_dump($rez);
      $rez->fetchAll();

      if($rez->rowCount()>0){
          $upit2="DELETE FROM komentar where idKorisnik= :id";
          $rez2=$konekcija->prepare($upit2);
          $rez2->bindParam(':id', $obrisi);
          $rez2->execute();
      }

      $upit3="SELECT * FROM pesme where idKorisnik= :id";
      $rez3=$konekcija->prepare($upit3);
      $rez3->bindParam(':id', $obrisi);
      $rez3->execute();
      $rez3->fetchAll();
      if($rez3->rowCount()>0){
          $upit4="DELETE FROM pesme where idKorisnik= :id";
          $rez4=$konekcija->prepare($upit4);
          $rez4->bindParam(':id', $obrisi);
          $rez4->execute();
      }
      $upit5="SELECT * FROM anketa_korisnik where id_korisnik= :id";
      $rez5=$konekcija->prepare($upit5);
      $rez5->bindParam(':id', $obrisi);
      $rez5->execute();
      $rez5->fetchAll();
      if($rez5->rowCount()>0){
          $upit6="DELETE FROM anketa_korisnik where id_korisnik= :id";
          $rez6=$konekcija->prepare($upit6);
          $rez6->bindParam(':id', $obrisi);
          $rez6->execute();
      }
      $upit7="DELETE FROM korisnicisajta where idKorisnik= :id";
      $rez7=$konekcija->prepare($upit7);
      $rez7->bindParam(':id', $obrisi);
      $rez7->execute();



      
    }