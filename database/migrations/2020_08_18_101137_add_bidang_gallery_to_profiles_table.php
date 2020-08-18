<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBidangGalleryToProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->text("channel_id")->nullable()->after('sejarah');
            $table->text("kalimat_pembuka")->nullable()->after('channel_id');
            $table->text("bidang")->nullable()->after('kalimat_pembuka');
            $table->text("gallery")->nullable()->after('bidang');
            $table->text("pengurus")->nullable()->after('gallery');
            $table->text("contact")->nullable()->after('pengurus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profiles', function (Blueprint $table) {
            //
        });
    }
}
