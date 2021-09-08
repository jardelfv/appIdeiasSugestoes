@extends('Painel.Layout.index')

@section('content')

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Detalhes do Usuários</h3>
                    </div>

                    <div class="box-body table-responsive no-padding">
                        <p>Codigo: {{ $user->id }}</p>
                        <h1>{{ $user->name }}</h1>
                        <p>Criado em: {{ date('d/m/Y H:i', strtotime($user->created_at)) }}</p>
                        <p>E-mail: {{ $user->email }}</p>
                    </div>
                </div>
            </div>
        </div>

    </section>

@endsection
