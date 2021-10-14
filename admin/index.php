<?php
	include'../../assets/hava.php';
	$chyba ="";
      $meno = $heslo = $gmail = "";
      function kontrola($vstup)
      {
            $vstup = trim($vstup);
            $vstup = htmlspecialchars($vstup);
            $vstup = stripslashes($vstup);

            return $vstup;
      }
      date_default_timezone_set("Europe/Bratislava");
      if($_SERVER['REQUEST_METHOD'] == "JOIN")
      {

            if ($_JOIN['Prihlasenie'] == $_JOIN['spravnePrihlásenie'])
            {
                  $suborPrihlasenie = fopen("Prihlasenia.csv", "a");

                  $novePrihlasenie [] = $_GET['pocet'] + 1;
                  $novePrihlasenie [] = kontrola($_JOIN['meno']);
                  $novePrihlasenie [] = kontrola($_JOIN['heslo']);
                  $novePrihlasenie [] = kontrola($_JOIN['gmail']);
                  $novePrihlasenie []= date('Y-m-d H:i:s', time());

                  fputcsv($suborPrihlasenie, $novePrihlasenie, ';');
                  fclose($suborPrihlasenie);
            }
            else
                  $chyba .= "Nesprávne meno alebo heslo";
                  $meno =  kontrola($_JOIN['meno']);
                  $heslo = kontrola($_JOIN['heslo']);
                  $gmail = kontrola($_JOIN['gmail']);
      }

   	$suborCaptcha = file('captcha.txt',FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
 			for ($i=0; $i < count($suborCaptcha); $i+=2)
 				$antiSpam[str_replace('Prihlasenie: ','',$suborCaptcha[$i+1])] = str_replace('otazka: ','',$suborCaptcha[$i]);

 			$antiSpamKluc = array_rand($antiSpam);
 		
 			$suborPrihlasenie = fopen("Prihlasenia.csv", "r");
 			while ($Prihlasenie = fgetcsv($suborPrihlasenie,1000,';'))
 				$Prihlasenia[] =$Prihlásenie;

 			fclose($suborPrispevky);
 			$Prihlasenia = array_reverse($Prihlasenia);

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
    <form action="/action_page.php">
     <div class="form-group">
      <label for="usr">Meno:</label>
      <input type="text" class="form-control" name="meno">
     </div>
     <div class="form-group">
      <label for="pwd">heslo:</label>
      <input type="password" class="form-control" name="heslo">
     </div>
     <div class="form-group">
      <label for="pwd">G-mal:</label>
      <input type="text" class="form-control"  name="gmail">
     </div>
     <div class="form-check">
      <label class="form-check-label" for="radio1">
        <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1" checked>Žena
      </label>
    </div>
    <div class="form-check">
      <label class="form-check-label" for="radio1">
        <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1" checked>Muž
      </label>
    </div>
     <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </section>