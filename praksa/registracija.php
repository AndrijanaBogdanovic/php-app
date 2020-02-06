<?php
	session_start();
    require 'biblioteka/konekcija.php';
?>

<!DOCTYPE html>
<head>
    <header>Dobrodosli na e-biblioteku</header>
    <title>Registracija</title>
    <link rel="stylesheet" type="text/css" href="biblioteka/style.css">
</head>
<body>
	  
	<h1 class='naslovreg'>Registracija</h1>
    <form class='divknjige' action="biblioteka/signup.php" method="post">
    	<p class='tekst'>Unesite ime: </p>
    	<input type="text" name="ime">
    	<p class='tekst'>Unesite prezme: </p>
    	<input type="text" name="prezime">
    	<p class='tekst'>Unesite email:</p>
    	<input type="text" name="email">
    	<p class='tekst'>Unesite lozinku:</p>
    	<input type="password" name="lozinka">
    	<p class='tekst'>Potvrdite lozinku:</p>
    	<input type="password" name="lozinka2">
    	<br><br>
    	<input type="submit" value="Potvrdi">
    </form>
?>
</body>
</html>
