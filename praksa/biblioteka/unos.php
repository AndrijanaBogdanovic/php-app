<?php
session_start();
require 'konekcija.php';
	$naziv= $_POST['naziv']; 
	$autor = $_POST['autor'];
	$zanr=$_POST['zanr'];
	$izdavac=$_POST['izdavac'];
	$oblast=$_POST['oblast'];
	$slika = $imeSlike = $imeSlikeTmp = $velicinaSlike = $greskaSlika = $tipSlike = '';
	
        if ($_FILES['slika']['size'] > 0) {
            $slika = $_FILES['slika'];
           
            $imeSlike= $_FILES['slika']['name'];
            $imeSlikeTmp= $_FILES['slika']['tmp_name'];
            $velicinaSlike = $_FILES['slika']['size'];
            $greskaSlika = $_FILES['slika']['error'];
            $tipSlike = $_FILES['slika']['type'];

            $ekstSlike = explode('.', $imeSlike); 
            
            $dozvoljeneEkst = ['png','PNG','jpg','JPG','jpeg','JPEG'];
            
            if (in_array($ekstSlike[1],$dozvoljeneEkst)) {
            	
                if ($greskaSlika === 0) {
                	
                    if ($velicinaSlike < 1000000) {
                        $novoImeSlike = uniqid('',true).".".$ekstSlike[1];
                        
                        $destinacijaSlike = 'img/'.$novoImeSlike;
                        
                        move_uploaded_file($imeSlikeTmp,$destinacijaSlike);
                       
                    } else {
                        echo 'slika je prevelike velicine';
                    }
                } else {
                    echo 'Doslo je do greske prilikom dodavanja!';
                }
            } else {
                echo 'Format nije dozvoljen';
            }
        }
	$sql="INSERT INTO knjiga(naziv, id_oblasti, id_zanra, autor, id_izdavaca, slika) 
	VALUES ('$naziv',$oblast,$zanr,'$autor',$izdavac,'$novoImeSlike')";

	mysqli_query($konekcija, $sql);
	header("Location: ../index.php");

?>