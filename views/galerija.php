<?php include "php/konekcija.php";
      
      $generisiGaleriju = selectFunkcija("SELECT * FROM slajder ");

 ?>
<div class="ispis">     

					<div class="okvirSlike">
                    <?php foreach($generisiGaleriju as $slika):
                        $x=0; $x++; if(!$x/3==0):
                        ?>
                           
						<div class="slika"><a href="<?=$slika->src?>"><img src="<?=$slika->src?>" alt="<?=$slika->src?>"/></a></div>
						
                        <?php else: ?>
						<div class="slika"><a href="<?=$slika->src?>"><img src="<?=$slika->src?>" alt="<?=$slika->src?>"/></a></div>
						<div class="cleaner"></div> <div class="okvirSlike">
					
                        <?php endif; endforeach; ?>
					
                    </div>
                    
                </div>
                <script type="text/javascript" src="../php1sajt/javascript/jquery.vanillabox.js"></script>
                <script type="text/javascript" src="../php1sajt/javascript/galerija.js"></script>