<h2>Danh sách Phòng Máy</h2>
<a href="?controller=phongMay&action=create" class="btn btn-primary mb-3">Thêm Phòng Máy</a>

<form action="" method="GET" class="form-inline mb-3">
    <input type="hidden" name="controller" value="phongMay">
    <input type="hidden" name="action" value="index">
    <input type="text" name="search" class="form-control mr-2" placeholder="Tìm kiếm tên phòng" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
</form>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Mã Phòng</th>
            <th scope="col">Tên Phòng</th>
            <th scope="col">Vị Trí</th>
            <th scope="col">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php if (isset($phongMayList) && is_array($phongMayList) && count($phongMayList) > 0): ?>
            <?php foreach ($phongMayList as $phongMay): ?>
                <tr>
                    <td><?php echo $phongMay['maPhong']; ?></td>
                    <td><?php echo $phongMay['tenPhong']; ?></td>
                    <td><?php echo $phongMay['viTri']; ?></td>
                    <td>
                        <a href="?controller=phongMay&action=update&id=<?php echo $phongMay['maPhong']; ?>" class="btn btn-sm btn-info">Sửa</a>
                        <a href="?controller=phongMay&action=delete&id=<?php echo $phongMay['maPhong']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa phòng máy này?')">Xóa</a>
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
