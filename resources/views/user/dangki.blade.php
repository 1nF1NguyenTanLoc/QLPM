<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
	<title>Đăng kí - HUIT - Quản lý phòng máy</title>
	<link rel="icon" type="image/x-icon" href="{{asset('img/logo.jpg')}}">
	<link rel="stylesheet" href="{{asset('css/dangki.css')}}">
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
                        <h4 class="text-right">Đăng ký</h4>
                    </div>
                    <form method="POST" action="{{ route('dangki_post') }}">
                        @csrf
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Họ Tên</label><input type="text"
                                    class="form-control" name="name" placeholder="Nguyễn Văn A" value="" required></div>
							<div class="col-md-12"><label class="labels">Email</label><input type="email"
									class="form-control" name="email" placeholder="example@email.com" value="" required></div>
                            <div class="col-md-12"><label class="labels">Số điện thoại</label><input type="number"
                                    class="form-control" name="sdt" placeholder="0123 XXX XXX" value="" required></div>
                            <div class="col-md-12"><label class="labels">Khoa</label>
                                <select id="khoa" class="form-control" name="khoa" required>
                                    <option value="">--Khoa---</option>
                                    <option value="Công Nghệ Thông Tin">Công Nghệ Thông Tin</option>
                                    <option value="Quản Trị Kinh Doanh">Quản Trị Kinh Doanh</option>
                                    <option value="Công Nghệ Thực Phẩm">Công Nghệ Thực Phẩm</option>
                                    <option value="Kỹ Sư Xây Dựng">Kỹ Sư Xây Dựng</option>
                                </select>
                            <div class="col-md-12"><label class="labels">Giới Tính</label>
                                <select id="phai" class="form-control" name="phai" required>
                                    <option value="">--Giới tính--</option>
                                    <option value="0">Nam</option>
                                    <option value="1">Nữ</option>
                                </select>
                            <div class="col-md-12"><label class="labels">Mật khẩu</label><input type="password"
                                    class="form-control" name="password" placeholder="Mật khẩu mới" value="" required></div>
                            <div class="col-md-12"><label class="labels">Xác nhận mật khẩu</label><input type="password"
                                    class="form-control" name="confirm_password" placeholder="Xác nhận mật khẩu mới" value="" required></div>
                        </div>
                        <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Đăng ký</button></div>
						<div style="text-align: right;margin-top: 10px">
							<span>Nếu bạn đã có tài khoản ?</span>
							<a style="text-decoration: none" href="{{ route('user_login') }}" class="btn btn-primary">Đăng nhập</a>
						</div>
                </div>
                </form>
            </div>
        </div>
    </div>
</body>
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