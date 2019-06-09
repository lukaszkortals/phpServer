<?php
    session_start();

    if(!isset($_SESSION['zalogowany'])){
        header('Location: index.php');
        exit();
    }
    if(!isset($_SESSION['baza'])){
     // header('Location: wybierz.php');
    }
    
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
        <meta charset="utf-8">
        <script  src="js.js"></script>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <link id="cssLink" rel="Stylesheet" type="text/css" href=""/>
        <title>LX db Editor</title>
        
</head>
<body>
     <header class="naglowek">
        <canvas id="logo" width="130" height="50"> </canvas>
        <br>
        <button id="cssGreen" class="zmianaCss" onclick="zmienCssNa('cssGreen.css') "  ></button>
        <button id="cssBlue"  class="zmianaCss" onclick="zmienCssNa('cssBlue.css') "></button>
        <button id="cssOrange"  class="zmianaCss" onclick="zmienCssNa('cssOrange.css') "></button>

        <div>
            Witaj w edytorze!!!
        </div>
    </header>
    <section>
        <div class="gl" id="tabela" onclick="dajListeTabel();">
            a tutaj prawy bedzi tabelka bal bla bla
        </div>
        <div class="lewyPanel">
        <?php

    //echo "na strona.php";
    echo '[<a href="logout.php">Wyloguj się!</a>]</p>';
    echo '[<a href="wybierz.php">Zmień bazę na inną!</a>]</p>';

    //echo "<p><b>Aktualna baza to </b>: ".$_SESSION['baza'];
    
?> 
        </div>

    </section>
   
    
    <footer class="stopka" style="text-align: center;">
        <?php
            $dataczas = new DateTime();
            echo "Copyright © ".$dataczas->format('Y')." Łukasz Kortals";
        ?>
        <div id="zegar">awaria zegara</div> 
    </footer>
</body>
</html>