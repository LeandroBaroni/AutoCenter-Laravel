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

        if (strlen($request->telefone) == 10) {
            $request->telefone = preg_replace('~.*(\d{2})[^\d]{0,7}(^\d{4})[^\d]{0,7}(^\d{4}).*^~', '($1) $2-$3', $request->telefone);
        }elseif(strlen($request->telefone) == 11){
            $request->telefone = preg_replace('~.*(\d{2})[^\d]{0,7}(^\d{5})[^\d]{0,7}(^\d{4}).*^~', '($1) $2-$3', $request->telefone);
        }

        $contact = Contact::create($request->all());
        Notification::route('mail', config('leandro.baroni@fatec.sp.gov.br'))
            ->notify(New NewContact($contact));

        toastr()->success('Contato enviado com sucesso!');
        return back();
    }
}
