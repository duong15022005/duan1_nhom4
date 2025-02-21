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
                <div class="col-sm-11">
                    <h1>Sửa Thông Tin Liên Hệ: <?= $lienHe['ten_lien_he'] ?></h1>
                </div>
                <div class="col-sm-1">
                    <a href="<?= BASE_URL_ADMIN . '?act=lien-he' ?>" class="btn btn-secondary">Quay Lại</a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Thông Tin Liên Hệ</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <form action="<?= BASE_URL_ADMIN . '?act=sua-lien-he' ?>" method="POST" class="form-edit-lien-he">
                        <!-- Trường ẩn để giữ ID của liên hệ cần sửa -->
                        <input type="hidden" name="id" value="<?= $lienHe['id'] ?>">

                        <!-- Tên Liên Hệ -->
                        <div class="form-group">
                            <label for="ten_lien_he">Tên Liên Hệ</label>
                            <input type="text" id="ten_lien_he" name="ten_lien_he" class="form-control"
                                value="<?= htmlspecialchars($lienHe['ten_lien_he']) ?>">
                            <?php if (isset($_SESSION['errors']['ten_lien_he'])): ?>
                                <span class="error"><?= $_SESSION['errors']['ten_lien_he'] ?></span>
                            <?php endif; ?>
                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control"
                                value="<?= htmlspecialchars($lienHe['email']) ?>">
                            <?php if (isset($_SESSION['errors']['email'])): ?>
                                <span class="error"><?= $_SESSION['errors']['email'] ?></span>
                            <?php endif; ?>
                        </div>

                        <!-- Thông Tin -->
                        <div class="form-group">
                            <label for="thong_tin">Thông Tin</label>
                            <textarea id="thong_tin" name="thong_tin"
                                class="form-control"><?= htmlspecialchars($lienHe['thong_tin']) ?></textarea>
                            <?php if (isset($_SESSION['errors']['thong_tin'])): ?>
                                <span class="error"><?= $_SESSION['errors']['thong_tin'] ?></span>
                            <?php endif; ?>
                        </div>

                        <!-- Trạng Thái -->
                        <div class="form-group">
                            <label for="trang_thai">Trạng Thái</label>
                            <select id="trang_thai" name="trang_thai" class="form-control custom-select">
                                <option <?= $lienHe['trang_thai'] == 1 ? 'selected' : '' ?> value="1">Hoàn Thành</option>
                                <option <?= $lienHe['trang_thai'] == 2 ? 'selected' : '' ?> value="2">Chưa Hoàn Thành</option>
                            </select>
                            <?php if (isset($_SESSION['error']['danh_muc_id'])) { ?>
                                <p class="text-danger"><?= $_SESSION['error']['danh_muc_id'] ?></p>
                            <?php } ?>
                        </div>
                        <!-- Nút Gửi -->
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-primary">Sửa Thông Tin</button>
                        </div>
                    </form>
                    <!-- /.card -->
                </div>
            </div>
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
<script>
    var faqs_row = <?= count($listAnhSanPham); ?>;
    function addfaqs() {
        html = '<tr id="faqs-row-' + faqs_row + '">';
        html += '<td><img src="https://www.prudential.com.vn/export/sites/prudential-vn/vi/.thu-vien/hinh-anh/pulse-nhip-song-khoe/song-khoe/2020/suc-khoe-tinh-than/bai-viet-nuoi-thu-cung-lieu-phap-cho-suc-khoe-khong-phai-ai-cung-biet-desktop-1366x560.jpg" style="width: 50px; height: 50px;" alt=""></td>';
        html += '<td><input type="file" name="img_array[]" class="form-control"></td>';
        html += '<td class="mt-10"><button type="button" class="badge badge-danger" onclick="removeRow(' + faqs_row + ', null);"><i class="fa fa-trash"></i> Delete</button></td>';
        html += '</tr>';
        $('#faqs tbody').append(html);
        faqs_row++;
    }
    function removeRow(rowId, imgId) {
        $('#faqs-row-' + rowId).remove();
        if (imgId !== null) {
            var imgDeleteInput = document.getElementById('img_delete')
            var currentValue = imgDeleteInput.value;
            imgDeleteInput.value = currentValue ? currentValue + ',' + imgId : imgId;
        }
    }
</script>

</html>