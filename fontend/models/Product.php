<?php 
require_once 'models/Model.php';
require_once '../backend/models/Pagination.php';
class Product extends Model {

	public function getAllProducts($params = []) {

		$str_where = 'WHERE TRUE';
		if(isset($params['text_search'])) {
			$text_search = $params['text_search'];
			$str_where .= " AND title LIKE '%$text_search%'";
		}


		$obj_select_all =$this->connection->prepare("SELECT * FROM products $str_where");
		$obj_select_all->execute();
		return $products= $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
	}
	public function getNewProducts() {

		$obj_select_new = $this->connection->prepare('SELECT * FROM products WHERE type = 0 AND status = 1');
		$obj_select_new->execute();
		$new_products = $obj_select_new->fetchAll(PDO::FETCH_ASSOC);
		return $new_products;
		
	}
	public function getBestsellerProducts() {

		$obj_select_new = $this->connection->prepare('SELECT * FROM products WHERE type = 1');
		$obj_select_new->execute();
		$new_products = $obj_select_new->fetchAll(PDO::FETCH_ASSOC);
		return $new_products;
		
	}
	public function getFeatureProducts() {

		$obj_select_new = $this->connection->prepare('SELECT * FROM products WHERE type = 2');
		$obj_select_new->execute();
		$new_products = $obj_select_new->fetchAll(PDO::FETCH_ASSOC);
		return $new_products;
		
	}
	public function getProducts() {
		$obj_select = $this->connection->prepare('SELECT * FROM products');
		$obj_select->execute();
		$products = $obj_select->fetchAll(PDO::FETCH_ASSOC);
		return $products;
	}
	public function getTotalLaptop() {
		$obj_total = $this->connection->prepare("SELECT COUNT(products.id) AS count_id 
		FROM products INNER JOIN categories 
		ON categories.id = products.category_id
		WHERE categories.name = 'Laptop'");
		$obj_total->execute();
		$total = $obj_total->fetchColumn();
		return $total; 
	}
	public function getAllLaptop() {
		$obj_select_laptop = $this->connection->prepare("
			SELECT products.*, categories.name AS category_name 
			FROM products INNER JOIN categories 
			ON categories.id = products.category_id
			WHERE categories.name = 'Laptop'");
		$obj_select_laptop ->execute();
		$laptop = $obj_select_laptop->fetchAll(PDO::FETCH_ASSOC);
		return $laptop;
	}
	public function getLaptopPagination($params_model = []) {
		$limit = $params_model['limit'];
		$start = $params_model['start'];
		$obj_select_laptop = $this->connection->prepare("
			SELECT products.*, categories.name AS category_name 
			FROM products INNER JOIN categories 
			ON categories.id = products.category_id
			WHERE categories.name = 'Laptop'
			LIMIT $start, $limit");
		$obj_select_laptop ->execute();
		$laptop = $obj_select_laptop->fetchAll(PDO::FETCH_ASSOC);
		return $laptop;
	}
	public function getMobile() {
		$obj_select_mobile = $this->connection->prepare("
			SELECT products.*, categories.name AS category_name 
			FROM products INNER JOIN categories 
			ON categories.id = products.category_id
			WHERE categories.name = 'Điện Thoại'");
		$obj_select_mobile ->execute();
		$mobile = $obj_select_mobile->fetchAll(PDO::FETCH_ASSOC);
		return $mobile;
	}
	public function getTele() {
		$obj_select = $this->connection->prepare("
			SELECT products.*, categories.name AS category_name 
			FROM products INNER JOIN categories 
			ON categories.id = products.category_id
			WHERE categories.name = 'Ti Vi'");
		$obj_select->execute();
		$tele = $obj_select->fetchAll(PDO::FETCH_ASSOC);
		return $tele;
	}
	public function getAccessory() {
		$obj_select = $this->connection->prepare("
			SELECT products.*, categories.name AS category_name 
			FROM products INNER JOIN categories 
			ON categories.id = products.category_id
			WHERE categories.name = 'Phụ Kiện'");
		$obj_select->execute();
		$accessory = $obj_select->fetchAll(PDO::FETCH_ASSOC);
		return $accessory;
	}

	public function getFridge() {
		$obj_select = $this->connection->prepare("
			SELECT products.*, categories.name AS category_name 
			FROM products INNER JOIN categories 
			ON categories.id = products.category_id
			WHERE categories.name = 'Tủ Lạnh' AND products.status = 1");
		$obj_select->execute();
		$fridge = $obj_select->fetchAll(PDO::FETCH_ASSOC);
		return $fridge;
	}
	public function getWatch() {
		$obj_select = $this->connection->prepare("
			SELECT products.*, categories.name AS category_name 
			FROM products INNER JOIN categories 
			ON categories.id = products.category_id
			WHERE categories.name = 'Đồng Hồ'");
		$obj_select->execute();
		$watch = $obj_select->fetchAll(PDO::FETCH_ASSOC);
		return $watch;
	}

	public function getMachine() {
		$obj_select = $this->connection->prepare("
			SELECT products.*, categories.name AS category_name 
			FROM products INNER JOIN categories 
			ON categories.id = products.category_id
			WHERE categories.name = 'Máy Giặt'");
		$obj_select->execute();
		$machine = $obj_select->fetchAll(PDO::FETCH_ASSOC);
		return $machine;
	}

	public function getDetailProduct($id) {
		$obj_select_detail = $this->connection->prepare("SELECT * FROM products WHERE id=:id");
		$arr = [':id' => $id ];
		$obj_select_detail->execute($arr);
		$product_detail = $obj_select_detail->fetch(PDO::FETCH_ASSOC);
		return $product_detail;
	}

}




?>