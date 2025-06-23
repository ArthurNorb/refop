<?php
// app/Models/Event.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Event extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'title',
        'description',
        'location_name',
        'event_datetime',
        'image_path',
        'latitude',
        'longitude',
    ];

    /**
     * Converte atributos para tipos nativos.
     * Essencial para manipular a data do evento facilmente.
     */
    protected $casts = [
        'event_datetime' => 'datetime',
    ];
}