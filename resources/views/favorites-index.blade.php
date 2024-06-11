
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
            

            <main class="pt-10 pb-5 bg-high-purplle border-none w-full z-50border-white">
            
            <x-addPost></x-addPost>

            
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="h-16">
                    <div class="flex md:flex-row justify-between">


                        <!-- Navigation Links -->
                        <div class="flex justify-center items-center space-x-8 sm:-my-px sm:ms-10 sm:flex text-white">
                            <x-nav-link :href="route('mustella')" :active="request()->routeIs('mustella')">
                                <img class="w-10 h-10 min-w-10 min-h-10" src="{{ asset('imagens/seta.png') }}" alt="seta">
                            </x-nav-link>
                        </div>

                        <div class="hidden sm:flex sm:items-center sm:ms-6 rounded-full my-9 text-black">
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button>
                                        <img class="w-7 h-7 m-4 min-w-8 min-h-8" src="{{ asset('imagens/menu.png') }}" alt="seta">
                                    </button>
                                </x-slot>

                                <x-slot name="content">

                                    <x-dropdown-link :href="route('perfil')">
                                        {{ __('Perfil') }}
                                    </x-dropdown-link>

                                    <x-dropdown-link :href="route('profile.edit')">
                                        {{ __('Configurações') }}
                                    </x-dropdown-link>

                                    <x-dropdown-link :href="route('mustella')">
                                        {{ __('Tela Inicial') }}
                                    </x-dropdown-link>

                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-dropdown-link :href="route('logout')"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        </div>

                        <!-- Hamburger -->
                        <div class="-me-2 flex items-center sm:hidden text-white">
                            <button @click="open = ! open">
                                <img class="w-7 h-7 m-4 min-w-8 min-h-8" src="{{ asset('imagens/menu.png') }}" alt="seta">
                            </button>
                        </div>
                    </div>
                </div>
            
                <!-- Responsive Navigation Menu -->
                <div :class="{'block': open, 'hidden': ! open}" class="hidden text-white sm:hidden">
            
                    <div class="pt-2 pb-3 space-y-1">
                        <x-responsive-nav-link :href="route('mustella')" :active="request()->routeIs('mustella')">
                            {{ __('mustella') }}
                        </x-responsive-nav-link>
                    </div>
            
                    <!-- Responsive Settings Options -->
                    <div class="pt-1 pb-1 border-none border-gray-200">
                      
            
                        <div class="space-y-1">
                            <x-responsive-nav-link :href="route('perfil')">
                            {{ __('Perfil') }}
                            </x-responsive-nav-link>
                        </div>
            
                        <div class="mt-1 space-y-1">
                            <x-responsive-nav-link :href="route('profile.edit')">
                                {{ __('Configurações') }}
                            </x-responsive-nav-link>
                        </div>
            
                        <div class="mt-1 mb-1 space-y-1">
                            <x-responsive-nav-link :href="route('mustella')">
                                {{ __('Tela Inicial') }}
                            </x-responsive-nav-link>
                        </div>
            
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
            
                                <x-responsive-nav-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-responsive-nav-link>
                            </form>
                        </div>
                    </div>
                </div>

                    </div>
                </div>
            </div>
            
            <div class=" md:px-7rem px-5 md:mt-3rem mt-10rem grid md:grid-cols-3 gap-4 md:text-4xl text-3xl  text-white">
                <h1>Posts favoritados   </h1>
            </div>
           
            
            <div class="md:px-7rem px-5 md:mt-3rem mt-10rem grid md:grid-cols-3 gap-4">

                
                        
                @if($favorites->isEmpty())
                <p class="text-white">Você ainda não favoritou nenhum post.</p>
                @else
                @foreach($favorites as $post)

                <div class="shadow-none max-w-sm rounded overflow-hidden shadow-lg sm:m-4">

                    <div class="mb-3 md:mt-0 mt-4">
                        <div class="flex items-center">
                            <!-- circuloPerfil -->
                            <img class="w-10 h-10 rounded-full"src="https://ui-avatars.com/api/?name={{ $post->user->name }}&background=FC9A03&color=ffffff"  alt="Avatar">
                            <div class="flex">
                                <a href="{{ route('user.profile', $post->user->id) }}">
                                    <div class="ml-2 text-white">
                                        {{$post->user->username}}
                                    </div>
                                </a>


                            </div>
                           
                        </div>

                        <div class="font-bold text-xl mb-2 text-white">
                            <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
                        </div>
                        
                     



                    </div>

                    <img class="w-full h-20rem text-purplle rounded-xl" src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}">
                </div>

                @endforeach
                @endif

                        
            </div>
                
            </main>
            
        </div>
    </body>
</html>