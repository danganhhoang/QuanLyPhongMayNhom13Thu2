<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thêm Lịch Sử Sử Dụng Máy Tính</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Thêm Lịch Sử Sử Dụng Máy Tính</h2>
        <form action="?controller=lichSuSuDung&action=create" method="POST">
            <div class="form-group">
                <label for="maMay">Máy Tính</label>
                <select name="maMay" class="form-control" required>
                    <?php foreach ($mayList as $may): ?>
                        <option value="<?php echo $may['maMay']; ?>"><?php echo $may['tenMay']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="maNguoiDung">Người Dùng</label>
                <select name="maNguoiDung" class="form-control" required>
                    <?php foreach ($nguoiDungList as $nguoiDung): ?>
                        <option value="<?php echo $nguoiDung['maNguoiDung']; ?>"><?php echo $nguoiDung['tenNguoiDung']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="thoiGianBatDau">Thời Gian Bắt Đầu</label>
                <input type="datetime-local" name="thoiGianBatDau" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="thoiGianKetThuc">Thời Gian Kết Thúc</label>
                <input type="datetime-local" name="thoiGianKetThuc" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Thêm</button>
        </form>
    </div>
</body>
</html>
