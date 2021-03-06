@extends('layouts.master')
@section('page_header')
    <h1 class="page-title">
        <i class="fa fa-id-card-o" aria-hidden="true"></i>
        ┬íCompleta tu registro!
    </h1>
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <form action="/registro" method="post" id="formRegistro" name="formRegistro">
                    <div class="col-md-12">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all('<li>:message</li>') as $message)
                                        {!! $message !!}
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    @csrf
                    <div class="modal-body">
                        @if ($message = Session::get('ErrorInsert'))
                            <div class="col-12 alert-danger alert-dissmissable fade show" role="alert">
                                <h5>Errores:</h5>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="tipoDoc">Nombre</label>
                                <br>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Pepito"
                                    value="{{ old('nombre') }}">
                            </div>
                            <div class="col-sm-6">
                                <label for="tipoDoc">Apellido</label>
                                <br>
                                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="P├ęrez"
                                    value="{{ old('apellido') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="tipoDoc">Pa├şs</label>
                                <br>
                                <select class="pais form-control" name="pais" id="pais">
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="tipoDoc">Departamento</label>
                                <br>
                                <select class="departamento form-control" name="departamento"></select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="tipoDoc">Ciudad</label>
                                <br>{{-- 
                                <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="Bogot├í"
                                    value="{{ old('ciudad') }}"> --}}
                                    <select class="ciudad form-control" name="ciudad"></select>
                            </div>
                            <div class="col-sm-6">
                                <label for="tipoDoc">Tipo de documento de identificaci├│n</label>
                                <br>
                                <select class="tipoDNI col-md-12" name="tipo_documento" id="tipo_documento"
                                    value="{{ old('tipo_documento') }}">
                                    <option value="cc">CC</option>
                                    <option value="ti">TI</option>
                                    <option value="tp">TP</option>
                                    <option value="ce">CE</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="numIdent">N├║mero de identificaci├│n</label>
                                <br>
                                <input type="text" class="form-control" id="numero_identificacion"
                                    name="numero_identificacion" placeholder="1121962355"
                                    value="{{ old('numero_identificacion') }}">
                            </div>
                            <div class="col-sm-6">
                                <label for="numCelular">N├║mero de Celular</label>
                                <br>
                                <input type="text" class="form-control" id="telefono" name="telefono"
                                    placeholder="3123254607" value="{{ old('telefono') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="nombreArtistico">Nombre Art├şstico</label>
                                <br>
                                <input type="text" class="form-control" id="nombre_artistico" name="nombre_artistico"
                                    placeholder="Maluma" value="{{ old('nombre_artistico') }}">
                            </div>
                            <div class="col-sm-6">
                                <label for="linkSpoty">Link de Spotify</label>
                                <br>
                                <input type="text" class="form-control" id="link_spoty" name="link_spoty"
                                    placeholder="open.spotify.com/artist/XXX" value="{{ old('link_spoty') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="tipoCuenta">Tipo de cuenta bancaria</label>
                                <br>
                                <select class="tipoDeCuentaBanco form-select col-md-12" name="tipo_cuenta_bancaria"
                                    id="tipo_cuenta_bancaria" value="{{ old('tipo_cuenta_bancaria') }}">
                                    <option value="ahorros">Ahorros</option>
                                    <option value="corriente">Corriente</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="numeroCuenta">N├║mero de cuenta bancaria</label>
                                <br>
                                <input type="text" class="form-control" id="numero_cuenta_bancaria"
                                    name="numero_cuenta_bancaria" placeholder="05700002715"
                                    value="{{ old('numero_cuenta_bancaria') }}">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Aceptar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script src="{{ asset('js/jsRegistroPersonas/scriptRegistro.js') }}"></script>
@endsection
