@extends('layouts.main')

@section('content')
    <h2 class="mt-6 font-bold text-[#3da9fc] text-lg lg:text-xl xl:text-3xl">Recibos</h2>

    <section class="w-full mt-10">
        @if (request()->input('page') == null || request()->input('page') == 1)
            
        
        <h3 class="mt-3 mb-5 font-bold text-[#094067] text-md lg:text-lg xl:text-xl">El dia de hoy</h3>
        @empty($sellersToday)
        <div id="startWith" class="w-full h-48 grid place-content-center">
            <p id="" class="mt-2 text-lg text-gray-600 font-semibold decoration-[#3da9fc] underline">¡No hay vendedores recibidos hoy! 😶</p>
        </div>
        @else
            @foreach ($sellersToday as $seller)
                <div class="bg-[#fffffe] mb-7 rounded-xl overflow-hidden w-full flex">
                    <div class="w-40 grid place-content-center overflow-hidden">
                        <img class="max-h-40"
                            src="{{$seller->seller_image != null ? asset('storage') . '/' . $seller->seller_image : 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png'}}"
                            alt="" srcset="">
                    </div>
                    <div class="w-full flex flex-wrap place-content-between p-8">
                        <div class="max-sm:w-full">
                            <span class="text-[#5f6c7b] text-lg block">{{$seller->seller_name}}</span>

                            <span class="text-slate-800 text-md block"><strong>Entrada: </strong>{{$seller->departure_datetime}}<span></span></span>
                            <span class="text-slate-800 text-md block"><strong>Salida: </strong>{{$seller->arrival_datetime}}<span></span></span>
                            
                        </div>
                        <div class="flex gap-2 md:items-center max-sm:h-10 flex-wrap max-sm:mt-3">
                            <a href="{{ route('receive.view', ['id' => Crypt::encryptstring($seller->id)]) }}"
                                class="p-3 text-[#fffffe] font-bold rounded-lg bg-[#3da9fc] hover:bg-[#79c5ff]">Ver el recibo</a>
                        </div>
                    </div>
                </div>
            @endforeach
        

        @endempty

        @endif

        <h3 class="mt-3 mb-5 font-bold text-[#094067] text-md lg:text-lg xl:text-xl">Pasados dias</h3>

        @empty($sellersRest)
        <div id="startWith" class="w-full h-48 grid place-content-center">
            <p id="" class="mt-2 text-lg text-gray-600 font-semibold decoration-[#3da9fc] underline">¡No hay vendedores recibidos anteriormente! 😶</p>
        </div>
        @else
            @foreach ($sellersRest as $seller)
                <div class="bg-[#fffffe] mb-7 rounded-xl overflow-hidden w-full flex">
                    <div class="w-40 grid place-content-center overflow-hidden">
                        <img class="max-h-40"
                            src="{{ 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png' }}"
                            alt="" srcset="">
                    </div>
                    <div class="w-full flex flex-wrap place-content-between p-8">
                        <div class="max-sm:w-full">
                            <span class="text-[#5f6c7b] text-lg block">{{$seller->seller_name}}</span>

                            <span class="text-slate-800 text-md block"><strong>Entrada: </strong>{{$seller->departure_datetime}}<span></span></span>
                            <span class="text-slate-800 text-md block"><strong>Salida: </strong>{{$seller->arrival_datetime}}<span></span></span>
                        </div>
                        <div class="flex gap-2 flex-wrap md:items-center max-sm:h-10 max-sm:mt-3">
                            <a href="{{ route('receive.view', ['id' => Crypt::encryptstring($seller->id)]) }}"
                                class="p-3 text-[#fffffe] font-bold rounded-lg bg-[#3da9fc] hover:bg-[#79c5ff]">Ver el recibo</a>
                        </div>
                    </div>
                </div>
            @endforeach
        

        @endempty
        
    </section>

    <div class="h-18">
        {{$sellersRest->links()}}
    </div>
@endsection
