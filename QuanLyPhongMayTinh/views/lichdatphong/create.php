<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thêm Lịch Đặt Phòng</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Thêm Lịch Đặt Phòng</h2>
        <form action="?controller=lichDatPhong&action=create" method="POST">
            <div class="form-group">
                <label for="maPhong">Phòng</label>
                <select name="maPhong" class="form-control" required>
                    <?php foreach ($phongList as $phong): ?>
                        <option value="<?php echo $phong['maPhong']; ?>"><?php echo $phong['tenPhong']; ?></option>
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
                <label for="ngayDat">Ngày Đặt</label>
                <input type="date" name="ngayDat" class="form-control" required>
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
