<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <title>AdminPage - HUIT - Quản lý phòng máy</title>
	<link rel="icon" type="image/x-icon" href="{{asset('img/logo.jpg')}}">
	<link rel="stylesheet" href="{{asset('css/admin.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</head>
<body>
    <div class="card-header">
        <a style="text-decoration: none" href="{{ route('dashboard') }}"><img style="width:50px;height:auto" src="{{asset('img/logo.jpg')}}"></img></a>
        <a id="memberBtn" style="text-decoration: none"class="btn btn-primary" href="#giangvien">Quản lý thành viên</a>
        <a id="roomBtn" style="text-decoration: none"class="btn btn-primary" href="#phong">Quản lý phòng</a>
        <a id="usageBtn" style="text-decoration: none"class="btn btn-primary" href="#sudung">Lịch sử dùng phòng</a>
    </div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="content">
        <div id="memberContent" style="display: none;">
            <!-- Content for member management -->
            <h1>Danh sách sách thành viên </h1>
            
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
                        <th><a href="{{route('admin.users.create')}}" class="btn btn-success">📝</a></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td style="font-weight:bolder" class="text-white">{{ $user->id }}</td>
                        <td style="font-weight:bold" class="text-primary">{{ $user->name }}</td>
                        <td class="text-secondary">
                            @if($user->phai == 0)
                                {{ 'Nam' }}
                            @else
                                {{ 'Nữ' }}
                            @endif
                        </td>
                        <td style="font-weight:inherit" class="text-info">{{ $user->email }}</td>
                        <td style="font-weight:bolder" class="text-white">{{ $user->sdt }}</td>
                        <td style="font-weight:bolder" class="text-white">{{ $user->khoa }}</td>
                        <td style="font-weight:bolder" class="text-white">
                            @if($user->vai_tro == 'admin')
                                {{ 'Quản Lý' }}
                            @else
                                {{ 'Giảng Viên' }}
                            @endif
                        </td>
                        <td style="font-weight:bolder" class="text-white">{{ $user->created_at }}</td>
                        <td style="font-weight:bolder" class="text-white">{{ $user->updated_at }}</td>
                        <td>
                            <!-- Nút sửa -->
                            <a href="#" class="btn btn-primary">✏️</a>
                            <!-- Nút xoá -->
                            <form action="#" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">🗑️</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div id="roomContent" style="display: none;">
            <!-- Content for room management -->
            <h3>Quản lý phòng</h3>
            <p>Đây là nội dung quản lý phòng...</p>
        </div>
        <div id="usageContent" style="display: none;">
            <!-- Content for room usage history -->
            <h3>Lịch sử sử dụng phòng</h3>
            <p>Đây là nội dung lịch sử sử dụng phòng...</p>
        </div>
    </div>
</body>
    <!-- Add your JS script here -->
    <script>
        document.getElementById("memberBtn").addEventListener("click", function() {
            document.getElementById("memberContent").style.display = "block";
            document.getElementById("roomContent").style.display = "none";
            document.getElementById("usageContent").style.display = "none";
        });
    
        document.getElementById("roomBtn").addEventListener("click", function() {
            document.getElementById("memberContent").style.display = "none";
            document.getElementById("roomContent").style.display = "block";
            document.getElementById("usageContent").style.display = "none";
        });
    
        document.getElementById("usageBtn").addEventListener("click", function() {
            document.getElementById("memberContent").style.display = "none";
            document.getElementById("roomContent").style.display = "none";
            document.getElementById("usageContent").style.display = "block";
        });
    </script>