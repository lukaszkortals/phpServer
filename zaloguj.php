<?php
	
    session_start();
    if (isset($_SESSION['blad'])){
        unset($_SESSION['blad']);
    }
    if((!isset($_POST['login'])) || (!isset($_POST['haslo']))){
        header('Location: index.php');
        exit();
    }
    if($_POST['login']=="" || $_POST['haslo']==""){
        $_SESSION['blad'] = 'Wprowadź login i hasło!!!';
        header('Location: index.php');
        exit();
    }
    require_once "connect.php";		//wymagane istnienie pliku a once daje nam to, że php będzie zapobiegać redundacji
echo "asd";
try{
    $polaczenie = new PDO($host, $db_user, $db_password);
    
    
        $login= $_POST['login'];	//pobranie przesłanych danych z formlarza
        $haslo= $_POST['haslo'];

        $login = htmlentities($login, ENT_QUOTES, "UTF-8");		//encje htmla podmienia znaki specjalne
        $haslo = htmlentities($haslo, ENT_QUOTES, "UTF-8");

        $sol1 = "solpierwsza";
        $sol2 = "soldruga";
        $posolone = sha1($sol1.$haslo.$sol2);
        
        $rezultat = $polaczenie->prepare("SELECT pass FROM uzytkownicy WHERE user = :login");
        $rezultat->bindParam(':login', $login);
        
        if ($rezultat->execute() && $rezultat->rowCount()>0){
                $wiersz = $rezultat->fetch(PDO::FETCH_ASSOC);
                if(password_verify($posolone, $wiersz['pass'])){
                //if(1==1){
                    $_SESSION['zalogowany'] = true;
                    $_SESSION['id'] = $wiersz['id'];
                    $_SESSION['user'] = $wiersz['user'];
                    $_SESSION['email'] = $wiersz['email'];
                    $_SESSION['baza'] = "master";                 //TODO przerobić
                    unset($_SESSION['blad']);

                    $rezultat->closeCursor(); 
                    header('Location: strona.php');
                }
                else{
                    $_SESSION['blad'] = 'Nieprawidłowy login lub hasło!!!';
                    header('Location: index.php');
                }
         }
         $_SESSION['blad'] = 'Nieprawidłowy login lub hasło!!!';
         header('Location: index.php');
         $polaczenie= null;
} 
catch(Exception $e){
    echo '<span style="color:red;">Błąd! Sprobuj później</span>';
    //szczegolowy blad                
    //echo '<br/>informacja dev: ' .$e;
    //mniejszczegolowy
    //echo '<br/>'.$e->getMessage();

}
?>
