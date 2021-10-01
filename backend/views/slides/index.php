<h1>Danh sách Slide</h1>
<a href="index.php?controller=slide&action=create" class="btn btn-outline-primary">Thêm mới</a>
<br><br>
<table class="table table-bordered">
	<tr align="center">
		<th>STT</th>
		<th>Tiêu đề</th>
		<th>Slide</th>
		<th>Ngày tạo</th>
		<th>Trạng thái</th>
		<th>Tùy chọn</th>
	</tr>
	<?php foreach ($slide as $slide) :?>
		<tr align="center">
			<td style="width: 100px;"><?php echo $slide['id'];?></td>
			<td><?php echo $slide['title'];?></td>
			<td style="width: 350px;">
				<img width="300" height="100" src="assets/images/slides/<?php echo $slide['avatar']; ?>" alt="">
			</td>
			<td style="width: 200px;"><?php echo date('d-m-Y H:i:s', strtotime($slide['created_at'])) ?></td>
			<td>
		        <?php
		        $status_text = '<span class="btn btn-success btn-sm disabled"><i class="fas fa-check"></i></span>';
		        if ($slide['status'] == 0) {
		          $status_text = '<span class="btn btn-danger btn-sm disabled"><i class="fas fa-times"></i></span>';
		        }
		        echo $status_text;
		        ?>
      	</td>
       		<td style="width: 200px;">
        		<?php 
		        	$url_detail = "index.php?controller=slide&action=detail&id=" . $slide['id'];
		        	$url_update = "index.php?controller=slide&action=update&id=" . $slide['id'];
		        	$url_delete = "index.php?controller=slide&action=delete&id=" . $slide['id'];
        		?>
	        	<a title="Chi tiết" class="btn btn-sm btn-success" href="<?php echo $url_detail ?>"><i class="fa fa-eye"></i></a>
	        	<a title="Cập nhật" class="btn btn-sm btn-outline-primary" href="<?php echo $url_update ?>"><i class="fas fa-pen"></i></i></a>
	          	<a title="Xóa" class="btn btn-sm btn-dark" href="<?php echo $url_delete ?>" onclick="return confirm('Bạn chắc chắn xóa không?')"><i class="fa fa-trash"></i></a>
        	</td>
		</tr>
	<?php endforeach; ?>	
</table>

<?php echo $data; ?>