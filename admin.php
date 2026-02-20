<?php

// Näyttää kaikki PHP-virheet (debuggausta varten)
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>


<?php

// Yhdistetään tietokantaan tietokantatiedoston avulla
require 'tietokanta.php';

// Suoritetaan SQL-kysely, joka hakee kaikki rivit 'yhteydenotto'-taulusta
// ja järjestää ne laskevasti lähetyspäivän mukaan (uusimmat ensin)
$tulos = mysqli_query($yhteys, "select * from yhteydenotto order by lahetetty desc");

?>


<!-- Tyylit admin-sivulle -->
<style>

body {
    font-family: Arial, sans-serif;
    background-color: #f4f6f8;
}

.container {
    width: 700px;
    margin: 40px auto;
}

h1 {
    margin-bottom: 20px;
}

.card {
    background: white;
    padding: 20px;
    margin-bottom: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}

.card p {
    margin: 5px 0;
    overflow-wrap: anywhere;
}


.label {
    font-weight: bold;
}

.button-group {
    margin-top: 15px;
}

.button {
    display: inline-block;
    padding: 8px 14px;
    border-radius: 4px;
    text-decoration: none;
    color: white;
    font-size: 14px;
    margin-right: 10px;
}

.edit-btn {
    background-color: #007bff;
}

.edit-btn:hover {
    background-color: #0056b3;
}

.delete-btn {
    background-color: #dc3545;
}

.delete-btn:hover {
    background-color: #a71d2a;
}

.wordlinkki, .wordlinkki:hover, .wordlinkki:active, .wordlinkki:visited {
    text-decoration: none;
    font-size: 24px;
    font-family: Arial, sans-serif;
    font-weight: bold;
    color: black;
}

.wordlinkki:hover {
    text-decoration: underline;
    font-family: Arial, sans-serif;
    font-weight: bold;
    color: black;
}

</style>


<!-- Pääcontainer, jossa kaikki kortit sijaitsevat -->
<div class="container">

<h1>Yhteydenotot</h1>

<!-- Käydään läpi kaikki tietokannasta haetut rivit; jokainen rivi tallennetaan $rivi-objektiin -->
<?php while ($rivi = mysqli_fetch_object($tulos)) { ?>

<!-- Kortti yksittäiselle yhteydenotolle -->
    <div class="card">
        <p><span class="label">ID:</span> <?php print $rivi->id; ?></p>
        <p><span class="label">Nimi:</span> <?php print $rivi->nimi; ?></p>
        <p><span class="label">Sähköposti:</span> <?php print $rivi->sposti; ?></p>
        <p><span class="label">Viesti:</span><br> <?php print nl2br($rivi->viesti); ?></p>
        <p><span class="label">Lähetetty:</span> <?php print $rivi->lahetetty; ?></p>

        <div class="button-group">
            <a class="button edit-btn" href="./muokkaa.php?muokattava=<?php print $rivi->id; ?>">Muokkaa</a>
            <a class="button delete-btn" 
               href="./poista.php?poistettava=<?php print $rivi->id; ?>"
               onclick="return confirm('Haluatko varmasti poistaa tämän?');">
               Poista
            </a>
        </div>
    </div>

<!-- Silmukka päättyy tähän -->
<?php } ?>

</div>

<h1>Linkki dokumentaatioon<h1>
    <a class="wordlinkki" href="https://hameenamk-my.sharepoint.com/:w:/g/personal/amk1013537_student_hamk_fi/IQBaBcGs_S2jTIs571JUQV18AXLtJB4RGjhJscUp4SaknS8?rtime=0GuCsANw3kg">

    
<!-- Suljetaan tietokantayhteys, kun kaikki tiedot on haettu -->
<?php mysqli_close($yhteys); ?>