<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8c/Logo_Eskimo_Nicaragua.svg/2560px-Logo_Eskimo_Nicaragua.svg.png" type="image/x-icon">
    <title>Agencia Eskimo</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[url('https://lala.com.gt/wp-content/themes/lala-theme/images/bg-home.jpg')]  w-full bg-cover">
    <div class="antialiased">
        <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar"
            aria-controls="default-sidebar" type="button"
            class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
            <span class="sr-only">Open sidebar</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path clip-rule="evenodd" fill-rule="evenodd"
                    d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                </path>
            </svg>
        </button>

        <aside id="default-sidebar"
            class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
            aria-label="Sidenav">
            <div class="overflow-y-auto py-5 px-3 h-full bg-white border-r border-gray-200 ">

                <a href="https://github.com/carlossirias" class="w-full flex justify-center items-center h-40">
                    <img class="w-2/3"
                        src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8c/Logo_Eskimo_Nicaragua.svg/2560px-Logo_Eskimo_Nicaragua.svg.png"
                        alt="">
                </a>

                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('agency.index') }}"
                            class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-100 group">
                            <svg width="512" height="512"
                                class="w-6 h-6 text-gray-400 transition duration-75  group-hover:text-gray-900 "
                                viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                <g fill="#ef4565" fill-rule="evenodd" clip-rule="evenodd">
                                    <path
                                        d="M1.5 2h13l.5.5v5.503a5.006 5.006 0 0 0-1-.583V3H2v9h5a5 5 0 0 0 1 3H4v-1h3v-1H1.5l-.5-.5v-10l.5-.5z" />
                                    <path
                                        d="M9.778 8.674a4 4 0 1 1 4.444 6.652a4 4 0 0 1-4.444-6.652zm2.13 4.99l2.387-3.182l-.8-.6l-2.077 2.769l-1.301-1.041l-.625.78l1.704 1.364l.713-.09z" />
                                </g>
                            </svg>
                            <span class="ml-3 text-[#5f6c7b]">Activos</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('receipts.view') }}"
                            class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-100 group">
                            <svg width="512" height="512"
                                class="w-6 h-6 text-gray-400 transition duration-75  group-hover:text-gray-900 "
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <g fill="none">
                                    <path
                                        d="M24 0v24H0V0h24ZM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.017-.018Zm.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022Zm-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01l-.184-.092Z" />
                                    <path fill="#ef4565"
                                        d="M16 3a3 3 0 0 1 2.995 2.824L19 6v10h.75c.647 0 1.18.492 1.244 1.122l.006.128V19a3 3 0 0 1-2.824 2.995L18 22H8a3 3 0 0 1-2.995-2.824L5 19V9H3.25a1.25 1.25 0 0 1-1.244-1.122L2 7.75V6a3 3 0 0 1 2.824-2.995L5 3h11Zm3 15h-9v1c0 .35-.06.687-.17 1H18a1 1 0 0 0 1-1v-1Zm-7-6h-2a1 1 0 0 0-.117 1.993L10 14h2a1 1 0 0 0 .117-1.993L12 12Zm2-4h-4a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2ZM5 5a1 1 0 0 0-1 1v1h1V5Z" />
                                </g>
                            </svg>
                            <span class="ml-3 text-[#5f6c7b]">Recibos</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('agency.palletes') }}"
                            class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-100 group">
                            <svg width="512" height="512"
                                class="w-6 h-6 text-gray-400 transition duration-75  group-hover:text-gray-900 "
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path fill="#ef4565"
                                    d="m12.05 23l-4.7-9q-1.775.075-3.062-1.025T3 10q0-1.275.738-2.3T5.6 6.25q.45-2.275 2.238-3.763T12 1q2.375 0 4.163 1.488T18.4 6.25q1.125.425 1.863 1.45T21 10q0 1.875-1.325 2.975T16.7 14l-4.65 9Zm0-4.35l2.7-5.25q-.6.3-1.3.45T12 14q-.675 0-1.363-.15T9.3 13.4l2.75 5.25Z" />
                            </svg>
                            <span class="ml-3 text-[#5f6c7b]">Precios</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('agency.sellers') }}"
                            class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-100 group">
                            <svg width="512" height="512"
                                class="w-6 h-6 text-gray-400 transition duration-75  group-hover:text-gray-900 "
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path fill="#ef4565"
                                    d="M12 12q-1.65 0-2.825-1.175T8 8q0-1.65 1.175-2.825T12 4q1.65 0 2.825 1.175T16 8q0 1.65-1.175 2.825T12 12Zm-8 8v-2.8q0-.85.438-1.563T5.6 14.55q1.55-.775 3.15-1.163T12 13q1.65 0 3.25.388t3.15 1.162q.725.375 1.163 1.088T20 17.2V20H4Z" />
                            </svg>
                            <span class="ml-3 text-[#5f6c7b]">Vendedores</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
    </div>
    <main class="p-4 md:ml-64 xl:ml-72 xl:p-8 min-h-screen ">
        <h1 class="text-[#094067] text-3xl lg:text-4xl xl:text-5xl mb-2 font-extrabold">{{ Auth::user()->agency_name }}
        </h1>
        <h2 class="text-xl lg:text-lg xl:text-lg text-[#7284A8] font-semibold" id="phoneNumber">
            {{ Auth::user()->agency_phone }}</h2>
        <h3 class="text-xl lg:text-lg xl:text-lg text-[#7284A8] font-semibold">{{ Auth::user()->agency_adress }}</h3>


        @yield('content')

    </main>

    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    @yield('scripts')

</body>

</html>
