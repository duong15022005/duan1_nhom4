<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <div style="text-align:center;">
    <a href="#" class="brand-link">
      <span class="brand-text font-weight-light" style="font-size:35px; color: white;">Mixi <span
          style="color: red;">Shop</span></span>
    </a>
  </div>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="./assets/dist/img/mixi.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block" style="font-size:15px; color: white;">MixiGaming</a>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="<?= BASE_URL_ADMIN ?>" class="nav-link">
            <i class="nav-icon fas fa-home"></i>
            <p style="color: white;">
              Trang Chủ
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= BASE_URL_ADMIN . '?act=danh-muc' ?>" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p style="color: white;">
              Danh Mục
            </p>
          </a>
        </li>

        <li class="nav-item">

          <a href="<?= BASE_URL_ADMIN . '?act=san-pham' ?>" class="nav-link">
            <i class="nav-icon fas fa-home"></i>
            <p style="color: white;">
              Sản Phẩm
            </p>
          </a>
        </li>


        <li class="nav-item">
          <a href="<?= BASE_URL_ADMIN . '?act=don-hang' ?>" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p style="color: white;">
              Quản Lý Người Dùng
            </p>
            <i class="fas fa-angle-left"></i>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= BASE_URL_ADMIN . '/?act=list-tai-khoan-quan-tri' ?>" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p style="color: white;"> Tài Khoản Quản Trị Viên</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= BASE_URL_ADMIN . '/?act=list-tai-khoan-khach-hang' ?>" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p style="color: white;"> Tài Khoản Khách Hàng</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="<?= BASE_URL_ADMIN . '?act=don-hang' ?>" class="nav-link">
            <i class="nav-icon fas fa-file-alt"></i>
            <p style="color: white;">
              Đơn Hàng
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= BASE_URL_ADMIN . '/?act=banner' ?>" class="nav-link">
            <i class="nav-icon fas fa-warehouse"></i>
            <p style="color: white;">
              Quản Lý Banner
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= BASE_URL_ADMIN . '/?act=binh-luan' ?>" class="nav-link">
            <i class="nav-icon fas fa-comment"></i>
            <p style="color: white;">
              Quản Lý Bình Luận
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= BASE_URL_ADMIN . '/?act=khuyen-mai' ?>" class="nav-link">
            <i class="nav-icon fas fa-percent"></i>
            <p style="color: white;">
              Quản Lý Khuyến Mãi
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= BASE_URL_ADMIN . '/?act=lien-he' ?>" class="nav-link">
            <i class="nav-icon fas fa-id-badge"></i>
            <p style="color: white;">Liên Hệ</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= BASE_URL_ADMIN . '/?act=tin-tuc' ?>" class="nav-link">
            <i class="nav-icon fas fa-newspaper"></i>
            <p style="color: white;">
              Tin Tức
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>