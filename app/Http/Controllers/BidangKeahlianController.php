<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBidangKeahlianRequest;
use App\Http\Requests\UpdateBidangKeahlianRequest;
use App\Models\BidangKeahlian;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class BidangKeahlianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function read()
    {
        return view('analisis-data',[
            'bidangKeahlians' => BidangKeahlian::all(),
        ]);
    }
    public function readKeahlian($keahlian)
    {
        // dd(User::get());
        $keahlian = BidangKeahlian::where('nama', $keahlian)->first();
        return view('analisis-data-search',[
            'users' => User::where('bidangKeahlian_id', $keahlian->id)->where('id', '!=', Auth::user()->id)->get(),
            'keahlian' => $keahlian,
            'back' => '/dashboard/analisis-data'
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
    public function store(StoreBidangKeahlianRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(BidangKeahlian $bidangKeahlian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BidangKeahlian $bidangKeahlian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBidangKeahlianRequest $request, BidangKeahlian $bidangKeahlian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BidangKeahlian $bidangKeahlian)
    {
        //
    }
}
