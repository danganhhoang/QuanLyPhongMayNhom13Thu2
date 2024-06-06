<h2>Thêm Máy Tính</h2>
<form action="?controller=mayTinh&action=create" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="maPhong">Phòng Máy</label>
        <select class="form-control" id="maPhong" name="maPhong" required>
            <?php foreach ($phongMayList as $phongMay) : ?>
                <option value="<?php echo $phongMay['maPhong']; ?>"><?php echo $phongMay['tenPhong']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="tenMay">Tên Máy</label>
        <input type="text" class="form-control" id="tenMay" name="tenMay" required>
    </div>
    <div class="form-group">
        <label for="cauHinh">Cấu Hình</label>
        <input type="text" class="form-control" id="cauHinh" name="cauHinh">
    </div>
    <div class="form-group">
        <label for="trangThai">Trạng Thái</label>
        <input type="text" class="form-control" id="trangThai" name="trangThai">
    </div>
    <div class="form-group">
        <label for="hinhAnh">Hình Ảnh</label>
        <input type="file" class="form-control-file" id="hinhAnh" name="hinhAnh">
    </div>
    <button type="submit" class="btn btn-primary">Thêm</button>
</form>
