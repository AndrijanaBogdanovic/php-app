<?php 
 session_start();
 require 'konekcija.php';
 $pronadji=$_POST['pronadji']; 
 header("Location:../index.php?pretraga=$pronadji");
?>