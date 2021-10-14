<!DOCTYPE html>
<html lang="sk">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="shortcut icon" href="../ikona.png" type="image/x-icon">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
	  <a class="navbar-brand" href="#">SSTV Tvrdošín Administrátor</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav ml-auto">


	    <?php
	    	$menu = [];

	    	//$stranka = basename($_SERVER['SCRIPT_NAME'],".php");
	    	$stranka = basename(dirname($_SERVER['SCRIPT_NAME']));

	    	$riadkySuboru = file('../../assets/menu.txt',FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
	    	foreach($riadkySuboru as $riadok){
	    		list($k,$h) = explode(':', $riadok);
	    		$menu[$k] = $h;
	    	}
			foreach($menu as $link => $hodnota) {
	      		echo '
	      		<li class="nav-item">
	        		<a class=" nav-link '.($link == $stranka?"active": "").'" href="../'. $link.'">' .$hodnota.'</a>
	      		</li>';
	      	}
	      ?>

	      	</ul>
	  </div>
	</nav>
</body>