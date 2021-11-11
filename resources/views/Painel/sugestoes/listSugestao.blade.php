@extends('Painel.Layout.index')

@section('content')

    <section class="content">
        <!-- breadcrumbs -->
        @include('Painel._caminho')
        <div class="row">
            <div class="col-xs-12">
                    <h2>
                        <i class="fa fa fa-commenting"></i>
                        Detalhes da Sugestão
                    </h2>

                <div class="box">
                    <div class="box-header">

                        <div class="table-responsive col-sm-12 col-md-5 col-lg-5">
                            <table class="table table-striped">
                                <tbody>
                                <tr>
                                    <th>Código</th>
                                    <td>
                                        {{ $sugestao->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Autor</th>
                                    <td>
                                        {{ $sugestao->userSugestao->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Título</th>
                                    <td>
                                        {{ $sugestao->titulo }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Descrição</th>
                                    <td>
                                        {{ $sugestao->descricao }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        @if($sugestao->status == 1)
                                            <i class="glyphicon glyphicon-ok text-success" data-toggle="tooltip" ,="" data-placement="top" title="" data-original-title="Aprovado"></i>
                                            <span class="label label-primary">aprovado</span>
                                        @elseif($sugestao->status == 2)
                                            <span class="label label-danger">reprovado</span>
                                        @elseif($sugestao->status == 3)
                                            <i class="fa fa  fa-exchange"></i>
                                            em avaliação de viabilidade...
                                        @else
                                            <i class="fa fa  fa-clock-o"></i>
                                            aguardando...
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Data de criação</th>
                                    <td>
                                        <i class="fa fa  fa-calendar"></i>
                                        {{ date('d/m/Y H:i', strtotime($sugestao->created_at)) }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Data da aprovação</th>
                                    <td>
                                        @if($sugestao->data_aprovacao == null)
                                            <i class="fa fa  fa-clock-o"></i>
                                            aguardando...
                                        @else
                                            <i class="fa fa  fa-calendar-check-o "></i>
                                            {{ date('d/m/Y H:i', strtotime($sugestao->data_aprovacao)) }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Anexo</th>
                                    <td>
                                        @if($sugestao->caminho != null)
                                            <a href="{{ route('arquivo.download', $sugestao) }}"
                                               class="btn btn-success">Download</a>
                                        @else
                                            <i class="fa fa  fa-close"></i>
                                            sem anexo...
                                        @endif
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- table -->
                    </div>
                </div>
            </div>
        </div>

    </section>

@endsection
