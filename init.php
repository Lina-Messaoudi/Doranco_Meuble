<?php




// connexion BDD
try{
    $bdd = new PDO("mysql:host=localhost;dbname=meuble","root","",[
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING 
    ]);

} catch(Exception $e){ 
    die("ERREUR CONNECTION BDD : " .$e->getMessage() );
}

// CREATION DE LA FONCTION DEBUG
function debug($value){
    echo "<pre>";
        print_r($value);
    echo "</pre>";
}

$errorMessage = "";
$successMessage = "";