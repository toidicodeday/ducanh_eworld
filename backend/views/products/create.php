<h1>Thêm mới sản phẩm</h1>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="category_id">Chọn danh mục</label>
        <select name="category_id" class="form-control" id="category_id">
            <?php foreach ($categories as $category) :
                $selected = '';
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
	<div class="from_group mt-3 mb-3">
		<label for="title">Tên sản phẩm</label>
		<input type="text" name="title" id="title" class="form-control">
	</div>
	<div class="from_group mb-3">
		<label for="avatar">Ảnh sản phẩm</label>
		<input type="file" name="avatar" id="avatar" onchange="displayImage(this);" class="form-control">
		<img style="width: 200px; margin-top: 10px" class="image-create" src="" alt="">
		
        <script>
            function displayImage(input) {
                // $('.image-create').attr('src', URL.createObjectURL(event.target.files[0]));
                $('.image-create')[0].src = (window.URL ? URL : webkitURL).createObjectURL(input.files[0]);
            }
        </script>

	</div>
    <div class="from_group mb-3">
        <label for="images">Ảnh mô tả sản phẩm</label>
        <input multiple="multiple" type="file" name="images[]" id="images" class="form-control">
    </div>
	<div class="from_group mb-3">
		<label for="price">Giá sản phẩm</label>
		<input type="number" name="price" id="price" class="form-control">
	</div>
	<div class="from_group mb-3">
		<label for="amount">Số lượng</label>
		<input type="number" name="amount" id="amount" class="form-control">
	</div>
	<div class="form-group mb-3">
        <label for="summary">Mô tả ngắn sản phẩm</label>
        <textarea name="summary" id="summary" class="form-control"></textarea>
    </div>
    <div class="form-group mb-3">
        <label for="content">Mô tả chi tiết sản phẩm</label>
        <textarea name="content" id="content" class="form-control ckeditor"></textarea>
    </div>
    <div class="form-group mb-3">
    	<label for="status">Trạng thái</label>
    	<select name="status" class="form-control" id="status">
    		<option value="1">Active</option>
    		<option value="0">Disable</option>
    	</select>
    </div>
     <div class="form-group mb-3">
        <label for="type">Phân loại</label>
        <select name="type" class="form-control" id="status">
            <option value="0">Mới</option>
            <option value="1">Bán chạy</option>
            <option value="2">Nổi bật</option>
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