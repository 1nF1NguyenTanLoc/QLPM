<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <title>AdminPage - HUIT - Quản lý phòng máy</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/logo.jpg') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</head>

<body>
    <div class="card-header">
        <a id="pageBtn" style="text-decoration: none" href="#"><img style="width:50px;height:auto"
                src="{{ asset('img/logo.jpg') }}"></img></a>
        <a id="memberBtn" style="text-decoration: none"class="btn btn-primary" href="#giangvien">Quản lý thành viên</a>
        <a id="roomBtn" style="text-decoration: none"class="btn btn-primary" href="#phong">Quản lý phòng</a>
        <a id="usageBtn" style="text-decoration: none"class="btn btn-primary" href="#sudung">Lịch sử dùng phòng</a>
    </div>
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="content">
        <div id="pageContent" style="display: none;text-align: center;">
            <!-- Content for room management -->
            <h1>Chào mứng đến trang quản lý</h1>
            <p>Đây là trang quản lý của HUIT - Room Manager Website</p>
        </div>
        <div id="memberContent" style="display: none;">
            <!-- Content for member management -->
            <h1>Danh sách thành viên </h1>
            <div style="text-align: center;">
                <a href="{{ route('admin.users.create') }}" class="btn btn-success">Thêm</a>
            </div>
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
                    @foreach ($users as $user)
                        <tr>
                            <td style="font-weight:bolder" class="text-white">{{ $user->id }}</td>
                            <td style="font-weight:bold" class="text-primary">{{ $user->name }}</td>
                            <td class="text-secondary">
                                @if ($user->phai == 0)
                                    {{ 'Nam' }}
                                @else
                                    {{ 'Nữ' }}
                                @endif
                            </td>
                            <td style="font-weight:inherit" class="text-info">{{ $user->email }}</td>
                            <td style="font-weight:bolder" class="text-white">{{ $user->sdt }}</td>
                            <td style="font-weight:bolder" class="text-white">{{ $user->khoa }}</td>
                            <td style="font-weight:bolder" class="text-white">
                                @if ($user->vai_tro == 'admin')
                                    {{ 'Quản Lý' }}
                                @else
                                    {{ 'Giảng Viên' }}
                                @endif
                            </td>
                            <td style="font-weight:bolder" class="text-white">{{ $user->created_at }}</td>
                            <td style="font-weight:bolder" class="text-white">{{ $user->updated_at }}</td>
                            <td>
                                <!-- Nút sửa -->
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary">Sửa</a>
                                <!-- Nút xoá -->
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit"
                                        onclick="return confirm('Bạn có chắc chắn muốn xóa người dùng này?')">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div id="roomContent" style="display: none;">
            <!-- Content for member management -->
            <h1>Danh sách phòng</h1>
            <div style="text-align: center;">
                <a href="{{ route('admin.rooms.create') }}" class="btn btn-success">Thêm</a>
            </div>

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
                            <th>Bảo trì</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($phongs as $phong)
                            <tr>
                                <td style="font-weight:bolder" class="text-white">{{ $phong->id }}</td>
                                <td style="font-weight:bold" class="text-primary">{{ $phong->ten_phong }}</td>
                                <td style="font-weight:bold" class="text-secondary">{{ $phong->suc_chua }}</td>
                                <td style="font-weight:inherit" class="text-info">{{ $phong->vi_tri }}</td>
                                <td style="font-weight:bolder" class="text-white">{{ $phong->created_at }}</td>
                                <td style="font-weight:bolder" class="text-white">{{ $phong->updated_at }}</td>
                                <td style="font-weight:bolder" class="text-white">
                                    {{ $phong->nguoiSuDung->name ?? 'Chưa có người sử dụng' }}</td>
                                <td style="font-weight:bolder" class="text-white">
                                    @if ($phong->trang_thai === 'san_sang')
                                        <span class="text-success">Sẵn sàng</span>
                                    @elseif($phong->trang_thai === 'dang_su_dung')
                                        <span class="text-warning">Đang sử dụng</span>
                                    @elseif($phong->trang_thai === 'dang_bao_tri')
                                        <span class="text-danger">Đang bảo trì</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($phong->trang_thai == 'dang_bao_tri')
                                        <form action="{{ route('admin.phong.hoan_tat',$phong->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-success">Hoàn tất</button>
                                        </form>
                                    @else
                                        <form action="{{ route('admin.phong.bao_tri',$phong->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-warning">Bảo trì</button>
                                        </form>
                                    @endif
                                </td>
                                <td>
                                    <!-- Nút sửa -->
                                    <a href="{{ route('admin.rooms.edit', $phong->id) }}" class="btn btn-primary">Sửa</a>
                                    <!-- Nút xoá -->
                                    <form action="{{ route('rooms.destroy', $phong->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa phòng này?')">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div id="usageContent" style="display: none;">
            <!-- Content for member management -->
            <h1>Lịch sử dùng phòng</h1>

            <div id="searchResults">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên người dùng</th>
                            <th>Tên phòng máy</th>
                            <th>Thời gian bắt đầu</th>
                            <th>Thời gian kết thúc</th>
                            <th>Mô tả</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lichSu as $suDung)
                        <tr>
                            <td style="font-weight:bolder" class="text-white">{{ $suDung->id }}</td>
                            <td style="font-weight:bold" class="text-success">{{ $suDung->nguoiDung->name }}</td>
                            <td style="font-weight:bold" class="text-primary">{{ $suDung->phongMay->ten_phong }}</td>
                            <td class="text-warning">{{ $suDung->mo_ta }}</td>
                            <td style="font-weight:inherit" class="text-info">{{ $suDung->thoi_gian_bat_dau }}</td>
                            <td style="font-weight:inherit" class="text-info">{{ $suDung->thoi_gian_ket_thuc }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
<!-- Add your JS script here -->
<script>
    document.getElementById("pageBtn").addEventListener("click", function() {
        document.getElementById("pageContent").style.display = "block";
        document.getElementById("memberContent").style.display = "none";
        document.getElementById("roomContent").style.display = "none";
        document.getElementById("usageContent").style.display = "none";
    });
    document.getElementById("memberBtn").addEventListener("click", function() {
        document.getElementById("pageContent").style.display = "none";
        document.getElementById("memberContent").style.display = "block";
        document.getElementById("roomContent").style.display = "none";
        document.getElementById("usageContent").style.display = "none";
    });

    document.getElementById("roomBtn").addEventListener("click", function() {
        document.getElementById("pageContent").style.display = "none";
        document.getElementById("memberContent").style.display = "none";
        document.getElementById("roomContent").style.display = "block";
        document.getElementById("usageContent").style.display = "none";
    });

    document.getElementById("usageBtn").addEventListener("click", function() {
        document.getElementById("pageContent").style.display = "none";
        document.getElementById("memberContent").style.display = "none";
        document.getElementById("roomContent").style.display = "none";
        document.getElementById("usageContent").style.display = "block";
    });
</script>
