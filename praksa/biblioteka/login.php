<?php
session_start();
require 'konekcija.php';

$email=$_POST['email'];
$lozinka=$_POST['lozinka'];
if(($email=='admin@gmail.com')&&($lozinka=='admin'))
{
  header("Location: ../admin.php");
}
else{

$sql = "SELECT * FROM klijent WHERE email = '$email';";
    $result = $konekcija->query($sql); 
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
        	
           if($lozinka===$row['sifra']){
           	
           		$_SESSION['k_id'] = $row['id'];
                $_SESSION['k_ime'] = $row['ime'];
                $_SESSION['k_prezime'] = $row['prezime'];
                $_SESSION['k_email'] = $row['email'];
                $_SESSION['k_sifra'] = $row['sifra'];
                header("Location: ../index.php");
            }
           else
           	echo "Pogresna sifra";
        }
    } else {
        echo "Pogresan email";
    }
    }
?>