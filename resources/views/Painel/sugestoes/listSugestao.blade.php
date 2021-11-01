@extends('Painel.Layout.index')

@section('content')

    <section class="content">
        <!-- breadcrumbs -->
        @include('Painel._caminho')
        <div class="row">
            <div class="col-xs-12">
                <h2>Detalhes da Sugestão</h2>
                <div class="box">
                    <div class="box-header">

                    </div>
                    
                    <div class="box-body table-responsive no-padding">
                        <p>Codigo: {{ $sugestao->id }}</p>
                        <p><strong>Autor: {{ $sugestao->userSugestao->name }}</strong></p>
                        <p>Título: {{ $sugestao->titulo }}</p>
                        <p>Descrição: {{ $sugestao->descricao }}</p>
                        <p>Tipo: {{ $sugestao->tipo }}</p>
                        <p>Status: {{ $sugestao->status }}</p>
                        <p>Criado em: {{ date('d/m/Y H:i', strtotime($sugestao->created_at)) }}</p>
                        <p>Aprovado em: {{ date('d/m/Y H:i', strtotime($sugestao->data_aprovacao)) }}</p>
                        <p><strong>Anexo(os):</strong></p>
                    </div>
                </div>
            </div>
        </div>

    </section>

@endsection
