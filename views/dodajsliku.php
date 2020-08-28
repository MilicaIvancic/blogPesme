<div id="registrujse">
<h1> Unesite Sliku </h1>
<?php include "php/konekcija.php" ?>
	   <table> 
	    <form id="mojn1" action="php/dodajsliku.php" method="post" enctype='multipart/form-data' > 
	   
		  <tr> 
		  <td> Unesite alt: </td> </tr> 
		  <tr>  <td> <input class="polje3" type="text"   id="naziv" name="naziv" /> </td> </tr>
           
          <tr> 
		  <td> Unesite sliku  </td> </tr> 
		  <tr>  <td> <input type="file" id="fajl" name="fajl"> </td> </tr>
          

    
		  
		 
		
		<tr> <td> <input type="submit" value="Unesi ulogu" size="20" id="potvrdisliku" name="potvrdisliku" /> </td> </tr>
	   
	   </form>
	   </table>
	   <div id="ispis1"> </div>
       </div>
      