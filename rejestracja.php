<?php
            session_start();
                  
    if(isset($_POST['email'])){
            //udana walidacja? załózny ze tak
            $wszystko_OK=true;
            //sprawdzenie nickname
            $nick = $_POST['nick'];

            //sprawdzenie dlugosci nicka
            if((strlen($nick)<3) ||(strlen($nick)>20)){
                $wszystko_OK=false;
                $_SESSION['e_nick']="Nick musi posiadać od 3 do 20 znaków";
            }

            if(ctype_alnum($nick)==false){
                $wszystko_OK=false;
                $_SESSION['e_nick']="Nick może składać sie tylko z liter i cyfr (bez polskich znaków)";
            }

            //Sprawdz poprawnosci emaila
            $email = $_POST['email'];
            $emailB = filter_var($email, FILTER_SANITIZE_EMAIL);

            if ((filter_var($emailB,FILTER_VALIDATE_EMAIL)==FALSE) || $email!=$emailB){
                $wszystko_OK=false;
                $_SESSION['e_email']="Podaj poprawny adres e-mail!";
            }

            //Sprawdź poprawność hasło
            $haslo1 = $_POST['haslo1'];
            $haslo2 = $_POST['haslo2'];

            if((strlen($haslo1)<8) || strlen($haslo1)>20){
                $wszystko_OK=false;
                $_SESSION['e_haslo']="hasło musi posiadać od 8 do 20  znaków";
            }

            if($haslo1!=$haslo2){
                $wszystko_OK=false;
                $_SESSION['e_haslo']="podane hasła nie są identyczne";
            }
            $sol1 = "solpierwsza";
            $sol2 = "soldruga";
            $posolone = sha1($sol1.$haslo1.$sol2);
            $haslo_hash = password_hash($posolone, PASSWORD_DEFAULT);
            
            //Czy zaakceptowano regulamin
            if (!isset($_POST['regulamin'])){
                $wszystko_OK=false;
                $_SESSION['e_regulamin']="potwierdź akceptację regulaminu";
            }
            
            //Czy robot
            $sekret = '6LedUzgUAAAAAHDWdZsYHA9RDOK5OS4sX9mz6jPE';
            
            $sprawdz = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$sekret.'&response='.$_POST['g-recaptcha-response']);
            
            $odpowiedz = json_decode($sprawdz);
            
            if($odpowiedz->success == false){
                $wszystko_OK=false;
                $_SESSION['e_robot']="potwierdź, że nie jesteś robotem";
            }
            
            //zapamietanie wprowadzonych danych
            $_SESSION['fr_nick'] = $nick;
            $_SESSION['fr_email'] = $email;
            $_SESSION['fr_haslo1'] = $haslo1;
            $_SESSION['fr_haslo2'] = $haslo2;
            
            if(isset($_POST['regulamin'])){
                $_SESSION['fr_regulamin']=true;
            }
            
            require_once 'connect.php';
            
            try{
               //conekt
                $polaczenie = new PDO($host, $db_user, $db_password);
                
                    //Czy mail jest już w bazie
                    $prepared=$polaczenie->prepare("select id from uzytkownicy where email= :email");
                    $prepared->bindParam(':email', $email);
                    $rezultat =$prepared->execute();
                    
                    if (!$prepared) {
                        throw new Exception($polaczenie->error);
                    }
                    if($prepared->rowCount()>0){
                        $wszystko_OK=false;
                        $_SESSION['e_email']="istnieje już konto przypisane do tego adresu email";
                    }   
                
                    $prepared->closeCursor();
                    $prepared=$polaczenie->prepare("select id from uzytkownicy where user= :nick");
                    $prepared->bindParam(':nick', $nick);
                    $rezultat = $prepared->execute();
                   
                    //Czy login jest już w bazie
                    if($prepared->rowCount()>0){
                        $wszystko_OK=false;
                        $_SESSION['e_nick']="Nick jest już zajęty";
                    }
                    if($wszystko_OK==true){
                    //wszystkie testy zaliczone 
                        $prepared = $polaczenie->prepare("INSERT INTO uzytkownicy VALUES(NULL, :nick, '$haslo_hash', :email)");
                        $prepared->bindParam(':nick', $nick);
                        $prepared->bindParam(':email', $email);
                        if($prepared->execute() ){            //insert usera do bazy
                            $_SESSION['udana_rejestracja'] = true;
                            header('Location: witamy.php');
                            
                        }   
                        else{
                            throw new PDOException();
                        }
                    }
                    $prepared->closeCursor();
                    $polaczenie = null;
            }
            catch(Exception $e){
                echo '<span style="color:red;">Błąd! Sprobuj później</span>';
                
                //szczegolowy blad                
                //echo '<br/>informacja dev: ' .$e;
                //mniejszczegolowy
                //echo '<br/>'.$e->getMessage();
            }
    }
	
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
        <meta charset="utf-8">
        <script  src="js.js"></script>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <link id="cssLink" rel="Stylesheet" type="text/css" href="" />
        <title>LX db Editor</title>
         <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
     <header class="naglowek">
        <canvas id="logo" width="130" height="50"> </canvas>
        <br>
        <button id="cssGreen" class="zmianaCss" onclick="zmienCssNa('cssGreen.css') "  ></button>
        <button id="cssBlue"  class="zmianaCss" onclick="zmienCssNa('cssBlue.css') "></button>
        <button id="cssOrange"  class="zmianaCss" onclick="zmienCssNa('cssOrange.css') "></button>

        <div>
          Wprowadź swoje dane!!!
        </div>
    </header>
    <section>
        <form id="rejestracja" method = "post">
            Nickname: <br><input type="text" value="<?php
            if(isset($_SESSION['fr_nick'])){
                echo $_SESSION['fr_nick'];
                unset($_SESSION['fr_nick']);
            }
            ?>" name="nick" /><br/>

            <?php
                if (isset($_SESSION['e_nick'])){
                    echo '<div class="error">'.$_SESSION['e_nick'].'</div>';
                    unset($_SESSION['e_nick']);
                }	
            ?>

            E-mail: <br><input type="text" value="<?php
            if(isset($_SESSION['fr_email'])){
                echo $_SESSION['fr_email'];
                unset($_SESSION['fr_email']);
            }
            ?>" name="email" /><br/>

            <?php
                if (isset($_SESSION['e_email'])){
                    echo '<div class="error">'.$_SESSION['e_email'].'</div>';
                    unset($_SESSION['e_email']);
                }	
            ?>

            Twoje hasło: <br><input type="password" value="<?php
            if(isset($_SESSION['fr_haslo1'])){
                echo $_SESSION['fr_haslo1'];
                unset($_SESSION['fr_haslo1']);
            }
            ?>" name="haslo1" /><br/>

            <?php
                if (isset($_SESSION['e_haslo'])){
                    echo '<div class="error">'.$_SESSION['e_haslo'].'</div>';
                    unset($_SESSION['e_haslo']);
                }	
            ?>

            Powtórz hasło: <br><input type="password" value="<?php
            if(isset($_SESSION['fr_haslo2'])){
                echo $_SESSION['fr_haslo2'];
                unset($_SESSION['fr_haslo2']);
            }
            ?>" name="haslo2" /><br/>

            <label>
                <input type="checkbox" name="regulamin"<?php 
                if(isset($_SESSION['fr_regulamin'])){
                    echo "checked";
                    unset($_SESSION['fr_regulamin']);
                }
                ?>/>akceptuję regulamin
            </label>
            <?php
                if (isset($_SESSION['e_regulamin'])){
                    echo '<div class="error">'.$_SESSION['e_regulamin'].'</div>';
                    unset($_SESSION['e_regulamin']);
                }	
            ?>

            <div class="g-recaptcha" data-sitekey="6LedUzgUAAAAAN2H9sAn7L1bAE5wSGXYEQ2gX6wX"></div>
            <?php
                if (isset($_SESSION['e_robot'])){
                    echo '<div class="error">'.$_SESSION['e_robot'].'</div>';
                    unset($_SESSION['e_robot']);
                }	
            ?>
            <br/>
            <input class="button" type="submit" value="Zarejestruj się"/>
        </form>
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