<?php 
include_once "controllers/Controller.php"; 
include_once "models/User.php"; 
include_once "models/Order.php"; 

class HomeController extends Controller {

	public function index() {

		$user_model = new User();
        $total_user = $user_model->getTotalUsers();
		
		$order_model = new Order();
		$sum_price_total = $order_model->sumPriceTotal();
		$total_order = $order_model->getTotalOrder();
		if($total_order == 0) $avg_price = 0;
		else $avg_price = $sum_price_total/$total_order;

		$_SESSION['dashboard'] = [
				'total_user' => $total_user,
				'sum_price_total' => $sum_price_total,
				'total_order' => $total_order,
				'avg_price' => $avg_price
		];




		$this->content = $this->render('views/home/dashboard.php', []);
		include 'views/layouts/main.php';
	}
}


?>