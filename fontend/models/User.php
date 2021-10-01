<?php 
require_once 'models/Model.php';
class User extends Model {

	public function getUser($email, $password) {
		$obj_user = $this->connection->prepare("SELECT * FROM users WHERE email=:email AND password=:password AND role_id != 1");
		$arr_user = [
			':email' => $email,
			':password' => $password
		];
		$obj_user->execute($arr_user);
		$user = $obj_user->fetch(PDO::FETCH_ASSOC);
		return $user;

	}

	public function isExistUsername($email) {
		$obj_select_one = $this->connection->prepare("SELECT * FROM users WHERE email = :email");
		$select = [':email' => $email];
		$obj_select_one->execute($select);
		$user = $obj_select_one->fetch(PDO::FETCH_ASSOC);

		if (!empty($user)) {
			return TRUE;
		}
		return FALSE;
	}


	public function register($first_name, $last_name, $phone, $email, $password, $address) {
		$obj_insert = $this->connection->prepare('INSERT INTO users(first_name, last_name, phone, email, password, address, role_id) VALUES (:first_name, :last_name, :phone, :email, :password, :address, :role_id)');
		$inserts = [
			':first_name' => $first_name,
			':last_name' => $last_name,
			':phone' => $phone,
			':email' => $email,
			':password' => $password,
			':address' => $address,
			':role_id' => 0
		];
		return $obj_insert->execute($inserts);
	}
 
}


?>