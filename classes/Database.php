<?php 

/** 
 * Database class
 */ 
class Database {

	/**
	 * PDO
	 *
	 * @access private 
	 */
	private static $PDO;

	/**
	 * Config
	 *
	 * @access private 
	 */	
	private static $config;

	
	 private static $server='127.0.0.1:3306'; // server name
     public static $loginBdd ='root' ;  // login
     private static $passwordPasseBdd=''; // password
     private static $dataBase='conf_tdsi'; // data base name
	 private static $driver = "mysql";
     private static $char_set = "utf8";
	/**
	 * Constructor
	 * 
	 * @access public 
	 */	   		
	public function __construct() {
	
		if (!extension_loaded('pdo'))
			die('The PDO extension is required.');

		//self::$config = config_load('database');
		
		self::connect();
		
	}

	/**
     * Connect
     * 
     * @access public
     */		
	public function connect() {
		
		if (empty(self::$driver)) 
			die('Please set a valid database driver from database.php');
				
		$driver = strtoupper(self::$driver);
		
		switch ($driver) {

			case 'MYSQL':

				try {
				
					self::$PDO = new PDO('mysql:host=' . self::$server . ';dbname=' . self::$dataBase, self::$loginBdd, self::$passwordPasseBdd);
					self::$PDO->query('SET NAMES ' . self::$char_set);

					} catch (PDOException $exception) {

						die($exception->getMessage());
						
					}
				
				return self::$PDO;
				
			break;

			default:
				die('This database driver does not support: ' . self::$driver);
				
		}
					
	}
        
	/**
	 * Executes an SQL statement
	 *
	 * @access public 
	 */
     public function query($statement) {
		
		return self::$PDO->query($statement);

	}

	/**
	 * Returns the number of rows affected
	 *
	 * @access public 
	 */	
    public function row_count($statement) {
	
		return self::$PDO->query($statement)->rowCount();
		
    }

	/**
	 * Execute query and return one row in assoc array
	 *
	 * @access public 
	 */
    public function fetch_row_assoc($statement) {
	
		return self::$PDO->query($statement)->fetch(PDO::FETCH_ASSOC);
		
    }

	/**
	 * Returns the ID of the last inserted row
	 *
	 * @access public
	 */
	public function last_insert_id() {
		
		return self::$PDO->lastInsertId();
	
	}

	/**
	 * Insert a value into a table
	 * 
	 * @acces public
	 */ 
	public function insert($table, $values) {			
		
		foreach ($values as $key => $value)
			$field_names[] = $key . ' = :' . $key;

		$sql = "INSERT INTO " . $table . " SET " . implode(', ', $field_names);

		$stmt = self::$PDO->prepare($sql);
		foreach ($values as $key => $value)
			$stmt->bindValue(':' . $key, $value);

		$stmt->execute();
			
	}
	    
	/**
	 * Update a value in a table
	 * 
	 * @access public
	 */ 
	public function update($table, $values, $field_name, $id) {

		foreach ($values as $key => $value)
			$field_names[] = $key . ' = :' . $key;

		$sql = "UPDATE " . $table . " SET " . implode(', ', $field_names) . " WHERE " . $field_name . " = :id";

		$stmt = self::$PDO->prepare($sql);
		foreach ($values as $key => $value)
			$stmt->bindValue(':' . $key, $value);

		$stmt->bindParam(':id', $id, PDO::PARAM_STR);
		$stmt->execute();
		
	}

	/**
	 * Delete a record
	 * 
	 * @access public
	 */ 
	public function delete($table, $field_name, $id) {
            
            $sql = "DELETE FROM " . $table . " WHERE " . $field_name . " = :id";
            $stmt = self::$PDO->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_STR);
            $stmt->execute();
            
    }
        	        	
}
