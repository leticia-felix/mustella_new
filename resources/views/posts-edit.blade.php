<x-app-layout>
    <div class="py-12 text-white mt-20">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4 md:mb-0 mx-10 md:mx-20 md:text-4xl text-3xl md:flex md:w-1/3">
                <h1>Poste Seus Conteúdos</h1>
            </div>
            
            <div class="md:flex bg-high-purplle shadow-sm mx-2 md:mx-0 p-10 items-start">
                <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="w-full">
                    @csrf
                    @method('PUT')
                    <div class="flex flex-col md:flex-row items-start md:space-x-4">
                        <!-- File Input -->
                        <div class="flex items-center justify-center w-full h-22rem md:w-1/3 rounded-extra-lg bg-purplle md:mt-5">
                            
                            <label for="image" class="flex flex-col items-center justify-center w-full h-10rem rounded-lg cursor-pointer bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600">
                                <img class="w-full md:h-22rem  h-20rem text-purplle rounded-xl" src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}">
                            </label>

                        </div>


                     

                        

                        <!-- título e legenda -->
                        <div class="flex flex-col w-full md:w-2/3 space-y-4 mt-4 md:mt-0 md:mt-10">
                            <div>
                                <label for="title">Título</label>
                                <textarea
                                name="title"
                                id="title"
                                class="bg-purplle border-none rounded-xl placeholder-basic-gray mt-2 h-20 w-full focus:ring-0 resize-none" placeholder="Título" required>{{$post->title}}</textarea>
                            </div>
                            <div>
                                <label for="caption">Legenda</label>
                                <textarea
                                name="caption"
                                id="caption"
                                class="bg-purplle border-none rounded-xl placeholder-basic-gray mt-2 h-20 w-full focus:ring-0 resize-none" placeholder="Legenda" required>{{$post->caption}}</textarea>
                            </div>

                        </div>
                    </div>
                    <div class="flex justify-end mt-4">
                        <x-primary-button type="submit" class="bg-orange border-none text-white px-4 py-2 rounded">Atualizar</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
