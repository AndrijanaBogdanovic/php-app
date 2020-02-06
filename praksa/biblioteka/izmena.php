<?php
	session_start();
	require 'konekcija.php';

	$ime = $_POST['ime'];
	$prezime = $_POST['prezime'];

	$id = $_SESSION['k_id'];
	
	$sql = "UPDATE `klijent` SET `ime`='$ime',`prezime`='$prezime' WHERE id = $id";

	mysqli_query($konekcija, $sql);
	header("Location: ../index.php");


?>