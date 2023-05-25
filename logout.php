<?php
    /**
     * file che permette di fre il logout da una sessione reindirizzando l'utente alla pagina di accesso
     */
    session_start();
    header("Location: http://54.36.188.122/index.php");
    session_destroy();
?>