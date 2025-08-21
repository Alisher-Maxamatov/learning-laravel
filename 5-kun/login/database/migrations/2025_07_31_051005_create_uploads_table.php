<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('uploads', function (Blueprint $table) {
            $table->id();
            $table->string('original_name');  //  nomi
            $table->string('file_path');      //  joylashgani
            $table->string('file_type');      //  turi
            $table->integer('file_size');     //  hajmi
            $table->unsignedBigInteger('user_id'); // Kim yuklagani
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('uploads');
    }
};
