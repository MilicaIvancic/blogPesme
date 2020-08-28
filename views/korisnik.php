<?php
@ob_start();
@session_start();
include "php/konekcija.php";
if(isset($_SESSION['korisnik'])):
$idKorisnik=$_SESSION['korisnik']->idKorisnik;
//var_dump($idKorisnik);
  $korisnikPriprema=$konekcija->prepare("SELECT * FROM  korisnicisajta where idKorisnik = :id");
  $korisnikPriprema->execute(array(":id"=>$idKorisnik));
  $korisnik=$korisnikPriprema->fetch();
  //var_dump($korisnikPriprema);
  //var_dump($korisnik);
?>
<div class="centak_koda">
  <div id="kor">
<h1> <?=$korisnik->ime ?> <?=$korisnik->prezime ?> </h1>
<h2> <?=$korisnik->nadimak ?> </h3>
</div>
<div class="post2">
  <a href="index.php?page=dodajpesmu"> <p> Unesite pesmu </p> </a>
<h3> Pesme koje je korisnik postavio </h3>

<?php 
$korisnikKomentarPriprema=$konekcija->prepare("SELECT * FROM  pesme where idKorisnik = :id");
$korisnikKomentarPriprema->execute(array(":id"=>$idKorisnik));
$komentar=$korisnikKomentarPriprema->fetchAll();
//var_dump($korisnikKomentarPriprema);
//var_dump($komentar);

if(count($komentar)!=0):
foreach($komentar as $k):?>
<div class="post1">
 <h4> <?= $k->naziv?> </h3>
 <?php $x=explode("\n", $k->sadrzaj);
  foreach($x as $y):?>
 <p> <?= $y?> </p> 

<?php endforeach; ?>
<a href="php/obrisiPesmu.php" data-id="<?=$k->idPesme?>" class="delpesmu" name="obrisi" id="obr"> <p> Obrisite pesmu  </p> </a>
</div>
<?php endforeach; ?>
</div>
<?php else: ?>
<h1> Niste uneli ni jednu pesmu. Klikom na link unesite pesmu.  </h1>

<?php endif; ?> 
</div> </div>
<script type="text/javascript" src="javascript/obrisiKorisnika.js"></script>
<?php else: ?>
<h1> BOOOM! :D Nećeš uspetida uđeš na ovu stranicu ako nisi ulogovan! </h1>
<?php endif;  ?>
