<!DOCTYPE html>
<html>
    <head>
        <link href="style.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>apparaatoverzicht(docenten)</title>
    </head>
    <body>
        <a href="inloggen.php"><button class="docentinloggen">Uitloggen</button></a>  
        <table>
            <caption>Orderoverzicht</caption>
            <tr>
                <th>Productnaam</th>
                <th>Beschikbaarheid</th>
                <th>Verwachte inleverdatum</th>
            </tr>
            <tr>
                <td>Laptop Asus AB</td>
                <td>Uitgeleend</td>
                <td>08-12-2021</td>
            </tr>
        </table>
        <div class="categorie">
            <p>Catogorie</p>
            <input type="checkbox" class="eerstekeuze" name="eerstekeuze">
            <input type="checkbox" class="tweedekeuze" name="tweedekeuze">
        </div>
        <input type="text" name="zoeken" value="Laptop Asus" maxlength="15">
        <input type="submit" value="Zoeken">
    </body>
</html>
