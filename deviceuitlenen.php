<?php
include "conn.php";
error_reporting(0);

$id=$_GET['id'];
$productnaam=$_GET['productnaam'];
$beschrijving=$_GET['beschrijving'];
$inleverdatum=$_GET['inleverdatum'];
$studentnr=$_GET['studentnr'];
$van=$_GET['van'];
$uitgeleend=$_GET['uitgeleend'];
$opmerking=$_GET['opmerking'];
?>

<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="deviceleen.css">
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
        <a href="apparaatoverzicht(docent).php"><li>Apparatenoverzicht</li></a>
          <a href="apparatentoevoegen.php"><li>Apparaten toevoegen</li></a>
          <a href="gebruikertoevoegen.php"><li>Gebruiker toevoegen</li></a>
          <a href="inloggen.php"><li>Uitloggen</li></a>
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
      <form action="mail.php" method="POST" class="column, ">
        <input name="id" value="<?php echo "$id" ?>" hidden>
        <input name="productnaam" value="<?php echo "$productnaam" ?>" hidden>
        <input name="beschikbaarheid" value="Uitgeleend" hidden>
        <input name="beschrijving" value="<?php echo "$beschrijving" ?>" hidden>
        <br>
        <input class="apparaatnaam" type="text" name="van" value="<?php echo "$van" ?>" placeholder="Van" required>
        <br>
        <input class="apparaatnaam" type="text" name="uitgeleend" value="<?php echo "$uitgeleend" ?>" placeholder="Uitgeleend aan" required>
        <br>
        <input class="apparaatnaam" type="text" name="studentnr" value="<?php echo "$studentnr" ?>" placeholder="studentnr" required>
        <br>
        <input class="apparaatnaam" type="date" name="inleverdatum" placeholder="Inleverdatum" required>
        <br>
        <button class="voeg-toe" type="submit" name="submit">Leen uit</button>
      </form>
</div>
<div class="cat-container">  
    <a class="top-tekst2"><?php echo "$productnaam" ?></a>
    <br>
    <br>
    <br>
    <br>
    <a><?php echo "$beschrijving" ?></a>
</div>

<div class="inlever-container">
<h2 class="top-tekst">INLEVER</h2>
      <form action="deviceinlever.php" method="POST" class="column, ">
        <input name="id" value="<?php echo "$id" ?>" hidden>
        <input name="productnaam" value="<?php echo "$productnaam" ?>" hidden>
        <input name="beschikbaarheid" value="Beschikbaar" hidden>
        <input name="beschrijving" value="<?php echo "$beschrijving" ?>" hidden> 
        <input name="van" value="" hidden>
        <input name="studentnr" value="" hidden>
        <input name="inleverdatum" value="/" hidden>
        <br>
        <input class="apparaatnaam" type="text" name="uitgeleend" placeholder="Uitgeleend aan" value="<?php echo "$uitgeleend" ?>" required>
        <br>
        <input class="apparaatnaam" type="text" name="opmerking" placeholder="Nieuwe opmerking" required>
        <!-- <a class="apparaatnaam"><?php echo "$opmerking" ?></a> -->
        
      </form>

<?php
//haalt de opmerking uit de database
$opmerkingg=$_GET['productnaam'];

        $sql = "SELECT * FROM apparaatoverzicht WHERE productnaam='$opmerkingg'";
        if ($result = $conn->query($sql)) {
        foreach ($result as $row) {
echo"<div class='Cat-popup' id='opmerking'>
      <form action='' method='POST' class='Lever-in'>
     <center>   <p class='Nieuw'> opmerking </p> <br>
     <textarea class='apparaatnaam' placeholder=' " . $row['opmerking'] . "' readonly          ></textarea>      <br> <br> <br>
      </center>
       
      </form>
    </div>";
        }}
?>
<button class="voeg-toe" type="submit" name="submit">Inleveren</button>
</div>



</body>   
</html>


