<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agencia Eskimo</title>
    @vite('resources/css/app.css')
</head>
<body>
    <main  class="bg-[url('https://lala.com.gt/wp-content/themes/lala-theme/images/bg-home.jpg')] h-screen  w-full bg-cover grid place-content-center">
        <div id="welcome__container" class="p-9 bg-gray-50 rounded-xl shadow-lg ">
            <div class="grid grid-cols-2">
                <img src="https://lala.com.gt/wp-content/uploads/2019/01/logo.png" alt="" class="w-32">
                <img src="https://download.logo.wine/logo/Eskimo_(ice_cream)/Eskimo_(ice_cream)-Logo.wine.png" alt="" class="w-32">
            </div>
            <div class="py-5">
                <h1 class="text-[#3da9fc] font-extrabold text-xl">¡Comienza la experiencia!</h1>
                <a href="{{route('agency.index')}}" class="w-full py-3 bg-[#3da9fc] text-gray-50 font-bold hover:bg-[#0388ff] transition-all ease-in duration-150 mt-4 block text-center rounded-xl">Quiero probar la demo</a>
            </div>
        </div>
    </main>

    <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>
    <script>
        ScrollReveal().reveal('#welcome__container');
    </script>
</body>
</html>