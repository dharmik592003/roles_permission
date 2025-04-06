<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Permissions') }}
            </h2>
            <a href="{{ route('Role.create') }}" class="bg-blue-500">create</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-message></x-message>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Role name
                </th>
                <th scope="col" class="px-6 py-3">
                    permissions
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
            @foreach ( $Roles as $Role )
            
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$Role->name}}
                </th>
                <td class="px-6 py-4">
                    {{$Role->permissions->pluck('name')->implode(', ')}}
                </td>
                <td class="px-6 py-4">
                    {{$Role->created_at->format('d M,Y')}}
                </td>
                <td class="px-6 py-4">
                   <a href="/Role/{{$Role->id}}/edit"class="bg-blue-700 text-white px-3 py-2 m-2">edit</a><a href="/Role/{{$Role->id}}/delete"class="bg-red-700 text-white px-3 py-2 m-2">delete</a>
                </td>   
            </tr>
            @endforeach

            
        </tbody>
    </table>
        </div>
    </div>
</x-app-layout>