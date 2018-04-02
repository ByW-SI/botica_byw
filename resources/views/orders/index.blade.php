@extends("layouts.app")



<!-- Modal -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

    <div class="modal-dialog modal-lg" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span

                            aria-hidden="true">&times;</span></button>

                <h4 class="modal-title grey" id="myModalLabel">

                    Dirección de Envío

                </h4>

            </div>

            <div class="modal-body grey" id="modal-body-address">



            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

            </div>

        </div>

    </div>

</div>

@section("content")

    <div class="container m-top" @if (count($orders) == 0 )
        {{-- expr --}}
        style="height: 595px !important;" 
    @endif>

        <div class="panel panel-default dashadmin ">

            <div class="panel-heading">

                <h2>Ordenes</h2>

            </div>

            <div class="panel-body">

                <h3>Estadisticas</h3>

                <div class="row top-space">

                    <div class="col-xs-4 col-md-3  sale-data">

                        <span>{{ $totalMonth}} USD</span>

                        Ingresos

                    </div>

                    <div class="col-xs-4 col-md-3  sale-data">

                        <span>{{ $totalMonthCount}}</span>

                        Numero de Ventas

                    </div>
                    <div class="col-xs-4">
                        <span>MES</span>
                        <select style="box-sizing: border-box !important;align-items: center !important;white-space: pre;
    -webkit-rtl-ordering: logical;
    color: black;
    background-color: white;
    cursor: default;
    border-width: 1px;
    border-style: solid;
    border-color: initial;
    border-image: initial;">
                          <option value="1">Enero</option>
                          <option value="2">Febrero</option>
                          <option value="3">Marzo</option>
                          <option value="4">Abril</option>
                          <option value="5">Mayo</option>
                          <option value="6">Junio</option>
                          <option value="7">Julio</option>
                          <option value="8">Agosto</option>
                          <option value="9">Septiembre</option>
                          <option value="10">Octubre</option>
                          <option value="11">Noviembre</option>
                          <option value="12">Diciembre</option>
                        </select>
                        
                    </div>
                </div>
                   
                        
                

                <h4>Ventas</h4>

                <table class="table table-bordered tabla-status">

                    <thead>

                    <tr>

                        <td>Id. Venta</td>

                        <td>Comprador</td>

                        <td>Dirección</td>

                        <td>No. Guía</td>

                        <td>Estatus</td>

                        <td>Fecha de Venta</td>

                        <td>Carrito de compra</td>

                        <td>Acciones</td>

                    </tr>

                    </thead>

                    <tbody>
                            
                        

                    @foreach($orders as $order)

                        <tr>

                            <td>{{ $order->id }}</td>

                            <td>{{ $order->recipient_name }}</td>

                            {{--<td>{{ $order->address() }}</td>--}}

                            <td>

                                <!-- Button trigger modal -->

                                <button type="button" class="btn btn-primary shopping_cart_address"

                                        data-shoppingcart="{{ $order->shopping_cart_id }}">

                                    <i class="fa fa-eye"></i>Ver Dirección

                                </button>

                            </td>

                            <td>

                                <a href="#" data-type="text"

                                   data-pk="{{$order->id}}"

                                   data-url="{{url("/orders/$order->id")}}"

                                   data-title="Numero de Guia"

                                   data-value="{{$order->guide_numer}}"

                                   class="set-guide-number"

                                   data-name="guide_numer"></a>



                            </td>

                            <td><a href="#" data-type="select"

                                   data-pk="{{$order->id}}"

                                   data-url="{{url("/orders/$order->id")}}"

                                   data-title="Status"

                                   data-value="{{ $order->status}}"

                                   class="select-status"

                                   data-name="status "></a></td>
                            <td>{{ $order->created_at }}</td>

                            <td>@foreach ($order->shoppingcart->products as $product)
                                {{-- expr --}}
                                Producto: {{$product->descripcion}}
                                <br>
                                Codigo Marzam: {{$product->codigo_marzam}}
                                <br>
                                Cantidad: {{ $product->pivot->qty}}
                                <br>
                                $ {{$product->precio_farmacia}} MXN
                                <br>

                            @endforeach</td>

                            <td>

                                <form action="{{ url('/user/order/get-receta') }}" method="POST">

                                    {{ csrf_field() }}

                                    <input type="hidden" name="url_receta_path"

                                           value="{{ $order->shoppingcart->receta_path }}"/>

                                    <button class="btn btn-success">Descargar Receta</button>

                                </form>

                            </td>

                        </tr>

                    @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>

@endsection



@section('scripts')

    <script>

        $(function () {

            $(".shopping_cart_address").on('click', function (e) {

                e.preventDefault();

                var shoppingcart = $(this).data('shoppingcart');



                // acemos la peticion ajax para obtener la plantilla del carrito



                $.ajax({

                    url: '{{ url('/order/info_address/') }}/' + shoppingcart,

                    type: 'GET',

                    success: function (data) {

                        $("#modal-body-address").html(data);

                        $("#myModal").modal('show');

                    }

                })

            });

        });

    </script>

@endsection