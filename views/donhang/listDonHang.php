<!-- views/donhang/listDonHang.php -->
<?php if (isset($_SESSION['success'])): ?>
<div class="alert alert-success">
    <?php echo $_SESSION['success'];
    unset($_SESSION['success']); ?></div>
<?php endif; ?>



<?php require './views/layout/header.php'; ?>
<?php include './views/layout/navbar.php'; ?>
<?php include './views/layout/sidebar.php'; ?>
<?php if (isset($_SESSION['success'])): ?>
<div class="alert alert-success"><?php echo $_SESSION['success'];
                                    unset($_SESSION['success']); ?></div>
<?php endif; ?>



<style>
ul.tabs {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    justify-content: space-evenly;
    flex-wrap: wrap;
    border-bottom: 2px solid #ddd;
}

ul.tabs li {
    margin: 10px;
    text-align: center;
}

ul.tabs li a {
    text-decoration: none;
    padding: 10px;
    background-color: #f0f0f0;
    color: #333;
    border-radius: 5px;
    display: block;
    font-size: 14px;
    transition: background-color 0.3s ease, color 0.3s ease;
}

ul.tabs li a:hover,
ul.tabs li a:focus {
    background-color: #007bff;
    color: #fff;
}

ul.tabs li a.active {
    background-color: #007bff;
    color: white;
    font-weight: bold;
}

/* màu trạng thái */

.status-pending {
    color: #E2AB14FF;
    font-weight: bold;
}

.status-confirmed {
    color: blue;
    font-weight: bold;
}

.status-in-transit {
    color: purple;
    font-weight: bold;
}

.status-delivered {
    color: green;
    font-weight: bold;
}

.status-successful {
    color: darkgreen;
    font-weight: bold;
}

.status-failed {
    color: red;
    font-weight: bold;
}

.status-canceled {
    color: gray;
    font-weight: bold;
}
</style>


