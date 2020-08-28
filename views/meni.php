<?php
@session_start();




# 5 - Prikaz svih korisnika iz baze
			
$generisimeni = selectFunkcija("SELECT * FROM meni ");


?>
<div id="meni">
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
								<?php elseif($link->naziv=="Anketa"):
								if(isset($_SESSION['korisnik'])):
								//var_dump($_SESSION['korisnik']->naziv);
								?>
											
								<li>  <a href="<?= $link->href ?>"> <?= $link->naziv ?> </a> </li>
                                <?php endif;  ?>
							  <?php else: ?>
								<li>  <a href="<?= $link->href ?>"> <?= $link->naziv ?> </a> </li>
								<?php endif; endforeach; ?>
												
					        </ul>  </div>