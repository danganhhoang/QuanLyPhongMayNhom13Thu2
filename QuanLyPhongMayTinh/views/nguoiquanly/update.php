<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sửa Thông Tin Quản Lý</title>
    <link rel="stylesheet" href="/public/css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Sửa Thông Tin Quản Lý</h2>
        <form action="?controller=quanLy&action=update&id=<?php echo htmlspecialchars($quanLy['maQuanLy']); ?>" method="POST">
            <div class="form-group">
                <label for="tenQuanLy">Tên Quản Lý</label>
                <input type="text" class="form-control" id="tenQuanLy" name="tenQuanLy" value="<?php echo htmlspecialchars($quanLy['tenQuanLy']); ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($quanLy['email']); ?>" required>
            </div>
            <div class="form-group">
                <label for="soDienThoai">Số Điện Thoại</label>
                <input type="text" class="form-control" id="soDienThoai" name="soDienThoai" value="<?php echo htmlspecialchars($quanLy['soDienThoai']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Cập Nhật</button>
        </form>
    </div>
</body>
</html>
