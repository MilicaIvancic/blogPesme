<div id="registrujse">
	   <table> 
	    <form id="mojn" name="forma2" action="<?= $_SERVER['PHP_SELF']; ?>" method='POST'> 
	     <tr>
		  <td> Ime: </td> </tr> 
		  <tr>  <td> <input class="polje3"  type="text"  id="tbime" name="tbime"  /> </td> </tr>
          <tr> <td> <span id="ime"> Ime mora početi velikim slovom i mora imati minimum 3 karaktera. </span> </td> </tr>
		  <tr> 
		  <td> Prezime: </td> </tr> 
		  <tr>  <td> <input class="polje3" type="text"   id="tbprezime" name="tbprezime" /> </td> </tr>
          <tr> <td> <span id="prezime">Prezime mora početi velikim slovom i mora imati minimum 3 karaktera. </span> </td> </tr>
		  <tr>
          <tr>
		  <td> Nadimak: </td> </tr> 
		  <tr>  <td> <input class="polje3"  type="text"  id="tbnadimak" name="tbnadimak"  /> </td> </tr>
          <tr> <td> <span id="nadimak">Nadimak mora početi velikim slovom,može sadržati samo slova, ne može postojati razmak. </span> </td> </tr>
		  <td> Lozinka: </td> </tr> 
		  <tr>  <td> <input class="polje3" type="password"  id="tbpassword" name="tbpassword"/> </td> </tr>
          <tr> <td> <span id="password">  Lozinka može imati minimum 8 karaktera, a maximum 20.</span> </td> </tr>
		 <tr> 
		  <td> e-mail: </td> </tr> 
		  <tr> <td> <input class="polje3" type="email"  id="tbmail" name="tbmail"/> </td> </tr>
          <tr> <td> <span id="email"> E-mail mora biti jedinstven, neko je već napravio nalog sa ovim e-mail-om. </span> </td> </tr>
	   <tr>
		  
		  <td> Pol: </td> </tr> 
		  <tr>  <td> <input class="radio_polja" type="radio" name="radio1" value="Muški" /> Muški
		  <input type="radio" class="radio_polja" name="radio1" value="Ženski" /> Ženski  
		  <input type="radio" class="radio_polja" name="radio1" value="Drugo" /> Drugo </td> </tr>
		  <tr> <td> <span id="pol"> Morate odabrati pol. </span> </td> </tr>
		  <tr> <td> <span id="ispisigreske"> Podaci nisu validni. </span> </td> </tr>
		  
		 
		
		<tr> <td> <input type="button" value="Uloguj se" size="20" id="btnpotvrdi" name="btnpotvrdi" /> </td> </tr>
	   
	   </form>
	   </table>
	   <div id="ispis"> </div>
	   </div>
	   