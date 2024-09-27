<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>phphome</title>
</head>
<body>
    <h1>Swag</h1>
    <form method="GET" id="formswag" >
        <label for="parcheggio">Spunta se vuoi vedere hotel con parcheggio</label>
        <input type="checkbox" id="parcheggio" name="parcheggio"><br>
        <label for="stelle">Spunta se vuoi vedere hotel delle stelle richieste</label>
        <input type="number" name='stelle'  min="1" max="5"><br>
        <button type="submit" value=""> Filtra! </button><br>
    </form>

<!-- CHIAMATA GET da dataSet -->

<?php
include 'dataSet.php';

if (!isset($_GET['parcheggio']) && (!isset($_GET['stelle']) || $_GET['stelle'] == '')) {
    echo "stampa normale di tutto l'array <br>"; 
// funzione stampa tutto
stampaTuttoArray($hotels);
} else if (isset($_GET['parcheggio']) && isset($_GET['stelle']) && $_GET['stelle'] !== '') {
    echo "stampa con parcheggio e stelle <br>";
//funzione stampa due attivi
$valoreStelle = $_GET['stelle'];
stampaConParcheggioStelle($hotels, $valoreStelle);
} else if (isset($_GET['parcheggio'])) {
    echo "stampa con parcheggio <br>";
//funzione stampa due attivi
stampaConParcheggio($hotels);
} else if (isset($_GET['stelle']) && $_GET['stelle'] !== '') {
    echo "stampa con stelle <br>";
//funzione stampa due attivi
$valoreStelle = $_GET['stelle'];
stampaConStelle($hotels, $valoreStelle);
};

//funzione normale
function stampaTuttoArray($hotels) {
foreach($hotels as $hotel) {
    echo "nome: " . $hotel['name'] . "<br>";
    echo "descrizione: " . $hotel['description'] . "<br>";
    echo "parcheggio: " . ($hotel['parking'] ? 'Sì' : 'No') . "<br>";
    echo "voto: " . $hotel['vote'] . "<br>";
    echo "distanza dal centro: " . $hotel['distance_to_center'] . " km<br><br>";
}
}

function stampaConParcheggioStelle($hotels, $valoreStelle) {
foreach($hotels as $hotel) {
if ($hotel['parking'] && $hotel['vote'] == $valoreStelle){
    echo "nome2: " . $hotel['name'] . "<br>";
    echo "descrizione: " . $hotel['description'] . "<br>";
    echo "parcheggio: " . ($hotel['parking'] ? 'Sì' : 'No') . "<br>";
    echo "voto: " . $hotel['vote'] . "<br>";
    echo "distanza dal centro: " . $hotel['distance_to_center'] . " km<br><br>";
}
}
}


function stampaConParcheggio($hotels) {
foreach($hotels as $hotel) {

if ($hotel['parking']){

    echo "nome3: " . $hotel['name'] . "<br>";
    echo "descrizione: " . $hotel['description'] . "<br>";
    echo "parcheggio: " . ($hotel['parking'] ? 'Sì' : 'No') . "<br>";
    echo "voto: " . $hotel['vote'] . "<br>";
    echo "distanza dal centro: " . $hotel['distance_to_center'] . " km<br><br>";
}
}
}

function stampaConStelle($hotels, $valoreStelle) {
foreach($hotels as $hotel) {
if ($hotel['vote'] == $valoreStelle){ 
    echo "nome4: " . $hotel['name'] . "<br>";
    echo "descrizione: " . $hotel['description'] . "<br>";
    echo "parcheggio: " . ($hotel['parking'] ? 'Sì' : 'No') . "<br>";
    echo "voto: " . $hotel['vote'] . "<br>";
    echo "distanza dal centro: " . $hotel['distance_to_center'] . " km<br><br>";
}
}
}



?>


    </body>
    </html>

