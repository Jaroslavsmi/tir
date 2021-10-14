<?php
	include '../../assets/hlavicka.php';
	//subor captcha, nahodny vyber
      $chyba ="";
      $meno = $sprava = "";
      function kontrola($vstup)
      {
            $vstup = trim($vstup);
            $vstup = htmlspecialchars($vstup);
            $vstup = stripslashes($vstup);

            return $vstup;
      }
      date_default_timezone_set("Europe/Bratislava");
      if($_SERVER['REQUEST_METHOD'] == "POST")
      {

            if ($_POST['odpoved'] == $_POST['spravnaOdpoved'])
            {
                  $suborPrispevky = fopen("prispevky.csv", "a");

                  $novyPrispevok [] = $_GET['pocet'] + 1;
                  $novyPrispevok [] = kontrola($_POST['meno']);
                  $novyPrispevok [] = kontrola($_POST['sprava']);
                  $novyPrispevok []= date('Y-m-d H:i:s', time());

                  fputcsv($suborPrispevky, $novyPrispevok, ';');
                  fclose($suborPrispevky);
            }
            else
                  $chyba .= "Nesprávna odpoveď na otázku";
                  $meno =  kontrola($_POST['meno']);
                  $sprava = kontrola($_POST['sprava']);
      }

   	$suborCaptcha = file('captcha.txt',FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
 			for ($i=0; $i < count($suborCaptcha); $i+=2)
 				$antiSpam[str_replace('odpoved: ','',$suborCaptcha[$i+1])] = str_replace('otazka: ','',$suborCaptcha[$i]);

 			$antiSpamKluc = array_rand($antiSpam);
 			//subor prispevky, zoradene od posledneho
 			$suborPrispevky = fopen("prispevky.csv", "r");
 			while ($prispevok = fgetcsv($suborPrispevky,1000,';'))
 				$prispevky[] =$prispevok;

 			fclose($suborPrispevky);
 			$prispevky = array_reverse($prispevky);

 			$mesiace = array("január", "február", "marec", "apríl", "máj", "jún", "júl", "august", "september", "október", "december");

      if (!empty($chyba))
       {
       ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Opps!!!</strong> <?php  echo $chyba ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php
      }
      ?>
 <section class="container">
      <h2 class="py-3 text-center">Forúm</h2>
      <div class="container">
            <form class="was-validated" action="?pocet=<?php echo count($prispevky)?>" method="post">
                  <div class="form-group">
                        <label for="i1"><b>Meno</b></label>
                        <input type="text" id="i1 " name="meno" class="form-control" placeholder="Zadaj meno" required value="<?php echo $meno ?>">
                        <div class="invalid-feedback">
                              Prosím vyplň túto položku
                        </div>
                  </div>

                  <div class="form-group">
                        <label for="i2"><b>Správa</b></label>
                        <textarea id="i2" name="sprava"  class="form-control" placehoder="text správy "rows="5" required><?php echo $sprava ?></textarea>
                        <div class="invalid-feedback">
                              Prosím vyplň text správy
                        </div>
                  </div>

                  <div class="row d-flex">
                        <div class="form-group col-8 pt-3">
                              <label for="i3"> <small><b>Otázka: </b><?php echo $antiSpam[$antiSpamKluc] ?></small></label>
                              <input type="text" id="i3" name="odpoved" class="form-control" required ppattern="<?php echo $antiSpamKluc ?> ">
                        <div class="invalid-feedback">
                              Prosím vyplň túto položku správnou odpveďou na otázku
                        </div>

                  </div>

                        <div class="col-4 pt-5 align-items-start d-flex justify-content-end">
                              <button type="reset" class="btn btn-outline-dark mx-3">Vymazať</button>
                              <button type="submit" class="btn btn-outline-dark">Odoslať</button>
                        </div>
                  </div>
                  <input type="hidden" name="spravnaOdpoved" value="<?php echo trim($antiSpamKluc) ?>">
            </form>
      </div>
      <hr>


 	<div class="container">
 		<?php foreach ($prispevky as $prispevok ){
 			$datum = strtotime($prispevok[3]);
 			?>
 			<h4 class="pt-4"><?php echo $prispevok[1]?></h4>
 			<small><i>Odoslané: <?php echo date('j.', $datum) . $mesiace[date('n', $datum)-1] . date(' Y H:i', $datum) ?></i></small>
 			<p class="pt-3"><?php echo nl2br($prispevok[2]) ?></p>
 			<br>
 			<?php
 			 }
                   ?>
 	</div>
 </section>

<?php
	include '../../assets/paticka.php'
 ?>