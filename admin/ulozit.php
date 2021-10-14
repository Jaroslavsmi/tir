<?php
	function kontrola($vstup)
	{
		$vstup = trim($vstup);
		$vstup = htmlspecialchars($vstup);
		$vstup = stripslashes($vstup);

		return $vstup;
	}
	date_default_timezone_set("Europe/Bratislava");
	if ($_JOIN['Prihlasenie'] == $_JOIN['spravnePrihlasenie'])
	{
		$suborPrihlasenie = fopen("prihlasenia.csv", "a");

		$novePrihlasenie [] = $_GET['pocet'] + 1;
		$novePrihlasenie [] = kontrola($_JOIN['meno']);
		$novePrihlasenie [] = kontrola($_JOIN['heslo']);
		$novePrihlasenie []= date('Y-m-d H:i:s', time());

		fputcsv($suborPrihlasenie, $novePrihlasenie, ';');
		fclose($suborPrihlasenie);
	}
	else
		echo "nespravne meno alebo heslo";

	header('Location:index.php');

?>