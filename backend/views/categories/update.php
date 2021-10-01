<h1>Cập nhật danh mục #<?php echo $category['id'];?></h1>

<form action="" method="POST" enctype="multipart/form-data">
	<div class="from_group mb-3">
		<label for="name">Tên danh mục</label>
		<input value="<?php echo $category['name']; ?>" type="text" name="name" id="name" class="form-control">
	</div>
	 <div class="form-group">
        <label for="action">Danh mục</label>
        <input type="text" name="action" value="" class="form-control">
    </div>
	<div class="from_group mb-3">
		<label for="avatar">Ảnh sản phẩm</label>
		<input onchange="displayImage(this);" type="file" name="avatar" id="avatar" class="form-control">
		<img src="#" alt="" style="display: none;" width="100" height="100">
		<br>
		<?php if (isset($category['avatar'])): ?>
          <img class="image" height="80" src="assets/images/categories/<?php echo $category['avatar'] ?>"/>
     	 <?php endif; ?>
     	  <script>
            function displayImage(input) {
                $('.image').attr('src', URL.createObjectURL(event.target.files[0]));
                // $('.image')[0].src = (window.URL ? URL : webkitURL).createObjectURL(input.files[0]);
            }
        </script>
	</div>
	<div class="form-group mb-3">
        <label for="description">Mô tả</label>
        <textarea name="description" id="description" class="form-control"><?php echo $category['description']; ?></textarea>
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
    <div class="form-group mb-3">
    	<input type="submit" name="submit" value="Lưu" class="btn btn-primary">
    	<a href="index.php?controller=category&action=index" class="btn btn-outline-dark">Trở lại</a>
    </div>
</form>
<script src="assets/ckeditor/ckeditor.js"></script>