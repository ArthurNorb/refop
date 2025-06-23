<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Republica extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome',
        'endereco',
        'descricao',
        'logo',
        'genero',
    ];

    public function fotos()
    {
        return $this->hasMany(RepublicaFoto::class);
    }
}
