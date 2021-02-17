@extends('layouts.app')
@section('content')

<section class="my-5">
        <div class="container">
            <H1 class="card-title my-3 text-center"> Formulario de Contacto</H1>
            <Div class="row">
               
                <div class="col-12 col-sd-6 col-md-6 col-lg-6">
                    <div class="card ">
                        
                        <div class="card-body">
                            <form>
                                <div class="form-group row">
                                    <label for="inputname" class="col-sm-3 col-form-label">Nombre</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="inputname">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-3 col-form-label">E-mail</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" id="inputEmail">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputtextarea">Mensaje</label>
                                    <textarea class="form-control" id="inputtextarea" rows="4"></textarea>
                                </div>
                                <button class="btn btn-main-brand  btn-block " type="submit"
                                    class="btn btn-primary">Enviar</button>
                            </form>

                        </div>
                    </div>
                </div>
                <div class="col-12 col-sd-6 col-md-6 col-lg-6 contacto">

                    <p> Déjanos tus datos con tu mensaje y muy pronto nos pondremos en contacto contigo.</p>

                    <div class="d-flex align-items-center">
                        <i class="far fa-envelope fa-2x text-main-brand">   </i> 
                        <div class=""> &nbsp Contacto@deseguridad.net</div>
                        <br>
                        
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="fab fa-2x fa-whatsapp text-main-brand"> </i>
                        <div class="">&nbsp + 57 300 519 2319</div>

                    </div>
                </div>
            </div>
    </section>

@endsection

