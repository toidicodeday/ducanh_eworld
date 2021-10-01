<h1>Chi tiết đơn hàng # <?php echo $order['id'];?></h1> 
<br>
<table class="table table-bordered">
	<tr>
		<th width="150px;">STT</th>
		<td><?php echo $order['id']; ?></td>
	</tr>
	<tr>
		<th width="150px;">Tên khách hàng</th>
		<td><?php echo $order['fullname']; ?></td>
	</tr>
	<tr>
		<th>Địa chỉ</th>
		<td><?php echo $order['address']; ?></td>
	</tr>
	<tr>
		<th>Email</th>
		<td><?php echo $order['email']; ?></td>
	</tr>
	<tr>
		<th>Tổng giá trị đơn hàng</th>
		<td><?php echo number_format($order['price_total'], 0, '', '.'); ?> VNĐ</td>
	</tr>
	<tr>
		<th>Trạng thái đơn hàng</th>
		<td>
			<?php
			echo ($order['payment_status'] == 1) ? 'Đã thanh toán' : 'Chưa thanh toán';
			?>
		</td>
	</tr>
	<tr>
		<th>Ngày tạo</th>
		<td>
			<?php echo date('d-m-Y H:i:s', strtotime($order['created_at'])); ?>
		</td>
	</tr>
</table>
<a class="btn btn-outline-dark" href="index.php?controller=order">Trở lại</a>