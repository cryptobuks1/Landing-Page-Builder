<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateGeneralContentThreeSettingsTable
 */
class CreateGeneralContentThreeSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_content_three_settings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('text');
            $table->string('link_url')->nullable();
            $table->string('button_value')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('general_content_three_settings');
    }
}
