<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Đăng nhập - HUIT - Quản lý phòng máy</title>
	<link rel="icon" type="image/x-icon" href="{{asset('img/logo.jpg')}}">
	<link rel="stylesheet" href="{{asset('css/user_login.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</head>
<body>
    <div class="card-header">
        <a style="text-decoration: none" href="{{ route('trangchu') }}" class="btn btn-primary">
            < </a>
    </div>
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <!-- Hiển thị thông báo lỗi hoặc thành công -->
            		<span class="text-danger">{{$message ?? ''}}</span>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Đăng nhập</h4>
                    </div>
                    <form method="POST" action="{{ route('dangnhap_post') }}">
                        @csrf
                        <div class="row mt-3">
							<div class="col-md-12"><label class="labels">Email</label><input type="email"
									class="form-control" name="email" placeholder="example@email.com" value="" required></div>
                            <div class="col-md-12"><label class="labels">Mật khẩu</label><input type="password"
                                    class="form-control" name="password" placeholder="Mật khẩu mới" value="" required></div>
                        </div>
                        <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Đăng nhập</button></div>
						<div style="text-align: right;margin-top: 10px">
							<span>Bạn chưa có tài khoản ?</span>
							<a style="text-decoration: none" href="{{ route('dangki') }}" class="btn btn-primary">Đăng kí</a>
						</div>
                </div>
                </form>
            </div>
        </div>
    </div>
</body>