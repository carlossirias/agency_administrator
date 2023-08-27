@extends('layouts.main')

@section('content')
    <h2 class="mt-6 font-bold text-[#3da9fc] text-lg lg:text-xl xl:text-3xl">Precios</h2>
    <table class="mt-10 w-full rounded-xl overflow-hidden">
        <thead class="">
            <tr class="h-24 border-b text-[#fffffe] text-xl font-bold rounded-lg bg-[#ef4565]">
                <th>Nombre</th>
                <th>Precio sugerido</th>
                <th>Precio agregado</th>
                <th>Precio vendedor</th>
            </tr>
        </thead>
        <tbody class="bg-[#fff]">
            @foreach ($palletes as $pallete)
                
            <tr class="text-center border-b ">
                <td class="h-24 flex lg:gap-5 max-w-lg place-content-around justify-center items-center xl:px-8 2xl:px-12">
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
                <td>
                    @if ($pallete->promotion)
                        {{ env('COIN').$pallete->promotion_price }}
                    @else
                        {{ env('COIN').$pallete->suggested_price }}
                    @endif
                </td>
                <td><input type="number" name="price" class="rounded-lg border-gray-400 focus:ring-rose-500 focus:border-rose-500" onchange="changePrice(this.value, '{{Crypt::encryptstring($pallete->id)}}', 
                @if ($pallete->promotion)
                    {{$pallete->promotion_price }}
                @else
                    {{ $pallete->suggested_price }}
                @endif , {{$loop->iteration}})" min="0" max="6" value="{{$pallete->added_price}}" id=""></td>
                <td ><span id="price__{{$loop->iteration}}">
                    @if ($pallete->promotion)
                        {{env('COIN').number_format(floatval($pallete->promotion_price) + floatval($pallete->added_price),2)}}
                    @else
                        {{env('COIN').number_format(floatval($pallete->suggested_price) + floatval($pallete->added_price),2)}}
                    @endif
                </span></td>
            </tr>
            @endforeach

        </tbody>
    </table>
@endsection

@section('scripts')
    <script>
        function changePrice(value, palleteId, suggestedPrice, id)
        {
            
            if(value < 0 || value > 6) value = 0
            console.log(value, palleteId)

            $.ajax({
                url: "{{route('palletes.update')}}",
                method:'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{
                    id: palleteId,
                    price : parseFloat(value),
                }
            }).done(function(res){
                var total = parseFloat(value) + parseFloat(suggestedPrice)
                $('#price__'+id).text('{{env('COIN')}}'+(total.toFixed(2))) 
                console.log(res)
            })
        }
    </script>
@endsection