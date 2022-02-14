<x-master>
    <div class="container mx-auto flex justify-center">
        <x-panel>
            <x-slot name="heading">Register</x-slot>
            
            <form action="/register" method="POST" class="w-64">
                @csrf

                <div class="mb-6">
                    <label 
                        for="username" 
                        class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    >
                        Username
                    </label>
                    <input 
                        class="border border-gray-400 outline-gray-500 p-2 w-full"
                        type="text"
                        name="username"
                        value="{{ old('username') }}"
                        autocomplete="username"
                        autofocus
                        required
                    >
                </div>
                <div class="mb-6">
                    <label 
                        for="name" 
                        class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    >
                        Name
                    </label>
                    <input 
                        type="text" 
                        class="border border-gray-400 outline-gray-500 p-2 w-full"
                        name="name"
                        value="{{ old('name') }}"
                        autocomplete="name"
                        autofocus
                        required
                    >
                </div>
                <div class="mb-6">
                    <label 
                        for="email" 
                        class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    >
                        Email
                    </label>
                    <input 
                        type="email" 
                        class="border border-gray-400 outline-gray-500 p-2 w-full"
                        name="email"
                        value="{{ old('email') }}"
                        autocomplete="email"
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
                        type="password" 
                        class="border border-gray-400 outline-500 p-2 w-full"
                        name="password"
                        autocomplete="new-password"
                    >
                </div>
                <div class="mb-6">
                    <label 
                        class="block mb-2 uppercase font-bold text-xs text-gray-700"
                        for="password_confirmation"
                    >
                        Password Confirmation
                    </label>
                    <input 
                        type="password" 
                        class="border border-gray-400 outline-gray-500 p-2 w-full"
                        name="password_confirmation"
                        autocomplete="new-password"
                    >
                </div>
                <div>
                    <button class="bg-blue-400 hover:bg-blue-500 rounded text-white text-sm uppercase px-4 py-2">Register</button>
                </div>
            </form>
        </x-panel>
    </div>
</x-master>