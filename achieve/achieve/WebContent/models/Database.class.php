<?php
class Database {
	// Responsibility: maintains open DB connection (singleton)
    private static $db;
	private static $dsn = 'mysql:host=localhost;dbname=';
	private static $dbName;
	private static $username;
	private static $options = 
	   array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
	
	public static function getDB($dbName = 'achievelife') {
		
		if (!isset (self::$db) || self::$db == null) {
			try {
				$username = "root";
				$password = "";
				self::$dbName = $dbName;
				$dbspec = self::$dsn.self::$dbName.";charset=utf8";
				self::$db = new PDO ($dbspec, $username, $password, self::$options);
			} catch ( PDOException $e ) {
				self::$db = null;
				echo "Failed to open connection to ".self::$dbName. $e->getMessage();
			}
		}
		return self::$db;
	}
	
	public static function clearDB() {
		self::$db = null;
	}
}
?>