<?php

//Luetaan lomakkeelta tulleet tiedot funktiolla $_POST, jos syötteet ovat olemassa
$id=isset($_POST["id"]) ? $_POST["id"] : "";
$nimi=isset($_POST["nimi"]) ? $_POST["nimi"] : "";
$sposti=isset($_POST["sahkoposti"]) ? $_POST["sahkoposti"] : "";
$viesti=isset($_POST["viesti"]) ? $_POST["viesti"] : "";
$lahetetty=isset($_POST["lahetetty"]) ? $_POST["lahetetty"] : "";


//Jos jotain tietoa ole annettu, ohjataan pyyntö takaisin admin sivulle
if (empty($id) || empty($nimi) || empty($sposti) || empty($viesti) || empty($lahetetty)){
    header("Location:./admin.php");
    exit;
}


// Yhdistetään tietokantaan
require 'tietokanta.php';


//Tehdään sql-lause, jossa kysymysmerkeillä osoitetaan paikat, joihin laitetaan muuttujien arvoja
$sql="update yhteydenotto set nimi=?, sposti=?, viesti=? where id=?";

//Valmistellaan sql-lause
$stmt=mysqli_prepare($yhteys, $sql);

//Sijoitetaan muuttujat oikeisiin paikkoihin
mysqli_stmt_bind_param($stmt, 'sssi', $nimi, $sposti, $viesti, $id);

//Suoritetaan sql-lause
mysqli_stmt_execute($stmt);

//Suljetaan tietokantayhteys
mysqli_close($yhteys);


header("Location:./admin.php");

?>