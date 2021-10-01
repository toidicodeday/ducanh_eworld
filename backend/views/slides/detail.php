<?php 

?>
<h1>Chi tiết Slide #<?php echo $slide['id']; ?></h1>
<table class="table table-bordered">
	<tr>
		<th>ID</th>
		<td><?php echo $slide['id']; ?></td>
	</tr>
	<tr>
		<th>Tiêu đề</th>
		<td><?php echo $slide['title']; ?></td>
	</tr>
	<tr>
		<th>Ảnh slide</th>
		<td>
			<?php if (!empty($slide['avatar'])) :?>
				<img width="500" src="assets/images/slides/<?php echo $slide['avatar'];?>" width="200">
			<?php endif; ?>
		</td>
	</tr>
</table>
<a href="index.php?controller=slide&action=index" class="btn btn-outline-dark">Trở lại</a>