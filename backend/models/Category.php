<!-- Category Model -->
<?php 
require_once 'models/Model.php';
class Category extends Model {
	
	public $id;
	public $name;
	public $avatar;
	public $description;
	public $status;
	public $created_at;
	public $updated_at;

	public function getAllCategories() {
		$obj_select_all = $this->connection->prepare("SELECT * FROM categories");
		$obj_select_all->execute();
		$categories = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
		return $categories;
	}

	public function insert() {
		$obj_insert = $this->connection->prepare("INSERT INTO categories (name, action, avatar, description, status) VALUES (:name, :action, :avatar, :description, :status)");
		$arr_insert = [
			':name' => $this->name,
			':action' => $this->action,
			':avatar' => $this->avatar,
			':description' => $this->description,
			':status' => $this->status
		];
		return $obj_insert->execute($arr_insert);
	}

	public function getTotalCategories() {
		$obj_count = $this->connection->prepare("SELECT COUNT('id') FROM categories");
		$obj_count->execute();
		$total = $obj_count->fetchColumn();
		return $total;
	}

	public function getCategories($params_model = []) {

		$limit = $params_model['limit'];
		$start = $params_model['start'];
		$obj_select_all = $this->connection->prepare("SELECT * FROM categories ORDER BY created_at DESC LIMIT $start, $limit");
		$obj_select_all -> execute();
		$category = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
		return $category;
	}

	public function getCategoryById($id) {
		$obj_select = $this->connection->prepare("SELECT * FROM categories WHERE id = $id");
		$obj_select->execute();
		$category = $obj_select->fetch(PDO::FETCH_ASSOC);
		return $category;
	}

	  public function update($id) {
    	$obj_update = $this->connection->prepare("UPDATE categories SET name = :name, action = :action, avatar = :avatar, description = :description, status = :status WHERE id = $id");
    	$arr_update = [
    		':name' => $this->name,
    		':action' => $this->action,
    		':avatar' => $this->avatar,
    		':description' => $this->description,
    		':status' => $this->status,
    	];
    	return $obj_update->execute($arr_update);
    }

    public function delete($id) {
        $obj_delete = $this->connection->prepare("DELETE FROM categories WHERE id = $id");
        $is_delete = $obj_delete->execute();

    return $is_delete;
    }
}



?>