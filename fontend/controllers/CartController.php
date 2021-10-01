<?php 

require_once 'controllers/Controller.php';
require_once 'models/Category.php';
require_once 'models/Slide.php';
require_once 'models/Product.php';
require_once 'models/Image.php';
class CartController extends Controller {

	public function add() {

		$product_id = $_GET['product_id'];
		$product_model = new Product();
		$product = $product_model->getDetailProduct($product_id);

		$product_cart = [
			'title' => $product['title'],
			'price' => $product['price'],
			'avatar' => $product['avatar'],
			'quantity' => 1

		];

		if (!isset($_SESSION['cart'])) {

			$_SESSION['cart'][$product_id] = $product_cart;

		} else {
			if (array_key_exists($product_id, $_SESSION['cart'])) {
				$_SESSION['cart'][$product_id]['quantity']++;
			}else {
				$_SESSION['cart'][$product_id] = $product_cart;
			}
		}

		echo json_encode($_SESSION['cart']);

	}

	public function index() {
		$title = 'Giỏ hàng - Eworld.com.vn';
		$category_model = new Category();
		$category = $category_model->getCategories();

		if (isset($_POST['update_cart'])) {
			foreach ($_POST as $product_id => $quantity) {
				if ($quantity < 0) {
					$_SESSION['error'] = 'Số lượng phải lớn hơn 0';
					header("Location: index.php?controller=cart&action=index");
					exit();
				}
			}

			foreach ($_SESSION['cart'] as $product_id => $cart) {
				$_SESSION['cart'][$product_id]['quantity'] = $_POST[$product_id];
			}

			$_SESSION['success'] = 'Cập nhật giỏ hàng thành công';
		}

		$this->content = $this->render('views/carts/index.php');
		require_once 'views/layouts/main.php';
	}

	public function delete() {
		$product_id = $_GET['id'];
    	unset($_SESSION['cart'][$product_id]);
    	$_SESSION['success'] = 'Xóa sản phẩm thành công';
    	header('Location: index.php?controller=cart&action=index');
    	exit();
	}

}


?>