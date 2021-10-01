<div class="container">
	<div class="row mt-70">
		<div class="col-md-4 text-center">
			
			<h4>Tên tài khoản: </i> <?php echo $_SESSION['user']['first_name'] . ' ' . $_SESSION['user']['last_name']; ?></h4>
			<ul class="user-list">
				<li>
					<a class="active btn btn-outline-warning w-75 mt-20 mb-20" href="index.php?controller=user&action=account">Thông tin cá nhân</a>
				</li>
				<li>
					<a class="btn btn-outline-warning w-75" href="index.php?controller=user&action=list">Danh sách đơn hàng</a>
				</li>
			</ul>
		</div>
		<div class="col-md-8 mb-30">
			<form action="">
				<h4>Hồ sơ của tôi</h4>
				<div class="form-group">
					<label for="">Tên đệm</label>
					<input class="form-control" type="text" value="<?php echo $_SESSION['user']['first_name']; ?>">
				</div>
				<div class="form-group">
                        <label>Email</label>
                        <input class="form-control" name="email" value="<?php echo $_SESSION['user']['email']; ?>" class="form-control" type="email">
                </div>
				<div class="form-group">
					<label for="">Số điện thoại</label>
					<input class="form-control" type="text" value="0<?php echo $_SESSION['user']['phone']; ?>">
				</div>
				<div class="form-group">
					<label for="">Địa Chỉ</label>
					<input class="form-control" type="text" value="<?php echo $_SESSION['user']['address']; ?>">
				</div>
				<input value="Cập nhật" class="btn btn-warning btn-sm" type="submit">
			</form>
		</div>
	</div>
</div>