<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bahan extends Model
{
    use HasFactory;

    protected $table = 'bahan';

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'id_resep',
        'nama_bahan',
    ];
}
