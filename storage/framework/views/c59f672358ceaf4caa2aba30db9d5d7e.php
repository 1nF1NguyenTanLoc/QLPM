<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <title>AdminPage - HUIT - Quản lý phòng máy</title>
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('img/logo.jpg')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/admin.css')); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</head>

<body>
    <div class="card-header">
        <a id="pageBtn" style="text-decoration: none" href="<?php echo e(route('dashboard')); ?>"><img style="width:50px;height:auto"
                src="<?php echo e(asset('img/logo.jpg')); ?>"></img></a>
        <a style="text-decoration: none" href="<?php echo e(route('trangchu')); ?>" class="btn btn-primary">
            < </a>
                <a id="memberBtn" style="text-decoration: none"class="btn btn-primary" href="#giangvien">Quản lý thành
                    viên</a>
                <a id="roomBtn" style="text-decoration: none"class="btn btn-primary" href="#phong">Quản lý phòng</a>
                <a id="usageBtn" style="text-decoration: none"class="btn btn-primary" href="#sudung">Lịch sử dùng
                    phòng</a>
    </div>
    <?php if(session('error')): ?>
        <div class="alert alert-danger">
            <?php echo e(session('error')); ?>

        </div>
    <?php endif; ?>
    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>
    <div class="content">
        <div id="pageContent" style="display: none;text-align: center;">
            <!-- Content for room management -->
            <h1>Chào mứng đến trang quản lý</h1>
            <p>Đây là trang quản lý của HUIT - Room Manager Website</p>
        </div>
        <div id="memberContent" style="display: none;">
            <!-- Content for member management -->
            <h1>Danh sách thành viên </h1>
            <div style="text-align: center;">
                <a href="<?php echo e(route('admin.users.create')); ?>" class="btn btn-success">Thêm</a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Họ Tên</th>
                        <th>Giới tính</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Khoa</th>
                        <th>Quyền</th>
                        <th>Thời gian khởi tạo</th>
                        <th>Thời gian cập nhật</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td style="font-weight:bolder" class="text-white"><?php echo e($user->id); ?></td>
                            <td style="font-weight:bold" class="text-primary"><?php echo e($user->name); ?></td>
                            <td class="text-secondary">
                                <?php if($user->phai == 0): ?>
                                    <?php echo e('Nam'); ?>

                                <?php else: ?>
                                    <?php echo e('Nữ'); ?>

                                <?php endif; ?>
                            </td>
                            <td style="font-weight:inherit" class="text-info"><?php echo e($user->email); ?></td>
                            <td style="font-weight:bolder" class="text-white"><?php echo e($user->sdt); ?></td>
                            <td style="font-weight:bolder" class="text-white"><?php echo e($user->khoa); ?></td>
                            <td style="font-weight:bolder" class="text-success">
                                <?php if($user->vai_tro == 'admin'): ?>
                                    <?php echo e('Quản Lý'); ?>

                                <?php else: ?>
                                    <?php echo e('Giảng Viên'); ?>

                                <?php endif; ?>
                            </td>
                            <td style="font-weight:bolder" class="text-white"><?php echo e($user->created_at); ?></td>
                            <td style="font-weight:bolder" class="text-white"><?php echo e($user->updated_at); ?></td>
                            <td>
                                <!-- Nút sửa -->
                                <a href="<?php echo e(route('admin.users.edit', $user->id)); ?>" class="btn btn-primary">Sửa</a>
                                <!-- Nút xoá -->
                                <form action="<?php echo e(route('users.destroy', $user->id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button class="btn btn-danger" type="submit"
                                        onclick="return confirm('Bạn có chắc chắn muốn xóa người dùng này?')">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        <div id="roomContent" style="display: none;">
            <!-- Content for member management -->
            <h1>Danh sách phòng</h1>
            <div style="text-align: center;">
                <a href="<?php echo e(route('admin.rooms.create')); ?>" class="btn btn-success">Thêm</a>
            </div>

            <div id="searchResults">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên phòng</th>
                            <th>Sức chứa</th>
                            <th>Vị trí</th>
                            <th>Thời gian khởi tạo</th>
                            <th>Thời gian cập nhật</th>
                            <th>Người dùng hiện tại</th>
                            <th>Trạng thái</th>
                            <th>Bảo trì</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $phongs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $phong): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td style="font-weight:bolder" class="text-white"><?php echo e($phong->id); ?></td>
                                <td style="font-weight:bold" class="text-primary"><?php echo e($phong->ten_phong); ?></td>
                                <td style="font-weight:bold" class="text-secondary"><?php echo e($phong->suc_chua); ?></td>
                                <td style="font-weight:inherit" class="text-info"><?php echo e($phong->vi_tri); ?></td>
                                <td style="font-weight:bolder" class="text-white"><?php echo e($phong->created_at); ?></td>
                                <td style="font-weight:bolder" class="text-white"><?php echo e($phong->updated_at); ?></td>
                                <td style="font-weight:bolder" class="text-white">
                                    <?php echo e($phong->nguoiSuDung->name ?? 'Chưa có người sử dụng'); ?></td>
                                <td style="font-weight:bolder" class="text-white">
                                    <?php if($phong->trang_thai === 'san_sang'): ?>
                                        <span class="text-success">Sẵn sàng</span>
                                    <?php elseif($phong->trang_thai === 'dang_su_dung'): ?>
                                        <span class="text-warning">Đang sử dụng</span>
                                    <?php elseif($phong->trang_thai === 'dang_bao_tri'): ?>
                                        <span class="text-danger">Đang bảo trì</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if($phong->trang_thai == 'dang_bao_tri'): ?>
                                        <form action="<?php echo e(route('admin.phong.hoan_tat', $phong->id)); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('PUT'); ?>
                                            <button type="submit" class="btn btn-success">Hoàn tất</button>
                                        </form>
                                    <?php else: ?>
                                        <form action="<?php echo e(route('admin.phong.bao_tri', $phong->id)); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('PUT'); ?>
                                            <button type="submit" class="btn btn-warning">Bảo trì</button>
                                        </form>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <!-- Nút sửa -->
                                    <a href="<?php echo e(route('admin.rooms.edit', $phong->id)); ?>"
                                        class="btn btn-primary">Sửa</a>
                                    <!-- Nút xoá -->
                                    <form action="<?php echo e(route('rooms.destroy', $phong->id)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button class="btn btn-danger" type="submit"
                                            onclick="return confirm('Bạn có chắc chắn muốn xóa phòng này?')">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div id="usageContent" style="display: none;">
            <!-- Content for member management -->
            <h1>Lịch sử dùng phòng</h1>

            <div id="searchResults">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên người dùng</th>
                            <th>Tên phòng máy</th>
                            <th>Thời gian sử dụng</th>
                            <th>Thời gian bắt đầu</th>
                            <th>Thời gian kết thúc</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $lichSu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $suDung): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td style="font-weight:bolder" class="text-white"><?php echo e($suDung->id); ?></td>
                                <td style="font-weight:bold" class="text-success"><?php echo e($suDung->nguoiDung->name); ?></td>
                                <td style="font-weight:bold" class="text-primary"><?php echo e($suDung->phongMay->ten_phong); ?>

                                </td>
                                <td class="text-warning"><?php echo e($suDung->mo_ta); ?></td>
                                <td style="font-weight:inherit" class="text-info"><?php echo e($suDung->thoi_gian_bat_dau); ?>

                                </td>
                                <td style="font-weight:inherit" class="text-info"><?php echo e($suDung->thoi_gian_ket_thuc); ?>

                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
