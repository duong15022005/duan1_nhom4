<!-- Header -->
<?php require './views/layout/header.php'; ?>

<!-- Navbar -->
<?php include './views/layout/navbar.php'; ?>

<!-- Main Sidebar Container -->
<?php include './views/layout/sidebar.php'; ?>

<!-- Content Wrapper. Contains page content -->
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
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Thêm Mới Banner</h3>
                        </div>
                        <!-- Form thêm Banner -->
                        <form action="<?= BASE_URL_ADMIN . '/?act=them-banner' ?>" method="POST"
                            enctype="multipart/form-data">
                            <div class="card-body">
                                <!-- Tên Banner -->
                                <div class="form-group">
                                    <label>Tên Banner</label>
                                    <input type="text" class="form-control" name="ten_banner"
                                        placeholder="Nhập tên banner"
                                        value="<?= isset($_POST['ten_banner']) ? htmlspecialchars($_POST['ten_banner']) : '' ?>">
                                    <?php if (!empty($error['ten_banner'])) { ?>
                                        <p class="text-danger"><?= $error['ten_banner'] ?></p>
                                    <?php } ?>
                                </div>

                                <!-- Hình ảnh Banner -->
                                <div class="form-group">
                                    <label>Hình ảnh</label>
                                    <input type="file" class="form-control" name="hinh_anh" required>
                                    <?php if (!empty($error['hinh_anh'])) { ?>
                                        <p class="text-danger"><?= $error['hinh_anh'] ?></p>
                                    <?php } ?>
                                </div>

                                <!-- Mô Tả Banner -->
                                <div class="form-group">
                                    <label>Mô Tả Banner</label>
                                    <textarea name="mo_ta" class="form-control"
                                        placeholder="Nhập mô tả banner"><?= isset($_POST['mo_ta']) ? htmlspecialchars($_POST['mo_ta']) : '' ?></textarea>
                                    <?php if (!empty($error['mo_ta'])) { ?>
                                        <p class="text-danger"><?= $error['mo_ta'] ?></p>
                                    <?php } ?>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Thêm Banner</button>
                                <a href="<?= BASE_URL_ADMIN . '/?act=banner' ?>" class="btn btn-secondary">Quay lại</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Footer -->
<?php include './views/layout/footer.php'; ?>
</body>

</html>