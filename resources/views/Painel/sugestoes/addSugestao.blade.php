@extends('Painel.Layout.index')

@section('content')

    <section class="content">
        <!-- breadcrumbs -->
        @include('Painel._caminho')
        <div class="row">
            <div class="col-xs-12">
                <h2><i class="fa fa-lightbulb-o"></i> Cadastrar sugestão ou ideia</h2>
                <br>
                <form action="{{ route('Painel.sugestoes.storeSugestao') }}" method="post">
                    {{ csrf_field() }}
                    <!-- <input type="text" class="form-control" name="titulo" value="" placeholder="Título da sua ideia ou sugestão"> -->
                    <div class="form-group row">
                        <label class="col-sm-1 col-form-label">Título</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="titulo" value="{{ $sugestao->titulo }}" placeholder="Título da sua ideia ou sugestão">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-1 col-form-label">Descrição</label>
                        <div class="col-sm-6">
                            <textarea class="form-control" name="descricao" value="{{ $sugestao->descricao }}" placeholder="Descrição"></textarea>
                        </div>
                    </div>


                    <label class="btn btn-default">
                        Anexar apresentação <input type="file" hidden>
                    </label>

                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-success">Cadastrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </section>

@endsection
