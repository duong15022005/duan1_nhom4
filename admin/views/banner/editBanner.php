<!-- Header -->
<?php require './views/layout/header.php'; ?>

<!-- Navbar -->
<?php include './views/layout/navbar.php'; ?>

<!-- Main Sidebar Container -->
<?php include './views/layout/sidebar.php'; ?>

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
                            <h3 class="card-title">Sửa Banner</h3>
                        </div>
                        <form action="<?= BASE_URL_ADMIN . '/?act=sua-banner' ?>" method="POST"
                            enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $banner['id'] ?>">

                            <div class="card-body">
                                <div class="form-group">
                                    <label>Tên Banner</label>
                                    <input type="text" class="form-control" name="ten_banner"
                                        value="<?= $banner['ten_banner'] ?>" placeholder="Nhập tên banner">
                                    <?php if (isset($error['ten_banner'])) { ?>
                                        <p class="text-danger"><?= $error['ten_banner'] ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label>Hình ảnh</label>
                                    <input type="file" class="form-control" name="hinh_anh">
                                    <p><strong>Hình ảnh hiện tại:</strong></p>
                                    <img src="../.<?= $banner['hinh_anh'] ?>" alt="Hình ảnh Banner" width="150">
                                    <?php if (isset($error['hinh_anh'])) { ?>
                                        <p class="text-danger"><?= $error['hinh_anh'] ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label>Mô Tả Banner</label>
                                    <textarea name="mo_ta" class="form-control"
                                        placeholder="Nhập mô tả banner"><?= $banner['mo_ta'] ?></textarea>
                                    <?php if (isset($error['mo_ta'])) { ?>
                                        <p class="text-danger"><?= $error['mo_ta'] ?></p>
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Cập nhật Banner</button>
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