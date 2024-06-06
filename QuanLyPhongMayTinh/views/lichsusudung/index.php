<div class="container">
    <h2>Danh sách Lịch Sử Sử Dụng Máy Tính</h2>
    <div class="col-md-8">
    <form class="form-inline" action="?controller=lichSuSuDung&action=index" method="GET">
                <input type="hidden" name="controller" value="lichSuSuDung">
                <input type="hidden" name="action" value="index">
                <input class="form-control mr-sm-2" type="search" placeholder="Tìm kiếm theo tên máy" aria-label="Search" name="search_may" value="<?php echo isset($_GET['search_may']) ? $_GET['search_may'] : ''; ?>">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
      </form>

    </div>
    <a href="?controller=lichSuSuDung&action=create" class="btn btn-primary mb-3">Thêm Lịch Sử Sử Dụng Máy Tính</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Mã Sử Dụng</th>
                <th scope="col">Máy Tính</th>
                <th scope="col">Người Dùng</th>
                <th scope="col">Thời Gian Bắt Đầu</th>
                <th scope="col">Thời Gian Kết Thúc</th>
                <th scope="col">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php if (isset($lichSuSuDungList) && is_array($lichSuSuDungList) && count($lichSuSuDungList) > 0): ?>
                <?php foreach ($lichSuSuDungList as $lichSuSuDung): ?>
                    <tr>
                        <td><?php echo $lichSuSuDung['maSuDung']; ?></td>
                        <td><?php echo $lichSuSuDung['tenMay']; ?></td>
                        <td><?php echo $lichSuSuDung['tenNguoiDung']; ?></td>
                        <td><?php echo $lichSuSuDung['thoiGianBatDau']; ?></td>
                        <td><?php echo $lichSuSuDung['thoiGianKetThuc']; ?></td>
                        <td>
                            <a href="?controller=lichSuSuDung&action=update&id=<?php echo $lichSuSuDung['maSuDung']; ?>" class="btn btn-sm btn-info">Sửa</a>
                            <a href="?controller=lichSuSuDung&action=delete&id=<?php echo $lichSuSuDung['maSuDung']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa lịch sử sử dụng máy tính này?')">Xóa</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">Không có dữ liệu để hiển thị.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
