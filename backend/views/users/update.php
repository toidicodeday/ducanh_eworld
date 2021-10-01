<?php 
 ?>
 <h2>Chỉnh sửa user #<?php echo $user['id'];?></h2>
 <form action="" method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label for="username">Username <span style="color: red;">*</span></label>
		<input type="text" name="username" id="username" class="form-control " 
		value="<?php echo $user['username'];?>" disabled>
	</div>
	<div class="from-group">
		<label for="first_name">Họ đệm<span style="color: red;">*</span></label>
		<input value="<?php echo $user['first_name'];?>" type="text" name="first_name" id="first_name" class="form-control">
	</div>
	<div class="from-group">
		<label for="last_name">Tên<span style="color: red;">*</span></label>
		<input value="<?php echo $user['last_name'];?>" type="text" name="last_name" id="last_name" class="form-control">
	</div>
	<div class="from-group">
		<label for="phone">Số điện thoại<span style="color: red;">*</span></label>
		<input value="0<?php echo $user['phone'];?>"  type="phone" name="phone" id="phone" class="form-control">
	</div>
	<div class="from-group">
		<label for="email">Email</label>
		<input value="<?php echo $user['email'];?>" type="text" name="email" id="email" class="form-control">
	</div>
	<div class="from-group">
		<label for="avatar">Avatar</label>
		<input value="<?php echo $user['avatar'];?>"  type="file" name="avatar" id="avatar" class="form-control"><br>
		<img height="80" src="assets/images/users/<?php echo $user['avatar'];?>" alt="">
	</div>
	<div class="from-group">
		<label for="status">Trạng thái</label>
		<select name="status" class="form-control" id="status">
			<?php 
			$selected_active = '';
            $selected_disabled = '';
            if (isset($_POST['status'])) {
                switch ($_POST['status']) {
                    case 0:
                        $selected_disabled = 'selected';
                        break;
                    case 1:
                        $selected_active = 'selected';
                        break;
                }
            }
            ?>
            <option value="0" <?php echo $selected_disabled; ?>>Disabled</option>
            <option value="1" <?php echo $selected_active ?>>Active</option>
			?>
		</select>
	</div>
	<br>
	<div class="form-group">
		<input type="submit" name="submit" value="Cập nhật" class="btn btn-primary">
		<a href="index.php?controller=user&action=index" class="btn btn-outline-dark">Trở lại</a>
	</div>
</form>
