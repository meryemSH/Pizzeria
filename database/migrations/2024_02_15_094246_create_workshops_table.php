<?php

use App\Models\Category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('workshops', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('ingredient');
            $table->longText('content');
            $table->string('timetables')->nullable();
            $table->string('image')->nullable();
            $table->float('price');
            $table->float('old_price')->nullable();

            $table->boolean('is_published')->default(false);
            $table->dateTime('publish_date')->nullable();
            $table->foreignIdFor(Category::class, 'category_item_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workshops');
    }
};
