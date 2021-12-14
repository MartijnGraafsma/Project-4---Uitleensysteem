<?php
if(isset($_POST['submitsearch'])){ //als user op zoekbutton klikt
    $search = $_POST['search'];
    $query = "SELECT * FROM `apparaatoverzichtleerling` WHERE CONCAT(`productnaam`,`beschikbaarheid`,`inleverdatum`) LIKE '%".$search."%'"; //
    $submitsearch_result = filterTable($query);

}else{
    $query = "SELECT * FROM `apparaatoverzichtleerling`";
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
        <a href="inloggen.php"><button class="docentinloggen">Docent inloggen</button></a>  
        <form action="" method="GET">
        <div class="categorie">
            <p>Categorie</p>
            <?php
            include("conn.php");
            error_reporting(0);

            $query1= "SELECT * FROM categorie";
            $data = mysqli_query($conn,$query1);
            if(mysqli_num_rows($data)>0){
               foreach($data as $categorielijst){
                   $checked=[];
                   if(isset($_GET['categorie'])){
                    $checked = $_GET['categorie'];
                   }
                    ?>
                    <input type="checkbox" name="categorie[]" value="<?= $categorielijst['categorieid']; ?>"
                    <?php if(in_array($categorielijst['categorieid'],$checked)){
                        echo "gecheckd";
                    } ?>
                    />
                    <?= $categorielijst['naam']; ?><br>
                    <?php
                }
            }
            else{
                echo "Nog geen categorie gemaakt";
            }
            ?>
            <button name="filter" class="docentinloggen">
        </div>
        </form>
        
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

