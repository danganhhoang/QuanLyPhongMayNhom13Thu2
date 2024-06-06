<h2>Sửa Máy Tính</h2>
<form action="?controller=mayTinh&action=update&id=<?php echo $mayTinh['maMay']; ?>" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="maPhong">Phòng Máy</label>
        <select class="form-control" id="maPhong" name="maPhong" required>
            <?php if (isset($phongMayList) && is_array($phongMayList)) : ?>
                <?php foreach ($phongMayList as $phongMay) : ?>
                    <option value="<?php echo $phongMay['maPhong']; ?>" <?php echo $phongMay['maPhong'] == $mayTinh['maPhong'] ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($phongMay['tenPhong']); ?>
                    </option>
                <?php endforeach; ?>
            <?php endif; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="tenMay">Tên Máy</label>
        <input type="text" class="form-control" id="tenMay" name="tenMay" value="<?php echo htmlspecialchars($mayTinh['tenMay']); ?>" required>
    </div>
    <div class="form-group">
        <label for="cauHinh">Cấu Hình</label>
        <input type="text" class="form-control" id="cauHinh" name="cauHinh" value="<?php echo htmlspecialchars($mayTinh['cauHinh']); ?>">
    </div>
    <div class="form-group">
        <label for="trangThai">Trạng Thái</label>
        <input type="text" class="form-control" id="trangThai" name="trangThai" value="<?php echo htmlspecialchars($mayTinh['trangThai']); ?>">
    </div>
    <div class="form-group">
        <label for="hinhAnh">Hình Ảnh</label>
        <input type="file" class="form-control-file" id="hinhAnh" name="hinhAnh">
        <?php if (!empty($mayTinh['hinhAnh'])): ?>
            <img src="<?php echo htmlspecialchars($mayTinh['hinhAnh']); ?>" alt="Hình ảnh máy tính" style="width: 100px;">
        <?php endif; ?>
        <input type="hidden" name="currentHinhAnh" value="<?php echo htmlspecialchars($mayTinh['hinhAnh']); ?>">
    </div>
    <button type="submit" class="btn btn-primary">Cập nhật</button>
</form>
