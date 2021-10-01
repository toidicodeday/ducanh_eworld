<?php 
require_once 'models/Model.php';
class OrderDetail extends Model {

	public function insert() {
		$obj_insert = $this->connection->prepare("INSERT INTO order_details1 (order_id, product_name, product_price, quantity) VALUES (:order_id, :product_name, :product_price, :quantity) ");
		$arr_insert = [
			':order_id' => $this->order_id,
			':product_name' => $this->product_name,
			':product_price' => $this->product_price,
			':quantity' => $this->quantity
		];

		return $obj_insert->execute($arr_insert);
	}

	public function getOrderDetailByIdOrder($id) {
		$obj_select = $this->connection->prepare("SELECT * FROM order_details1 WHERE order_id=$id");
		$obj_select->execute();
		return $obj_select->fetchAll(PDO::FETCH_ASSOC);
	}

}

?>