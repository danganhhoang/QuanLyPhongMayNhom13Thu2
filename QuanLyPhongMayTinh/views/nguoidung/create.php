
    <div class="container">
        <h2>Thêm Người Dùng Mới</h2>
        <form action="?controller=nguoiDung&action=create" method="POST">
        <div class="form-group">
                <label for="tenNguoiDung">Mã Người Dùng</label>
                <input type="text" class="form-control" id="maNguoiDung" name="maNguoiDung" required>
            </div>
            <div class="form-group">
                <label for="tenNguoiDung">Ảnh Người Dùng</label>
                <input type="file" class="form-control" id="anhNguoiDung" name="anhNguoiDung" required>
            </div>
            <div class="form-group">
                <label for="tenNguoiDung">Tên Người Dùng</label>
                <input type="text" class="form-control" id="tenNguoiDung" name="tenNguoiDung" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="matKhau">Mật Khẩu</label>
                <input type="password" class="form-control" id="matKhau" name="matKhau" required>
            </div>
            <button type="submit" class="btn btn-primary">Thêm Người Dùng</button>
        </form>
    </div>

