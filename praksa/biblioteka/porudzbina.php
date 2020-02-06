<?php
	session_start();
	require 'konekcija.php';

	$idKorisnika=$_SESSION['k_id'];
	$idKnjige=$_GET['id'];

	$sql="INSERT INTO `porudzbina`(`id_klijenta`,`id_knjige`)
	VALUES ($idKorisnika, $idKnjige);";
	mysqli_query($konekcija,$sql);

	header("Location:../index.php");
?>