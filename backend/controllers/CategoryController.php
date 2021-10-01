<?php 

require_once 'controllers/Controller.php';
require_once 'models/Category.php';
require_once 'models/Pagination.php';
class CategoryController extends Controller {
	public function index() {

		$catergory_model = new Category();
		$total = $catergory_model->getTotalCategories();
		$limit = 10;
		$params = [
			'total' => $total,
			'limit' => $limit,
			'controller' => 'category',
			'action' => 'index',
			'full_mode' => FALSE,
		];
		$pagination = new Pagination($params);
		$data = $pagination->getPagination();

		$page = 1;
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        }
		$start = ($page - 1) * $limit;
		$params_model = [
			'limit' => $limit,
			'start' => $start
		];

		$categories = $catergory_model->getCategories($params_model);
		// echo "<pre>";
		// print_r($categories);
		// echo "</pre>";
		// exit();


		$this->content = $this->render('views/categories/index.php', [
			'data' => $data,
			'categories' => $categories
		]);
		require_once 'views/layouts/main.php';


	}

	public function create() {

		if (isset($_POST['submit'])) {
			$name = $_POST['name'];
			$action = $_POST['action'];
			$description = $_POST['description'];
			$status = $_POST['status'];

			//validate 
			if (empty($name)) {
				$this->error = 'Không được để trống';
			} else if ($_FILES['avatar']['error'] == 0) {
				$extension_arr = ['jpg', 'jpeg', 'png', 'gif'];
				$extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
				$extension = strtolower($extension);
				$file_size_mb = $_FILES['avatar']['size'] /1024 /1024;
				$file_size_mb = round($file_size_mb, 2);

				if (!in_array($extension, $extension_arr)) {
					$this->error = 'Cần upload file định dạng ảnh';
				} else if ($file_size_mb >= 2) {
					$this->error = 'Upload file nhỏ hơn 2MB';
				}
			}

			$avatar_name = '';
			if ($_FILES['avatar']['error'] == 0) {
				$dir_uploads = 'assets/images/categories';
				if (!file_exists($dir_uploads)) {
					mkdir($dir_uploads);
				}
				$avatar_name = time() . '-' . $_FILES['avatar']['name'];
				move_uploaded_file($_FILES['avatar']['tmp_name'], $dir_uploads . '/' . $avatar_name);
			}
			$catergory_model = new Category();
			$catergory_model->name = $name;
			$catergory_model->action = $action;
			$catergory_model->avatar = $avatar_name;
			$catergory_model->description = $description;
			$catergory_model->status = $status;
			$is_insert = $catergory_model->insert();
			
			if ($is_insert) {
				$_SESSION['success'] = 'Thêm danh mục thành công';
			} else {
				$_SESSION['error'] = 'Thêm danh mục thất bại';
			}
			header("Location: index.php?controller=category");
			exit();
		}
		$this->content = $this->render('views/categories/create.php');
		require_once 'views/layouts/main.php';
	}

	public function detail() {

		if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
			$this->error = 'ID không hợp lệ';
			header("Location: index.php?controller=category");
			exit();
		}

		$id = $_GET['id'];
		$catergory_model = new Category();
		$category = $catergory_model->getCategoryById($id);
		// echo "<pre>";
		// print_r($category);
		// echo "</pre>";
		// exit();
		$this->content = $this->render('views/categories/detail.php', ['category' => $category]);
		require_once 'views/layouts/main.php';
	}

	public function update() {

		if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
			$this->error = 'ID không hợp lệ';
			header("Location: index.php?controller=category");
			exit();
		}
			$id = $_GET['id'];
			$catergory_model = new Category();
			$category = $catergory_model->getCategoryById($id);	

		if (isset($_POST['submit'])) {
			$name = $_POST['name'];
			$action = $_POST['action'];
			$description = $_POST['description'];
			$status = $_POST['status'];

			if (empty($name)) {
				$this->error = 'Không được để trống';
			} else if ($_FILES['avatar']['error'] == 0) {
				$extension_arr = ['jpg', 'jpeg', 'png', 'gif'];
				$extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
				$extension = strtolower($extension);
				$file_size_mb = $_FILES['avatar']['size'] /1024 /1024;
				$file_size_mb = round($file_size_mb, 2);

				if (!in_array($extension, $extension_arr)) {
					$this->error = 'Cần upload định dạng ảnh';
				} else if ($file_size_mb > 2) {
					$this->error = 'Upload ảnh nhỏ hơn 2MB';
				}
				$avatar_name = $category['avatar'];
				if (empty($this->error)) {
					$dir_uploads = 'assets/images/categories';
					@unlink($dir_uploads. '/' . $avatar_name);
					if (!file_exists($dir_uploads)) {
						mkdir($dir_uploads);
					}

				$avatar_name = time() . '-c-' . $_FILES['avatar']['name'];
				move_uploaded_file($_FILES['avatar']['tmp_name'], $dir_uploads . '/' . $avatar_name);
				}
			}

				$catergory_model->name = $name;
				$catergory_model->action = $action;
				$catergory_model->avatar = $avatar_name;
				$catergory_model->description = $description;
				$catergory_model->status = $status;
				$is_update = $catergory_model->update($id);

				if($is_update) {
					$_SESSION['success'] = 'Update thành công';
				} else {
					$_SESSION['error'] = 'Update thất bại';
				}

				header("Location: index.php?controller=category&action=index");
				exit();

		}	
		$this->content = $this->render('views/categories/update.php', ['category' => $category]);
		require_once 'views/layouts/main.php';
	}

	public function delete () {
		if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
			$this->error = 'ID không hợp lệ';
			header("Location: index.php?controller=category");
			exit();
		}
			$id = $_GET['id'];
			$catergory_model = new Category();
			$is_delete = $catergory_model->delete($id);
		if($is_delete) {
			$_SESSION['success'] = 'Xóa thành công';
		} else {
			$_SESSION['error'] = 'Xóa thất bại';
		}	

		header("Location: index.php?controller=category&action=index");
		exit();
	}
} 



 ?>