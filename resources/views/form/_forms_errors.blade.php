@if($errors->any())
    <h3 style="color: red">Erros</h3>
    <ul class="alert alert-danger" role="alert">
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif