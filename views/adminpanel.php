<?php 
@ob_start();
@session_start();

if(isset($_SESSION['korisnik'])):
    //var_dump($_SESSION['korisnik']->naziv);
    if($_SESSION['korisnik']->naziv == "administrator"):?>
    <div class="centak_koda">
    <h1> Administratorska stranica! </h1>

    <?php 
    $upitKorisnici = selectFunkcija("SELECT * FROM korisnicisajta ");
    $upitMeni = selectFunkcija("SELECT * FROM meni ");
    $upitStatus = selectFunkcija("SELECT * FROM status ");
    $upitKomentar = selectFunkcija("SELECT * FROM komentar ");
    $upitSlajder = selectFunkcija("SELECT * FROM slajder ");
    $upitPesma = selectFunkcija("SELECT * FROM pesme ");
  //var_dump($upitKorisnici[1]);?>
  <h1>tabela korisniciSajta </h1>
  <table id="tabelkorisnici">
  <tr> <th> idKorisnik</th>  <th> ime </th> <th> prezime </th> 
        <th>nadimak </thh> <th>e-mail</th>  
        <th> idStatus</th> <th> aktivan</th> <th>pol </th> <th> aktivacioni kod </th> 
        <th>  izmeni  </th>  <th>   obrisi  </th> <th>  dodaj  </th></tr>
    <?php foreach($upitKorisnici as $j):?>
    
        <tr> <td><?= $j->idKorisnik?> </td> <td> <?= $j->ime?> </td> <td> <?= $j->prezime?> </td> 
        <td><?= $j->nadimak?> </td> <td><?= $j->email?></td>  
        <td> <?= $j->idStatus?></td> <td><?= $j->aktivan?></td> <td> <?= $j->pol?> </td> <td> <?= $j->aktivacioniKod?> </td> 
        <td>  <form action="index.php?page=izmeniKorisnika" method="post">

    <input type="hidden" name="id" value="<?=$j->idKorisnik?>"/>
     <input type="submit" name="kurcina"   value ="izmeni"/>    
    
</form>
    </td>  <td> <a href="php/obrisiKorisnika.php" data-id="<?=$j->idKorisnik?>" class="del" name="obrisi"> obrisi </a> </td> <td> <a href="index.php?page=dodajkorisnika"> dodaj </a> </td> </tr>
<?php endforeach; ?>
</table>
<!--pocinje druga tabela -->
<h1>tabela meni </h1>

  <table class="tabelameni">
  <tr> <th> idMeni</th>  <th> href </th> <th> naziv </th> <th> izmeni </th> <th> obrisi </th> <th>  dodaj  </th>
</tr>
    <?php foreach($upitMeni as $j):?>
    
        <tr>  <td> <?= $j->idMeni?></td>  <td> <?= $j->href?> </td> <td> <?= $j->naziv?> </td> <td> <form action="index.php?page=izmenimeni" method="post">

<input type="hidden" name="id" value="<?=$j->idMeni?>"/>
 <input type="submit" name="pickica"   value ="izmeni"/>    

</form> </td> <td> <a href="php/obrisiStatus.php" data-id="<?=$j->idMeni?>" class="delmeni" name="obrisi"> obrisi </a> </td> <td> <a href="index.php?page=unosmeni"> dodaj </a> </td></tr>
<?php endforeach; ?>
</table>

<!--pocinje druga tabela -->
<h1>tabela status </h1>

  <table class="tabelameni">
  <tr> <th> idStatus</th>  <th> naziv </th> <th> izmeni </th> <th> obrisi </th> <th>   dodaj  </th>
</tr>
    <?php foreach($upitStatus as $j):?>
    
        <tr>  <td> <?= $j->idStatus?></td>  <td> <?= $j->naziv?> </td> <td> <a href="#"> izmeni </a> </td> <td> <a href="php/obrisiStatus.php" data-id="<?=$j->idStatus?>" class="delstatus" name="obrisi" > obrisi 
    </a> </td> <td> <a href="index.php?page=dodajulogu"> dodaj </a> </td></tr>
<?php endforeach; ?>
</table>



<!--pocinje druga tabela -->
<h1>tabela slajder </h1>

  <table class="tabelameni">
  <tr> <th> idSlika</th>  <th> src (putanja slike)	 </th> <th> izmeni </th> <th> alt </th><th> obrisi </th> <th>   dodaj  </th>
</tr>
    <?php foreach($upitSlajder as $j):?>
    
        <tr>  <td> <?= $j->idSlika	?></td>  <td> <?= $j->src?> </td> <td> <?= $j->alt?> </td> <td> <a href="#"> izmeni </a> </td> <td> <a href="php/obrisiSliku.php" data-id="<?=$j->idSlika?>" class="delsliku" name="obrisi"> obrisi </a> </td> <td> <a href="index.php?page=dodajsliku"> dodaj </a> </td></tr>
<?php endforeach; ?>
</table>

<!--pocinje druga tabela -->
<h1>tabela komentar </h1>

  <table class="tabelameni">
  <tr> <th> idKomentar</th>  <th> idKorisnik	 </th>  <th> idPesme</th><th> datumPostavljanja</th> <th> textKomentara </th> <th> izmeni </th> <th> obrisi </th> <th>   dodaj  </th>
</tr>
    <?php foreach($upitKomentar as $j):?>
    
        <tr>  <td> <?= $j->idKomentar	?></td> <td> <?= $j->idKorisnik	?></td> <td> <?= $j->idPesme	?></td>  <td> <?= $j->datumPostavljanja?> </td> <td> <?= $j->textKomentara?> </td> <td> <a href="#"> izmeni </a> </td> <td> <a href="php/obrisiKomentar.php" data-id="<?=$j->idKomentar?>" class="delkomentar" name="obrisi"> obrisi </a> </td> <td> <a href="index.php?page=dodajkomentar"> dodaj </a> </td></tr>
<?php endforeach; ?>

</table>

<!--pocinje druga tabela -->
<h1>tabela pesme </h1>
  <table class="tabelameni" >
  <tr> <th> idPesme</th>  <th> naziv </th> <th> sadrzaj </th> 
        <th>idKorisnik </thh> <th>slikaPesme</th> <th>altPesme</th> 
        <th> datumPostavljanja</th>  
        <th>  izmeni  </th>  <th>   obrisi  </th> <th>  dodaj  </th></tr>
    <?php foreach($upitPesma as $j):?>
    
        <tr> <td><?= $j->idPesme?> </td> <td> <?= $j->naziv?> </td> <td> <?= $j->sadrzaj?> </td> 
        <td><?= $j->idKorisnik?> </td> <td><?= $j->slikaPesme?></td> <td><?= $j->altPesme?></td> 
        <td> <?= $j->datumPostavljanja?></td> 
        <td> <a href="#"> izmeni </a> </td>  <td> <a href="php/obrisiPesmu.php" data-id="<?=$j->idPesme?>" class="delpesmu" name="obrisi"> obrisi </a> </td> <td> <a href="index.php?page=dodajpesmu"> dodaj </a> </td> </tr>
<?php endforeach; ?>
</table>
<script type="text/javascript" src="javascript/zebra.js"></script>
<script type="text/javascript" src="javascript/obrisiKorisnika.js"></script>
    </div>
    
    <?php  else: 
    http_response_code(403);?>
    <h1> Nemate pravo pristupa ovoj stranici </h1>
    <?php endif; else:  http_response_code(403);?>
    <h1> Nemate pravo pristupa ovoj stranici </h1>
    <?php endif; ?>
