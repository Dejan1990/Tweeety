<x-master>
    <div class="container mx-auto flex justify-center">
        <x-panel>
            <x-slot name="heading">Login</x-slot>

            <form action="/login" method="POST" class="w-64">
                @csrf

                <div class="mb-6">
                    <label 
                        for="username" 
                        class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    >
                        Username
                    </label>
                    <input 
                        type="text" 
                        class="border border-gray-400 outline-gray-500 p-2 w-full"
                        name="username"
                        value="{{ old('username') }}"
                        autocomplete="username"
                        autofocus
                        required
                    >
                </div>
                <div class="mb-6">
                    <label 
                        for="password" 
                        class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    >
                        Password
                    </label>
                    <input 
                        type="text" 
                        class="border border-gray-400 outline-gray-500 p-2 w-full"
                        name="password"
                        required
                    >
                </div>
                <div>
                    <button type="submit" class="bg-blue-400 hover:bg-blue-500 text-xs uppercase text-white tracking-wider px-4 py-2">Login</button>
                </div>
            </form>
        </x-panel>
    </div>
</x-master>