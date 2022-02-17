<div class="border border-gray-300">
    @forelse ($tweets as $tweet)
        @include('partials/_tweet')
    @empty
        <p class="p-4">No tweets yet.</p>
    @endforelse

    {{ $tweets->links() }}
</div>