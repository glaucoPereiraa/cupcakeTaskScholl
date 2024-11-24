<?php

use App\Models\Cupcake;
use App\Models\Order;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cupcake_order', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Cupcake::class, 'cupcake_id');
            $table->foreignIdFor(Order::class, 'order_id');
            $table->unsignedInteger('quantidade');
            $table->unsignedInteger('subtotal');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cupcake_order');
    }
};
