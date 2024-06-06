<h2>Kết quả Tìm kiếm Phòng Máy</h2>

<!-- Form tìm kiếm -->
<form action="?controller=phongMay&action=search" method="GET" class="mb-3">
    <div class="input-group">
        <input type="text" class="form-control" placeholder="Tìm kiếm..." name="keyword" value="<?php echo isset($keyword) ? $keyword : ''; ?>">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit">Tìm kiếm</button>
        </div>
    </div>
</form>

<a href="?controller=phongMay&action=create" class="btn btn-primary mb-3">Thêm Phòng Máy</a>

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
        <?php if (isset($phongmays) && count($phongmays) > 0): ?>
            <?php foreach ($phongmays as $phongmay): ?>
                <tr>
                    <td><?php echo $phongmay['maPhong']; ?></td>
                    <td><?php echo $phongmay['tenPhong']; ?></td>
                    <td><?php echo $phongmay['viTri']; ?></td>
                    <td>
                        <a href="?controller=phongMay&action=edit&id=<?php echo $phongmay['maPhong']; ?>" class="btn btn-sm btn-info">Sửa</a>
                        <a href="?controller=phongMay&action=delete&id=<?php echo $phongmay['maPhong']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa phòng máy này?')">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">Không tìm thấy kết quả phù hợp.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
