<?php 
require_once 'controllers/Controller.php';
require_once 'models/Category.php';
require_once 'models/Slide.php';
require_once 'models/Product.php';
require_once 'models/Image.php';
class ProductController extends Controller {

	public function detail() {

		$category_model = new Category();
		$category = $category_model->getCategories();

		if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
			header("Location: index.php?controller=home");
			exit();
		}
		$id = $_GET['id'];
		$product_model = new Product();
		$products = $product_model->getAllProducts();
		$product = $product_model->getDetailProduct($id);
		$image_model = new Image();
		$images = $image_model->getImageByProductId($id);
		$title = $product['title'] .' - Eworld.com.vn !';


		$this->content = $this->render('views/products/detail.php', [
			'product' => $product,
			'products' => $products,
			'images' => $images
 
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