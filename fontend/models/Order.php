<?php 
require_once 'models/Model.php';
class Order extends Model {

	public function insert() {
		$obj_insert = $this->connection->prepare("INSERT INTO orders(fullname, address, mobile, email, note, price_total, payment_status) VALUES (:fullname, :address, :mobile, :email, :note, :price_total, :payment_status) ");
		$arr_insert = [
			':fullname' => $this->fullname,
			':address' => $this->address,
			':mobile' => $this->mobile,
			':email' => $this->email,
			':note' => $this->note,
			':price_total' => $this->price_total,
			':payment_status' => $this->payment_status
		];
		$obj_insert->execute($arr_insert);
		$order_id = $this->connection->lastInsertId();
		return $order_id;
	}
	 public function getAllOrderByUser($email) {
	 	$obj_select = $this->connection->prepare("SELECT * FROM orders WHERE email = '$email'");
	 	$obj_select->execute();
	 	return $obj_select->fetchAll(PDO::FETCH_ASSOC);

	 }
}



?>