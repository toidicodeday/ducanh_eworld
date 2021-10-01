<?php 

require_once 'models/Model.php';
class Slide extends Model {
	public function getSlides() {
		$obj_select = $this->connection->prepare("SELECT * FROM slides");
		$obj_select->execute();
		$slide = $obj_select->fetchAll(PDO::FETCH_ASSOC);
		return $slide;
	}
} 


 ?>