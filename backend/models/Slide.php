<?php 	
require_once "models/Model.php";
class Slide  extends Model {
	public $title;
	public $avatar;
	public function insert() {
		$obj_insert = $this->connection->prepare("INSERT INTO slides(title, avatar, status) VALUES (:title, :avatar, :status)");
		$arr_insert = [
			':title' => $this->title,
			':avatar' => $this->avatar,
			':status' => $this->status
		];
		return $obj_insert->execute($arr_insert);

	}

	public function getTotalSlide() {
		$obj_count = $this->connection->prepare("SELECT COUNT('id') from slides ");
		$obj_count ->execute();
		$total = $obj_count->fetchColumn();
		return $total;
	}

	public function getSlides($params_model = []) {

		$limit = $params_model['limit'];
		$start = $params_model['start'];
		$obj_select_all = $this->connection->prepare("SELECT * FROM slides ORDER BY created_at DESC LIMIT $start, $limit");
		$obj_select_all -> execute();
		$slide = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
		return $slide;
	}
	public function getSlideById($id) {
		$obj_select_id = $this->connection->prepare("SELECT * FROM slides WHERE id = $id");
		$obj_select_id->execute();
		$slide = $obj_select_id->fetch(PDO::FETCH_ASSOC);
		return $slide;
	}
	public function delete($id) {
		$obj_delete = $this->connection->prepare("DELETE FROM slides WHERE id=$id");
		return $obj_delete->execute();
	}
	public function update($id) {
		$obj_update = $this->connection->prepare("UPDATE slides SET title=:title, avatar=:avatar, status=:status WHERE id=$id");
		$arr_update = [
			':title' => $this->title,
			':avatar' => $this->avatar,
			':status' => $this->status
		];
		return $obj_update->execute($arr_update);
	}
}


?>