<h1>Chi tiết sản phẩm #<?php echo $product['id'];?></h1> 
<br>
<table class="table table-bordered">
	<tr>
		<th width="150px;">STT</th>
		<td><?php echo $product['id']; ?></td>
	</tr>
	<tr>
		<th width="150px;">Tên danh mục</th>
		<td><?php echo $product['category_id']; ?></td>
	</tr>
	<tr>
		<th>Tên sản phẩm</th>
		<td><?php echo $product['title']; ?></td>
	</tr>
	<tr>
		<th>Ảnh sản phẩm</th>
		<td>
			<?php if (!empty($product['avatar'])) :?>
				<img src="assets/images/products/<?php echo $product['avatar'];?>" width="60">
			<?php endif; ?>
		</td>
	</tr>
	<tr>
		<th>Giá</th>
		<td><?php echo $product['price']; ?></td>
	</tr>
	<tr>
		<th>Số lượng</th>
		<td><?php echo $product['amount']; ?></td>
	</tr>
	<tr>
		<th>Trạng thái</th>
		<td>
			<?php 
			$status_text = 'Active';
			if ($product['status'] == 0) {
				$status_text = 'Disable';
			}
			echo $status_text;
			?>
		</td>
	</tr>
	<tr>
		<th>Phân loại</th>
		<td>
			<?php
		        if ($product['type'] == 0) {
		          $status_text = 'Mới';
		        } else if ($product['type'] == 1) {
		          $status_text = 'Bán chạy';
		        } else {
		          $status_text = 'Nổi bật';
		        }
		        echo $status_text;
		        ?>
		</td>
	</tr>
	<tr>
		<th>Ngày tạo</th>
		<td>
			<?php echo date('d-m-Y H:i:s', strtotime($product['created_at'])); ?>
		</td>
	</tr>
</table>
<a class="btn btn-outline-dark" href="index.php?controller=product">Trở lại</a>