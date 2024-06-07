
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Mustella') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-high-purplle">
        <div class="bg-gray-100 text-white">
            

            <main class="pt-10 pb-5 bg-high-purplle border-none fixed top-0 left-0 w-full z-50border-white">
            
            <x-addPost></x-addPost>

            
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex md:flex-row">


                        <!-- Navigation Links -->
                        <div class="flex justify-center items-center space-x-8 sm:-my-px sm:ms-10 sm:flex text-white">
                            <x-nav-link :href="route('mustella')" :active="request()->routeIs('mustella')">
                                <img class="w-10 h-10 min-w-10 min-h-10" src="{{ asset('imagens/seta.png') }}" alt="seta">
                            </x-nav-link>
                        </div>

                        <div class="mb-3 md:ml-0 ml-10 flex justify-center">
                            <div class="md:flex md:items-center ">
                                <div class="w-6rem h-6rem ml-5rem bg-orange rounded-full">
                                    <!-- circuloPerfil -->
                                </div>
                                
                                <div class="ml-3rem md:ml-4 text-bold sm:mt-0 md:mt-0 lg:mt-0 xl:mt-0 mt-2 text-center">
                                    <div class="sm:text-left md:text-left lg:text-left xl:text-left text-center font-bold text-2xl">{{ Auth::user()->name }}</div>

                                    <div class="flex">
                                    
                                        <p class="text-semibold text-sm text-gray">
                                            {{ $postCount }} Postagens 
                                        </p>
                                    
                                    </div>

                                    <a class="text-white" href="{{ route('perfil.update') }}">Editar perfil</a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid md:grid-cols-3 gap-4">
                        
                        @foreach($posts as $post)
                            <div class="max-w-sm rounded overflow-hidden shadow-lg sm:m-4">

                                <div class="mb-3">
                                    <div class="flex items-center">
                                        <!-- circuloPerfil -->
                                        <div class="w-10 h-10 bg-orange rounded-full"></div>

                                        <div class="ml-2 text-white">
                                            {{$post->user->name}}
                                        </div>
                                    </div>
                                    <div class="font-bold text-xl mb-2 php artisan  text-white storage:link
                                    ">{{ $post->title }}</div>
                                    <p class=" text-base php artisan storage:link text-orange
                                    ">{{ $post->caption }}</p>
                                    <p class=" text-base php artisan storage:link text-orange
                                    ">{{ $post->tags }}</p>

                                </div>
                                <img class="w-full text-purplle rounded-xl" src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}">
                            </div>
                        @endforeach
                    </div>
                
            </main>
            
        </div>
    </body>
</html>