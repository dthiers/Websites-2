<?php
	class Database
	{
		private $mysqli;
		private $result;
                static $database = null;
                
		// je kunt hier ook het config.inc.php bestandje includen en dan de $database var gebruiken
		const LOCATION = 'localhost';
		const LOGINNAME = 'root';
		const PASSWORD = '';
		
		
		private function __construct($input_db)
		{
			$this->mysqli = new mysqli(
									// je kunt self gebruiken om de class aan te geven
									// een const is static (per definitie)
									self::LOCATION, 
									self::LOGINNAME,
									self::PASSWORD,
									$input_db);
			
			// geen connectie? script afbreken
			if (mysqli_connect_errno()) {
				printf("Connect failed: %s\n", mysqli_connect_error());
				exit();
			}
		}
		
		public function doSQL($input_query)
		{
			$this->result = $this->mysqli->query($input_query)
				or die($this->mysqli->error.__LINE__);
		}
		
		public function readRecord()
		{
			return $this->result->fetch_assoc(); 
		}
                
                static function getDatabase() {
                    if (Database::$database == null) {
                        Database::$database = new Database('week2');
                    }
                    return Database::$database;
                }
	}
?>