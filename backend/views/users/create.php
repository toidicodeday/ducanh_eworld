
<h1>Thêm mới user</h1>
<br>
<form action="" method="POST" enctype="multipart/form-data">
	<div class="form-group mb-3">
		<label for="username">Tên đăng nhập <span style="color: red;">*</span></label>
		<input type="text" name="username" id="username" class="form-control">
	</div>
	<div class="form-group mb-3">
		<label for="password">Mật khẩu <span style="color: red;">*</span></label>
		<input type="password" name="password" id="password" class="form-control">
	</div>
	<div class="form-group mb-3">
		<label for="password_confirm">Nhập lại mật khẩu<span style="color: red;">*</span></label>
		<input type="password" name="password_confirm" id="password_confirm" class="form-control">
	</div>
	<div class="from-group mb-3">
		<label for="first_name">Họ đệm<span style="color: red;">*</span></label>
		<input type="text" name="first_name" id="first_name" class="form-control">
	</div>
	<div class="from-group mb-3">
		<label for="last_name">Tên<span style="color: red;">*</span></label>
		<input type="text" name="last_name" id="last_name" class="form-control">
	</div>
	<div class="from-group mb-3">
		<label for="phone">Số điện thoại<span style="color: red;">*</span></label>
		<input type="phone" name="phone" id="phone" class="form-control">
	</div>
	<div class="from-group mb-3">
		<label for="email">Email</label>
		<input type="text" name="email" id="email" class="form-control">
	</div>
	<div class="from-group mb-3">
		<label for="avatar">Avatar</label>
		<input type="file" name="avatar" id="avatar" class="form-control">
	</div>
	<div class="from-group">
		<label for="status">Trạng thái</label>
		<select name="status" class="form-control" id="status">
            <option value="1">Active</option>
            <option value="0">Disable</option>
		</select>
	</div>
	<br>
	<div class="form-group">
		<input type="submit" name="submit" value="Lưu" class="btn btn-primary">
		<a href="index.php?controller=user&action=index" class="btn btn-outline-dark">Trở lại</a>
	</div>
</form>