<h1>Cập nhật đơn hàng #<?php echo $order['id'];?></h1>

<form action="" method="POST" enctype="multipart/form-data">
	<div class="from_group mb-3">
		<label for="fullname">Tên khách hàng</label>
		<input disabled value="<?php echo $order['fullname']; ?>" type="text" name="fullname" id="fullname" class="form-control">
	</div>
	<div class="from_group mb-3">
		<label for="address">Địa chỉ</label>
		<input disabled value="<?php echo $order['address']; ?>" type="text" name="address" id="address" class="form-control">
	</div>
	<div class="from_group mb-3">
		<label for="mobile">Số điện thoại</label>
		<input disabled value="0<?php echo $order['mobile']; ?>" type="number" name="mobile" id="mobile" class="form-control">
	</div>
	<div class="form-group mb-3 ">
        <label for="email">Email</label>
        <input disabled value="<?php echo $order['email']; ?>" name="email" id="email" class="form-control">
    </div>
   	<div class="form-group mb-3 ">
        <label for="price_total">Tổng giá trị đơn hàng</label>
        <input disabled value="<?php echo number_format($order['price_total'], 0, '', '.') ?> VNĐ" name="price_total" id="price_total" class="form-control"> 
    </div>
    <div class="form-group mb-3">
    	<label for="payment_status">Trạng thái đơn hàng</label>
    	<select name="payment_status" class="form-control" id="payment_status">
    		<?php 
			 $selected_active = '';
			 $selected_disabled = '';
			 if (isset($_POST['payment_status'])) {
			 	switch ($_POST['payment_status']) {
			 		case '0':
			 			$selected_disabled = 'selected';
			 			break;
			 		case '1':
			 			$selected_active = 'selected';
			 			break;
			 	}
			 }
			 ?>
    		<option value="1"><?php echo $selected_disabled; ?>Đã thanh toán</option>
			<option value="0"><?php echo $selected_active; ?>Chưa thanh toán</option>
    	</select>
    </div>
    <div class="form-group mb-3">
    	<input type="submit" name="submit" value="Cập nhật" class="btn btn-primary">
    	<a href="index.php?controller=order&action=index" class="btn btn-outline-dark">Trở lại</a>
    </div>
</form>
