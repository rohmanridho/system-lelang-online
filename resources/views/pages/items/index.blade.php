@extends('layouts.dashboard')

@section('title', 'Items - index')

@section('content')
<div class="container grid px-6 mx-auto">
    @if ($items->count() != 0)
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Items - index
    </h2>
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-purple-100">
                        <th class="px-4 py-3">No</th>
                        <th class="px-2 py-3">Image</th>
                        <th class="px-2 py-3">Name</th>
                        <th class="px-4 py-3">Description</th>
                        <th class="px-4 py-3">Price</th>
                        <th class="px-4 py-3">Status</th>
                        @if (Auth::user()->level == 'admin')
                        <th class="px-4 py-3">Staff</th>
                        @endif
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y">
                    @foreach ($items as $item)
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3">
                            {{ $loop->iteration }}
                        </td>
                        <td class="px-2 py-2.5 text-sm">
                            <img src="{{ Storage::url($item->image) }}" alt=""
                                class="h-16 aspect-4/3 object-cover rounded-md">
                        </td>
                        <td class="px-2 py-2.5 text-sm font-semibold truncate" style="max-width: 15ch">
                            {{ $item->name }}
                        </td>
                        <td class="px-4 py-2.5 text-sm truncate" style="max-width: 25ch">
                            {{ $item->desc }}
                        </td>
                        <td class="px-4 py-2.5 text-sm">
                            Rp{{ number_format($item->price) }}
                        </td>
                        <td class="px-4 py-2.5 text-xs">
                            <span
                                class="px-2 py-1 font-semibold leading-tight {{ $item->auction->status == 'open' ? 'text-green-700 bg-green-100' : 'text-red-700 bg-red-100' }} rounded-full">
                                {{ $item->auction->status == 'open' ? 'sale' : 'sold' }}
                            </span>
                        </td>
                        @if (Auth::user()->level == 'admin')
                        <td class="px-4 py-2.5 text-sm">
                            {{ $item->auction->staff->name }}
                        </td>
                        @endif
                        <td class="px-4 py-2.5">
                            <div class="flex items-center space-x-4 text-sm">
                                <a href="{{ route('items.edit', $item->id) }}" class="text-sm font-medium text-purple-600 hover:underline">
                                    Edit
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @else
    <div class="text-center font-medium text-xl text-purple-900/75 mt-4">No item</div>
    @endif
</div>
@endsection
