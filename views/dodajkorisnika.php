<div id="registrujse">
<?php include "php/konekcija.php"; ?>
	   <table> 
	    <form id="mojn1" name="forma2" action="<?= $_SERVER['PHP_SELF']; ?>" method='POST'> 
	     <tr>
		  <td> Ime: </td> </tr> 
		  <tr>  <td> <input class="polje3"  type="text"  id="tbime1" name="tbime1"  /> </td> </tr>
          <tr> <td> <span id="ime1"> Ime mora početi velikim slovom i mora imati minimum 3 karaktera. </span> </td> </tr>
		  <tr> 
		  <td> Prezime: </td> </tr> 
		  <tr>  <td> <input class="polje3" type="text"   id="tbprezime1" name="tbprezime1" /> </td> </tr>
          <tr> <td> <span id="prezime1">Prezime mora početi velikim slovom i mora imati minimum 3 karaktera. </span> </td> </tr>
		  <tr>
          <tr>
		  <td> Nadimak: </td> </tr> 
		  <tr>  <td> <input class="polje3"  type="text"  id="tbnadimak1" name="tbnadimak1"  /> </td> </tr>
          <tr> <td> <span id="nadimak1">Nadimak mora početi velikim slovom,može sadržati samo slova, ne može postojati razmak. </span> </td> </tr>
		  <td> Lozinka: </td> </tr> 
		  <tr>  <td> <input class="polje3" type="password"  id="tbpassword1" name="tbpassword1"/> </td> </tr>
          <tr> <td> <span id="password1">  Lozinka može imati minimum 8 karaktera, a maximum 20.</span> </td> </tr>
		 <tr> 
		  <td> e-mail: </td> </tr> 
		  <tr> <td> <input class="polje3" type="email"  id="tbmail1" name="tbmail1"/> </td> </tr>
          <tr> <td> <span id="email1"> E-mail mora biti jedinstven, neko je već napravio nalog sa ovim e-mail-om. </span> </td> </tr>
	   <tr>
		  <td> Pol: </td> </tr> 
		  <tr>  <td> <input class="radio_polja" type="radio" name="radio3" value="Muški" /> Muški
		  <input type="radio" class="radio_polja" name="radio3" value="Ženski" /> Ženski  
		  <input type="radio" class="radio_polja" name="radio3" value="Drugo" /> Drugo </td> </tr>
          <tr> <td> <span id="pol3"> Morate odabrati pol. </span> </td> </tr>
          
          <td> Aktivan: </td> </tr> 
		  <tr>  <td> <input class="radio_aktivan" type="radio" name="radio2" value="1" /> Aktivan
		  <input type="radio" class="radio_aktivan" name="radio2" value="0" /> Neaktivan  </td> </tr> 
		  
          <tr> <td> <span id="pol2"> Morate odabrati status </span> </td> </tr>

		         <tr>
		  <td> Uloga: </td> </tr> 
		  <tr>  <td> <select id="uloga" name="uloga">
                     <option value="0"> Izaberite </option>
                      <?php 
                          $upit="SELECT * FROM status";
                          $rez=$konekcija->query($upit)->fetchAll();
                           foreach($rez as $r):?>
                            <option value="<?=$r->idStatus?>"> <?=$r->naziv?> </option>
                             <?php endforeach;?>
          </select>
           </td> </tr>

          <!--<td> idStatus: </td> </tr> 
		  <tr>  <td> <input class="radio_status" type="radio" name="radio4" value="1" /> Korisnik
		  <input type="radio" class="radio_status" name="radio4" value="2" /> Administrator  </td> </tr> -->
		  
          <tr> <td> <span id="pol4"> Morate odabrati ulogu </span> </td> </tr>

         
          

		  <tr> <td> <span id="ispisigreske"> Podaci nisu validni. </span> </td> </tr>
		  
		 
		
		<tr> <td> <input type="button" value="Uloguj se" size="20" id="btnpotvrdi1" name="btnpotvrdi1" /> </td> </tr>
	   
	   </form>
	   </table>
	   <div id="ispis1"> </div>
       </div>
       <script type="text/javascript" src="javascript/rkorisnici.js"></script>