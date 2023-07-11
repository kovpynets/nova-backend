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
        // Таблица store_website
        Schema::create('store_website', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('name');
            $table->integer('sort_order');
            $table->unsignedBigInteger('default_group_id')->nullable();
            $table->boolean('is_default');
            $table->timestamps();
        });

        // Таблица store_group
        Schema::create('store_group', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('website_id');
            $table->string('name');
            $table->unsignedBigInteger('root_category_id');
            $table->unsignedBigInteger('default_store_id')->nullable();
            $table->timestamps();

            $table->foreign('website_id')->references('id')->on('store_website')->onDelete('cascade');
        });

        // Таблица store
        Schema::create('store', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->unsignedBigInteger('website_id');
            $table->unsignedBigInteger('group_id');
            $table->string('name');
            $table->integer('sort_order');
            $table->boolean('is_active');
            $table->timestamps();

            $table->foreign('website_id')->references('id')->on('store_website')->onDelete('cascade');
            $table->foreign('group_id')->references('id')->on('store_group')->onDelete('cascade');
        });

        // Внешний ключ для default_group_id в таблице store_website
        Schema::table('store_website', function (Blueprint $table) {
            $table->foreign('default_group_id')->references('id')->on('store_group')->onDelete('set null');
        });

        // Таблица catalog_category_entity
        Schema::create('catalog_category_entity', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('attribute_set_id');
            $table->unsignedBigInteger('parent_id');
            $table->string('path');
            $table->integer('position');
            $table->integer('level');
            $table->integer('children_count');
            $table->timestamps();
        });

        // Таблица catalog_product_entity
        Schema::create('catalog_product_entity', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('attribute_set_id');
            $table->string('type_id');
            $table->string('sku')->unique();
            $table->boolean('has_options');
            $table->boolean('required_options');
            $table->timestamps();
        });

        // Таблица catalog_category_product
        Schema::create('catalog_category_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('position');

            $table->foreign('category_id')->references('id')->on('catalog_category_entity')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('catalog_product_entity')->onDelete('cascade');
        });

        // Таблица eav_entity_type
        Schema::create('eav_entity_type', function (Blueprint $table) {
            $table->id();
            $table->string('entity_type_code');
            $table->string('entity_type_name');
            // Добавьте другие необходимые столбцы для eav_entity_type
            $table->timestamps();
        });

        // Таблица eav_attribute
        Schema::create('eav_attribute', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('frontend_label');
            // Добавьте другие необходимые столбцы для eav_attribute
            $table->timestamps();
        });

        // Таблица eav_attribute_label
        Schema::create('eav_attribute_label', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('attribute_id');
            $table->string('locale');
            $table->string('label');
            $table->timestamps();

            $table->foreign('attribute_id')->references('id')->on('eav_attribute')->onDelete('cascade');
        });

        // Таблица eav_attribute_set
        Schema::create('eav_attribute_set', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('entity_type_id');
            $table->string('attribute_set_name');
            // Добавьте другие необходимые столбцы для eav_attribute_set
            $table->timestamps();

            $table->foreign('entity_type_id')->references('id')->on('eav_entity_type')->onDelete('cascade');
        });

        // Таблица eav_attribute_set_attribute
        Schema::create('eav_attribute_set_attribute', function (Blueprint $table) {
            $table->unsignedBigInteger('attribute_set_id');
            $table->unsignedBigInteger('attribute_id');
            $table->integer('sort_order');

            $table->foreign('attribute_set_id')->references('id')->on('eav_attribute_set')->onDelete('cascade');
            $table->foreign('attribute_id')->references('id')->on('eav_attribute')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Удаляем внешние ключи и таблицы в обратном порядке

        // eav_attribute_set_attribute
        Schema::table('eav_attribute_set_attribute', function (Blueprint $table) {
            $table->dropForeign(['attribute_set_id', 'attribute_id']);
        });
        Schema::dropIfExists('eav_attribute_set_attribute');

        // eav_attribute_set
        Schema::table('eav_attribute_set', function (Blueprint $table) {
            $table->dropForeign(['entity_type_id']);
        });
        Schema::dropIfExists('eav_attribute_set');

        // eav_attribute_label
        Schema::table('eav_attribute_label', function (Blueprint $table) {
            $table->dropForeign(['attribute_id']);
        });
        Schema::dropIfExists('eav_attribute_label');

        // eav_attribute
        Schema::dropIfExists('eav_attribute');

        // eav_entity_type
        Schema::dropIfExists('eav_entity_type');

        // catalog_category_product
        Schema::table('catalog_category_product', function (Blueprint $table) {
            $table->dropForeign(['category_id', 'product_id']);
        });
        Schema::dropIfExists('catalog_category_product');

        // catalog_product_entity
        Schema::table('catalog_product_entity', function (Blueprint $table) {
            $table->dropForeign(['attribute_set_id']);
        });
        Schema::dropIfExists('catalog_product_entity');

        // catalog_category_entity
        Schema::table('catalog_category_entity', function (Blueprint $table) {
            $table->dropForeign(['attribute_set_id']);
        });
        Schema::dropIfExists('catalog_category_entity');

        // store
        Schema::table('store', function (Blueprint $table) {
            $table->dropForeign(['website_id', 'group_id']);
        });
        Schema::dropIfExists('store');

        // store_group
        Schema::table('store_group', function (Blueprint $table) {
            $table->dropForeign(['website_id']);
        });
        Schema::dropIfExists('store_group');

        // store_website
        Schema::table('store_website', function (Blueprint $table) {
            $table->dropForeign(['default_group_id']);
        });
        Schema::dropIfExists('store_website');
    }


};
