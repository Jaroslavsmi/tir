<?php
	function kontrola($vstup)
	{
		$vstup = trim($vstup);
		$vstup = htmlspecialchars($vstup);
		$vstup = stripslashes($vstup);

		return $vstup;
	}
	date_default_timezone_set("Europe/Bratislava");
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
		echo "nespravna odpoved";

	header('Location:index.php');

?>