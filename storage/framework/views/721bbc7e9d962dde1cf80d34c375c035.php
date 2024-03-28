<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
	<title>Tạo phòng - HUIT - Quản lý phòng máy</title>
	<link rel="icon" type="image/x-icon" href="<?php echo e(asset('img/logo.jpg')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('css/dangki.css')); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</head>
<body>
    <div class="card-header">
        <a style="text-decoration: none" href="<?php echo e(route('dashboard')); ?>" class="btn btn-primary">
            < </a>
    </div>
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <!-- Hiển thị thông báo lỗi hoặc thành công -->
                    <span class="text-danger"><?php echo e($message ?? ''); ?></span>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Tạo Phòng</h4>
                    </div>
                    <form action="<?php echo e(route('admin.rooms.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Tên Phòng</label><input type="text"
                                    class="form-control" name="ten_phong" placeholder="Phòng A" value="" required></div>
							<div class="col-md-12"><label class="labels">Sức chứa</label><input type="number"
									class="form-control" name="suc_chua" placeholder="Bao nhiêu người" value="" required></div>
                            <div class="col-md-12"><label class="labels">Vị trí</label><input type="text"
                                    class="form-control" name="vi_tri" placeholder="Số phòng" value="" required></div>
                        </div>
                        <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Tạo</button></div>
                </div>
                </form>
            </div>
        </div>
    </div>
</body><?php /**PATH C:\Users\dh520\OneDrive\Desktop\qlpm\resources\views/admin/rooms/taoPhong.blade.php ENDPATH**/ ?>