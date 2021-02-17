@extends('layouts.app')
@section('content')
	<!--aquí va el contenido de la página-->
    
    <div class="container ">
        <div class="card">
            <div class="row">
                <div class="col-md-5 center-text">
                    <img src="#" alt="">
                </div>
                <div class="col-md-7">
                    <div class="card-body">
                    <h4 class="card-title"><b>@lang('es.category.name'): </b> {{ $category->name }}</h4>
                </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection