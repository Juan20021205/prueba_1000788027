<?php

class Database
{
    private static $dbServe = 'localhost';
    private static $dbName = 'palindromos';
    private static $dbUser = 'root';
    private static $dbPass = '';

    public static function Connection()
    {
        try {
            $connection = new PDO('mysql:host=' . self::$dbServe . '; dbname=' . self::$dbName . '; charset=utf8', self::$dbUser, self::$dbPass);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $connection;
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }
}
