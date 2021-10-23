@extends('Painel.Layout.index')

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">

            <div class="col-xs-12">
                <h2 class="box-title"><i class="fa  fa-child"></i>Sugestões Implantadas</h2>
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
                                @can('minhas-sugestoes', $sugestao)
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

                                        </div>

                                    </td>
                                </tr>
                                @endcan
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
