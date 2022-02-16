@if (current_user()->isNot($user))
    <form action="{{ route('follow', $user) }}" method="POST">
        @csrf

        <button 
            type="submit" 
            class="bg-blue-500 rounded-full shadow py-2 px-4 text-white text-xs"
        >
            {{ current_user()->following($user) ? 'Unfollow Me' : 'Follow Me' }}
        </button>
    </form>
@endif