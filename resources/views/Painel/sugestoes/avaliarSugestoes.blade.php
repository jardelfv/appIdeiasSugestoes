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
                                    <td>{{ $sugestao->status }}</td>
                                    <td>{{ date('d/m/Y H:i', strtotime($sugestao->created_at)) }}</td>
                                    <td>{{ date('d/m/Y H:i', strtotime($sugestao->data_aprovacao)) }}</td>
                                    <td>{{ $sugestao->userSugestao->name }}</td>
                                    <td>
                                        <a class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Aprovar"><i class="fa fa-thumbs-o-up"></i></a>
                                        <a class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Rejeitar"><i class="fa fa-thumbs-o-down"></i></a>
                                        <!-- <input type="submit" value="Rejeitar" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Rejeitar"> -->
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
