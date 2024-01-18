<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="//bizweb.dktcdn.net/100/416/540/themes/839121/assets/favicon.png?1704726166101"
        type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- toast --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
    #imageListContainer img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        /* Đảm bảo ảnh không bị méo hoặc căng */
        margin-right: 5px;
        /* Khoảng cách giữa các ảnh */
    }

    .form-serch .abc {
        width: 250px;
        position: relative;
    }

    .form-serch .search-ajax-result {
        position: absolute;
        background-color: rgb(225, 225, 225);
        padding: 10px;
        width: 350px;
        border-radius: 5px;

    }

    .form-serch .search-ajax-result img {
        height: 50px;
        width: 50px;
        margin-right: 3px
    }

    .form-serch .media {
        display: flex;
    }

    .custom-toast {
        margin-top: 5rem;
    }

    /* order */
    .card-stepper {
        z-index: 0
    }

    #progressbar-2 {
        color: #455A64;
    }

    #progressbar-2 li {
        list-style-type: none;
        font-size: 13px;
        width: 33.33%;
        float: left;
        position: relative;
    }

    #progressbar-2 #step1:before {
        content: '\f058';
        font-family: "Font Awesome 5 Free";
        color: #fff;
        width: 37px;
        margin-left: 0px;
        padding-left: 0px;
    }

    #progressbar-2 #step2:before {
        content: '\f058';
        font-family: "Font Awesome 5 Free";
        color: #fff;
        width: 37px;
    }

    #progressbar-2 #step3:before {
        content: '\f058';
        font-family: "Font Awesome 5 Free";
        color: #fff;
        width: 37px;
        margin-right: 0;
        text-align: center;
    }

    #progressbar-2 #step4:before {
        content: '\f058';
        font-family: "Font Awesome 5 Free";
        color: #fff;
        width: 37px;
        margin-right: 0;
        text-align: center;
    }

    #progressbar-2 li:before {
        line-height: 37px;
        display: block;
        font-size: 12px;
        background: #c5cae9;
        border-radius: 50%;
    }

    #progressbar-2 li:after {
        content: '';
        width: 100%;
        height: 10px;
        background: #c5cae9;
        position: absolute;
        left: 0%;
        right: 0%;
        top: 15px;
        z-index: -1;
    }

    #progressbar-2 li:nth-child(1):after {
        left: 1%;
        width: 100%
    }

    #progressbar-2 li:nth-child(1):after {
        left: 1%;
        width: 100%;
    }

    #progressbar-2 li:nth-child(4):after {
        left: 1%;
        width: 100%;
        background: #c5cae9 !important;
    }

    #progressbar-2 li:nth-child(4) {
        left: 0;
        width: 37px;
    }

    #progressbar-2 li:nth-child(4):after {
        left: 0;
        width: 0;
    }

    #progressbar-2 li.active:before,
    #progressbar-2 li.active:after {
        background: #6520ff;
    }
</style>


<body>
    {{-- header --}}
    @include('header')
    {{-- endheader --}}


    <main class="py-4">
        @yield('content')
    </main>


    {{-- footer --}}
    @include('footer')
    {{-- endfoter --}}
    <!-- MDB -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.umd.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    {{-- toast --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    @if (Session::has('success'))
        <script>
            toastr.options = {
                "progressBar": true,
                "closeButton": true,
                "positionClass": "toast-top-right custom-toast",
            }
            toastr.success("{{ session('success') }}", {
                timeOut: 120000
            })
        </script>
    @endif

    @if (Session::has('message'))
        <script>
            toastr.options = {
                "progressBar": true,
                "closeButton": true,
                "positionClass": "toast-top-right custom-toast",
            }
            toastr.error("{{ session('message') }}", {
                timeOut: 120000
            })
        </script>
    @endif
</body>

</html>
