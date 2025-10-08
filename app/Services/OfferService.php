<?php
namespace App\Services;

use App\Models\Offer;
use Illuminate\Support\Facades\DB;

class OfferService {
    public function store( array $data ) {

        DB::transaction( function () use ( $data ) {
            $data = array_merge( [
                'author_id' => auth()->user()->id,
            ], $data );

            // Offer create
            $offer = Offer::create( $data );

            // single select sync → array এ wrap করা
            $offer->categories()->sync( $data['categories'] );
            $offer->locations()->sync( $data['locations'] );
        }, 5 );

    }

    public function get( array $queryParams = [] ) {
        $queryBuilder = Offer::with( ["categories", "locations"] )->latest();

        $offers = resolve( \App\Filters\OfferFilter::class )->getResult( [
            'builder' => $queryBuilder,
            'params'  => $queryParams,
        ] );

        return $offers;
    }
}