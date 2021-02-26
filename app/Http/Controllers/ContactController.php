<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\mailContact;


class ContactController extends Controller
{
    public function contactar (Contact $contact)
    {
        return view ('contact.contactar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'message' => ['required', 'string']
        ]);
        /*
        $email = $request->email;
        $information = "Gracias por su registro, en breves instantes nos pondremos en contacto";
        
        Contact::create([
            'name'=> $request->get('name'),
            'email' => $request->get('email'),
            'message' => $request->get('message'),
      
        ]);

        Mail::to('aleguizamo@gmail.com')->send(new mailContact($information));*/
        
        $contact =new Contact;
        $contact->name =$request->name;
        $contact->email =$request->email;
        $contact->message =$request->message;
        $contact->save();
        
        Mail::send('contact/notification',['contact'=>$contact], function($information) use ($contact){
            $information->from('tisstore.contact@gmail.com', 'Notificaciones');
            $information->to('tisstore.contact@gmail.com');
            $information->subject('Mensaje enviado de ' .$contact->name);
        });
        Mail::send('contact/notificationclient',['contact'=>$contact], function($information) use ($contact){
            $information->from('tisstore.contact@gmail.com', 'Contacto Tis Store');
            $information->to($contact->email);
            $information->subject('Mensaje enviado de TIS STORE');
        });
        
        /*$contact = Contact::all();
        return view('contact.contactar', compact('contact'));*/

        $request->session()->flash('success', 'Mensaje enviado Correctamente');
        return redirect()->back();

                         
    
    }

    
}