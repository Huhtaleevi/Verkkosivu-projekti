<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {

    // Luetaan asetukset ini-tiedostosta
    $initials = parse_ini_file("./.ht.asetukset.ini");

    // Luodaan tietokantayhteys ini-tiedoston arvoilla
    $yhteys = mysqli_connect(
        $initials["databaseserver"],
        $initials["username"],
        $initials["password"],
        $initials["database"]
    );

    mysqli_set_charset($yhteys, "utf8mb4");

} catch (Exception $e) {
    die("Tietokantayhteys epäonnistui.");
}
?>