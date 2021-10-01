<?php 
require_once "controllers/Controller.php";
require_once "models/Slide.php";
require_once "models/Pagination.php";
class SlideController extends Controller {
	public function create() {

		if (isset($_POST['submit'])) {
			$title = $_POST['title'];
			$status = $_POST['status'];

			if (empty($title)) {
				$this->error = 'Không được để trống';
			} else if ($_FILES['avatar']['error'] == 0) {
				$extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
				$extension = strtolower($extension);
				$arr = ['jpg', 'jpeg', 'png', 'gif'];
				$file_mb = $_FILES['avatar']['size'] / 1024 / 1024;
				$file_mb = round($file_mb, 2);

				if (!in_array($extension, $arr)) {
					$this->error = 'Cần upload định dạng ảnh';
				} else if ($file_mb > 2) {
					$this->error = 'Upload ảnh nhỏ hơn 2MB';
				}
				$avatar_name = '';
				if (empty($this->error)) {
					$dir_uploads = 'assets/images/slides';
					if (!file_exists($dir_uploads)) {
						mkdir($dir_uploads);
					}

				$avatar_name = time() . '-s-' . $_FILES['avatar']['name'];
				move_uploaded_file($_FILES['avatar']['tmp_name'], $dir_uploads . '/' . $avatar_name);
				}
			}

			$slide_model = new Slide();
			$slide_model->title = $title;
			$slide_model->avatar = $avatar_name;
			$slide_model->status = $status;
			$is_insert = $slide_model->insert();
			if ($is_insert) {
				$_SESSION['success'] = 'Thêm thành công';
			} else {
				$_SESSION['error'] = 'Thêm thất bại';
			}
			header("Location: index.php?controller=slide&action=index");
				exit();
		}
		$this->content = $this->render('views/slides/create.php');
		require_once "views/layouts/main.php";
	}

	public function index() {

		$slide_model = new Slide();
		$total = $slide_model->getTotalSlide();
		$limit = 10;
		$params = [
			'total' => $total,
			'limit' => $limit,
			'controller' => 'slide',
			'action' => 'index',
			'full_mode' =>FALSE
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

		$slide = $slide_model->getSlides($params_model);
		$this->content = $this->render('views/slides/index.php', [
			'slide' => $slide,
			'data' => $data
		]);
		require_once "views/layouts/main.php";
	}

	public function detail() {

		if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
			$this->error = 'ID không hợp lệ';
			header("Location: index.php?controller=slide&action=index");
			exit();
		}
		$id = $_GET['id'];

		$slide_model = new Slide();
		$slide = $slide_model->getSlideById($id);


		$this->content = $this->render('views/slides/detail.php', ['slide' => $slide]);
		require_once 'views/layouts/main.php';
	}

	public function update() {

		if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
			$this->error = 'ID không hợp lệ';
			header("Location: index.php?controller=slide&action=index");
			exit();
		}
		$id = $_GET['id'];
		$slide_model = new Slide();
		$slide = $slide_model->getSlideById($id);

		if (isset($_POST['submit'])) {
			$title = $_POST['title'];
			$status = $_POST['status'];

			if (empty($title)) {
				$this->error = 'Không được để trống';
			} else if ($_FILES['avatar']['error'] == 0) {
				$extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
				$extension = strtolower($extension);
				$arr = ['jpg', 'jpeg', 'png', 'gif'];
				$file_mb = $_FILES['avatar']['size'] / 1024 / 1024;
				$file_mb = round($file_mb, 2);

				if (!in_array($extension, $arr)) {
					$this->error = 'Cần upload định dạng ảnh';
				} else if ($file_mb > 2) {
					$this->error = 'Upload ảnh nhỏ hơn 2MB';
				}
				$avatar_name = $slide['avatar'];
				if (empty($this->error)) {
					$dir_uploads = 'assets/images/slides';
					@unlink($dir_uploads. '/' . $avatar_name);
					if (!file_exists($dir_uploads)) {
						mkdir($dir_uploads);
					}

				$avatar_name = time() . '-s-' . $_FILES['avatar']['name'];
				move_uploaded_file($_FILES['avatar']['tmp_name'], $dir_uploads . '/' . $avatar_name);
				}

				$slide_model->title = $title;
				$slide_model->avatar = $avatar_name;
				$slide_model->status = $status;
				$is_update = $slide_model->update($id);
				if($is_update) {
					$_SESSION['success'] = 'Update thành công';
				} else {
					$_SESSION['error'] = 'Update thất bại';
				}
				header("Location: index.php?controller=slide&action=index");
				exit();
			}

		}
		$this->content = $this->render('views/slides/update.php', ['slide' => $slide]);
		require_once 'views/layouts/main.php';
	}

	public function delete() {

		if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
			$this->error = 'ID không hợp lệ';
			header("Location: index.php?controller=slide&action=index");
			exit();
		}
		$id = $_GET['id'];

		$slide_model = new Slide();
		$is_delete = $slide_model->delete($id);
		if ($is_delete) {
			$_SESSION['success'] = 'Xóa thành công';
		} else {
			$_SESSION['error'] = 'Xoá thất bại';
		}
		header("Location: index.php?controller=slide&action=index");
		exit();

	}
}


?>