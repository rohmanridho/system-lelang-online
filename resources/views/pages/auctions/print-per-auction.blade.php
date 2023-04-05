<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="container mx-auto">
        <h1 class="text-center mb-4 font-bold text-2xl">Auction</h1>
        <div class="mb-4">
            <div class="font-bold">Info lelang: </div>
            <p class="">Nama barang: {{ $auction->item->name }}</p>
            <p class="">Status: {{ $auction->status }}</p>
            <p class="">Harga awal: Rp{{ number_format($auction->item->price) }}</p>
            <p class="">Harga akhir: Rp{{ $auction->final_price ? number_format($auction->final_price) : '-'}}</p>
            <p class="">Tanggal dimulai lelang: {{ date('F j, Y', strtotime($auction->open)) }}</p>
            <p class="">Tanggal selesai lelang: {{ $auction->close ? date('F j, Y', strtotime($auction->close)) : '-' }}</p>
            <br>
            @if (Auth::user()->level == 'admin')
            <div class="font-bold">Info penanggun jawab:</div>
            <p class="">Nama: {{ $auction->staff->name }}</p>
            <p class="">Telp: {{ $auction->staff->telp ? $auction->staff->telp : '-' }}</p>
            <p class="">Email: {{ $auction->staff->email }}</p>
            <br>
            @endif
            @if ($auction->close)
            <div class="font-bold">Info pemenang:</div>
            <p class="">Nama: {{ $auction->user_id ? $auction->user->name : '-' }}</p>
            <p class="">Telp: {{ $auction->user_id ? ($auction->user->telp ? $auction->user->telp : '-') : '-' }}</p>
            <p class="">Email: {{ $auction->user_id ? $auction->user->email : '-' }}</p>
            @endif
        </div>
        <div class="w-full overflow-hidden border border-black">
            <div class="w-full overflow-x-auto">
                <table class="w-full table-auto">
                    <thead>
                        <tr class="text-xs tracking-wide text-left text-gray-500 uppercase border-b border-black">
                            <th class="px-4 py-3 border-r border-black">No</th>
                            <th class="px-4 py-3 border-r border-black">User</th>
                            <th class="px-4 py-3">Bid</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                        @foreach ($histories as $history)
                        <tr class="text-gray-700">
                            <td class="px-4 py-2 text-sm border-r border-black">
                                {{ $loop->iteration }}
                            </td>
                            <td class="px-4 py-2 text-sm border-r border-black">
                                {{ $history->user->name }}
                            </td>
                            <td class="px-4 py-2 text-sm border-black">
                                IDR {{ number_format($history->bid) }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        window.print();
    </script>
</body>

</html>