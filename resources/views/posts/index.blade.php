<x-layout>
    <div class="space-y-10 md:space-y-16 mb-5">
        @foreach ($posts as $post)
            {{-- <x-post :post="$post" /> --}}
            <x-post :$post list />
        @endforeach
        {{ $posts->links() }}
    </div>
</x-layout>
