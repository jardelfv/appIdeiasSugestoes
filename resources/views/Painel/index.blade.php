@extends('Painel.Layout.index')

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
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

                <div class="small-box bg-orange">
                    <div class="inner">
                        @inject('sugestoes', 'App\Sugestao')
                        <h3>{{ $sugestoes->count() }}</h3>

                        <p>Sugestões e ideias</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <a href="{{ route('Painel.sugestoes.listAllSugestoes') }}" class="small-box-footer">Administrar <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
