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
        Schema::create('store_website', function (Blueprint $table) {
            $table->bigIncrements('website_id');
            $table->string('code')->unique();
            $table->string('name');
            $table->integer('sort_order');
            $table->unsignedBigInteger('default_group_id')->nullable();
            $table->boolean('is_default');
            $table->timestamps();
        });

        Schema::create('store_group', function (Blueprint $table) {
            $table->bigIncrements('group_id');
            $table->unsignedBigInteger('website_id');
            $table->string('name');
            $table->unsignedBigInteger('root_category_id');
            $table->unsignedBigInteger('default_store_id')->nullable();
            $table->timestamps();

            $table->foreign('website_id')->references('website_id')->on('store_website')->onDelete('cascade');
        });

        Schema::create('store', function (Blueprint $table) {
            $table->bigIncrements('store_id');
            $table->string('code')->unique();
            $table->unsignedBigInteger('website_id');
            $table->unsignedBigInteger('group_id');
            $table->string('name');
            $table->integer('sort_order');
            $table->boolean('is_active');
            $table->timestamps();

            $table->foreign('website_id')->references('website_id')->on('store_website')->onDelete('cascade');
            $table->foreign('group_id')->references('group_id')->on('store_group')->onDelete('cascade');
        });

        // После создания всех трех таблиц, добавим внешний ключ для `default_group_id`
        Schema::table('store_website', function (Blueprint $table) {
            $table->foreign('default_group_id')->references('group_id')->on('store_group')->onDelete('set null');
        });

        // Таблицы для продуктов и категорий
        Schema::create('catalog_category_entity', function (Blueprint $table) {
            $table->bigIncrements('entity_id');
            $table->unsignedBigInteger('attribute_set_id');
            $table->unsignedBigInteger('parent_id');
            $table->string('path');
            $table->integer('position');
            $table->integer('level');
            $table->integer('children_count');
            $table->timestamps();
        });

        Schema::create('catalog_product_entity', function (Blueprint $table) {
            $table->bigIncrements('entity_id');
            $table->unsignedBigInteger('attribute_set_id');
            $table->string('type_id');
            $table->string('sku')->unique();
            $table->boolean('has_options');
            $table->boolean('required_options');
            $table->timestamps();
        });

        Schema::create('catalog_category_product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('position');

            $table->foreign('category_id')->references('entity_id')->on('catalog_category_entity')->onDelete('cascade');
            $table->foreign('product_id')->references('entity_id')->on('catalog_product_entity')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catalog_category_product');
        Schema::dropIfExists('catalog_product_entity');
        Schema::dropIfExists('catalog_category_entity');
        Schema::dropIfExists('store_website');
        Schema::dropIfExists('store_group');
        Schema::dropIfExists('store_website');
    }
};
