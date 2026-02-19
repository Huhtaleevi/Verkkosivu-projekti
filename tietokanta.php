<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $yhteys = mysqli_connect("db", "root", "password", "HAMKpizzakebab");
} catch (Exception $e) {
    header("Location: yhteystiedot.html");
    exit;
}
?>