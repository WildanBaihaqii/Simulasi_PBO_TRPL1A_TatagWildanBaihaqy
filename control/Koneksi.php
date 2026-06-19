<?php
// File: koneksi/database.php

class Koneksi {
    private static $host = "127.0.0.1";// Sesuaikan dengan host MySQL Anda
    private static $db_name = "db_simulasi_pbo_trpl1a_tatagwildanbaihaqy";
    private static $username = "Baihaqy"; // Sesuaikan dengan username MySQL Anda
    private static $password = "1023";     // Sesuaikan dengan password MySQL Anda
    private static $conn = null;

    public static function getConnection() {
        if (self::$conn === null) {
            try {
                self::$conn = new PDO(
                    "mysql:host=" . self::$host . ";dbname=" . self::$db_name,
                    self::$username,
                    self::$password
                );
                // Mengatur error mode PDO ke Exception untuk mempermudah debugging
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $exception) {
                die("Koneksi database gagal: " . $exception->getMessage());
            }
        }
        return self::$conn;
    }
}
?>