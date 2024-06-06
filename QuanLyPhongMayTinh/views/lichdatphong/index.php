
    <div class="container">
        <h2>Danh sách Lịch Đặt Phòng</h2>
        <div class="col-md-8">
                <form class="form-inline" action="?controller=lichDatPhong&action=index" method="GET">
                    <input type="hidden" name="controller" value="lichDatPhong">
                    <input type="hidden" name="action" value="index">
                    <input class="form-control mr-sm-2" type="search" placeholder="Tìm kiếm theo ngày" aria-label="Search" name="search" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
                </form>
            </div>
        <a href="?controller=lichDatPhong&action=create" class="btn btn-primary mb-3">Thêm Lịch Đặt Phòng</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Mã Lịch Đặt</th>
                    <th scope="col">Phòng</th>
                    <th scope="col">Người Dùng</th>
                    <th scope="col">Ngày Đặt</th>
                    <th scope="col">Thời Gian Bắt Đầu</th>
                    <th scope="col">Thời Gian Kết Thúc</th>
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($lichDatPhongList) && is_array($lichDatPhongList) && count($lichDatPhongList) > 0): ?>
                    <?php foreach ($lichDatPhongList as $lichDatPhong): ?>
                        <tr>
                            <td><?php echo $lichDatPhong['maLichDat']; ?></td>
                            <td><?php echo $lichDatPhong['tenPhong']; ?></td>
                            <td><?php echo $lichDatPhong['tenNguoiDung']; ?></td>
                            <td><?php echo $lichDatPhong['ngayDat']; ?></td>
                            <td><?php echo $lichDatPhong['thoiGianBatDau']; ?></td>
                            <td><?php echo $lichDatPhong['thoiGianKetThuc']; ?></td>
                            <td>
                                <a href="?controller=lichDatPhong&action=update&id=<?php echo $lichDatPhong['maLichDat']; ?>" class="btn btn-sm btn-info">Sửa</a>
                                <a href="?controller=lichDatPhong&action=delete&id=<?php echo $lichDatPhong['maLichDat']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa lịch đặt phòng này?')">Xóa</a>
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
    </div>
