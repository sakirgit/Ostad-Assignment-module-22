<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Authentication </title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('dashboard-access/')}}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('dashboard-access/')}}/css/sb-admin-2.min.css" rel="stylesheet">

    <link href="{{asset('dashboard-access/')}}/css/toastify.min.css" rel="stylesheet" />
    <script src="{{asset('dashboard-access/')}}/js/toastify-js.js"></script>
    <script src="{{asset('dashboard-access/')}}/js/axios.min.js"></script>
    <script src="{{asset('dashboard-access/')}}/js/config.js"></script>
    <style>
        .bg-gradient-primary {
            background-color: #4e73df;
            background-image: linear-gradient(158deg,#9b4edf 10%,#224abe 100%);
            background-size: cover;
        }
    </style>
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">

                @yield('content')
                
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('dashboard-access/')}}/vendor/jquery/jquery.min.js"></script>
    <script src="{{asset('dashboard-access/')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('dashboard-access/')}}/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('dashboard-access/')}}/js/sb-admin-2.min.js"></script>

</body>

</html>