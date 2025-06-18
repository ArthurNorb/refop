<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepublicaFoto extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'republica_id',
        'caminho_foto',
    ];

    public function republica()
    {
        return $this->belongsTo(Republica::class);
    }
}
