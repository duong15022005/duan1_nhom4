<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản phẩm theo danh mục</title>
</head>
<body>

<h1>Sản phẩm thuộc danh mục: <?php echo $danhMuc['ten_danh_muc']; ?></h1>

<div>
    <?php if (count($listSanPham) > 0): ?>
        <ul>
            <?php foreach ($listSanPham as $sanPham): ?>
                <li>
                    <img src="<?php echo $sanPham['hinh_anh']; ?>" alt="<?php echo $sanPham['ten_san_pham']; ?>" width="100" height="100" />
                    <p><?php echo $sanPham['ten_san_pham']; ?></p>
                    <p><?php echo number_format($sanPham['gia_san_pham']); ?> VND</p>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Không có sản phẩm trong danh mục này.</p>
    <?php endif; ?>
</div>

</body>
</html>
