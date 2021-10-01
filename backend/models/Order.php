<?php 
require_once 'models/Model.php';
class Order extends Model {

	public function getAllOrders() {
		$obj_select = $this->connection->prepare('SELECT * FROM orders');
		$obj_select->execute();
		return $obj_select->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getTotalOrder() {
		$obj_total = $this->connection->prepare("SELECT COUNT(id) AS count_id FROM orders");
		$obj_total ->execute();
		$total = $obj_total->fetchColumn();
		return $total;
	}
	public function getOrders($params_model = []) {
		$limit = $params_model['limit'];
		$start = $params_model['start'];

		$obj_select = $this->connection->prepare("SELECT * FROM orders ORDER BY created_at DESC LIMIT $start, $limit");
		$obj_select->execute();
		$orders = $obj_select->fetchAll(PDO::FETCH_ASSOC);
		return $orders;

	}
	public function getOrderById($id) {
		$obj_select = $this->connection->prepare("SELECT * FROM orders WHERE id=$id");
		$obj_select->execute();
		return $obj_select->fetch(PDO::FETCH_ASSOC);
	}

	public function update($id) {
		$obj_update = $this->connection->prepare("UPDATE orders SET payment_status = :payment_status WHERE id=$id");
		$arr_update = [':payment_status' =>$this->payment_status];
		return $obj_update->execute($arr_update);

	}

	public function deleteProduct($id) {
		$obj_delete = $this->connection->prepare("DELETE FROM order_details1 WHERE order_id=$id");
		return $obj_delete->execute();
	}

	public function delete($id) {
		$obj_delete = $this->connection->prepare("DELETE FROM orders  WHERE id=$id");
		return $obj_delete->execute();
	}

	public function sumPriceTotal() {
		$obj_sum = $this->connection->prepare("SELECT SUM(price_total) AS sum_price_total FROM orders");
		$obj_sum->execute();
		return $obj_sum->fetchColumn();
	}
}



?>