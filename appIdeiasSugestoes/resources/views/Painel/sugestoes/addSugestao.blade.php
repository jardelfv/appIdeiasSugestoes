@extends('Painel.Layout.index')

@section('content')

    <section class="content">
        <div class="row">

            <div class="col-xs-12">
                <h2>Cadastrar sugestão ou ideia</h2>
                <br>
                <form action="{{ route('Painel.sugestoes.storeSugestao') }}" method="post">
                    {{ csrf_field() }}

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
                    <div class="form-group row">
                        <label class="col-sm-1 col-form-label">Tipo</label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control" name="tipo" value="{{ $sugestao->tipo }}" placeholder="tipo">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-1 col-form-label">Status</label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control" name="status" value="{{ $sugestao->status }}" placeholder="status">
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
