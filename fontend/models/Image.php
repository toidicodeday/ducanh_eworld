<?php
require_once 'models/Model.php'; 
class Image extends Model {

	public function getImageByProductId($id) {
		$obj_select = $this->connection->prepare("SELECT * FROM image_products WHERE product_id=$id");
		$obj_select->execute();
		return $images = $obj_select->fetchAll(PDO::FETCH_ASSOC);
	}

}


?>