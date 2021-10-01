<h1>Danh sách User</h1>
<a href="index.php?controller=user&action=create" class="btn btn-outline-primary">
		Thêm mới
</a>
<br><br>		
<table class="table table-bordered">
	<tr align="center">
		<th>STT</th>
		<th>Họ và tên</th>
		<th>Số điện thoại</th>
		<th>Email</th>
		<th>Ảnh</th>
		<th>Chức vụ</th>
		<th>Ngày tạo</th>
		<th>Tùy chọn</th>
	</tr>
<?php foreach ($users as $user) : ?>
	<tr align="center">
		<td><?php echo $user['id']; ?></td>
		<td><?php echo ucfirst($user['first_name'] . ' ' . $user['last_name']); ?></td>
		<td>0<?php echo $user['phone']; ?></td>
		<td><?php echo $user['email']; ?></td>
		<td>
			<img src="assets/images/users/<?php echo $user['avatar']?>" height="80" alt="">
		</td>
		<td>
			<?php 
				echo ($user['role_id'] == 1) ? 'Admin' : 'User';
			?>
		</td>
		<td><?php echo date('d-m-Y H:i:s', strtotime($user['created_at'])) ?></td>
        <td>
            <?php
            $url_detail = "index.php?controller=user&action=detail&id=" . $user['id'];
            $url_update = "index.php?controller=user&action=update&id=" . $user['id'];
            $url_delete = "index.php?controller=user&action=delete&id=" . $user['id'];
            ?>
            <a title="Chi tiết" class="btn btn-sm btn-success" href="<?php echo $url_detail ?>"><i class="fa fa-eye"></i></a>
	        <a title="Cập nhật" class="btn btn-sm btn-outline-primary w-25" href="<?php echo $url_update ?>"><i class="fas fa-pen"></i></i></a>
	        <a title="Xóa" class="btn btn-sm btn-dark" href="<?php echo $url_delete ?>" onclick="return confirm('Bạn chắc chắn xóa không?')"><i class="fa fa-trash"></i></a>
        </td>
	</tr>
<?php endforeach; ?>
</table>
<?php echo $data; ?>