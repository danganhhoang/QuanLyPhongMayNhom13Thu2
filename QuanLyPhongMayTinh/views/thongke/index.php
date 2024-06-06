<!DOCTYPE html>
<html>
<head>
    <title>Thống kê</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .chart-container {
            width: 400px;
            height: 400px;
            margin: auto;
        }
    </style>
</head>
<body>
<div class="container mt-5">
        <h1 class="text-center mb-4">Bảng Điều Khiển</h1>
        <div class="row text-center">
            <div class="col-md-3">
                <div class="card bg-success">
                    <div class="card-body">
                        <h5 class="card-title">HOẠT ĐỘNG</h5>
                        <p>Số máy đang hoạt động: <?php echo $thongKeData['soMayDangHoatDong']; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-warning">
                    <div class="card-body">
                        <h5 class="card-title">SỬA CHỮA</h5>
                        <p>Số máy đang sửa chữa: <?php echo $thongKeData['soMayDangSuaChua']; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-5 ">
                <div class="card bg-primary" >
                    <div class="card-body">
                        <h5 class="card-title">NGƯỜI DÙNG</h5>
                        <p>Số lượng người dùng: <?php echo $thongKeData['soLuongNguoiDung']; ?></p>
                    </div>
                </div>
            </div>
           
    
</div>

        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="chart-container">
                    <canvas id="pieChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script>
        var ctx = document.getElementById('pieChart').getContext('2d');
        var pieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Số máy đang hoạt động', 'Số máy đang sửa chữa'],
                datasets: [{
                    label: 'Thống kê',
                    data: [<?php echo $thongKeData['soMayDangHoatDong']; ?>, <?php echo $thongKeData['soMayDangSuaChua']; ?>],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: true,
                        position: 'right'
                    },
                    tooltip: {
                        enabled: false
                    }
                }
            }
        });
    </script>
</body>
</html>
