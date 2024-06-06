<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cập Nhật Lịch Sử Sử Dụng Máy Tính</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Cập Nhật Lịch Sử Sử Dụng Máy Tính</h2>
        <form action="?controller=lichSuSuDung&action=update&id=<?php echo $lichSuSuDung['maSuDung']; ?>" method="POST">
            <div class="form-group">
                <label for="maMay">Máy Tính</label>
                <select name="maMay" class="form-control" required>
                    <?php foreach ($mayList as $may): ?>
                        <option value="<?php echo $may['maMay']; ?>" <?php echo $may['maMay'] == $lichSuSuDung['maMay'] ? 'selected' : ''; ?>><?php echo $may['tenMay']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="maNguoiDung">Người Dùng</label>
                <select name="maNguoiDung" class="form-control" required>
                    <?php foreach ($nguoiDungList as $nguoiDung): ?>
                        <option value="<?php echo $nguoiDung['maNguoiDung']; ?>" <?php echo $nguoiDung['maNguoiDung'] == $lichSuSuDung['maNguoiDung'] ? 'selected' : ''; ?>><?php echo $nguoiDung['tenNguoiDung']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="thoiGianBatDau">Thời Gian Bắt Đầu</label>
                <input type="datetime-local" name="thoiGianBatDau" class="form-control" value="<?php echo $lichSuSuDung['thoiGianBatDau']; ?>" required>
            </div>
            <div class="form-group">
                <label for="thoiGianKetThuc">Thời Gian Kết Thúc</label>
                <input type="datetime-local" name="thoiGianKetThuc" class="form-control" value="<?php echo $lichSuSuDung['thoiGianKetThuc']; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Cập Nhật</button>
        </form>
    </div>
</body>
</html>
