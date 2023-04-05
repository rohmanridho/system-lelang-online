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
        <h1 class="text-center mb-4 font-bold text-2xl">Bukti menang lelang</h1>
        <div class="font-bold">Info lelang: </div>
        <p class="">Nama barang: {{ $auction->item->name }}</p>
        <p class="">Harga awal: Rp{{ number_format($auction->item->price) }}</p>
        <p class="">Harga akhir: Rp{{ number_format($auction->final_price) }}</p>
        <p class="">Tanggal dimulai lelang: {{ date('F j, Y', strtotime($auction->open)) }}</p>
        <p class="">Tanggal selesai lelang: {{ date('F j, Y', strtotime($auction->close)) }}</p>
        <br>
        <div class="font-bold">Info penanggun jawab:</div>
        <p class="">Nama: {{ $auction->staff->name }}</p>
        <p class="">Telp: {{ $auction->staff->telp ? $auction->staff->telp : '-' }}</p>
        <p class="">Email: {{ $auction->staff->email }}</p>
        <br>
        <div class="font-bold">Info pemenang:</div>
        <p class="">Nama: {{ $auction->user->name }}</p>
        <p class="">Telp: {{ $auction->user->telp ? $auction->user->telp : '-' }}</p>
        <p class="">Email: {{ $auction->user->email }}</p>
    </div>
    <script>
        window.print();
    </script>
</body>

</html>
