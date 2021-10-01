<?php 
require_once "models/Model.php";
class Product extends Model {
	public $id;
	public $category_id;
	public $title;
	public $avatar;
	public $price;
	public $amount;
	public $summary;
	public $content;
	public $status;

	public function checkProductExits($title) {
		$obj_select = $this->connection->prepare("SELECT * FROM products WHERE title=:title");
		$arr = [':title' => $title];
		$obj_select->execute($arr);
		$product = $obj_select->fetch(PDO::FETCH_ASSOC);

		return $product;
	}

	public function insert() {

		$obj_insert = $this->connection->prepare("INSERT INTO products(category_id, title, avatar, price, amount, summary, content, status, type)
												 VALUES (:category_id, :title, :avatar, :price, :amount, :summary, :content, :status, :type)");
		$arr_insert = [
				':category_id' => $this->category_id,
				':title' => $this->title,
				':avatar' => $this->avatar,
				':price' => $this->price,
				':amount' => $this->amount,
				':summary' => $this->summary,
				':content' => $this->content,
				':status' => $this->status,
				':type' => $this->type
		];
		$obj_insert->execute($arr_insert);
		$product_id = $this->connection->lastInsertId();
		return $product_id;
	}

	public function getTotalProduct() {
		$obj_total = $this->connection->prepare("SELECT COUNT(id) AS count_id FROM products");
		$obj_total ->execute();
		$total = $obj_total->fetchColumn();
		return $total;
	}

	public function getProducts($params_model = []) {
		$limit = $params_model['limit'];
		$start = $params_model['start'];

		$obj_select_all = $this->connection->prepare("
			SELECT products.*, categories.name AS category_name 
			FROM products INNER JOIN categories ON categories.id = products.category_id
			ORDER BY products.created_at DESC
			LIMIT $start, $limit");
		$arr_select = [];
		$obj_select_all->execute($arr_select);
		$products = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
		return $products;

	}

	public function getProductById($id) {
		$obj_select_id = $this->connection->prepare("SELECT * FROM products WHERE id=$id");
		$obj_select_id->execute();
		return $obj_select_id->fetch(PDO::FETCH_ASSOC);
	}

	public function update($id) {
		$obj_update = $this->connection->prepare("UPDATE products SET category_id=:category_id, title=:title, avatar=:avatar, price=:price, amount=:amount, summary=:summary, content=:content, status=:status, type=:type WHERE id=$id");
		$arr_update = [
			':category_id' => $this->category_id,
			':title' => $this->title,
			':avatar' => $this->avatar,
			':price' => $this->price,
			':amount' => $this->amount,
			':summary' => $this->summary,
			':content' => $this->content,
			':status' => $this->status,
			':type' => $this->type
		];
		return $obj_update->execute($arr_update);
	}

	public function delete($id) {
		$obj_delete = $this->connection->prepare("DELETE FROM products WHERE id=$id");
		return $obj_delete->execute();
	}

	public function removeAllImage($id) {
		$obj_delete = $this->connection->prepare("DELETE FROM image_products WHERE product_id=$id");
		return $obj_delete->execute();
	}

}


?>