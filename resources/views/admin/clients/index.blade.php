@extends('layouts.layout')
@section('title')
    <title>LFV - Clients</title>
@endsection
@section('content')
    <h3>Listagem de clientes</h3>
    <br>
    <a href="{{route('clients.create')}}" class="btn btn-primary">Criar novo cliente</a>
    <br><br>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">CNPJ/CPF</th>
            <th scope="col">Data Nasc.</th>
            <th scope="col">E-mail</th>
            <th scope="col">Telefone</th>
            <th scope="col">Sexo</th>
            <th scope="col">Ação</th>
        </tr>
        </thead>
        <tbody>
        @foreach($clients as $client)
            <tr>
                <td scope="row">{{ $client->id }}</td>
                <td>{{ $client->name }}</td>
                <td>{{ $client->document_number }}</td>
                <td>{{ $client->date_birth }}</td>
                <td>{{ $client->email }}</td>
                <td>{{ $client->phone }}</td>
                <td>{{ $client->sex }}</td>
                <td>
                    <a href="{{route('clients.edit',['client'=>$client->id])}}">Editar</a>
                    <a href="{{route('clients.show',['client'=>$client->id])}}">Ver</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection