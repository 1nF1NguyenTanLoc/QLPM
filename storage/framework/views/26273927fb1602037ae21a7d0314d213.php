<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <title>Lịch Sử Dùng Phòng - HUIT - Quản lý phòng máy</title>
	<link rel="icon" type="image/x-icon" href="<?php echo e(asset('img/logo.jpg')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/rooms.css')); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</head>
<body>
    <div class="card-header">
        <a style="text-decoration: none" href="<?php echo e(route('trangchu')); ?>" class="btn btn-primary">
            < </a>
        <a style="text-decoration: none" href="<?php echo e(route('datphong')); ?>" class="btn btn-primary">
            Danh sách phòng </a>
        <a style="text-decoration: none" href="<?php echo e(route('lichsu')); ?>" class="btn btn-primary">
            Lịch sử sử dụng phòng </a>
    </div>
    <h1>Lịch sử sử dụng phòng máy</h1>
    
    <table>
        <thead>
            <tr>
                <th>ID Phòng</th>
                <th>Tên Phòng</th>
                <th>Mô tả</th>
                <th>Thời gian bắt đầu</th>
                <th>Thời gian kết thúc</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $lichSu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $suDung): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td style="font-weight:bolder" class="text-white"><?php echo e($suDung->id_phong_may); ?></td>
                <td style="font-weight:bold" class="text-primary"><?php echo e($suDung->phongMay->ten_phong); ?></td>
                <td class="text-warning"><?php echo e($suDung->mo_ta); ?></td>
                <td style="font-weight:inherit" class="text-info"><?php echo e($suDung->thoi_gian_bat_dau); ?></td>
                <td style="font-weight:inherit" class="text-info"><?php echo e($suDung->thoi_gian_ket_thuc); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</body><?php /**PATH C:\Users\dh520\OneDrive\Desktop\qlpm\resources\views/user/lichsudungphong.blade.php ENDPATH**/ ?>