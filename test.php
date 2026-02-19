<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$yhteys = mysqli_connect(
    "localhost",
    "amk1013537",
    "44wG2Ygv",
    "wp_amk1013537"
);

if (!$yhteys) {
    die("Virhe: " . mysqli_connect_error());
}

echo "Yhteys toimii!";
?>
