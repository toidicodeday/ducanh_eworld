<?php 
require_once 'controllers/Controller.php';
require_once 'models/Category.php';
require_once 'models/User.php';

class LoginController extends  Controller {
	public function login() {
		$title = 'Đăng nhập tài khoản - Eworld.com.vn !';
		if (isset($_POST['login'])) {
			$email = $_POST['email'];
			$password = $_POST['password'];

			//validate 
			if (empty($email) || empty($password)) {
				$this->error = 'Cần nhập cả hai trường';
			}

			if (empty($this->error)) {
				$user_model = new User();
				$user = $user_model->getUser($email, $password);

				// echo "<pre>";
				// print_r($user);
				// die();

				if (empty($user)) {
					$this->error = 'Sai email hoặc mật khẩu, hãy nhập lại';
				} else {

					$_SESSION['user'] = $user;
					header("Location: index.php?controller=home");
					exit();
				}
			
			}
		}

		$category_model = new Category();
		$category = $category_model->getCategories();
		$this->content = $this->render('views/users/login.php');
		require_once 'views/layouts/main.php';
	}

	public function register() {
		$title = 'Đăng ký tài khoản - Eworld.com.vn !';

		if(isset($_POST['register'])) {
			$first_name = $_POST['first_name'];
			$last_name = $_POST['last_name'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$password = $_POST['password'];
			$cf_password = $_POST['cf_password'];
			$address = $_POST['address'];
			//validate 
			if (empty($first_name) || empty($last_name) || empty($email)) {
				$this->error = 'Cần nhập tất cả các trường';
			} else if ($password != $cf_password) {
				$this->error = 'Xác nhận lại password';
			}

			if (empty($this->error)) {
				$user_model = new User();
				$is_username_exists = $user_model->isExistUsername($email);

				if ($is_username_exists) {
					$this->error = 'Tài khoản đã tồn tại, không thể đăng kí';
				} else {
					$password = $password;
					$is_register = $user_model->register($first_name, $last_name, $phone, $email, $password, $address);
					if ($is_register) {
						$_SESSION['success'] = 'Đăng ký tài khoản thành công';
						header("Location: index.php?controller=login&action=login");
						exit();
					}
				}	
			}
		}
		$category_model = new Category();
		$category = $category_model->getCategories();
		$this->content = $this->render('views/users/register.php');
		require_once 'views/layouts/main.php';
	}

	public function logout() {

		if (!isset($_SESSION['user'])) {
			header("Location:index.php?controller=login&action=login");
			exit();
		}
		unset($_SESSION['user']);
		unset($_SESSION['cart']);
	    $_SESSION['success'] = 'Logout Thành công';
	    header("Location: index.php?controller=login&action=login");
	    exit();
	}
}


?>