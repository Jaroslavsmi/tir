<?php
	include '../../assets/hlavicka.php';
 ?>
 <section class="container">
		<?php
		foreach (glob('*',GLOB_ONLYDIR) as $menoAdresara)
			$menuGaleria[basename($menoAdresara)] = file_get_contents($menoAdresara . '/' . basename($menoAdresara) . '.txt');

			reset($menuGaleria);
			if(!isset($_GET['galeria']))
				$galeria = key($menuGaleria);
			else
				$galeria = $_GET['galeria'];
		?>

		<div class="row pt-5">
			<div class="col-2">
				<nav class="nav flex-column nav-pills nav-fill">
					<?php
					foreach ($menuGaleria as $adresar => $nazov)
							echo '<a class="nav-link ' .($adresar==$galeria?"active":"").'" href="?galeria='.$adresar.'">' .$nazov.'</a>';
					?>
				</nav>
			</div>
		<div class="col-10">
			<?php
				$nadpis = file_get_contents($galeria.'/header.txt');
				$popis = file_get_contents($galeria.'/description.txt');
				$foto = $galeria.'/thumb.jpg';
			?>

			<h2 class="py-3 text-center"><?php echo $nadpis; ?></h2>
			<div class="d-flex">
				<img src=" <?php echo $foto ?>" alt="" width="200">
				<div class="px-3"><?php echo $popis; ?>	</div>
			</div>
			<hr>
			<?php
				foreach (glob($galeria.'/*_zmensena.jpg') as $fotka)
					echo '<img class="p-3" src="'.$fotka.' " alt="" width="300">';
			 ?>
			</div>
		</div>

	</section>
	<?php
	include '../../assets/paticka.php'
 ?>