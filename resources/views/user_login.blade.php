<head>
    <title>Đăng nhập - HUIT - Quản lý phòng máy</title>
</head>
<body>
    <div>
        <span>{{$message ?? ''}}</span>
        <form action="" method="POST">
            @csrf
            <input type="email" name="email" placeholder="Email"><br>
            <input type="password" name="password" placeholder="Password"><br>
            <button type="submit">Đăng nhập</button>
        </form>
    </div>
</body>