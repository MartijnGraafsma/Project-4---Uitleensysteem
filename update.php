<?php
include("conn.php");
error_reporting(0);
$id=$_GET['id'];
$productnaam=$_GET['productnaam'];
$beschikbaarheid=$_GET['beschikbaarheid'];
$inleverdatum=$_GET['inleverdatum'];
$email=$_GET['email'];
?>

<html>
<head>
    <link href="style.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apparaatoverzicht(docent)</title>
</head>
    <br><br><br><br><br><br><br>
    <body>
        <form action="" method="GET">
        <table border="0" bgcolor="black" align="center" cellspacing="20">
        <tr>
        <td>productnaam</td>
        <td><input type="text" value="<?php echo "$productsnaam" ?>" name='productsnaam' required"></td>
        </tr>
        <tr>
        <td>Beschikbaar</td>
        <td><input type="text" value="<?php echo "$beschikbaarheid" ?>" name='beschikbaarheid' required"></td>
        </tr>
        <tr>
        <td>Verwachte inleverdatum</td>
        <td><input type="date" value="<?php echo "$inleverdatum" ?>" name='inleverdatum' required></td>
        </tr>
        <tr>
        <td>Email</td>
        <td><input type="text" value="<?php echo "$email" ?>" name='email' required></td>
        </tr>
        <tr>
        <td><input type="text" value="<?php echo "$id" ?>" name='id' required hide></td>
        </tr>
        
        <tr><td colspan="2" align="center"><input type="submit" id="button" name="submit" value="Gegevens opslaan"></a></td>
        </tr>
    </form>
    </table>
    </body>
    </html>

<?php
if($_GET['submit']){
    $productnaam=$_GET['productnaam'];
    $beschikbaarheid=$_GET['beschikbaarheid'];
    $inleverdatum=$_GET['inleverdatum'];
    $email=$_GET['email'];
$query = "UPDATE apparaatoverzicht SET productnaam='$productnaam',
beschikbaarheid='$beschikbaarheid',inleverdatum='$inleverdatum',email='$email',bezorgadres='$bezorgadres'
WHERE id='$id'";

$data = mysqli_query($conn,$query);

if($data){
    echo "<script>alert('gegevens opgeslagen')</script>";
    ?>
    <META HTTP-EQUIV="Refresh" CONTENT="0; URL=https://p21t4.lesonline.nu/admin(accountmanage)klantoverzicht.php">
    <?php
}else{
    echo "<script>alert('Het is niet gelukt om uw gegevens te wijzigen, Probeer later opnieuw')</script>";
}
}
?>