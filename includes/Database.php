<?php
require_once 'db_connection.php';

class Database {
    private $pdo;

    public function __construct() {
        $this->pdo = getDbConnection();
    }

    public function getConnection() {
        return $this->pdo;
    }

    public function query(string $sql, array $params = []) {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    public function fetch(string $sql, array $params = []) {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function fetchAll(string $sql, array $params = []) {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getLastInsertId() {
        return $this->pdo->lastInsertId();
    }
}
?>
