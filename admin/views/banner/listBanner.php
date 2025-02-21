<!-- Header -->
<?php require './views/layout/header.php'; ?>

<!-- Navbar -->
<?php include './views/layout/navbar.php'; ?>

<!-- Main Sidebar Container -->
<?php include './views/layout/sidebar.php'; ?>

<!-- Content Wrapper -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản Lý Banner</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="<?= BASE_URL_ADMIN . '/?act=form-them-banner' ?>">
                                <button class="btn btn-success">Thêm Banner</button>
                            </a>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên Banner</th>
                                        <th>Mô Tả</th>
                                        <th>Hình ảnh</th>
                                        <th>Thao Tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($listBanner as $key => $banner): ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= $banner['ten_banner'] ?></td>
                                            <td><?= $banner['mo_ta'] ?></td>
                                            <td><img src="<?= BASE_URL . $banner['hinh_anh'] ?>" style="width: 100px"> 
                                            <td>
                                                <a
                                                    href="<?= BASE_URL_ADMIN . '/?act=form-sua-banner&id_banner=' . $banner['id'] ?>">
                                                    <button class="btn btn-warning">Sửa</button>
                                                </a>
                                                <a href="<?= BASE_URL_ADMIN . '/?act=xoa-banner&id_banner=' . $banner['id'] ?>"
                                                    onclick="return confirm('Bạn có muốn xóa banner này không?')">
                                                    <button class="btn btn-danger">Xóa</button>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên Banner</th>
                                        <th>Mô Tả</th>
                                        <th>Hình ảnh</th>
                                        <th>Thao Tác</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Footer -->
<?php include './views/layout/footer.php'; ?>
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
</body>

</html>