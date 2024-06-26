<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <title>Thông tin cá nhân - HUIT - Quản lý phòng máy</title>
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('img/logo.jpg')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/profile.css')); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</head>

<body>
    <div class="card-header">
        <a style="text-decoration: none" href="<?php echo e(route('trangchu')); ?>" class="btn btn-primary">
            < </a>
        <a style="text-decoration: none" href="<?php echo e(route('profile.show')); ?>" class="btn btn-primary">
            Chỉnh sửa thông tin </a>
        <a style="text-decoration: none" href="<?php echo e(route('profile.password')); ?>" class="btn btn-primary">
            Thay đổi mật khẩu</a>
    </div>
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <!-- Hiển thị thông báo lỗi hoặc thành công -->
                    <?php if(session('error')): ?>
                        <span class="text-danger"><?php echo e(session('error')); ?></span>
                    <?php endif; ?>
    
                    <?php if(session('success')): ?>
                        <span class="text-success"><?php echo e(session('success')); ?></span>
                    <?php endif; ?>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Thay đổi mật khẩu</h4>
                    </div>
                    <form method="POST" action="<?php echo e(route('profile.password-update')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Mật khẩu hiện tại</label><input type="password"
                                    class="form-control" name="current_password" placeholder="Mật khẩu hiện tại" value="" required></div>
                            <div class="col-md-12"><label class="labels">Mật khẩu mới</label><input type="password"
                                    class="form-control" name="new_password" placeholder="Mật khẩu mới" value="" required></div>
                            <div class="col-md-12"><label class="labels">Xác nhận mật khẩu mới</label><input type="password"
                                    class="form-control" name="confirm_password" placeholder="Xác nhận mật khẩu mới" value="" required></div>
                        </div>
                        <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Đổi mật khẩu</button></div>
                </div>
                </form>
            </div>
        </div>
    </div>
</body>
<!--  footer -->
<footer>
    <div class="footer">
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p>Copyright 2024 All Right Reserved By 1nF1 | Nguyễn Tấn Lộc</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- end footer --><?php /**PATH C:\Users\dh520\OneDrive\Desktop\qlpm\resources\views/user/password.blade.php ENDPATH**/ ?>