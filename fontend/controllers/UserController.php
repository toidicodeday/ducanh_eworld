<?php 
require_once 'controllers/Controller.php';
require_once 'models/Category.php';
require_once 'models/User.php';
require_once 'models/Order.php';
require_once 'models/OrderDetail.php';
class UserController extends Controller {

	public function account() {
		$title = 'Thông tin tài khoản - Eworld.com.vn !';

		$category_model = new Category();
		$category = $category_model->getCategories();

		

		$this->content = $this->render('views/users/account.php');
		require_once 'views/layouts/main.php';
	}

	public function list() {
		$title = 'Danh sách đơn hàng - Eworld.com.vn !';

		$category_model = new Category();
		$category = $category_model->getCategories();


		$email = $_SESSION['user']['email'];
		$order_model = new Order();
		$orders = $order_model->getAllOrderByUser($email);


		$this->content = $this->render('views/users/listorder.php', ['orders' => $orders]);
		require_once 'views/layouts/main.php';
	}

	public function detail() {
		$title = 'Chi tiết đơn hàng - Eworld.com.vn !';

		$category_model = new Category();
		$category = $category_model->getCategories();

		if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
			header("Location: index.php?controller=user&action=list");
			exit();
		}
		 $id = $_GET['id'];

		 $order_detail_model = new OrderDetail();
		 $order_details = $order_detail_model->getOrderDetailByIdOrder($id);
		 

		$this->content = $this->render('views/users/detailorder.php', ['order_details' => $order_details]);
		require_once 'views/layouts/main.php';
	}


}

?>