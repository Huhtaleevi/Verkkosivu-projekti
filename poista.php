


<?php

# Tietokantayhteys

require 'tietokanta.php';

# Luetaan poistettavan tietueen id GET-parametrista
$poistettava = isset($_GET['poistettava']) ? $_GET['poistettava'] : '';

# Jos id puuttuu tai ei ole kelvollinen kokonaisluku -> takaisinohjaus
if (empty($poistettava) || !ctype_digit($poistettava)) {
    # Vaihda halutuksi sivuksi, esim. listaus- tai yhteydenottosivu
    header('Location: yhteystiedot.html');
    exit;
}

# SQL-lause, joka poistaa rivin pääavaimen perusteella
$sql = "DELETE FROM yhteydenotto WHERE id = ?";

# Valmistellaan lause ja sidotaan id parametriksi
$stmt = mysqli_prepare($yhteys, $sql);
mysqli_stmt_bind_param($stmt, 'i', $poistettava);

# Suoritetaan poisto
mysqli_stmt_execute($stmt);

# (Valinnainen) Voit tarkistaa vaikuttiko poisto:
# $poistettuja = mysqli_stmt_affected_rows($stmt);

# Suljetaan yhteys
mysqli_close($yhteys);

# Ohjataan takaisin sivulle (vaihda tarvittaessa)
# Voit lisätä viestin queryyn: ?msg=Rivi%20poistettu
header('Location: admin.php');
exit;

?>