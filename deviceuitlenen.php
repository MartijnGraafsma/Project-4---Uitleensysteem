<?php
include "conn.php";
error_reporting(0);

$id=$_GET['id'];
$productnaam=$_GET['productnaam'];
$beschrijving=$_GET['beschrijving'];
$inleverdatum=$_GET['inleverdatum'];
$email=$_GET['email'];
$van=$_GET['van'];
$uitgeleend=$_GET['uitgeleend'];
?>

<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="deviceuitlenen.css">
    <link rel="stylesheet" href="header.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
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
          <a href="deviceinlever.php"><li>Apparaten inleveren</li></a>
          <a href="uitloggen.php"><li>Uitloggen</li></a>
          <a><li></li></a>
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
<div class="container">
<h2 class="top-tekst">Uitlenen</h2>
      <form action="" method="GET" class="column, ">
         <br>
         
    
         <input  class="apparaatnaam" type="text" name="van" placeholder="Van" required>
         <br>
         <input   class="apparaatnaam" type="text" name="uitgeleend" placeholder="Uitgeleend aan" required>
         <br>
         <input   class="apparaatnaam" type="email" name="email" placeholder="Email" required>
         <br>
         <input  class="apparaatnaam" type="text" name="productnaam" placeholder="productnaam" required>
         <br>
         <input  class="apparaatnaam" type="date" name="inleverdatum" placeholder="Inleverdatum" required>
         <br>
         <button class="voeg-toe" type="submit" name="submit">Leen uit</button>
      </form>
    </div>
<div class="cat-container">  
    <a class="top-tekst2"><?php echo "$productnaam" ?></a>
    <a><?php echo "$beschrijving" ?></a>
</div>
    



</body>   
</html>
    <?php
      if($_GET['submit']){
        $id=$_GET['id'];
        $productnaam=$_GET['productnaam'];
        $beschrijving=$_GET['beschrijving'];
        $inleverdatum=$_GET['inleverdatum'];
        $email=$_GET['email'];
        $van=$_GET['van'];
        $uitgeleend=$_GET['uitgeleend'];
        $sql = "UPDATE apparaatoverzicht SET productnaam='[$productnaam]',beschrijving='$beschrijving'
        ,inleverdatum='$inleverdatum',email='$email',van='$van',
         uitgeleend='$uitgeleend' WHERE id='$id'";
  
        $data = mysqli_query($conn,$sql);
      if($data){
        echo "<script>alert('gegevens opgeslagen')</script>";
        ?>
        <META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/systeem/apparaatoverzicht(docent).php">
        <?php
      }else{
        echo "<script>alert('Het is niet gelukt om uw gegevens te wijzigen, Probeer later opnieuw')</script>";
      }
      }

    ?>

