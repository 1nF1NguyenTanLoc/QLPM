<div id="searchResults">
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
            <?php if($users->isEmpty()): ?>
            <?php else: ?>
                <ul>
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
                            <td style="font-weight:bolder" class="text-white">
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
                                <a href="#" class="btn btn-primary">✏️</a>
                                <!-- Nút xoá -->
                                <form action="#" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-danger">🗑️</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php /**PATH C:\Users\dh520\OneDrive\Desktop\qlpm\resources\views/admin/user/search_results.blade.php ENDPATH**/ ?>