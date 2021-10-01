<div class="container">
	<div class="row mt-70">
		<div class="col-md-4 text-center">
			
			<h4>Tên tài khoản: <?php echo $_SESSION['user']['first_name'] . ' ' . $_SESSION['user']['last_name']; ?></h4>
			<ul class="user-list">
				<li>
					<a class="btn btn-outline-warning w-75 mt-20 mb-20" href="index.php?controller=user&action=account">Thông tin cá nhân</a>
				</li>
				<li>
					<a class="active btn btn-outline-warning w-75" href="index.php?controller=user&action=list">Danh sách đơn hàng</a>
				</li>
			</ul>
		</div>
		<div  class="col-md-8 mb-30">
			<table class=" table table-bordered text-center">
				<tr>
					<th>Tên sản phẩm</th>
					<th>Số lượng sản phẩm</th>
					<th>Giá sản phẩm</th>
				</tr>
				<?php
				$price_total = 0;
				 foreach ($order_details as $order_detail) : ?>
					<tr>
						<td><?php echo $order_detail['product_name']; ?> </td>
						<td><?php echo $order_detail['quantity']; ?> </td>
						<td><?php echo number_format($order_detail['product_price'], 0, '', '.'); ?> VNĐ </td>
					</tr>
				<?php $price_total += $order_detail['product_price'] ?>
				<?php endforeach; ?>
				<tr>
					<th>Tổng giá trị đơn hàng:</th>
					<td colspan="2">
						<?php
						echo number_format($price_total, 0, '', '.')
						?>
						VNĐ
					</td>
				</tr>	
			</table>
			<a class="btn btn-outline-warning" href="index.php?controller=user&action=list">Quay lại</a>
		</div>
	</div>
</div>