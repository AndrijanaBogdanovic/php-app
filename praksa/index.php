<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Početna</title>
  <link rel="stylesheet" type="text/css" href="biblioteka/style.css">
</head>
<body>
  <header>Dobrodosli na e-biblioteku</header>
  <p id="paragraff">Ukoliko niste clan e-biblioteke, registrujte se i postanite nas clan</p>
  <main>
    <div class="butt">
    <p class='tekst'>Pronađite knjigu:</p>
  <form action="biblioteka/search.php" method="post">
    <input type="text" name='pronadji'>
    <input type="submit" value='potvrdi'>
  </form>
</div>
	<?php 
         require 'biblioteka/konekcija.php';
         $termin="";
         if(isset($_GET['pretraga'])){ 
          $termin=$_GET['pretraga'];
         }
         
         if(isset($_SESSION['k_id'])){
          echo "<br>";
          echo "<a href='profilna.php' class='link'>Izmeni profil</a><br>";
          echo "<a href='biblioteka/logout.php' class='link'>Odjavi se</a>";
          }
          else{
            echo "<br>";
            echo "<a href='prijava.php' class='link' >Prijavi se</a>";
            echo "<a href='registracija.php' class='link'>Registracija</a>";
          }


           $sql = "SELECT knjiga.id, knjiga.slika, knjiga.naziv, zanr.naziv AS 'zanr', izdavac.naziv AS 'izdavac', oblast.naziv AS 'oblast' 
            FROM knjiga
            INNER JOIN zanr ON knjiga.id_zanra=zanr.id
            INNER JOIN izdavac ON knjiga.id_izdavaca=izdavac.id
            INNER JOIN oblast ON knjiga.id_oblasti=oblast.id
            WHERE knjiga.naziv LIKE '%$termin%';";    
           $result = $konekcija->query($sql);
       
           if ($result->num_rows > 0) 
               while($row = $result->fetch_assoc()) { 
                  echo "<div class='divknjige'>";
                  echo "<h1 class='naslov'>".$row['naziv']."</h1>";
                  echo "<img src='biblioteka/img/".$row['slika']."'width='200px'>";
                  echo "<p class='tekst'> Žanr: ".$row['zanr']."</p>";
                  echo "<p class='tekst'> Izdavac: ".$row['izdavac']."</p>";
                  echo "<p class='tekst'> Oblast: ".$row['oblast']."</p>";
                
                  if(isset($_SESSION['k_id'])){
                  echo "<a href='biblioteka/brisanje.php?id=".$row['id']."' id='link'>Obriši</a>";
                   
               }
                   if(isset($_SESSION['k_id'])){
                  echo "<a href='biblioteka/porudzbina.php?id=".$row['id']."'  id='link'>Poruči</a>";

             }
            echo "</div>";
           }
            else {
               echo "Nema rezultata";
           }
          ?>
    </main>
</body>
</html>