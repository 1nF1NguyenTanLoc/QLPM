<head>
    <title>Đăng kí - HUIT - Quản lý phòng máy</title>
</head>
<body>
    <div>
        <span>{{$message ?? ''}}</span>
        <form action="" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Họ Tên"><br>
            <input type="email" name="email" placeholder="Email"><br>
            <input type="password" name="password" placeholder="Password"><br>
            <input type="password" name="confirm_password" placeholder="Password"><br>
            <button type="submit">Đăng kí</button>
        </form>
    </div>
</body>