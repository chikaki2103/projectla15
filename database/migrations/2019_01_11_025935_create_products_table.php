<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->unique();
            $table->string('name')->index();
            $table->string('slug')->unique();
            $table->integer('category_id')->unsigned();
            $table->mediumText('description')->nullable();
            $table->longText('content')->nullable();
            $table->integer('sale_price');
            $table->integer('view_count')->default(0);
            $table->integer('rate');
            $table->integer('admin_updated_id')->unsigned();          
            $table->integer('admin_created_id')->unsigned();


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
        Schema::dropIfExists('products');
    }
}
