<div class="bg-gray-200 border border-gray-300 rounded-lg py-4 px-6">
    <h3 class="font-bold text-xl mb-4">Following</h3>

    <ul>
        @foreach (current_user()->follows as $user)
            <li class="{{ $loop->last ? '' : 'mb-4' }}">
                <a href="{{ $user->path }}" class="flex items-center text-sm">
                    <img 
                        src="{{ $user->avatar }}" 
                        alt="{{ $user->username }}" 
                        class="rounded-full mr-2"
                        width="40"
                        height="40"
                    >
                        {{ $user->username }}
                </a>
            </li>
        @endforeach
    </ul>
</div>