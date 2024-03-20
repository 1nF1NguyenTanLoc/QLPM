<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Đăng kí - HUIT - Quản lý phòng máy</title>
	<link rel="icon" type="image/x-icon" href="{{asset('img/logo.jpg')}}">
	<link rel="stylesheet" href="{{asset('css/dangki.css')}}">
</head>
<body>
<div class="container">
	<div class="screen">
		<div class="screen__content">
			<form class="dangki" method="POST">
				@csrf
				<span class="dangki" style="font-weight: bolder; font-size: 24px; font-family:Georgia, 'Times New Roman', Times, serif;">Đăng kí</span>
				<div class="dangki__field">
					<label for="name">Họ Tên</label>
					<i class="dangki__icon fas fa-user"></i>
					<input type="text" name="name" class="dangki__input" placeholder="Your Name">
				</div>
				<div class="dangki__field">
					<label for="email">Email</label>
					<i class="dangki__icon fas fa-user"></i>
					<input type="email" name="email" class="dangki__input" placeholder="Your Email">
				</div>
				<div class="form-group dangki__field">
					<label for="khoa">Khoa</label>
					<select id="khoa" class="form-control" name="khoa" required>
						<option value="">Chọn khoa</option>
						<option value="Công Nghệ Thông Tin">Công Nghệ Thông Tin</option>
						<option value="Quản Trị Kinh Doanh">Quản Trị Kinh Doanh</option>
						<option value="Công Nghệ Thực Phẩm">Công Nghệ Thực Phẩm</option>
						<option value="Kỹ Sư Xây Dựng">Kỹ Sư Xây Dựng</option>
					</select>
				</div>
				
				<div class="form-group">
					<label for="sdt">Số điện thoại</label>
					<input type="number" name="sdt" class="dangki__input" placeholder="093 xxx xx xx">
				</div>
				<div class="dangki__field">
					<label for="password">Mật khẩu</label>
					<i class="dangki__icon fas fa-lock"></i>
					<input type="password" name="password" class="dangki__input" placeholder="Password">
				</div>
				<div class="dangki__field">
					<label for="confirm_password">Xác nhận mật khẩu</label>
					<i class="dangki__icon fas fa-lock"></i>
					<input type="password" name="confirm_password" class="dangki__input" placeholder="Password">
				</div>
				<span>{{$message ?? ''}}</span>
				<button type="submit" class="button dangki__submit">
					<span class="button__text">Đăng kí</span>
					<i class="button__icon fas fa-chevron-right"></i>
				</button>
				<a class="button dangki__submit" style="text-decoration: none" href="{{route('user_login')}}">
					<span class="button__text">Đăng nhập</span>
					<i class="button__icon fas fa-chevron-right"></i>
				</a>				
				<a class="button dangki__submit" style="text-decoration: none" href="{{route('trangchu')}}">
					<span class="button__text">Quay lại trang chủ</span>
					<i class="button__icon fas fa-chevron-right"></i>
				</a>
			</form>
		</div>
		<div class="screen__background">
			<span class="screen__background__shape screen__background__shape4"></span>
			<span class="screen__background__shape screen__background__shape3"></span>		
			<span class="screen__background__shape screen__background__shape2"></span>
			<span class="screen__background__shape screen__background__shape1"></span>
		</div>		
	</div>
</div>
</body>