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
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php if($phongs->isEmpty()): ?>
            <?php else: ?>
                <ul>
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
                </ul>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php /**PATH C:\Users\dh520\OneDrive\Desktop\qlpm\resources\views/user/search_results.blade.php ENDPATH**/ ?>