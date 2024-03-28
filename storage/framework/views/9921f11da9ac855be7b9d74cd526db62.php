<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <title>Danh sách phòng - HUIT - Quản lý phòng máy</title>
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
    
    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <h1>Danh sách phòng</h1>
    
    <table>
        <thead>
            <tr>
                <th>ID Phòng</th>
                <th>Tên Phòng</th>
                <th>Sức Chứa</th>
                <th>Vị Trí</th>
                <th>Tên Người Sử Dụng</th>
                <th>Trạng Thái Phòng</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $phongs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $phong): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td style="font-weight:bolder" class="text-white"><?php echo e($phong->id); ?></td>
                <td style="font-weight:bold" class="text-primary"><?php echo e($phong->ten_phong); ?></td>
                <td class="text-secondary"><?php echo e($phong->suc_chua); ?></td>
                <td style="font-weight:inherit" class="text-info"><?php echo e($phong->vi_tri); ?></td>
                <td style="font-weight:bolder" class="text-white"><?php echo e($phong->nguoiSuDung->name ?? 'Chưa có người sử dụng'); ?></td>
                <td>
                    <?php if($phong->trang_thai === 'san_sang'): ?>
                        <span class="text-success">Sẵn sàng</span>
                    <?php elseif($phong->trang_thai === 'dang_su_dung'): ?>
                        <span class="text-warning">Đang sử dụng</span>
                    <?php elseif($phong->trang_thai === 'dang_bao_tri'): ?>
                        <span class="text-danger">Đang bảo trì</span>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if($phong->trang_thai === 'san_sang'): ?>
                    <form action="<?php echo e(route('phong.su-dung', $phong->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="btn btn-primary">Sử dụng</button>
                    </form>
                    <?php elseif($phong->trang_thai === 'dang_su_dung' && $phong->nguoi_dung_id === auth()->id()): ?>
                    <form action="<?php echo e(route('phong.tra-phong', $phong->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="btn btn-warning">Trả phòng</button>
                    </form>
                    <?php elseif($phong->trang_thai === 'dang_bao_tri'): ?>
                        <span class="alert-danger">Phòng đang bảo trì</span>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</body><?php /**PATH C:\Users\dh520\OneDrive\Desktop\qlpm\resources\views/user/datphong.blade.php ENDPATH**/ ?>