<!DOCTYPE html>
<html>
    <head>
        <link href="style.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Apparaatoverzicht(leerling)</title>
    </head>
    <body>
        <a href="inloggen.php"><button class="docentinloggen">Docent inloggen</button></a>  
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
            <p>Categorie</p>
            <?php
            include("conn.php");
            error_reporting(0);
            $query= "SELECT * FROM categorie";
            $data = mysqli_query($conn,$query);
            if(mysqli_num_rows($data)>0){
               foreach($data as $categorie){
                    ?>
                    <input type="checkbox" name="categorie[]" value="<?= $categorie['id']; ?>">
                    <?= $categorie['naam']; ?><br>
                    <?php
                }
            }
            else{
                echo "Nog geen categorie gemaakt";
            }
            ?>
        </div> 
        
        <input type="text" name="zoeken" value="Laptop Asus" maxlength="15">
        <input type="submit" value="Zoeken">
    </body>
</html>
