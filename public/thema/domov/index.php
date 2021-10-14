<?php
	include '../../assets/hlavicka.php'

 ?>
 <section class="container">
 	<h2 class="py-3 text-center">Aktuality z domova</h2>
 	<?php
 		 	$clanky = file('clanky.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

 		foreach ($clanky as $clanok) {
 			list($nadpis, $obrazok, $text) = explode('::', $clanok);

 	 ?>
 	 <div>
 	 	<h5 class="pb-3"><?php echo $nadpis ?></h5>
 	 	<img src="images/<?php echo $obrazok ?>" alt=""><br><br>
 	 	<div><?php echo $text ?></div>
 	 </div><br>
 	 <?php
 	  }
 	  ?>
 </section>


<?php
	include '../../assets/paticka.php'
 ?>



