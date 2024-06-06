<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Quản lý Hệ Thống</title>
    <link rel="stylesheet" href="/public/css/styles.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }

        .container-fluid {
            flex: 1;
        }

        .sidebar {
            height: 230vh;
            background-color: #343a40;
            padding: 0;
        }

        .sidebar .nav-link {
            color: #fff;
        }

        .sidebar .nav-link.active {
            background-color: #007bff;
        }

        .content {
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">

            <nav class="col-md-2 d-none d-md-block sidebar bg-primary">
                <div class="sidebar-sticky">

                    <ul class="nav flex-column">
                        <h2 class="text-center">Quản Lý</h2>
                        <li class="nav-item">
                            <a class="nav-link active" href="?controller=phongMay&action=index">Quản Lý Phòng Máy</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="?controller=mayTinh&action=index">Quản lý Máy Tính</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="?controller=lichSuSuDung&action=index">Quản lý Lịch Sử Sử Dụng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="?controller=lichDatPhong&action=index">Quản lý Lịch Đặt Phòng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="?controller=nguoiDung&action=index">Quản lý Người Dùng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="?controller=quanLy&action=index">Quản lý Người Quản Lý</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?controller=thongKe&action=index">Thống kê</a>
                        </li>

                    </ul>
                </div>
            </nav>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 content">
                <?php
                // Use the $viewFile variable to include the correct view
                if (isset($viewFile) && file_exists($viewFile)) {
                    include_once($viewFile);
                } else {
                    echo "View not found!";
                }
                ?>
            </main>
        </div>
    </div>
</body>

</html>