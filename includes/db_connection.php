<?php
define('DB_HOST', 'fdb1032.awardspace.net');
define('DB_USER', '4366992_crudmalicki');
define('DB_PASS', 'Crudmalicki123#');
define('DB_NAME', '4366992_crudmalicki');

function getDbConnection() {

    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8";

    try {
        $pdo = new PDO($dsn, DB_USER, DB_PASS);

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        return $pdo;
    } catch (PDOException $e) {
        die("Błąd połączenia z bazą danych: " . $e->getMessage());
    }
}
?>
