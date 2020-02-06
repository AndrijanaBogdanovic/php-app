<?php
session_start();
require 'biblioteka/konekcija.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Administrator</title>
   <link rel="stylesheet" type="text/css" href="biblioteka/style.css">
</head>
<body>

  <h1 class='naslov'>Porudžbine</h1>
    <?php
   
                $sql = "SELECT klijent.ime, knjiga.naziv 
                 FROM porudzbina
                 INNER JOIN klijent ON porudzbina.id_klijenta=klijent.id
                 INNER JOIN knjiga ON porudzbina.id_knjige=knjiga.id;";
                $result = $konekcija->query($sql); 

                if ($result->num_rows > 0){
                  echo "<table border='1'><tr><th>Klijent</th><th>Knjiga</th></tr>";
                    while($row = $result->fetch_assoc()) { 
                    echo "<tr><td>".$row['ime']."</td><td>".$row['naziv']."</td></tr>";
                    }
                    echo "</table>";
                }
                 else {
                    echo "Nema rezultata";
                }

            
       ?>
      
<form id='divporudzbina' action="biblioteka/unos.php" method="post" enctype='multipart/form-data'>
  <p class='tekst'>Unesite naziv knjige</p>
  <input type="text" name="naziv">
  <p class='tekst'>Unesite autora</p>
  <input type="text" name="autor">
  <p class='tekst'>Izaberite žanr</p>
  <select name="zanr">
    <?php
                $sql = "SELECT * FROM zanr;";
                $result = $konekcija->query($sql); 

                if ($result->num_rows > 0) { 

                    while($row = $result->fetch_assoc()) { 
                    echo "<option value='".$row['id']."'> ".$row['naziv']."</option>";
                    }
                } else {
                    echo "Nema rezultata";
                }
            
       ?>
  </select>
  <p class='tekst'>Izaberite izdavaca</p>
  <select name="izdavac">
     <?php
                $sql = "SELECT * FROM izdavac;";
                $result = $konekcija->query($sql); 

                if ($result->num_rows > 0) { 
                
                    while($row = $result->fetch_assoc()) {
                    echo "<option value='".$row['id']."'> ".$row['naziv']."</option>";
                    }
                } else {
                    echo "Nema rezultata";
                }
            
       ?>
  </select>
  <p class='tekst'>Izaberite oblast</p>
  <select name="oblast">
    <?php
                $sql = "SELECT * FROM  oblast;";
                $result = $konekcija->query($sql); 
                if ($result->num_rows > 0) { 
                
                    while($row = $result->fetch_assoc()) { 
                    echo "<option value='".$row['id']."'> ".$row['naziv']."</option>";
                    }
                } else {
                    echo "Nema rezultata";
                }
                ?>
  </select>
  <p class='tekst'>Dodajte sliku</p>
  <input type="file" name="slika"><br><br>
  <input type="submit" value="Potvrdi">
</body>
</html>