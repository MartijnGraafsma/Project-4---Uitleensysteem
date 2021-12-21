<?php
if(isset($_POST['submitsearch'])){ //als user op zoekbutton klikt
    $search = $_POST['search'];
    $query = "SELECT * FROM `apparaatoverzicht` WHERE CONCAT(`productnaam`,`beschikbaarheid`,`inleverdatum`) LIKE '%".$search."%'"; //
    $submitsearch_result = filterTable($query);

}else{
    $query = "SELECT * FROM `apparaatoverzicht`";
    $submitsearch_result = filterTable($query);
} 
//connectie met de database
function filterTable($query){
    include 'conn.php';
    $filter_Result = mysqli_query($conn, $query);
    return $filter_Result;
}
?>


<!DOCTYPE html>
<html>
    <head>
        <link href="style.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Apparaatoverzicht(leerling)</title>
    </head>
    <body>
        <a href="index.php"><button class="docentinloggen">Docent inloggen</button></a>  
        
        
        <!-- Zoekfunctie met apparaatoverzicht-->
        <form action="" method="post">
            <input type="text" name="search" maxlength="15" placeholder="Zoek een apparaat">
            <input type="submit" name="submitsearch" value="Zoeken">
            <table>
                <caption>Apparaatoverzicht</caption>
                <tr>
                    <th>Productnaam</th>
                    <th>Beschikbaarheid</th>
                    <th>Verwachte inleverdatum</th>
                </tr>
                <?php while($row = mysqli_fetch_array($submitsearch_result)):?>
                <tr>
                    <td><?php echo $row['productnaam'];?></td>
                    <td><?php echo $row['beschikbaarheid'];?></td>
                    <td><?php echo $row['inleverdatum'];?></td>
                </tr>
                <?php endwhile;?>
            </table>
        </form>
    </body>
</html>