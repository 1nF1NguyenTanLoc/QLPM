<head>
    <title>Đăng kí - HUIT - Quản lý phòng máy</title>
</head>
<body>
    <div>
        <span><?php echo e($message ?? ''); ?></span>
        <form action="" method="POST">
            <?php echo csrf_field(); ?>
            <input type="text" name="name" placeholder="Họ Tên"><br>
            <input type="email" name="email" placeholder="Email"><br>
            <input type="password" name="password" placeholder="Password"><br>
            <input type="password" name="confirm_password" placeholder="Password"><br>
            <button type="submit">Đăng kí</button>
        </form>
    </div>
</body><?php /**PATH C:\Users\dh520\OneDrive\Desktop\qlpm\resources\views/dangki.blade.php ENDPATH**/ ?>