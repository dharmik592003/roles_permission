<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('User.store') }}" method="post">
                        @csrf
                        <div class="mb-3 flex flex-col">
                            <label for="name">Name</label>
                            <input value="{{ old('name') }}" type="text" name="name" placeholder="Name of User"
                                class="border-grey-300 text-[#1b1b18] shadow-sm w-1/2 rounded-lg" id="">
                            @error('name')
                                <p class="text-gray-900 font-semibold">{{ $message }}</p>
                            @enderror

                        </div>
                        <div class="mb-3 flex flex-col">
                            <label for="name">Email</label>
                            <input value="{{ old('email') }}" type="email" name="email" placeholder="User Email"
                                class="border-grey-300 text-[#1b1b18] shadow-sm w-1/2 rounded-lg" id="">
                            @error('email')
                                <p class="text-gray-900 font-semibold">{{ $message }}</p>
                            @enderror

                        </div>
                        <div class="mb-3 flex flex-col">
                            <label for="name">
                                Password
                            </label>
                            <input value="{{ old('password') }}" type="password" name="password" placeholder="User Password"
                                class="border-grey-300 text-[#1b1b18] shadow-sm w-1/2 rounded-lg" id="">
                            @error('password')
                                <p class="text-gray-900 font-semibold">{{ $message }}</p>
                            @enderror

                        </div>
                        <div class="mb-3 flex flex-col">
                            <label for="name">
                                Confirm Password
                            </label>
                            <input value="{{ old('password_confirmation') }}" type="password" name="password_confirmation" placeholder="Confirm User Password"
                                class="border-grey-300 text-[#1b1b18] shadow-sm w-1/2 rounded-lg" id="">
                            @error('password_confirmation')
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