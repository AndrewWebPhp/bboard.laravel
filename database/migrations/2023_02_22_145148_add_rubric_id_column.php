<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bbs', function (Blueprint $table) {
            //$table->foreignId('rubric_id')->constrained(); // I must check it

            $table->unsignedBigInteger('rubric_id')->nullable()->after('user_id');
            $table->foreign('rubric_id')->references('id')->on('rubrics')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bbs', function (Blueprint $table) {
            $table->dropForeign(['rubric_id']);
            $table->dropColumn('rubric_id');
        });
    }
};
