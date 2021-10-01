<?php 
require_once 'controllers/Controller.php';
require_once 'models/Category.php';
require_once 'models/Product.php';
require_once 'models/Order.php';
require_once 'models/OrderDetail.php';
class PaymentController extends Controller {
	public function index() {
		$title = 'Thanh toán đơn hàng - Eworld.com.vn !';

		if (isset($_POST['submit'])) {
			$fullname = $_POST['fullname'];
			$mobile = $_POST['mobile'];
			$address = $_POST['address'];
			$email = $_POST['email'];
			$note = $_POST['note'];
			$method = $_POST['method'];

			//validate

			if (empty($fullname) || empty($mobile) || empty($address)) {
				$this->error = 'Không được để trống';
			}

			if (empty($this->error)) {
				$order_model = new Order();

				$order_model->fullname = $fullname;
				$order_model->mobile = $mobile;
				$order_model->address = $address;
				$order_model->email = $email;
				$order_model->note = $note;

				$price_total = 0;

				foreach ($_SESSION['cart'] as $cart) {
					$price_total += $cart['quantity'] * $cart['price'];
				}
				$order_model->price_total = $price_total;
				$order_model->payment_status = 0;

				$order_id = $order_model->insert();
				// var_dump($order_id);
				// die();
				$order_detail_model = new OrderDetail();

				foreach ($_SESSION['cart'] as $cart) {
					$order_detail_model->order_id = $order_id;
					$order_detail_model->product_name = $cart['title'];
					$order_detail_model->product_price = $cart['price'];
					$order_detail_model->quantity = $cart['quantity'];

					$insert_order_detail = $order_detail_model->insert();
				}

				if ($method == 0) {
					$_SESSION['payment_info'] = [
						'price_total' => $price_total,
						'fullname' => $fullname,
						'mobile' => $mobile,
						'email' => $email
					];
					header("Location: index.php?controller=payment&action=online");
					exit();
				} else {
					header("Location: index.php?controller=payment&action=thank");
				}
			}
 		}

		$category_model = new Category();
		$category = $category_model->getCategories();
		$this->content = $this->render('views/payments/index.php', ['category'=> $category]);
		require_once 'views/layouts/main.php';

	}

	public function online() {
		$this->content = $this->render('views/libraries/nganluong/index.php');
		echo $this->content;
	}

	public function thank() {
		$title = 'Thanh toán đơn hàng | Eworld.com.vn';
		$category_model = new Category();
		$category = $category_model->getCategories();
		unset($_SESSION['cart']);
		$this->content = $this->render('views/payments/thank.php');
		require_once 'views/layouts/main.php';
	}
}




?>