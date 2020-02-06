<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "biblioteka";

    $konekcija = new mysqli($servername, $username, $password, $dbname);

    if ($konekcija->connect_error) {
        die("Greška pri konekciji: " . $konekcija->connect_error);
    }