<?php 
require_once 'controllers/Controller.php';
require_once 'models/Category.php';
require_once 'models/Slide.php';
require_once 'models/Product.php';
require_once 'models/Image.php';
class CategoryController extends Controller {

	public function laptop() {
		$title = 'Laptop | Máy tính xách tay chính hãng 100% !';

		$category_model = new Category();
		$category = $category_model->getCategories();

		$product_model = new Product();
		$total = $product_model->getTotalLaptop();
		$limit = 6;
		$params = [
			'total' => $total,
			'limit' => $limit,
			'controller' => 'category',
			'action' => 'laptop',
			'full_mode' => FALSE,
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
		$laptops = $product_model->getLaptopPagination($params_model);
		$this->content = $this->render('views/categories/laptop.php', [
			'laptops' => $laptops,
			'data' => $data
			
		]);
		require_once 'views/layouts/main.php';
	}

	public function mobile() {
		$title = 'Điện thoại chính hãng có bảo hành - Eworld.com.vn !';

		$category_model = new Category();
		$category = $category_model->getCategories();

		$product_model = new Product();
		$mobiles = $product_model->getMobile();
		$this->content = $this->render('views/categories/mobile.php', [
			'mobiles' => $mobiles,
		]);
		require_once 'views/layouts/main.php';
	}
	public function television() {
		$title = 'Ti vi chính hãng có bảo hành - Eworld.com.vn !';

		$category_model = new Category();
		$category = $category_model->getCategories();

		$product_model = new Product();
		$televisions = $product_model->getTele();
		$this->content = $this->render('views/categories/television.php', [
			'televisions' => $televisions
		]);
		require_once 'views/layouts/main.php';
	}

	public function accessories() {
		$title = 'Phụ kiện chính hãng có bảo hành - Eworld.com.vn !';

		$category_model = new Category();
		$category = $category_model->getCategories();

		$product_model = new Product();
		$accessories = $product_model->getAccessory();
		$this->content = $this->render('views/categories/accessory.php', [
			'accessories' => $accessories
		]);
		require_once 'views/layouts/main.php';
	}

	public function fridge() {
		$title = 'Tủ lạnh chính hãng có bảo hành - Eworld.com.vn !';

		$category_model = new Category();
		$category = $category_model->getCategories();

		$product_model = new Product();
		$fridges = $product_model->getFridge();
		$this->content = $this->render('views/categories/fridge.php', [
			'fridges' => $fridges
		]);
		require_once 'views/layouts/main.php';
	}

	public function watch() {
		$title = 'Đồng hồ chính hãng có bảo hành - Eworld.com.vn !';

		$category_model = new Category();
		$category = $category_model->getCategories();

		$product_model = new Product();
		$watch = $product_model->getWatch();
		$this->content = $this->render('views/categories/watch.php', [
			'watch' => $watch
		]);
		require_once 'views/layouts/main.php';
	}

	public function machine() {
		$title = 'Máy giặt chính hãng có bảo hành - Eworld.com.vn !';

		$category_model = new Category();
		$category = $category_model->getCategories();

		$product_model = new Product();
		$machine = $product_model->getMachine();
		$this->content = $this->render('views/categories/machine.php', [
			'machine' => $machine 
		]);
		require_once 'views/layouts/main.php';
	}



	public function showProductDetail() {
		$id = $_POST['id'];

		$product_model = new Product();
		$product_model->id = $id;
		$product_detail = $product_model->getDetailProduct($id);

		// echo json_encode($product_detail);

		$image_model = new Image();
		$image = $image_model->getImageByProductId($id);
		$results[] = array(
			'product_detail' => $product_detail,
			'image' => $image
		);
		echo json_encode($results);
		

	}

}



?>