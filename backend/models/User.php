<?php
require_once 'models/Model.php';

class User extends Model {
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;
    public $phone;
    public $email;
    public $avatar;
    public $status;
    public $created_at;
    public $updated_at;

    public function isExistsUsername($username){
        $sql_select_one = "SELECT * FROM users WHERE username = :username";
        $obj_select_one = $this->connection ->prepare($sql_select_one);
        $selects = [
            'username' => $username
        ];
        $obj_select_one->execute($selects);
        $user = $obj_select_one->fetch(PDO::FETCH_ASSOC);
        if (!empty($user)) {
            return TRUE;
        }
        return FALSE;
    }
    public function getUserByUsername($username) {
            $obj_select = $this->connection
                ->prepare("SELECT COUNT(id) FROM users WHERE username='$username'");
            $obj_select->execute();
            return $obj_select->fetchColumn();
        }

    public function getUserByUsernameAndPass($username, $password) {
        $obj_select = $this->connection->prepare("SELECT * FROM users WHERE username=:username AND password=:password ");
        $arr_select = [
            ':username' => $username,
            ':password' => $password
        ];
        $obj_select->execute($arr_select);

        $user = $obj_select->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    public function updateAvatar($avatarName, $id) {

        $obj_update = $this->connection->prepare("UPDATE users SET avatar=:avatarName WHERE id=:id");
        $arr_update = [
            ':avatarName' => $avatarName,
            ':id' => $id
        ];

        return $obj_update->execute($arr_update);
    }
     public function insert() {
        $obj_insert = $this->connection
            ->prepare("INSERT INTO users(username, password, first_name, last_name, phone, email, avatar, status)
VALUES(:username, :password, :first_name, :last_name, :phone, :email, :avatar, :status)");
        $arr_insert = [
            ':username' => $this->username,
            ':password' => $this->password,
            ':first_name' => $this->first_name,
            ':last_name' => $this->last_name,
            ':phone' => $this->phone,
            ':email' => $this->email,
            ':avatar' => $this->avatar,
            ':status' => $this->status,
        ];
        return $obj_insert->execute($arr_insert);
    }

   public function getTotalUsers() {
        $obj_count = $this->connection->prepare("SELECT COUNT(id) as count_id FROM users ");
        $obj_count->execute();
        $total = $obj_count->fetchColumn();
        return $total;
    }
    public function getUsers($params_model = []) {

        $limit = $params_model['limit'];
        $start = $params_model['start'];

        $obj_select = $this->connection->prepare("SELECT * FROM users ORDER BY created_at DESC LIMIT $start, $limit");
        $obj_select -> execute();
        $user = $obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $user;
    }
    public function getUserById($id) {
        $obj_select_user = $this->connection->prepare("SELECT * FROM users WHERE id = $id");
        $obj_select_user->execute();
        $user = $obj_select_user->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

     public function update($id) {

        $obj_update = $this->connection->prepare("UPDATE users SET first_name=:first_name, last_name=:last_name, phone=:phone, email=:email, avatar=:avatar, status=:status WHERE id = $id");
        $arr_update = [

            ':first_name' => $this->first_name,
            ':last_name' => $this->last_name,
            ':phone' => $this->phone,
            ':email' => $this->email,
            ':avatar' => $this->avatar,
            'status' => $this->status
        ];
        return $obj_update->execute($arr_update);
    }

    public function delete($id) {
        $obj_delete = $this->connection->prepare("DELETE FROM users WHERE id=$id");
        return $obj_delete->execute();
    }

    public function getPassbyUsername($username) {
        $obj_select_pass = $this->connection->prepare("SELECT *  FROM users WHERE username=:username ");
        $arr = [':username' => $username];
        $obj_select_pass->execute($arr);
        $user = $obj_select_pass->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    public function updateProfile($username) {
        $obj_update = $this->connection->prepare("UPDATE users SET password=:password, address=:address, email=:email, phone=:phone  WHERE username=:username");
        $arr = [
            ':password' => $this->password,
            ':address' => $this->address,
            ':email' => $this->email,
            ':phone' => $this->phone,
            ':username' => $username
        ];
        return $obj_update->execute($arr);
    }
}