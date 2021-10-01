<?php 
require_once "controllers/Controller.php";
require_once "models/Product.php";
require_once "models/Pagination.php";
require_once "models/Category.php";
require_once "models/Image.php";

class ProductController extends Controller {

	public function index() {

		$product_model = new Product();
		$total = $product_model->getTotalProduct();
		$limit = 20;
		$params = [
			'total' => $total,
			'limit' => $limit,
			'controller' => 'product',
			'action' => 'index',
			'full_mode' =>FALSE
		];

		$pagination = new Pagination($params);
		$data = $pagination->getPagination();

		$page = 1;
		if (isset($_GET['page'])) {
			$page = $_GET['page'];
		}

		$start = ($page -1) * $limit;
		$params_model = [
			'limit' => $limit,
			'start' => $start
		];

		$product = $product_model->getProducts($params_model);
		$category_model = new Category();
		$categories = $category_model->getAllCategories();

		$this->content = $this->render('views/products/index.php', [
			'product' => $product,
			'data' => $data,
			'categories' => $categories
		]);
		require_once "views/layouts/main.php";

	}

	public function create() {

		if (isset($_POST['submit'])) {
			$category_id = $_POST['category_id'];
			$title = $_POST['title'];
			$price = $_POST['price'];
			$amount = $_POST['amount'];
			$summary = $_POST['summary'];
			$content = $_POST['content'];
			$status = $_POST['status'];
			$type = $_POST['type'];
			

			//validate 
			if (empty($title) || empty($price) || empty($amount) || empty($summary) || empty($content)) {
				$this->error = 'Không được để trống';
			} else if ($_FILES['avatar']['error'] == 0) {
				$extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
				$extension = strtolower($extension);
				$arr = ['jpg', 'jpeg', 'png', 'gif'];
				$file_mb = $_FILES['avatar']['size'] / 1024 / 1024;
				$file_mb = round($file_mb, 2);

				if (!in_array($extension, $arr)) {
					$this->error = 'Cần upload file có định dạng ảnh';
				} else if ($file_mb > 2) {
					$this->error = 'File upload không quá 2MB';
				}
 			} 

 			if (isset($_FILES['images'])) {
 				$files = $_FILES['images'];
 				$files_name = $_FILES['images']['name'];
 				$dir_uploads = 'assets/images/products/img_detail';
 					if (!file_exists($dir_uploads)) {
 						mkdir($dir_uploads);
 					}

 				foreach ($files_name as $key => $file) {
 					move_uploaded_file($files['tmp_name'][$key], $dir_uploads . '/' . $file);
 				}

 			// 	echo "<pre>";
				// print_r($_FILES['images']['name']);
				// echo "</pre>";
				// exit();

 			}

 			if (empty($this->error)) {
 				$avatar_name = '';
 				$slug = $this->to_slug($title);

 				if ($_FILES['avatar']['error'] == 0) {
 					$dir_uploads = 'assets/images/products';
 					if (!file_exists($dir_uploads)) {
 						mkdir($dir_uploads);
 					}
 					$avatar_name ='san-pham'. $slug;
 					move_uploaded_file($_FILES['avatar']['tmp_name'], $dir_uploads . '/' . $avatar_name);
 				}

 				$product_model = new Product();

 				$product_model->category_id = $category_id;
 				$product_model->title = $title;
 				$product_model->slug = $slug;
 				$product_model->avatar = $avatar_name;
 				$product_model->price = $price;
 				$product_model->amount = $amount;
 				$product_model->summary = $summary;
 				$product_model->content = $content;
 				$product_model->status = $status;
 				$product_model->type = $type;
 				
 				
 				$product = $product_model->checkProductExits($title);
  				if ($product) {
  					$_SESSION['error'] = 'Sản phẩm đã tồn tại';
  				} else {

  				$product_id = $product_model->insert();

  				$images_model = new Image();

 				$images_model->product_id = $product_id;
 				$files_name = $_FILES['images']['name'];

 				foreach ($files_name as $file) {
 					$images_model->url = $file;
 					$insert = $images_model->insertProductImages();
 				}

 			}
 				// var_dump($insert);
 				// die();

  				if ($insert) {
 					$_SESSION['success'] = 'Thêm sản phẩm thành công';
 				} else {
 					$_SESSION['error'] .= ' thêm sản phẩm thất bại';
  				}
  				header("Location: index.php?controller=product&action=index");
  				exit();

 			}
		}
		$category_model = new Category();
		$categories = $category_model->getAllCategories();
		$this->content = $this->render('views/products/create.php', [
			'categories' => $categories
		]);
		require_once "views/layouts/main.php";
	}

