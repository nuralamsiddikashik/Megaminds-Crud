<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOfferRequest;
use App\Models\Category;
use App\Models\Location;
use App\Models\Offer;
use App\Services\OfferService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class OfferController extends Controller {
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $offers = Offer::with( ["categories", "locations"] )->paginate( 10 );
        return view( 'offers.index', compact( 'offers' ) );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {

        $this->authorize( 'create', Offer::class );

        $categories = Category::orderBy( 'title' )->get();
        $locations  = Location::orderBy( 'title' )->get();
        return view( 'offers.create', compact( 'categories', 'locations' ) );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( StoreOfferRequest $request, OfferService $offerService ) {
        // Check permission
        $this->authorize( 'create', Offer::class );

        try {
            // Store offer
            $offerService->store( $request->validated() );

            // Success response
            return redirect()
                ->back()
                ->with( 'success', 'Offer created successfully.' );
        } catch ( \Exception $e ) {
            // Error response
            return redirect()
                ->back()
                ->with( 'error', 'Offer creation failed: ' . $e->getMessage() );
        }
    }

    /**
     * Display the specified resource.
     */
    public function show( string $id ) {
        $offer = Offer::findOrFail( $id );
        return view( 'offers.show', compact( 'offer' ) );
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
