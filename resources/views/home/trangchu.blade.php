{{-- <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HUIT - Quản lý phòng máy</title>
	<link rel="icon" type="image/x-icon" href="{{asset('img/logo.jpg')}}">
    <link rel="stylesheet" href="{{asset('css/trangchu.css')}}">
</head>
<body>
    <div>
        <a href={{Route('user_login')}}>Đăng nhập</a>
    </div>
</body> --}}

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>HUIT - Quản lý phòng máy</title>
	<link rel="icon" type="image/x-icon" href="{{asset('img/logo.jpg')}}">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{asset('css/home/css/bootstrap.min.css')}}">
    <!-- style css -->
    <link rel="stylesheet" href="{{asset('css/home/css/style.css')}}">
    <!-- Responsive-->
    <link rel="stylesheet" href="{{asset('css/home/css/responsive.css')}}">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{asset('css/home/css/jquery.mCustomScrollbar.min.css')}}">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
 </head>
 <!-- body -->
 <body class="main-layout">
    @csrf
    <!-- end loader -->
    <!-- header -->
    <header>
       <!-- header inner -->
       <div class="header">
          <div class="container">
             <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                   <div class="full">
                      <div class="center-desk">
                         <div class="logo">
                            <a href="{{route('trangchu')}}"><img src="{{asset('img/logo.jpg')}}"/></a>
                         </div>
                      </div>
                   </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                   <nav class="navigation navbar navbar-expand-md navbar-dark ">
                      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                      </button>
                      <div class="collapse navbar-collapse" id="navbarsExample04">
                         <ul class="navbar-nav mr-auto">
                           @auth
                           <li class="nav-item">
                              <a class="nav-link" href="{{route('profile.show')}}">{{ Auth::user()->name }}</a>
                           </li>
                           @endauth
                            <li class="nav-item">
                               <a class="nav-link" href="#room">Phòng Máy</a>
                            </li>
                            <li class="nav-item">
                               <a class="nav-link" href="#about">About</a>
                            </li>
                            <li class="nav-item">
                               <a class="nav-link" href="#contact">Liên hệ</a>
                            </li>
                         </ul>
                         @auth <!-- Kiểm tra nếu người dùng đã đăng nhập -->
                         <div id="logout-button">
                            <form id="logout-form" action="{{ route('dangxuat') }}" method="POST">
                                @csrf
                                <button type="submit" class="logout-btn">Đăng xuất</button>
                            </form>
                        </div>
                         @else
                            <div class="sign_btn"><a href="{{route('user_login')}}">Đăng nhập</a></div>
                         @endauth
                      </div>
                   </nav>
                </div>
             </div>
          </div>
       </div>
    </header>
    <!-- end header inner -->
    <!-- end header -->
    <!-- banner -->
    <section class="banner_main">
       <div class="container">
          <div class="row">
             <div class="col-md-12">
                <div class="text-bg">
                   <div class="padding_lert">
                      <h1>WELCOME TO HUIT - ROOMS MANAGER WEBSITE </h1>
                      <span>Hệ thống quản lý phòng máy</span>
                      <p>Đây là trang quản lý hệ thống phòng máy được thiết kế bới Nhóm 4, dựa trên đề tài thiết kế trang web Quản lý Phòng Máy cho trường Đại Học HUIT. Đồ án này được phụ trách bới Thấy Trần Văn Hùng, Khoa Công Nghệ Thông Tin, Trường Đại Học Công Nghệ Sài Gòn</p>
                      <span style="font-size: 20px">Danh sách các thành viên:</span>
                      <span style="font-size: 20px; font-family:'Times New Roman', Times, serif">DH52005938 - Nguyễn Tấn Lộc - Nhóm trưởng</span>
                      <span style="font-size: 20px; font-family:'Times New Roman', Times, serif">DH52006088 - Nguyễn Lê Minh Tài</span>
                      <span style="font-size: 20px; font-family:'Times New Roman', Times, serif">DH52007186 - Trần Như Nguyện</span>
                      <span style="font-size: 20px; font-family:'Times New Roman', Times, serif">DH52005710 - Lý Thị Ngọc Diễm</span>
                      <span style="font-size: 20px; font-family:'Times New Roman', Times, serif">DH52006207 - Huỳnh Hồng Thuyên</span>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </section>
    <!-- end banner -->
    <!-- choose  section -->
    <div id="about" class="choose">
       <div class="container">
          <div class="row">
             <div class="col-md-6">
                <div class="choose_box">
                   <div class="titlepage">
                      <h2><span class="text_norlam">Công nghệ chính mà nhóm sử dụng</span> <br>Laravel</h2>
                   </div>
                   <p>Laravel là một framework PHP mạnh mẽ và linh hoạt, được thiết kế để giúp nhà phát triển xây dựng các ứng dụng web một cách nhanh chóng và hiệu quả.<br>
                    Blade là một trong những công cụ hỗ trợ về giao diện mạnh mẽ nhất của Laravel.</p>
                   <a class="read_more" href="https://laravel.com/">See More</a>
                </div>
             </div>
             <div class="col-md-6">
                <div class="row">
                   <div class="col-md-12">
                      <div class="img_box">
                         <figure><img src="{{asset('css/home/images/images.png')}}" alt="#"/></figure>
                      </div>
                   </div>
                   <div class="col-md-6">
                      <div class="img_box">
                         <figure><img src="{{asset('css/home/images/images1.png')}}" alt="#"/></figure>
                      </div>
                   </div>
                   <div class="col-md-6">
                      <div class="img_box">
                         <figure><img src="{{asset('css/home/images/images2.png')}}" alt="#"/></figure>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
    <!-- end choose  section -->
    <!-- our  section -->
    <div id="room" class="our">
       <div class="container">
          <div class="row d_flex">
             <div class="col-md-6">
                <div class="img_box">
                   <figure><img src="{{asset('css/home/images/img4.jpg')}}" alt="#"/></figure>
                </div>
             </div>
             <div class="col-md-6">
                <div class="our_box">
                   <div class="titlepage">
                      <h2><span class="text_norlam">Bạn cần phòng máy để dạy </span> <br>Đăng ký tại đây</h2>
                   </div>
                   <p>Kiểm tra xem những phòng máy còn trống và tiến hành đăng kí</p>
                   <a class="read_more" href="{{ Auth::check() ? route('datphong') : route('user_login') }}">Đăng kí phòng</a>
                </div>
             </div>
          </div>
       </div>
    </div>
    <!-- end our  section -->
    <!-- about -->
    <div id="contact" class="about">
       <div class="container-fluid">
          <div class="row d_flex">
             <div class="col-md-6">
                <div class="about_text">
                   <div class="titlepage">
                      <h2><span class="text_norlam">Liên hệ khẩn cấp</span></h2>
                      <p style="font-size: 20px; font-family:'Times New Roman', Times, serif">Nếu có thắc mắc hay vấn đề gì tại phòng máy thì bạn có thể liên hệ các bộ phận sau: <br>
                        - Phòng kỹ thuật. Hotline: (0258) 568 1234 <br>
                        - Đội ngũ hỗ trợ khẩn cấp. Hotline: 0334455678 <br>
                        - Thằng làm ra cái website này. Hotline: 0327212193
                    </p>
                   </div>
                </div>
             </div>
             <div class="col-md-6">
                <div class="about_img">
                   <figure><img src="{{asset('css/home/images/customer-support.jpg')}}" alt="#"/></figure>
                </div>
             </div>
          </div>
       </div>
    </div>
    <!-- end about -->
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
    <!-- Javascript files-->
    <script src="{{asset('css/home/js/jquery.min.js')}}"></script>
    <script src="{{asset('css/home/js/popper.min.js')}}"></script>
    <script src="{{asset('css/home/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('css/home/js/jquery-3.0.0.min.js')}}"></script>
    <script src="{{asset('css/home/js/plugin.js')}}"></script>
    <!-- sidebar -->
    <script src="{{asset('css/home/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script src="{{asset('css/home/js/custom.js')}}"></script>
    <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
 </body>