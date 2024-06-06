<h2>Kết quả Tìm kiếm Người Quản Lý</h2>

<!-- Form tìm kiếm -->
<form action="/nguoiquanly/search" method="GET" class="mb-3">
    <div class="input-group">
        <input type="text" class="form-control" placeholder="Tìm kiếm..." name="keyword" value="<?php echo isset($keyword) ? $keyword : ''; ?>">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit">Tìm kiếm</button>
        </div>
    </div>
</form>

<a href="/nguoiquanly/create" class="btn btn-primary mb-3">Thêm Người Quản Lý</a>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Mã Quản Lý</th>
            <th scope="col">Tên Quản Lý</th>
            <th scope="col">Email</th>
            <th scope="col">Số Điện Thoại</th>
            <th scope="col">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php if (isset($nguoiquanlys) && count($nguoiquanlys) > 0): ?>
            <?php foreach ($nguoiquanlys as $nguoiquanly): ?>
                <tr>
                    <td><?php echo $nguoiquanly['maQuanLy']; ?></td>
                    <td><?php echo $nguoiquanly['tenQuanLy']; ?></td>
                    <td><?php echo $nguoiquanly['email']; ?></td>
                    <td><?php echo $nguoiquanly['soDienThoai']; ?></td>
                    <td>
                        <a href="/nguoiquanly/edit/<?php echo $nguoiquanly['maQuanLy']; ?>" class="btn btn-sm btn-info">Sửa</a>
                        <a href="/nguoiquanly/delete/<?php echo $nguoiquanly['maQuanLy']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa người quản lý này?')">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">Không tìm thấy kết quả phù hợp.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
