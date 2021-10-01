<h1>Thêm mới danh mục</h1>
<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">Tên danh mục</label>
        <input type="text" name="name" value="" class="form-control">
    </div>
    <div class="form-group">
        <label for="action">Danh mục</label>
        <input type="text" name="action" value="" class="form-control">
    </div>
    <div class="from_group mb-3">
        <label for="avatar">Ảnh danh mục</label>
        <input type="file" name="avatar" id="avatar" onchange="displayImage(this);" class="form-control">
        <img style="width: 200px; margin-top: 10px" class="image-create" src="" alt="">
        
        <script>
            function displayImage(input) {
                // $('.image-create').attr('src', URL.createObjectURL(event.target.files[0]));
                $('.image-create')[0].src = (window.URL ? URL : webkitURL).createObjectURL(input.files[0]);
            }
        </script>

    </div>
    <div class="form-group">
        <label>Mô tả</label>
        <textarea class="form-control" name="description" id=""></textarea>
    </div>
    <div class="form-group">
        <label>Trạng thái</label>
        <select name="status" class="form-control" id="status">
        <option value="1">Active</option>
        <option value="0">Disable</option>
      </select>
    </div>
    <input type="submit" class="btn btn-primary" name="submit" value="Lưu">
    <input type="reset" class="btn btn-outline-dark" name="submit" value="Hủy bỏ">
</form>