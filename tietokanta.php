<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $yhteys = mysqli_connect(
        "localhost",        // DB_HOST (wp-config.php:sta)
        "amk1013537",       // DB_USER
        "44wG2Ygv",         // DB_PASSWORD
        "wp_amk1013537"     // DB_NAME
    );

    mysqli_set_charset($yhteys, "utf8mb4");

} catch (Exception $e) {
    die("Tietokantayhteys epäonnistui: " . $e->getMessage());
}
?>
