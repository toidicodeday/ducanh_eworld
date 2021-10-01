<h1>Danh sách đơn đặt hàng</h1>
<br>

<table class="table table-bordered text-center">
	<tr align="center">
		<th>ID đơn hàng</th>
		<th>Tên khách hàng</th>
		<th>Địa chỉ</th>
		<th>Số điện thoại</th>
		<th width="150">Tổng giá trị đơn hàng</th>
		<th width="170">Trạng thái đơn hàng</th>
		<th width="100">Ngày tạo</th>
		<th width="200">Tùy chọn</th>
	</tr>

	<?php foreach ($orders as $order) : ?>
		<tr>
			<td><?php echo $order['id'];?></td>
			<td><?php echo $order['fullname'];?></td>
			<td><?php echo $order['address'];?></td>
			<td>0<?php echo $order['mobile'];?></td>
			<td><?php echo number_format( $order['price_total'], 0, '', '.') ?> VNĐ</td>
			<td>
		        <?php
		        $status_text = '<span class="btn btn-success btn-sm disabled">Đã thanh toán</span>';
		        if ($order['payment_status'] == 0) {
		          $status_text = '<span class="btn btn-danger btn-sm disabled">Chưa thanh toán</span>';
		        }
		        echo $status_text;
		        ?>
      		</td>
      		<td><?php echo date('d-m-y H:i:s', strtotime($order['created_at'])); ?></td>
      		<td>
      			<a title="Chi tiết" class="btn btn-sm btn-success" href="index.php?controller=order&action=detail&id=<?php echo $order['id'] ?>"><i class="fa fa-eye"></i></a>
	        <a title="Cập nhật" class="btn btn-sm btn-outline-primary" href="index.php?controller=order&action=update&id=<?php echo $order['id'] ?>"><i class="fas fa-pen"></i></i></a> 
	        <a title="Xóa" class="btn btn-sm btn-dark" href="index.php?controller=order&action=delete&id=<?php echo $order['id'] ?>" onclick="return confirm('Bạn chắc chắn xóa không?')"><i class="fa fa-trash"></i></a>
      		</td>
		</tr>
	<?php endforeach;  ?>
</table>
<?php echo $data ?>
