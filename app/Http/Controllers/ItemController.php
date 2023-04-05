<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Auction;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->level == 'admin') {
            $items = Item::with(['auction.staff'])->get();
        }

        if (Auth::user()->level == 'staff') {
            $items = Item::with(['auction'])->whereHas('auction', function($auction){
                $auction->where('staff_id', Auth::user()->id);
            })->get();
        }

        return view('pages.items.index', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $auction = Auction::where('item_id', $id)->first();

        if ($auction->status == 'close' && $auction->user_id != null) {
            return redirect()->back();
        }

        $item = Item::find($id);
        return view('pages.items.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'nullable',
            'desc' => 'required',
            'price' => ['required', 'numeric']
        ]);

        $data = $request->all();

        if ($request->file('image')) {
            $data['image'] = $request->file('image')->store('item', 'public');
        }

        $item = Item::find($id);
        $item->update($data);
        $histories = History::where('item_id', $id)->where('bid', '<', $request->price);
        $histories->delete();

        return redirect()->route('items.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        //
    }
}
