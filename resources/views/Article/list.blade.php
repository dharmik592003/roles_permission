<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Permissions') }}
            </h2>
            <a href="{{ route('Article.create') }}" class="bg-blue-500">create</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <x-message></x-message>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    author name
                </th>
                <th scope="col" class="px-6 py-3">
                   title
                </th>
                <th scope="col" class="px-6 py-3">
                    article
                </th>
                <th scope="col" class="px-6 py-3">
                    Created at
                </th>
              
                <th scope="col" class="px-6 py-3">
                   action   
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $articles as $article )
            
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$article->author}}
                </th>
                <td class="px-6 py-4">
                    {{$article->title}}
                </td>
                <td class="px-6 py-4">
                    {{$article->description}}
                </td>
                <td class="px-6 py-4">
                    {{$article->created_at->format('d M,Y')}}
                </td>
                <td class="px-6 py-4">
                   <a href="/Article/{{$article->id}}/edit"class="bg-blue-700 text-white px-3 py-2 m-2">edit</a><a href="/Article/{{$article->id}}/delete"class="bg-red-700 text-white px-3 py-2 m-2">delete</a>
                </td>   
            </tr>
            @endforeach

            
        </tbody>
    </table>
        </div>
    </div>
</x-app-layout>