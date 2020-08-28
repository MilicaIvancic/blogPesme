<div id="registrujse">
<h1> Unesite komentar </h1>
<?php include "php/konekcija.php" ?>
	   <table> 
	    <form id="mojn1" > 
	   
		  <tr> 
		  <td> Text komentara: </td> </tr> 
		  <tr>  <td> <input class="polje3" type="text"   id="naziv" name="naziv" /> </td> </tr>
          <tr> <td> <span id="spannaziv">Naziv nije okej </span> </td> </tr>
          <tr> 
          <tr>
		  <td> Ime korisnika koji komentarise: </td> </tr> 
		  <tr>  <td> <select id="korisnik" name="korisnik">
                     <option value="0"> Izaberite </option>
                      <?php 
                          $upit="SELECT * FROM korisnicisajta";
                          $rez=$konekcija->query($upit)->fetchAll();
                           foreach($rez as $r):?>
                            <option value="<?=$r->idKorisnik?>"> <?=$r->ime." ".$r->prezime?> </option>
                             <?php endforeach;?>
          </select>
           </td> </tr>
          <tr> <td> <span id="spankorisnik">Morate odabrati korisnika </span> </td> </tr>
          <tr>
		  <td> Naziv pesme koji komentarise: </td> </tr> 
		  <tr>  <td> <select id="pesma" name="pesma">
                     <option value="0"> Izaberite </option>
                      <?php 
                          $upit1="SELECT * FROM pesme";
                          $rez1=$konekcija->query($upit1)->fetchAll();
                           foreach($rez1 as $r1):?>
                            <option value="<?=$r1->idPesme?>"> <?=$r1->naziv?> </option>
                             <?php endforeach;?>
          </select>
           </td> </tr>
          <tr> <td> <span id="spanpesma">Morate odabrati pesmu </span> </td> </tr>

		  <tr> <td> <span id="ispisigreske"> Podaci nisu validni. </span> </td> </tr>
		  
		 
		
		<tr> <td> <input type="button" value="Unesi ulogu" size="20" id="potvrdikomentar" name="potvrdikomentar" /> </td> </tr>
	   
	   </form>
	   </table>
	   <div id="ispis1"> </div>
       </div>
       <script type="text/javascript" src="javascript/dodajkomentar.js"></script>