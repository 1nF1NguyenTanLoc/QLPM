
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <title>Thông tin cá nhân - HUIT - Quản lý phòng máy</title>
	<link rel="icon" type="image/x-icon" href="{{asset('img/logo.jpg')}}">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
</head>
<body>

    <div class="container">
        <div class="profile-card">
            <div class="card-header">
                <a style="text-decoration: none" href="{{ route('trangchu') }}" class="btn btn-primary"><</a>
            </div>
            <div class="card-body" id="update-profile">
                <form method="POST" action="{{ route('profile.update') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Tên Giảng Viên</label>
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}" required autofocus>
                    </div>
    
                    <div class="form-group">
                        <label for="email">Địa chỉ Email</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}" required>
                    </div>
    
                    <div class="form-group">
                        <label for="khoa">Khoa</label>
                        <select id="khoa" class="form-control" name="khoa" required>
                            <option value="Công Nghệ Thông Tin" {{ $user->khoa == 'Công Nghệ Thông Tin' ? 'selected' : '' }}>Công Nghệ Thông Tin</option>
                            <option value="Quản Trị Kinh Doanh" {{ $user->khoa == 'Quản Trị Kinh Doanh' ? 'selected' : '' }}>Quản Trị Kinh Doanh</option>
                            <option value="Công Nghệ Thực Phẩm" {{ $user->khoa == 'Công Nghệ Thực Phẩm' ? 'selected' : '' }}>Công Nghệ Thực Phẩm</option>
                            <option value="Kỹ Sư Xây Dựng" {{ $user->khoa == 'Kỹ Sư Xây Dựng' ? 'selected' : '' }}>Kỹ Sư Xây Dựng</option>
                        </select>
                    </div>
    
                    <div class="form-group">
                        <label for="sdt">Số điện thoại</label>
                        <input id="sdt" type="number" class="form-control" name="sdt" value="{{ old('sdt', $user->sdt) }}" required>
                    </div>
    
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Cập nhật thông tin</button>
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</body>
<script>
    document.getElementById('profile-options').addEventListener('change', function() {
        var selectedOption = this.value;
        if (selectedOption === 'update') {
            document.getElementById('update-profile').style.display = 'block';
            document.getElementById('change-password').style.display = 'none';
        } else if (selectedOption === 'change-password') {
            document.getElementById('update-profile').style.display = 'none';
            document.getElementById('change-password').style.display = 'block';
        }
    });
</script>