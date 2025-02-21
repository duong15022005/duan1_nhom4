<?php require './views/layout/header.php'; ?>
<?php include './views/layout/navbar.php'; ?>
<?php include './views/layout/sidebar.php'; ?>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Chi Tiết Đơn Hàng</h1>
          <a href="<?= BASE_URL_ADMIN . '/?act=don-hang' ?>">
            <button class="btn btn-success">Quay lại</button>
          </a>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">

        <div class="card col-12" style="display: flex;flex-direction: row;">

          <div class="col-4">
            <div class="card-header">
              <h3 class="card-title">Thông Tin Người Đặt</h3>
            </div>
            <div class="card-body">
              <p><strong>Tên Người Đặt:</strong>
              <!-- lấy thông tin từ bàng tai_khoans  --><?= $order['ten_nguoi_nhan']; ?>
            </p>
              <p><strong>Số Điện Thoại:</strong>
              <!-- lấy thông tin từ bàng tai_khoans  -->
              <?= $order['sdt_nguoi_nhan']; ?>
            </p>
              <p><strong>Email:</strong> 
              <!-- lấy thông tin từ bàng tai_khoans  -->
              <?= $order['email_nguoi_nhan']; ?>
            </p>
            </div>
          </div>

          <div class="col-4">
            <div class="card-header">
              <h3 class="card-title">Thông Tin Người Nhận</h3>
            </div>
            <div class="card-body">
              <p><strong>Tên Người Nhận:</strong> <?= $order['ten_nguoi_nhan']; ?></p>
              <p><strong>Số Điện Thoại:</strong> <?= $order['sdt_nguoi_nhan']; ?></p>
              <p><strong>Email:</strong> <?= $order['email_nguoi_nhan']; ?></p>
              <p><strong>Địa Chỉ:</strong> <?= $order['dia_chi_nguoi_nhan']; ?></p>
              <p><strong>Ghi chú:</strong> <?= $order['ghi_chu']; ?></p>
            </div>
          </div>
 
          <div class="col-4">
            <div class="card-header">
              <h3 class="card-title">Thông Tin Đơn Hàng</h3>
            </div>
            <div class="card-body">
              <p><strong>Mã Đơn Hàng:</strong> <?= $order['ma_don_hang']; ?></p>
              <p><strong>Ngày Đặt:</strong> <?= $order['ngay_dat']; ?></p>
              <p><strong>Tổng Tiền:</strong> <?= number_format($order['tong_tien'], 0, ',', '.'); ?> VND</p>
              <p><strong>Trạng Thái:</strong> <?= $order['trang_thai_id']; ?></p>
            </div>
          </div>

        </div>

        <div class="card col-12">
  <div class="card-header">
    <h3 class="card-title">Thông Tin Sản Phẩm</h3>
  </div>
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Tên sản phẩm</th>
          <th>Giá sản phẩm</th>
          <th>Số lượng</th>
          <th>Hình ảnh sản phẩm</th>
          <th>Thành tiền</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($order['products'])): ?>
            <?php foreach ($order['products'] as $product): ?>
                <tr>
                    <td><?= htmlspecialchars($product['ten_san_pham']) ?></td>
                    <td><?= number_format($product['gia_san_pham'], 0, ',', '.') ?> VND</td>
                    <td><?= $product['so_luong'] ?></td>
                    <td>
                        <?php if (!empty($product['hinh_anh'])): ?>
                            <img src="<?= BASE_URL . $product['hinh_anh'] ?>" style="width: 100px" alt="Product Image" onerror="this.onerror=null; this.src='https://www.example.com/default-image.jpg'">
                        <?php else: ?>
                            <img src="https://www.example.com/default-image.jpg" style="width: 100px" alt="Default Image">
                        <?php endif; ?>
                    </td>
                    <td>
                        <?= number_format($product['gia_san_pham'] * $product['so_luong'], 0, ',', '.') ?> VND
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">Không có sản phẩm nào.</td>
            </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>


      </div>
    </div>
  </section>
</div>

<?php require './views/layout/footer.php'; ?>