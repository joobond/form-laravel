@extends('layouts.layout')
@section('title')
    <title>LFV - Create Client ({{$client_type==\App\Client::TYPE_INDIVIDUAL?'Pessoa Física':'Pessoa Jurídica'}})</title>
@endsection
@section('content')
    <h3>Novo Cliente</h3>
    <h4 style="color:#117a8b"><i>{{$client_type == \App\Client::TYPE_INDIVIDUAL?'Pessoa Fisíca':'Pessoa Jurídica'}}</i></h4>
    <a href="{{route('clients.create',['client_type'=>\App\Client::TYPE_INDIVIDUAL])}}" class="btn btn-primary">Pessoa Fisíca</a>
    <a href="{{route('clients.create',['client_type'=>\App\Client::TYPE_LEGAL])}}" class="btn btn-info">Pessoa Jurídica</a>
    @include('form._forms_errors')
    <form method="post" action="{{route('clients.index')}}">
        @include('admin.clients._form')
        <button type="submit" class="btn btn-primary btn-lg btn-block">Criar</button>
    </form>
@endsection