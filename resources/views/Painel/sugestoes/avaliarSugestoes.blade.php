@extends('Painel.Layout.index')

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        @include('Painel._caminho')
        <div class="row">
            <div class="col-xs-12">
                <h2 class="box-title"><i class="fa fa-legal"></i> Avaliar Sugestões</h2>
                <div class="box">
                    <div class="box-header">
                        <div class="box-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>Cód</th>
                                <th>Título</th>
                                <th>Descrição</th>
                                <th>Tipo</th>
                                <th>Status</th>
                                <th>Data Criação</th>
                                <th>Data Aprovação</th>
                                <th>Servidor</th>
                                <th>Ação</th>
                            </tr>
                            @foreach ($sugestoes as $sugestao)
                                <tr>
                                    <td>{{ $sugestao->id }}</td>
                                    <td>{{ $sugestao->titulo}}</td>
                                    <td>{{ $sugestao->descricao}}</td>
                                    <td>{{ $sugestao->tipo }}</td>
                                    <td>
                                        @if($sugestao->status == 1)
                                            aprovado!
                                        @elseif($sugestao->status == 2)
                                            reprovado...
                                        @elseif($sugestao->status == 3)
                                            em avaliação de viabilidade...
                                        @else
                                            aguardando...
                                        @endif
                                    </td>
                                    <td>{{ date('d/m/Y H:i', strtotime($sugestao->created_at)) }}</td>
                                    <td>
                                        @if($sugestao->data_aprovacao == null)
                                            ...
                                        @else
                                            {{ date('d/m/Y H:i', strtotime($sugestao->data_aprovacao)) }}
                                        @endif
                                    </td>
                                    <td>{{ $sugestao->userSugestao->name }}</td>
                                    <td>

                                            <input type="hidden" name="sugestao_id" id="sugestao_id" value="" data-id="{{ $sugestao->id }}">
                                            <button type="button" class="btn btn-success fa fa-thumbs-o-up" data-toggle="modal" data-target="#modal-danger" data-id="{{ $sugestao->id }}">
                                                Aprovar
                                            </button>

                                        <a class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Rejeitar"><i class="fa fa-thumbs-o-down"></i></a>

                                        <!-- Modal -->
                                        <div class="modal modal-danger fade" id="modal-danger">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title">Aprovar Sugestão</h4>
                                                    </div>
                                                    <input type="hidden" name="sugestao_id" id="sugestao_id" value="">
                                                    <input type="text" name="sugestao_id" id="sugestao_id" value="" data-id="{{ $sugestao->id }}">
                                                    <div class="modal-body">
                                                        <p>Sugestão </p>
                                                        <h2><strong>Atenção!</strong> Você tem certeza que deseja aprovar esta sugestão?</h2>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
                                                        <form action="{{ route('sugestao.aprovar', ['id' => $sugestao->id]) }}" method="post">
                                                            {{ csrf_field() }}
                                                            {{ method_field('PUT') }}
                                                            <input type="hidden" name="id" id="sugestao_id" value="">
                                                            <button type="submit" class="btn btn-outline" id="sugestao_id" >Sim aprovar</button>
                                                        </form>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>

                                        <!-- /.modal -->
                                    </td>
                                </tr>
                            @endforeach

                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>


        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
