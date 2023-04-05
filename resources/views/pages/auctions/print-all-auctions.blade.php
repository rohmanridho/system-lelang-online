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
        <h1 class="text-center mb-4 font-bold text-2xl">All auctions</h1>
        <div class="w-full overflow-hidden border border-black">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-xs tracking-wide text-left text-gray-500 uppercase border-b border-black">
                            <th class="px-4 py-3 border-r border-black">No</th>
                            <th class="px-4 py-3 border-r border-black">Item</th>
                            @if (Auth::user()->level == 'admin')
                            <th class="px-4 py-3 border-r border-black">Staff</th>
                            @endif
                            <th class="px-4 py-3 border-r border-black">Winner</th>
                            <th class="px-4 py-3 border-r border-black">Price</th>
                            <th class="px-4 py-3 border-r border-black">Status</th>
                            <th class="px-4 py-3 border-l border-black">Date</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                        @foreach ($auctions as $auction)
                        <tr class="text-gray-700">
                            <td class="px-4 py-3 text-sm font-semibold border-r border-black">
                                {{ $loop->iteration }}
                            </td>
                            <td class="px-4 py-3 text-sm font-semibold border-r border-black">
                                {{ $auction->item->name }}
                            </td>
                            @if (Auth::user()->level == 'admin')
                            <td class="px-4 py-3 text-sm border-r border-black">
                                {{ $auction->staff->name }}
                            </td>
                            @endif
                            <td class="px-4 py-3 text-sm border-r border-black">
                                {{ $auction->user_id ? $auction->user->name : '-' }}
                            </td>
                            <td class="px-4 py-3 text-sm border-r border-black">
                                Rp{{ $auction->final_price ? number_format($auction->final_price) . ($auction->close ? ' (Final)' : ' (Sementara)') :
                            number_format($auction->item->price) . ($auction->close ? '' : ' (Awal)') }}
                            </td>
                            <td class="px-4 py-3 text-sm font-semibold border-r border-black">
                                {{ $auction->status }}
                            </td>
                            <td class="px-4 py-3 text-sm border-l border-black">
                                {{ $auction->close ? date('d-m-y', strtotime($auction->close)) : '-' }}
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
