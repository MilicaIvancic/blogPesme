<div id="registrujse">
<?php 
//var_dump($_POST['idupdate']);

if(isset($_POST['pickica'])){
    
        $izmeni = $_POST['id'];
        var_dump($izmeni);
}

$upit = "SELECT * FROM meni WHERE idMeni = :izmeni";
$rez = $konekcija-> prepare($upit);
$rez -> bindParam(":izmeni",$izmeni);
$rez -> execute();
$rezultat = $rez -> fetch();
//var_dump($rez);
//var_dump($rezultat);
?>
	   <table> 
        <form id="mojn1" name="forma2" action="php/izmenimeni.php" method='POST'> 
        <input type="hidden" name="skriveno" id="skriveno" value="<?=$izmeni?>" >  
	     <tr>
		  <td> Href: </td> </tr> 
		  <tr>  <td> <input class="polje3"  type="text"  id="href" name="tbime1" value="<?=$rezultat->href?>" /> </td> </tr>
          <tr> <td> <span id="ime1"> Ime mora početi velikim slovom i mora imati minimum 3 karaktera. </span> </td> </tr>
		  <tr> 
		  <td>Naziv: </td> </tr> 
		  <tr>  <td> <input class="polje3" type="text"   id="naziv" name="tbprezime1" value="<?=$rezultat->naziv?>" /> </td> </tr>
          <tr> <td> <span id="prezime1">Prezime mora početi velikim slovom i mora imati minimum 3 karaktera. </span> </td> </tr>
		 
		 
		
		<tr> <td> <input type="button" value="Izmenimenimeni" size="20" id="izmenimeni" name="izmenimeni" /> </td> </tr>
	   
	   </form>
	   </table>
</div>
       <script type="text/javascript" src="javascript/izmenimeni.js"></script>
       

