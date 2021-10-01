<?php 
require_once "controllers/Controller.php";
require_once "models/Product.php";
require_once "models/Pagination.php";
require_once "models/Category.php";
require_once "models/Image.php";
require_once "models/Order.php";

class OrderController extends Controller {

	public function index() {

		$order_model = new Order();
		$total =$order_model->getTotalOrder();
		$limit = 10;
		$params = [
			'total' => $total,
			'limit' => $limit,
			'controller' => 'order',
			'action' => 'index',
			'full_mode' => FALSE
		];

		$pagination = new Pagination($params);
		$data = $pagination->getPagination();
		$page = 1;
		if (isset($_GET['page'])) {
			$page = $_GET['page'];
		}

		$start = ($page-1) * $limit;
		$params_model = [
			'limit' => $limit,
			'start' => $start
		];

		$orders = $order_model->getOrders($params_model);

		$this->content = $this->render('views/orders/index.php', [
			'orders' => $orders,
			'data' => $data
	]);
		require_once 'views/layouts/main.php';

	}

	public function detail() {
		if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
			$this->error = 'ID không hợp lệ';
		}

		$id = $_GET['id'];

		$order_model = new Order();
		$order = $order_model->getOrderById($id);
		$this->content = $this->render('views/orders/detail.php', ['order' => $order]);
		require_once 'views/layouts/main.php';
	}

	public function update() {
		if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
			$this->error = 'ID không hợp lệ';
		}

		 $id = $_GET['id'];
		 $order_model = new Order();
		 $order = $order_model->getOrderById($id);

		 if (isset($_POST['submit'])) {
		 	$payment_status = $_POST['payment_status'];
		 	$order_model->payment_status = $payment_status;
		 	$update_order = $order_model->update($id);
		 	

		 	if ($update_order) {
		 		$_SESSION['success'] = 'Update trạng thái đơn hàng thành công';
		 	} else {
		 		$_SESSION['error'] = 'Update trạng thái đơn hàng thất bại';
		 	}

		 	header("Location: index.php?controller=order");
		 	exit();
		 }


		 $this->content = $this->render('views/orders/update.php', ['order' => $order]);
		 require_once 'views/layouts/main.php';
	}

	public function delete() {
		if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
			$this->error = 'ID không hợp lệ';
		}

		 $id = $_GET['id'];
		 $order_model = new Order();
		 $delete_product = $order_model->deleteProduct($id);
		 $delete = $order_model->delete($id);
		if ($delete) {
		 		$_SESSION['success'] = 'Xóa đơn hàng thành công';
		 	} else {
		 		$_SESSION['error'] = 'Xóa đơn hàng thất bại';
		}
		header("Location: index.php?controller=order");
		exit(); 

	}

}

?>