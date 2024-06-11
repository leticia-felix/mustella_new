
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

            <x-msgDeletePost></x-msgDeletePost>

            
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
                            <div class="md:flex md:items-center">
                                <div>
                                    <img class="w-6rem h-6rem ml-4rem rounded-full" src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=FC9A03&color=ffffff" alt="Avatar">
                                </div>
                                <div class="ml-4 md:ml-4 text-bold sm:mt-0 md:mt-0 lg:mt-0 xl:mt-0 mt-2 text-center">
                                    <div class="sm:text-left md:text-left lg:text-left xl:text-left text-center font-bold text-2xl">{{ Auth::user()->name }}</div>
                                    <div class="text-semibold text-sm text-gray sm:text-left md:text-left lg:text-left xl:text-left text-center">
                                        <span>@</span>{{ Auth::user()->username }}
                                    </div>
                                    <div class="text-semibold text-sm text-gray sm:text-left md:text-left lg:text-left xl:text-left text-center">
                                        {{ $postCount }} Postagens
                                    </div>
                                    <div class="md:flex mt-2">
                                        
                                        <div class="md:mr-4">
                                            <a href="{{ route('profile.edit') }}" class="block text-semibold text-gray text-sm">Editar perfil</a>
                                        </div>
                                        <div>
                                            <a href="{{ route('favorites.index') }}" class="block text-semibold text-gray text-sm">Ver Posts Favoritados</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="md:px-7rem px-5 md:mt-3rem mt-10rem grid md:grid-cols-3 gap-4">
                        
                        @foreach($posts as $post)
                            <div class="shadow-none max-w-sm rounded overflow-hidden shadow-lg sm:m-4">

                                <div class="mb-3 md:mt-0 mt-4">
                                    <div class="flex items-center">
                                        <!-- circuloPerfil -->
                                        <img class="w-10 h-10 rounded-full"src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=FC9A03&color=ffffff"  alt="Avatar">
                                        
                                        <div class="flex">
                                            <div class="ml-2 text-white flex items-center">
                                                {{$post->user->username}}
                                            </div>


                                            <div class="text-purplle flex-grow relative">
                                           
                                            <x-dropdown align="left" width="48" class="">
                                                <x-slot name="trigger">
                                                    <button>
                                                        <img class="w-5 h-5 m-4 min-w-5 min-h-5" src="{{ asset('imagens/points.png') }}" alt="seta">
                                                    </button>
                                                </x-slot>
                            
                                                <div class="absolute z-50">
                                                    <x-slot name="content" class="rounded-xl absolute z-50">

                                                    <x-dropdown-link>
                                                        <a href="{{ route('posts.edit', $post->id) }}" class="ml-4 text-sm btn btn-primary font-semibold">Editar</a>

                                                    </x-dropdown-link>

                                                    <x-dropdown-link >
                                                        <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                                                                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="text-orange font-semibold text-sm mb-2" type="submit" onclick="return confirm('Tem certeza que deseja deletar este post?')">Excluir</button>
                                                        </form>
                                                    </x-dropdown-link>

                                                    </x-slot>
                                                </div>
                                               
                                            </x-dropdown>
                                            </div>

                                        </div>
                                       
                                    </div>

                                    <div class="font-bold text-xl mb-2 text-white">
                                        <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
                                    </div>
                                    
                                    



                                </div>

                                <img class="w-full h-20rem text-purplle rounded-xl" src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}">
                            </div>
                        @endforeach
                    </div>
                
            </main>
            
        </div>
    </body>
</html>