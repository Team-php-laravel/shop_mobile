<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="{{asset('')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>Shop Mobile</title>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./common/OwlCarousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="./common/OwlCarousel/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="./css/grid.css">
    <link rel="stylesheet" href="./css/main.css">
</head>
<style>
    .nav__logo-link:hover, .nav__link:hover {
        text-decoration: none;
        color: var(--green-color);
    }

    .footer__social-item {
        margin: 0 5px;
    }

    footer {
        background: black;
        color: white;
    }

    footer p, footer i {
        color: white;
    }
</style>
<body>
<!-- NAVIGATION  -->
@if (session('error'))
    <p class="desc m-0 text-danger">{{session('error')}}</p>
@endif
<nav class="nav">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="nav__logo">
            <a href="/" class="text-light nav__logo-link">
                <h1><i class="fa fa-mobile text-success" aria-hidden="true"></i> Shop Mobile</h1>
            </a>
        </div>
        <div class="nav__icon-bar">
            <i class="fa fa-bars" aria-hidden="true"></i>
        </div>
        <ul class="nav__list d-flex ">
            <li class="nav__item">
                <a href="/" class="nav__link {{ (request()->is('/')) ? 'active' : '' }}">
                    Trang chủ
                </a>
            </li>
            @foreach($cat as $item)
                <li class="nav__item">
                    <a href="/home/?cat={{$item->id}}&search={{$item->ten_loai}}"
                       class="nav__link {{ isset($_GET['cat']) && $_GET['cat'] == $item->id ? 'active' : '' }}">
                        {{$item->ten_loai}}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</nav>

<!-- HEADER  -->
<header id="home" style="background-image: url('/images/banner.jpg')"
        class="header d-flex justify-content-center align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-10 mx-auto text-center">
                <div class="header__content">
                    <h2 class="header__heading  heading-hero">
                        Welcome to shop mobile
                    </h2>
                    <p class="header__desc desc desc-white">
                        Chào mừng bạn đến với website của chúng tôi, hay thử trải nghiệm nó nhé!
                    </p>

                    <form id="search" action="/" method="GET">
                        <input name="search" style="height: 40px;font-size: 15px;" type="text" placeholder="Tìm kiếm"
                               class="form-control" value="{{isset($_GET['search']) ? $_GET['search']: ''}}">
                        <a onclick="document.getElementById('search').submit()"
                           class="text-light header__get button button-green">
                            Tìm kiếm <i class="fa fa-arrow-right" aria-hidden="true"></i>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
<main>
    <!-- SECTION BRAND  -->
    <section class="brand py-2 mt-2">
        <div class="container">
            <div class="row border-bottom border-top">
                @foreach($cat as $item)
                    <div class="col-12 col-sm-4 col-lg-2 border-left border-right">
                        <div class="brand__item text-center">
                            <a href="/?cat={{$item->id}}&search={{$item->ten_loai}}"
                               class="d-block">
                                <img src="/uploads/cat/{{$item->hinh_anh}}" alt="ảnh"
                                     class="brand__img img-fluid">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @yield('content')
</main>
<!-- FOOTER  -->
<footer class="footer p-0">
    <div class="copyright m-0">
        <p><i class="fas fa-map-marker-alt"></i> Số 100, Đường Nguyễn Văn Cừ, Phường Hưng Phúc, TP.Vinh </p>
        <p><i class="fas fa-phone-volume"></i> 0383979797</p>
        <div class="footer__item m-0">
            <div class="footer__item-head">
                <ul class="footer__list-social d-flex justify-content-around">
                    <li class="footer__social-item">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                    </li>
                    <li class="footer__social-item">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                    </li>
                    <li class="footer__social-item">
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                    </li>
                    <li class="footer__social-item">
                        <i class="fa fa-linkedin" aria-hidden="true"></i>
                    </li>
                    <li class="footer__social-item">
                        <i class="fa fa-youtube" aria-hidden="true"></i>
                    </li>
                </ul>
            </div>
        </div>
        <p class="m-0">Copyright © 2020</p>
    </div>
</footer>

<script src="./common/jquery-3.4.1.min.js"></script>
<script src="./bootstrap/js/bootstrap.min.js"></script>
<script src="./bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/2db88d342f.js" crossorigin="anonymous"></script>
<script src="./common/OwlCarousel/dist/owl.carousel.min.js"></script>
<script src="./js/main.js"></script>
<script>
    $(document).ready(function () {
        $('#in').click(function () {
            $('#sign-in').show();
            $('#sign-new').hide();
        });
        $('#up').click(function () {
            $('#sign-in').hide();
            $('#sign-new').show();
        })
    });
</script>
</body>

</html>