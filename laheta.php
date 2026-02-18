<?php
require 'tietokanta.php';

# Luetaan lomakkeen tiedot.
$nimi = isset($_POST["nimi"]) ? $_POST["nimi"] : "";
$sahkoposti = isset($_POST["sahkoposti"]) ? $_POST["sahkoposti"] : "";
$viesti = isset($_POST["viesti"]) ? $_POST["viesti"] : "";

# Jos joku tiedoista puuttuu -> Takaisin lomakkeelle
if (empty($nimi) || empty($sahkoposti) || empty($viesti)) {
    header("Location: yhteystiedot.html");
}

$sql = "INSERT INTO yhteydenotto (nimi, sahkoposti, viesti) VALUES (?, ?, ?)";

$stmt = mysqli_prepare($yhteys, $sql);

mysqli_stmt_bind_param($stmt, 'sss', $nimi, $sahkoposti, $viesti);

mysqli_stmt_execute($stmt);

mysqli_close($yhteys);

header("Location: kiitos.html");
exit;
?>