<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- jqry --}}

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
        background-color: aliceblue;
        padding: 10px;
        width: 250px;
    }

    .form-serch .media {
        display: flex;
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


</body>

</html>
