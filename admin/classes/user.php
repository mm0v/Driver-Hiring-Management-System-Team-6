<?php
include('../controllers/Cr4slolo.php');

include('db.php');

class User extends Db
{
	public function isLoggedIn($username, $password)
	{

		#$password = password_hash($password, PASSWORD_DEFAULT);
        $password = md5($password);
		$sql = "SELECT * FROM cred_users WHERE username = '$username' and password = '$password' and active = '1'"; 


		$query = $this->conn->query($sql);

		if($query->num_rows > 0){

			$row = $query->fetch_array();
			return $row;
		}else {
			// return 0 if user incorrect
			return 0;
		}
	}
}
