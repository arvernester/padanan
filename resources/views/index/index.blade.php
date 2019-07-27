<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>{{ $title ?? config('app.name') }}</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    @stack('metadata')

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- FontAwesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.8.2/js/all.js" integrity="sha384-DJ25uNYET2XCl5ZF++U8eNxPWqcKohUUBUpKGlNLMchM7q4Wjg2CUpjHLaL8yYPH" crossorigin="anonymous"></script>

    <!-- Global CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/elegant_font/css/style.css') }}">

    <!-- Theme CSS -->
    <link id="theme-style" rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">

    @stack('css')

</head>

<body class="landing-page">

<!-- GITHUB BUTTON JS -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

<!--FACEBOOK LIKE BUTTON JAVASCRIPT SDK-->
<div id="fb-root"></div>
<script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>

<div class="page-wrapper">

    <!-- ******Header****** -->
    <header class="header text-center">
        <div class="container">
            <div class="branding">
                <h1 class="logo">
                    <span aria-hidden="true" class="icon_documents_alt icon"></span>
                    <span class="text-highlight">{{ config('app.name') }}</span><span class="text-bold">ID</span>
                </h1>
            </div><!--//branding-->
            <div class="tagline">
                <p>{{ $title }}</p>
            </div><!--//tagline-->

            <div class="main-search-box pt-3 pb-4 d-inline-block">
                <form class="form-inline search-form justify-content-center" action="{{ route('word.search') }}" method="get">
                    <input type="text" placeholder="@lang('Kata dalam bahasa asing atau Indonesia...')" name="katakunci" class="form-control search-input" autocomplete="off">
                    <button type="submit" class="btn search-btn" value="Search"><i class="fas fa-search"></i></button>
                </form>
            </div>

{{--            <div class="social-container">--}}
{{--                <!-- Replace with your Github Button -->--}}
{{--                <div class="github-btn mb-2">--}}
{{--                    <a class="github-button" href="https://github.com/xriley/PrettyDocs-Theme" data-size="large" aria-label="Star xriley/PrettyDocs-Theme on GitHub">Star</a>--}}
{{--                    <a class="github-button" href="https://github.com/xriley" data-size="large" aria-label="Follow @xriley on GitHub">Follow @xriley</a>--}}
{{--                </div>--}}
{{--                <!-- Replace with your Twitter Button -->--}}
{{--                <div class="twitter-tweet">--}}
{{--                    <a href="https://twitter.com/share" class="twitter-share-button" data-text="PrettyDocs - A FREE #Bootstrap theme for project documentations #Responsive" data-via="3rdwave_themes">Tweet</a>--}}
{{--                    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>--}}
{{--                </div><!--//tweet-->--}}
{{--                <!-- Replace with your Facebook Button -->--}}
{{--                <div class="fb-like" data-href="https://themes.3rdwavemedia.com" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>--}}
{{--            </div><!--//social-container-->--}}


        </div><!--//container-->
    </header><!--//header-->

    <section class="cards-section text-center">
        <div class="container">
            <h2 class="title">@lang('Cari kata dalam berbagai kategori!')</h2>
            <div class="intro">
              <p>Mulai dengan mencari istilah asing maupun istilah dalam bahasa Indonesia. Kata yang sama bisa memiliki padanan yang berbeda untuk kategori yang berbeda.</p>
                <div class="cta-container">
{{--                    <a class="btn btn-primary btn-cta" href="{{ route('category.index') }}" target="_blank"><i class="fas fa-cloud-download-alt"></i>@lang('Lihat semua')</a>--}}
                </div><!--//cta-container-->
            </div><!--//intro-->
            <div id="cards-wrapper" class="cards-wrapper row">
                @each('index.category', $categories, 'category')
            </div><!--//cards-->

        </div><!--//container-->
    </section><!--//cards-section-->
</div><!--//page-wrapper-->

<footer class="footer text-center">
    <div class="container">
        <!--/* This template is released under the Creative Commons Attribution 3.0 License. Please keep the attribution link below when using for your own project. Thank you for your support. :) If you'd like to use the template without the attribution, you can buy the commercial license via our website: themes.3rdwavemedia.com */-->
        <small class="copyright">Designed with <i class="fas fa-heart"></i> by <a href="https://themes.3rdwavemedia.com/" target="_blank">Xiaoying Riley</a> for developers</small>

    </div><!--//container-->
</footer><!--//footer-->


<!-- Main Javascript -->
<script type="text/javascript" src="{{ asset('assets/plugins/jquery-3.3.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/stickyfill/dist/stickyfill.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/main.js') }}"></script>

@stack('js')

</body>
</html>

