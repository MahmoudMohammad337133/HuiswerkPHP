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
        <input type="text" name="firstname" id="firstname"><br>
        <br>
        <label for="infix">Tussenvoegsel:</label><br>
        <input type="text" name="infix" id="infix"><br>
        <br>
        <label for="lastname">Achternaam:</label><br>
        <input type="text" name="lastname" id="lastname"><br>
        <br>
        <label for="bdate">Geboortedatum:</label><br>
        <input type="date" id="bdate" name="bdate">
        <br>
        <label for="telefoonnummer">Telefoonnummer</label><br>
        <input type="text" name="Telefoonnummer" id="Telefoonnummer"><br>
        <br>
        <label for="straatnaam">Staartnaam</label><br>
        <input type="text" name="Straatnaam" id="Straatnaam"><br>
        <br>
        <label for="huisnummer">Huisnummer</label><br>
        <input type="text" name="Huisnummer" id="Huisnummer"><br>
        <br>
        <label for="woonplaats">Woonplaats</label><br>
        <input type="text" name="Woonplaats" id="Woonplaats"><br>
        <br>
        <label for="postcode">Postcode</label><br>
        <input type="text" name="Postcode" id="Postcode"><br>
        <br>
        <label for="landnaam">Landnaam</label><br>
        <input type="text" name="Landnaam" id="Landnaam"><br>
        <br>
        <input type="submit" value="Verstuur!">        
        </form>



</body>
</html>