<!-- Header -->
<?php require './views/layout/header.php'; ?>
<!-- Navbar -->
<?php include './views/layout/navbar.php'; ?>
<!-- Sidebar -->
<?php include './views/layout/sidebar.php'; ?>

<!-- Content Wrapper -->
<div class="content-wrapper">
    <!-- Page Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Báo cáo thống kê</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- Total Products -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?php echo $totalProducts; ?></h3>
                            <p>Tổng sản phẩm</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="<?= BASE_URL_ADMIN . '/?act=san-pham' ?>" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- Total Users -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?php echo $totalUsers; ?></h3>
                            <p>Khách hàng</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="<?= BASE_URL_ADMIN . '/?act=list-tai-khoan-khach-hang' ?>" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- Total Completed Orders -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?php echo $totalCompletedOrders; ?></h3>
                            <p>Giao hàng thành công</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="<?= BASE_URL_ADMIN . '/?act=don-hang&status=5' ?>" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- Total Revenue -->
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3><?php echo number_format($totalRevenue, 0, ',', '.'); ?> VND</h3>
                            <p>Tổng doanh thu</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-cash"></i>
                        </div>
                        <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12">
                    <h3>Thống kê doanh thu theo ngày</h3>
                          <canvas id="dailyRevenueChart" style="width:100%; max-height: 400px;"></canvas>
                </div>
            </div>
 
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                // Lấy dữ liệu từ controller
                const dailyOrderStatistics = <?php echo json_encode($dailyOrderStatistics); ?>;

                // Chuyển đổi dữ liệu PHP sang các mảng JavaScript
                const labels = dailyOrderStatistics.map(stat => stat.order_date); // Ngày
                const orderCounts = dailyOrderStatistics.map(stat => stat.total_orders); // Số lượng đơn hàng
                const revenues = dailyOrderStatistics.map(stat => stat.total_revenue); // Doanh thu

                // Kiểm tra dữ liệu đã được chuyển đổi từ PHP sang JavaScript
                console.log(dailyOrderStatistics);

                // Vẽ biểu đồ
                const ctx = document.getElementById('dailyRevenueChart').getContext('2d');
                const dailyRevenueChart = new Chart(ctx, {
                    type: 'bar', // Kiểu biểu đồ: cột
                    data: {
                        labels: labels, // Trục x: Ngày
                        datasets: [
                            {
                                label: 'Số lượng đơn hàng',
                                data: orderCounts, // Số lượng đơn hàng
                                backgroundColor: 'rgba(75, 192, 192, 0.6)',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1,
                            },
                            {
                                label: 'Doanh thu (VND)',
                                data: revenues, // Doanh thu
                                backgroundColor: 'rgba(153, 102, 255, 0.6)',
                                borderColor: 'rgba(153, 102, 255, 1)',
                                borderWidth: 1,
                            },
                        ],
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                        },
                        scales: {
                            x: {
                                beginAtZero: true,
                            },
                            y: {
                                beginAtZero: true,
                            },
                        },
                    },
                });
            </script>

        </div>
    </section>
</div>

<!-- Footer -->
<?php require './views/layout/footer.php'; ?>