<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản Lý Danh Sách Đơn Hàng</h1>
                </div>
            </div>
        </div>
    </section>



    <section class="content">
        <div class="container-fluid">
            <div class="row">
           <div class="col-12">
                    <div class="card">
              <ul class="tabs">

                            <li><a href="?act=don-hang&status=all">Tất cả <br> (<?php echo $countAll; ?>)</a></li>
                            <li><a href="?act=don-hang&status=1">Chờ xác nhận <br> (<?php echo $countPending; ?>)</a>
                           </li>
                            <li><a href="?act=don-hang&status=2">Đã xác nhận <br> (<?php echo $countConfirmed; ?>)</a>
                            </li>
                            <li><a href="?act=don-hang&status=3">Đang giao <br> (<?php echo $countInTransit; ?>)</a>
             </li>
                            <li><a href="?act=don-hang&status=4">Đã giao <br> (<?php echo $countDelivered; ?>)</a></li>
                            <li><a href="?act=don-hang&status=5">Giao hàng thành công <br>
                                    (<?php echo $countSuccessful; ?>)</a></li>
                            <li><a href="?act=don-hang&status=6">Giao hàng thất bại <br>
                                    (<?php echo $countFailed; ?>)</a></li>
                            <li><a href="?act=don-hang&status=7">Đã huỷ <br> (<?php echo $countCanceled; ?>)</a></li>
                        </ul>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Mã đơn hàng</th>
                                        <th>Ngày đặt</th>
                                        <!-- <th>Tên người đặt</th> -->
                                        <th>Tổng tiền</th>
                                        <th>Trạng thái</th>
                                        <th>Trạng thái thanh toán</th>
                                        <th>Phương thức thanh toán</th>
                                        <th>Cập nhật trạng thái</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($All as $donHang): ?>
                                    <tr>
                                        <td><?php echo $donHang['ma_don_hang']; ?></td>
                                        <td><?php echo $donHang['ngay_dat']; ?></td>
                                        <!-- <td><?php echo $donHang['ten_nguoi_dat']; ?></td> -->
                                        <td><?php echo number_format($donHang['tong_tien'], 0, ',', '.'); ?> VND</td>
                                        <td>
                                            <?php
                        foreach ($listTrangThai as $trangThai) {
                          if ($donHang['trang_thai_id'] == $trangThai['id']) {
                            // Xác định class theo trạng thái
                            $class = '';
                            switch ($trangThai['id']) {
                              case 1:
                                $class = 'status-pending'; //chờ xác nhận
                                break;
                              case 2:
                                $class = 'status-confirmed'; //đã xác nhận
                                break;
                              case 3:
                                $class = 'status-in-transit'; //đang giao
                                break;
                              case 4:
                                $class = 'status-delivered'; //đã giao
                                break;
                              case 5:
                                $class = 'status-successful'; //giao hàng thành công
                                break;
                              case 6:
                                $class = 'status-failed'; //giao hàng thất bại
                                break;
                              case 7:
                                $class = 'status-canceled'; //đã huỷ
                                break;
                            }
                            // Hiển thị trạng thái với màu sắc
                            echo '<span class="' . $class . '">' . $trangThai['ten_trang_thai'] . '</span>';
                          }
                        }
                        ?>
                                        </td>

                                        <td>
                                            <?php foreach ($listThanhToan as $trangThaiThanhToan) {
                          if ($donHang['trang_thai_thanh_toan_id'] == $trangThaiThanhToan['id']) {
                            echo $trangThaiThanhToan['ten_trang_thai'];
                          }
                        } ?>
                                        </td>
                                        <td>
                                            <?php foreach ($listPhuongThucThanhToan as $phuongThuc) {
                          if ($donHang['phuong_thuc_thanh_toan_id'] == $phuongThuc['id']) {
                            echo $phuongThuc['ten_phuong_thuc'];
                          }
                        } ?>
                                        </td>

                                        <td>
                                            <!-- cập nhật trạng thái đơn hàng -->
                                            <form action="<?= BASE_URL_ADMIN . '/?act=cap-nhat-trang-thai-don-hang' ?>"
                                                method="post" style="display:inline;">
                                                <input type="hidden" name="id" value="<?= $donHang['id'] ?>">

                                                <?php
                          // Kiểm tra nếu trạng thái hiện tại là "Giao hàng thành công", "Giao hàng thất bại" hoặc "Đã huỷ"
                          $isDeliveredSuccessfully = ($donHang['trang_thai_id'] == 5);
                          $isFailed = ($donHang['trang_thai_id'] == 6);
                          $isCanceled = ($donHang['trang_thai_id'] == 7);
                          ?>

                                                <!-- Display select and button if the status is not "Giao hàng thành công", "Giao hàng thất bại", or "Đã huỷ" -->
                                                <?php if (!($isDeliveredSuccessfully || $isFailed || $isCanceled)): ?>
                                                <select name="trang_thai_id" class="form-control"
                                                    style="width: auto; display:inline-block;">
                                                    <?php
                              foreach ($listTrangThai as $trangThai):
                                // Skip past statuses
                                if ($trangThai['id'] <= $donHang['trang_thai_id']) {
                                  continue;
                                }
                              ?>
                                                    <option value="<?= $trangThai['id'] ?>"
                                                        <?= ($donHang['trang_thai_id'] == $trangThai['id']) ? 'selected' : ''; ?>>
                                                        <?= $trangThai['ten_trang_thai'] ?>
                                                    </option>
                                                    <?php endforeach; ?>
                                                </select>

                                                <button type="submit" class="btn btn-success">Cập nhật</button>
                                                <?php else: ?>
                                                <!-- Styled message -->
                                                <div class="alert alert-warning" role="alert"
                                                    style="font-weight: bold; color: #d9534f;">
                                                    <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                                                    <span>Không thể cập nhật trạng thái!!!</span>
                                                </div>
                                                <?php endif; ?>


                                            </form>
                                        </td>





                                        <td>
                                            <!-- //hành đọng  -->
                                            <div class="btn-group">
                                                <!-- xem chi tiết sản phẩm -->
                                                <a
                                                    href="<?= BASE_URL_ADMIN . '/?act=chi-tiet-don-hang&id=' . $donHang['id'] ?>">
                                                    <button class="btn btn-primary"><i class="fas fa-eye"></i></button>
                                                </a>

                                                <!-- sửa sản phẩm -->
                                                <!-- <a href="<?= BASE_URL_ADMIN . '/?act=from-edit-don-hang&id=' . $donHang['id'] ?>"> -->
                                                <button class="btn btn-warning"><i class="fas fa-wrench"></i></button>
                                                <!-- </a> -->

                                                <!-- xoá sản phẩm -->
                                                <a href="<?= BASE_URL_ADMIN . '/?act=xoa-don-hang&id=' . $donHang['id'] ?>"
                                                    onclick="return confirm('Bạn Có Muốn Xóa Đơn Hàng Này Không ?')">
                                                    <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                                </a>
                                            </div>
                                        </td>

                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php require './views/layout/footer.php'; ?>