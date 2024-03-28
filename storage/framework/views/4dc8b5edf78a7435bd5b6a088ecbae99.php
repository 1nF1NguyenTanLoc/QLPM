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
        <a style="text-decoration: none" href="<?php echo e(route('dashboard')); ?>" class="btn btn-primary">
            < </a>
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5"
                        width="150px"
                        <?php if($user->phai): ?>
                        src="https://cdn5.vectorstock.com/i/1000x1000/01/69/businesswoman-character-avatar-icon-vector-12800169.jpg" alt="Woman Avatar"
                        <?php else: ?>
                        src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg" alt="Man Avatar">
                        <?php endif; ?>
                        <span
                        class="font-weight-bold"><?php echo e(old('name', $user->name)); ?></span><span
                        class="text-black-50"><?php echo e(old('email', $user->email)); ?></span><span> </span></div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <?php if(session('success')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('success')); ?>

                        </div>
                    <?php endif; ?>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Chỉnh sửa thông tin</h4>
                    </div>
                    <form method="POST" action="<?php echo e(route('users.update')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">ID Giảng Viên</label><input type="text"
                                    class="form-control" name="id" value="<?php echo e(old('id', $user->id)); ?>" required autofocus readonly></div>
                            <div class="col-md-12"><label class="labels">Họ Tên</label><input type="text"
                                    class="form-control" name="name" value="<?php echo e(old('name', $user->name)); ?>" required autofocus></div>
                            <div class="col-md-12"><label class="labels">Giới Tính</label>
                                <select id="phai" class="form-control" name="phai" required>
                                    <option value="0" <?php echo e($user->phai == '0' ? 'selected' : ''); ?>>Nam</option>
                                    <option value="1" <?php echo e($user->phai == '1' ? 'selected' : ''); ?>>Nữ</option>
                                </select>
                            </div>
                            <div class="col-md-12"><label class="labels">Email ID</label><input type="email"
                                    class="form-control" name="email" value="<?php echo e(old('email', $user->email)); ?>" required></div>
                            <div class="col-md-12"><label class="labels">Số điện thoại</label><input type="number"
                                    class="form-control" name="sdt" value="<?php echo e(old('sdt', $user->sdt)); ?>" required></div>
                            <div class="col-md-12"><label class="labels">Khoa</label>
                                <select id="khoa" class="form-control" name="khoa" required>
                                    <option value="Công Nghệ Thông Tin" <?php echo e($user->khoa == 'Công Nghệ Thông Tin' ? 'selected' : ''); ?>>Công Nghệ Thông Tin</option>
                                    <option value="Quản Trị Kinh Doanh" <?php echo e($user->khoa == 'Quản Trị Kinh Doanh' ? 'selected' : ''); ?>>Quản Trị Kinh Doanh</option>
                                    <option value="Công Nghệ Thực Phẩm" <?php echo e($user->khoa == 'Công Nghệ Thực Phẩm' ? 'selected' : ''); ?>>Công Nghệ Thực Phẩm</option>
                                    <option value="Kỹ Sư Xây Dựng" <?php echo e($user->khoa == 'Kỹ Sư Xây Dựng' ? 'selected' : ''); ?>>Kỹ Sư Xây Dựng</option>
                                </select>
                            </div>
                            <div class="col-md-12"><label class="labels">Quyền</label>
                                <select id="phai" class="form-control" name="vai_tro" required>
                                    <option value="giang_vien" <?php echo e($user->vai_tro == 'giang_vien' ? 'selected' : ''); ?>>Giảng Viên</option>
                                    <option value="admin" <?php echo e($user->vai_tro == 'admin' ? 'selected' : ''); ?>>Quản Lý</option>
                                </select>
                            </div>
                            <div class="col-md-12"><label class="labels">Mật khẩu</label><input type="password"
                                    class="form-control" name="password" value="" placeholder="<Mật khẩu cũ>"></div>
                        </div>
                        <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Lưu
                                Profile</button></div>
                </div>
                </form>
            </div>
        </div>
    </div>
</body><?php /**PATH C:\Users\dh520\OneDrive\Desktop\qlpm\resources\views/admin/useredit.blade.php ENDPATH**/ ?>