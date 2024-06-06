
    <div class="container">
        <h2>Danh sách Người Dùng</h2>
        <a href="?controller=nguoiDung&action=create" class="btn btn-primary mb-3">Thêm Người Dùng</a>
    <form action="" method="GET" class="form-inline mb-3">
    <input type="hidden" name="controller" value="nguoiDung">
    <input type="hidden" name="action" value="index">
    <input type="text" name="search" class="form-control mr-2" placeholder="Tìm kiếm tên người dùng" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
    </form>
        
    <style>
        .user-img {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-radius: 50%; /* Optional: make the image circular */
        }
        .user-img:hover {
            transform: scale(1.2);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
    </style>
      
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Mã Người Dùng</th>
                    <th scope="col">Ảnh Người Dùng</th>
                    <th scope="col">Tên Người Dùng</th>
                    <th scope="col">Email</th>
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($nguoiDungList) && is_array($nguoiDungList) && count($nguoiDungList) > 0): ?>
                    <?php foreach ($nguoiDungList as $nguoiDung): ?>
                        <tr>
                            <td><?php echo $nguoiDung['maNguoiDung']; ?></td>
                            <td><img src="uploads/<?php echo htmlspecialchars($nguoiDung['anhNguoiDung']); ?>" class="user-img" alt="Ảnh Người Dùng" style="width: 80px; height: 100px;"></td>
                            <td><?php echo $nguoiDung['tenNguoiDung']; ?></td>
                            <td><?php echo $nguoiDung['email']; ?></td>
                            <td>
                                <a href="?controller=nguoiDung&action=update&id=<?php echo $nguoiDung['maNguoiDung']; ?>" class="btn btn-sm btn-info">Sửa</a>
                                <a href="?controller=nguoiDung&action=delete&id=<?php echo $nguoiDung['maNguoiDung']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa người dùng này?')">Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">Không có dữ liệu để hiển thị.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

