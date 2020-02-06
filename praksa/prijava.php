<?php
	session_start();
    require 'biblioteka/konekcija.php';
?>
<!DOCTYPE html>
<head>
    <header>Dobrodosli na e-biblioteku</header>
    <title>Prijava</title>
    <link rel="stylesheet" type="text/css" href="biblioteka/style.css">
</head>
<body>
	  <header>MOJA BIBLIOTEKA</header>
	    <h1 class='naslovreg'>Prijava </h1>
    <form class='divprijavi' action="biblioteka/login.php" method="post">
    	<p class='tekst'>Unesite email:</p>
    	<input type="text" name="email">
    	<p class='tekst'>Unesite lozinku:</p>
    	<input type="password" name="lozinka">
    	<br><br>
    	<input type="submit" value="Potvrdi">
    </form>

   </body>
</html>