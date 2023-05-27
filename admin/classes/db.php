<?php
//include('../controllers/Cr4slolo.php');


Class Db {
	private $hostname = 'localhost';
	private $username = 'root';
	
	private $password = '';
	private $dbname = 'hiring-driver';
	public $conn;
	public $tableName;
	public $order = '';

	public function __construct(){
		
		return $this->conn = new mysqli(
			$this->hostname,
			$this->username,
			$this->password,
			$this->dbname

		);
	}


    public function select($where = '')
	{
		$sql = "SELECT * FROM $this->tableName ";

		$query = (is_null($where)) ? $sql . ' '  : $sql .= 'where ' . 'id=' . $where ;

		// echo $query; exit;
		$result = $this->conn->query($query);
		// print_r($result); exit;
		if($result->num_rows > 0){
			while($rows = $result->fetch_assoc()){
				$array[] = $rows;
			}
			return $array;
		} 

			return [];
	}

	public function update($data = array()){
		


		/*
		loop for update each cells of the row 

		*/
		foreach(array_keys($data) as $key){
			// print_r($data[$key]);
			if($data[$key] !== NULL){

				$query = "UPDATE $this->tableName SET {$key} = '{$data[$key]}' where id = {$data['id']}";
				$result = $this->conn->query($query);
			}

		}

		if($this->conn->query($query)) {
			return "success";
		}

		return "error";
	}


	public function selectOnly($where = '')
	{
		$sql = "SELECT * FROM $this->tableName ";

		$query = (is_null($where)) ? $sql . ' '  : $sql .= $where . ' ';

		$result = $this->conn->query($query);
		if($result->num_rows > 0){
			while($rows = $result->fetch_assoc()){
				$array[] = $rows;
			}
			return $array;
		} 

			return [];
	}


	public function insert($data = array()) {

		if(!empty($data)){
			$tableColumns = implode(",", array_keys($data));
			$values = implode("','", array_values($data));
			
			$query = "INSERT INTO $this->tableName ($tableColumns) VALUES ('$values')";

			
			if($this->conn->query($query)) {
				return "success";
			}

			return "error";
		}
	}


	public function delete($id) {
		$query = "DELETE FROM $this->tableName WHERE id = {$id}";
		$result = $this->conn->query($query);

		if($this->conn->query($query)) {
			return "success";
		} else {
			return "denied";
		}
		



	}



	public function selectIp($where = '')
	{
		$sql = "SELECT * FROM $this->tableName ";

		$query = (is_null($where)) ? $sql . ' '  : $sql .= 'where ' . 'ip_addr=' . '"' . $where . '"';


		$result = $this->conn->query($query);
		if($result->num_rows > 0){
			while($rows = $result->fetch_assoc()){
				$array[] = $rows;
			}
			return $array;
		} 

			return [];
	}


	public function selectCount($ipAddr)
	{

		$sql = "SELECT count(*) as 'count' from loginlogs WHERE (ip_addr LIKE '$ipAddr') AND (blocked_time between date_sub(now(),interval 3 minute) and  now());";

		$result = $this->conn->query($sql);

		if($result->num_rows > 0){
			while($rows = $result->fetch_assoc()){
				$array[] = $rows;
			}
			return $array;
		}

		return [];
		



	}

	public function selectWhere($where = '')
	{
		$sql = "SELECT * FROM $this->tableName ";

		$query = (is_null($where)) ? $sql . ' '  : $sql .= $where . ' ';

	
		$result = $this->conn->query($query);
		if($result->num_rows > 0){
			while($rows = $result->fetch_assoc()){
				$array[] = $rows;
			}
			return $array;
		} 

			return [];
	}




}
