<?php
$host='localhost';
$db='agence_voiyage';
$login='root';
$mdp='';
try{
    $pdo=new PDO("mysql:host=$host;dbname=$db",$login,$mdp);
        //echo "Connecté à la base de données";

}
catch (PDOException $e){
    echo"erreur".$e->getMessage();
}

?>
