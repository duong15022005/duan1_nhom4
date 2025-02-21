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
            <h1>Quản Lý Danh Mục Bình Luận</h1>
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
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>STT</th>
                    <th>Tên Danh Mục</th>
                    <th>Tên sản phẩm</th>
                    <th>Nội dung</th>
                    <th>Ngày đăng</th>
                  </tr>
                  </thead>
                  <tbody>
    <?php foreach ($ListBinhLuan as $key => $binhluan): ?>
    <tr>
        <td><?= $key+1 ?></td>
        <td><?= $binhluan['nguoi_dung_id'] ?></td>
        <td><?= $binhluan['san_pham_id'] ?></td>
        <td><?= $binhluan['noi_dung'] ?></td>
        <td><?= $binhluan['created_at'] ?></td>
        <td>
            <?php if ($binhluan['trang_thai'] == 1): ?>
                <a href="./?act=hide-binh-luan&id=<?= $binhluan['id'] ?>">
                    <button class="btn btn-warning">Ẩn</button>
                </a>
            <?php else: ?>
                <a href="./?act=show-binh-luan&id=<?= $binhluan['id'] ?>">
                    <button class="btn btn-success">Hiện</button>
                </a>
            <?php endif; ?>
        </td>
    </tr>
    <?php endforeach; ?>
</tbody>
                  <tfoot>
                
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
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
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
