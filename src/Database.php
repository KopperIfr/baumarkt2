<?php
// Using Singleton pattern.

final class Database {

    private static $instance = null;
    private static $dbc;

    private function __construct(){
        self::initConnection();
    }

    public function __clone() {
        throw new Exception("Cloning the instance of Database is not allowed");
    }
    public function __wakeup() {
        throw new Exception("Unserializing the instance of Database is not allowed");
    }

    private static function initConnection() {
        try {

            self::$dbc = new PDO('mysql:host=localhost;dbname=baumarkt;', 'root', '');
            self::$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch(PDOException $e) {
            throw new Exception("Error ocurred while connecting to database: " . $e->getMessage());
        }
    }

    public static function setInstance() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
    }

    public static function getConnection() {
        return self::$dbc;
    }


}