<?php

use App\Models\City;
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
        Schema::create('school_partnerships', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('image');
            $table->foreignIdFor(City::class, 'company_city_id')->nullable();
            $table->string('company_address')->nullable();
            $table->string('responsible_name');
            $table->string('responsible_email');
            $table->string('responsible_phone');
            $table->string('company_phone')->nullable();
            $table->string('company_email')->nullable();
            $table->string('status')->nullable();
            $table->string('activity');
            $table->longText('content');
            $table->boolean('is_published')->default(false);
            $table->dateTime('published_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_partnerships');
    }
};
