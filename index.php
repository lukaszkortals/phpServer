<?php
    session_start();
    if(isset($_SESSION['zalogowany']) && $_SESSION['zalogowany'] ==true){
        header('Location: strona.php');
        exit();
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
        <form id="logowanie" action="zaloguj.php" method="post" >
            <p style="font-weight: bold;">Logowanie</p> <br>
                Login: <br/><input type="text" name= "login" /><br/>
                Haslo: <br/><input type="password" name= "haslo" /><br/><br/><br/>
           <input class="button" type="submit" value="zaloguj sie"/>
           <input type="button" class ="button" value ="Załóż nowe konto" onclick="location.href='rejestracja.php'"/>
       </form>
           <?php
           if(isset($_SESSION['blad'])){
               echo '<div class="error">'.$_SESSION['blad'].'</div>';
               unset($_SESSION['blad']);
           }
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