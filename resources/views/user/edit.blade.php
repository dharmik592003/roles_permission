<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="/User/{{$User->id}}/update" method="post">
                        @csrf
                        <div class="mb-3 flex flex-col">
                            <label for="name">Name</label>
                            <input value="{{ $User->name }}" type="text" name="name" placeholder="User Name"
                                class="border-grey-300 text-[#1b1b18] shadow-sm w-1/2 rounded-lg" id="">
                            @error('email')
                            <p class="text-gray-900 font-semibold">{{ $message }}</p>
                            @enderror
                            <label for="name">Email</label>
                            
                            <input value="{{ $User->email }}" type="email" name="email" placeholder="User Name"
                                class="border-grey-300 text-[#1b1b18] shadow-sm w-1/2 rounded-lg" id="">
                            @error('name')
                            <p class="text-gray-900 font-semibold">{{ $message }}</p>
                            @enderror
                            <div class="mt-3 flex ">
                                @foreach ($roles as $role)
                                    <div class="m-3">
                                        <input  {{ ($hasRoles->contains($role->name))? 'checked': '' }}   type="checkbox"class='rounded' id='role-{{ $role->id }}' value="{{ $role->name }}" name="role[]" id="">
                                        <label for="role">{{ $role->name }}</label>
                                    </div>
                                @endforeach
                        </div>
                        </div>

                        <button type="submit" class="bg-gray-500 text-sm rounded-md px-5 py-2">update</button>


                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
