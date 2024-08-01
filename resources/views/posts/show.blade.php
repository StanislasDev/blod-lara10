<x-default-layout :title="$post->title">
    <div class="space-y-10 md:space-y-16 mb-5">
        {{-- Début du post --}}
        <x-post :$post />
        {{-- Fin du post --}}
        @auth
            <form action="{{ route('posts.comment', ['post'=>$post]) }}" method="POST">
                @csrf
                <div class="flex h-12">
                    <input type="text"
                        class="w-full bg-slate-50 rounded-lg px-5 text-slate-900 focus:outline focus:outline-2 focus:outline-indigo-500"
                        name="comment" placeholder="Quelque chose à rajouter ?" autocomplete="off">
                    <button class="ml-2 w-12 flex justify-center items-center shrink-0 bg-indigo-700 rounded-full text-indigo-50">
                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" stroke-width="1.5" stroke="currentColor"
                            viewBox="0 0 980.000000 978.000000">

                            <g stroke-linecap="round" stroke-linejoin="round" transform="translate(0.000000,978.000000) scale(0.100000,-0.100000)" fill="#fff"
                                stroke="none">
                                <path d="M4266 9769 c-1645 -111 -3104 -1076 -3815 -2524 -212 -430 -354 -902-416 -1375 -96 -739 23 -1513 345 -2237 293 -659 775 -1274 1356 -1732 l81-64 -49 -151 c-147 -452 -228 -950 -228 -1395 0 -86 3 -186 6 -222 l7 -65 125 93 c538 402 1196 723 1819 889 l135 36 117 -21 c375 -67 456 -73 1071 -78 581-5 752 1 1038 37 898 115 1732 478 2427 1058 149 124 452 436 581 598 361 450 624 956 773 1484 112 397 161 769 161 1220 0 640 -106 1189 -331 1723 -603 1429 -1919 2429 -3529 2681 -267 42 -382 48 -970 51 -316 2 -633 -1 -704 -6z m1464 -427 c332 -42 633 -110 924 -209 1451 -492 2490 -1691 2710 -3126 35-226 46 -383 46 -637 0 -254 -11 -411 -46 -637 -172 -1123 -852 -2119 -1866-2734 -537 -326 -1134 -525 -1813 -606 -129 -15 -238 -18 -765 -18 -623 0-672 2 -940 41 -111 16 -270 46 -344 65 -38 9 -57 7 -142 -16 -473 -126 -1052-366 -1459 -603 -38 -23 -71 -39 -73 -37 -8 7 69 278 113 400 76 209 208 496 319 692 l36 63 -43 26 c-333 209 -588 413 -837 671 -622 644 -995 1438 -1102 2348 -21 180 -16 559 10 755 66 490 187 883 403 1310 359 709 912 1291 1620 1705 511 300 1146 503 1729 554 69 6 141 13 160 15 19 2 296 3 615 1 516 -2 598 -5 745 -23z" />
                                <path d="M2890 5805 c-261 -59 -432 -309 -392 -572 64 -414 567 -579 863 -284 187 187 200 474 31 687 -109 138 -322 210 -502 169z" />
                                <path d="M4934 5805 c-257 -56 -434 -309 -395 -565 23 -149 95 -270 208 -346 89 -61 162 -85 268 -91 160 -9 290 42 395 154 98 104 140 209 140 348 0 150-44 259 -145 360 -127 127 -297 178 -471 140z" />
                                <path d="M6973 5805 c-255 -55 -425 -301 -393 -563 45 -355 432 -551 752 -380 111 59 211 186 244 312 21 77 18 212 -6 288 -53 173 -200 306 -379 344 -81 17-137 17 -218 -1z" />
                            </g>
                        </svg>
                    </button>
                </div>
                @error( 'comment' )
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </form>
        @endauth
        <div class="space-y-8">
            @foreach ($post->comments as $comment)
                <div class="flex bg-slate-50 p-6 rounded-lg">
                    <img class="w-10 h-10 sm:w-12 sm:h-12 object-cover rounded-full" src="{{ Gravatar::get($comment->user->email)}}" alt="Image de profil de {{ $comment->user->name}}">
                    <div class="ml-4 flex flex-col">
                        <div class="flex flex-col sm:flex-row sm:items-center">
                            <h2 class="font-bold text-slate-900 text-2xl">{{ $comment->user->name}}</h2>
                            <time class="mt-2 sm:mt-0 sm:ml-4 text-xs text-slate-400" datetime="{{ $comment->created_at }}">@datetime($comment->created_at)</time>
                        </div>
                        <p class="mt-4 text-slate-800 sm:leading-loose">{{ $comment->content}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-default-layout>
