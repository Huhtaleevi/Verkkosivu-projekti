<?php

// Tarkistetaan, onko GET-parametri 'muokattava' annettu URL:issa
// Jos annettu, tallennetaan se muuttujaan $muokattava, muuten tyhjä merkkijono
$muokattava=isset($_GET["muokattava"]) ? $_GET["muokattava"] : "";

// Jos $muokattava on tyhjä (ei id:tä annettu), ohjataan takaisin admin-sivulle
if (empty($muokattava)){
    header("Location:./admin.php");
    exit;
}


// Yhdistetään tietokantaan tietokantatiedoston avulla
require 'tietokanta.php';


// Luodaan SQL-lause, joka hakee tietueen id:n perusteella
$sql="select * from yhteydenotto where id=?";

// Valmistellaan SQL-lause
$stmt=mysqli_prepare($yhteys, $sql);

// Sijoitetaan muuttuja SQL-lauseeseen, 'i' tarkoittaa integer-tyyppiä
mysqli_stmt_bind_param($stmt, 'i', $muokattava);

// Suoritetaan SQL-lause
mysqli_stmt_execute($stmt);

// Haetaan tulos prepared statementista objektina
$tulos=mysqli_stmt_get_result($stmt);

// Jos tietuetta ei löydy (id ei ole olemassa), ohjataan takaisin admin-sivulle
if (!$rivi=mysqli_fetch_object($tulos)){
    header("Location:./admin.php");
    exit;
}

?>


<!-- Tyylit muokkaussivulle -->
<style>

body {
    font-family: Arial, sans-serif;
    background-color: #f4f6f8;
}

.form-container {
    width: 500px;
    margin: 40px auto;
    padding: 25px;
    background: white;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}

.form-container h2 {
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 15px;
}

label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

input[type="text"],
input[type="email"],
textarea {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 14px;
    box-sizing: border-box;
}

input[readonly] {
    background-color: #f0f0f0;
}

textarea {
    resize: vertical;
    min-height: 100px;
}

button {
    background-color: #007bff;
    color: white;
    padding: 10px 18px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 14px;
}

button:hover {
    background-color: #0056b3;
}

</style>


<!-- Lomake korttimaisessa containerissa -->
<div class="form-container">

<h2>Muokkaa yhteydenottoa</h2>

<form action="./paivita.php" method="post">

    <div class="form-group">
        <label>ID</label>
        <input type="text" name="id" value="<?php print $rivi->id;?>" readonly>
    </div>

    <div class="form-group">
        <label>Nimi</label>
        <input type="text" name="nimi" value="<?php print $rivi->nimi;?>">
    </div>

    <div class="form-group">
        <label>Sähköposti</label>
        <input type="email" name="sahkoposti" value="<?php print $rivi->sposti;?>">
    </div>

    <div class="form-group">
        <label>Viesti</label>
        <textarea name="viesti"><?php print $rivi->viesti;?></textarea>
    </div>
    
    <div class="form-group">
        <label>Lähetetty</label>
        <input type="text" name="lahetetty" value="<?php print $rivi->lahetetty;?>" readonly>
    </div>

    <button type="submit" name="ok">Tallenna</button>

</form>

</div>


<?php

// Suljetaan tietokantayhteys
mysqli_close($yhteys);

?>