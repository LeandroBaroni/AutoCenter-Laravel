<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactFormRequest;
use App\Models\Contact;
use App\Notifications\NewContact;
use Illuminate\Support\Facades\Notification;

class ContactController extends Controller{
    public function index(){
        return view('site.contact.index');
    }

    public function form(ContactFormRequest $request){
        //Phone formact
        $fone = $request->telefone;
        if (strlen($request->telefone) === 10) {
            $fone = "(".substr($request->telefone,0,2).") ".substr($request->telefone,2,4)."-".substr($request->telefone,6,10);
        }elseif(strlen($request->telefone) === 11){
            $fone = "(".substr($request->telefone,0,2).") ".substr($request->telefone,2,5)."-".substr($request->telefone,7,11);
        }
        $request['telefone'] = $fone;

        //create data in DB
        $contact = Contact::create($request->all());
        Notification::route('mail', config('leandro.baroni@fatec.sp.gov.br'))
            ->notify(New NewContact($contact));

        toastr()->success('Contato enviado com sucesso!');
        return back();
    }
}
