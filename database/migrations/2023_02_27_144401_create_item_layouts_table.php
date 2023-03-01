<?php

use App\Models\Post;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemLayoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_layouts', function (Blueprint $table) {
            $table->id();
            $table->text('content');
            $table->enum('type', [
                'image',
                'title',
                'subtitle',
                'description',
            ]);
            $table->integer('order');
            $table->foreignIdFor(Post::class);
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
        Schema::dropIfExists('item_layouts');
    }
}
