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
        <link href="apparaatoverzicht(leerling).css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Apparaatoverzicht(docent)</title>
    </head>
    <body>
        <div class="header" id="header">
  <label for="check" class="checkbtn" onclick="myFunction()"><i class="fas fa-bars" id="check"></i></label>
  <div class="innerheader">
    <div class="logo_container">
      <img class="FotoFP" src="logofriesepoort.png">
    </div>
      <div class="navbar">
        <ul>
        <a href="apparaatoverzicht(docent).php"><li>Apparatenoverzicht</li></a>
          <a href="apparatentoevoegen.php"><li>Apparaten toevoegen</li></a>
          <a href="gebruikertoevoegen.php"><li>Gebruiker toevoegen</li></a>
          <a href="inloggen.php"><li>Uitloggen</li></a>
          <a><li> <form  method='post' action="">
        </form></li></a>
        </ul>
      <script>
          function myFunction() {
            var x = document.getElementById("header");
            if (x.className === "header") {
              x.className += " responsive";
            } else {
              x.className = "header";
            }
          }
      </script>
      </div>
  </div>
</div>
        
        <!-- categorie-->
        <form action="" method="GET">
        <div class="categorie">
            <p>Categorie  <button type="submit" class="categoriecheck">Filter</button></p> 
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
       
        <table>
                <caption>Apparaatoverzicht</caption>
                <tr>
                    <th>Productnaam</th>
                    <th>Beschikbaarheid</th>
                    <th>Verwachte inleverdatum</th>
                    <th colspan="2" align="center">Status</th>
                </tr>
                        
    <!-- Zoekfunctie met apparaatoverzicht-->
    <form action="" method="post">
        <input type="text" name="search" maxlength="15" placeholder="Zoek een apparaat">
        <input type="submit" name="submitsearch" value="Zoeken">
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
                            <tr>
                                <td><?= $proditems['productnaam']; ?></td>
                                <td><?= $proditems['beschikbaarheid']; ?></td>
                                <td><?= $proditems['inleverdatum']; ?></td>
                                <td><a href='deviceuitlenen.php?id=$proditems[id]&productnaam=$proditems[productnaam]&beschrijving=$proditems[beschrijving]&beschikbaarheid=$proditems[beschikbaarheid]&inleverdatum=$proditems[inleverdatum]&email=$proditems[email]&van=$proditems[van]&uitgeleend=$proditems[uitgeleend]&opmerking=$proditems[opmerking]><button type='submit' id='editbtn'>Wijzigen</button></a></td>
                            </tr>
                        <?php endforeach;
                }
            }    
        }else{
            while($row = mysqli_fetch_array($submitsearch_result)):
                echo "
                <tr>
                    <td>".$row['productnaam']."</td>
                    <td>".$row['beschikbaarheid']."</td>
                    <td>".$row['inleverdatum']."</td>
                    <td><a href='deviceuitlenen.php?id=$row[id]&productnaam=$row[productnaam]&beschrijving=$row[beschrijving]&beschikbaarheid=$row[beschikbaarheid]&inleverdatum=$row[inleverdatum]&email=$row[email]&van=$row[van]&uitgeleend=$row[uitgeleend]&opmerking=$row[opmerking]><button type='submit' id='editbtn'>Wijzigen</button></a></td>
                </tr>
                "?>
                <?php endwhile;
        }
        ?>
        </table>
        </form>
    </body>
</html>