	public function update() {

		if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
			$this->error = 'ID sản phẩm không hợp lệ';
			header("Location: index.php?controller=product&action=index");
			exit();
		} 
		$id = $_GET['id'];
		$product_model = new Product();
		$product = $product_model->getProductById($id);

		$category_model = new Category();
		$categories = $category_model->getAllCategories();

		if (isset($_POST['submit'])) {

			$category_id = $_POST['category_id'];
			$title = $_POST['title'];
			$price = $_POST['price'];
			$amount = $_POST['amount'];
			$summary = $_POST['summary'];
			$content = $_POST['content'];
			$status = $_POST['status'];
			$type = $_POST['type'];
			$imagesList = $_FILES['images'];


			//validate
			if (empty($title) || empty($price) || empty($amount) || empty($summary) || empty($content)) {
				$this->error = 'Không được để trống';
			} elseif ($_FILES['avatar']['error'] !== 0) {
				$avatar = $product['avatar'];
			}

			// Avatar
			if ($_FILES['avatar']['error'] == 0) {

				$arr_extension = ['jpg','jpeg', 'png', 'gif'];
				$extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
				$extension = strtolower($extension);
				$file_mb = $_FILES['avatar']['size'] / 1024 / 1024;
				$file_mb = round($file_mb, 2);

				if (!in_array($extension, $arr_extension)) {
					$this->error = 'Upload file định dạng ảnh';
				} else if ($file_mb > 2) {
					$this->error = 'File upload không lớn  hơn 2 MB';
				} else {
					$dir_uploads = 'assets/images/products';
					@unlink($dir_uploads. '/' . $filename);
					if (!file_exists($dir_uploads)) {
						mkdir($dir_uploads);
					}
					$avatar ='san-pham'. time() . '.' . $extension;
					move_uploaded_file($_FILES['avatar']['tmp_name'], $dir_uploads . '/' . $avatar);
				}
 			}

 			// Images
 			if ($imagesList['error'][0] == 0) {
 				$images_model = new Image();
				$images = $images_model->getImageByProductId($id);	
				$resultRemove = $product_model->removeAllImage($id);

				$qtyplus = 1;

				foreach ($imagesList['name'] as $key => $value) {

					$extension = pathinfo($value, PATHINFO_EXTENSION);
					$dir_uploads = 'assets/images/products/img_detail';
					if (!file_exists($dir_uploads)) {
						mkdir($dir_uploads);
					}
					$name = 'san-pham' . time() . $qtyplus++ . '.' . $extension;
					$images_model->product_id = $id;
					$images_model->url = $name;
					$images_model->insertProductImages($name, $id);

					foreach ($imagesList['tmp_name'] as $value) {					
						move_uploaded_file($value, $dir_uploads . '/' . $name);
					}
				}			
 			}

 			$product_model = new Product();

 				$product_model->category_id = $category_id;
 				$product_model->title = $title;
 				$product_model->avatar = $avatar;
 				$product_model->price = $price;
 				$product_model->amount = $amount;
 				$product_model->summary = $summary;
 				$product_model->content = $content;
 				$product_model->status = $status;
 				$product_model->type = $type;
 				$update = $product_model->update($id);

 				if ($update) {
 					$_SESSION['success'] = 'Update thành công';
 				} else {
 					$_SESSION['error'] = 'Update thất bại';
 				}
 				header("Location: index.php?controller=product");
 				exit();
		}

		$this->content = $this->render('views/products/update.php', [
			'product' => $product,
			'categories' => $categories
	],
		 );
		require_once 'views/layouts/main.php';
	}
 
	public function detail() {

		if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
			$_SESSION['error'] = 'ID không hợp lệ';
			header("Location: index.php?controller=product&action=index");
			exit();
		}
		$id = $_GET['id'];
		$product_model = new Product();
		$product = $product_model->getProductById($id);

		$this->content = $this->render('views/products/detail.php', ['product' => $product]);
		require_once 'views/layouts/main.php';
	}

	public function delete() {
		if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
			$_SESSION['error'] = 'ID không hợp lệ';
			header("Location : index.php?controller=product&action=index");
			exit();
		}

		$id = $_GET['id'];
		$product_model = new Product();
		$is_delete = $product_model->delete($id);

		if ($is_delete) {
			$_SESSION['success'] = 'Xóa sản phẩm thành công';
		} else {
			$_SESSION['error'] = 'Xoá sản phẩm thất bại';
		}
		header("Location: index.php?controller=product&action=index");
		exit();
	}


}




 ?>