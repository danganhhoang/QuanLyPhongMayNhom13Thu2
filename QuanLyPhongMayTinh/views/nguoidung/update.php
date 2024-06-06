
    <div class="container">
        <h2>Cập Nhật Người Dùng</h2>
        <form action="?controller=nguoiDung&action=update&id=<?php echo $nguoiDung['maNguoiDung']; ?>" method="POST">
        <div class="form-group">
                <label for="tenNguoiDung">Mã Người Dùng</label>
                <input type="text" class="form-control" id="maNguoiDung" name="maNguoiDung" value="<?php echo $nguoiDung['maNguoiDung']; ?>"required>
            </div>
            <div class="form-group">
                <label for="tenNguoiDung">Ảnh Người Dùng</label>
                <input type="file" class="form-control" id="anhNguoiDung" name="anhNguoiDung" value="<?php echo $nguoiDung['anhNguoiDung']; ?>"required>
            </div>
        <div class="form-group">
                <label for="tenNguoiDung">Tên Người Dùng</label>
                <input type="text" class="form-control" id="tenNguoiDung" name="tenNguoiDung" value="<?php echo $nguoiDung['tenNguoiDung']; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $nguoiDung['email']; ?>" required>
            </div>
            <div class="form-group">
                <label for="matKhau">Mật Khẩu</label>
                <input type="password" class="form-control" id="matKhau" name="matKhau" required>
            </div>
            <button type="submit" class="btn btn-primary">Cập Nhật</button>
        </form>
    </div>

