<div class="content-wrapper">
    <section class="content">
        <div class="container py-2">
            <!-- Category Filter Form -->
            <!-- Category Cards -->
            <div class="row">
                <div class="section-title text-center" style="margin-bottom: 30px;">
                    <h2 class="title" style="font-size: 28px; font-weight: bold; color: #333;">ĐỒ HIỆU MIXI</h2>
                </div>
                <?php foreach ($listDanhMuc as $key => $danhMuc): ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                        <a href="?danh_muc_id=<?= $danhMuc['id'] ?>" class="text-decoration-none text-dark">
                            <div class="card text-center border-0 danh-muc-item">
                                <div class="d-flex justify-content-center align-items-center">
                                    <div class="rounded-circle overflow-hidden" style="width: 150px; height: 150px;">
                                        <img src="<?= BASE_URL_ADMIN . '/uploads/' . $danhMuc['hinh_anh'] ?>"
                                            alt="Hình ảnh danh mục" class="img-fluid"
                                            style="object-fit: cover; width: 100%; height: 100%;">
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <h5 class="card-title"><?= $danhMuc['ten_danh_muc'] ?></h5>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Display Products Based on Selected Category -->


        </div>
    </section>
</div>