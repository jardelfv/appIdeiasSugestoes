<!DOCTYPE html>
<html lang="pt-br">

@includeIf('Painel.Layout.head')

    <body class="hold-transition skin-green sidebar-mini">
        <div class="wrapper">

            @includeIf('Painel.Layout.header')
            @includeIf('Painel.Layout.sidebar_lateral')

            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Painel de Controle

                        @if (isset($urlAtual))
                        <small>{{ $urlAtual }}</small>
                           @else
                           <small>Página Principal</small>
                        @endif
                        
                    </h1>
                    <ol class="breadcrumb">
                        <a href="{{ route('site.home') }}">Página inicial</a>
                        <li><a href="{{ route('site.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>

                        @if (isset($urlAtual))
                        <li class="active">{{ $urlAtual }}</li>
                           @else
                           <li class="active">Página Principal</li>
                        @endif
                        
                        
                    </ol>
                </section>

                @yield('content')

            </div>
            @includeIf('Painel.Layout.footer')

        </div>
        <!-- ./wrapper -->
        @includeIf('Painel.Layout.javascript')

    </body>

</html>
