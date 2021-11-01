@extends('Painel.Layout.index')

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        @include('Painel._caminho')
        <div class="row">
            <div class="col-xs-12">
                <h2 class="box-title"><i class="fa fa-tags"></i>Todas as Sugestões</h2>
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
                                    <td>{{ $sugestao->status }}</td>
                                    <td>{{ date('d/m/Y H:i', strtotime($sugestao->created_at)) }}</td>
                                    <td>{{ date('d/m/Y H:i', strtotime($sugestao->data_aprovacao)) }}</td>
                                    <td>{{ $sugestao->userSugestao->name }}</td>
                                    <td>
                                        <div aria-label="Botões de ação">
                                            <a class="btn btn-success" href="{{ route('Painel.sugestoes.listSugestao', ['sugestao' => $sugestao->id]) }}" data-toggle="tooltip" data-placement="top" title="Ver detalhes"><i class="fa fa-info"></i></a>
                                            <a class="btn btn-warning" href="{{ route('Painel.sugestoes.editSugestao', ['sugestao' => $sugestao->id]) }}" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fa fa-edit"></i></a>
                                            <!-- <input type="submit" value="Del" class="btn btn-danger" data-toggle="tooltip" data-target="#deleteModal" data-toggle="tooltip" data-placement="top" title="Deletar"> -->
                                            <input type="hidden" name="sugestao_id" id="sugestao_id" value="" data-id="{{ $sugestao->id }}">
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger" data-id="{{ $sugestao->id }}">
                                                Del
                                            </button>
                                        </div>

                                        <!-- Modal -->
                                            <div class="modal modal-danger fade" id="modal-danger">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title">Excluir Sugestão</h4>
                                                        </div>
                                                        <input type="hidden" name="sugestao_id" id="sugestao_id" value="">

                                                        <div class="modal-body">
                                                            <p>Sugestão {{ $sugestao->id }}</p>
                                                            <h2><strong>Atenção!</strong> Você tem certeza que deseja excluir esta sugestão?</h2>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
                                                            <form action="{{ route('Painel.sugestoes.delete', $sugestao->id) }}" method="post">
                                                                {{ method_field('delete') }}
                                                                {{ csrf_field() }}

                                                            <button type="submit" class="btn btn-outline" id="sugestao_id" >Sim Deletar</button>
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
