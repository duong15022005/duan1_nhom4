<!-- Header -->
<?php require './views/layout/header.php'; ?>

<!-- Navbar -->
<?php include './views/layout/navbar.php'; ?>

<!-- Sidebar -->
<?php include './views/layout/sidebar.php'; ?>

<!-- Main content -->
<div class="content-wrapper">
  <section class="content-header">
    <h1>Chỉnh Sửa Đơn Hàng</h1>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <form action="index.php?act=edit-don-hang" method="post">
            <div class="form-group">
              <label for="ma_don_hang">Mã Đơn Hàng</label>
              <input type="text" name="ma_don_hang" class="form-control" value="<?= $donHang['ma_don_hang']; ?>" required>
            </div>
            <!-- <div class="form-group">
              <label for="ten_nguoi_nhan">Tên Người Nhận</label>
              <input type="text" name="ten_nguoi_nhan" class="form-control" value="<?= $donHang['ten_nguoi_nhan']; ?>" required>
            </div> -->
            <div class="form-group">
              <label for="email_nguoi_nhan">Email Người Nhận</label>
              <input type="email" name="email_nguoi_nhan" class="form-control" value="<?= $donHang['email_nguoi_nhan']; ?>" required>
            </div>
            <div class="form-group">
              <label for="sdt_nguoi_nhan">Số Điện Thoại</label>
              <input type="text" name="sdt_nguoi_nhan" class="form-control" value="<?= $donHang['sdt_nguoi_nhan']; ?>" required>
            </div>
            <div class="form-group">
              <label for="ngay_dat">Ngày Đặt</label>
              <input type="date" name="ngay_dat" class="form-control" value="<?= $donHang['ngay_dat']; ?>" required>
            </div>
            <div class="form-group">
              <label for="tong_tien">Tổng Tiền</label>
              <input type="number" name="tong_tien" class="form-control" value="<?= $donHang['tong_tien']; ?>" required>
            </div>
            <div class="form-group">
              <label for="trang_thai_id">Trạng Thái Đơn Hàng</label>
              <select name="trang_thai_id" class="form-control">
                <?php foreach ($listTrangThai as $trangThai): ?>
                  <option value="<?= $trangThai['trang_thai_id']; ?>" <?= $donHang['trang_thai_id'] == $trangThai['trang_thai_id'] ? 'selected' : ''; ?>>
                    <?= $trangThai['ten_trang_thai']; ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label for="id">Phương thức thanh toán</label>
              <select name="id" class="form-control">
                <?php foreach ($listPhuongThucThanhToan as $thanh_toan): ?>
                  <option value="<?= $thanh_toan['id']; ?>" <?= $donHang['id'] == $thanh_toan['id'] ? 'selected' : ''; ?>>
                    <?= $thanh_toan['ten_phuong_thuc']; ?>
                  </option> 
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label for="id">Trang Thái thanh toán</label>
              <select name="id" class="form-control">
                <?php foreach ($listThanhToan as $thanh_toan): ?>
                  <option value="<?= $thanh_toan['id']; ?>" <?= $donHang['id'] == $thanh_toan['id'] ? 'selected' : ''; ?>>
                    <?= $thanh_toan['ten_trang_thai_thanh_toan']; ?>
                  </option> 
                <?php endforeach; ?>
              </select>
            </div>
            <input type="hidden" name="id" value="<?= $donHang['id']; ?>">
            <button type="submit" class="btn btn-primary">Cập Nhật</button>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>

<!-- Footer -->
<?php include './views/layout/footer.php'; ?>
