<x-frontend-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if ($auctionsEnd->count() != 0)
        <div class="mb-4">
            <h2 class="mt-8 mb-4 text-2xl font-bold">Lelang berakhir</h2>
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3">
                @foreach($auctionsEnd as $auction)
                <div class="block rounded-lg border border-purple-100 bg-white p-5 shadow">
                    <div class="aspect-4/3 w-full overflow-hidden rounded-md bg-purple-600">
                        <img class="h-full w-full object-cover" src="{{ Storage::url($auction->item->image) }}"
                            loading="lazy" />
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('detail', $auction->id) }}"
                            class="mb-3 inline-block truncate text-2xl font-bold tracking-tight text-purple-900 w-full">
                            {{
                            $auction->item->name }} </a>
                        <div class="mb-3 flex">
                            <div class="w-1/2">
                                <div class="mb-1 text-sm font-semibold text-purple-900/75">Pemenang</div>
                                <div
                                    class="truncate rounded-l-md border-r bg-purple-50 py-2.5 px-4 text-slate-800 hover:bg-purple-100">
                                    {{ $auction->user_id ? $auction->user->name : '-' }}
                                </div>
                            </div>
                            <div class="w-1/2">
                                <div class="mb-1 text-sm font-semibold text-purple-900/75">Harga akhir</div>
                                <div
                                    class="truncate rounded-r-md bg-purple-50 py-2.5 px-4 text-slate-800 hover:bg-purple-100">
                                    Rp{{ number_format($auction->final_price) }}
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <div class="mb-1 text-sm font-semibold text-purple-900/75">Deskripsi</div>
                            <p
                                class="truncate rounded-md bg-purple-50 py-2.5 px-4 font-normal text-slate-700 hover:bg-purple-100">
                                {{ $auction->item->desc }}
                            </p>
                        </div>
                        <a href="{{ route('detail', $auction->id) }}"
                            class="block rounded-lg bg-purple-600 py-2.5 text-center text-sm font-medium uppercase text-white hover:bg-purple-700">
                            lihat detail</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @else
        <div class="text-center font-medium text-xl text-purple-900/75 mt-4">No auction</div>
        @endif
    </div>
</x-frontend-layout>