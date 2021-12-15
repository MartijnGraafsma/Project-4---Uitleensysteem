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
        
        <!-- categorie-->
        <form action="" method="GET">
        <div class="categorie">
            <p>Categorie</p>
            <button type="submit" class="categoriecheck">Filter</button>
            <?php
            include("conn.php");
            error_reporting(0);

            $brand_query= "SELECT * FROM categorie";
            $brand_query_run = mysqli_query($conn,$brand_query);
            if(mysqli_num_rows($brand_query_run)>0){
               foreach($brand_query_run as $categorielijst){
                   $checked=[];
                   if(isset($_GET['categories'])){
                    $checked = $_GET['categories'];
                   }
                    ?>
                    <input type="checkbox" name="categories[]" value="<?= $categorielijst['categorieid']; ?>"
                    <?php if(in_array($categorielijst['categorieid'],$checked)){
                        echo "gecheckt";
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
            
        </div>
        </form>
        
        <!-- apparaatoverzicht-->
        <?php
        if(isset($_GET['categories'])){
            $categorieschecked = [];
            $categorieschecked = $_GET['categories'];
            foreach($categorieschecked as $rowcate){
                $products = "SELECT * from apparaatoverzicht WHERE categorieid IN ($rowcate)";
                $products_run = mysqli_query($conn, $products);
                if(mysqli_num_rows($products_run) > 0){
                    foreach($products_run as $proditems):
                        ?>
                        <table>
                            <caption>Apparaatoverzicht</caption>
                            <tr>
                                <th>Productnaam</th>
                                <th>Beschikbaarheid</th>
                                <th>Verwachte inleverdatum</th>
                            </tr>
                            <tr>
                                <td><?= $proditems['productnaam']; ?></td>
                                <td><?= $proditems['beschikbaarheid']; ?></td>
                                <td><?= $proditems['inleverdatum']; ?></td>
                            </tr>
                        </table>
                        <?php endforeach;
                }
            }    
        }else{
            $products = "SELECT * FROM apparaatoverzicht";
            $products_run = mysqli_query($conn, $products);
            if(mysqli_num_rows($products_run) > 0){
                foreach($products_run as $proditems):
                    ?>
                    <table>
                        <caption>Apparaatoverzicht</caption>
                        <tr>
                            <th>Productnaam</th>
                            <th>Beschikbaarheid</th>
                            <th>Verwachte inleverdatum</th>
                        </tr>
                        <tr>
                            <td><?= $proditems['productnaam']; ?></td>
                            <td><?= $proditems['beschikbaarheid']; ?></td>
                            <td><?= $proditems['inleverdatum']; ?></td>
                        </tr>
                    </table>
                    <?php endforeach;    
            }else{
                echo "Geen product gevonden";
            }
        }
        ?>
        
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