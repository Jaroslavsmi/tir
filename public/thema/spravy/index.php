<?php
	date_default_timezone_set("Europe/Bratislava");
	include '../../assets/hlavicka.php';

 ?>
 	<section class="container">
	 	<h2 class="py-3 text-center">Správy zo sveta</h2>
	 	<h6 class="text-center pt-0"><?php echo date('d. n. Y. H:i') ?></h6>
	 	<?php
			$clankyNazvySuborov = glob('*.txt');
	 		$mesiace = array("január", "február", "marec", "apríl", "máj", "jún", "júl", "august", "september", "október", "december");

	 		foreach ($clankyNazvySuborov as $subor) {
	 			$clanok = file($subor, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
	 			$datum = strtotime(basename($subor, ".txt"));
	 			$datumTxt = date('j. ', $datum) .$mesiace[date('n',$datum) - 1]. date(' Y H:m', $datum);
	 	 ?>
	 	 <div>

	 	 	<br><h5><?php echo $clanok[0] ?></h5>
	 	 	<small>Publikované: <?php echo $datumTxt ?></small><br><br>
	 	 	<img src="images/<?php echo $clanok[1] ?>" alt="" width=150><br><br>
	 	 	<?php
	 	 		for($i=2; $i < count($clanok); $i++){
	 	 			echo '<p>' . $clanok[$i]. '</p>';
	 	 		}
	 	 	 ?>
	 	 	 <hr>
	 	 </div>
	 	 <?php
	 	  }
	 	   ?>
	 	</section>
<?php
	include '../../assets/paticka.php'
 ?>


