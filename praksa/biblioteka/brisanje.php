<?php 
session_start();
require 'konekcija.php';

$id=$_GET['id'];

$sql="DELETE FROM knjiga WHERE id=$id"; 
mysqli_query($konekcija,$sql);

header("Location:../index.php");
?>