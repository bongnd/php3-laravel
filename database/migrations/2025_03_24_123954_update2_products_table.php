<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
          
            $table->unsignedInteger('cate_id')->nullable()->after('id');
    
           
        });
    }
    
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['cate_id']);
            $table->dropColumn('cate_id');            $table->foreign('cate_id')->references('id') ->on('categories') ->onDelete('cascade'); 

        });
    }
};
