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
        $contact = Contact::create($request->all());
        Notification::route('mail', config('leandro.baroni@fatec.sp.gov.br'))
            ->notify(New NewContact($contact));

        toastr()->success('Contato enviado com sucesso!');
        return back();
    }
}
