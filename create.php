<?php
/**
 * We gaan contact maken met de mysql server
 */
require('config.php');

$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass);

    if ($pdo) {
        echo "Er is een verbinding met de mysql-server";
    } else {
        echo "Er is een interne server-error, neem contact op met de beheerder";
    }

} catch(PDOException $e) {
    echo $e->getMessage();
}
var_dump($_POST);
/**
 * We gaan een insert-query maken voor het wegschrijven van de formuliergegevens
 */
$sql = "INSERT INTO Persoon (Id
                        ,Voornaam
                        ,Tussenvoegsel
                        ,Achternaam
                        ,Geboortedatum
                        ,Telefoonnummer
                        ,Straatnaam
                        ,Huisnummer
                        ,Woonplaats
                        ,Postcode
                        ,Landnaam)
        VALUES              (NULL
                        ,:voornaam
                        ,:tussenvoegsel
                        ,:achternaam
                        ,:geboortedatum
                        ,:telefoonnummer
                        ,:woonplaats
                        ,:huisnummer
                        ,:straatnaam
                        ,:postcode
                        ,:landnaam);";

// We bereiden de sql-query voor met de method prepare
$statement = $pdo->prepare($sql);

$statement->bindValue(':voornaam', $_POST['firstname'], PDO::PARAM_STR);
$statement->bindValue(':tussenvoegsel', $_POST['infix'], PDO::PARAM_STR);
$statement->bindValue(':achternaam', $_POST['lastname'], PDO::PARAM_STR);
$statement->bindValue(':geboortedatum', $_POST['bdate'], PDO::PARAM_STR);
$statement->bindValue(':telefoonnummer', $_POST['Telefoonnummer'], PDO::PARAM_STR);
$statement->bindValue(':straatnaam', $_POST['Straatnaam'], PDO::PARAM_STR);
$statement->bindValue(':huisnummer', $_POST['Huisnummer'], PDO::PARAM_STR);
$statement->bindValue(':woonplaats', $_POST['Woonplaats'], PDO::PARAM_STR);
$statement->bindValue(':postcode', $_POST['Postcode'], PDO::PARAM_STR);
$statement->bindValue(':landnaam', $_POST['Landnaam'], PDO::PARAM_STR);

// We vuren de sql-query af op de database

$result = $statement->execute();

if ($result) {
    echo "Er is een nieuw record gemaakt in de database.";
    header('Refresh:6; url=read.php');
} else {
    echo "Er is geen nieuw record gemaakt.";
    header('Refresh:6; url=read.php');
}
 