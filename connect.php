<?php
/**
 * File usato per la connessione al database
 */
$dbname = "shop";
$hostname = "localhost";
$pwd = "admin";
$username = "admin";
$db = new mysqli($hostname,$username, $pwd, $dbname);
?>
