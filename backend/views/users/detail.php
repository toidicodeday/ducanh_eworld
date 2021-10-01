 <h1>Chi tiết user # <?php echo $user['id'];?></h1>
 <table class="table table-bordered">
 	<tr>
 		<th width="150px;">ID</th>
 		<td><?php echo $user['id']; ?></td>	
 	</tr>
     <tr>
         <th>Tên đăng nhập</th>
         <td><?php echo $user['username'];?></td>
     </tr>
     <tr>
     	<th>Họ đệm</th>
     	<td> <?php echo $user['first_name'] ?> </td>
     </tr>
     <tr>
     	<th>Tên</th>
     	<td><?php echo $user['last_name'] ?></td>
     </tr>
     <tr>
     	<th>Số điện thoại</th>
     	<td>0<?php echo $user['phone'];?></td>
     </tr>
     <tr>
     	<th>Email</th>
     	<td><?php echo $user['email'];?></td>
     </tr>
     <tr>
     	<th>Ảnh</th>
     	<td>
     		<img height="80" src="assets/images/users/<?php echo $user['avatar'];?>" alt="">
     	</td>
     </tr>
     <tr>
     	<th>Created_at</th>
     	<td>
     		<?php echo date('d-m-y H:i:s', strtotime($user['created_at'])) ?>
     	</td>
     </tr>

 </table>
 <a href="index.php?controller=user&action=index" class="btn btn-primary" >Trở lại</a>