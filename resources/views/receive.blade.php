@extends('layouts.main')

@section('content')
    <section class="mt-10">
        <article class="mt-10 w-full min-h-[250px] grid py-7 px-4 md:grid-cols-[250px_1fr] rounded-2xl bg-[#fff] ">
            <div class="avatar flex items-center justify-center">
                <div
                    class="w-24 h-24 xl:w-32 xl:h-32 overflow-hidden rounded-full ring-4 @if ($seller[0]->active) ring-green-400 @else ring-gray-400 @endif">
                    <img class=""
                        src="{{ $seller[0]->seller_image != null ? asset('storage') . '/' . $seller[0]->seller_image : 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png' }}" />
                </div>
            </div>
            <div class="flex max-lg:flex-wrap gap-5 xl:gap-14 max-md:p-5">
                <div class="max-w-1/2">
                    <h1 class="text-2xl mb-3 lg:text-3xl font-bold text-[#3da9fc]">Datos del vendedor</h1>
                    <p class="mb-2"><strong>Nombre:</strong> {{ $seller[0]->seller_name }}</p>
                    <p class="mb-2"><strong>Teléfono:</strong> {{ $seller[0]->seller_phone }}</p>
                    <p class="mb-2"><strong>Cédula:</strong> {{ $seller[0]->seller_identification_number }}</p>
                    <p class="mb-2"><strong>Dirección:</strong> {{ $seller[0]->seller_adress }}</p>
                    <span class="h-18 md:h-14 overflow-hidden text-ellipsis"></span>
                </div>
                <div class="max-w-1/2">
                    <h1 class="text-2xl mb-3 lg:text-3xl font-bold text-[#ef4565]">Datos del despacho</h1>
                    <p class="mb-2"><strong>Hora del despacho:</strong> {{ $seller[0]->departure_datetime }} -
                        {{ empty($seller[0]->arrival_datetime) ? 'No ha sido recibido' : $seller[0]->arrival_datetime }}</p>
                    <p class="mb-2"><strong>Cantidad de paletas:</strong> {{ $palleteCount }}</p>
                    <p class="mb-2"><strong>Dinero transportado: </strong>
                        {{ env('COIN') . number_format($totalPricePalletes, 2) }}</p>

                    <span class="h-18 md:h-14 overflow-hidden text-ellipsis"></span>
                </div>
            </div>
        </article>

        <form action="{{ route('receive.dispatch' ,['id' => $id]) }}" method="POST">
            @csrf
            <table id="formPalletes" class="mt-8 w-full rounded-xl overflow-hidden">
                <thead class="">
                    <tr class="h-24 border-b text-[#fffffe] text-xl font-bold rounded-lg bg-[#ef4565]">
                        <th>Nombre</th>
                        <th>Salida</th>
                        <th>Entrada</th>
                        <th>Venta</th>
                        <th>Precio vendedor</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody class="bg-[#fff]">
                    @foreach ($palletes as $pallete)
                        <tr class="text-center border-b ">
                            <td class="h-24 flex lg:gap-5 max-w-lg justify-center items-center ">
                                <div class="avatar flex flex-1 justify-end">
                                    <div class="w-16 rounded">
                                        <img src="{{ $pallete->pallete_image }}" />
                                    </div>
                                </div>
                                <div class="flex-1 ">
                                    <span class="text-md font-normal text-gray-900">{{ $pallete->pallete_name }}</span>
                                    @if ($pallete->promotion)
                                        <span class="flex items-center text-sm font-semibold italic justify-center"><span
                                                class="flex w-2.5 h-2.5 bg-green-500 rounded-full mr-1.5 flex-shrink-0"></span>Con
                                            promoción</span>
                                    @endif
                                </div>
                            </td>
                            <td>
                                <span>{{$pallete->quantity_send}}</span>
                            </td>
                            <td><input type="number" name="palletes_sale[{{ $pallete->id }}]"
                                    onchange="calculate(this.value, {{$pallete->price}}, {{$pallete->quantity_send}}, {{$loop->iteration}}, {{count($palletes)}})"
                                    class="rounded-lg border-gray-400 focus:ring-rose-500 focus:border-rose-500"
                                    min="0" max="{{$pallete->quantity_send}}" value="{{$pallete->quantity_send}}" id="price__{{$loop->iteration}}">
                            </td>
                            <td id="sale_{{$loop->iteration}}">
                                0
                            </td>
                            <td>
                                <span>{{env('COIN').$pallete->price}}</span>
                            </td>
                            
                            <td id="subtotal_{{$loop->iteration}}">
                                <span>{{env('COIN').'0.00'}}</span>
                            </td>
                            
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
            <div class="flex w-full justify-end mt-5">
                <div class="w-[300px] grid-cols-2 bg-[#fff] grid h-16 overflow-hidden rounded-lg">
                    <span class="h-full w-full grid place-content-center bg-[#ef4565] text-gray-50 font-extrabold text-xl"><p>Total: </p></span>
                    <span class="h-full w-full grid place-content-center"><p id="total_container">{{env('COIN').'0.00'}}</p></span>
                </div>
                <div class="w-[300px] h-16 grid place-content-center">
                    <button id="submitButton" class=" p-4 text-[#fffffe] font-bold rounded-lg bg-[#3da9fc] hover:bg-[#79c5ff]" type="submit">Recibir a este vendedor</button>
                </div>
            </div>
        </form>
    </section>

    
@endsection

@section('scripts')
    <script>
        
        function calculate(value, palletePrice, palleteQuantity, idInput, palletesCount) {
            var venta = 0;
            
            if(value > palleteQuantity) value = palleteQuantity;
            if(value < 0) value = 0;
            
            venta = palleteQuantity - value;

            var saleContainer = document.getElementById('sale_'+idInput);
            var subTotal = document.getElementById('subtotal_'+idInput);
            
            saleContainer.innerText = venta;

            subTotal.innerText = '{{env('COIN')}}'+(venta * palletePrice).toFixed(2);

            var totalContainer = document.getElementById('total_container');

            
            var total = calculateTotal(palletesCount)
            
            totalContainer.innerText = '{{env('COIN')}}'+total;

        }

        function calculateTotal(totalCount)
        {
            var total = 0;
            for(var i = 1; i <= totalCount;i++)
            {
                var element = document.getElementById('subtotal_'+i)

                total += parseFloat(element.innerText.slice(2, element.innerText.length));
            }

            return total;
        }
    </script>
@endsection
