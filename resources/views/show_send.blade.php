@extends('layouts.main')

@section('content')
<section class="min-h-screen">
    <article class="mt-10 w-full min-h-[250px] grid py-7 px-4 md:grid-cols-[250px_1fr] rounded-2xl bg-[#fff] ">
        <div class="avatar flex items-center justify-center">
            <div class="w-24 h-24 xl:w-32 xl:h-32 overflow-hidden rounded-full ring-4 @if($seller[0]->active)  ring-green-400 @else ring-gray-400 @endif">
                <img class="" src="{{$seller[0]->seller_image != null ? asset('storage') . '/' . $seller[0]->seller_image : 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png'}}" />
            </div>
        </div>
        <div class="flex max-lg:flex-wrap gap-5 xl:gap-14 max-md:p-5">
            <div class="max-w-1/2">
                <h1 class="text-2xl mb-3 lg:text-3xl font-bold text-[#3da9fc]">Datos del vendedor</h1>
                <p class="mb-2"><strong>Nombre:</strong> {{$seller[0]->seller_name}}</p>
                <p class="mb-2"><strong>Teléfono:</strong> {{$seller[0]->seller_phone}}</p>
                <p class="mb-2"><strong>Cédula:</strong> {{$seller[0]->seller_identification_number}}</p>
                <p class="mb-2"><strong>Dirección:</strong> {{$seller[0]->seller_adress}}</p>
                <span class="h-18 md:h-14 overflow-hidden text-ellipsis"></span>
            </div>
            <div class="max-w-1/2">
                <h1 class="text-2xl mb-3 lg:text-3xl font-bold text-[#ef4565]">Datos del despacho</h1>
                <p class="mb-2"><strong>Hora del despacho:</strong> {{$seller[0]->departure_datetime}} - {{ empty($seller[0]->arrival_datetime) ? 'No ha sido recibido' : $seller[0]->arrival_datetime }}</p>
                <p class="mb-2"><strong>Cantidad de paletas:</strong> {{$palleteCount}}</p>
                <p class="mb-2"><strong>Dinero transportado: </strong> {{env('COIN').number_format($totalPricePalletes,2)}}</p>
                
                <span class="h-18 md:h-14 overflow-hidden text-ellipsis"></span>
            </div>
        </div>
    </article>

    <table id="formPalletes" class="mt-8 w-full rounded-xl overflow-hidden">
        <thead class="">
            <tr class="h-24 border-b text-[#fffffe] text-xl font-bold rounded-lg bg-[#ef4565]">
                <th>Nombre</th>
                <th>Precio vendedor</th>
                <th>Cantidad</th>
                <th>Costo</th>
            </tr>
        </thead>
        <tbody class="bg-[#fff]">
            
            
            @foreach ($palletes as $pallete)
            <tr class="text-center border-b ">
                <td class="h-24 flex lg:gap-5 max-w-lg justify-center items-center ">
                    <div class="avatar flex flex-1 justify-end">
                        <div class="w-16 rounded">
                          <img src="{{$pallete->pallete_image}}" />
                        </div>
                    </div>
                    <div class="flex-1 ">
                        <span class="text-md font-normal text-gray-900">{{ $pallete->pallete_name }}</span>
                        @if ($pallete->promotion)
                            <span class="flex items-center text-sm font-semibold italic justify-center"><span class="flex w-2.5 h-2.5 bg-green-500 rounded-full mr-1.5 flex-shrink-0"></span>Con promoción</span>
                        @endif
                    </div>
                </td>
                <td ><span id="price__{{$loop->iteration}}">
                   
                    {{env('COIN').number_format($pallete->price,2)}}
            
                </span></td>
                <td>
                    <span>{{$pallete->quantity_send}}</span>
                </td>
                <td>
                    {{env('COIN').number_format($pallete->price * $pallete->quantity_send,2)}}
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
    
</section>
   
@endsection