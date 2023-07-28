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
            $table->string('code')->unique();
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
            $table->unsignedBigInteger('parent_id')->nullable();
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
            $table->timestamps();

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
            $table->string('attribute_code');
            $table->string('attribute_model')->nullable();
            $table->string('backend_model')->nullable();
            $table->string('backend_type');
            $table->string('backend_table')->nullable();
            $table->string('frontend_model')->nullable();
            $table->string('frontend_input');
            $table->string('frontend_class')->nullable();
            $table->string('source_model')->nullable();
            $table->boolean('is_required');
            $table->boolean('is_user_defined');
            $table->string('default_value')->nullable();
            $table->boolean('is_unique');
            $table->string('note')->nullable();
            $table->integer('position');
            $table->boolean('is_global');
            $table->boolean('is_visible');
            $table->boolean('is_searchable');
            $table->boolean('is_filterable');
            $table->boolean('is_comparable');
            $table->boolean('is_visible_on_front');
            $table->boolean('is_wysiwyg_enabled');
            $table->string('default_frontend_label')->nullable();
            $table->string('default_frontend_input')->nullable();
            $table->string('default_frontend_class')->nullable();
            $table->string('default_source_model')->nullable();
            $table->string('data_model')->nullable();
            $table->integer('sort_order')->nullable();
            $table->boolean('is_used_in_grid');
            $table->boolean('is_visible_in_grid');
            $table->boolean('is_filterable_in_grid');
            $table->decimal('search_weight', 12, 4)->nullable();
            $table->text('additional_data')->nullable();
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
            $table->integer('sort_order')->default(0);
            $table->timestamps();

            $table->foreign('entity_type_id')->references('id')->on('eav_entity_type')->onDelete('cascade');
        });

        // Таблица eav_attribute_group
        Schema::create('eav_attribute_group', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('attribute_set_id');
            $table->string('attribute_group_name');
            $table->integer('sort_order')->default(0);
            $table->timestamps();

            $table->foreign('attribute_set_id')->references('id')->on('eav_attribute_set')->onDelete('cascade');
        });

        // Таблица eav_entity_attribute
        Schema::create('eav_entity_attribute', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('entity_type_id');
            $table->unsignedBigInteger('attribute_set_id');
            $table->unsignedBigInteger('attribute_group_id');
            $table->unsignedBigInteger('attribute_id');
            $table->integer('sort_order')->default(0);
            $table->timestamps();

            $table->foreign('entity_type_id')->references('id')->on('eav_entity_type')->onDelete('cascade');
            $table->foreign('attribute_set_id')->references('id')->on('eav_attribute_set')->onDelete('cascade');
            $table->foreign('attribute_group_id')->references('id')->on('eav_attribute_group')->onDelete('cascade');
            $table->foreign('attribute_id')->references('id')->on('eav_attribute')->onDelete('cascade');
        });

        // Таблица catalog_product_entity_varchar
        Schema::create('catalog_product_entity_varchar', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('entity_id');
            $table->unsignedBigInteger('attribute_id');
            $table->unsignedBigInteger('store_id')->default(0);
            $table->string('value');
            $table->timestamps();

            $table->foreign('entity_id')->references('id')->on('catalog_product_entity')->onDelete('cascade');
            $table->foreign('attribute_id')->references('id')->on('eav_attribute')->onDelete('cascade');
        });

        // Таблица catalog_product_entity_int
        Schema::create('catalog_product_entity_int', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('entity_id');
            $table->unsignedBigInteger('attribute_id');
            $table->unsignedBigInteger('store_id')->default(0);
            $table->integer('value');
            $table->timestamps();

            $table->foreign('entity_id')->references('id')->on('catalog_product_entity')->onDelete('cascade');
            $table->foreign('attribute_id')->references('id')->on('eav_attribute')->onDelete('cascade');
        });

        // Таблица catalog_product_entity_text
        Schema::create('catalog_product_entity_text', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('entity_id');
            $table->unsignedBigInteger('attribute_id');
            $table->unsignedBigInteger('store_id')->default(0);
            $table->text('value');
            $table->timestamps();

            $table->foreign('entity_id')->references('id')->on('catalog_product_entity')->onDelete('cascade');
            $table->foreign('attribute_id')->references('id')->on('eav_attribute')->onDelete('cascade');
        });

        // Таблица catalog_product_entity_decimal
        Schema::create('catalog_product_entity_decimal', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('entity_id');
            $table->unsignedBigInteger('attribute_id');
            $table->unsignedBigInteger('store_id')->default(0);
            $table->decimal('value', 12, 4);
            $table->timestamps();

            $table->foreign('entity_id')->references('id')->on('catalog_product_entity')->onDelete('cascade');
            $table->foreign('attribute_id')->references('id')->on('eav_attribute')->onDelete('cascade');
        });

        // Таблица catalog_product_entity_datetime
        Schema::create('catalog_product_entity_datetime', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('entity_id');
            $table->unsignedBigInteger('attribute_id');
            $table->unsignedBigInteger('store_id')->default(0);
            $table->dateTime('value');
            $table->timestamps();

            $table->foreign('entity_id')->references('id')->on('catalog_product_entity')->onDelete('cascade');
            $table->foreign('attribute_id')->references('id')->on('eav_attribute')->onDelete('cascade');
        });

        // Таблица eav_attribute_option
        Schema::create('eav_attribute_option', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('attribute_id');
            $table->integer('sort_order');
            // Добавьте другие необходимые столбцы для eav_attribute_option
            $table->timestamps();

            $table->foreign('attribute_id')->references('id')->on('eav_attribute')->onDelete('cascade');
        });

        // Таблица eav_attribute_option_value
        Schema::create('eav_attribute_option_value', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('option_id');
            $table->string('locale');
            $table->string('value');
            $table->timestamps();

            $table->foreign('option_id')->references('id')->on('eav_attribute_option')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catalog_product_entity_datetime');
        Schema::dropIfExists('catalog_product_entity_decimal');
        Schema::dropIfExists('catalog_product_entity_text');
        Schema::dropIfExists('catalog_product_entity_int');
        Schema::dropIfExists('catalog_product_entity_varchar');
        Schema::dropIfExists('eav_attribute_option');
        Schema::dropIfExists('eav_attribute_option_value');
        Schema::dropIfExists('eav_entity_attribute');
        Schema::dropIfExists('eav_attribute_group');
        Schema::dropIfExists('eav_attribute_set');
        Schema::dropIfExists('eav_attribute_label');
        Schema::dropIfExists('eav_attribute');
        Schema::dropIfExists('eav_entity_type');
        Schema::dropIfExists('catalog_category_product');
        Schema::dropIfExists('catalog_product_entity');
        Schema::dropIfExists('catalog_category_entity');
        Schema::dropIfExists('store');
        Schema::dropIfExists('store_group');
        Schema::dropIfExists('store_website');
    }
};
