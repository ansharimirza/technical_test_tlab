<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class resep extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'resep';

    protected $dates = ['deleted_at'];

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'nama_resep',
        'deskripsi',
        'lama_memasak',
        'porsi',
        'deleted_at'
    ];
}
