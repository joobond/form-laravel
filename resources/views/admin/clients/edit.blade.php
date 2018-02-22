@extends('layouts.layout')
@section('title')
    <title>LFV - Edit Client - {{$client->name}}</title>
@endsection
@section('content')
    <h3>Editar Cliente</h3>
    <a href="{{\Illuminate\Support\Facades\URL::previous() }}" class="btn btn-dark">Voltar</a>
    @include('form._forms_errors')
    <form method="post" action="{{route('clients.update',['client'=>$client->id])}}">
        {{method_field('PUT')}}
        @include('admin.clients._form')
        <button type="submit" class="btn btn-success btn-lg btn-block">Salvar</button>
    </form>
@endsection