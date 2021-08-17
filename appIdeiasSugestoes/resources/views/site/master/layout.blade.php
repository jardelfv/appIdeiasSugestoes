<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Jardel Vasconcelos">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Portal de ideias e sugestões</title>

    <!-- Bootstrap 4.2.1-->
    <!-- <link rel="stylesheet" href="bootstrap-4.2.1/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <style>
        .secao-destaque{
            background: url({{ asset('/img/bg-topo.png') }}) no-repeat;
            background-size: cover;
        }
        .text-footer{
            font-size: 10pt;
        }
        .img-footer {
            width: 70%;
            padding-top: 5px;
            padding-bottom: 25px;
        }

        .logo-top{
            width: 40%;
            height: 40%;
        }

    </style>
</head>

<body>
    <div class="secao-destaque  text-white text-center text-lg-left bg-success pb-5">
        <div class="fundo-top"></div>
        <div class="container-fluide">
            <header class="row pt-2 pb-2">
                <div class="col-12 col-lg-6">
                    <h1>
                        <img class="logo-top" src="{{ asset('img/logo.png') }}"
                            alt="Logo Prefeitura Municipal de Paracatu">
                    </h1>
                </div>
                <div class="col-12 col-lg-6">
                    <nav>
                        <ul class="nav justify-content-end">

                            @if (Route::has('login'))

                                    @if (Auth::check())
                                    <li class="list-item"><a href="{{ route('site.home') }}"
                                                             class="nav-link text-white">Home</a></li>
                                    <li class="list-item"><a href="{{ route('Painel.index') }}"
                                                             class="nav-link text-white">Meu Painel</a></li>
                                    @else
                                    <li class="list-item"><a href="{{ route('login') }}"
                                                             class="nav-link text-white"><strong>Login no sistema</strong></a></li>
                                    <li class="list-item"><a href="{{ route('register') }}"
                                                             class="nav-link text-white">Cadastre-se</a></li>
                                    @endif

                            @endif

                            <li class="list-item"><a href="{{ route('site.sobre') }}"
                                    class="nav-link text-white">Vantagens</a></li>

                        </ul>
                    </nav>
                </div>
            </header>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <h2 class="pt-5 pb-3">Você tem uma idéia inovadora ou uma sugestão?</h2>
                    <p class="pb-3">Para isso criamos um portal, um local para apresentar suas ideias inovadoras
                        e como elas podem agregar à nossa administração pública.
                        E você ainda ganha um prêmio/benefício caso implantada.</p>
                    <div class="grupo-botoes pb-5">
                        <a href="{{ route('register') }}" class="btn btn-success">Registrar agora</a>
                        <a href="{{ route('site.sobre') }}" class="btn btn-outline-light">Conhecer mais</a>
                    </div>
                </div>
            </div>
        </div>

    </div>


    @yield('content')

    <footer class="page-footer font-small blue pt-4" style="background-color: #008853;">

        <!-- Footer Links -->
        <div class="container-fluid text-center text-md-left text-white">

            <!-- Grid row -->
            <div class="row">

                <!-- Grid column -->
                <div class="text-footer col-md-5 mt-md-0 mt-3">

                    <!-- Content -->
                    <h5 class="text-uppercase">PREFEITURA MUNICIPAL DE PARACATU</h5>
                    <p>Rua da Contagem, 2045 - Bairro Paracatuzinho<br />CEP 38.603-400</p>
                    <p>Serviço de Informação Municipal (38) 3679-0300</p>

                </div>
                <!-- Grid column -->

                <hr class="clearfix w-100 d-md-none pb-3">

                <!-- Grid column -->
                <div class="col-md-3 mb-md-0 mb-3 align-self-center">
                    <img src='{{ asset('img/logo-verde-horizontal.png') }}' class="img-footer" />

                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->

        </div>
        <!-- Footer Links -->

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3 text-white bg-success" >
            <span>&copy; <?php echo date('Y')?> Copyright: PREFEITURA MUNICIPAL DE PARACATU | Desenvolvido por: </span>
            <a href="https://jardel.dev/"> Jardel dev</a>
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Bootstrap 4.2.1-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
    </script>
</body>

</html>
