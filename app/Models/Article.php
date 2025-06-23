<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'body',
        'excerpt',
        'image_path',
    ];

    /**
     * Define a relação: um artigo pertence a um usuário (autor).
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Define que o Laravel deve usar o 'slug' em vez do 'id' para encontrar
     * artigos nas rotas (Route Model Binding).
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
