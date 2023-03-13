@extends('Painel.Layout.index')

@section('content')
    <section class="content-header">

        <h2>
            <i class="fa fa-dashboard"></i>
            Dashboard
            <small>Painel do Usuário</small>
        </h2>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">

            <!-- small box - Card Total de Sugestões -->
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-orange">
                    <div class="inner">
                        @inject('sugestoes', 'App\Sugestao')
                        <h3>{{ $enviadas->count() }}</h3>

                        <p>Sugestões e ideias enviadas</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-lightbulb-o"></i>
                    </div>
                    <a href="{{ route('Painel.sugestoes.minhasSugestoes') }}" class="small-box-footer">Acompanhar <i
                            class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <!-- small box - Card Sugestões aprovadas-->
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-green">
                    <div class="inner">
                        @inject('sugestoes', 'App\Sugestao')
                        <h3>{{ $aprovadas->count() }}</h3>

                        <p>Sugestões aprovadas</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-child"></i>
                    </div>
                    <a href="{{ route('Painel.sugestoes.minhasSugestoes') }}" class="small-box-footer">Acompanhar <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>


        </div>
        <div class="row">
            <!-- /.box -->
            @foreach ($aprovadas as $sugestao)
                <div class="col-md-6">
                    <div class="box box-success box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title">Sugestão: [{{ $sugestao->id }}] Aprovada!</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <strong>Título:</strong>
                            <p>{{ $sugestao->titulo }}</p>
                            <strong>Descrição:</strong>
                            <p>{{ $sugestao->descricao }}</p>

                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->

            @endforeach
        </div>

    </section>
    <!-- /.content -->
@endsection
