<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Auction;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuctionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->level == 'staff') {
            $auctions = Auction::with(['item', 'staff', 'user'])->where('staff_id', Auth::user()->id)->get();
        }

        if (Auth::user()->level == 'admin') {
            $auctions = Auction::with(['item', 'staff', 'user'])->get();
        }

        return view('pages.auctions.index', [
            'auctions' => $auctions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.auctions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'image' => 'required',
            'desc' => 'required'
        ]);
        $item_data = [
            'image' => $request->file('image')->store('item', 'public'),
            'name' => $request->name,
            'price' => $request->price,
            'desc' => $request->desc
        ];
        $item_id = Item::create($item_data)->id;

        $auction_data = [
            'item_id' => $item_id,
            'staff_id' => Auth::user()->id,
            'open' => now()
        ];
        Auction::insert($auction_data);

        return redirect()->route('auctions.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $auction = Auction::find($id);
        $histories = History::with(['items', 'auctions', 'user'])->where('auction_id', $id)->orderByDesc('bid')->paginate(10);
        return view('pages.auctions.show', [
            'auction' => $auction,
            'histories' => $histories
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Auction $auction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Auction $auction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Auction $auction)
    public function destroy(string $id)
    {
        $auction = Auction::find($id);
        if ($auction->status == 'close' && $auction->user_id != null) {
            return redirect()->back();
        }

        $item = Item::find($auction->item_id);
        $item->delete();
        $auction->delete();
        return redirect()->back();
    }

    public function closeOpen(Request $request, $id)
    {
        $auction = Auction::find($id);

        if ($auction->user_id != null && $auction->final_price != null) {
            $auction->update([
                'status' => 'close',
                'close' => now()
            ]);
        }
        // else {
        //     $auction->update([
        //         'status' => 'open',
        //         'close' => null
        //     ]);
        // }
        return redirect()->back();
    }

    public function printAllAuctions()
    {
        if (Auth::user()->level == 'admin') {
            $auctions = Auction::with(['item', 'staff', 'user'])->get();
        }

        if (Auth::user()->level == 'staff') {
            $auctions = Auction::with(['item', 'user'])->where('staff_id', Auth::user()->id)->get();
        }

        return view('pages.auctions.print-all-auctions', [
            'auctions' => $auctions
        ]);
    }

    public function printPerAuction($id)
    {
        $auction = Auction::with(['item', 'staff'])->find($id);
        $histories = History::with(['user'])->where('auction_id', $id)->orderByDesc('bid')->take(10)->get();
        return view('pages.auctions.print-per-auction', [
            'auction' => $auction,
            'histories' => $histories
        ]);
    }

    public function deleteHistory($id)
    {
        $history = History::find($id);
        $auctionId = $history->auction_id;
        $history->delete();
        $hasHistories = History::where('auction_id', $auctionId)->orderByDesc('bid')->first();
        if ($hasHistories) {
            Auction::where('id', $auctionId)->update([
                'user_id' => $hasHistories->user_id,
                'final_price' => $hasHistories->bid
            ]);
        } else {
            Auction::where('id', $auctionId)->update([
                'user_id' => NULL,
                'final_price' => NULL
            ]);
        }
        return redirect()->back();
    }
}
