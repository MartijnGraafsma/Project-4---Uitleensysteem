<?php
if(isset($_POST['submit'])){
    $id=$_POST['id'];
    $productnaam=$_POST['productnaam'];
    $beschrijving=$_POST['beschrijving'];
    $beschikbaarheid=$_POST['beschikbaarheid'];
    $inleverdatum=$_POST['inleverdatum'];
    $studentnr=$_POST['studentnr'];
    $van=$_POST['van'];
    $uitgeleend="";
    $opmerking=$_POST['opmerking'];

    include "conn.php";
    error_reporting(0);
    $sql = "UPDATE apparaatoverzicht SET productnaam='$productnaam',beschrijving='$beschrijving'
    ,inleverdatum='$inleverdatum',studentnr='$studentnr',van='$van',beschikbaarheid='$beschikbaarheid',
    uitgeleend='$uitgeleend',opmerking='$opmerking' WHERE id='$id'";
    
    $data = mysqli_query($conn,$sql);
    if($data){
        echo "<script>alert('Het appparaat is inleverd!')</script>";
        ?>
        <META HTTP-EQUIV="Refresh" CONTENT="0; URL=apparaatoverzicht(docent).php">
        <?php
        }else{
            echo "<script>alert('Sorry, uitlening is niet gelukt')</script>";
        }
}
?>