<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đăng Nhập</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="style/adminlte3/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="style/adminlte3/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
  <link rel="shortcut icon" href="/images/user/favicon.jpg" type="image/x-icon">
  <link rel="stylesheet" href="style/adminlte3/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page" style="background-image: url('/images/user/bg-dangnhap.jpg'); background-size: cover;">
    <div class="login-box " style="background-color:">
        <div class="login-logo">
            <a class="navbar-brand text-primary" style="font-size: 40px; font-weight: 700;" href="{{ route('login') }}">V20</a>
        </div>
        <!-- /.login-logo -->
        <div class="card" style="background-color: rgba(85, 97, 140, 0.1)" >
            <div class="card-body login-card-body " style="background-color: rgba(85, 97, 140, 0.1); border: 1px solid #CCC;">
                @include('notification')
                <h2 style="font-size: 25px;
                text-align: center;
                padding: 5px;
                color: #FFF;
                text-shadow: #000 0.1em 0.1em 0.2em;
                font-family: Tahoma, serif;
                margin: 0;
                margin-bottom: 20px;">Đăng nhập</h2>
                <form action="{{ route('check-login') }}" method="post">
                    @csrf
                    <div class="input-group mb-3" style="padding-left: 20px; padding-right: 20px;">
                        <input type="text"  class="form-control" placeholder="Tài khoản người dùng" name="userName">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3" style="padding-left: 20px; padding-right: 20px;">
                        <input type="password" class="form-control" placeholder="Mật khẩu" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary ">Đăng nhập</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="style/adminlte3/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="style/adminlte3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="style/adminlte3/dist/js/adminlte.min.js"></script>
</body>

</html>
