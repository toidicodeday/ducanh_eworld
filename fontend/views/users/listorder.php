<div class="container">
	<div class="row mt-70">
		<div class="col-md-4 text-center">
			
			<h4>Tên tài khoản: <?php echo $_SESSION['user']['first_name'] . ' ' . $_SESSION['user']['last_name']; ?></h4>
			<ul class="user-list">
				<li>
					<a class="btn btn-outline-warning w-75 mt-20 mb-20" href="index.php?controller=user&action=account">Thông tin cá nhân</a>
				</li>
				<li class="pb-50">
					<a class="active btn btn-outline-warning w-75" href="index.php?controller=user&action=list">Danh sách đơn hàng</a>
				</li>
			</ul>
		</div>
		<div class="col-md-8 mb-30">
			<table class="table table-bordered text-center">
				<tr>
					<th>ID đơn hàng</th>
					<th>Tổng giá trị đơn hàng</th>
					<th>Trạng thái đơn hàng</th>
					<th>Ngày tạo đơn hàng</th>
					<th>Tùy chọn</th>
				</tr>
				<?php foreach ($orders as $order) : ?>
					<tr>
						<td>DH<?php echo $order['id'];?></td>
						<td><?php echo $order['price_total'];?></td>
						<td><?php echo ($order['payment_status'] == 1 ? 'Đã xác nhận' : 'Chưa xác nhận') ?></td>
						<td><?php echo date('d-m-Y H:i:s', strtotime($order['created_at'])) ?></td>
						<td>
							<?php
            				$url_detail = "index.php?controller=user&action=detail&id=" . $order['id'];
            			?>
						 <a title="Chi tiết" class="btn btn-sm btn-warning" href="<?php echo $url_detail ?>"><i class="fa fa-eye"></i></a>
						</td>
					</tr>
				<?php endforeach; ?>
			</table>
		</div>
	</div>
</div>