<!-- Add your JS script here -->
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
<!-- end footer -->
<script>
    // Lấy ra tất cả các nút
    var pageBtn = document.getElementById("pageBtn");
    var memberBtn = document.getElementById("memberBtn");
    var roomBtn = document.getElementById("roomBtn");
    var usageBtn = document.getElementById("usageBtn");

    // Lấy ra phần content
    var pageContent = document.getElementById("pageContent");
    var memberContent = document.getElementById("memberContent");
    var roomContent = document.getElementById("roomContent");
    var usageContent = document.getElementById("usageContent");

    // Thêm sự kiện cho từng nút
    pageBtn.addEventListener("click", function() {
        showContent(pageContent);
    });
    memberBtn.addEventListener("click", function() {
        showContent(memberContent);
    });
    roomBtn.addEventListener("click", function() {
        showContent(roomContent);
    });
    usageBtn.addEventListener("click", function() {
        showContent(usageContent);
    });

    // Hiển thị nội dung trang khi không có nút nào được nhấp
    if (!pageBtn.classList.contains('active') && !memberBtn.classList.contains('active') && !roomBtn.classList.contains('active') && !usageBtn.classList.contains('active')) {
        showContent(pageContent);
    }

    // Hàm hiển thị nội dung
    function showContent(content) {
        // Ẩn tất cả các content
        pageContent.style.display = "none";
        memberContent.style.display = "none";
        roomContent.style.display = "none";
        usageContent.style.display = "none";

        // Hiển thị content được chọn
        content.style.display = "block";

        // Đặt class active cho nút tương ứng
        if (content === pageContent) {
            pageBtn.classList.add('active');
            memberBtn.classList.remove('active');
            roomBtn.classList.remove('active');
            usageBtn.classList.remove('active');
        } else if (content === memberContent) {
            pageBtn.classList.remove('active');
            memberBtn.classList.add('active');
            roomBtn.classList.remove('active');
            usageBtn.classList.remove('active');
        } else if (content === roomContent) {
            pageBtn.classList.remove('active');
            memberBtn.classList.remove('active');
            roomBtn.classList.add('active');
            usageBtn.classList.remove('active');
        } else if (content === usageContent) {
            pageBtn.classList.remove('active');
            memberBtn.classList.remove('active');
            roomBtn.classList.remove('active');
            usageBtn.classList.add('active');
        }
    }
</script>
<?php /**PATH C:\Users\dh520\OneDrive\Desktop\qlpm\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>