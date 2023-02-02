<?php


// voeg de verbindingsgegevens toe
require('config.php');

// Maak een data sourcename string voor de pdo constructor
$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass);
    if ($pdo) {
        // echo "Verbinding is gelukt";
    } else {
        echo "Interne server-error";
    }
} catch(PDOException $e) {
    $e->getMessage();
}

if($_SERVER['REQUEST_METHOD'] == "POST"){
    var_dump($_POST);

    $sql = "UPDATE Persoon
            SET     Voornaam = :firstname,
                    Tussenvoegsel = :infix,
                    Achternaam = :lastname,
                    Geboortedatum = :bdate,
                    Telefoonnummer = :Telefoonnummer,
                    Staartnaam = :Staartnaam,
                    Huisnummer = :Huisnummer,
                    Woonplaats = :Woonplaats,
                    Postcode = :Postcode,
                    Landnaam = :Landnaam
            WHERE   Id = :id";

    $statement = $pdo->prepare($sql);

    $statement->bindValue(':firstname', $_post['firstname'], PDO::PARAM_STR );
    $statement->bindValue(':infix', $_post['infix'], PDO::PARAM_STR );
    $statement->bindValue(':lastname', $_post['lastname'], PDO::PARAM_STR );
    $statement->bindValue(':bdate', $_post['bdate'], PDO::PARAM_INT );
    $statement->bindValue(':id', $_post['id'], PDO::PARAM_INT );
    $statement->bindValue(':Telefoonnummer', $_POST['Telefoonnummer'],PDO::PARAM_STR);
    $statement->bindValue(':Straatnaam', $_POST['Straatnaam'],PDO::PARAM_STR);
    $statement->bindValue(':Huisnummer', $_POST['Huisnummer'],PDO::PARAM_STR);
    $statement->bindValue(':Woonplaats', $_POST['Woonplaats'],PDO::PARAM_STR);
    $statement->bindValue(':Postcode', $_POST['Postcode'],PDO::PARAM_STR);
    $statement->bindValue(':Landnaam', $_POST['Landnaam'],PDO::PARAM_STR);
    $statement->bindValue(':id', $_POST['id'],PDO::PARAM_INT); 

    $statement->execute();
    echo"HEt is gelukt";
    header('Refresh:3; url=read.php');

    exit();
}

// Maak een Update query voor het Updaten van een record
$sql = "SELECT Id
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
            FROM Persoon
            WHERE Id = :Id";

            // "UPDATE Persoon
            //         SET 
            //         WHERE Id = :Id";

// Bereid de query voor om de placeholder te vervangen voor een id-waarde
$statement = $pdo->prepare($sql);

// Vervang de placeholder voor een id-waarde
$statement->bindValue(':Id', $_GET['Id'], PDO::PARAM_INT);

// Voer de query uit op de mysql-database
$statement->execute();

$result = $statement->fetch(PDO::FETCH_OBJ);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <title>PHP PDO CRUD</title>
</head>
<body>
    <h1>PHP PDO CRUD</h1>
    
    <form action="create.php" method="post">

        <label for="firstname">Voornaam:</label><br>
        <input type="text" name="firstname" id="firstname" value= "<?= $result->Voornaam; ?>"><br>
        <br>
        <label for="infix">Tussenvoegsel:</label><br>
        <input type="text" name="infix" id="infix" value="<?= $result->Tussenvoegsel; ?>"><br>
        <br>
        <label for="lastname">Achternaam:</label><br>
        <input type="text" name="lastname" id="lastname" value="<?= $result->Achternaam; ?>"><br>
        <br>
        <label for="birthday">Geboortedatum:</label><br>
        <input type="date" id="birthday" name="birthday" value="<?= $result->Geboortedatum; ?>">
        <br>
        <br>
        <label for="telefoonnummer">Telefoonnummer</label><br>
        <input type="text" name="telefoonnummer" id="telefoonnummer" value="<?= $result->Telefoonnummer; ?>"><br>
        <br>
        <br>
        <label for="straatnaam">Straatnaam</label><br>
        <input type="text" name="straatnaam" id="straatnaam" value="<?= $result->Straatnaam; ?>"><br>
        <br>
        <br>
        <label for="huisnummer">Huisnummer</label><br>
        <input type="text" name="huisnummer" id="huisnummer" value="<?= $result->Huisnummer; ?>"><br>
        <br>
        <br>
        <label for="woonplaats">Woonplaats</label><br>
        <input type="text" name="woonplaats" id="woonplaats" value="<?= $result->Woonplaats; ?>"><br>
        <br>
        <br>
        <label for="postcode">Postcode</label><br>
        <input type="text" name="postcode" id="postcode" value="<?= $result->Postcode; ?>"><br>
        <br>
        <br>
        <label for="landnaam">Landnaam</label><br>
        <input type="text" name="landnaam" id="landnaam" value="<?= $result->Landnaam; ?>"><br>
        <br>
        <input type="hidden" name="id" value="<?= $result->Id;?>">
        <input type="submit" value="Verstuur!">        

    </form>



</body>
</html>