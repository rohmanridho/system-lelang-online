<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $historiesOn = History::with(['items', 'auctions', 'user'])->where('user_id', Auth::user()->id)->whereHas('auctions', function($auction){
            $auction->where('status', 'open');
        })->get()->unique('auction_id');
        $historiesEnd = History::with(['items', 'auctions', 'user'])->where('user_id', Auth::user()->id)->whereHas('auctions', function($auction){
            $auction->where('status', 'close');
        })->get();
        return view('pages.history', [
            'historiesOn' => $historiesOn,
            'historiesEnd' => $historiesEnd
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
    public function show(History $history)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(History $history)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, History $history)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(History $history)
    {
        //
    }
}
