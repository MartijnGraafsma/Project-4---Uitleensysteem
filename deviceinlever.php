<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="deviceinlever.css">
    <link rel="stylesheet" href="header.css">
</head>
<body>
  <!-- hieronder staat de navigatiebalk -->
<div class="header" id="header">
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

<form action="deviceinlever2.php" method="POST" class="column">
    <br>
    <input class="opmerking" type="text" name="Van" placeholder="Van" required>
  
  <button class="inleveren" type="submit" name="knop">Inleveren</button>
        

        </body>