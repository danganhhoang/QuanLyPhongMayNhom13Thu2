<h2>Danh sách Máy Tính</h2>
<a href="?controller=mayTinh&action=create" class="btn btn-primary mb-3">Thêm Máy Tính</a>

<form action="" method="GET" class="form-inline mb-3">
    <input type="hidden" name="controller" value="mayTinh">
    <input type="hidden" name="action" value="index">
    <input type="text" name="search" class="form-control mr-2" placeholder="Tìm kiếm tên máy" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
</form>
<style>
        .user-img {
            transition: transform 0.6s ease, box-shadow 0.6s ease;
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
            <th scope="col">Mã Máy</th>
            <th scope="col">Mã Phòng</th>
            <th scope="col">Tên Máy</th>
            <th scope="col">Cấu Hình</th>
            <th scope="col">Trạng Thái</th>
            <th scope="col">Hình Ảnh</th>
            <th scope="col">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php if (isset($mayTinhList) && is_array($mayTinhList) && count($mayTinhList) > 0): ?>
            <?php foreach ($mayTinhList as $mayTinh): ?>
                <tr>
                    <td><?php echo $mayTinh['maMay']; ?></td>
                    <td><?php echo $mayTinh['maPhong']; ?></td>
                    <td><?php echo $mayTinh['tenMay']; ?></td>
                    <td><?php echo $mayTinh['cauHinh']; ?></td>
                    <td><?php echo $mayTinh['trangThai']; ?></td>
                    <td>
                    <?php if (!empty($mayTinh['hinhAnh'])) : ?>
                        <td><img src="uploads/<?php echo htmlspecialchars($mayTinh['hinhAnh']); ?>" class="user-img" alt="Ảnh Máy Tính" style="width: 120px; height: 100px;"></td>
                    <?php else : ?>
                        Không có ảnh
                    <?php endif; ?>
                </td>
                    <td>
                        <a href="?controller=mayTinh&action=update&id=<?php echo $mayTinh['maMay']; ?>" class="btn btn-sm btn-info">Sửa</a>
                        <a href="?controller=mayTinh&action=delete&id=<?php echo $mayTinh['maMay']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa máy tính này?')">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="7">Không có dữ liệu để hiển thị.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
