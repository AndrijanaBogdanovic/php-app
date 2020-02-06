<?php
require 'konekcija.php';
$ime=$_POST['ime'];
$prezime=$_POST['prezime'];
$email=$_POST['email'];
$lozinka=$_POST['lozinka'];
$lozinka2=$_POST['lozinka2'];

if(empty($ime)||empty($prezime)||empty($email)||empty($lozinka)||empty($lozinka2))
{
	echo "Molimo popunite sva polja";
}
else{
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		echo "Nepravilan email";
	}
	elseif($lozinka!==$lozinka2){
		echo "Šifre se ne podudaraju!";
	}
	else{
		$sql="INSERT INTO `klijent`(`ime`,`prezime`,`email`,`sifra`)
		VALUES('$ime','$prezime','$email','$lozinka');";
		mysqli_query ($konekcija,$sql);
		echo "Uspeh";
		header("Location:../index.php");
	}
}
?>