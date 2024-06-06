<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thêm Quản Lý</title>
    <link rel="stylesheet" href="/public/css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Thêm Quản Lý</h2>
        <form action="?controller=quanLy&action=create" method="POST">
            <div class="form-group">
                <label for="tenQuanLy">Tên Quản Lý</label>
                <input type="text" class="form-control" id="tenQuanLy" name="tenQuanLy" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="soDienThoai">Số Điện Thoại</label>
                <input type="text" class="form-control" id="soDienThoai" name="soDienThoai" required>
            </div>
            <button type="submit" class="btn btn-primary">Thêm</button>
        </form>
    </div>
</body>
</html>
