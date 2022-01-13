<?php
include("conn.php");
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
   
<form action="" method="GET" class="column">
    <br>
    <input type="text" value="<?php echo "$id" ?>"name="id">
    <input type="text" value="<?php echo "$beschrijving" ?>"name="beschrijving">
    
    <input class="invulleen" type="text" value="<?php echo "$van" ?>"name="van" placeholder="Van" required>
    <br>
    <input class="invulleen" type="text" value="<?php echo "$uitgeleend" ?>"name="uitgeleend" placeholder="Uitgeleend aan" required>
    <br>
    <input class="invulleen" type="email" value="<?php echo "$email" ?>"name="email" placeholder="Email" required>
    <br>
    <input class="invulleen" type="text" value="<?php echo "$productnaam" ?>"name="productnaam" placeholder="productnaam" required>
    <br>
    <input class="invulleenn" type="date" name="inleverdatum" placeholder="Inleverdatum" required>
    <br>
    <button class="leenknop" type="submit" name="submit">Leen uit</button>
</form>
<div class="beschrijvingcolumn">
<a><?php echo "$id" ?></a>
<a><?php echo "$productnaam" ?></a>
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
$sql = "UPDATE apparaatoverzicht SET productnaam='$[productnaam]',beschrijving='$beschrijving'
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

