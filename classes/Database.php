<?php

class Database {
    private $host = "localhost";
    private $db_name = "bes5l5";
    private $username = "root";
    private $password = "";
    private $conn;

    // Metodo per stabilire la connessione
    public function connect() {
        $this->conn = null;

        try {
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->db_name;
            $this->conn = new PDO($dsn, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo "Errore di connessione: " . $e->getMessage();
        }

        return $this->conn;
    }
}
?>
