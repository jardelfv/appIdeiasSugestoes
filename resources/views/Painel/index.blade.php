@extends('Painel.Layout.painelAdministrativo')

@if(Auth::user()->tipo == 'admin')
    
    @section('content')
        @includeIf('Painel.Layout.painelAdministrativo')
    @endsection

@endif

@if(Auth::user()->tipo == 'comum')
    
    @section('content')
        @includeIf('Painel.Layout.painelDoUsuario')
    @endsection

@endif