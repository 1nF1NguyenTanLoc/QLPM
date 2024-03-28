<head>
    <title>Đăng nhập - HUIT - Quản lí phòng máy</title>
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/user_login.css')); ?>">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
    <span><?php echo e($message ?? ''); ?></span>
	<div class="main">
        <?php echo csrf_field(); ?>
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<form method="POST">
					<label for="chk" aria-hidden="true">Sign up</label>
					<input type="text" name="txt" placeholder="User name" required="">
					<input type="email" name="email" placeholder="Email" required="">
					<input type="password" name="password" placeholder="Password" required="">
					<button>Sign up</button>
				</form>
			</div>

			<div class="login">
				<form method="POST">
					<label for="chk" aria-hidden="true">Login</label>
					<input type="email" name="email" placeholder="Email" required="">
					<input type="password" name="password" placeholder="Password" required="">
					<button type="submit">Login</button>
				</form>
			</div>
	</div>
</body><?php /**PATH C:\Users\dh520\OneDrive\Desktop\qlpm\resources\views/user_login.blade.php ENDPATH**/ ?>