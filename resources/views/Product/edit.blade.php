@extends('layouts.app')
@section('content')
<!--aquí va el contenido de la página-->
<div class="container">
    <h1>@lang('es.product.edit_title')</h1>
    <form method="Post" class="needs-validation" action="/product/{{ $product -> id }}" enctype="multipart/form-data" novalidate>
        {{csrf_field()}}
        @csrf
        @method('put')
        <div class="form-row my-3"> 
            <div class="col-md-8">
                <label class="form-label">@lang('es.product.image')</label>
                <div class="custom-file">
                    <input type="file" id="image" name="image" class="custom-file-input" value="{{ $product -> image }}" >
                    <label class="custom-file-label" for="image" data-browse="Seleccionar">{{ $product -> image }}</label>
                </div>
            </div>
                
            <div class="col-md-4 text-center">
                <img class="" src="{{url(Storage::url($product->image))}}" alt="..." width="150">
            </div>
        </div>
        <div class="form-row my-3">
            <div class="col-md-4">
                <label class="form-label">@lang('es.product.name')</label>
                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror "
                    value="{{ $product -> name }}"/>
                @error('name')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-4">
                <label class="form-label">@lang('es.product.value')</label>
                <input type="text" id="value" name="value" class="form-control @error('value') is-invalid @enderror "
                    value="{{ $product -> value }}"/>
                @error('value')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4">
                <label class="form-label">@lang('es.product.category_id')</label>
                <select id="category_id" name="category_id" class="form-control" value="{{ $product -> category_id }}">
                    <option value="">Seleccione una categoria...</option>
                    <option value="2">Servicios</option>
                    <option value="3">BIO-TIS-3</option>
                </select>
            </div>
        </div>
        <div class="form-row my-3">
            <div class="col-md-4">
                <label class="form-label">@lang('es.product.status')</label>
                <select id="status" name="status" class="form-control" value="{{ $product -> status }}">
                    <option value="Activo">Activo</option>
                    <option value="Inactivo">Inactivo</option>
                </select>
            </div>
            <div class="col-md-4">
                <label class="form-label">@lang('es.product.brand')</label>
                <input type="text" id="brand" name="brand" class="form-control @error('brand') is-invalid @enderror "
                    value="{{ $product -> brand }}" />
                @error('brand')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4">
                <label class="form-label">@lang('es.product.type')</label>
                <select id="type" name="type" class="form-control" value="{{ $product -> type }}">
                    <option value="Físico">Físico</option>
                    <option value="Digital">Digital</option>
                </select>
            </div>
        </div>
        <div class="form-row my-3">
            <div class="col-md-12">
                <label class="form-label">@lang('es.product.description')</label>
                <textarea id="description" name="description"class="form-control @error('description') is-invalid @enderror ">
                    {{ $product -> description }}
                </textarea>
                @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

        </div>
        <div class="m-3 d-flex justify-content-center">
            <button class="mx-4 btn btn-main-brand">Guardar</button>
            <a class="mx-4 btn btn-secondary" href="/product">Volver</a>
        </div>
    </form>
        @endsection