<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Twit;
use App\Models\Tag;

class CreateTwitTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('twit_tag', function (Blueprint $table) {
            $table->foreignIdFor(Twit::class);
            $table->foreignIdFor(Tag::class);

            $table->unique(['twit_id', 'tag_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('twit_tag');
    }
}
