@extends('layouts.main')

@section('content')
    <h2 class="mt-6 font-bold text-[#3da9fc] text-lg lg:text-xl xl:text-3xl">Vendedores Activos</h2>

    <div class="w-full min-h-12  p-4 bg-gray-100 flex rounded-lg justify-end">
        <a href="{{ route('agency.send') }}"
            class="p-3 flex gap-1 text-[#fffffe] font-bold rounded-lg bg-[#ef4565] hover:bg-[#f582ae]">
            <svg width="512" height="512" class="w-6 h-6 text-gray-400 transition duration-75  group-hover:text-gray-900 "
                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path fill="#fffffe"
                    d="M12 12q-1.65 0-2.825-1.175T8 8q0-1.65 1.175-2.825T12 4q1.65 0 2.825 1.175T16 8q0 1.65-1.175 2.825T12 12Zm-8 8v-2.8q0-.85.438-1.563T5.6 14.55q1.55-.775 3.15-1.163T12 13q1.65 0 3.25.388t3.15 1.162q.725.375 1.163 1.088T20 17.2V20H4Z" />
            </svg>
            <span>Despachar a un vendedor</span>
        </a>
    </div>
    @empty($activeSellers)
        <div id="startWith" class="w-full h-48 grid place-content-center">
            <p id="" class="mt-2 text-lg text-gray-600 font-semibold decoration-[#3da9fc] underline">¡Para comenzar
                debes despachar a un vendedor! 🥳</p>
        </div>
    @endempty
    <section class="mt-5 grid grid-cols-1 lg:grid-cols-2 2xl:grid-cols-3 gap-5">



        @foreach ($activeSellers as $seller)
            <div class="bg-[#fffffe]  rounded-xl  w-full h-max p-7 md:p-10">
                <div class="flex gap-4 h-24">
                    <div class="w-20 grid overflow-hidden">
                        <img class="max-h-20 rounded-md"
                            src="{{ $seller->seller_image != null ? asset('storage') . '/' . $seller->seller_image : 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png' }}"
                            alt="" srcset="">
                    </div>
                    <div>
                        <a href="{{ route('send.view', ['id' => Crypt::encryptstring($seller->id)]) }}"
                            class="font-medium text-[#5f6c7b] hover:underline">{{ $seller->seller_name }}</a>
                        <span class="block">{{ $seller->seller_phone }}</span>
                        @if (empty($seller->arrival_datetime))
                            <span class="flex items-center text-sm font-medium text-gray-900 dark:text-white"><span
                                    class="flex w-2.5 h-2.5 bg-green-500 rounded-full mr-1.5 flex-shrink-0"></span>Activo</span>
                        @else
                            <span class="flex items-center text-sm font-medium text-gray-900 dark:text-white"><span
                                    class="flex w-2.5 h-2.5 bg-blue-500 rounded-full mr-1.5 flex-shrink-0"></span>Recibido</span>
                        @endif
                    </div>
                </div>
                <div class="grid">
                    <span class="h-18 md:h-14 overflow-hidden text-ellipsis">{{ $seller->seller_adress }}</span>

                    <div class="w-full mt-3 place-content-between flex items-center">
                        <span class="text-sm text-gray-500">{{ $seller->departure_datetime }} -
                            {{ empty($seller->arrival_datetime) ? 'No ha sido recibido' : $seller->arrival_datetime }}</span>
                        @if (empty($seller->arrival_datetime))
                            <a href="{{ route('agency.receive', ['id' => Crypt::encryptstring($seller->id)]) }}"
                                class="p-3 text-[#fffffe] font-bold rounded-lg bg-[#ef4565] hover:bg-[#f582ae]">Recibir al
                                vendedor</a>
                        @else
                        <a href="{{ route('receive.view', ['id' => Crypt::encryptstring($seller->id)]) }}"
                            class="p-3 text-[#fffffe] font-bold rounded-lg bg-[#3da9fc] hover:bg-[#79c5ff]">Ver el recibo</a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </section>
@endsection
