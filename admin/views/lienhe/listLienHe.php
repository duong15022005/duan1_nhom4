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
                <div class="col-sm-12">
                    <h1>Quản Lý Danh Sách Liên Hệ</h1>
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
                            <a href="<?= BASE_URL_ADMIN . '/?act=form-them-lien-he' ?>"><button
                                    class="btn btn-success">Thêm Liên Hệ Mới</button></a>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên Liên Hệ</th>
                                        <th>Email</th>
                                        <th>Nội dung</th>
                                        <th>Trạng Thái</th>
                                        <th>Cập nhật trạng thái</th>
                                        <th>Thao Tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $stt = 1; ?>
                                    <?php foreach ($lienHes as $lienHe): ?>
                                        <tr>
                                            <td><?= $stt++; ?></td>
                                            <td><?= htmlspecialchars($lienHe['ten_lien_he']); ?></td>
                                            <td><?= htmlspecialchars($lienHe['email']); ?></td>
                                            <td><?= nl2br(htmlspecialchars($lienHe['thong_tin'])); ?></td>
                                            <td>
                                                <?php if ($lienHe['trang_thai_id'] == 1): ?>
                                                    <span style="color: green;">Đã liên hệ</span>
                                                <?php else: ?>
                                                    <span style="color: red;">Chưa liên hệ</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if ($lienHe['trang_thai_id'] != 1): ?>
                                                    <a href="?act=update-trang-thai-lien-he&lien_he_id=<?= $lienHe['id']; ?>&trang_thai_id=1"
                                                        class="btn btn-success">Đánh dấu đã liên hệ</a>
                                                <?php else: ?>
                                                    <span class="btn btn-secondary" style="cursor: not-allowed;">Không thể thay đổi</span>
                                                <?php endif; ?>
                                            </td>

                                            <td>
                                                <div class="btn-group">
                                                    <!-- <a
                                                        href="<?= BASE_URL_ADMIN . '/?act=form-sua-lien-he&lien_he_id=' . $lienHe['id'] ?>">
                                                        <button class="btn btn-warning"><i
                                                                class="fas fa-wrench"></i></button>
                                                    </a> -->
                                                    <a href="<?= BASE_URL_ADMIN . '/?act=xoa-lien-he&lien_he_id=' . $lienHe['id'] ?>"
                                                        onclick="return confirm('Bạn Có Muốn Xóa Liên Hệ Này Không ?')">
                                                        <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                                    </a>

                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên Liên Hệ</th>
                                        <th>Email</th>
                                        <th>Nội dung</th>
                                        <th>Trạng Thái</th>
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
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
<!-- Code injected by live-server -->
</body>

</html>