<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model {
    /** @use HasFactory<\Database\Factories\OfferFactory> */
    use HasFactory;

    protected $table    = "offers";
    protected $fillable = [
        'title',
        'description',
        'price',
        'status',
        'author_id',
    ];
    public function categories() {
        // pivot table name explicitly দিন
        return $this->belongsToMany( Category::class );
    }

    public function locations() {
        return $this->belongsToMany( Location::class );
    }

}
