<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Cupcake extends Pivot
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao',
        'preco',
        'imagem_url',
        'estoque',
    ];

    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class, foreignPivotKey: 'cupcake_id')
            ->withPivot('quantidade', 'subtotal')->withTimestamps();
    }
}
