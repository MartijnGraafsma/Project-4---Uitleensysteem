<?php
if(isset($_POST['submit'])){ 
    $id=$_POST['id'];
    $productnaam=$_POST['productnaam'];
    $beschrijving=$_POST['beschrijving'];
    $beschikbaarheid=$_POST['beschikbaarheid'];
    $inleverdatum=$_POST['inleverdatum'];
    $studentnr=$_POST['studentnr'];
    $van=$_POST['van'];
    $uitgeleend=$_POST['uitgeleend'];
    
    $receiver = "$studentnr".'@edu.rocfriesepoort.nl';
    $subject= "U heeft een apparaat geleend";
    $body = "Beste $uitgeleend, \r\nu heeft een $productnaam geleend van $van
    \r\nU moet voor $inleverdatum inleveren. \r\n\r\nVeel plezier!\r\n\r\nMet vriendelijke groet,\r\nROC Friese Poort";
    
    if(mail($receiver, $subject, $body)){
        echo "<script>alert('Het is gelukt om een apparaat uit te lenen!')</script>";
        ?>
        <META HTTP-EQUIV="Refresh" CONTENT="0; URL=apparaatoverzicht(docent).php">
        <?php
    }else{
        echo "<script>alert('Sorry, uitlening is niet gelukt')</script>";
    }
       
    include "conn.php";
    error_reporting(0);
    $sql = "UPDATE apparaatoverzicht SET productnaam='$productnaam',beschrijving='$beschrijving'
    ,inleverdatum='$inleverdatum',studentnr='$studentnr',van='$van',beschikbaarheid='$beschikbaarheid',
    uitgeleend='$uitgeleend' WHERE id='$id'";
    
    $data = mysqli_query($conn,$sql);
    if($data){
        ?>
        <META HTTP-EQUIV="Refresh" CONTENT="0; URL=apparaatoverzicht(docent).php">
        <?php
    }
}
?>

      
