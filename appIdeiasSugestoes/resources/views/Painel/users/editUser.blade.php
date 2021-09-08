@extends('Painel.Layout.index')

@section('content')

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <h1>Editar usuário</h1>
                <form action="{{ route('Painel.users.edit', ['user' => $user->id]) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="form-group row">
                        <label class="col-sm-1 col-form-label">Nome</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="name" value="{{ $user->name }}" placeholder="Nome Completo">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-1 col-form-label">Email</label>
                        <div class="col-sm-6">
                            <input type="email" class="form-control" name="email" value="{{ $user->email }}" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-1 col-form-label">Senha</label>
                        <div class="col-sm-3">
                            <input type="password" class="form-control" name="password" value="{{ $user->password }}" placeholder="Senha">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-success" value="Editar usuário">Editar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </section>

@endsection
