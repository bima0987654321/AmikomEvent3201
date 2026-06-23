<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'description',
        'date',
        'location',
        'price',
        'stock',
        'poster_path'
    ];

    /**
     * Mengubah tipe data kolom saat diakses oleh Eloquent
     */
    protected $casts = [
        'date' => 'datetime',
    ];

    /**
     * Hubungan Relasi ke Model Category
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}