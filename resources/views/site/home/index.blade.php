<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>SysEMM</title>
    <link rel="icon" href="img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('template/css/bootstrap.min.css')}}">
    <!-- animate CSS -->
    <link rel="stylesheet" href="{{asset('template/css/animate.css')}}">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="{{asset('template/css/owl.carousel.min.css')}}">
    <!-- themify CSS -->
    <link rel="stylesheet" href="{{asset('template/css/themify-icons.css')}}">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="{{asset('template/css/flaticon.css')}}">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{asset('template/css/magnific-popup.css')}}">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="{{asset('template/css/slick.css')}}">
    <!-- style CSS -->
    <link rel="stylesheet" href="{{asset('template/css/style.css')}}">
</head>

<body>
    <!--::header part start::-->
    <header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="{{ route('home') }}"> <img src="{{asset('template/img/Logo_SysEMM.jpg')}}" alt="logo"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item justify-content-end"
                            id="navbarSupportedContent">
                            <ul class="navbar-nav align-items-center">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Sobre</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Contato</a>
                                </li>
                                @if (Route::has('login'))
                                    @auth
                                    <li class="d-none d-lg-block">
                                        <a class="btn btn-warning" href="{{ route('admin.home') }}">Home</a>
                                    </li>&nbsp;&nbsp;
                                    <li class="d-none d-lg-block">
                                        <a class="btn btn-warning" href="{{ route('profile') }}">Meu Perfil</a>
                                    </li>
                                    @else
                                    <li class="d-none d-lg-block">
                                        <a class="btn btn-warning" href="{{ route('login') }}">Login</a>
                                    </li>
                                    @endauth
                                @endif
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header part end-->

    <!-- banner part start-->
    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-xl-6">
                    <div class="banner_text">
                        <div class="banner_text_iner">
                            <h4>Todo Aluno Precisa de Atenção</h4>
                            <h1>Administrar Sua Instituição de Ensino Com Qualidade</h1>
                            <p><h4>Faça já o uso desse sistema que trará mais praticidade 
                                no gerenciamento escolar de sua instituição.</h4> 
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner part start-->

    <!-- footer part start-->
    <footer class="footer-area">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-sm-6 col-md-4 col-xl-3">
                    <div class="single-footer-widget footer_1">
                    <a href="#"> <img src="{{asset('template/img/Code_Date.png')}}" alt=""></a>
                        <p>Desde de 2019 a Code Date Soluções Inteligentes proporciona 
                        aos seus clientes produtos de alta  tecnologia com foco na 
                        qualidade e segurança, contribuindo de forma significativa na vida 
                        dos seus usuários.</p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-4">
                    <div class="single-footer-widget footer_2">
                        <h4>Newsletter</h4>
                        <p>Mantenha-se atualizado com as nossas últimas novidades</p>
                        <form action="#">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder='Digite seu endereço de Email'
                                        onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Enter email address'">
                                    <div class="input-group-append">
                                        <button class="btn btn btn-warning" type="button"><i class="ti-angle-right"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="social_icon">
                            <a href="#"> <i class="ti-facebook"></i> </a>
                            <a href="#"> <i class="ti-twitter-alt"></i> </a>
                            <a href="#"> <i class="ti-instagram"></i> </a>
                            <a href="#"> <i class="ti-skype"></i> </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-md-4">
                    <div class="single-footer-widget footer_2">
                        <h4>Contate-nos</h4>
                        <div class="contact_info">
                            <p><span> Endereço :</span> Rua 40, Nº 166, Maranguape I</p>
                            <p><span> Telefone :</span> +55 81 98475-4828</p>
                            <p><span> Email : </span> sysemm@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright_part_text text-center">
                        <div class="row">
                            <div class="col-lg-12">
                                <p class="footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos os Direitos Reservados | Este template foi feito com <i class="ti-heart" aria-hidden="true"></i> pela <a href="https://colorlib.com" target="_blank">Colorlib</a> Para o sistema SysEMM
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer part end-->

    <!-- jquery plugins here-->
    <!-- jquery -->
    <script src="{{asset('template/js/jquery-1.12.1.min.js')}}"></script>
    <!-- popper js -->
    <script src="{{asset('template/js/popper.min.js')}}"></script>
    <!-- bootstrap js -->
    <script src="{{asset('template/js/bootstrap.min.js')}}"></script>
    <!-- easing js -->
    <script src="{{asset('template/js/jquery.magnific-popup.js')}}"></script>
    <!-- swiper js -->
    <script src="{{asset('template/js/swiper.min.js')}}"></script>
    <!-- swiper js -->
    <script src="{{asset('template/js/masonry.pkgd.js')}}"></script>
    <!-- particles js -->
    <script src="{{asset('template/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('template/js/jquery.nice-select.min.js')}}"></script>
    <!-- swiper js -->
    <script src="{{asset('template/js/slick.min.js')}}"></script>
    <script src="{{asset('template/js/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('template/js/waypoints.min.js')}}"></script>
    <!-- custom js -->
    <script src="{{asset('template/js/custom.js')}}"></script>
</body>

</html>