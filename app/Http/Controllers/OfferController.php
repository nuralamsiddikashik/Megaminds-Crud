<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOfferRequest;
use App\Models\Category;
use App\Models\Location;
use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $categories = Category::all();
        $locations  = Location::all();
        return view( 'offers.create', compact( 'categories', 'locations' ) );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( StoreOfferRequest $request ) {

        // শুধু fillable ফিল্ডগুলো নাও
        $data = array_merge( [
            'author_id' => auth()->user()->id,
        ], $request->only( ['title', 'price', 'description'] ) );

        // Offer create
        $offer = Offer::create( $data );

        // single select sync → array এ wrap করা
        $offer->categories()->sync( $request->get( 'categories' ) );
        $offer->locations()->sync( $request->get( 'locations' ) );

        return redirect()->route( 'dashboard' )->with( 'success', 'Offer created successfully' );
    }

    /**
     * Display the specified resource.
     */
    public function show( string $id ) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( string $id ) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Request $request, string $id ) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( string $id ) {
        //
    }
}
