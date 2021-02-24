@extends('layouts.app')
@section('content')

    <div class="container">
        <H1 class="card-title my-3 text-center"> Gracias por tu Contacto</H1>

        <div class="card ">
            <h2 class="card-title p-4">Registro exitoso en breve algún representante se pondrá en contacto contigo.</h2>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b> Datos de registro: </b></li>
                    <li class="list-group-item"><b> Nombre: </b> {{ $contact->name }} </li>
                    <li class="list-group-item"><b>Email: </b> {{ $contact->email }} </li>
                    <li class="list-group-item"><b>Mensaje: </b> {{ $contact->message }} </li>
                </ul>
                <a href="/contact/create"></a>
            </div>
        </div>

    </div>

    </div>



@endsection
