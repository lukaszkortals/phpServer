<?php
    session_start();

    if(!isset($_SESSION['zalogowany'])){
        header('Location: index.php');
        exit();
    }
    if(isset($_SESSION['baza'])){
        unset($_SESSION['baza']);
    }
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
        <meta charset="utf-8">
        <script  src="js.js"></script>
        <!--script src="jquery-3.2.1.min.js"></script-->
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
            <a>Wybierz bazę!!!</a>
        </div>
    </header>
    <section> 
        <div class="gl">
            <script>dajListeBaz();</script>
            <form name='formBaza' method="post">
                <select class="button" id="wyborBazy" name="baza" onchange="ustawBaze(value); location.href='strona.php'">
                </select>
                <!--input type='submit' name='submit' class="button" type="button" onclick="location.href='strona.php'" value="Zatwierdź"/-->
            </form>
        </div>
        
        <?php
            //echo "NA WYBIERZ.PHP";
            echo "<p>".$_SESSION["user"]."[<a href='logout.php'>Wyloguj się!</a>]</p>";
            //echo "<br>user to ".$_SESSION['baza']."</br>";
           // echo "<p><b>Wybierz bazę</b>: ";
        ?>
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