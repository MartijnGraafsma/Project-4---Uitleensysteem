<?php
if(isset($_POST['submit'])){ 
    $id=$_POST['id'];
    $productnaam=$_POST['productnaam'];
    $beschrijving=$_POST['beschrijving'];
    $beschikbaarheid=$_POST['beschikbaarheid'];
    $inleverdatum=$_POST['inleverdatum'];
    $email=$_POST['email'];
    $van=$_POST['van'];
    $uitgeleend=$_POST['uitgeleend'];
    
    $receiver = "$email";
    $subject= "U heeft een apparaat geleend";
    $body = "Beste $uitgeleend, \r\n u heeft een $productnaam geleend van $van
    \r\n U moet voor $inleverdatum inleveren
    
    Veel plezier!
    
    Met vriendelijke groet,
    ROC Friese Poort";
    
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
    ,inleverdatum='$inleverdatum',email='$email',van='$van',beschikbaarheid='$beschikbaarheid',
    uitgeleend='$uitgeleend' WHERE id='$id'";
    
    $data = mysqli_query($conn,$sql);
    if($data){
        ?>
        <META HTTP-EQUIV="Refresh" CONTENT="0; URL=apparaatoverzicht(docent).php">
        <?php
    }
}
?>

      
