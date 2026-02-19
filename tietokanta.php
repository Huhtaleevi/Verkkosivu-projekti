<?php

// Asetetaan MySQLi heittämään virheet poikkeuksina,
// jotta mahdolliset tietokantavirheet voidaan käsitellä try-catch -rakenteella.
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Luodaan yhteys MySQL-tietokantaan. Parametrit: palvelin, käyttäjätunnus, salasana, tietokannan nimi
try {
    $yhteys = mysqli_connect(
        "localhost",        
        "amk1013537",       
        "44wG2Ygv",         
        "wp_amk1013537"     
    );

// Asetetaan merkistökoodaukseksi utf8mb4, jotta ääkköset ja erikoismerkit toimivat oikein.
    mysqli_set_charset($yhteys, "utf8mb4");

// Jos yhteys epäonnistuu, ohjelma pysäytetään ja näytetään virheilmoitus
} catch (Exception $e) {
    die("Tietokantayhteys epäonnistui: " . $e->getMessage());
}
?>
