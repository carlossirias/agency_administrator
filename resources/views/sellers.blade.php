@extends('layouts.main')

@section('content')
    <h2 class="mt-6 font-bold text-[#3da9fc] text-lg lg:text-xl xl:text-3xl">Vendedores ({{ $sellersActive }})</h2>
    <div class="w-full min-h-12 mt-10 p-4 bg-gray-100 flex rounded-lg justify-end">
        <button class="p-3 flex gap-1 text-[#fffffe] font-bold rounded-lg bg-[#ef4565] hover:bg-[#f582ae]"
            data-modal-target="popup-modal" data-modal-toggle="add-modal">
            <svg width="512" height="512" class="w-6 h-6 text-gray-400 transition duration-75  group-hover:text-gray-900 "
                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path fill="#fffffe"
                    d="M12 12q-1.65 0-2.825-1.175T8 8q0-1.65 1.175-2.825T12 4q1.65 0 2.825 1.175T16 8q0 1.65-1.175 2.825T12 12Zm-8 8v-2.8q0-.85.438-1.563T5.6 14.55q1.55-.775 3.15-1.163T12 13q1.65 0 3.25.388t3.15 1.162q.725.375 1.163 1.088T20 17.2V20H4Z" />
            </svg>
            <span>Agregar a un vendedor</span>
        </button>

        <div id="add-modal" tabindex="-1" aria-hidden="true"
            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow ">
                    <button type="button"
                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center "
                        data-modal-hide="add-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="px-6 py-6 lg:px-8">
                        <h3 class="mb-5 text-center text-xl font-semibold text-[#3da9fc]">Agregar un vendedor</h3>
                        <form class="space-y-6" action="{{ route('sellers.create') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div>
                                <label for="seller_name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                                <input type="text" name="seller_name" id="seller_name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 "
                                    required>
                            </div>

                            <div>
                                <label for="seller_identification_number"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cedula</label>
                                <input type="text" name="seller_identification_number" id="seller_identification_number"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 "
                                    required>
                            </div>

                            <div>
                                <label for="seller_adress"
                                    class="block mb-2 text-sm font-medium text-gray-900 ">Direccion</label>
                                <input type="text" name="seller_adress" id="seller_adress"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 "
                                    required>
                            </div>

                            <div>
                                <label for="seller_phone" class="block mb-2 text-sm font-medium text-gray-900 ">Numero de
                                    telefono</label>
                                <input type="text" name="seller_phone" id="seller_phone"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 "
                                    required>
                            </div>

                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 ">Foto</label>
                                <input name="seller_image"
                                    class="block w-full text-sm text-gray-900 border file:bg-[#ef4565] hover:file:bg-[#f582ae] border-gray-300 rounded-lg cursor-pointer focus:outline-none"
                                    id="user_avatar" type="file">
                            </div>

                            <button type="submit"
                                class="w-full text-white bg-[#ef4565] hover:bg-[#f582ae] focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Agregar</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>



    <section class="mt-6 grid grid-cols-1">
        @foreach ($sellers as $item)
            <div class="bg-[#fffffe] mb-7 rounded-xl overflow-hidden w-full flex">
                <div class="w-40 grid place-content-center overflow-hidden">
                    <img class="max-h-40"
                        src="{{ $item->seller_image != null ? asset('storage') . '/' . $item->seller_image : 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png' }}"
                        alt="" srcset="">
                </div>
                <div class="w-full flex flex-wrap place-content-between p-8">
                    <div class="max-sm:w-full">
                        <span class="text-[#5f6c7b] text-lg block">{{ $item->seller_name }}</span>
                        @if ($item->enabled)
                            <span class="flex items-center text-sm font-medium text-gray-900 dark:text-white"><span
                                    class="flex w-2.5 h-2.5 bg-green-500 rounded-full mr-1.5 flex-shrink-0"></span>Habilitado</span>
                        @else
                            <span class="flex items-center text-sm font-medium text-gray-900 dark:text-white"><span
                                    class="flex w-2.5 h-2.5 bg-blue-600 rounded-full mr-1.5 flex-shrink-0"></span>No
                                habilitado</span>
                        @endif

                        <span class="text-slate-800 text-md block">Numero: <span>{{ $item->seller_phone }}</span></span>
                    </div>
                    <div class="flex gap-2 md:items-center h-full flex-wrap max-sm:mt-3">

                        <div>
                            <button data-modal-target="popup-modal" data-modal-toggle="popup-modal-1-{{ $item->id }}"
                                class="block text-white bg-teal-400 hover:bg-teal-500 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center "
                                type="button">
                                <svg width="512" height="512"
                                    class="w-6 h-6 text-gray-400 transition duration-75  group-hover:text-gray-900 "
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path fill="#fff"
                                        d="M12 9a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3m0 8a5 5 0 0 1-5-5a5 5 0 0 1 5-5a5 5 0 0 1 5 5a5 5 0 0 1-5 5m0-12.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5Z" />
                                </svg>
                            </button>
                            <div id="popup-modal-1-{{ $item->id }}" tabindex="-1"
                                class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative w-full max-w-md max-h-full">
                                    <div class="relative bg-white rounded-lg shadow ">
                                        <button type="button"
                                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center"
                                            data-modal-hide="popup-modal-1-{{ $item->id }}">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="p-6 ">
                                            <h3 class="mb-5 text-center text-xl font-semibold text-[#3da9fc]">Informacion
                                                del
                                                vendedor</h3>

                                            @if ($item->seller_image != null)
                                                <div class="w-full flex justify-center h-32 mb-5">
                                                    <img src="{{ asset('storage') . '/' . $item->seller_image }}"
                                                        class="text-center" alt="Hola" srcset="">
                                                </div>
                                            @endif


                                            <span class="text-lg text-[#5f6c7b] mb-2 block font-bold">Nombre: <span
                                                    class="font-normal">{{ $item->seller_name }}</span></span>
                                            <span class="text-lg text-[#5f6c7b] mb-2 block font-bold">Numero de Cedula:
                                                <span
                                                    class="font-normal">{{ $item->seller_identification_number }}</span></span>
                                            <span class="text-lg text-[#5f6c7b] mb-2 block font-bold">Dirección: <span
                                                    class="font-normal">{{ $item->seller_adress }}</span></span>
                                            <span class="text-lg text-[#5f6c7b] mb-2 block font-bold">Telefono: <span
                                                    class="font-normal">{{ $item->seller_phone }}</span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="button__container_2">
                            <button data-modal-target="popup-modal" data-modal-toggle="popup-modal-2-{{ $item->id }}"
                                class="block text-white bg-yellow-300 hover:bg-yellow-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                type="button">
                                <svg width="512" height="512" viewBox="0 0 24 24"
                                    class="w-6 h-6 text-gray-400 transition duration-75  group-hover:text-gray-900 "
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill="#000000"
                                        d="m19.3 8.925l-4.25-4.2l1.4-1.4q.575-.575 1.413-.575t1.412.575l1.4 1.4q.575.575.6 1.388t-.55 1.387L19.3 8.925ZM17.85 10.4L7.25 21H3v-4.25l10.6-10.6l4.25 4.25Z" />
                                </svg>
                            </button>
                            <div id="popup-modal-2-{{ $item->id }}" tabindex="-1"
                                class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative w-full max-w-md max-h-full">
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <button type="button"
                                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="popup-modal-2-{{ $item->id }}">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="p-6 text-center">
                                            <h3 class="mb-5 text-center text-xl font-semibold text-[#3da9fc]">Informacion
                                                del
                                                vendedor</h3>

                                            <form action="{{ route('sellers.update') }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <input type="text" class="hidden" name="id"
                                                    value="{{ Crypt::encryptstring($item->id) }}">
                                                <div class="mb-6">
                                                    <label for="name"
                                                        class="block mb-2 text-sm text-left font-medium text-gray-900 dark:text-white">
                                                        Nombre</label>
                                                    <input type="text" id="name" name="name"
                                                        value="{{ $item->seller_name }}"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                        required>
                                                </div>

                                                <div class="mb-6">
                                                    <label for="identification_number"
                                                        class="block mb-2 text-sm text-left font-medium text-gray-900 dark:text-white">Cedula</label>
                                                    <input type="text" id="identification_number"
                                                        name="identification_number"
                                                        value="{{ $item->seller_identification_number }}"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        required>
                                                </div>

                                                <div class="mb-6">
                                                    <label for="number"
                                                        class="block mb-2 text-sm text-left font-medium text-gray-900 dark:text-white">Número</label>
                                                    <input type="text" id="number" name="number"
                                                        value="{{ $item->seller_phone }}"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        required>
                                                </div>

                                                <div class="mb-6">
                                                    <label for="adress"
                                                        class="block mb-2 text-sm text-left font-medium text-gray-900 dark:text-white">Dirección</label>
                                                    <input type="text" id="adress" name="adress"
                                                        value="{{ $item->seller_adress }}"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        required>
                                                </div>

                                                <label
                                                    class="relative inline-flex items-center mb-4 cursor-pointer w-full">
                                                    <input type="checkbox" name="enabled" class="sr-only peer"
                                                        @if ($item->enabled) checked @endif>
                                                    <div
                                                        class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-red-200  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-[#ef4565]">
                                                    </div>
                                                    <span
                                                        class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Habilitado</span>
                                                </label>

                                                <button type="submit"
                                                    data-modal-hide="popup-modal-2-{{ $item->id }}" type="button"
                                                    class="text-white bg-[#ef4565] hover:bg-[#f582ae] focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                    Actualizar
                                                </button>
                                                <button data-modal-hide="popup-modal-2-{{ $item->id }}"
                                                    type="button"
                                                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                    Cancelar</button>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="button__container_3">
                            <button data-modal-target="popup-modal" data-modal-toggle="popup-modal-3-{{ $item->id }}"
                                class="block text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2.5 text-center"
                                type="button">
                                <svg width="512" height="512" viewBox="0 0 24 24"
                                    class="w-6 h-6 text-gray-400 transition duration-75  group-hover:text-gray-900 "
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill="#fff"
                                        d="M19 4h-3.5l-1-1h-5l-1 1H5v2h14M6 19a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V7H6v12Z" />
                                </svg>
                            </button>
                            <div id="popup-modal-3-{{ $item->id }}" tabindex="-1"
                                class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative w-full max-w-md max-h-full">
                                    <div class="relative bg-white rounded-lg shadow ">
                                        <button type="button"
                                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center "
                                            data-modal-hide="popup-modal-3-{{ $item->id }}">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Cerrar</span>
                                        </button>
                                        <div class="p-6 text-center">
                                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 " aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                            <h3 class="mb-5 text-lg font-normal text-gray-500 ">Estas segur@ que quieres
                                                eliminar a {{ $item->seller_name }}
                                                ?</h3>

                                            <form action="{{ route('sellers.delete') }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="text" class="hidden" name="id"
                                                    value="{{ Crypt::encryptstring($item->id) }}">
                                                <button data-modal-hide="popup-modal-3-{{ $item->id }}"
                                                    type="submit"
                                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                    Si, estoy seguro
                                                </button>
                                                <button data-modal-hide="popup-modal-3-{{ $item->id }}"
                                                    type="button"
                                                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 ">No,
                                                    cancelar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </section>
@endsection
