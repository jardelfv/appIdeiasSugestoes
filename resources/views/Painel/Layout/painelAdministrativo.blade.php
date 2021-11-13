@extends('Painel.Layout.index')

@section('content')
<section class="content-header">
    <h2>
      Dashboard
      <small>Painel Administrativo</small>
    </h2>
  </section>
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <!-- small box - Card usuários -->
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-red">
                    <div class="inner">
                        @inject('usuarios', 'App\User')
                        <h3>{{ $usuarios->count() }}</h3>

                        <p>Usuários</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <a href="{{ route('Painel.users.listAllUsers') }}" class="small-box-footer">Administrar <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <!-- small box - Card Total de Sugestões -->
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-orange">
                    <div class="inner">
                        @inject('sugestoes', 'App\Sugestao')
                        <h3>{{ $sugestoes->count() }}</h3>

                        <p>Sugestões e ideias realizadas</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-lightbulb-o"></i>
                    </div>
                    <a href="{{ route('Painel.sugestoes.listAllSugestoes') }}" class="small-box-footer">Administrar <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <!-- small box - Card Sugestões implantadas-->
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-green">
                    <div class="inner">
                        @inject('sugestoes', 'App\Sugestao')
                        <h3>{{ $implantadas->count() }}</h3>

                        <p>Sugestões implantadas</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-child"></i>
                    </div>
                    <a href="{{ route('Painel.sugestoes.implantadas') }}" class="small-box-footer">Administrar <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <!-- small box - Card Sugestões aguardando avaliação-->
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-yellow">
                    <div class="inner">
                        @inject('sugestoes', 'App\Sugestao')
                        <h3>{{ $aguadando->count() }}</h3>

                        <p>Sugestões aguardando avaliação</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-legal"></i>
                    </div>
                    <a href="{{ route('Painel.sugestoes.avaliarSugestoes') }}" class="small-box-footer">Administrar <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            

        </div>
        <!-- /.box -->


    </section>
    <!-- /.content -->
@endsection
