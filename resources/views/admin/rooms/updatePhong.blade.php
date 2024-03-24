<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <title>Sửa phòng - HUIT - Quản lý phòng máy</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/logo.jpg') }}">
    <link rel="stylesheet" href="{{ asset('css/dangki.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</head>

<body>
    <div class="card-header">
        <a style="text-decoration: none" href="{{ route('dashboard') }}" class="btn btn-primary">
            < </a>
    </div>
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
            </div>
            <div class="col-md-5 border-right">

                <div class="p-3 py-5">
                    <!-- Hiển thị thông báo lỗi hoặc thành công -->
                    <span class="text-danger">{{ $message ?? '' }}</span>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Sửa Phòng</h4>
                    </div>
                    <form action="{{ route('admin.rooms.update', $phong->id) }}" method="POST">
                        @csrf
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">ID Phòng</label><input type="number"
                                    class="form-control" name="id" value="{{ $phong->id }}" required autofocus
                                    readonly></div>
                            <div class="col-md-12"><label class="labels">Tên Phòng</label><input type="text"
                                    class="form-control" name="ten_phong" value="{{ $phong->ten_phong }}" required>
                            </div>
                            <div class="col-md-12"><label class="labels">Sức chứa</label><input type="number"
                                    class="form-control" name="suc_chua" value="{{ $phong->suc_chua }}" required></div>
                            <div class="col-md-12"><label class="labels">Vị trí</label><input type="text"
                                    class="form-control" name="vi_tri" value="{{ $phong->vi_tri }}" required></div>
                        </div>
                        <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Lưu
                                chỉnh sửa</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
