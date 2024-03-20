<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Đăng nhập - HUIT - Quản lý phòng máy</title>
	<link rel="icon" type="image/x-icon" href="{{asset('img/logo.jpg')}}">
	<link rel="stylesheet" href="{{asset('css/user_login.css')}}">
</head>
<body>
<div class="container">
	<div class="screen">
		<div class="screen__content">
			<form class="login" method="POST">
				@csrf
				<span class="login" style="font-weight: bolder; font-size: 24px; font-family:Georgia, 'Times New Roman', Times, serif;">Đăng nhập</span>
				<div class="login__field">
					<i class="login__icon fas fa-user"></i>
					<input type="email" name="email" class="login__input" placeholder="Your Email">
				</div>
				<div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input type="password" name="password" class="login__input" placeholder="Password">
				</div>
				<span class="button__text">{{$message ?? ''}}</span>
				<button type="submit" class="button login__submit">
					<span class="button__text">Đăng nhập</span>
					<i class="button__icon fas fa-chevron-right"></i>
				</button>
				<a class="button login__submit" style="text-decoration: none" href="{{route('dangki')}}">
					<span class="button__text">Đăng kí</span>
					<i class="button__icon fas fa-chevron-right"></i>
				</a>
				<a class="button login__submit" style="text-decoration: none" href="{{route('trangchu')}}">
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