<?php
    session_start();
    if (isset($_SESSION['blad'])){
        unset($_SESSION['blad']);
    }
    
    require_once "connect.php";
    try{
        $polaczenie = new PDO($host, $db_user, $db_password);

        $login= $_SESSION['user'];

        $login = htmlentities($login, ENT_QUOTES, "UTF-8");


        $rezultat = $polaczenie->prepare("SHOW DATABASES");
        //$rezultat->bindParam(':login', $login);

        if ($rezultat->execute() ){
                $wynik = $rezultat->fetchALL(PDO::FETCH_COLUMN,"bazy");
               //setcookie('test','girata');
                
                echo json_encode($wynik);
                
                $rezultat->closeCursor(); 
                
         } else{
         
            //echo "niepolaczo";
            $_SESSION['blad'] = 'Nie masz żadnych baz';
            $rezultat->closeCursor(); 
            $polaczenie= null;
            header('Location: index.php');
         }
    } 
    catch(Exception $e){
      echo '<span style="color:red;">Błąd! Sprobuj później</span>';
        //szczegolowy blad                
       // echo '<br/>informacja dev: ' .$e;
        //mniejszczegolowy
     //   echo '<br/>'.$e->getMessage();

    }

