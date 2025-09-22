<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        if ( Schema::hasTable( 'offers' ) ) {
            Schema::table( 'offers', function ( Blueprint $table ) {
                $table->text( 'photo' )->change();
            } );
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        if ( Schema::hasTable( 'offers' ) ) {
            Schema::table( 'offers', function ( Blueprint $table ) {
                $table->string( 'photo', 255 )->change(); // Assuming default string length was 255
            } );
        }
    }
};