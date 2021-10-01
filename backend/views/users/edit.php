<?php ?>
<h1>Edit Profile</h1>
<form action="" method="POST">
	<div class="form-group">
	<label for="username">Tên đăng nhập</label>
	<input disabled value="<?php echo $user['username']; ?>" type="text" class="form-control" name="username" >
</div>
<div class="form-group">
	<label for="password">Nhập mật khẩu cũ</label>
	<input type="text" class="form-control" name="password">
</div>
<div class="form-group">
	<label for="new_password">Nhập mật khẩu mới</label>
	<input type="text" class="form-control" name="new_password">
</div>
<div class="form-group">
	<label for="address">Địa chỉ</label>
	<input value="<?php echo $user['address']; ?>" type="text" class="form-control" name="address">
</div>
<div class="form-group">
	<label for="email">Địa chỉ email</label>
	<input value="<?php echo $user['email']; ?>" type="text" class="form-control" name="email">
</div>
<div class="form-group">
	<label for="phone">Số điện thoại</label>
	<input value="0<?php echo $user['phone']; ?>" type="number" class="form-control" name="phone">
</div>
<div class="form-group">
	<input type="submit" class="btn btn-primary" name="submit" value="Cập nhật">
	<a class="btn btn-outline-dark" href="index.php?controller=user&action=info">Trở lại</a>
</div>

</form>