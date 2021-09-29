<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Bot y Fer</title>

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>

        <link rel="icon" type="image/png" sizes="32x32" href="{{ URL::to('/') }}/images/favicon-32x32.ico">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ URL::to('/') }}/images/favicon-16x16.ico">

    </head>
    <body class="antialiased">
        <header class="bg-bot-dark-blue">
            <div class="max-w-screen-xl mx-auto flex justify-between"> 
                <div class="logo justify-start pt-2">
                    <img style="width: 150px" class="logo" src="images/bot_logo.png" alt="Logo" />
                </div> 
                <div class="flex justify-end self-center">
                    @if (Route::has('login'))
                        
                            @auth
                                <a href="{{ url('/dashboard') }}" class="text-sm text-white	font-bold hover:underline">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="text-sm text-white font-bold hover:underline">Iniciar sesión</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 text-sm text-white font-bold hover:underline">Registrarse</a>
                                @endif
                            @endauth
                    @endif
                </div>                
            </div>
        </header>
        <main>
            <section>                 
                <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl hidden">
                    <span class="block xl:inline">Las Aventuras de Bot y Fer</span>
                </h1>


                <img src="images/header_boot_web.png" alt="Hero Image" class="">
            </section>

            <section class="p-8 max-w-screen-xl" style="margin: 0 auto;">
                <h2 class="text-center mt-16 mb-16 text-3xl font-bold text-bot-dark-blue uppercase">Beneficios</h2>

                <div class="benefits md:flex justify-center">
                    @include('home/benefit', 
                    [
                        "icon"=>"icon_money_a2.png",
                        "title"=>"Gana Dinero",
                        "description"=>"Recomienda el juego y gana dinero"
                    ])
     

                    @include('home/benefit', 
                    [
                        "icon"=>"icon_heart_2.png",
                        "title"=>"Aprender Valores",
                        "description"=>"Tus hijos aprenderán valores"
                    ])


                    @include('home/benefit', 
                    [
                        "icon"=>"icon_control_2.png",
                        "title"=>"Diversión",
                        "description"=>"Una forma sana de diversión"
                    ])

                </div>
                
            </section>

            <section>
                Gana Dinero
            </section>


            <section>
                Reviews
            </section>


            <section>
                Patrocinado por 
            </section>


            <section>
                Misión/Visiǿn
            </section>


        </main>
        <footer>
        </footer>

        @stack('modals')

        @livewireScripts
        @stack('scripts')

    </body>
</html>
