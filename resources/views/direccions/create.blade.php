{{--@extends('layouts.app')
@section('content')
    <div class="container white margin-top">
        <h1 class="color-grey font-ch">Agregar Direccion</h1>
        @include('direccions.form', ['direccion' => $direccion, 'url' => '/create', 'method' => 'POST'])
    </div>
@endsection--}}
@extends('layouts.app')
@section('content')
    <section id="four" class="wrapper style1 special fade-up">
        <div class="container">
            <header class="major">
                <h2 class="grey satisfic-font font1">Agrega tu Dirección de Envio</h2>
            </header>
        </div>
        <div class="container">
            @if ($errors->any())
                <div class="alert alert-danger text-left">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ url('/user/direccion/create') }}" method="POST">
                {{ csrf_field() }}
                <div class="container">
                <h3 style="color: black;"><strong>*</strong> Campos requeridos</h3>
                
                </div>
                <div class="form-group col-lg-4">
                    <label for="name"><strong>*</strong> Nombre del destinatario (quien reciba):</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Nombre"
                           value="{{ old('name') }}">
                </div>
                <div class="form-group col-lg-4">
                    <label for="email"><strong>*</strong> Email del destinatario (quien reciba):</label>
                    <input type="text" class="form-control" name="email" id="email" placeholder="Email"
                           value="{{ old('email') }}"/>
                </div>
                <div class="form-group col-lg-4">
                    <label for="contacto"><strong>*</strong>  Telefono del destinatario (quien reciba):</label>
                    <div class="input-group">
                        
                        <div class="col-4 input-group-prepend">
                            <input id="lada" type="text" class="form-control" name="lada" readonly="" value="">
                        </div>
                    <input type="text" class="form-control" name="contacto" id="contacto" placeholder="Telefono"
                           value="{{ old('contacto') }}"/>
                    </div>
                </div>
                <div class="form-group col-lg-4">
                    <label for="telefono"><strong>*</strong> Telefono del remitente (quien envia):</label>
                    
                        <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Telefono"
                               value="{{ old('telefono') }}"/>
                </div>
                
                <div class="form-group col-lg-4">
                    <label for="pais"><strong>*</strong>País:</label>
                    {{-- <input type="text" class="form-control" name="pais" id="pais" placeholder="País"
                           value="{{ old('pais') }}"/> --}}
                    <select class="form-control" id="pais" name="pais">
                        <option value="">Seleccione el país de envio</option>
                        @foreach ($countries as $country)
                            {{-- expr --}}
                            <option value="{{$country->name}}">{{$country->nicename}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-lg-4">
                    <label for="estado"><strong>*</strong>Estado o Población:</label>
                    <input type="text" class="form-control" name="estado" id="estado" placeholder="Estado o Poblacion"
                           value="{{ old('estado') }}"/>
                </div>
                <div class="form-group col-lg-4">
                    <label for="ciudad"><strong>*</strong>Ciudad</label>
                    <input type="text" class="form-control" name="ciudad" id="ciudad" placeholder="Ciudad"
                           value="{{ old('ciudad') }}"/>
                </div>
                <div class="form-group col-lg-4">
                    <label for="municipio"><strong>*</strong>Municipio:</label>
                    <input type="text" class="form-control" name="municipio" id="municipio" placeholder="Municipio"
                           value="{{ old('municipio') }}"/>
                </div>
                <div class="form-group col-lg-4">
                    <label for="calle"><strong>*</strong>Calle:</label>
                    <input type="text" class="form-control" name="calle" id="calle" placeholder="Calle"
                           value="{{ old('calle') }}"/>
                </div>
                <div class="form-group col-lg-2">
                    <label for="num_ext"><strong>*</strong>Número Exterior:</label>
                    <input type="text" class="form-control" name="num_ext" id="num_ext" placeholder="Número Exterior"
                           value="{{ old('num_ext') }}"/>
                </div>
                <div class="form-group col-lg-2">
                    <label for="num_int">Número Interior:</label>
                    <input type="text" class="form-control" name="num_int" id="num_int" placeholder="Número Interior"
                           value="{{ old('num_int') }}"/>
                </div>
                <div class="form-group col-lg-2" id="div_colonia">
                    <label for="colonia"><strong>*</strong>Colonia:</label>
                    <input type="text" class="form-control" name="colonia" id="colonia" placeholder="Colonia"
                           value="{{ old('colonia') }}"/>
                </div>
                <div class="form-group col-lg-2" id="codigo_postal">
                    <label for="codigop">C.P:</label>
                    <input type="text" class="form-control" name="codigop" id="codigop" placeholder="Código Postal"
                           value="{{ old('codigop') }}"/>
                </div>
                <div class="form-group col-lg-4">
                    <label for="entre1">Entre Calle:</label>
                    <input type="text" class="form-control" name="entre1" id="entre1" placeholder="Entre Calle?"
                           value="{{ old('entre1') }}"/>
                </div>
                <div class="form-group col-lg-4">
                    <label for="entre2">Y Entre Calle:</label>
                    <input type="text" class="form-control" name="entre2" id="entre2" placeholder="Y Entre Calle"
                           value="{{ old('entre2') }}"/>
                </div>
                <div class="form-group col-lg-4">
                    <label for="references">Referencias Adicionales:</label>
                    <input type="text" class="form-control" name="references" id="references"
                           placeholder="Referencias Adicionales"
                           value="{{ old('references') }}"/>
                </div>
                <div class=" col-md-12 pull-center">
                    <br>
                    <a href="{{ url('/user/direccion') }}" class="btn btn-warning">Regresar</a>
                    <button type="submit" class="btn btn-primary">Guardar Dirección</button>
                </div>
            </form>
        </div>
    </section>
    @section('scripts')
        {{-- expr --}}
        <script type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function(){
               $("#pais").change(function() {
                   // body...
                   pais = $('#pais').val()
                   $.get('{{ url('/getPais') }}/'+pais,function (data) {
                       // body...
                       console.log(data);
                       if (data.pais.name == "CUBA") {
                        $("#codigo_postal").hide();
                        $("#div_colonia").hide();
                       }
                       else{
                         $("#codigo_postal").show();
                        $("#div_colonia").show();
                       }
                       $('#lada').empty();
                       $('#lada').val(data.pais.phonecode);
                   });
               });
            });
        </script>
    @endsection
@endsection