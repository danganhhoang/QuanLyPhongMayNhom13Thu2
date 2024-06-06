<!-- views/phongmay/create.php -->
<h2>Thêm Phòng Máy</h2>
<form action="?controller=phongMay&action=create" method="post">
    <div class="form-group">
        <label for="tenPhong">Tên Phòng</label>
        <input type="text" class="form-control" id="tenPhong" name="tenPhong" required>
    </div>
    <div class="form-group">
        <label for="viTri">Vị Trí</label>
        <input type="text" class="form-control" id="viTri" name="viTri" required>
    </div>
    <button type="submit" class="btn btn-primary">Thêm</button>
</form>
