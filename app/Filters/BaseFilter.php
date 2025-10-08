<?php

namespace App\Filters;

use Illuminate\Pipeline\Pipeline;

abstract class BaseFilter {
    abstract protected function getFilters();

    public function getResult( $contents ) {
        $results = app( Pipeline::class )
            ->send( $contents )
            ->through( $this->getFilters() )
            ->then( fn( $contents ) => $contents['builder'] );

        return $results->paginate( 5 )->withQueryString();
    }
}