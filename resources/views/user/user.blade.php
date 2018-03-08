@extends('layouts.app')

@section('content')

    <section id="four" class="wrapper style1 special fade-up">

        <div class="container">

            <header class="major">

                <h2 class="grey satisfic-font font1">

                    Bienvenido {{Auth::user()->name}} al panel de gestion

                </h2>

                <p class="pprofile">

                    Desde "Mi Panel" tienes la posibilidad

                    de ver tu actividad reciente y actualizar tu información.

                </p>

            </header>



        </div>

        <div class="container margin-12">

            <div class="col-md-4">

                <div class="list-group text-left">

                    <img src="{{url (Auth::user()->imgprofile)}}" class="img-responsive imgprofile " alt="">

                    <a href="javascript:void(0);" class="list-group-item active">

                        Opciones:

                    </a>

                    <a href="{{url('user/profile')}}" class="list-group-item">

                        Cambiar mi imagen de perfil

                    </a>

                    <a href="{{url('user/password')}}" class="list-group-item">

                        Cambiar mi contraseña

                    </a>

                    <a href="{{url('user/direccion')}}" class="list-group-item">

                        Gestiona tus Direcciones

                    </a>

                    <a href="{{url('user/my-favorite-products')}}" class="list-group-item">

                        Mis Productos Favoritos

                    </a>

                    <a href="{{ url('user/my-orders') }}" class="list-group-item">

                        Mis Ordenes

                    </a>

                </div>

            </div>
            <div class="col-md-4">
                <div class="container">
                    
                <h2 class="grey satisfic-font font1">

                    tipo de cambio

                </h2>
                </div>
            </div>

        </div>



    </section>

@endsection