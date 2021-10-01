<h1>Cập nhật sản phẩm #<?php echo $product['id'];?></h1>

<form action="" method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label for="category_id">Chọn danh mục</label>
		<select name="category_id" class="form-control" id="category_id">
			<?php foreach ($categories as $category) :

				$selected = '';
				if ($category['id'] == $product['category_id']) {
	              $selected = 'selected';
	            }
				if (isset($_POST['category_id']) && $category['id'] == $_POST['category_id']) {
					$selected = 'selected';
				}
			?>
			<option value="<?php echo $category['id'] ?>" <?php echo $selected; ?>>
				<?php echo $category['name'] ?>
			</option>
		<?php endforeach; ?>
		</select>
	</div>
	<div class="from_group mb-3">
		<label for="title">Tên sản phẩm</label>
		<input value="<?php echo $product['title']; ?>" type="text" name="title" id="title" class="form-control">
	</div>
	<div class="from_group mb-3">
		<label for="avatar">Ảnh sản phẩm</label>
		<input onchange="displayImage(this);" type="file" name="avatar" id="avatar" class="form-control">
		<img src="#" alt="" style="display: none;" width="100" height="100">
		<br>
		<?php if (isset($product['avatar'])): ?>
          <img class="image" height="80" src="assets/images/products/<?php echo $product['avatar'] ?>"/>
     	 <?php endif; ?>
     	  <script>
            function displayImage(input) {
                $('.image').attr('src', URL.createObjectURL(event.target.files[0]));
                // $('.image')[0].src = (window.URL ? URL : webkitURL).createObjectURL(input.files[0]);
            }
        </script>    
	</div>
	<div class="from_group mb-3">
        <label for="images">Ảnh mô tả sản phẩm</label>
        <input multiple="multiple" type="file" name="images[]" id="images" class="form-control">
    </div>
	<div class="from_group mb-3">
		<label for="price">Giá sản phẩm</label>
		<input value="<?php echo $product['price']; ?>" type="number" name="price" id="price" class="form-control">
	</div>
	<div class="from_group mb-3">
		<label for="amount">Số lượng</label>
		<input value="<?php echo $product['amount']; ?>" type="number" name="amount" id="amount" class="form-control">
	</div>
	<div class="form-group mb-3">
        <label for="summary">Mô tả ngắn sản phẩm</label>
        <textarea name="summary" id="summary" class="form-control"><?php echo $product['summary']; ?></textarea>
    </div>
    <div class="form-group mb-3">
        <label for="content">Mô tả chi tiết sản phẩm</label>
        <textarea name="content" id="content" class="form-control ckeditor">
        	<?php echo $product['content']; ?>
        </textarea>
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
    	<label for="type">Trạng thái</label>
    	<select name="type" class="form-control" id="type">
    		<?php 
			 $selected_new = '';
			 $selected_bestseller = '';
			 $selected_feature = '';
			 if (isset($_POST['type'])) {
			 	switch ($_POST['type']) {
			 		case '0':
			 			$selected_new = 'selected';
			 			break;
			 		case '1':
			 			$selected_bestseller = 'selected';
			 			break;
			 		case '2':
			 			$selected_feature = 'selected';
			 			break;
			 	}
			 }
			 ?>
    		<option value="0"><?php echo $selected_new; ?>Mới</option>
			<option value="1"><?php echo $selected_bestseller; ?>Bán chạy</option>
			<option value="2"><?php echo $selected_feature; ?>Nổi bật</option>
    	</select>
    </div>
    <div class="form-group mb-3">
    	<input type="submit" name="submit" value="Lưu" class="btn btn-primary">
    	<a href="index.php?controller=product&action=index" class="btn btn-outline-dark">Trở lại</a>
    </div>
</form>
<script src="assets/ckeditor/ckeditor.js"></script>
<script>
    $(document).ready(function() {
        var obj_ckfiner = {
        filebrowserBrowseUrl: 'assets/ckfinder/ckfinder.html',
        filebrowserUploadUrl: 'assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        };
        CKEDITOR.replace('content', obj_ckfiner);
});
</script>