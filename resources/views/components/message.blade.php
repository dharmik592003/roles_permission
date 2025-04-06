@if(Session::has('success'))
            <div class="bg-green-200 border-green-600 p-4 mb-3 overflow-hidden shadow-sm sm:rounded-lg">
                {{ Session::get('success') }}
            </div>
            @endif
            @if(Session::has('error'))
            <div class="bg-red-200 border-red-600 p-4 mb-3 overflow-hidden shadow-sm sm:rounded-lg">
                {{ Session::get('error') }}
            </div>
            @endif