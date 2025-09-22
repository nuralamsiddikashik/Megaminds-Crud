<?php

use App\Constants\Status;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create( 'offers', function ( Blueprint $table ) {
            $table->id();
            $table->string( 'title' );
            $table->string( 'description' );
            $table->float( 'price' );
            $table->string( 'status' )->default( Status::DRAFT );
            $table->foreignId( 'author_id' )->constrained( 'users' );
            $table->softDeletes();
            $table->timestamps();
        } );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::table( 'offers', function ( Blueprint $table ) {
            $table->dropForeign( ['author_id'] );
            $table->dropIfExists();
        } );
    }
};
