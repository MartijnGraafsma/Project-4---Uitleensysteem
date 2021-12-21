<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="apparatentoevoegen.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <title> "Apparaten toevoegen"</title>
</head>
<body>
    <div class="container">
        <div>
            <h2 class="top-tekst">Apparaat toevoegen</h2>
            <from method="POST" action="#">
                <input class="apparaatnaam" type="text" name="productnaam" placeholder="Naam"> <br>
                <input class="beschrijving" type="text" name="beschrijving" placeholder="Beschrijving...">
                <input class="" type="file" id="file" name="foto" accept="image/*" placeholder="Voeg foto toe">
            <label for="file">
            <i class="far fa-file-image"></i> &nbsp;
              Voeg foto toe  
            </label>
            </form>
        </div>
    </div>
</body>
</html>