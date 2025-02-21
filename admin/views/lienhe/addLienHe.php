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
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Thêm Liên Hệ</h3>
                </div>
                <form action="<?= BASE_URL_ADMIN. '/?act=them-lien-he'?>" method="POST" enctype="multipart/form-data">
                    <div class="card-body row">
                        <div class="form-group col-12">
                            <label>Tên Liên Hệ</label>
                            <input type="text" class="form-control" name="ten_lien_he" placeholder="Nhập tên">
                            <?php if(isset($_SESSION['error']['ten_lien_he'])) { ?>
                                <p class="text-danger"><?= $_SESSION['error']['ten_lien_he']?></p>
                            <?php } ?>
                        </div>
                        <div class="form-group col-6">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Nhập Email">
                            <?php if(isset($_SESSION['error']['email'])) { ?>
                                <p class="text-danger"><?= $_SESSION['error']['email']?></p>
                            <?php } ?>
                        </div>
                        <div class="form-group col-6">
                            <label>Thông Tin</label>
                            <input type="text" class="form-control" name="thong_tin" placeholder="Nhập thông tin">
                            <?php if(isset($_SESSION['error']['thong_tin'])) { ?>
                                <p class="text-danger"><?= $_SESSION['error']['thong_tin']?></p>
                            <?php } ?>
                        </div>
                        <div class="form-group col-6">
                            <label>Trạng Thái</label>
                            <select class="form-control" name="trang_thai" id="exampleFormControlSelect1">
                                <option selected disabled>Chọn Trạng Thái</option>
                                <option value="1">Hoàn Thành</option>
                                <option value="2">Chưa Hoàn Thành</option>
                            </select>
                            <?php if(isset($_SESSION['error']['trang_thai'])) { ?>
                                <p class="text-danger"><?= $_SESSION['error']['trang_thai']?></p>
                            <?php } ?>
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
