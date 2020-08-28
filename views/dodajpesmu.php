
<div id="registrujse">
<h1> Unesite pesmu </h1>
<?php include "php/konekcija.php" ?>
	   <table> 
	    <form id="mojn1" action="php/dodajpesmu.php" method="post" enctype='multipart/form-data'> 
	   
		  <tr> 
		  <td> Naziv pesme: </td> </tr> 
		  <tr>  <td> <input class="polje3" type="text"   id="naziv" name="naziv" /> </td> </tr>
         <!-- <tr> <td> <span id="spannaziv">Naziv nije okej </span> </td> </tr>-->
          <td> Unesite sliku  </td> </tr> 

      <tr>  <td> <input type="file" id="fajls" name="fajls"> </td> </tr>
     <!-- <tr> <td> <span id="spanslika">Slika nije okej  </span> </td> </tr>-->
      
          <tr> 
		  <td> Text pesme:
            Molim unesite makar 4 reda pesme!  </td> </tr> 
		  <tr>  <td> <textarea name="pesma" id="pesma" rows="5" cols="30" placeholder="Unesite pesmu" ></textarea> </td> </tr>
         <!-- <tr> <td> <span id="spanpesma">Pesma nije okej  </span> </td> </tr>-->
<?php if($_SESSION['korisnik']->idStatus=="2"):?>
          <tr>
		  <td> Ime korisnika koji komentarise: </td> </tr> 
		  <tr>  <td> <select id="korisnik" name="korisnikpotvrda">
                     <option value="0"> Izaberite </option>
                      <?php 
                          $upit="SELECT * FROM korisnicisajta";
                          $rez=$konekcija->query($upit)->fetchAll();
                           foreach($rez as $r):?>
                            <option value="<?=$r->idKorisnik?>"> <?=$r->ime." ".$r->prezime?> </option>
                             <?php endforeach;?>
          </select>
           </td> </tr>
<?php endif; ?>
           <!--<tr> <td> <span id="spankorisnik">Korisnik mora biti odabran  </span> </td> </tr>
         

		  <tr> <td> <span id="ispisigreske"> Podaci nisu validni. </span> </td> </tr>-->
		  
		 
		
		<tr> <td> <input type="submit" value="Unesi ulogu" size="20" id="potvrdipesmu" name="potvrdipesmu" /> </td> </tr>
	   
	   </form>
	   </table>
	   <div id="ispis1"> </div>
       </div>
       <!--<script type="text/javascript" src="javascript/dodajpesmu.js"></script>-->