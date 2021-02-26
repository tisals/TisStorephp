<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsTableProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('name', 50 )->nullable($value = false)->after('id');
            $table->text('description')->nullable($value = false)->after('name');
            $table->Double('value', 15,2)->nullable($value = false)->after('description');
            $table->string('image', 50 )->nullable()->after('value');
            $table->enum('type', ['Físico', 'Digital'])->after('image');
            $table->string('brand', 40)->after('type');
            $table->enum('status', ['Activo', 'Inactivo'])->after('brand');
            $table->bigInteger('category_id')->after('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
}
