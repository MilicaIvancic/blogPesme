<div class="sredina" >
    <a href="dokumentacija.pdf" id="dokumentacijsa"> Dokumentacija :( </a>
  <h1> Tri najnovije pesme </h1>
	<?php 
	 $generisiPesme = selectFunkcija("SELECT  * FROM pesme p inner JOIN korisnicisajta k on p.idKorisnik = k.idKorisnik ORDER BY datumPostavljanja DESC LIMIT 3");
		//var_dump($generisiPesme);
		
	foreach($generisiPesme as $post):?>
		 <div class="post">
		   <img src="<?=$post->slikaPesme?>" alt="<?=$post->altPesme;?>"/>
			<h4><?= $post->naziv; ?></h4>
			<?php  $x=explode("\n", $post->sadrzaj); 
			//var_dump($x);
			for($i=0; $i>5; $i++):?>
			<p> <?php global $x;  echo $x[$i]; ?> </p>
		<?php endfor; ?>
		<p> <?php global $x;  echo $x[0]; ?> </p>
		<p> <?php global $x;  echo $x[1]; ?> </p>
		<p> <?php global $x;  echo $x[2]; ?> </p>
		<p> <?php global $x;  echo $x[3]; ?> ...</p>
			
			
			<!-- NE ZNAM ZASTO NECE DA RADI FOR PETLJA-->
			
			
           <!-- <p>Datum objave: <?=$datumVreme = $post->datumPostavljanja;
			 
			  ?></p>-->
			  
			<a href="post.php?id=<?= $post->idPesme?>">Pročitaj više</a>
			<h5> Autor posta: <?=$post->nadimak?> </h5>
			
		</div>
 	
        <?php 
	 endforeach;
	
    ?>
</div>