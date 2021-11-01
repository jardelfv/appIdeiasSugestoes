@extends('Painel.Layout.index')

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- breadcrumbs -->
        @include('Painel._caminho')
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="box-title">Usuários Cadastrados</h2>
                <div class="box">
                    <div class="box-header">

                        <div class="box-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control pull-right" placeholder="Pesquisar">

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
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Data Criação</th>
                                <th>E-mail</th>
                                <th>Ação</th>
                            </tr>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->created_at->diffForHumans() }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <div  aria-label="Botões de ação">
                                            <a class="btn btn-success" href="{{ route('Painel.users.listUser', ['user' => $user->id]) }}" data-toggle="tooltip" data-placement="top" title="Ver detalhes"><i class="fa fa-info"></i></a>
                                            <a class="btn btn-warning" href="{{ route('Painel.users.editUser', ['user' => $user->id]) }}" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fa fa-edit"></i></a>
                                            <input type="submit" value="Del" class="btn btn-danger" data-toggle="tooltip" data-target="#deleteModal" data-placement="top" title="Deletar">
                                        </div>

                                        <!-- Modal -->
                                        <form action="{{ route('Painel.users.destroy', ['user' => $user->id]) }}" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteModalLabel">Excluir</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h2><strong>Atenção!</strong> Você tem certeza que deseja excluir?</h2>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                            <button type="submit" class="btn btn-danger">Sim Deletar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- /Modal -->
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
