<?php 
@session_start();

if(isset($_GET['id'])):

	$id = $_GET['id'];

include "php/funkcije.php";
include "php/konekcija.php";
include "login.php";
include "views/head.php";
include "views/logo.php";
if(!isset($_SESSION['korisnik'])){

	include "views/logovanje.php";
	
}
include "views/meni.php";
	
	

include "php/konekcija.php";


?>
<div id="centar" >
<?php 
$upit_priprema =$konekcija->prepare("SELECT * FROM pesme p inner JOIN korisnicisajta k on p.idKorisnik = k.idKorisnik WHERE idPesme = :id"); 
		$upit_priprema->execute(array(":id"=>$id)); // Izvrsavanje upita sa konkretnim parametrom
		$generisiPesme = $upit_priprema->fetch(); // Dohvatanje samo jednog reda kao rezultat
 
 if(isset($generisiPesme)):?>


     <div class="post">
       <img src="<?=$generisiPesme->slikaPesme?>" alt="<?=$generisiPesme->altPesme;?>"/>
        <h4><?= $generisiPesme->naziv; ?></h4>
        <?php  $x=explode(PHP_EOL, $generisiPesme->sadrzaj); 
		       
        foreach($x as $y):?>
        <p><?= $y; ?> </p>
        <?php endforeach; ?>
       <!-- <p>Datum objave: <?=$datumVreme = $generisiPesme->datumPostavljanja;
         
          ?></p>-->
        <h5> Autor posta je <?=$generisiPesme->nadimak?> </h5>
        <!-- Ovde treba da ide komentar ako je korisnik logovan -->
        <?php
if(isset($_SESSION['korisnik'])):
  $komentarPriprema=$konekcija->prepare("SELECT * FROM  korisnicisajta k   INNER JOIN komentar ko  ON ko.idKorisnik = k.idKorisnik WHERE ko.idPesme = :id");
  $komentarPriprema->execute(array(":id"=>$id));
  $generisiKomentare=$komentarPriprema->fetchAll();
      
        ?>
        <div id="komentari">
          <?php foreach($generisiKomentare as $komentar): ?>
          <p> <?=$komentar->textKomentara ?></p>
          <!--Zastpi izbacuje micika xD Da li treba da generisem novi upit sa prosledjivanjem id-a korisnika za nadimak?-->
          <h5> Autor komentara je <?=$komentar->nadimak?> </h5>
          
                  <?php endforeach; ?>
        </div>
        <div id="formakomentar">
        <form >
        <input type="hidden" value="<?=$id?>" name="skriveniId" id="skriveniId"/>
        <textarea name="tbkomentar" id="tbkomentar" rows="5" cols="30" placeholder="Unesite komentar" > </textarea>
       <!--<input type="text" id="tbkomentar" name="tbkomentar" value="unesite komentar" /> </br>-->
       <input type="button" id="potvrdi" name="potvrdi" value="Potvrdi komentar"/>
        </form>
          </div>
    </div>
 
    <?php 
    endif;
 endif;
?>

</div>
<script type="text/javascript" src="javascript/komentari.js"></script> 
</div>

<?php 
	include "views/futer.php";
	endif;
?>