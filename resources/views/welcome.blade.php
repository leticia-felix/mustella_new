<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>


        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="bg-high-purplle flex justify-center items-center h-screen ">

        <div class="flex flex-col justify-center items-center h-scre text-center">

        @if(auth()->check())
    <h1 class="text-4xl font-bold text-white mb-4">Bem-vindo de volta {{ Auth::user()->name }}!<h1>
    <p class="text-xl text-white mb-8">Estamos muito felizes em tê-lo aqui. Explore nosso site.</p>

    <a href="{{ route('mustella') }}">
        <x-primary-button>
            {{ __('Entrar Novamente') }}
        </x-primary-button>
    </a>

@else
    <p class="mb-6 text-orange flex justify-center items-center text-4xl font-bold">Olá!</p>
            <p class="text-basic-gray text-xl mx-7 mb-6 ">Bem vindo(a) ao Mustela sua plataforma de estudos.</p>

            <div>
                <x-application-icon />

                @if (Route::has('login'))

                    @auth
                        <a href="{{ url('/dashboard') }}"> Dashboard </a>

                @else
                    <a href="{{ route('login') }}">
                        <button
                            type="button"
                            class="mt-4 block w-full  full rounded-full bg-orange px-6 pb-2 pt-2.5 text-base font-bold uppercase leading-normal text-purplle  ">
                            Login
                        </button>
                    </a>

            </div>

            <p class="text-basic-gray text-lg	mt-2">Ainda não está cadastrado?</p>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">
                        <p class="text-orange font-bold">CADASTRE-SE</p>
                    </a>
                @endif
                    @endauth


            <div class="flex mt-4">
                <button class="m-2">
                    <div> <x-instagram-logo/></div>
                </button>

                <button class="m-2">
                    <div > <x-email-logo/></div>
                </button>
                
            </div>
@endif
        </div>
    </body>
    </html>
@endif




















