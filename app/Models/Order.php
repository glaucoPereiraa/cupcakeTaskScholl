<?php

namespace App\Models;

use App\OrderStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status',
        'total',
    ];

    protected $cast = [
        'status' => OrderStatusEnum::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function cupcakes(): BelongsToMany
    {
        return $this->belongsToMany(Cupcake::class, relatedPivotKey: 'cupcake_id')
            ->withPivot('quantidade', 'subtotal')->withTimestamps();
    }
}
