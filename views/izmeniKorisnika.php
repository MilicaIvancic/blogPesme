<div id="registrujse">
<?php 
//var_dump($_POST['idupdate']);

if(isset($_POST['kurcina'])){
    
        $izmeni = $_POST['id'];
        var_dump($izmeni);
}

$upit = "SELECT * FROM korisnicisajta WHERE idKorisnik = :izmeni";
$rez = $konekcija-> prepare($upit);
$rez -> bindParam(":izmeni",$izmeni);
$rez -> execute();
$rezultat = $rez -> fetch();
//var_dump($rez);
//var_dump($rezultat);
?>
	   <table> 
        <form id="mojn1" name="forma2" action="php/izmeniKorisnika.php" method='POST'> 
        <input type="hidden" name="skriveno" id="skriveno" value="<?=$izmeni?>" >  
	     <tr>
		  <td> Ime: </td> </tr> 
		  <tr>  <td> <input class="polje3"  type="text"  id="tbime1" name="tbime1" value="<?=$rezultat->ime?>" /> </td> </tr>
          <tr> <td> <span id="ime1"> Ime mora početi velikim slovom i mora imati minimum 3 karaktera. </span> </td> </tr>
		  <tr> 
		  <td> Prezime: </td> </tr> 
		  <tr>  <td> <input class="polje3" type="text"   id="tbprezime1" name="tbprezime1" value="<?=$rezultat->prezime?>" /> </td> </tr>
          <tr> <td> <span id="prezime1">Prezime mora početi velikim slovom i mora imati minimum 3 karaktera. </span> </td> </tr>
		  <tr>
          <tr>
		  <td> Nadimak: </td> </tr> 
		  <tr>  <td> <input class="polje3"  type="text"  id="tbnadimak1" name="tbnadimak1" value="<?=$rezultat->nadimak?>" /> </td> </tr>
          <tr> <td> <span id="nadimak1">Nadimak mora početi velikim slovom,može sadržati samo slova, ne može postojati razmak. </span> </td> </tr>
		  <td> Lozinka: </td> </tr> 
		  <tr>  <td> <input class="polje3" type="password"  id="tbpassword1" name="tbpassword1" value="<?=$rezultat->sifra?>"/> </td> </tr>
          <tr> <td> <span id="password1">  Lozinka može imati minimum 8 karaktera, a maximum 20.</span> </td> </tr>
		 <tr> 
		  <td> e-mail: </td> </tr> 
		  <tr> <td> <input class="polje3" type="email"  id="tbmail1" name="tbmail1" value="<?=$rezultat->email?>" /> </td> </tr>
          <tr> <td> <span id="email1"> E-mail mora biti jedinstven, neko je već napravio nalog sa ovim e-mail-om. </span> </td> </tr>
	   <tr>
          <td> Pol: </td> </tr> 
          <?php  if($rezultat->pol=="Muški"):?>
		  <tr>  <td> <input class="radio_polja" type="radio" name="radio3" value="Muški" checked /> Muški
		  <input type="radio" class="radio_polja" name="radio3" value="Ženski" /> Ženski  
		  <input type="radio" class="radio_polja" name="radio3" value="Drugo" /> Drugo </td> </tr>
          <tr> <td> <span id="pol3"> Morate odabrati pol. </span> </td> </tr>
<?php endif;?>
<?php  if($rezultat->pol=="Ženski"):?>
		  <tr>  <td> <input class="radio_polja" type="radio" name="radio3" value="Muški"  /> Muški
		  <input type="radio" class="radio_polja" name="radio3" value="Ženski" checked/> Ženski  
		  <input type="radio" class="radio_polja" name="radio3" value="Drugo" /> Drugo </td> </tr>
          <tr> <td> <span id="pol3"> Morate odabrati pol. </span> </td> </tr>
<?php endif;?>
<?php  if($rezultat->pol=="Drugo"||$rezultat->pol==""):?>
		  <tr>  <td> <input class="radio_polja" type="radio" name="radio3" value="Muški" /> Muški
		  <input type="radio" class="radio_polja" name="radio3" value="Ženski" /> Ženski  
		  <input type="radio" class="radio_polja" name="radio3" value="Drugo" checked /> Drugo </td> </tr>
          <tr> <td> <span id="pol3"> Morate odabrati pol. </span> </td> </tr>
<?php endif;?>
          
          <td> Aktivan: </td> </tr> 
          <?php  if($rezultat->aktivan=="1"):?>
		  <tr>  <td> <input class="radio_aktivan" type="radio" name="radio2" value="1" checked/> Aktivan
		  <input type="radio" class="radio_aktivan" name="radio2" value="0" /> Neaktivan  </td> </tr> 
		  
          <tr> <td> <span id="pol2"> Morate odabrati status </span> </td> </tr>
<?php endif;?>
<?php  if($rezultat->aktivan=="0"):?>
		  <tr>  <td> <input class="radio_aktivan" type="radio" name="radio2" value="1" /> Aktivan
		  <input type="radio" class="radio_aktivan" name="radio2" value="0" checked /> Neaktivan  </td> </tr> 
		  
          <tr> <td> <span id="pol2"> Morate odabrati status </span> </td> </tr>
<?php endif;?>
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
		  
		 
		
		<tr> <td> <input type="button" value="Izmeni" size="20" id="izmeniKorisnika" name="izmeniKorisnika" /> </td> </tr>
	   
	   </form>
	   </table>
	   <div id="ispis1"> </div>
       </div>
       <script type="text/javascript" src="javascript/izmeniKorisnika.js"></script>

