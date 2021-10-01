<h1>Danh sách danh mục</h1>
<br>
<a href="index.php?controller=category&action=create" class="btn btn-outline-primary mb-3">Thêm mới</a>

<table class="table table-bordered">
	<tr align="center">
		<th>STT</th>
		<th>Tên danh mục</th>
		<th>Ảnh danh mục</th>
		<th>Trạng thái</th>
		<th>Ngày tạo</th>
		<th>Tùy chọn</th>
	</tr>
	<?php 	$number = 1; ?>
	<?php foreach ($categories as $categories) : ?>
		<tr align="center">
			<td><?php echo $number++; ?></td>
			<td><?php echo $categories['name']; ?></td>
			<td>
				<img height="100" src="assets/images/categories/<?php echo $categories['avatar']; ?>" alt="">
			</td>
			<td>
		        <?php
		        $status_text = '<span class="btn btn-success btn-sm disabled"><i class="fas fa-check"></i></span>';
		        if ($categories['status'] == 0) {
		          $status_text = '<span class="btn btn-danger btn-sm disabled"><i class="fas fa-times"></i></span>';
		        }
		        echo $status_text;
		        ?>
      		</td>
       		<td><?php echo date('d-m-Y H:i:s', strtotime($categories['created_at'])) ?></td>
       		<td>
        		<?php 
		        	$url_detail = "index.php?controller=category&action=detail&id=" . $categories['id'];
		        	$url_update = "index.php?controller=category&action=update&id=" . $categories['id'];
		        	$url_delete = "index.php?controller=category&action=delete&id=" . $categories['id'];
        		?>
	        	<a title="Chi tiết" class="btn btn-sm btn-success" href="<?php echo $url_detail ?>"><i class="fa fa-eye"></i></a>
	         	<a title="Cập nhật" class="btn btn-sm btn-outline-primary" href="<?php echo $url_update ?>"><i class="fas fa-pen"></i></i></a> 
	          	<a title="Xóa" class="btn btn-sm btn-dark" href="<?php echo $url_delete ?>" onclick="return confirm('Bạn chắc chắn xóa không?')"><i class="fa fa-trash"></i></a>
        	</td>
        	</tr>
	<?php endforeach; ?>
</table>
<?php echo $data; ?>
