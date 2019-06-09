<?php

session_start();
    if (isset($_SESSION['blad'])){
        unset($_SESSION['blad']);
    }
    
    require_once "connect.php";
    try{
        $polaczenie = new PDO($host, $db_user, $db_password);

        $rezultat = $polaczenie->prepare("SHOW TABLES");
        
        if ($rezultat->execute() ){
                $wynik = $rezultat->fetchALL(PDO::FETCH_COLUMN,"tabele");
                setcookie('ok', 'ok');
                echo json_encode($wynik);
                
                $rezultat->closeCursor(); 
                
         } else{
         
            //echo "niepolaczo";
            $_SESSION['blad'] = 'Wystąpił błąd';
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



