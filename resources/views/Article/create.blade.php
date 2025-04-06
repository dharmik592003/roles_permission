<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Articles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('Article.store') }}" method="post">
                        @csrf
                        <div class="mb-3 flex flex-col">
                            <label for="name">Author Name</label>
                            <input value="{{ old('author') }}" type="text" name="author" placeholder="Name of Author"
                                class="border-grey-300 text-[#1b1b18] shadow-sm w-1/2 rounded-lg" id="">
                            @error('author')
                                <p class="text-gray-900 font-semibold">{{ $message }}</p>
                            @enderror

                        </div>
                        <div class="mb-3 flex flex-col">
                            <label for="name">title</label>
                            <input value="{{ old('title') }}" type="text" name="title" placeholder="article title"
                                class="border-grey-300 text-[#1b1b18] shadow-sm w-1/2 rounded-lg" id="">
                            @error('title')
                                <p class="text-gray-900 font-semibold">{{ $message }}</p>
                            @enderror

                        </div>
                        <div class="mb-3 flex flex-col">
                            <label for="name">
                                Article
                            </label>
                            <textarea value="{{ old('description') }}" type="text" name="description"
                                placeholder="Article" class="border-grey-300 text-[#1b1b18] shadow-sm w-1/2 rounded-lg"
                                id=""></textarea>
                            @error('description')
                                <p class="text-gray-900 font-semibold">{{ $message }}</p>
                            @enderror

                        </div>


                        <button type="submit" class="bg-gray-500 text-sm rounded-md px-5 py-2">add</button>


                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>