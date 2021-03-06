@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <H1 class="card-header">@lang('es.global.Dashboard_title')</h1>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @include('contact.listcontacts')
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
