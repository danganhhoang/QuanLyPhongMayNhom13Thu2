<!-- views/phongmay/update.php -->
<h2>Sửa Phòng Máy</h2>
<form action="?controller=phongMay&action=update&id=<?php echo $phongMay['maPhong']; ?>" method="post">
    <div class="form-group">
        <label for="tenPhong">Tên Phòng</label>
        <input type="text" class="form-control" id="tenPhong" name="tenPhong" value="<?php echo $phongMay['tenPhong']; ?>" required>
    </div>
    <div class="form-group">
        <label for="viTri">Vị Trí</label>
        <input type="text" class="form-control" id="viTri" name="viTri" value="<?php echo $phongMay['viTri']; ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Cập Nhật</button>
</form>
