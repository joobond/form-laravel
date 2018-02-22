@extends('layouts.layout')
@section('title')
    <title>LFV - {{$client->name}}</title>
@endsection
@section('content')
    <h3>Ver Cliente - <b>{{$client->name}}</b></h3>
    <br>
    <a href="{{route('clients.edit',['client'=>$client->id])}}" class="btn btn-primary">Editar</a>
    <a href="{{route('clients.destroy',['client'=>$client->id])}}" class="btn btn-danger" onclick="event.preventDefault();
            if(confirm('Deseja excluir {{$client->name}}?')){document.getElementById('form-delete').submit();}">Excluir</a>
    <form id="form-delete" style="display: none" action="{{route('clients.destroy',['client'=>$client->id])}}" method="post">
        {{csrf_field()}}
        {{method_field('DELETE')}}
    </form>
    <br><br>
    <table class="table table-bordered">
        <tbody>
        <tr>
            <th scope="row">ID</th>
            <td>{{$client->id}}</td>
        </tr>
        <tr>
            <th scope="row">Nome</th>
            <td>{{$client->name}}</td>
        </tr>
        <tr>
            <th scope="row">Documento</th>
            <td>{{$client->document_number}}</td>
        </tr>
        <tr>
            <th scope="row">E-mail</th>
            <td>{{$client->email}}</td>
        </tr>
        <tr>
            <th scope="row">Telefone</th>
            <td>{{$client->phone}}</td>
        </tr>
        @if($client->client_type=='individual')
            <tr>
                <th scope="row">Estado Civil</th>
                <td>
                    @switch($client->marital_status)
                        @case(1)
                        Solteiro
                        @break

                        @case(2)
                        Casado
                        @break

                        @case(3)
                        Divorciado
                        @break
                    @endswitch
                </td>
            </tr>
            <tr>
                <th scope="row">Data Nascimento</th>
                <td>{{$client->date_birth}}</td>
            </tr>
            <tr>
                <th scope="row">Sexo</th>
                <td>{{$client->sex == 'm' ? 'Masculino': 'Feminino'}}</td>
            </tr>
            <tr>
                <th scope="row">Deficiência Física</th>
                <td>{{$client->physical_disability == null ?'Não Possui':$client->physical_disability}}</td>
            </tr>
        @endif
        @if($client->client_type=='legal')
            <tr>
                <th scope="row">Nome Fantasia</th>
                <td>{{$client->company_name}}</td>
            </tr>
        @endif
        <tr>
            <th scope="row">Tipo de Cliente</th>
            <td>{{$client->client_type == 'individual'?'Pessoa Fisíca': 'Pessoa Jurídica'}}</td>
        </tr>
        <tr>
            <th scope="row">Inadimplente</th>
            <td>{{$client->defaulter?'Sim': 'Não'}}</td>
        </tr>
        </tbody>
    </table>
    <br>
    <a href="{{route('clients.index')}}" class="btn btn-dark">Voltar</a>
@endsection