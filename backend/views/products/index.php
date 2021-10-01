<h1>Danh sách sản phẩm</h1>
<br>
<a href="index.php?controller=product&action=create" class="btn btn-outline-primary mb-3">Thêm mới</a>

<table class="table table-bordered">
	<tr align="center">
		<th>STT</th>
		<th>Danh mục</th>
		<th width="200">Tên sản phẩm</th>
		<th>Ảnh sản phẩm</th>
		<th>Giá</th>
		<th>Số lượng</th>
		<th>Trạng thái</th>
		<th>Phân loại</th>
		<th>Ngày tạo</th>
		<th width="200">Tùy chọn</th>
	</tr>
	<?php foreach ($product as $product) : ?>
		<tr align="center">
			<td><?php echo $product['id']; ?></td>
			<td><?php echo $product['category_name'];?></td>
			<td><?php echo $product['title']; ?></td>
			<td>
				<img height="80" src="assets/images/products/<?php echo $product['avatar']; ?>" alt="">
			</td>	
			<td><?php echo number_format($product['price']) ?></td>
			<td><?php echo $product['amount']; ?></td>
			<td>
		        <?php
		        $status_text = '<span class="btn btn-success btn-sm disabled"><i class="fas fa-check"></i></span>';
		        if ($product['status'] == 0) {
		          $status_text = '<span class="btn btn-danger btn-sm disabled"><i class="fas fa-times"></i></span>';
		        }
		        echo $status_text;
		        ?>
      		</td>
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
       		<td><?php echo date('d-m-Y H:i:s', strtotime($product['created_at'])) ?></td>
       		<td>
        		<?php 
		        	$url_detail = "index.php?controller=product&action=detail&id=" . $product['id'];
		        	$url_update = "index.php?controller=product&action=update&id=" . $product['id'];
		        	$url_delete = "index.php?controller=product&action=delete&id=" . $product['id'];
        		?>
	        	<a title="Chi tiết" class="btn btn-sm btn-success" href="<?php echo $url_detail ?>"><i class="fa fa-eye"></i></a>
	         	<a title="Cập nhật" class="btn btn-sm btn-outline-primary" href="<?php echo $url_update ?>"><i class="fas fa-pen"></i></i></a> 
	          	<a title="Xóa" class="btn btn-sm btn-dark" href="<?php echo $url_delete ?>" onclick="return confirm('Bạn chắc chắn xóa không?')"><i class="fa fa-trash"></i></a>
        	</td>
        	</tr>
	<?php endforeach; ?>
</table>
<?php echo $data; ?>
