<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;


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

        $email = $request->email;
        $information = Contact::all();
        
        Contact::create([
            'name'=> $request->get('name'),
            'email' => $request->get('email'),
            'message' => $request->get('email'),
      
        ]);

        Mail::to($email)->send(new mailContact($information));

        return redirect()->route('notificarcontacto')
                         ->with('success','Gracias por su registro, en breves instantes nos pondremos en contacto');
    
    }
}