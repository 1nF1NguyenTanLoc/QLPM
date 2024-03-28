<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
	<title>Sửa thành viên - HUIT - Quản lý phòng máy</title>
	<link rel="icon" type="image/x-icon" href="<?php echo e(asset('img/logo.jpg')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('css/dangki.css')); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</head>
<body>
    <div class="card-header">
        <a style="text-decoration: none" href="<?php echo e(route('dashboard')); ?>#giangvien" class="btn btn-primary">
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
                        <h4 class="text-right">Thông Tin Người Dùng</h4>
                    </div>
                    <form action="<?php echo e(route('admin.users.updated', ['id' => $nguoiDung->id])); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">ID Giảng Viên</label><input type="text"
                                    class="form-control" name="id" value="<?php echo e(old('id', $nguoiDung->id)); ?>" required autofocus readonly></div>
                            <div class="col-md-12"><label class="labels">Họ Tên</label><input type="text"
                                    class="form-control" name="name" value="<?php echo e(old('name', $nguoiDung->name)); ?>" required autofocus></div>
                            <div class="col-md-12"><label class="labels">Số điện thoại</label><input type="number"
                                    class="form-control" name="sdt" value="<?php echo e(old('sdt', $nguoiDung->sdt)); ?>" required></div>
                            <div class="col-md-12"><label class="labels">Email ID</label><input type="email"
                                    class="form-control" name="email" value="<?php echo e(old('email', $nguoiDung->email)); ?>" required></div>
                            <div class="col-md-12"><label class="labels">Khoa</label>
                                <select id="khoa" class="form-control" name="khoa" required>
                                    <option value="Công Nghệ Thông Tin" <?php echo e($nguoiDung->khoa == 'Công Nghệ Thông Tin' ? 'selected' : ''); ?>>Công Nghệ Thông Tin</option>
                                    <option value="Quản Trị Kinh Doanh" <?php echo e($nguoiDung->khoa == 'Quản Trị Kinh Doanh' ? 'selected' : ''); ?>>Quản Trị Kinh Doanh</option>
                                    <option value="Công Nghệ Thực Phẩm" <?php echo e($nguoiDung->khoa == 'Công Nghệ Thực Phẩm' ? 'selected' : ''); ?>>Công Nghệ Thực Phẩm</option>
                                    <option value="Kỹ Sư Xây Dựng" <?php echo e($nguoiDung->khoa == 'Kỹ Sư Xây Dựng' ? 'selected' : ''); ?>>Kỹ Sư Xây Dựng</option>
                                </select>
                            <div class="col-md-12"><label class="labels">Giới Tính</label>
                                <select id="phai" class="form-control" name="phai" required>
                                    <option value="0" <?php echo e($nguoiDung->phai == '0' ? 'selected' : ''); ?>>Nam</option>
                                    <option value="1" <?php echo e($nguoiDung->phai == '1' ? 'selected' : ''); ?>>Nữ</option>
                                </select>
                        </div>
                        <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Lưu
                                Profile</button></div>
                </div>
                </form>
            </div>
        </div>
    </div>
</body><?php /**PATH C:\Users\dh520\OneDrive\Desktop\qlpm\resources\views/admin/updateNguoiDung.blade.php ENDPATH**/ ?>