@extends('layouts.main')

@section('content')
    <h2 class="mt-6 font-bold text-[#3da9fc] text-lg lg:text-xl xl:text-3xl">Despachar a un vendedor</h2>

    @empty($sellers)
        <div id="startWith" class="w-full h-48 grid place-content-center">
            <p id="" class="mt-2 text-lg text-gray-600 font-semibold decoration-[#3da9fc] underline">¡Todos los vendedores han sido despachados! 😶</p>
        </div>
    @else 

    <section class="mt-6">
        <form action="{{route('send.dispatch')}}" method="POST">
            @csrf
            <div class="mb-6">
                <label for="sellers" class="block mb-2 text-sm font-medium text-gray-900">Vendedor</label>
                <select id="sellers" name="seller_id" onchange="showForm(this.value)" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    <option value="" selected>Elige a un vendedor</option>
                    @foreach ($sellers as $seller)
                        <option value="{{Crypt::encryptstring($seller->id)}}">{{$seller->seller_name}}</option>
                    @endforeach
                </select>
            </div>

            <label for="" class="block mb-2 text-sm font-medium text-gray-900">Cantidad de producto</label>
            <div id="startWith" class="w-full h-48 grid place-content-center">
                <p id="" class="mt-2 text-lg text-gray-600 font-semibold decoration-[#3da9fc] underline">¡Para comenzar debes elegir a un vendedor! 🥳</p>
            </div>
            <table id="formPalletes" class="hidden mt-8 w-full rounded-xl overflow-hidden">
                <thead class="">
                    <tr class="h-24 border-b text-[#fffffe] text-xl font-bold rounded-lg bg-[#ef4565]">
                        <th>Nombre</th>
                        <th>Precio vendedor</th>
                        <th>Cantidad</th>
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
                            @if ($pallete->promotion)
                                {{env('COIN').number_format(floatval($pallete->promotion_price) + floatval($pallete->added_price),2)}}
                            @else
                                {{env('COIN').number_format(floatval($pallete->suggested_price) + floatval($pallete->added_price),2)}}
                                
                            @endif
                        </span></td>
                        <td><input type="number" name="palletes_sale[{{$pallete->id}}]" class="rounded-lg border-gray-400 focus:ring-rose-500 focus:border-rose-500" min="0" max="100" value="0" id=""></td>

                        
                    </tr>
                    @endforeach
                
                </tbody>
            </table>
            <div class="w-full flex justify-end mt-3 px-10">
                <button id="submitButton" class="hidden p-4 text-[#fffffe] font-bold rounded-lg bg-[#3da9fc] hover:bg-[#79c5ff]" type="submit">Despachar a este vendedor</button>
            </div>
        </form>
    
    </section>
    @endempty
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
    <script>
        function showForm(value)
        {
            if(value)
            {
                $('#formPalletes').removeClass('hidden');
                $("#submitButton").removeClass('hidden');
                $('#startWith').addClass('hidden');
            }
            else
            {
                $('#startWith').removeClass('hidden');
                $('#formPalletes').addClass('hidden');
                $("#submitButton").addClass('hidden');
            }
        }
    </script>
@endsection