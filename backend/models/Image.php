<?php 
require_once 'models/Model.php';
class Image extends Model {

	public function insertProductImages() {
		$obj_select = $this->connection->prepare("INSERT INTO image_products (product_id, url) VALUES(:product_id, :url) ");
		$arr = [
			':product_id' => $this->product_id,
			':url' => $this->url
		];
		return $obj_select->execute($arr);
	}

	public function updateProductImages($name, $id) {
		$obj_update = $this->connection->prepare("UPDATE image_products SET url=:name, product_id=:id WHERE product_id=:id");
		$arr = [
			':name' => $name,
			':id' => $id
		];
		return $obj_update->execute($arr);
	}

	public function getImageByProductId($id) {
		$obj_select = $this->connection->prepare("SELECT * FROM image_products WHERE product_id=$id");
		$obj_select->execute();
		return $images = $obj_select->fetchAll(PDO::FETCH_ASSOC);
	}
}


 ?>