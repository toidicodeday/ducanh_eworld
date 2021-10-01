<?php  ?>
<h1>Thêm Slide</h1>
<form action="" method="POST" enctype="multipart/form-data">
	<div class="form-group">
	<label for="title"/>Tiêu đề</label>
	<input type="text" name="title" class="form-control" id="title">
</div>
<div class="form-group">
	<label for="avatar"/>Ảnh slide</label>
	<input type="file" name="avatar" onchange="displayImage(this);" class="form-control" id="avatar">
	<img style="width: 200px; margin-top: 10px" class="image-create" src="" alt="">
		
        <script>
            function displayImage(input) {
                // $('.image-create').attr('src', URL.createObjectURL(event.target.files[0]));
                $('.image-create')[0].src = (window.URL ? URL : webkitURL).createObjectURL(input.files[0]);
            }
        </script>
</div>
<div class="form-group">
	<label for="status">Trạng thái</label>
	<select class="form-control" name="status" id="status">
			<option value="1">Active</option>
            <option value="0">Disable</option>
	</select>
</div>
<div class="form-group">
	<input type="submit" name="submit" class="btn btn-primary" value="Lưu">
	<a href="index.php?controller=slide&action=index" class="btn btn-outline-dark">Trở lại</a>
</div>
</form>