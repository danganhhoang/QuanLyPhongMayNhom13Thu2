<!DOCTYPE html>
<html>
<head>
    <title>Danh sách Máy Tính</title>
    <!-- Thêm các thẻ meta và link CSS tại đây -->
</head>
<body>
    <h2>Danh sách Máy Tính</h2>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Mã Máy</th>
                <th scope="col">Mã Phòng</th>
                <th scope="col">Tên Máy</th>
                <th scope="col">Cấu Hình</th>
                <th scope="col">Trạng Thái</th>
                <th scope="col">Hình Ảnh</th>
            </tr>
        </thead>
        <tbody>
            <?php if (isset($mayTinhList) && is_array($mayTinhList) && count($mayTinhList) > 0): ?>
                <?php foreach ($mayTinhList as $mayTinh): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($mayTinh['maMay']); ?></td>
                        <td><?php echo htmlspecialchars($mayTinh['maPhong']); ?></td>
                        <td><?php echo htmlspecialchars($mayTinh['tenMay']); ?></td>
                        <td><?php echo htmlspecialchars($mayTinh['cauHinh']); ?></td>
                        <td><?php echo htmlspecialchars($mayTinh['trangThai']); ?></td>
                        <td>
                            <?php if (!empty($mayTinh['hinhAnh'])): ?>
                                <img src="<?php echo htmlspecialchars($mayTinh['hinhAnh']); ?>" alt="Hình ảnh" width="100">
                            <?php else: ?>
                                Không có ảnh
                            <?php endif; ?>
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
</body>
</html>
