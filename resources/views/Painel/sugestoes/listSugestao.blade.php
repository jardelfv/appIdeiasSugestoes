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
                        <p>
                            @if($sugestao->status == 1)
                                aprovado!
                            @elseif($sugestao->status == 2)
                                reprovado...
                            @elseif($sugestao->status == 3)
                                em avaliação de viabilidade...
                            @else
                                aguardando...
                            @endif
                        </p>
                        <p>Criado em: {{ date('d/m/Y H:i', strtotime($sugestao->created_at)) }}</p>
                        <p>
                            @if($sugestao->data_aprovacao == null)
                                ...
                            @else
                                {{ date('d/m/Y H:i', strtotime($sugestao->data_aprovacao)) }}
                            @endif
                        </p>
                        <p><strong>Anexo(os):</strong></p>
                    </div>
                </div>
            </div>
        </div>

    </section>

@endsection
