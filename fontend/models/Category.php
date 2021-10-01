<?php 
require_once 'models/Model.php';
class Category extends Model {

	public function getCategories() {
		$obj_select = $this->connection->prepare("SELECT * FROM categories");
		$obj_select->execute();
		$category = $obj_select->fetchAll(PDO::FETCH_ASSOC);
		return $category;
	}

	
}


?>