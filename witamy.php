<?php
    session_start();
   if(isset($_SESSION['udana_rejestracja'])){
        header('Location: strona.php');
        exit();
    }
    else{
        unset($_SESSION['udana_rejestracja']);
    }
    //usuwamy zmienne ktore sluzyly do zapamietania wartosci w razie niudanej walidacji
    if(isset($_SESSION['fr_nick'])){
        unset($_SESSION['fr_nick']);
    }
    if(isset($_SESSION['fr_email'])){
        unset($_SESSION['fr_email']);
    }
    if(isset($_SESSION['fr_haslo1'])){
        unset($_SESSION['fr_haslo1']);
    }
    if(isset($_SESSION['fr_haslo2'])){
        unset($_SESSION['fr_haslo2']);
    }
    if(isset($_SESSION['fr_regulamin'])){
        unset($_SESSION['fr_regulamin']);
    }
    //usuwanie bledow
    if(isset($_SESSION['e_nick'])){
        unset($_SESSION['e_nick']);
    }
    if(isset($_SESSION['e_email'])){
        unset($_SESSION['e_email']);
    }
    if(isset($_SESSION['e_haslo'])){
        unset($_SESSION['e_haslo']);
    }
    if(isset($_SESSION['e_robot'])){
        unset($_SESSION['e_robot']);
    }
    if(isset($_SESSION['e_regulamin'])){
        unset($_SESSION['e_regulamin']);
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
    <section style=" text-align: center;">
        
        Dziękujemy za za rejestrację. Proszę się zalogować <br/><br/>
        <a href="index.php">Zaloguj!</a><br><br/>
       
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