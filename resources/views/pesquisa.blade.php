<x-app-layout>

<x-addPost></x-addPost>

    <div class="mt-20 py-12  px-8 text-white flex md:min-h-auto">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-transparent shadow-sm">
                <div class="container mx-auto">

                    <div class="grid md:grid-cols-3 gap-4">

                        @if($posts->isEmpty())
                        <div class="flex justify-center justify-self-center" >
                            <div class="text-start text-white">
                                <p>Ainda não temos nenhum post cadastrado sobre este assunto :(</p>
                            </div>
                        </div>
                           
                        @else
                        @foreach($posts as $post)

                            <div class="max-w-sm rounded overflow-hidden shadow-lg sm:m-4">

                                <div class="mb-3">
                                    <div class="flex items-center">
                                        <!-- circuloPerfil -->
                                        <div class="w-10 h-10 bg-orange rounded-full"></div>

                                        <a href="{{ route('user.profile', $post->user->id) }}">
                                            <div class="ml-2 text-white">
                                                {{$post->user->username}}
                                            </div>
                                        </a>
                                    </div>
                                    <div class="font-bold text-xl mb-2 text-white">
                                        <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
                                    </div>
                                    <p class=" text-base php artisan storage:link text-orange
                                    ">{{ $post->caption }}</p>

                                </div>
                                <img class="w-full md:h-22rem  h-20rem text-purplle rounded-xl" src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}">
                            </div>
                        @endforeach
                    </div>
                    @endif
                       
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

