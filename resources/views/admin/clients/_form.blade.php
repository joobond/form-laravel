{{csrf_field()}}
<input type="hidden" name="client_type" value="{{$client_type}}">
<div class="form-group">
    <label for="name">Nome</label>
    <input class="form-control" id="name" name="name" value="{{old('name',$client->name)}}">
</div>

<div class="form-group">
    <label for="document_number">Documento</label>
    <input class="form-control" id="document_number" name="document_number" value="{{old('document_number',$client->document_number)}}">
</div>

<div class="form-group">
    <label for="email">E-mail</label>
    <input type="email" class="form-control" id="email" name="email" value="{{old('email',$client->email)}}">
</div>

<div class="form-group">
    <label for="phone">Telefone</label>
    <input class="form-control" id="phone" name="phone" value="{{old('phone',$client->phone)}}">
</div>
@if($client_type==\App\Client::TYPE_INDIVIDUAL)
    @php
        $marital_status= $client->marital_status;
    @endphp
    <div class="form-group">
        <label for="marital_status">Estado Civil</label>
        <select class="form-control" name="marital_status" id="marital_status" value="{{old('marital_status',$client->marital_status)}}">
            <option value="">Selecione o estado civil</option>
            <option value="1" {{old('marital_status',$marital_status) == 1?'selected="selected"':''}}>Solteiro</option>
            <option value="2" {{old('marital_status',$marital_status) == 2?'selected="selected"':''}}>Casado</option>
            <option value="3" {{old('marital_status',$marital_status) == 3?'selected="selected"':''}}>Divorciado</option>
        </select>
    </div>

    <div class="form-group">
        <label for="date_birth">Data de Nascimento</label>
        <input type="date" class="form-control" id="date_birth" name="date_birth" value="{{old('date_birth',$client->date_birth)}}">
    </div>
    @php
        $sex= $client->sex;
    @endphp
    <div clas="row">
        <label>Sexo</label>
        <div class="form-check">
            <input type="radio" class="form-check-input" name="sex" value="m" {{old('sex',$sex) == 'm'?'checked="checked"':''}}>
            <label name="sex" class="form-check-label"><i>Masculino</i></label>
        </div>
        <div class="form-check">
            <input type="radio" class="form-check-input" name="sex" value="f" {{old('sex',$sex) == 'f'?'checked="checked"':''}}>
            <label name="sex" class="form-check-label"><i>Feminino</i></label>
        </div>
    </div>
    <br>
    <div class="form-group">
        <label for="physical_disability">Deficiência Fisíca</label>
        <input class="form-control" id="physical_disability" name="physical_disability" value="{{old('pyshical_disability',$client->physical_disability)}}">
    </div>
@else
    <div class="form-group">
        <label for="company_name">Nome Fantasia</label>
        <input class="form-control" id="company_name" name="company_name" value="{{old('company_name',$client->company_name)}}">
    </div>
@endif
<div class="form-check">
    <input id="defaulter" type="checkbox" class="form-check-input" name="defaulter" {{old('defaulter',$client->defaulter)?'checked="checked"':''}}>
    <label class="form-check-label"><i>Inadimplente?</i></label>
</div>
<br>