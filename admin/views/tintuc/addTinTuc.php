<!-- Header -->
<?php require './views/layout/header.php'; ?>
<!-- Navbar -->
<?php include './views/layout/navbar.php'; ?>
<!-- /.navbar -->
<!-- Main Sidebar Container -->
<?php include './views/layout/sidebar.php'; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản Lý Tin Tức</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Thêm Tin Tức</h3>
                        </div>
                        <form action="<?= BASE_URL_ADMIN . '?act=add-tin-tuc' ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name">Tên Tin Tức</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>

                            <div class="form-group">
                                <label for="thong_tin">Thông Tin</label>
                                <textarea class="form-control" id="thong_tin" name="thong_tin" required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="hinh_anh">Hình Ảnh</label>
                                <input type="file" class="form-control" id="hinh_anh" name="hinh_anh" accept="image/*">
                            </div>

                            <button type="submit" class="btn btn-success">Thêm Tin Tức</button>
                        </form>

                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Footer-->
<?php include './views/layout/footer.php'; ?>
<!-- End Footer -->
</body>

</html>