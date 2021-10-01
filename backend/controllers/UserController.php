<?php
require_once 'controllers/Controller.php';
require_once 'models/User.php';
require_once 'models/Pagination.php';

class UserController extends Controller {
 
    public function login() {

        if (isset($_SESSION['admin'])) {
            header("Location: index.php?controller=home");
            exit(); 
        }

        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if (empty($username) || empty($password)) {
                $this->error = 'Không được để trống';
            } 

            $user_model = new User();
            if (empty($this->error)) {
                $user = $user_model->getUserByUsernameAndPass($username, $password);

                if (empty($user)) {
                    $this->error = 'Sai username hoặc password';
                } else if ($user['role_id'] != 1) {
                    $this->error = 'Bạn không có quyền vào đây';
                } else {
                    $_SESSION['admin'] = $user;
                   header("Location: index.php?controller=home");
                   exit(); 
                }
                
            }

        }

        require_once 'views/users/login.php';
    }

    public function logout() {
        unset($_SESSION['admin']);
        $_SESSION['success'] = 'Login thành công';
        header('Location:index.php?controller=user&action=login');
        exit();
    }

    public function info() {

        if (isset($_POST['submit'])) {
            $avatar = $_FILES['avatar'];

            $extension = strtolower(pathinfo($avatar['name'], PATHINFO_EXTENSION));
            $arr = ['jpg', 'jpeg', 'png', 'gif'];

            if (!in_array($extension, $arr)) {
                $this->error = 'Cần upload file định dạng ảnh';
            } else if ($avatar['error'] !== 0) {
                    $this->error = 'Có lỗi trong quá trình upload';
                } else {
                    $avatarName = $_SESSION['admin']['username'] . time() . '.' . $extension;

                    move_uploaded_file($avatar['tmp_name'], 'assets/images/users/'.$avatarName);

                    $user_model = new User();
                    $user_model->updateAvatar($avatarName, $_SESSION['admin']['id']);
                    $_SESSION['admin']['avatar'] = $avatarName;
                    header('Location: http://localhost/project-ITPlus/backend/index.php?controller=user&action=info');
                    exit();
                }

        }

        $this->content = $this->render('views/users/info.php');
        require_once 'views/layouts/main.php';
    }

    public function create() {

         $user_model = new User();
        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $password_confirm = $_POST['password_confirm'];
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $status = $_POST['status'];
            // validate
            if (empty($username)) {
                $this->error = 'Username không được để trống';
            } else if (empty($password)) {
                $this->error = 'Password không được để trống';
            } else if (empty($password_confirm)) {
                $this->error = 'Password confirm không được để trống';
            } else if ($password != $password_confirm) {
                $this->error = 'Password confirm chưa đúng';
            } else if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->error = 'Email không đúng định dạng';
            } else if ($_FILES['avatar']['error'] == 0) {
                $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
                $extension = strtolower($extension);
                $allow_extensions = ['png', 'jpg', 'jpeg', 'gif'];
                $file_size_mb = $_FILES['avatar']['size'] / 1024 / 1024;
                $file_size_mb = round($file_size_mb, 2);
                if (!in_array($extension, $allow_extensions)) {
                    $this->error = 'Phải upload avatar dạng ảnh';
                } else if ($file_size_mb > 2) {
                    $this->error = 'File upload không được lớn hơn 2Mb';
                }
            } else if (!empty($username)) {
                $count_user = $user_model->getUserByUsername($username);
                if ($count_user) {
                    $this->error = 'Username này đã tồn tại trong CSDL';
                }
            }

            if (empty($this->error)) {
                $filename = '';
                if ($_FILES['avatar']['error'] == 0) {
                    $dir_uploads = 'assets/images/users';
                    if (!file_exists($dir_uploads)) {
                        mkdir($dir_uploads);
                    }

                    $filename = time() . '-u-' . $_FILES['avatar']['name'];
                    move_uploaded_file($_FILES['avatar']['tmp_name'], $dir_uploads . '/' . $filename);
                }
                $user_model->username = $username;
                //lưu password dưới dạng mã hóa, hiện tại sử dụng cơ chế md5
                $user_model->password = $password;
                $user_model->first_name = $first_name;
                $user_model->last_name = $last_name;
                $user_model->phone = $phone;
                $user_model->email = $email;
                $user_model->avatar = $filename;
                $user_model->status = $status;
                $is_insert = $user_model->insert();
                if ($is_insert) {
                    $_SESSION['success'] = 'Insert dữ liệu thành công';
                } else {
                    $_SESSION['error'] = 'Insert dữ liệu thất bại';
                }
                header('Location: index.php?controller=user');
                exit();
            }
        }
        $this->content = $this->render('views/users/create.php');
        require_once "views/layouts/main.php";
    }

    public function index() {

        $user_model = new User();
        $total = $user_model->getTotalUsers();

        $limit = 10;
        $params = [
            'total' => $total,
            'limit' => $limit,
            'controller' => 'user',
            'action' => 'index',
            'full_mode' => FALSE
        ];

        $pagination = new Pagination($params);
        $data = $pagination->getPagination();

        $page = 1;
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        }

        $start = ($page - 1) * $limit;
        $params_model = [
            'limit' => $limit,
            'start' => $start
        ];

        $user = $user_model->getUsers($params_model);
        $this->content = $this->render('views/users/index.php', [
            'data' => $data,
            'users' => $user
        ]);
        require_once 'views/layouts/main.php';
    }

    public function detail() {

        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $this->error = 'ID không tồn tại';
            header("Location: index.php?controller=users&action=index");
            exit();
        }

        $id = $_GET['id'];
        $user_model = new User();
        $user = $user_model->getUserById($id);
        $this->content = $this->render('views/users/detail.php', ['user' => $user]);
        require_once 'views/layouts/main.php';
    }
