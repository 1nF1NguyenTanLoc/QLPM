<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <title>Thông tin cá nhân - HUIT - Quản lý phòng máy</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/logo.jpg') }}">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</head>

<body>
    <div class="card-header">
        <a style="text-decoration: none" href="{{ route('trangchu') }}" class="btn btn-primary">
            < </a>
        <a style="text-decoration: none" href="{{ route('profile.show') }}" class="btn btn-primary">
            Chỉnh sửa thông tin </a>
        <a style="text-decoration: none" href="#" class="btn btn-primary">
            Thay đổi mật khẩu</a>
    </div>
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5"
                        width="150px"
                        @if ($user->phai)
                        src="https://cdn5.vectorstock.com/i/1000x1000/01/69/businesswoman-character-avatar-icon-vector-12800169.jpg" alt="Woman Avatar"
                        @else
                        src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg" alt="Man Avatar">
                        @endif
                        <span
                        class="font-weight-bold">{{ old('name', $user->name) }}</span><span
                        class="text-black-50">{{ old('email', $user->email) }}</span><span> </span></div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Chỉnh sửa thông tin</h4>
                    </div>
                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">ID Giảng Viên</label><input type="text"
                                    class="form-control" name="id" value="{{ old('id', $user->id) }}" required autofocus readonly></div>
                            <div class="col-md-12"><label class="labels">Họ Tên</label><input type="text"
                                    class="form-control" name="name" value="{{ old('name', $user->name) }}" required autofocus></div>
                            <div class="col-md-12"><label class="labels">Số điện thoại</label><input type="number"
                                    class="form-control" name="sdt" value="{{ old('sdt', $user->sdt) }}" required></div>
                            <div class="col-md-12"><label class="labels">Email ID</label><input type="email"
                                    class="form-control" name="email" value="{{ old('email', $user->email) }}" required></div>
                            <div class="col-md-12"><label class="labels">Khoa</label>
                                <select id="khoa" class="form-control" name="khoa" required>
                                    <option value="Công Nghệ Thông Tin" {{ $user->khoa == 'Công Nghệ Thông Tin' ? 'selected' : '' }}>Công Nghệ Thông Tin</option>
                                    <option value="Quản Trị Kinh Doanh" {{ $user->khoa == 'Quản Trị Kinh Doanh' ? 'selected' : '' }}>Quản Trị Kinh Doanh</option>
                                    <option value="Công Nghệ Thực Phẩm" {{ $user->khoa == 'Công Nghệ Thực Phẩm' ? 'selected' : '' }}>Công Nghệ Thực Phẩm</option>
                                    <option value="Kỹ Sư Xây Dựng" {{ $user->khoa == 'Kỹ Sư Xây Dựng' ? 'selected' : '' }}>Kỹ Sư Xây Dựng</option>
                                </select>
                            <div class="col-md-12"><label class="labels">Giới Tính</label>
                                <select id="phai" class="form-control" name="phai" required>
                                    <option value="0" {{ $user->phai == '0' ? 'selected' : '' }}>Nam</option>
                                    <option value="1" {{ $user->phai == '1' ? 'selected' : '' }}>Nữ</option>
                                </select>
                        </div>
                        <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Lưu
                                Profile</button></div>
                </div>
                </form>
            </div>
        </div>
    </div>
</body>
{{-- <body>

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
</script> --}}
