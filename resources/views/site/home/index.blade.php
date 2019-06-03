<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SysEMM</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <!-- Styles -->
        <style>
            .btn {
                background-color:#ff8c1a;
            }
            
            .btn:hover {
                background-color:#b35900;
            }

            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                    <a class="btn" style="color:white;" href="{{ route('admin.home') }}">Home</a>
                    <a class="btn" style="color:white;" href="{{ route('profile') }}">Meu Perfil</a>
                    @else
                        <a class="btn" style="color:white;" href="{{ route('login') }}">Login</a>
                        <!-- <a  class="btn btn-warning" href="{{ route('register') }}">Registrar</a> -->
                    @endauth
                </div>
            @endif
            <br><br>
            <div class="content">
                <div style="color:#ff8c1a;" class="title m-b-md">
                    SysEMM
                    <!-- <img src="logo.ico"/> -->
                </div>

                <div class="links">
                    <a class="btn" style="color:white;" href="https://laravel.com/docs">Documentação</a>
                    <!-- <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a> -->
                    <!-- <a class="btn btn-warning" href="https://github.com/laravel/laravel">GitHub</a> -->
                </div>
            </div>
        <br><br>
        <div class="container">
	    <div class="row justify-content-center">
		    <div class="col-6 col-md-6 col-lg-6 pb-2">
                    <!--Form with header-->

                    <form action="mail.php" method="post">
                        <div class="card rounded-0" style="border-color:#ff8c1a;">
                            <div class="card-header p-0">
                                <div class="text-white text-center py-2" style="background-color:#ff8c1a;">
                                    <h3><i class="fa fa-envelope"></i> Entre em Contato</h3>
                                    <p class="m-0">Para obter mais informações sobre o sistema</p>
                                </div>
                            </div>
                            <div class="card-body p-3">
                                <!--Body-->
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-user" style="color:#ff8c1a;"></i></div>
                                        </div>
                                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-envelope" style="color:#ff8c1a;"></i></div>
                                        </div>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="exemplo@gmail.com" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-comment" style="color:#ff8c1a;"></i></div>
                                        </div>
                                        <textarea class="form-control" placeholder="Envie a sua Mensagem" required></textarea>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <input type="submit" value="Enviar" class="btn btn-block rounded-0 py-2" style="color:white;">
                                </div>
                            </div>

                        </div>
                    </form>
                    <!--Form with header-->
                </div>
	        </div>
        </div>
        <footer class="my-1 pt-1 text-muted text-center text-small">
            <p class="mb-1">© 2019 SysEMM</p>
            <ul class="list-inline">
            <li class="list-inline-item"><a href="#" style="color:#ff8c1a;">Privacidade</a></li>
            <li class="list-inline-item"><a href="#" style="color:#ff8c1a;">Termos</a></li>
            <li class="list-inline-item"><a href="#" style="color:#ff8c1a;">Suporte</a></li>
            </ul>
        </footer>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>
