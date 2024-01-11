<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-warning fixed-top">
    <!-- Container wrapper -->
    <div class="container">
        <!-- Toggle button -->
        <button data-mdb-collapse-init class="navbar-toggler" type="button" data-mdb-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Navbar brand -->
            <a class="navbar-brand mt-2 mt-lg-0" href="/">
                <img src="{{ asset('images/logo.jpg') }}" height="30" alt="MDB Logo" loading="lazy" />
            </a>
            <!-- form -->
            <form class="d-flex input-group w-25 form-serch">
                <div class="abc">
                    <input type="search" id="search" name="search "
                        class="form-control rounded-pill input-search-ajax" placeholder="Search ...."
                        aria-label="Search" aria-describedby="search-addon" />

                    <div class="search-ajax-result">

                    </div>
                </div>
            </form>
            <!-- endform -->
            <!-- Left links -->
            <ul class="navbar-nav m-auto mb-2 mb-lg-0 ">
                <li class="nav-item">
                    <a class="nav-link  fs-5 fw-bold active" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5 fw-bold a1" href="#">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5 fw-bold a1" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5 fw-bold a1" href="#">News</a>
                </li>
            </ul>
            <!-- Left links -->

            @if (!Auth::check())
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">

                        <a class="nav-link fs-5 fw-bold a1" href="{{ route('formlogin') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5  fw-bold a1" href="{{ route('formsignup') }}">Sign up</a>
                    </li>
                </ul>
            @endif
        </div>
        <!-- Collapsible wrapper -->





    </div>
    <!-- Container wrapper -->
</nav>
<!-- Navbar -->
<script>
    $('.search-ajax-result').hide();
    $('.input-search-ajax').keyup(function() {
        var _text = $(this).val();

        $.ajax({
            url: '{{ route('search_product') }}?key=' + _text,
            type: "GET",
            success(res) {
                console.log(res)
                var html = '';
                if (_text.length > 0) {
                    for (var pro of res.data) {
                        html += '<div class="media">'
                        html += '<a href="">' + pro.name + '</a>'
                        html += '<div class="media-body">' + pro.price + '</div>'
                        html += '</div>';
                        html += '<hr>'
                    }
                    $('.search-ajax-result').show();
                    $('.search-ajax-result').html(html)
                } else {
                    var html = '';
                    $('.search-ajax-result').html(html)
                    $('.search-ajax-result').hide();
                }

            }
        })

    })
</script>
