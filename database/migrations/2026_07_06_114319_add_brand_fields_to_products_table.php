<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {

            $table->foreignId('brand_id')
                ->nullable()
                ->after('category_id')
                ->constrained();

            $table->string('sku')->unique()->after('brand_id');

            $table->string('barcode')->nullable();

            $table->string('model')->nullable();

            $table->enum('voltage', [
                '110V',
                '220V',
                'Bivolt'
            ])->nullable();

            $table->integer('warranty')->nullable()->comment('Meses');

            $table->decimal('weight',8,2)->nullable();

            $table->json('dimensions')->nullable();

            $table->boolean('featured')->default(false);

            $table->boolean('promotion')->default(false);

            $table->boolean('active')->default(true);
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {

            $table->dropForeign(['brand_id']);

            $table->dropColumn([
                'brand_id',
                'sku',
                'barcode',
                'model',
                'voltage',
                'warranty',
                'weight',
                'dimensions',
                'featured',
                'promotion',
                'active'
            ]);
        });
    }
};
