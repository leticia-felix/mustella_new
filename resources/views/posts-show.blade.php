<x-app-layout>
    <div class="mt-20 py-12 px-8 text-white flex md:min-h-auto">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-transparent shadow-sm">
                <div class="container mx-auto">
                    <div class="max-w-full rounded overflow-hidden shadow-lg sm:m-4">
                        <div class="mb-3">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-orange rounded-full"></div>
                                <div class="ml-2 text-white">
                                    {{ $post->user->name }}
                                </div>
                            </div>
                            <div class="font-bold text-xl mb-2 text-white">
                                {{ $post->title }}
                            </div>
                            <p class="text-base text-orange">
                                {{ $post->caption }}
                            </p>
                        </div>
                        <img class="w-full text-purple rounded-xl" src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
