<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Zolfin - Multipurpose Agency Template</title>

    <!-- favicon -->
    <link rel="icon" href="{{asset('assets/img/favicon.png')}}" sizes="16x16" type="image/png" />

    <!-- Stylesheet Link -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />
</head>

<body class="t-bg-light-2">
    <!-- Preloader -->
    <div class="content preloader">
        <div id="inTurnFadingTextG">
            <div id="inTurnFadingTextG_1" class="inTurnFadingTextG">Z</div>
            <div id="inTurnFadingTextG_2" class="inTurnFadingTextG">O</div>
            <div id="inTurnFadingTextG_3" class="inTurnFadingTextG">L</div>
            <div id="inTurnFadingTextG_4" class="inTurnFadingTextG">F</div>
            <div id="inTurnFadingTextG_5" class="inTurnFadingTextG">I</div>
            <div id="inTurnFadingTextG_6" class="inTurnFadingTextG">N</div>
        </div>
    </div>
    <!-- Preloader -->

    <!-- Header  -->
    @include('components.common-layout')

    @yield('content')

    <!-- Back To Top -->
    <div class="back-to-top">
        <span class="back-top">
            <i class="las la-angle-up"></i>
        </span>
    </div>
    <!-- Back To Top End -->

    <!-- Footer  -->
    <footer class="footer-style-2">
        <div class="footer-top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 t-mb-30 mb-lg-0">
                        <div class="brand mx-auto mx-lg-0">
                            <a href="/" class="t-link">
                                <img src="{{asset('assets/img/logo.png')}}" alt="zolfin" class="img-fluid w-100" />
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="footer-top__nav">
                            <ul class="t-list footer-top__list">
                                <li class="footer-top__list-item">
                                    <a href="#" class="t-link footer-top__link text-uppercase sm-text">
                                        projects
                                    </a>
                                </li>
                                <li class="footer-top__list-item">
                                    <a href="#" class="t-link footer-top__link text-uppercase sm-text">
                                        awards
                                    </a>
                                </li>
                                <li class="footer-top__list-item">
                                    <a href="#" class="t-link footer-top__link text-uppercase sm-text">
                                        clients
                                    </a>
                                </li>
                                <li class="footer-top__list-item">
                                    <a href="#" class="t-link footer-top__link text-uppercase sm-text">
                                        contact
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom t-pt-30 t-pb-30 t-bg-theta">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-md-4 t-mb-15 mb-md-0 text-center text-md-left t-text-light sm-text">
                        &copy; 2020
                        <a href="#" class="t-link t-link-alpha">Zolfin</a>
                        All Rights Reserved.
                    </div>
                    <div class="col-md-4 t-mb-15 mb-md-0 text-center t-text-light sm-text">
                        Made with by
                        <a href="#" class="t-link t-link-alpha">
                            <i class="las la-heart"></i>
                        </a>
                        SoftTech-IT
                    </div>
                    <div class="col-md-4">
                        <ul class="t-list social-list justify-content-center justify-content-md-end">
                            <li class="social-list__item">
                                <a href="#" class="t-link social-icon-light social-icon-light--hover">
                                    <span class="xlg-text">
                                        <i class="lab la-facebook-f"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="social-list__item">
                                <a href="#" class="t-link social-icon-light social-icon-light--hover">
                                    <span class="xlg-text">
                                        <i class="lab la-twitter"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="social-list__item">
                                <a href="#" class="t-link social-icon-light social-icon-light--hover">
                                    <span class="xlg-text">
                                        <i class="lab la-instagram"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="social-list__item">
                                <a href="#" class="t-link social-icon-light social-icon-light--hover">
                                    <span class="xlg-text">
                                        <i class="lab la-linkedin-in"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer End -->

    <!-- jquery -->
    <script src="{{asset('assets/js/jquery.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Slick Slider  -->
    <script src="{{asset('assets/js/slick.min.js')}}"></script>
    <!-- Nice Select  -->
    <script src="{{asset('assets/js/jquery.nice-select.min.js')}}"></script>
    <!-- Owl carousel -->
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <!-- Popup  -->
    <script src="{{asset('assets/js/magnafic-popup.js')}}"></script>
    <!-- Animation on Scroll  -->
    <script src="{{asset('assets/js/sal.js')}}"></script>
    <!-- Main script -->
    <script src="{{asset('assets/js/main.js')}}"></script>
</body>

</html>