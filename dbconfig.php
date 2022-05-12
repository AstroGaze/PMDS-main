<?php
    session_start();
    define('DB_Host','localhost:3306');
    define('DB_Name','u157913818_PMDS');
    define('DB_Username','root');
    define('DB_Password','');

    function getDB(){
        $host = DB_Host;
        $dbname = DB_Name;
        $username = DB_Username;
        $password = DB_Password;
        try {
            $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            return $pdo;
        }
        catch (PDOException $e) {
            die("Error occurred:" . $e->getMessage());
        }
    }
    ?>