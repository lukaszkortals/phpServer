<?php

if (!isset($_COOKIE["user"])) {
    setcookie("user", time(), time() + 86400, "/");
    
} else {
    echo $_COOKIE["user"];
}
?>


//TODO wykorzystać ciasteczka