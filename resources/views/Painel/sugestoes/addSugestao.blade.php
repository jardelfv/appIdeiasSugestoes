@extends('Painel.Layout.index')

@section('content')

    <section class="content">
        <!-- breadcrumbs -->
        @include('Painel._caminho')
        <div class="row">
            <div class="col-xs-12">
                <h2><i class="fa fa-lightbulb-o"></i> Cadastrar sugestão ou ideia</h2>
                <br>
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $errors)
                                <li>{{ $errors }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif()

                <form action="{{ route('sugestoes.store') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="user" value="{{ Auth::user()->id }}">
                    <div class="form-group row">
                        <label class="col-sm-1 col-form-label">Título</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="titulo" id="titulo" value="{{ old('titulo') }}" placeholder="Título da sua ideia ou sugestão">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-1 col-form-label">Descrição</label>
                        <div class="col-sm-6">
                            <textarea cols="5" rows="10" class="form-control" name="descricao" id="descricao" value="{{ old('descricao') }}" placeholder="Descrição"></textarea>
                        </div>
                    </div>


                    <label class="btn btn-default">
                        Anexar apresentação <input type="file" name="arquivo">
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
