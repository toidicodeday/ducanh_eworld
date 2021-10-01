<?php 
require_once 'controllers/Controller.php';
require_once 'models/Category.php';
require_once 'models/Slide.php';
require_once 'models/Product.php';
require_once 'models/Image.php';
class HomeController extends Controller {

	public function index() {
		$title = 'Ewolrd.com.vn | Thế giới điện máy chính hãng !';

		$category_model = new Category();
		$category = $category_model->getCategories();

		$slide_model = new Slide();
		$slides = $slide_model->getSlides();

		$product_model = new Product();
		$new_products = $product_model->getNewProducts();
		$bestseller_products = $product_model->getBestsellerProducts();
		$feature_products = $product_model->getFeatureProducts();


		$laptop = $product_model->getAllLaptop();
		$mobile = $product_model->getMobile();
		$tele = $product_model->getTele();
		$accessory = $product_model->getAccessory();

		$this->content = $this->render('views/home/index.php', [
			'slides' => $slides,
			'new_products' => $new_products,
			'bestseller_products' => $bestseller_products,
			'feature_products' => $feature_products,
			'laptop' => $laptop,
			'mobile' => $mobile,
			'tele' => $tele,
			'accessory' => $accessory,
			'title' => $title
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

	public function search() {
		if (empty($_GET['text_search'])) {
			header("Location:index.php?controller=home");
			exit();
		}
		$title = ucfirst($_GET['text_search'])  . ' | Hàng chính hãng 100%';

		$params = [];
		if (isset($_GET['search'])) {
			$params['text_search'] = $_GET['text_search'];
		}
		$product_model = new Product();
		$products = $product_model->getAllProducts($params);

		$category_model = new Category();
		$category = $category_model->getCategories();
		$this->content = $this->render('views/home/search.php', [
			'category' => $category,
			'products' => $products
	]);
		require_once 'views/layouts/main.php';

	}
} 


                        
                  

?>