<?php  ?>
<h1>Chỉnh sửa Slide #<?php echo $slide['id'];?></h1>
<form action="" method="POST" enctype="multipart/form-data">
	<div class="form-group">
	<label for="title"/>Tiêu đề</label>
	<input value="<?php echo $slide['title'];?>" type="text" name="title" class="form-control" id="title">
</div>
<div class="from_group mb-3">
		<label for="avatar">Ảnh slide</label>
		<input onchange="displayImage(this);" type="file" name="avatar" id="avatar" class="form-control">
		<img src="#" alt="" style="display: none;" width="100" height="100">
		<br>
		<?php if (isset($slide['avatar'])): ?>
          <img class="image" height="80" src="assets/images/slides/<?php echo $slide['avatar'] ?>"/>
     	 <?php endif; ?>
     	  <script>
            function displayImage(input) {
                $('.image').attr('src', URL.createObjectURL(event.target.files[0]));
                // $('.image')[0].src = (window.URL ? URL : webkitURL).createObjectURL(input.files[0]);
            }
        </script>
</div>
<div class="form-group mb-3">
    	<label for="status">Trạng thái</label>
    	<select name="status" class="form-control" id="status">
    		<?php 
			 $selected_active = '';
			 $selected_disabled = '';
			 if (isset($_POST['status'])) {
			 	switch ($_POST['status']) {
			 		case '0':
			 			$selected_disabled = 'selected';
			 			break;
			 		case '1':
			 			$selected_active = 'selected';
			 			break;
			 	}
			 }
			 ?>
    		<option value="1"><?php echo $selected_disabled; ?>Active</option>
			<option value="0"><?php echo $selected_active; ?>Disable</option>
    	</select>
    </div>
<div class="form-group">
	<input type="submit" name="submit" class="btn btn-primary" value="Lưu">
	<a href="index.php?controller=slide&action=index" class="btn btn-outline-dark">Trở lại</a>
</div>
</form>