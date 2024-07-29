<x-layout>
    <div class="space-y-10 md:space-y-16 mb-5">
        @forelse ($posts as $post)
            {{-- <x-post :post="$post" /> --}}
            <x-post :$post list />
            @empty
            <p class="text-center text-slate-400">Aucun résultat.</p>
        @endforelse
        {{ $posts->links() }}
    </div>
</x-layout>
