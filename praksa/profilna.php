<?php
	session_start();
	require 'biblioteka/konekcija.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Update</title>
	<link rel="stylesheet" type="text/css" href="biblioteka/style.css">
</head>
<body>
	<?php 
		$ime = $_SESSION['k_ime'];
		$prezime = $_SESSION['k_prezime'];
		
		echo '<h1 class="naslovreg">Izmena Podataka</h1>
	    <form class="divprijavi" action="biblioteka/izmena.php" method="post">
	    	<p class="tekst">Unesite ime: </p>
	    	<input type="text" name="ime" value="'.$ime.'">
	    	<p class="tekst">Unesite prezme: </p>
	    	<input type="text" name="prezime" value="'.$prezime.'">
	    	<br><br>
	    	<input type="submit" value="Potvrdi">
	    </form>'
	    

	?>
</body>
</html>