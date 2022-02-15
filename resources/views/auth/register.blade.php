<x-master>
    <div class="container mx-auto flex justify-center rounded-lg">
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
                        class="border border-gray-400 outline-gray-500 p-2 w-full @error('username') border border-red-500 @enderror"
                        type="text"
                        name="username"
                        value="{{ old('username') }}"
                        
                    >

                    @error('username')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
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
                        class="border border-gray-400 outline-gray-500 p-2 w-full @error('name') border border-red-400 @enderror"
                        name="name"
                        value="{{ old('name') }}"
                        
                    >

                    @error('name')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
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
                        class="border border-gray-400 outline-gray-500 p-2 w-full @error('email') border border-red-400 @enderror"
                        name="email"
                        value="{{ old('email') }}"
                        
                    >

                    @error('email')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
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
                        class="border border-gray-400 outline-gray-500 p-2 w-full @error('password') border border-red-400 @enderror"
                        name="password"
                    >

                    @error('password')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
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
                    >

                    @error('password_confirmation')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <button class="bg-blue-400 hover:bg-blue-500 rounded text-white text-sm uppercase px-4 py-2">Register</button>
                </div>
            </form>
        </x-panel>
    </div>
</x-master>