public function update() {

        if (!isset($_GET['id']) && !is_numeric($_GET['id'])) {
            $this->error = 'ID không hợp lệ';
            header("Location : index.php?controller=user&action=index");
            exit();
        }
        $id = $_GET['id'];

        $user_model = new User();
        $user = $user_model->getUserById($id);

        if (isset($_POST['submit'])) {
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $status = $_POST['status'];

            if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->error = 'Email không đúng định dạng';
            } else if ($_FILES['avatar']['error'] == 0) {
                $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
                $extension = strtolower($extension);
                $allow_extensions = ['png', 'jpg', 'jpeg', 'gif'];
                $file_size_mb = $_FILES['avatar']['size'] / 1024 / 1024;
                $file_size_mb = round($file_size_mb, 2);
                if (!in_array($extension, $allow_extensions)) {
                    $this->error = 'Phải upload avatar dạng ảnh';
                } else if ($file_size_mb > 2) {
                    $this->error = 'File upload không được lớn hơn 2Mb';
                }
            }

            if (empty($this->error)) {
                $filename = $user['avatar'];
                if ($_FILES['avatar']['error'] == 0) {
                    $dir_uploads = 'assets/images/users';
                    @unlink($dir_uploads . '/' . $filename);
                    if (!file_exists($dir_uploads)) {
                        mkdir($dir_uploads);
                    }

                    $filename = time() . '-user-' . $_FILES['avatar']['name'];
                    move_uploaded_file($_FILES['avatar']['tmp_name'], $dir_uploads . '/' . $filename);
                }
                    $user_model->first_name = $first_name;
                    $user_model->last_name = $last_name;
                    $user_model->phone = $phone;
                    $user_model->email = $email;
                    $user_model->avatar = $filename;
                    $user_model->status = $status;
                    $is_update = $user_model->update($id);
                    if ($is_update) {
                        $_SESSION['success'] = 'Update dữ liệu thành công';
                    } else {
                        $_SESSION['error'] = 'Update dữ liệu thất bại';
                    }
                    header('Location: index.php?controller=user');
                    exit();
            }
        }
        $this->content = $this->render('views/users/update.php', ['user' => $user]);
        require_once 'views/layouts/main.php';  
   }

   public function delete() {
    if (!isset($_GET['id']) && !is_numeric($_GET['id'])) {
        $this->error = 'ID không hợp lệ';
        header("Location : index.php?controller=user&action=index");
        exit();
    }
    $id = $_GET['id'];
    $user_model = new User();
    $is_delete = $user_model->delete($id);
     if ($is_delete) {
            $_SESSION['success'] = 'Xóa dữ liệu thành công';
        } else {
            $_SESSION['error'] = 'Xóa dữ liệu thất bại';
        }
        header('Location: index.php?controller=user');
        exit();
   }

   public function edit() {
        $username = $_SESSION['admin']['username'];
        $user_model = new User();
        $user = $user_model->getPassbyUsername($username);

    if (isset($_POST['submit'])) {
        $password = md5($_POST['password']);
        $new_password = md5($_POST['new_password']);  
        $address = $_POST['address'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

       
        // echo "<pre>";
        // print_r($user);
        // echo "</pre>";
        // exit();
        //validate 
        if (empty($password)) {
            $this->error = 'Cần nhập mật khẩu cũ';
        } else if ($password !== $user['password']) {
            $this->error = 'Mật khẩu cũ không đúng';
        }

        if (empty($this->error)) {
            $user_model = new User();
            $user_model->password = $new_password;
            $user_model->address = $address;
            $user_model->email = $email;
            $user_model->phone = $phone;
            $is_edit = $user_model->updateProfile($username);
            if ($is_edit) {
                $_SESSION['success'] = 'Update dữ liệu thành công';
            } else {
                $_SESSION['error'] = 'Update dữ liệu thất bại';
            }
            header('Location: index.php?controller=user&action=info');
            exit();  

        }
    }
    $this->content = $this->render('views/users/edit.php', ['user' => $user]);
    require_once 'views/layouts/main.php';
   }

}