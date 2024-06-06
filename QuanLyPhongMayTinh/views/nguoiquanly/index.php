
    <div class="container">
        <h2>Danh sách Quản Lý</h2>
        <a href="?controller=quanLy&action=create" class="btn btn-primary mb-3">Thêm Quản Lý</a>
        <form action="" method="GET" class="form-inline mb-3">
            <input type="hidden" name="controller" value="quanLy">
            <input type="hidden" name="action" value="index">
            <input type="text" name="search" class="form-control mr-2" placeholder="Tìm kiếm tên quản lý" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Mã Quản Lý</th>
                    <th scope="col">Tên Quản Lý</th>
                    <th scope="col">Email</th>
                    <th scope="col">Số Điện Thoại</th>
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($quanLyList) && is_array($quanLyList) && count($quanLyList) > 0): ?>
                    <?php foreach ($quanLyList as $quanLy): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($quanLy['maQuanLy']); ?></td>
                            <td><?php echo htmlspecialchars($quanLy['tenQuanLy']); ?></td>
                            <td><?php echo htmlspecialchars($quanLy['email']); ?></td>
                            <td><?php echo htmlspecialchars($quanLy['soDienThoai']); ?></td>
                            <td>
                                <a href="?controller=quanLy&action=update&id=<?php echo htmlspecialchars($quanLy['maQuanLy']); ?>" class="btn btn-sm btn-info">Sửa</a>
                                <a href="?controller=quanLy&action=delete&id=<?php echo htmlspecialchars($quanLy['maQuanLy']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa quản lý này?')">Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">Không có dữ liệu để hiển thị.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
