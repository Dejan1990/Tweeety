<x-app>
    <div>
        @forelse ($users as $user)
            {{-- @if (current_user()->isNot($user)) --}}
                <a href="{{ $user->path }}" class="flex items-center mb-5">
                    <img 
                        src="{{ $user->avatar }}" 
                        alt="{{ $user->username }}" 
                        class="rounded mr-4"
                        width="60"
                    >
                    <div>
                        <h4 class="font-bold">{{ '@'. $user->username }}</p>
                    </div>
                </a>
            {{-- @endif --}}
        @empty
            <p>There is no users yet!!!</p>
        @endforelse

        {{ $users->links() }}
        
    </div>
</x-app>