<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <title>Danh sách phòng - HUIT - Quản lý phòng máy</title>
	<link rel="icon" type="image/x-icon" href="{{asset('img/logo.jpg')}}">
    <link rel="stylesheet" href="{{ asset('css/rooms.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</head>
<body>
    <div class="card-header">
        <a style="text-decoration: none" href="{{ route('trangchu') }}" class="btn btn-primary">
            < </a>
        <a style="text-decoration: none" href="{{ route('datphong') }}" class="btn btn-primary">
            Danh sách phòng </a>
        <a style="text-decoration: none" href="{{ route('lichsu') }}" class="btn btn-primary">
            Lịch sử sử dụng phòng </a>
    </div>
    
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h1>Danh sách phòng</h1>
    
    <table>
        <thead>
            <tr>
                <th>ID Phòng</th>
                <th>Tên Phòng</th>
                <th>Sức Chứa</th>
                <th>Vị Trí</th>
                <th>Tên Người Sử Dụng</th>
                <th>Trạng Thái Phòng</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($phongs as $phong)
            <tr>
                <td>{{ $phong->id }}</td>
                <td>{{ $phong->ten_phong }}</td>
                <td>{{ $phong->suc_chua }}</td>
                <td>{{ $phong->vi_tri }}</td>
                <td>{{ $phong->nguoiSuDung->name ?? 'Chưa có người sử dụng' }}</td>
                <td>
                    @if($phong->trang_thai === 'san_sang')
                        Sẵn sàng
                    @elseif($phong->trang_thai === 'dang_su_dung')
                        Đang sử dụng
                    @elseif($phong->trang_thai === 'dang_bao_tri')
                        Đang bảo trì
                    @endif
                </td>
                <td>
                    @if($phong->trang_thai === 'san_sang')
                    <form action="{{ route('phong.su-dung', $phong->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Sử dụng</button>
                    </form>
                    @elseif($phong->trang_thai === 'dang_su_dung' && $phong->nguoi_dung_id === auth()->id())
                    <form action="{{ route('phong.tra-phong', $phong->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-warning">Trả phòng</button>
                    </form>
                    @elseif($phong->trang_thai === 'dang_bao_tri')
                        <span>Phòng đang bảo trì</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>