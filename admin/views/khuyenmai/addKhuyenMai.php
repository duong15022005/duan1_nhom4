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
                    <h1>Quản Lý Khuyến Mãi</h1>
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
                            <h3 class="card-title">Thêm Khuyến Mãi</h3>
                        </div>
                        <form action="<?= BASE_URL_ADMIN . '/?act=them-khuyen-mai' ?>" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Tên Khuyến Mãi</label>
                                    <input type="text" class="form-control" name="ten_khuyen_mai"
                                        placeholder="Nhập tên khuyến mãi">
                                    <?php if (isset($error['ten_khuyen_mai'])) { ?>
                                        <p class="text-danger"><?= $error['ten_khuyen_mai'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label>Mã Khuyến Mãi</label>
                                    <input type="text" class="form-control" name="ma_khuyen_mai"
                                        placeholder="Nhập mã khuyến mãi">
                                </div>
                                <div class="form-group">
                                    <label>Giảm Giá</label>
                                    <input type="number" class="form-control" name="gia_tri"
                                        placeholder="Nhập giá trị giảm giá">
                                </div>
                                <div class="form-group">
                                    <label>Ngày Bắt Đầu</label>
                                    <input type="datetime-local" class="form-control" name="ngay_bat_dau">
                                </div>
                                <div class="form-group">
                                    <label>Ngày Kết Thúc</label>
                                    <input type="datetime-local" class="form-control" name="ngay_ket_thuc">
                                </div>
                                <div class="form-group">
                                    <label>Mô Tả</label>
                                    <textarea name="mo_ta" class="form-control" placeholder="Nhập mô tả"></textarea>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Thêm</button>
                            </div>
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
<?php
include './views/layout/footer.php';
?>
<!-- End Footer -->
</body>

</html>
