@extends('layouts.layout')
@section('title')
    <title>LFV - Create Client</title>
@endsection
@section('content')
    <h3>Novo Cliente</h3>
    @include('form._forms_errors')
    <form method="post" action="{{route('clients.index')}}">
        @include('admin.clients._form')
        <button type="submit" class="btn btn-primary btn-lg btn-block">Criar</button>
    </form>
@endsection