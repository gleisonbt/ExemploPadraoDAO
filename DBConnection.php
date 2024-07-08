<?php

class DBConnection {
    private static $conn;

    public static function getConnection() {
        if (self::$conn === null) {
            try {
                $dsn = "pgsql:host=silly.db.elephantsql.com;port=5432;dbname=paukxtmh";
                $username = "paukxtmh";
                $password = "jyKqRbQn85A1B27BfbNPOXQBdVKxwMLj";

                self::$conn = new PDO($dsn, $username, $password);
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }
        return self::$conn;
    }
}

?>
