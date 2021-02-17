@extends('layouts.app')
@section('content')
	<!--aquí va el contenido de la página-->
<div class="container">
    <h1>@lang('es.product.list_title')</h1>

    <a class="btn btn-main-brand float-right my-3" href="/product/create"> @lang('es.product.create_title') </a>

    <table class="table">
        <thead>
            <th scope="col">@lang('es.product.name')</th>
            <th scope="col">@lang('es.product.value')</th>
            <th scope="col">@lang('es.product.status')</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            @foreach ($products as $prod)
                <tr>
                    <td> {{ $prod -> name}}</td>
                    <td> {{ $prod -> value}}</td>
                    <td> {{ $prod -> status}}</td>
                    <td>
                        <a type="button" class="btn btn-success d-inline" data-toggle="tooltip" title="Consultar" href="/product/{{$prod -> id}}"><i class="fa fa-search"></i> </a>
                        <a type="button" class="btn btn-primary d-inline" data-toggle="tooltip" title="Editar" href="/product/{{$prod -> id}}/edit"><i class="fa fa-edit"></i> </a>
                        <!--<a type="button" class="btn btn-danger" data-toggle="tooltip" title="Borrar"><i class="fa fa-trash"></i></a>-->
                        <form class="d-inline" action="{{route('product.destroy', $prod ->id)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>

                </tr>
            @endforeach
        </tbody>
        
    </table>
</div>
@endsection
