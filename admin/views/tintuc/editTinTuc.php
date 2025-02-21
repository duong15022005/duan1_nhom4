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
                            <h3 class="card-title">Sửa Tin Tức Sản Phẩm</h3>
                        </div>
                        <form action="<?= BASE_URL_ADMIN . '?act=edit-tin-tuc' ?>" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $tinTuc['id'] ?>">

                            <div class="form-group">
                                <label for="name">Tên Tin Tức</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?= $tinTuc['name'] ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="thong_tin">Thông Tin</label>
                                <textarea class="form-control" id="thong_tin" name="thong_tin" required><?= $tinTuc['thong_tin'] ?></textarea>
                            </div>

                            <div class="form-group">
                                <label for="hinh_anh">Hình Ảnh</label>
                                <input type="file" class="form-control" id="hinh_anh" name="hinh_anh" accept="image/*">
                                <!-- Hiển thị hình ảnh cũ nếu có -->
                                <img src="<?= BASE_URL . $tinTuc['hinh_anh'] ?>" alt="Hình ảnh Banner" width="150">
                                <input type="hidden" name="hinh_anh_old" value="<?= $tinTuc['hinh_anh'] ?>">
                            </div>


                            <button type="submit" class="btn btn-primary">Cập Nhật</button>
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