<?php

namespace App\Http\Controllers\Admin;

use App\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientsController extends Controller //ControllerResource
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients= \App\Client::all();
        return view('admin.clients.index',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $client_type = Client::getClientType($request->client_type);
        return view('admin.clients.create',['client'=> new Client(),'client_type'=>$client_type]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->_validate($request);
        $data['defaulter']= $request->has('defaulter');
        $data['client_type'] = Client::getClientType($request->client_type);
        Client::create($data);
        return redirect()->route('clients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Client $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return view('admin.clients.show',compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client) //Route Model Binding Implicito
    {
        $client_type = $client->client_type;
        return view ('admin.clients.edit',compact('client','client_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $data = $this->_validate($request);
        $data['defaulter']= $request->has('defaulter');
        $client->fill($data);
        $client->save();
        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Cliente $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('clients.index');
    }

    protected function _validate(Request $request){
        //Validando os campos do meu formulário
        $client_type = Client::getClientType($request->client_type);
        $documentNumberType = $client_type == Client::TYPE_INDIVIDUAL?'cpf':'cnpj';
        $client = $request->route('client');
        $client_id = $client instanceof Client?$client->id:null;
        $rules=[
            'name' => 'required|max:255',
            'document_number' => "required|unique:clients,document_number,$client_id|document_number:$documentNumberType",
            'email' => 'required|email',
            'phone' => 'required',
        ];
        $marital_status= implode(',',array_keys(Client::MARITAL_STATUS));
        $rulesIndividual = [
            'date_birth' => 'required|date',
            'marital_status' => "required|in:$marital_status",
            'sex' => 'required|in:m,f',
            'physical_disability' => 'max:255',
        ];
        $rulesLegal = [
            'company_name' =>'required|max:255',
        ];

        return $this->validate($request,$client_type == Client::TYPE_INDIVIDUAL ?
            $rules+$rulesIndividual:$rules+$rulesLegal);
    }
}
