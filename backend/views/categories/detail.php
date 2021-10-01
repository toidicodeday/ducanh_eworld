<h1>Chi tiết danh mục #<?php echo $category['id'];?></h1> 
<br>
<table class="table table-bordered">
	<tr>
		<th width="150px;">STT</th>
		<td><?php echo $category['id']; ?></td>
	</tr>
	<tr>
		<th>Tên danh mục</th>
		<td><?php echo $category['name']; ?></td>
	</tr>
	<tr>
		<th>Ảnh danh mục</th>
		<td>
			<?php if (!empty($category['avatar'])) :?>
				<img src="assets/images/categories/<?php echo $category['avatar'];?>" width="60">
			<?php endif; ?>
		</td>
	</tr>
	<tr>
		<th>Mô tả danh mục</th>
		<td><?php echo $category['description']; ?></td>
	</tr>
	<tr>
		<th>Status</th>
		<td>
			<?php 
			$status_text = 'Active';
			if ($category['status'] == 0) {
				$status_text = 'Disable';
			}
			echo $status_text;
			?>
		</td>
	</tr>
	<tr>
		<th>Created_at</th>
		<td>
			<?php echo date('d-m-Y H:i:s', strtotime($category['created_at'])); ?>
		</td>
	</tr>
</table>
<a class="btn btn-outline-dark" href="index.php?controller=category">Trở lại</a>