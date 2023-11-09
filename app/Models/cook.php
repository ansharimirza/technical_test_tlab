<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cook extends Model
{
    use HasFactory;

    protected $table = 'cook';

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'id_resep',
        'how_to_cook',
    ];
}
