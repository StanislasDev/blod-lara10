<x-default-layout :title="$post->title">
    <div class="space-y-10 md:space-y-16 mb-5">
        {{-- Début du post --}}
        <x-post :$post />
        {{-- Fin du post --}}
    </div>
</x-default-layout>
