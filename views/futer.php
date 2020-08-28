</div>

<?php

include "php/konekcija.php";

# 5 - Prikaz svih korisnika iz baze
			
$generisimeni = selectFunkcija("SELECT * FROM meni ");

?>
<div id="futer"> <div id="fblok1"> 
                        <ul> 

												<?php foreach($generisimeni as $link) :
								if($link->naziv=="Odjavi se"):
								if(isset($_SESSION['korisnik'])):?>
								<li>  <a href="<?= $link->href ?>"> <?= $link->naziv ?> </a> </li>
								<?php endif; 
								elseif($link->naziv=="Admin panel"):
								if(isset($_SESSION['korisnik'])):
								//var_dump($_SESSION['korisnik']->naziv);
								if($_SESSION['korisnik']->naziv == "administrator"):?>
											
								<li>  <a href="<?= $link->href ?>"> <?= $link->naziv ?> </a> </li>
													
											  
								<?php endif; endif;  ?>
								<?php 
                                 elseif($link->naziv=="Moj nalog"):
								if(isset($_SESSION['korisnik'])):
								//var_dump($_SESSION['korisnik']->naziv);
								?>
											
								<li>  <a href="<?= $link->href ?>"> <?= $link->naziv ?> </a> </li>
                                <?php endif;  ?>
							  <?php else: ?>
								<li>  <a href="<?= $link->href ?>"> <?= $link->naziv ?> </a> </li>
								<?php endif; endforeach; ?>
						
					  <li>  Milica Ivančić &copy;  </li> 
					  </ul>   </div>
                <div id="fblok2"> <ul>  <li> <a href="#" >  
					  <img src="slike/facebook.png" alt="Facebook ikonica"/>  </a> </li>  
                      <li> <a href="#" > <img src="slike/twitter.png" alt="Twitter ikonica"/>  </a> </li>
					  <li> <a href="#" > <img src="slike/youtube.png" alt="Youtube ikonica"/> </a> </li>
					  </ul> </div>
   </div>	
   
		 
   <?php 
if(isset($page)):
     if($page=="registrujse"):?>
	<script type="text/javascript" src="javascript/regularniizrazi.js"></script> 
<?php endif; endif; ?>
   		  
                        
  </body>