<!-- Header -->
<?php require './views/layout/header.php';?>
<!-- Navbar -->
<?php include './views/layout/navbar.php';?>
<!-- /.navbar -->
<!-- Main Sidebar Container -->
<?php include './views/layout/sidebar.php';?>
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
                    <div class="card">
                        <div class="card-header">
                            <a href="<?= BASE_URL_ADMIN. '/?act=from-them-khuyen-mai' ?>"><button class="btn btn-success">Thêm Khuyến Mãi</button></a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên Khuyến Mãi</th>
                                        <th>Mã Khuyến Mãi</th>
                                        <th>Giảm Giá</th>
                                        <th>Ngày Bắt Đầu</th>
                                        <th>Ngày Kết Thúc</th>
                                        <th>Thao Tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($listKhuyenMai as $key => $khuyenMai): ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= $khuyenMai['ten_khuyen_mai'] ?></td>
                                            <td><?= $khuyenMai['ma_khuyen_mai'] ?></td>
                                            <td><?= $khuyenMai['gia_tri'] ?>%</td>
                                            <td><?= date('d/m/Y H:i', strtotime($khuyenMai['ngay_bat_dau'])) ?></td>
                                            <td><?= date('d/m/Y H:i', strtotime($khuyenMai['ngay_ket_thuc'])) ?></td>
                                            <td>
                                                <a href="<?= BASE_URL_ADMIN. '/?act=from-edit-khuyen-mai&id_khuyen_mai=' .$khuyenMai['id']?>">
                                                    <button class="btn btn-warning">Sửa</button>
                                                </a>
                                                <a href="<?= BASE_URL_ADMIN. '/?act=delete-khuyen-mai&id_khuyen_mai=' .$khuyenMai['id']?>" 
                                                   onclick="return confirm('Bạn có muốn xóa khuyến mãi này không?')">
                                                    <button class="btn btn-danger">Xóa</button>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên Khuyến Mãi</th>
                                        <th>Mã Khuyến Mãi</th>
                                        <th>Giảm Giá</th>
                                        <th>Ngày Bắt Đầu</th>
                                        <th>Ngày Kết Thúc</th>
                                        <th>Thao Tác</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
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

<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false
    });
  });
</script>
</body>
</html>
