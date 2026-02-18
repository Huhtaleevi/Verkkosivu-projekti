<?php
require 'tietokanta.php';

# Luetaan lomakkeen tiedot.
$nimi = isset($_POST["nimi"]) ? $_POST["nimi"] : "";
$sahkoposti = isset($_POST["sahkoposti"]) ? $_POST["sahkoposti"] : "";
$viesti = isset($_POST["viesti"]) ? $_POST["viesti"] : "";

# Jos joku tiedoista puuttuu -> Takaisin yhteystiedot.html sivulle.
if (empty($nimi) || empty($sahkoposti) || empty($viesti)) {
    header("Location: yhteystiedot.html");
    exit;
}

# SQL-lause mikä lisää uuden viestin tietokantaan
$sql = "INSERT INTO yhteydenotto (nimi, sposti, viesti) VALUES (?, ?, ?)";

$stmt = mysqli_prepare($yhteys, $sql);
mysqli_stmt_bind_param($stmt, 'sss', $nimi, $sahkoposti, $viesti);
mysqli_stmt_execute($stmt);

mysqli_close($yhteys);

header("Location: yhteystiedot.html");
exit;
?>